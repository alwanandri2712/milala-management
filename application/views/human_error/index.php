<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Nama Karyawan</th>
                                <th>Jabatan</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add  -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Tambah <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Karyawan</label>
                            <select name="" class="form-control" id="id_karyawan">
                                <option value=""># Pilih Karyawan #</option>
                                <?php foreach ($data_karyawan as $dk): ?>
                                    <option value="<?= $dk->id_user ?>"> <?= $dk->fullname ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="" class="form-control" id="description" cols="30" rows="10" placeholder="Deskripsi Human Error"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Edit <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Karyawan</label>
                            <select name="" class="form-control" id="id_users_edit">
                                <option value=""># Pilih Karyawan #</option>
                                <?php foreach ($data_karyawan as $dk): ?>
                                    <option value="<?= $dk->id_user ?>"> <?= $dk->fullname ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="" class="form-control" id="description_edit" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_human_error">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_edit">Simpan</button>
                </div>
            </div>
            <!-- func -->
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteRow(id) {
        Swal.fire({
                title: 'Are you sure Delete All Data ?',
                text: "Once deleted, you will not be able to recover this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url($site_url . '/delete/') ?>" + id,
                        type: 'GET',
                        success: function(data) {
                            Swal.fire("Yeay! Your data has been deleted!", {
                                icon: "success",
                            }).then(function() {
                                $('#datatables').DataTable().draw();
                            });
                        },
                        error: function(data) {
                            Swal.fire("Error", "Gagal Menghapus Data", "error");
                        }
                    })
                } else {
                    Swal.fire("Your data is safe!");
                }
            });
    }

    function edit(id) {
        $.ajax({
            url: "<?= site_url($site_url . '/edit/') ?>" + id,
            type: 'GET',
            success: function(response) {
                $("#id_human_error").val(response.data[0].id_human_error)
                $("#id_users_edit").val(response.data[0].id_user)
                $("#description_edit").val(response.data[0].description)
                $('#modalEdit').modal('show');
            },
            error: function(data) {
                swal("Error", "Gagal Fetch Data", "error");
            }
        })
    }

    var table;
    $(document).ready(function() {
        $("#id_karyawan").select2();

        table = $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url($site_url . '/ajax_datatable') ?>",
                "type": "POST"
            },
            "language": {
                "sProcessing": "Sedang memproses...",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ - _END_ ( Total : _TOTAL_ )",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            dom: 'Blfrtip', // munculin export & show  entry
            "buttons": [{
                    "extend": 'excel',
                    "text": 'Export Excel',
                    "titleAttr": 'Excel',
                    "title": "Report Kompetensi Karyawan - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Kompetensi Karyawan - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3'
                },
            ],
            
        });

        /* Proses Save */
        $('#save').click(function() {
            let id_users    = $('#id_karyawan').val();
            let description = $('#description').val();

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                data: {
                    id_user    : id_users,
                    description: description,
                },
                beforeSend: function() {
                    $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(res) {
                    if (res.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: res.message,
                            icon: "success",
                            button: "OK",
                        })

                        $('#save').html('<i data-feather="save"></i> Save')
                        $('#modalAdd').modal('hide');
                        $('#datatables').DataTable().draw();
                        $('#id_users,#description').val('')
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $('#save').html('<i data-feather="save"></i> Save')
                    $('#modalAdd').modal('hide');
                    $('#id_users,#description').val('')
                    $('#datatables').DataTable().draw();
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let id_human_error = $('#id_human_error').val()
            let id_users       = $("#id_users_edit").val()
            let description    = $('#description_edit').val();

            $.ajax({
                url: '<?= site_url($site_url . '/edit') ?>',
                type: 'POST',
                data: {
                    id         : id_human_error,
                    id_user    : id_users,
                    description: description,
                },
                beforeSend: () => {
                    $('#save_edit').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(response) {
                    if (response.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        })
                        $('#save_edit').html('<i data-feather="save"></i> Save Changes')
                        $('#modalEdit').modal('hide');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })

                    $('#save_edit').html('<i data-feather="save"></i> Save Changes')
                    $('#modalEdit').modal('hide');
                    $('#datatables').DataTable().draw();
                }
            });
        });

    });
</script>