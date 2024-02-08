<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddRole"><i class="fas fa-plus"></i> Category Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>kategori id</th>
                                <th>nama kategori</th>
                                <th>Dibuat oleh</th>
                                <th>dibuat tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Tambah Kategori</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_category_add" placeholder="Nama Kategori">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save"> <i data-feather="save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Role -->
<div class="modal fade" id="modalEditRole" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Edit Kategori</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Nama Kategori</label>
                            <input type="text" class="form-control" id="update_nama_kategori" placeholder="Nama Role">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_category">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_edit"> <i data-feather="save"></i> Save</button>
            </div>
        </div>
        <!-- func -->
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
                        url: "<?= site_url($site_url . '/delete_category/') ?>" + id,
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
            url: "<?= site_url($site_url . '/edit_category/') ?>" + id,
            type: 'GET',
            success: function(response) {
                // console.log(response.data[0].id_role)
                $("#id_category").val(response.data[0].id)
                $("#update_nama_kategori").val(response.data[0].name)
                $('#modalEditRole').modal('show');
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
                "url": "<?= site_url($site_url . '/ajax_datatable_category') ?>",
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
            }
        });


        /* Proses Save category */
        $('#save').click(function() {
            let nama_category = $('#nama_category_add').val();

            $.ajax({
                url: '<?= site_url($site_url . '/add_category') ?>',
                type: 'POST',
                data: {
                    name_category: nama_category,
                },
                beforeSend: function() {
                    $("#save").prop('disabled', true);
                    $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(res) {
                    if (res.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: res.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#save").prop('disabled', false);
                        $('#save').html('Save')
                        $('#modalAddRole').modal('hide');
                        $('#datatables').DataTable().draw();
                        $('#nama_category_add').val('')
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save").prop('disabled', false);
                    $('#save').html('<i data-feather="save"></i> Save')
                    $('#modalAddRole').modal('hide');
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let id = $("#id_category").val()
            let nama_kategori = $('#update_nama_kategori').val();
            $.ajax({
                url: '<?= site_url($site_url . '/edit_category') ?>',
                type: 'POST',
                data: {
                    id: id,
                    nama_kategori: nama_kategori,
                },
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
                        $('#modalEditRole').modal('hide');
                        $("#save_edit").prop('disabled', false);
                        $('#save_edit').html('<i data-feather="save"></i> Save');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $('#modalEditRole').modal('hide');
                    $("#save_edit").prop('disabled', false);
                    $('#save_edit').html('<i data-feather="save"></i> Save');
                }
            });
        });

    });
</script>