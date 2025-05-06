<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                    <h6 class="mg-b-5">Daftar Pesan Kontak</h6>
                    <p class="mg-b-0 tx-color-03">Pesan yang dikirim melalui form kontak di website.</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Layanan</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Message -->
<div class="modal fade" id="modalViewMessage" tabindex="-1" role="dialog" aria-labelledby="modalViewMessageLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalViewMessageLabel">Detail Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama:</label>
                            <p id="view-name"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Telepon:</label>
                            <p id="view-phone"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Email:</label>
                            <p id="view-email"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Layanan:</label>
                            <p id="view-service"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Status:</label>
                            <p id="view-status"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal:</label>
                            <p id="view-date"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Pesan:</label>
                            <div id="view-message" class="p-3 bg-light rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-mark-as-read">Tandai Dibaca</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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
                        text: 'Terjadi kesalahan saat memuat data. Pastikan tabel contact_messages sudah dibuat di database.',
                        footer: '<a href="javascript:void(0)" onclick="showErrorDetails(\'' + error + '\', \'' + xhr.responseText + '\')">Lihat detail error</a>'
                    });
                }
            },
            columnDefs: [{
                targets: [0, 5, 6],
                orderable: false,
            }],
            order: [[7, 'desc']] // Order by date
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
        
        // Handle mark as read button in modal
        $('#btn-mark-as-read').click(function() {
            var id = $(this).data('id');
            mark_as_read(id);
        });
    });
    
    // Function to view message
    function view_data(id) {
        $.ajax({
            url: "<?= base_url($site_url . '/get_data') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#view-name').text(data.name);
                $('#view-phone').text(data.phone);
                $('#view-email').text(data.email);
                $('#view-service').text(data.service);
                $('#view-message').text(data.message);
                
                if (data.status == 'unread') {
                    $('#view-status').html('<span class="badge badge-danger">Belum Dibaca</span>');
                    $('#btn-mark-as-read').show().data('id', data.id);
                } else {
                    $('#view-status').html('<span class="badge badge-success">Sudah Dibaca</span>');
                    $('#btn-mark-as-read').hide();
                }
                
                $('#view-date').text(formatDate(data.created_at));
                
                $('#modalViewMessage').modal('show');
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
    
    // Function to mark message as read
    function mark_as_read(id) {
        $.ajax({
            url: "<?= base_url($site_url . '/mark_as_read') ?>",
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
                    $('#modalViewMessage').modal('hide');
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
    
    // Function to delete message
    function hapus_data(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pesan yang dihapus tidak dapat dikembalikan!",
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
    
    // Helper function to format date
    function formatDate(dateString) {
        var date = new Date(dateString);
        var day = date.getDate().toString().padStart(2, '0');
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'][date.getMonth()];
        var year = date.getFullYear();
        var hours = date.getHours().toString().padStart(2, '0');
        var minutes = date.getMinutes().toString().padStart(2, '0');
        
        return day + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes;
    }
</script>
