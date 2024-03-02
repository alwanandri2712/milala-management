<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Reservasi Mobil Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Nomor Polisi</th>
                                <th>Nomor Rangka</th>
                                <th>Type Mobil</th>
                                <th>Tahun</th>
                                <th>Cabang</th>
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

<!-- Modal Add  -->
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
                        <label for="">Nama Pemilik</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pemilik" id="nama_pemilik">
                    </div>
                    <div class="col-12">
                        <label for="">Nomor Polisi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomor Polisi" id="nomor_polisi">
                    </div>
                    <div class="col-12">
                        <label for="">Nomor Rangka</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomor Rangka" id="nomor_rangka">
                    </div>
                    <div class="col-12">
                        <label for="">Type Mobil</label>
                        <input type="text" class="form-control" placeholder="Masukkan Type Mobil" id="type_mobil">
                    </div>
                    <div class="col-12">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" id="tahun">
                    </div>
                    <div class="col-12">
                        <label for="">Cabang</label>
                        <select name="" class="form-control" id="cabang">
                            <option value=""># Pilih Cabang #</option>
                            <option value="bekasi">BEKASI</option>
                            <option value="antasari">ANTASARI</option>
                            <option value="ampera">AMPERA</option>
                            <option value="bogor">BOGOR</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">Tanggal Booking</label>
                        <input type="date" class="form-control" id="tgl_reservasi">
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

<!-- Modal Edit -->
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
                        <label for="">Nama Pemilik</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pemilik" id="nama_pemilik_edit">
                    </div>
                    <div class="col-12">
                        <label for="">Nomor Polisi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomor Polisi" id="nomor_polisi_edit">
                    </div>
                    <div class="col-12">
                        <label for="">Nomor Rangka</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomor Rangka" id="nomor_rangka_edit">
                    </div>
                    <div class="col-12">
                        <label for="">Type Mobil</label>
                        <input type="text" class="form-control" placeholder="Masukkan Type Mobil" id="type_mobil_edit">
                    </div>
                    <div class="col-12">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" placeholder="Tahun" id="tahun_edit">
                    </div>
                    <div class="col-12">
                        <label for="">Cabang</label>
                        <select name="" class="form-control" id="cabang_edit">
                            <option value=""># Pilih Cabang #</option>
                            <option value="bekasi">BEKASI</option>
                            <option value="antasari">ANTASARI</option>
                            <option value="ampera">AMPERA</option>
                            <option value="bogor">BOGOR</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">Tanggal Booking</label>
                        <input type="date" class="form-control" id="tgl_reservasi_edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_reserve">
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
                $("#id_reserve").val(response.data[0].id_reserve)
                $("#nama_pemilik_edit").val(response.data[0].nama_pemilik)
                $('#nomor_polisi_edit').val(response.data[0].no_polisi)
                $('#nomor_rangka_edit').val(response.data[0].no_rangka)
                $('#type_mobil_edit').val(response.data[0].type_mobil)
                $('#tahun_edit').val(response.data[0].tahun)
                $('#cabang_edit').val(response.data[0].cabang)
                $('#tgl_reservasi').val(response.data[0].tgl_reservasi)
                $('#modalEdit').modal('show');
            },
            error: function(data) {
                swal("Error", "Gagal Fetch Data", "error");
            }
        })
    }

    var table;
    $(document).ready(function() {

        table = $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
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
            dom: 'Blfrtip', // munculin export & show  entry
            "buttons": [{
                    "extend": 'excel',
                    "text": 'Export Excel',
                    "titleAttr": 'Excel',
                    "title": "Report Reservasi Mobil - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Reservasi Mobil - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3'
                },
            ],

        });

        /* Proses Save */
        $('#save').click(function() {
            let nama_pemilik  = $('#nama_pemilik').val()
            let nomor_polisi  = $('#nomor_polisi').val()
            let nomor_rangka  = $('#nomor_rangka').val()
            let type_mobil    = $('#type_mobil').val()
            let tahun         = $('#tahun').val()
            let cabang        = $('#cabang').val()
            let tgl_reservasi = $('#tgl_reservasi').val()

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                data: {
                    nama_pemilik : nama_pemilik,
                    nomor_polisi : nomor_polisi,
                    nomor_rangka : nomor_rangka,
                    type_mobil   : type_mobil,
                    tahun        : tahun,
                    cabang       : cabang,
                    tgl_reservasi: tgl_reservasi
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
                        $('#nama_pemilik,#nomor_polisi,#nomor_rangka,#type_mobil,#tahun,#cabang').val('')
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
                    $('#nama_pemilik,#nomor_polisi,#nomor_rangka,#type_mobil,#tahun,#cabang').val('')
                    $('#datatables').DataTable().draw();
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let id_reserve    = $('#id_reserve').val()
            let nama_pemilik  = $('#nama_pemilik_edit').val()
            let nomor_polisi  = $('#nomor_polisi_edit').val()
            let nomor_rangka  = $('#nomor_rangka_edit').val()
            let type_mobil    = $('#type_mobil_edit').val()
            let tahun         = $('#tahun_edit').val()
            let cabang        = $('#cabang_edit').val()
            let tgl_reservasi = $('#tgl_reservasi_edit').val()

            $.ajax({
                url: '<?= site_url($site_url . '/edit') ?>',
                type: 'POST',
                data: {
                    id           : id_reserve,
                    nama_pemilik : nama_pemilik,
                    nomor_polisi : nomor_polisi,
                    nomor_rangka : nomor_rangka,
                    type_mobil   : type_mobil,
                    tahun        : tahun,
                    cabang       : cabang,
                    tgl_reservasi: tgl_reservasi
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
                        $('#modalEdit').modal('hide');
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
                    $('#modalEdit').modal('hide');
                    $('#datatables').DataTable().draw();
                }
            });
        });

    });
</script>