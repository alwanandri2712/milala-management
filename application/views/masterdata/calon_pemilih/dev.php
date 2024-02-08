<style>
    #cam {
        width: 100%;
        height: auto;
        display: block;
    }

    #result_capt {
        width: 100%;
        height: auto;
        display: block;
    }

    #modalAddMitra {
        overflow-y: scroll;
    }

    img {
        display: block;
        max-width: 100%;
    }
</style>
<div class="row row-xs">
    <div class="col-12">
        <div class="card shadow-ppq">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label for="">Filter Koordinator</label>
                        <select class="form-control" id="list_koordinator">
                            <option value="" disabled selected># Select Koordinator #</option>
                            <?php foreach ($koordinator_name as $kn) : ?>
                                <option value="<?= $kn->koordinator_name ?>"><?= $kn->koordinator_name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Kota / Kab</label>
                            <select class="form-control" id="kota_filter">
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select class="form-control" id="kecamatan_filter"></select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Desa / Kelurahan</label>
                            <select class="form-control" id="kelurahan_filter"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-warning btn-block" id="refresh_filter"><i class="faa fas-refresh"></i> Refresh</button>
                    </div>
                    <div class="col-6">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-primary btn-block" id="filter_koordinator"><i class="fa fa-search"></i> Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">

            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAddMitra"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalImportExcel"><i class="fas fa-plus"></i> Import <?= $tittle_2 ?> Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Koordinator Name</th>
                                <th>Nama Lengkap</th>
                                <th>nik</th>
                                <th>jenis kelamin</th>
                                <th>usia</th>
                                <th>kecamatan</th>
                                <th>kelurahan</th>
                                <th>dusun</th>
                                <th>rt</th>
                                <th>rw</th>
                                <th>no_whatsapp</th>
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
                <h2 class="modal-title" id="modal-title-mitra">Tambah <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalScanKTP"> Scan With KTP</button> -->
                        <button class="btn btn-primary" id="scan_ktp"><i data-feather="camera"></i> Scan With KTP</button>
                        <button class="btn btn-primary" id="cek_nik_dpt"><i data-feather="search"></i> Check DPT By Nik</button>
                    </div>
                    <?php if ($this->session->userdata('id_role') != 5) { ?>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Koordinator <span class="text-danger">* Required Data Ini Dari siapa</span> </label>
                                <input type="text" class="form-control" id="caleg_name" placeholder="Masukkan Nama Koordinator">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama Lengkap <span class="text-danger">* Harus Diisi</span> </label>
                            <input type="text" class="form-control" id="fullname" placeholder="Masukkan Nama Lengkap ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">NIK KTP</label>
                            <input type="text" class="form-control" id="nik_ktp" placeholder="Masukkan NIK ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_telp">Jenis Kelamin</label>
                            <select name="" class="form-control" id="jenis_kelamin">
                                <option value="" disabled selected>== Pilih Kelamin == </option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Usia</label>
                            <input type="number" class="form-control" id="usia" placeholder="Masukkan Usia ...">
                        </div>
                    </div>
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
                            <label for="">Nomor Whatsapp</label>
                            <input type="number" class="form-control" id="nomor_whatsapp" placeholder="Masukkan Nomor Whatsapp ...">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">(TPS)</label>
                            <input type="number" class="form-control" id="tps" placeholder="Masukkan Nomor TPS  ...">
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

<!-- modal edit -->
<div class="modal fade" id="modalEditMitra" tabindex="-1" role="dialog" aria-labelledby="modalEditMitra" aria-hidden="true">
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
                    <div class="col-md-12">
                        <button class="btn btn-primary" id="cek_nik_dpt_edit"><i data-feather="search"></i> Check DPT By Nik</button>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Caleg Name </label>
                            <input type="text" class="form-control" id="caleg_name_edit" placeholder="Masukkan Nama Caleg">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname_edit" placeholder="Masukkan Nama Lengkap ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">NIK KTP</label>
                            <input type="text" class="form-control" id="nik_ktp_edit" placeholder="Masukkan NIK ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_telp">Jenis Kelamin</label>
                            <select name="" class="form-control" id="jenis_kelamin_edit">
                                <option value="" disabled selected>== Pilih Kelamin == </option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Usia</label>
                            <input type="number" class="form-control" id="usia_edit" placeholder="Masukkan Usia ...">
                        </div>
                    </div>
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
                            <select class="form-control" name="kota_edit" id="kota_edit">
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
                            <label for="">Nomor Whatsapp</label>
                            <input type="number" class="form-control" id="nomor_whatsapp_edit" placeholder="Masukkan Nomor Whatsapp ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">(TPS)</label>
                            <input type="number" class="form-control" id="tps_edit" placeholder="Masukkan Nomor TPS  ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_calon">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_edit"><i data-feather="save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal scan with ktp -->
<div class="modal fade" id="modalScanKTP" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">SCAN KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" class="form-control" id="file_ktp"> <br>
                <div class="img-container">
                    <img id="imageKTPOCR" src="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="proses_scan_ktp"><i data-feather="printer"></i> Scan Ktp </button>
                <!-- <button type="button" class="btn btn-warning" id="retake_ktp"> <i data-feather="refresh-ccw"></i> Retake</button>
                <button type="button" class="btn btn-primary" id="capture_ktp"><i data-feather="save"></i> Capture !</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="modalImportExcel" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">Import Excel <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-sm-12">
                        <label for="">File Excel</label>
                        <input type="file" name="fileExcelImport" id="fileExcelImport" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveImportExcel"><i data-feather="save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var image = document.getElementById('imageKTPOCR');

    var cropper;
    $("#file_ktp").change(function(e) {
        var files = e.target.files;
        var done = function(url) {
            $("#imageKTPOCR").attr("src", url);
            // Menghapus Cropper sebelum membuat yang baru
            if (cropper) {
                cropper.destroy();
            }
            // Inisialisasi Cropper untuk gambar yang baru
            cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                minContainerWidth: '50%',
                minContainerHeight: '50%'
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        } else {
            // Jika tidak ada file yang dipilih, bersihkan preview
            $("#imageKTPOCR").attr("src", "");
            // Menghapus Cropper jika ada
            if (cropper) {
                cropper.destroy();
            }
        }
    });
</script>

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

    function getKelurahanByname(data) {
        $.ajax({
            type: "POST",
            url: "<?= site_url($site_url . '/getKelurahanByname') ?>",
            dataType: "json",
            async: true,
            data: {
                kelurahan_name: data,
            },
            success: (response) => {
                let data = response.data[0]
                // console.log(data)
                $("#provinsi").val(data.province_id).trigger('change')
                getKota(data.province_id, data.city_id, 'kota')
                getKecamatan(data.city_id, data.province_id, data.district_id, 'kecamatan')
                getKelurahan(data.district_id, data.province_id, data.city_id, data.id, 'kelurahan')
                // return data
            },
            error: (err) => {
                // ini pakein modal error ya 
            }
        })
    }

    function getKelurahanByDPT(kota, kecamatan, kelurahan) {
        $.ajax({
            type: "POST",
            url: "<?= site_url($site_url . '/getKelurahanBynameForDPT') ?>",
            dataType: "json",
            async: true,
            data: {
                kota: kota,
                kecamatan: kecamatan,
                kelurahan_name: kelurahan
            },
            success: (response) => {
                let data = response.data[0]
                // console.log(data)
                $("#provinsi").val(data.province_id).trigger('change')
                getKota(data.province_id, data.city_id, 'kota')
                getKecamatan(data.city_id, data.province_id, data.district_id, 'kecamatan')
                getKelurahan(data.district_id, data.province_id, data.city_id, data.id, 'kelurahan')
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
                $("#id_calon").val(response.data[0].id)
                $('#caleg_name_edit').val(response.data[0].koordinator_name)
                $("#fullname_edit").val(response.data[0].fullname)
                $("#nik_ktp_edit").val(response.data[0].nik)
                $('#jenis_kelamin_edit').val(response.data[0].jenis_kelamin).trigger('change')
                $("#usia_edit").val(response.data[0].usia)
                $("#provinsi_edit").val(response.data[0].province_id).trigger('change')
                getKota(response.data[0].province_id, response.data[0].city_id, 'kota_edit')
                getKecamatan(response.data[0].city_id, response.data[0].province_id, response.data[0].district_id, 'kecamatan_edit')
                getKelurahan(response.data[0].district_id, response.data[0].province_id, response.data[0].city_id, response.data[0].subdistrict_id, 'kelurahan_edit')

                // $("#kecamatan_edit").val(response.data[0].district_id).trigger('change')
                // $("#kelurahan_edit").val(response.data[0].subdistrict_id).trigger('change')
                $("#dusun_edit").val(response.data[0].dusun)
                $("#rt_edit").val(response.data[0].rt)
                $("#rw_edit").val(response.data[0].rw)
                $("#nomor_whatsapp_edit").val(response.data[0].no_whatsapp)
                $("#tps_edit").val(response.data[0].tps)

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

    function hitungUsia(tanggalLahir) {
        // Memisahkan tanggal, bulan, dan tahun dari string tanggalLahir
        var parts = tanggalLahir.split("-");
        var dob = new Date(parts[2], parts[1] - 1, parts[0]);

        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Menghitung selisih tahun antara tanggal lahir dan hari ini
        var age = today.getFullYear() - dob.getFullYear();

        // Memeriksa apakah sudah ulang tahun atau belum pada tahun ini
        if (
            today.getMonth() < dob.getMonth() ||
            (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())
        ) {
            age--;
        }

        return age;
    }

    function removeNonAlphanumeric(inputString) {
        // Menghapus karakter setelah '\n'
        var result = inputString.replace(/\n.*/g, '');

        // Hanya menyimpan huruf, angka, dan spasi
        result = result.replace(/[^a-zA-Z0-9 ]/g, '');

        // Menghapus spasi ekstra
        result = result.trim();

        return result;
    }

    function detectLaki(text) {
        var uppercaseText = text.toUpperCase();

        // Mengecek apakah teks mengandung kata "LAKI"
        var containsLaki = uppercaseText.includes('LAKI');

        if (containsLaki) {
            return true;
        } else {
            return false;
        }

        // return containsLaki;
    }

    function loadDatatables(koordinator_name,kota,kecamatan,kelurahan) {
        table = $('#datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url($site_url . '/ajax_datatable') ?>",
                "type": "POST",
                "data": {
                    koordinator_name: koordinator_name,
                    kota            : kota,
                    kecamatan       : kecamatan,
                    kelurahan       : kelurahan
                }
            },
            responsive: true,
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
                    "title": "Report Calon Pemilih - <?= date('Y-m-d H:i:s') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Calon Pemilih - <?= date('Y-m-d H:i:s') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3',
                    "orientation": 'landscape',
                    "pageSize": 'LEGAL'
                },
            ],
        });
    }

    var table;
    $(document).ready(function() {
        loadDatatables()
        getKota(15,0,'kota_filter')

        $('#filter_koordinator').click(() => {
            table.destroy();
            let koordinator_name = $('#list_koordinator').val()
            let kota             = $('#kota_filter').val()
            let kecamatan        = $('#kecamatan_filter').val()
            let kelurahan        = $('#kelurahan_filter').val()
            loadDatatables(koordinator_name, kota, kecamatan, kelurahan)
        })

        $('#refresh_filter').click(() => {
            table.destroy();
            loadDatatables()
            $('#list_koordinator,#kota_filter,#kecamatan_filter,#kelurahan_filter').val('').trigger('change');
        })

        $('#provinsi,#provinsi_edit').select2()
        $('#kota, #kota_edit,#kota_filter').select2()
        $('#kecamatan, #kecamatan_edit, #kecamatan_filter').select2()
        $('#kelurahan, #kelurahan_edit, #kelurahan_filter').select2()

        $('#scan_ktp').click(function() {
            $('#modalScanKTP').modal('show');
        })

        $('#proses_scan_ktp').click(function() {
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 500,
                    height: 500,
                });
                let imageDataCanva = canvas.toDataURL();
                var formData = {
                    image: imageDataCanva,
                }

                $.ajax({
                    url: "<?= site_url($site_url . '/scan_ktp2') ?>",
                    method: "POST",
                    data: formData,
                    cache: true,
                    async: true,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#proses_scan_ktp').html('Scanning <i class="fa fa-spin fa-spinner"></i>')
                    },
                    success: function(res) {
                        let data = res.result
                        if (data != null) {
                            let kelurahandesa = removeNonAlphanumeric(data.kelurahanDesa.value)
                            let getDataKelurahan = getKelurahanByname(kelurahandesa)
                            let nik = data.nik.value
                            let fullname = data.nama.value
                            let checkGender = detectLaki(data.jenisKelamin.value)
                            let jenis_kelamin = checkGender == true ? "L" : "P"
                            let rt = data.rt.value
                            let rw = data.rw.value
                            let tanggal_lahir = data.tanggalLahir.value
                            let usia = hitungUsia(tanggal_lahir)

                            $('#nik_ktp').val(nik)
                            $('#fullname').val(fullname)
                            $('#jenis_kelamin').val(jenis_kelamin)
                            $('#rt').val(rt)
                            $('#rw').val(rw)
                            $('#usia').val(usia)
                            $('#modalScanKTP').modal('hide')
                            $('#proses_scan_ktp').html('<i data-feather="printer"></i> Scan Ktp')
                        } else {
                            $('#modalScanKTP').modal('hide')
                            $('#proses_scan_ktp').html('<i data-feather="printer"></i> Scan Ktp')
                        }
                    },
                    error: function(err) {
                        $('#modalScanKTP').modal('hide')
                        $('#proses_scan_ktp').html('<i data-feather="printer"></i> Scan Ktp')
                    }
                })
            }

        })

        /* Proses Save category */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('koordinator_name', $('#caleg_name').val());
            formData.append('province_id', $('#provinsi').val());
            formData.append('city_id', $('#kota').val());
            formData.append('district_id', $('#kecamatan').val());
            formData.append('subdistrict_id', $('#kelurahan').val());

            formData.append('fullname', $('#fullname').val());
            formData.append('nik', $('#nik_ktp').val());
            formData.append('jenis_kelamin', $('#jenis_kelamin').val());
            formData.append('usia', $('#usia').val());
            formData.append('kecamatan', $('#kecamatan').find(':selected').text());
            formData.append('kelurahan', $('#kelurahan').find(':selected').text());
            formData.append('dusun', $('#dusun').val());
            formData.append('rt', $('#rt').val());
            formData.append('rw', $('#rw').val());
            formData.append('no_whatsapp', $('#nomor_whatsapp').val());
            formData.append('tps', $('#tps').val());

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
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

                        $('#fullname, #nik_ktp, #jenis_kelamin, #usia, #dusun, #rt, #rw, #nomor_whatsapp, #tps').val('')
                        // $('#fullname, #nik_ktp, #jenis_kelamin, #usia, #nomor_whatsapp, #tps').val('')
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
            let id = $('#id_calon').val();
            let formData = new FormData();
            formData.append('id', id);

            formData.append('koordinator_name', $('#caleg_name_edit').val());
            formData.append('province_id', $('#provinsi_edit').val());
            formData.append('city_id', $('#kota_edit').val());
            formData.append('district_id', $('#kecamatan_edit').val());
            formData.append('subdistrict_id', $('#kelurahan_edit').val());

            formData.append('fullname', $('#fullname_edit').val());
            formData.append('nik', $('#nik_ktp_edit').val());
            formData.append('jenis_kelamin', $('#jenis_kelamin_edit').val());
            formData.append('usia', $('#usia_edit').val());
            formData.append('kecamatan', $('#kecamatan_edit').find(':selected').text());
            formData.append('kelurahan', $('#kelurahan_edit').find(':selected').text());
            formData.append('dusun', $('#dusun_edit').val());
            formData.append('rt', $('#rt_edit').val());
            formData.append('rw', $('#rw_edit').val());
            formData.append('no_whatsapp', $('#nomor_whatsapp_edit').val());
            formData.append('tps', $('#tps_edit').val());

            $.ajax({
                url: '<?= site_url($site_url . '/update') ?>',
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
                        $('#save_edit').html('<i data-feather="update"></i> Update');
                        $('#modalEditMitra').modal('hide');
                        $('#datatables').DataTable().draw();

                        $('#fullname, #nik_ktp, #jenis_kelamin, #usia, #dusun, #rt, #rw, #nomor_whatsapp, #tps').val('')
                        // $('#fullname, #nik_ktp, #jenis_kelamin, #usia, #nomor_whatsapp, #tps').val('')
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

        // Import Excel
        $("#saveImportExcel").click((e) => {
            e.preventDefault();

            let formData = new FormData();
            formData.append('excel_file', $('#fileExcelImport')[0].files[0]);

            $.ajax({
                url: '<?= site_url($site_url . '/importExcel') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#saveImportExcel").prop('disabled', true);
                    $('#saveImportExcel').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#saveImportExcel").prop('disabled', false);
                        $('#saveImportExcel').html('<i data-feather="save"></i> Save');
                        $('#modalImportExcel').modal('hide');
                        $('#datatables').DataTable().draw();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: result.message,
                        })
                        $("#saveImportExcel").prop('disabled', false);
                        $('#saveImportExcel').html('<i data-feather="save"></i> Save');
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#saveImportExcel").prop('disabled', false);
                    $('#saveImportExcel').html('<i data-feather="save"></i> Save');
                }
            })
        })

        $('#cek_nik_dpt').on('click', function() {
            let nik = $('#nik_ktp').val();

            $.ajax({
                type: "POST",
                url: "<?= site_url($site_url . '/check_dpt_online') ?>",
                dataType: "json",
                data: {
                    nik: nik
                },
                beforeSend: () => {
                    $('#cek_nik_dpt').html('Checking <i class="fa fa-spin fa-spinner"></i> ...')
                },
                success: (res) => {
                    if (res.code == 200) {
                        if (res.data != null) {

                            let data = res.data
                            let usia = res.usia
                            let jenis_kelamin = res.gender == "female" ? "P" : "L"
                            let rt_rw = res.rt_rw

                            $('#fullname').val(data.namaPemilih)
                            $('#tps').val(data.tps)
                            $('#jenis_kelamin').val(jenis_kelamin)
                            $('#usia').val(usia)
                            $('#rt').val(rt_rw.rt)
                            $('#rw').val(rt_rw.rw)
                            $('#alamat').val(data.address)

                            let getDataKelurahan = getKelurahanByDPT(data.kabupaten, data.kecamatan, data.kelurahan)

                            $('#cek_nik_dpt').html('<i data-feather="search"></i> Check DPT By Nik')

                            Swal.fire({
                                title: "Success Check DPT Online",
                                text: "Nama Lengkap: " + data.namaPemilih + "\n\nTPS: " + data.tps,
                                icon: "success",
                                button: "OK",
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Data Kosong / Tidak Terdaftar",
                            })
                            $('#cek_nik_dpt').html('<i data-feather="search"></i> Check DPT By Nik')
                            $('#fullname,#usia,#jenis_kelamin,#tps,#alamat').val('')
                            $('#provinsi,#kota,#kecamatan,#kelurahan').val('').trigger('change');
                        }
                    }
                },
                error: (err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: err.responseJSON.message,
                    })
                    $('#cek_nik_dpt').html('<i data-feather="search"></i> Check DPT By Nik')
                }
            })
        });

        $('#cek_nik_dpt_edit').on('click', function() {
            let nik = $('#nik_ktp_edit').val();

            $.ajax({
                type: "POST",
                url: "<?= site_url($site_url . '/check_dpt_online') ?>",
                dataType: "json",
                data: {
                    nik: nik
                },
                beforeSend: () => {
                    $('#cek_nik_dpt_edit').html('Checking <i class="fa fa-spin fa-spinner"></i> ...')
                },
                success: (res) => {
                    // console.log(res)
                    if (res.code == 200) {
                        if (res.data != null) {
                            let data = res.data
                            // let usia = res.usia
                            // let jenis_kelamin = res.gender == "female" ? "P" : "L"
                            // let rt_rw = res.rt_rw

                            // $('#fullname_edit').val(data.namaPemilih)
                            $('#tps_edit').val(data.tps)
                            // $('#jenis_kelamin_edit').val(jenis_kelamin)
                            // $('#usia_edit').val(usia)
                            // $('#rt_edit').val(rt_rw.rt)
                            // $('#rw_edit').val(rt_rw.rw)

                            // let getDataKelurahan = getKelurahanByname(data.kelurahan)

                            $('#cek_nik_dpt_edit').html('<i data-feather="search"></i> Check DPT By Nik')

                            Swal.fire({
                                title: "Success Check DPT Online",
                                text: "Nama Lengkap: " + data.namaPemilih + "\n\nTPS: " + data.tps,
                                icon: "success",
                                button: "OK",
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Data Kosong / Tidak Terdaftar",
                            })
                            $('#cek_nik_dpt_edit').html('<i data-feather="search"></i> Check DPT By Nik')
                            $('#fullname_edit,#usia_edit,#jenis_kelamin_edit,#tps_edit,#alamat_edit').val('')
                            $('#provinsi_edit,#kota_edit,#kecamatan_edit,#kelurahan_edit').val('').trigger('change');
                        }
                    }
                },
                error: (err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: err.responseJSON.message,
                    })
                    $('#cek_nik_dpt_edit').html('<i data-feather="search"></i> Check DPT By Nik')
                }
            })
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

        $('#provinsi_edit').on('change', function() {
            let id = $(this).val();

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

                    // console.log($('#kota_edit').val())
                    $('#kota_edit').html(html);
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
            getKelurahan(id, 15, kota_filter , 0 , 'kelurahan_filter')
        });

    });
</script>