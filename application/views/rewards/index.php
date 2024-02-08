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
                                <th>Judul Laporan</th>
                                <th>Nama Pelapor</th>
                                <th>Status</th>
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


<script type="text/javascript">

    function kirim_balasan(email,judul_laporan) {
        $('#judul_laporan_balasan').val(judul_laporan);
        $('#to_email').val(email);
        $('#modalKirimBalasan').modal('show');
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

        $('#kirim_balasan').click(function(){

            $.ajax({
                url: "<?= site_url($site_url . '/send_email_balasan') ?>",
                type: 'POST',
                data: {
                    'judul_laporan': $('#judul_laporan_balasan').val(),
                    'tanggapan'    : $('#message_balasan').val(),
                    'email'        : $('#to_email').val(),
                },
                beforeSend: function() {
                    $("#kirim_balasan").prop('disabled', true);
                    $('#kirim_balasan').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            $('#modalKirimBalasan').modal('hide');
                            $('#datatables').DataTable().draw();

                        });

                    } else {
                        Swal.fire({
                            title: "Error",
                            text: result.message,
                            icon: "error",
                            button: "OK",
                        });
                    }
                    $("#kirim_balasan").prop('disabled', false);
                    $('#kirim_balasan').html('<i data-feather="save"></i> Balas Laporan');
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#kirim_balasan").prop('disabled', false);
                    $('#kirim_balasan').html('<i data-feather="save"></i> Balas Laporan');
                }
            })
        })

        /* Proses Save category */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('logo_mitra', $('#logo_mitra').prop('files')[0] == undefined ? 'kosong' : $('#logo_mitra').prop('files')[0]);
            formData.append('title', $('#judul_laporan').val());
            formData.append('fullname', $('#nama_pelapor').val());
            formData.append('email', $('#email_pelapor').val());
            formData.append('status', $('#status_add').val());
            formData.append('description', $('#description_pelapor').val());

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
            formData.append('logo_mitra', 'kosong');
            formData.append('id', $('#id_mitra').val());
            formData.append('title', $('#judul_laporan_edit').val());
            formData.append('fullname', $('#nama_pelapor_edit').val());
            formData.append('email', $('#email_pelapor_edit').val());
            formData.append('status', $('#status_add_edit').val());
            formData.append('description', $('#description_pelapor_edit').val());

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