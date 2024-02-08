<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <h1><?= $tittle ?> <?= $tittle_2 ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img src="<?= $data_logo_site ?>" height="200" width="200" id="image_edit" class="img-thumbnail" alt="Logo">
                    </div>
                    <div class="col-md-12">
                        <label for="">Logo</label>
                        <input type="file" class="form-control" id="image_site">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="">Site Name</label>
                        <input type="text" class="form-control" id="site_name" value="<?= $data_site_name ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="email" value="<?= $data_email ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" id="phone" value="<?= $data_phone ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Instagram</label>
                        <input type="text" class="form-control" id="instagram" value="<?= $data_instagram ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Facebook</label>
                        <input type="text" class="form-control" id="facebook" value="<?= $data_facebook ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Tiktok</label>
                        <input type="text" class="form-control" id="tiktok" value="<?= $data_tiktok ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">X Twitter</label>
                        <input type="text" class="form-control" id="xtwitter" value="<?= $data_xtwitter ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Channel Youtube</label>
                        <input type="text" class="form-control" id="channel_yt" value="<?= $data_youtube ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Lat Long (Titik Kordinat)</label>
                        <input type="text" class="form-control" id="lat_long" value="<?= $data_latlong ?>">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Alamat</label>
                        <textarea class="form-control" id="alamat" cols="30" rows="10"><?= $data_alamat ?></textarea>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="">Text Berjalan</label>
                        <textarea class="form-control" id="text_berjalan" cols="30" rows="10"><?= $data_text_berjalan ?></textarea>
                    </div>

                    <div class="col-md-12">
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

            formData.append('image_site', $('#image_site').prop('files')[0] == undefined ? 'kosong' : $('#image_site').prop('files')[0]);
            formData.append('site_name', $('#site_name').val());
            formData.append('email', $('#email').val());
            formData.append('phone', $('#phone').val());
            formData.append('instagram', $('#instagram').val());
            formData.append('facebook', $('#facebook').val());
            formData.append('tiktok', $('#tiktok').val());
            formData.append('xtwitter', $('#xtwitter').val());
            formData.append('channel_yt', $('#channel_yt').val());
            formData.append('lat_long', $('#lat_long').val());
            formData.append('alamat', $('#alamat').val());
            formData.append('text_berjalan', $('#text_berjalan').val());

            $.ajax({
                url        : '<?= site_url($site_url . '/update_setting_general') ?>',
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

                        setTimeout(() => {
                            location.reload()
                        }, 2000);
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

    });
</script>