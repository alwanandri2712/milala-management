<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <a href="<?= base_url('news/add_artikel') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</a></a>
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

    function publish(id) {
        Swal.fire({
                title: 'Apakah kamu yakin publish berita ini ? ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Publish!'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url($site_url . '/publish') ?>",
                        type: 'POST',
                        data: {
                            id: id
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
                "url": "<?= site_url($site_url . '/ajax_datatable_artikel') ?>",
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
                    "title": "Report Artikel - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Artikel - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3'
                },
            ],
        });

    });
</script>