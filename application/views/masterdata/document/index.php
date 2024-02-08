<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddMitra"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>thumbnail</th>
                                <th>title</th>
                                <th>Kategori</th>
                                <th>file</th>
                                <th>Dibuat Oleh</th>
                                <th>Dibuat Tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input type="file" class="form-control" id="img_thumbnail" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" class="form-control" id="file_pdf" accept=".pdf,.csv,.xls,.xlsx">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for=""> Category </label>
                        <select name="" class="form-control" id="category_id">
                            <option value="" disabled selected>== Pilih Category == </option>
                            <?php foreach ($kategori as $kl) : ?>
                                <option value="<?= $kl->id ?>"> <?= $kl->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="title">
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

<!-- Modal Edit  -->
<div class="modal fade" id="modalEditMitra" tabindex="-1" role="dialog" aria-labelledby="modalEditMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Edit <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-mitra">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="" height="200" width="200" id="image_edit" class="img-thumbnail" alt="Responsive image">
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">New Thumbnail</label>
                                <input type="file" class="form-control" id="img_thumbnail_edit" accept="image/*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">New File Pdf</label>
                                <input type="file" class="form-control" id="new_pdf_file" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_telp">Category</label>
                                <select name="" class="form-control" id="category_id_edit">
                                    <option value="" disabled selected>== Pilih Category == </option>
                                    <?php foreach ($kategori as $kl) : ?>
                                        <option value="<?= $kl->id ?>"> <?= $kl->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_telp">Title</label>
                                <input type="text" class="form-control" id="title_edit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_mitra">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_edit"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
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
                $("#id_mitra").val(response.data[0].id)
                if (response.data[0].thumbnail != null) {
                    $('#image_edit').attr("src", '<?= base_url() ?>' + response.data[0].thumbnail)
                } else {
                    $('#image_edit').attr("src", '<?= base_url() ?>assets/img/placehold.jpg')
                }
                $('#category_id_edit').val(response.data[0].category_id)
                $("#title_edit").val(response.data[0].title)
                $('#modalEditMitra').modal('show');
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
                "url": "<?= site_url($site_url . '/ajax_datatable') ?>",
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
            let formData = new FormData();
            formData.append('file_pdf', $('#file_pdf').prop('files')[0] == undefined ? 'kosong' : $('#file_pdf').prop('files')[0]);
            formData.append('img_thumbnail', $('#img_thumbnail').prop('files')[0] == undefined ? 'kosong' : $('#img_thumbnail').prop('files')[0]);
            formData.append('title', $('#title').val());
            formData.append('category_id', $('#category_id').val());

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#save").prop('disabled', true);
                    $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
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
                        $('#file_pdf').val('');
                        $('#title').val('');
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
            formData.append('id', $('#id_mitra').val());
            formData.append('file_pdf', $('#new_pdf_file').prop('files')[0] == undefined ? 'kosong' : $('#new_pdf_file').prop('files')[0]);
            formData.append('img_thumbnail', $('#img_thumbnail_edit').prop('files')[0] == undefined ? 'kosong' : $('#img_thumbnail_edit').prop('files')[0]);
            formData.append('title', $('#title_edit').val());
            formData.append('categori_id', $('#category_id_edit').val());

            $.ajax({
                url: '<?= site_url($site_url . '/edit') ?>',
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
                        $('#modalEditMitra').modal('hide');
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

    });
</script>