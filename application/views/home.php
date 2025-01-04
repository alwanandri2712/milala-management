<style>
    #list_koordinator {
        max-height: 400px;
        /* Atur ketinggian maksimum elemen */
        overflow-y: auto;
        /* Tambahkan bilah geser vertikal jika kontennya lebih tinggi dari ketinggian maksimum */
    }
</style>
<div class="row row-xs">

    <!-- ROLE ADMINISTRATOR  -->
    <?php if ($this->session->userdata('id_role') == 1) : ?>
        <!-- total Reservasi -->
        <div class="col-sm-6 col-lg-4">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Pengajuan Fasilitas Bengkel</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= '1' ?></h3>
                </div>
            </div>
        </div>
        <!-- total Total Tugas -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Tugas</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $total_tugas ?></h3>
                </div>
            </div>
        </div>
        <!-- total user -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total User</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $count_users ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Selesai </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_completed ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas On Proggres </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_progress ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Pending </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_pending ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas Selesai </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_pengajuan_fasilitas_selesai ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas On Proggres </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_pengajuan_fasilitas_onproggress ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas Ditolak </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $count_pengajuan_fasilitas_ditolak ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="calendar"></i> KALENDER LIBUR BULAN INI !! [<?= $current_bulan ?> - <?= $current_tahun ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <?php foreach ($data_hari_libur as $key => $value) { ?>
                        <div class="alert alert-outline alert-primary d-flex align-items-center" role="alert">
                            <i data-feather="info" class="mg-r-10"></i>
                            <?= formatDate($value->holiday_date) . " [" . $value->holiday_date . "]" ?> - <?= $value->holiday_name ?> - [Nasional ? <?= $value->is_national_holiday == 1 ? 'Ya' : 'Tidak' ?>]
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="list"></i> Task Lisk On Proggres & Pending </h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-task">
                            <thead>
                                <tr>
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
    <?php endif; ?>

    <!-- ROLE IT -->
    <?php if ($this->session->userdata('id_role') == 5) : ?>
        <div class="col-sm-4 col-lg-4">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Selesai </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_completed ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas On Proggres </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_progress ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Pending </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_tugas_pending ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="calendar"></i> KALENDER LIBUR BULAN INI !! [<?= $current_bulan ?> - <?= $current_tahun ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <?php foreach ($data_hari_libur as $key => $value) { ?>
                        <div class="alert alert-outline alert-primary d-flex align-items-center" role="alert">
                            <i data-feather="info" class="mg-r-10"></i>
                            <?= formatDate($value->holiday_date) . " [" . $value->holiday_date . "]" ?> - <?= $value->holiday_name ?> - [Nasional ? <?= $value->is_national_holiday == 1 ? 'Ya' : 'Tidak' ?>]
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Kompetensi [<?= date('Y-m') ?>]</h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-kompetensi">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Human Error [<?= date('Y-m') ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-human-error">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- role staff admin -->
    <?php if ($this->session->userdata('id_role') == 7) : ?>
        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas Selesai </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_pengajuan_fasilitas_selesai ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas On Proggres </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $total_pengajuan_fasilitas_onproggress ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pengajuan Fasilitas Ditolak </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= $count_pengajuan_fasilitas_ditolak ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Kompetensi [<?= date('Y-m') ?>]</h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-kompetensi">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Human Error [<?= date('Y-m') ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-human-error">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- mekanik -->
    <?php if ($this->session->userdata('id_role') == 8) : ?>
        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Kompetensi [<?= date('Y-m') ?>]</h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-kompetensi">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Human Error [<?= date('Y-m') ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-human-error">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- kepala bengkel -->
    <?php if ($this->session->userdata('id_role') == 9) : ?>
        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Kompetensi [<?= date('Y-m') ?>]</h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-kompetensi">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="smile"></i> Human Error [<?= date('Y-m') ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatables-human-error">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<script type="text/javascript">
    var table;
    $(document).ready(function() {
        <?php if (in_array($this->session->userdata('id_role'), [5, 7, 8, 9])) { ?> /* Role staff admin, mekanik, kepala bengkel  */

            table = $('#datatables-kompetensi').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "order": [],
                "ajax": {
                    "url": "<?= site_url($site_url . '/datatables_kompetensi') ?>",
                    "type": "POST"
                },
                "language": {
                    "sProcessing": "Sedang memproses...",
                    "sZeroRecords": "Data Kosong",
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
            });

            table = $('#datatables-human-error').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "order": [],
                "ajax": {
                    "url": "<?= site_url($site_url . '/datatables_human_error') ?>",
                    "type": "POST"
                },
                "language": {
                    "sProcessing": "Sedang memproses...",
                    "sZeroRecords": "Data Kosong",
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
            });
        <?php }  ?>

        <?php if ($this->session->userdata('id_role') == 1) { ?>
            table = $('#datatables-task').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= site_url($site_url . '/datatables_list_task') ?>",
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
        <?php } ?>
    })
</script>