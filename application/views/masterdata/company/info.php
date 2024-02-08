<div class="row row-xs">
    <div class="col-lg-3 col-xl-3 mg-t-10">
        <div class="card">
            <div class="card shadow-ppq">
                <div class="card-body">
                    <label for="">Document Perusahaan</label>
                    <?php if (!empty($data_perusahaan->document)){?>
                        <button class="btn btn-warning" onclick="window.open('<?= base_url() ?>upload/company/document/<?= $data_perusahaan->document ?? null ?>', '_blank')"> Download </button>
                    <?php } ?> 

                    <label for="" class="mt-3">NIB / TDP / TDY / SIUP / IUMK Perusahaan</label>
                    <input type="file" class="form-control mt-3 mb-3" id="document_perusahaan" accept=".pdf">
                    <button class="btn btn-primary btn-block mt-2" id="save_document">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-xl-9 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <h1><?= $tittle ?> <?= $tittle_2 ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="">Logo Perusahaan</label><br><br>
                        <img src="<?= base_url($data_perusahaan != null ? 'upload/company/logo/' . $data_perusahaan->images : 'assets/img/placehold.jpg') ?>" height="100" width="100" class="rounded-circle" alt="Logo">
                        <input type="file" class="form-control mt-2" id="logo_perusahaan" accept="image/*">
                    </div>
                    <div class="col-md-12 mt-4">
                        <label for=""> Nama Perusahaan <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="nama_perusahaan" value="<?= $data_perusahaan->company_name ?? null ?>" placeholder="Nama Perusahaan">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Deskripsi Perusahaan <span class="text-danger">* Wajib Diisi</span> </label>
                        <textarea class="form-control" id="description_perusahaan" cols="10" rows="5"><?= $data_perusahaan->deskripsi_perusahaan ?? null ?></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> No Telephone <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="number" class="form-control" id="no_telephone" value="<?= $data_perusahaan->phone ?? null ?>" placeholder="No Telephone">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Email <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="email" value="<?= $data_perusahaan->email ?? null ?>" placeholder="Alamat Email">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Website <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="website" value="<?= $data_perusahaan->website ?? null ?>" placeholder="Alamat Website">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Bidang Industri <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="bidang_industri" value="<?= $data_perusahaan->bidang_industri ?? null ?>" placeholder="Contoh : Teknologi Informasi">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Kepemilikan Perusahaan <span class="text-danger">* Wajib Diisi</span> </label>
                        <select name="" class="form-control" id="kepemilikan_perusahaan">
                            <option value=""> == Pilih ==</option>
                            <option value="negara" <?= !empty($data_perusahaan->kepemilikan_perusahaan) == 'negara' ? 'selected' : '' ?>>Negara</option>
                            <option value="swasta" <?= !empty($data_perusahaan->kepemilikan_perusahaan) == 'swasta' ? 'selected' : '' ?>>Swasta</option>
                            <option value="koperasi" <?= !empty($data_perusahaan->kepemilikan_perusahaan) == 'koperasi' ? 'selected' : '' ?>>Koperasi</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Skala Perusahaan <span class="text-danger">* Wajib Diisi</span> </label>
                        <select name="" class="form-control" id="skala_perusahaan">
                            <option value=""> == Pilih ==</option>
                            <option value="mikro" <?= !empty($data_perusahaan->skala_perusahaan) == 'mikro' ? 'selected' : '' ?>>Mikro</option>
                            <option value="kecil" <?= !empty($data_perusahaan->skala_perusahaan) == 'kecil' ? 'selected' : '' ?>>Kecil</option>
                            <option value="menengah" <?= !empty($data_perusahaan->skala_perusahaan) == 'menengah' ? 'selected' : '' ?>>Menengah</option>
                            <option value="besar" <?= !empty($data_perusahaan->skala_perusahaan) == 'besar' ? 'selected' : '' ?>>Besar</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Negara <span class="text-danger">* Wajib Diisi</span> </label>
                        <select name="" class="form-control" id="country">
                            <option value="indonesia"> Indonesia
                            <option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Provinsi <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="provinsi" value="<?= $data_perusahaan->province ?? null ?>" placeholder="Masukkan Provinsi">
                        <!-- <select name="" class="form-control" id="skala_perusahaan">
                            <option value=""> == Pilih ==</option>
                            <option value="">Negara</option>
                            <option value="">Swasta</option>
                            <option value="">Koperasi</option>
                        </select> -->
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Kabupaten <span class="text-danger">* Wajib Diisi</span> </label>
                        <input type="text" class="form-control" id="kabupaten" value="<?= $data_perusahaan->regency ?? null ?>" placeholder="Masukkan Kabupaten">
                        <!-- <select name="" class="form-control" id="skala_perusahaan">
                            <option value=""> == Pilih ==</option>
                        </select> -->
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Perusahaan <span class="text-danger">* Wajib Diisi</span> </label>
                        <textarea class="form-control" id="alamat_perusahaan" cols="10" rows="5"> <?= $data_perusahaan->address ?? null ?></textarea>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-primary btn-block" id="save"> <i data-feather="save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('#save').click(function() {
            let formData = new FormData();

            formData.append('logo_perusahaan', $('#logo_perusahaan').prop('files')[0] == undefined ? 'kosong_logo' : $('#logo_perusahaan').prop('files')[0])
            // formData.append('document_perusahaan', $('#document_perusahaan').prop('files')[0] == undefined ? 'kosong_document' : $('#document_perusahaan').prop('files')[0])
            formData.append('nama_perusahaan', $('#nama_perusahaan').val())
            formData.append('description_perusahaan', $('#description_perusahaan').val())
            formData.append('no_telephone', $('#no_telephone').val())
            formData.append('email', $('#email').val())
            formData.append('website', $('#website').val())
            formData.append('bidang_industri', $('#bidang_industri').val())
            formData.append('kepemilikan_perusahaan', $('#kepemilikan_perusahaan').val())
            formData.append('skala_perusahaan', $('#skala_perusahaan').val())
            formData.append('country', $('#country').val())
            formData.append('provinsi', $('#provinsi').val())
            formData.append('kabupaten', $('#kabupaten').val())
            formData.append('alamat_perusahaan', $('#alamat_perusahaan').val())

            $.ajax({
                url        : '<?= site_url($site_url . '/update') ?>',
                type       : 'POST',
                processData: false,
                contentType: false,
                data       : formData,
                beforeSend : function() {
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

                        setTimeout(function() {
                            location.reload();
                        }, 1000);

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

        $('#save_document').click(function() {
            let formData = new FormData();

            formData.append('document_perusahaan', $('#document_perusahaan').prop('files')[0] == undefined ? 'kosong_document' : $('#document_perusahaan').prop('files')[0])

            $.ajax({
                url: '<?= site_url($site_url . '/upload_document') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#save_document").prop('disabled', true);
                    $('#save_document').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            location.reload();
                        });
                        // $("#save_document").prop('disabled', false);
                        // $('#save_document').html('<i data-feather="save"></i> Upload');

                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save_document").prop('disabled', false);
                    $('#save_document').html('<i data-feather="save"></i> Upload');
                }
            });
        });

    });
</script>