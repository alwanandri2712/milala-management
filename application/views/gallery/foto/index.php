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
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Dibuat Oleh</th>
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
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Images</label>
                            <input type="file" class="form-control" id="images" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Judul</label>
                            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Category</label>
                            <select name="" class="form-control" id="category_id">
                                <option value="" disabled selected>== Pilih Category == </option>
                                <?php foreach ($kategori as $kl) : ?>
                                    <option value="<?= $kl->id ?>"> <?= $kl->name ?></option>
                                <?php endforeach; ?>
                            </select>
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
                                <label for="">Images</label>
                                <input type="file" class="form-control" id="logo_mitra_edit" accept="image/*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_telp">Judul</label>
                                <input type="text" class="form-control" id="mitra_name_edit" placeholder="Masukkan Judul ...">
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
    function check_company() {
        $.ajax({
            url: "<?= site_url('Perusahaan/check_berkas') ?>",
            type: 'GET',
            cache: false,
            success: function(data) {
                return true
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Load Halaman ini',
                    text: err.responseJSON.message,
                }).then(function() {
                    window.location.href = "<?= site_url('Perusahaan/info') ?>";
                });
            }
        })
    }

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
                $("#id_mitra").val(response.data[0].id)
                $('#image_edit').attr("src", '<?= base_url() ?>' + 'upload/gallery/foto/' + response.data[0].path)
                $("#mitra_name_edit").val(response.data[0].title)
                $('#category_id_edit').val(response.data[0].category_id)
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

    function publish(id, user_id) {
        Swal.fire({
                title             : 'Apakah kamu yakin publish Gallery Foto ini ? ?',
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor : '#d33',
                confirmButtonText : 'Yes, Publish !'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url($site_url . '/publish') ?>",
                        type: 'POST',
                        data: {
                            id: id,
                            user_id: user_id
                        },
                        success: function(res) {
                            if (res.code == 200) {
                                Swal.fire({
                                    title: "Success",
                                    text: res.message,
                                    icon: "success",
                                    button: "OK",
                                });
                                $('#datatables').DataTable().draw();
                            }
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: err.responseJSON.message,
                            })
                        }
                    })
                } else {
                    Swal.fire("Your data is safe!");
                }
            });
    }

    var table;
    $(document).ready(function() {
        check_company();

        table = $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url($site_url . '/ajax_datatable_foto') ?>",
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
            dom: 'Blfrtip', // munculin export & show  entry
            "buttons": [{
                    "extend": 'excel',
                    "text": 'Export Excel',
                    "titleAttr": 'Excel',
                    "title": "Report Gallery Foto - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Gallery Foto - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3'
                },
            ],
        });

        /* Proses Save category */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('images', $('#images').prop('files')[0]);
            formData.append('title', $('#title').val());
            formData.append('category_id', $('#category_id').val());

            $.ajax({
                url: '<?= site_url($site_url . '/add_foto') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    // $("#save").prop('disabled', true);
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
            formData.append('logo_mitra', $('#logo_mitra_edit').prop('files')[0] == undefined ? 'kosong' : $('#logo_mitra_edit').prop('files')[0]);
            formData.append('mitra_name', $('#mitra_name_edit').val());
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