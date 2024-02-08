<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddMitra"><i class="fas fa-plus"></i> Tambah <?= $tittle_2 ?> Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>total suara</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan / Desa</th>
                                <th>Dusun</th>
                                <th>rt</th>
                                <th>rw</th>
                                <th>tps</th>
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
<div class="modal fade" id="modalAddMitra" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Input <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select class="form-control" id="provinsi">
                                <option value="" disabled selected> === Pilih Provinsi === </option>
                                <?php foreach ($province as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"> <?= $value->name ?> </option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Kota / Kab</label>
                            <select class="form-control" name="" id="kota">
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select class="form-control" id="kecamatan"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Desa / Kelurahan</label>
                            <select class="form-control" id="kelurahan"></select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Dusun</label>
                            <input type="text" class="form-control" id="dusun" placeholder="Masukkan Dusun ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="number" class="form-control" id="rt" placeholder="Masukkan RT ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="number" class="form-control" id="rw" placeholder="Masukkan RW ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">(TPS)</label>
                            <input type="number" class="form-control" id="tps" placeholder="Masukkan Nomor TPS  ...">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Total Suara</label>
                            <input type="number" class="form-control" id="total_suara" placeholder="Masukkan Total Suara  ...">
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEditMitra" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Input <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select class="form-control" id="provinsi_edit">
                                <option value="" disabled selected> === Pilih Provinsi === </option>
                                <?php foreach ($province as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"> <?= $value->name ?> </option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Kota / Kab</label>
                            <select class="form-control" name="" id="kota_edit">
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select class="form-control" id="kecamatan_edit"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Desa / Kelurahan</label>
                            <select class="form-control" id="kelurahan_edit"></select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Dusun</label>
                            <input type="text" class="form-control" id="dusun_edit" placeholder="Masukkan Dusun ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="number" class="form-control" id="rt_edit" placeholder="Masukkan RT ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="number" class="form-control" id="rw_edit" placeholder="Masukkan RW ...">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">(TPS)</label>
                            <input type="number" class="form-control" id="tps_edit" placeholder="Masukkan Nomor TPS  ...">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Total Suara</label>
                            <input type="number" class="form-control" id="total_suara_edit" placeholder="Masukkan Total Suara  ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_suara_tps">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_edit"><i data-feather="save"></i> Save</button>
            </div>
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

    function getKota(id, id_city = 0, selector_id = 'kota_edit') {
        $.ajax({
            type: "GET",
            url: "<?= site_url($site_url . '/getCity') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: (response) => {
                let parseData = response.data
                let html = ''

                html += `<option value="" disabled selected># Pilih Kota/Kab #</option>`
                let no = 1
                parseData.forEach((key) => {
                    html += `<option ${key.id == id_city ? "selected" : ""} value="${key.id}">${key.name}</option>`
                })

                $('#' + selector_id).html(html);
            },
            error: (err) => {
                // ini pakein modal error ya 
            }
        })
    }

    function getKecamatan(id_city, id_prov, id_district = 0, selector_id = 'kecamatan_edit') {
        $.ajax({
            type: "GET",
            url: "<?= site_url($site_url . '/getDistrict') ?>",
            dataType: "json",
            data: {
                province_id: id_prov,
                city_id: id_city
            },
            success: (response) => {
                let parseData = response.data
                let html = ''

                html += `<option value="" disabled selected># Pilih Kecamatan #</option>`
                let no = 1
                parseData.forEach((key) => {
                    html += `<option ${key.id == id_district ? "selected" : ""} value="${key.id}">${key.name}</option>`
                })

                $('#' + selector_id).html(html);
            },
            error: (err) => {
                // ini pakein modal error ya 
            }
        })
    }

    function getKelurahan(district_id, province_id, city_id, id_subdistrict = 0, selector_id = 'kelurahan_edit') {
        $.ajax({
            type: "GET",
            url: "<?= site_url($site_url . '/getSubDistrict') ?>",
            dataType: "json",
            data: {
                district_id: district_id,
                province_id: province_id,
                city_id: city_id
            },
            success: (response) => {
                let parseData = response.data
                let html = ''

                html += `<option value="" disabled selected># Pilih Kelurahan #</option>`
                let no = 1
                parseData.forEach((key) => {
                    html += `<option ${key.id == id_subdistrict ? "selected" : ""} value="${key.id}">${key.name}</option>`
                })

                $('#' + selector_id).html(html);
            },
            error: (err) => {
                // ini pakein modal error ya 
            }
        })
    }

    function editRow(id) {
        $.ajax({
            url: "<?= site_url($site_url . '/edit/') ?>" + id,
            type: 'GET',
            success: function(response) {
                // console.log(response.data[0].id_role)
                $("#id_suara_tps").val(response.data[0].id)
                $("#provinsi_edit").val(response.data[0].province_id).trigger('change')
                getKota(response.data[0].province_id, response.data[0].city_id, 'kota_edit')
                getKecamatan(response.data[0].city_id, response.data[0].province_id, response.data[0].district_id, 'kecamatan_edit')
                getKelurahan(response.data[0].district_id, response.data[0].province_id, response.data[0].city_id, response.data[0].subdistrict_id, 'kelurahan_edit')

                $("#dusun_edit").val(response.data[0].dusun)
                $("#rt_edit").val(response.data[0].rt)
                $("#rw_edit").val(response.data[0].rw)
                $("#tps_edit").val(response.data[0].tps)
                $('#total_suara_edit').val(response.data[0].total_suara)

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
        

        $('#provinsi,#provinsi_edit').select2()
        $('#kota, #kota_edit,#kota_filter').select2()
        $('#kecamatan, #kecamatan_edit, #kecamatan_filter').select2()
        $('#kelurahan, #kelurahan_edit, #kelurahan_filter').select2()

        /* Proses Save Data */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('province_id', $('#provinsi').val());
            formData.append('city_id', $('#kota').val());
            formData.append('district_id', $('#kecamatan').val());
            formData.append('subdistrict_id', $('#kelurahan').val());

            formData.append('city_name', $('#kota').find(':selected').text());
            formData.append('kecamatan', $('#kecamatan').find(':selected').text());
            formData.append('kelurahan', $('#kelurahan').find(':selected').text());
            formData.append('dusun', $('#dusun').val());
            formData.append('rt', $('#rt').val());
            formData.append('rw', $('#rw').val());
            formData.append('tps', $('#tps').val());
            formData.append('total_suara', $('#total_suara').val());

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
            formData.append('id', $('#id_suara_tps').val());
            formData.append('province_id', $('#provinsi_edit').val());
            formData.append('city_id', $('#kota_edit').val());
            formData.append('district_id', $('#kecamatan_edit').val());
            formData.append('subdistrict_id', $('#kelurahan_edit').val());
            
            formData.append('kecamatan', $('#kecamatan_edit').find(':selected').text());
            formData.append('kelurahan', $('#kelurahan_edit').find(':selected').text());
            formData.append('dusun', $('#dusun_edit').val());
            formData.append('rt', $('#rt_edit').val());
            formData.append('rw', $('#rw_edit').val());
            formData.append('tps', $('#tps_edit').val());
            formData.append('total_suara', $('#total_suara_edit').val());

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

        $('#provinsi').on('change', function() {
            let id = $(this).val();
            let text = $(this).find(':selected').text();

            $.ajax({
                type: "GET",
                url: "<?= site_url($site_url . '/getCity') ?>",
                dataType: "json",
                data: {
                    id: id
                },
                success: (response) => {
                    let parseData = response.data
                    let html = ''

                    html += `<option value="" disabled selected># Pilih Kota/Kab #</option>`
                    let no = 1
                    parseData.forEach((key) => {
                        html += `<option value="${key.id}">${key.name}</option>`
                    })

                    $('#kota').html(html);
                },
                error: (err) => {
                    // ini pakein modal error ya 
                }
            })
        });

        $('#kota').on('change', function() {
            let id = $(this).val();

            $.ajax({
                type: "GET",
                url: "<?= site_url($site_url . '/getDistrict') ?>",
                dataType: "json",
                data: {
                    province_id: $('#provinsi').val(),
                    city_id: id
                },
                success: (response) => {
                    let parseData = response.data
                    let html = ''

                    html += `<option value="" disabled selected># Pilih Kecamatan #</option>`
                    let no = 1
                    parseData.forEach((key) => {
                        html += `<option value="${key.id}">${key.name}</option>`
                    })

                    $('#kecamatan').html(html);


                },
                error: (err) => {
                    // ini pakein modal error ya 
                }
            })
        });

        $('#kota_edit').on('change', function() {
            let id = $(this).val();;
            console.log(id)
            // $("#kota_edit").val(response.data[0].city_id).trigger('change')

            $.ajax({
                type: "GET",
                url: "<?= site_url($site_url . '/getDistrict') ?>",
                dataType: "json",
                data: {
                    province_id: $('#provinsi_edit').val(),
                    city_id: id
                },
                success: (response) => {
                    let parseData = response.data
                    let html = ''

                    html += `<option value="" disabled selected># Pilih Kecamatan #</option>`
                    let no = 1
                    parseData.forEach((key) => {
                        html += `<option value="${key.id}">${key.name}</option>`
                    })

                    $('#kecamatan_edit').html(html);
                },
                error: (err) => {
                    // ini pakein modal error ya 
                }
            })
        });

        $('#kota_filter').on('change', function() {
            let id = $(this).val();;
            getKecamatan(id, 15, 0, 'kecamatan_filter')
        });

        $('#kecamatan').on('change', function() {
            let id = $(this).val();

            $.ajax({
                type: "GET",
                url: "<?= site_url($site_url . '/getSubDistrict') ?>",
                dataType: "json",
                data: {
                    province_id: $('#provinsi').val(),
                    city_id: $('#kota').val(),
                    district_id: id
                },
                success: (response) => {
                    let parseData = response.data
                    let html = ''

                    html += `<option value="" disabled selected># Pilih Desa/Kelurahan #</option>`
                    let no = 1
                    parseData.forEach((key) => {
                        html += `<option value="${key.id}">${key.name}</option>`
                    })

                    $('#kelurahan').html(html);
                },
                error: (err) => {
                    // ini pakein modal error ya 
                }
            })
        });

        $('#kecamatan_edit').on('change', function() {
            let id = $(this).val();

            $.ajax({
                type: "GET",
                url: "<?= site_url($site_url . '/getSubDistrict') ?>",
                dataType: "json",
                data: {
                    province_id: $('#provinsi_edit').val(),
                    city_id: $('#kota_edit').val(),
                    district_id: id
                },
                success: (response) => {
                    let parseData = response.data
                    let html = ''

                    html += `<option value="" disabled selected># Pilih Desa/Kelurahan #</option>`
                    let no = 1
                    parseData.forEach((key) => {
                        html += `<option value="${key.id}">${key.name}</option>`
                    })

                    $('#kelurahan_edit').html(html);
                },
                error: (err) => {
                    // ini pakein modal error ya 
                }
            })
        });

        $('#kecamatan_filter').on('change', function() {
            let id = $(this).val();
            let kota_filter = $('#kota_filter').val();
            getKelurahan(id, 15, kota_filter, 0, 'kelurahan_filter')
        });

    });
</script>