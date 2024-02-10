<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Tugas Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Judul</th>
                                <th>Description</th>
                                <th>Status</th>
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

<!-- Modal Add Category Pengeluaran -->
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
                            <label for="">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Judul Tugas">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="" class="form-control" id="description" cols="30" rows="10" placeholder="Deskripsi Tugas"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="" class="form-control" id="status_add">
                                <option value="" selected>-- Pilih Status --</option>
                                <option value="0">Pending</option>
                                <option value="1">On Proggress</option>
                                <option value="2"> Selesai </option>
                            </select>
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

<!-- Modal Edit Role -->
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
                            <label for="">Judul</label>
                            <input type="text" class="form-control" id="judul_edit" placeholder="Nama Role">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="" class="form-control" id="description_edit" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="" class="form-control" id="status_edit">
                                <option value="" selected>-- Pilih Status --</option>
                                <option value="0">Pending</option>
                                <option value="1">On Proggress</option>
                                <option value="2"> Selesai </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_ticket">
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
                // console.log(response.data[0].id_role)
                $("#id_ticket").val(response.data[0].id_ticket)
                $("#judul_edit").val(response.data[0].judul)
                $("#description_edit").val(response.data[0].description)
                $('#status_edit').val(response.data[0].status)
                $('#modalEdit').modal('show');
            },
            error: function(data) {
                swal("Error", "Gagal Fetch Data", "error");
            }
        })
    }

    function changeStatus(id) {
        swal({
                title: `Are you sure Change This Data ?`,
                text: "You won't be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '<?= site_url($site_url . '/change_status') ?>',
                        type: 'POST',
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(response) {
                            if (response.code == 200) {
                                swal({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                }).then(function() {


                                });
                            }
                        },
                        error: function(err) {
                            swal({
                                icon: 'error',
                                title: 'Gagal',
                                text: err.responseJSON.message,
                            })
                        }
                    })
                } else {
                    swal("Your data is safe!");
                }
            });
    }


    var table;
    $(document).ready(function() {

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
            'rowCallback': function(row, data, index) {
                if (data.status_hide == "0") {
                    $('td', row).css('background-color', 'rgba(255, 0, 0, 0.15)');
                } else if (data.status_hide == "1") {
                    $('td', row).css('background-color', 'rgba(255,255,0,0.3)');
                } else if (data.status_hide == "2") {
                    $('td', row).css('background-color', 'rgba(0, 255, 0, 0.15)');
                }
            },
        });

        $('#datatables').on('change', '.change-status', function() {
            id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '<?= site_url($site_url . '/change_status') ?>',
                data: {
                    id: id,
                    status: this.value
                },
                success: function(response) {
                    if (response.code == 200) {
                        Swal.fire({
                            icon : 'success',
                            title: 'Berhasil',
                            text : response.message,
                        }).then(function() {
                            $('#datatables').DataTable().draw();
                        });
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $('#datatables').DataTable().draw();

                }
            });
        });

        /* Proses Save */
        $('#save').click(function() {
            let judul = $('#judul').val();
            let description = $('#description').val();
            let status = $('#status_add').val();

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                data: {
                    judul: judul,
                    description: description,
                    status: status
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
                        $('#judul,#description,#status_add').val('')
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
                    $('#judul,#description,#status_add').val('')
                    $('#datatables').DataTable().draw();
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let id_ticket = $("#id_ticket").val()
            let judul = $('#judul_edit').val();
            let description = $('#description_edit').val();
            let status = $('#status_edit').val();

            $.ajax({
                url: '<?= site_url($site_url . '/edit') ?>',
                type: 'POST',
                data: {
                    id: id_ticket,
                    judul: judul,
                    description: description,
                    status: status
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
                        $('#modalEditRole').modal('hide');
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
                    $('#modalEditRole').modal('hide');
                    $('#datatables').DataTable().draw();
                }
            });
        });

    });
</script>