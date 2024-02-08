<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <h1><?= $tittle ?> <?= $tittle_2 ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <label for="">Email SMTP</label>
                        <input type="text" class="form-control" id="email_smtp" value="<?= $data_smtp_email ?>" placeholder="Email SMTP">
                    </div>

                    <div class="col-md-6 mt-2">
                        <label for="">Password SMTP</label>
                        <input type="text" class="form-control" id="password_smtp" value="<?= $data_smtp_pw ?>" placeholder="">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">API Key Google Maps</label>
                        <input type="text" class="form-control" id="api_key_gmaps" value="<?= $data_api_key_gmaps ?>" placeholder="API KEY GOOGLE MAPS">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">API Key Youtube</label>
                        <input type="text" class="form-control" id="api_key_youtube" value="<?= $data_api_key_youtube ?>" placeholder="API KEY YOUTUBE">
                    </div>

                    <!-- channel id youtube -->
                    <div class="col-md-12 mt-3">
                        <label for="">Channel ID Youtube</label>
                        <input type="text" class="form-control" id="channel_id_youtube" value="<?= $data_channel_id_yt ?>" placeholder="Channel ID Youtube">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Token FireBase</label>
                        <input type="text" class="form-control" id="token_firebase" value="<?= $data_token_firebase ?>" placeholder="Token FireBase">
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
           
            let formData = {
                email_smtp        : $('#email_smtp').val(),
                password_smtp     : $('#password_smtp').val(),
                api_key_gmaps     : $('#api_key_gmaps').val(),
                api_key_youtube   : $('#api_key_youtube').val(),
                channel_id_youtube: $('#channel_id_youtube').val(),
                token_firebase    : $('#token_firebase').val(),
            }

            $.ajax({
                url        : '<?= site_url($site_url . '/update_server') ?>',
                type       : 'POST',
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