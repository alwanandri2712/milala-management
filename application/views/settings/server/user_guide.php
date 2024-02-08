<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <?php if ($this->session->userdata('id_role') == 1) : ?>
                <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddMitra"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Judul</th>
                                <th>Nama Role</th>
                                <th>File Link</th>
                                <th>Dibuat Oleh</th>
                                <th>Dibuat Pada Tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('id_role') == 1) : ?>

    <!-- Modal Add -->
    <div class="modal fade" id="modalAddMitra" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
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
                                <label for="">Judul</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan Judul">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <?php foreach ($data_roles as $key) :  ?>
                                        <option value="<?= $key->id_role ?>"><?= $key->nama_role ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" class="form-control" id="file" placeholder="Masukkan File User Guide">
                                <span style="font-size: 12px; color:red">* Maximal File Yang Di Izinkan Ialah 10MB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save"><i data-feather="save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Role -->
    <div class="modal fade" id="modalEditUserGuide" tabindex="-1" role="dialog" aria-labelledby="modalEditUserGuide" aria-hidden="true">
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
                                <label for="">Judul</label>
                                <input type="text" class="form-control" id="name_edit" placeholder="Masukkan Judul">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role_edit" id="role_edit" class="form-control">
                                    <?php foreach ($data_roles as $key) :  ?>
                                        <option value="<?= $key->id_role ?>"><?= $key->nama_role ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" class="form-control" id="file_edit" placeholder="Masukkan File User Guide">
                                <span style="font-size: 12px; color:red">* Maximal File Yang Di Izinkan Ialah 10MB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_user_guide">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_edit"><i data-feather="save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

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
                        url: "<?= site_url($site_url . '/delete_userguide/') ?>" + id,
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
            url: "<?= site_url($site_url . '/edit_userguide/') ?>" + id,
            type: 'GET',
            success: function(response) {
                $("#id_user_guide").val(response.data[0].id)
                $("#name_edit").val(response.data[0].name)
                $("#role_edit").val(response.data[0].id_role)
                $("#modalEditUserGuide").modal('show');
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: err.responseJSON.message,
                })
            }
        })
    }


    var table;
    $(document).ready(function() {
        table = $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url($site_url . '/ajax_datatable_user_guide') ?>",
                "type": "POST"
            },
            "language": {
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
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
                }
            },
            responsive: true
        });
    });
</script>

<?php if ($this->session->userdata('id_role') == 1) : ?>
    <script>
        /* Proses Save category */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('role', $('#role').val());
            formData.append('file_user_guide', $('#file').prop('files')[0]);

            $.ajax({
                url: '<?= site_url($site_url . '/add_userguide') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    // $("#save").prop('disabled', true);
                    // $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#save").prop('disabled', false);
                        $('#save').html('<i data-feather="save"></i> Save');
                        $('#modalAddMitra').modal('hide');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save").prop('disabled', false);
                    $('#save').html('<i data-feather="save"></i> Save');
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let formData = new FormData();
            formData.append('id', $('#id_user_guide').val());
            formData.append('name', $('#name_edit').val());
            formData.append('role', $('#role_edit').val());
            formData.append('file_user_guide', $('#file_edit').prop('files')[0]);

            $.ajax({
                url: '<?= site_url($site_url . '/edit_userguide') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#save_edit").prop('disabled', true);
                    $('#save_edit').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#save_edit").prop('disabled', false);
                        $('#save_edit').html('<i data-feather="save"></i> Save');
                        $('#modalEditUserGuide').modal('hide');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save_edit").prop('disabled', false);
                    $('#save_edit').html('<i data-feather="save"></i> Save');
                }
            });
        });
    </script>
<?php endif; ?>
