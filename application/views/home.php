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
        <!-- total berita -->
        <div class="col-sm-6 col-lg-4">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Reservasi</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= '1' ?></h3>
                </div>
            </div>
        </div>
        <!-- total agenda -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Tugas</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= '50' ?></h3>
                </div>
            </div>
        </div>
        <!-- total user -->
        <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total User</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= '1' ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Selesai </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= '100' ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas On Proggres </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= '20' ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4 mg-t-10">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Tugas Pending </h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?= '10' ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card">
                <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0"><i data-feather="volume-2"></i> INFORMASI HARI LIBUR BULAN INI !! [<?= $current_bulan ?> - <?= $current_tahun ?>] </h6>
                </div>
                <div class="card-body pd-t-25">
                    <?php foreach ($data_hari_libur as $key => $value) { ?>
                        <div class="alert alert-outline alert-primary d-flex align-items-center" role="alert">
                            <i data-feather="info" class="mg-r-10"></i> 
                            <?= formatDate($value->holiday_date) . " [" .$value->holiday_date. "]" ?> - <?= $value->holiday_name ?> - [Nasional ? <?= $value->is_national_holiday == 1 ? 'Ya' : 'Tidak' ?>]
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>

<script type="text/javascript">
    function grafikKabupaten(label, data) {
        var ChartKelulusan = (function() {
            var ctxLabel = ['Kab. Banyuwangi', 'Kab. Bondowoso', 'Kab. Situbondo'];
            var ctxColor1 = '#ff4a4a';
            var ctxColor2 = '#1ce1ac';
            var chart_kelulusan = $('#grafik_kabupaten');

            function init($this) {
                if (window.ChartKelulusan instanceof Chart) {
                    window.ChartKelulusan.destroy();
                }
                window.ChartKelulusan = new Chart($this, {
                    type: 'bar',
                    data: {
                        labels: ctxLabel,
                        datasets: [{
                            data: [100, 50, 20],
                            backgroundColor: ctxColor2
                        }]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                anchor: 'center',
                                align: 'center',
                                color: '#030202', // warna teks
                                font: {
                                    weight: 'bold'
                                }
                            }
                        },
                        maintainAspectRatio: true,
                        responsive: true,
                        legend: {
                            display: false,
                            labels: {
                                display: false
                            }
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: '#e5e9f2'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 10,
                                    fontColor: '#182b49',
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: true
                                },
                                barPercentage: 0.3,
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: '#182b49'
                                }
                            }]
                        }
                    }
                });

                $(this).data('chart_kelulusan', ChartKelulusan);
            }

            // Events
            if (chart_kelulusan.length) {
                init(chart_kelulusan);
            }
        })();
    }

    function grafikKelulusanTahunBulan(label, data_lulus, data_tidak_lulus) {
        var ChartKelulusan2 = (function() {
            var ctxLabel = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            // var data_tidak_lulus = [10, 60, 50, 45, 50, 60, 70, 40, 45, 35, 25, 30];
            // var data_lulus       = [10, 40, 30, 40, 60, 55, 45, 35, 30, 20, 15, 20];
            var ctxColor1 = '#ff4a4a';
            var ctxColor2 = '#1ce1ac';
            var chart_kelulusan2 = $('#chartBar2');

            function init($this) {
                if (window.ChartKelulusan2 instanceof Chart) {
                    window.ChartKelulusan2.destroy();
                }
                window.ChartKelulusan2 = new Chart($this, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Tidak Lulus',
                            data: data_tidak_lulus,
                            backgroundColor: ctxColor1
                        }, {
                            label: 'Lulus',
                            data: data_lulus,
                            backgroundColor: ctxColor2
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false,
                            labels: {
                                display: false
                            }
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: '#e5e9f2'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 10,
                                    fontColor: '#182b49',
                                    max: 80
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                },
                                barPercentage: 0.6,
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 11,
                                    fontColor: '#182b49'
                                }
                            }]
                        }
                    }
                });

                $(this).data('chart_kelulusan2', ChartKelulusan2);

            };
            // Events
            if (chart_kelulusan2.length) {
                init(chart_kelulusan2);
            }

        })();
    }

    async function loadDataGrafikKabupaten() {
        await $.ajax({
            method: "GET",
            url: "<?= base_url($site_url . '/grafik_kabupaten') ?>",
            cache: false,
            dataType: "json",
            success: function(hasil) {
                let label = hasil.label
                let data = hasil.data
                grafikKabupaten(label, data)
            },

        });
    }

    async function loadDataGrafikKelulusanTahunBulan(tahun, bulan) {
        await $.ajax({
            method: "POST",
            url: "<?= base_url($site_url . '/grafik_kelulusan_bulan_tahun') ?>",
            cache: false,
            data: {
                tahun: tahun,
                bulan: bulan
            },
            dataType: "json",
            success: function(hasil) {
                let label = hasil.label
                let data_lulus = hasil.data_kelulusan
                let data_tidak_lulus = hasil.data_tidak_lulus
                grafikKelulusanTahunBulan(label, data_lulus, data_tidak_lulus)
            },

        });
    }

    var table;
    $(document).ready(function() {
        // grafikKabupaten()
        loadDataGrafikKabupaten()
        <?php if ($this->session->userdata('id_role') == 1) { ?>

            table = $('#datatables-kecamatan').DataTable({
                "processing": true,
                "serverSide": true,
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
                        "title": "Report Kecamatan - <?= date('Y-m-d H:i:s') ?>",
                        "action": newexportaction,
                        "className": 'btn-success rounded mb-3'
                    },
                    {
                        "extend": 'pdf',
                        "text": 'Export PDF',
                        "titleAttr": 'PDF',
                        "title": "Report Kecamatan - <?= date('Y-m-d H:i:s') ?>",
                        "action": newexportaction,
                        "className": 'btn-danger rounded mb-3',
                    },
                ],
            });


            var tahun = $('#tahun').val()
            var bulan = $("#bulan_2").val()
            console.log(bulan)
            // loadDataGrafikKelulusanTahun(tahun)
            // loadDataGrafikKelulusanTahunBulan(tahun, bulan)

            $('#tahun').on('change', function() {
                console.log($(this).val())
                loadDataGrafikKelulusanTahun($(this).val())
            })

            $('#tahun_2, #bulan_2').on('change', function() {
                var tahun = $('#tahun_2').val();
                var bulan = $("#bulan_2").val();
                loadDataGrafikKelulusanTahunBulan(tahun, bulan)
            })
        <?php }  ?>
    })
</script>