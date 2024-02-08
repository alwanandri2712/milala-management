<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <a href="<?= base_url('news/add_news') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</a></a>
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddMitra"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Views</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Publish date</th>
                                <th>dibuat oleh</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
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
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" id="image_news">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Tittle News</label>
                            <input type="text" class="form-control" id="mitra_name" placeholder="Nama Mitra">
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="no_telp">Status</label>
                            <select name="" class="form-control" id="status_add">
                                <option value="" selected>-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
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
                                <label for="">Logo Mitra</label>
                                <input type="file" class="form-control" id="logo_mitra_edit">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_telp">Nama Mitra</label>
                                <input type="text" class="form-control" id="mitra_name_edit" placeholder="Nama Mitra">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="" class="form-control" id="update_status_edit">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Tidak Aktif</option>
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
            url    : "<?= site_url('Perusahaan/check_berkas') ?>",
            type   : 'GET',
            cache  : false,
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
                $('#image_edit').attr("src", '<?= base_url() ?>' + 'upload/mitra/' + response.data[0].image_mitra)
                $("#mitra_name_edit").val(response.data[0].mitra_name)
                $("#update_status_edit").val(response.data[0].is_active)
                $('#modalEditMitra').modal('show');
            },
            error: function(data) {
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
                title: 'Apakah kamu yakin publish berita ini ? ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Publish !'
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
        /* Check Company */
        check_company()

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
            },
            dom: 'Blfrtip', // munculin export & show  entry
            "buttons": [{
                    "extend": 'excel',
                    "text": 'Export Excel',
                    "titleAttr": 'Excel',
                    "title": "Report Informasi Publik (news) - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Informasi Publik (news) - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3'
                },
            ],
        });

    });
</script>