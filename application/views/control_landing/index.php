<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalArtikel">
                    <i class="fas fa-plus"></i> Artikel Baru
                </button>
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
                                <th>Tanggal Dibuat</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Artikel -->
<div class="modal fade" id="modalArtikel" tabindex="-1" role="dialog" aria-labelledby="modalArtikelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArtikelLabel">Tambah Artikel Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-artikel" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul artikel" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Masukkan kategori artikel" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten Artikel</label>
                        <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="artikel_image">Gambar Artikel</label>
                        <input type="file" class="form-control" id="artikel_image" name="artikel_image" accept="image/*" required>
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0">Draft</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Artikel -->
<div class="modal fade" id="modalEditArtikel" tabindex="-1" role="dialog" aria-labelledby="modalEditArtikelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditArtikelLabel">Edit Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-artikel" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_title">Judul Artikel</label>
                        <input type="text" class="form-control" id="edit_title" name="title" placeholder="Masukkan judul artikel" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category">Kategori</label>
                        <input type="text" class="form-control" id="edit_category" name="category" placeholder="Masukkan kategori artikel" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_content">Konten Artikel</label>
                        <textarea class="form-control" id="edit_content" name="content" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_artikel_image">Gambar Artikel</label>
                        <input type="file" class="form-control" id="edit_artikel_image" name="artikel_image" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        <input type="hidden" id="edit_artikel_image_status" name="artikel_image" value="kosong">
                        <div id="preview_image" class="mt-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status">
                            <option value="0">Draft</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize CKEditor for content
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('content');
            CKEDITOR.replace('edit_content');
        }

        // Initialize DataTable
        var table = $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url($site_url . '/ajax_datatable') ?>",
                type: "POST",
                error: function(xhr, error, thrown) {
                    console.log('DataTables error: ' + error);
                    console.log('Server response: ', xhr.responseText);

                    // Tampilkan pesan error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error DataTables',
                        text: 'Terjadi kesalahan saat memuat data. Pastikan tabel artikel sudah dibuat di database.',
                        footer: '<a href="javascript:void(0)" onclick="showErrorDetails(\'' + error + '\', \'' + xhr.responseText + '\')">Lihat detail error</a>'
                    });
                }
            },
            columnDefs: [{
                targets: [0, 1, 4],
                orderable: false,
            }],
            order: []
        });

        // Fungsi untuk menampilkan detail error
        function showErrorDetails(error, response) {
            Swal.fire({
                icon: 'error',
                title: 'Detail Error',
                html: '<div style="text-align: left;"><strong>Error:</strong> ' + error + '<br><br><strong>Response:</strong> <pre style="max-height: 300px; overflow-y: auto;">' + response + '</pre></div>',
                width: '80%'
            });
        }

        // Handle form submission for adding new article
        $('#form-artikel').submit(function(e) {
            e.preventDefault();

            // Get CKEditor content if available
            if (typeof CKEDITOR !== 'undefined') {
                $('#content').val(CKEDITOR.instances.content.getData());
            }

            var formData = new FormData(this);

            $.ajax({
                url: "<?= base_url($site_url . '/add') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                        });
                        $('#modalArtikel').modal('hide');
                        $('#form-artikel')[0].reset();
                        if (typeof CKEDITOR !== 'undefined') {
                            CKEDITOR.instances.content.setData('');
                        }
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.message,
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan: ' + textStatus,
                    });
                }
            });
        });

        // Handle form submission for editing article
        $('#form-edit-artikel').submit(function(e) {
            e.preventDefault();

            // Get CKEditor content if available
            if (typeof CKEDITOR !== 'undefined') {
                $('#edit_content').val(CKEDITOR.instances.edit_content.getData());
            }

            var formData = new FormData(this);

            // Check if file input has a file
            if ($('#edit_artikel_image').val()) {
                formData.set('artikel_image', 'ada');
            }

            $.ajax({
                url: "<?= base_url($site_url . '/edit') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                        });
                        $('#modalEditArtikel').modal('hide');
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.message,
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan: ' + textStatus,
                    });
                }
            });
        });

        // Handle file input change for edit form
        $('#edit_artikel_image').change(function() {
            if ($(this).val()) {
                $('#edit_artikel_image_status').val('ada');
            } else {
                $('#edit_artikel_image_status').val('kosong');
            }
        });
    });

    // Function to edit data
    function edit_data(id) {
        $.ajax({
            url: "<?= base_url($site_url . '/get_data') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edit_id').val(data.id);
                $('#edit_title').val(data.title);
                $('#edit_category').val(data.category);

                if (typeof CKEDITOR !== 'undefined') {
                    CKEDITOR.instances.edit_content.setData(data.content);
                } else {
                    $('#edit_content').val(data.content);
                }

                $('#edit_status').val(data.status);

                // Show image preview
                $('#preview_image').html('<img src="<?= base_url() ?>upload/artikel/' + data.image + '" width="100" class="img-thumbnail">');

                $('#modalEditArtikel').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan: ' + textStatus,
                });
            }
        });
    }

    // Function to delete data
    function hapus_data(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url($site_url . '/delete') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.code == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message,
                            });
                            $('#datatables').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message,
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan: ' + textStatus,
                        });
                    }
                });
            }
        });
    }
</script>
