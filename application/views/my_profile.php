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
                        <div class="avatar avatar-xxl">
                            <img src="<?= base_url($data_profile->img_usr != '' ? 'upload/users/' . $data_profile->img_usr : 'assets/img/placehold.jpg') ?>" height="200" width="200" id="image_edit" class="rounded-circle" alt="Logo">
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <label for="">New Foto Profile</label>
                        <input type="file" class="form-control" id="foto_user">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="form-control-label">Fullname</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Masukkan Nama Lengkap" value="<?= $data_profile->fullname ?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="form-control-label">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Ex : 089523xxxxx" value="<?= $data_profile->phone ?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="form-control-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username" value="<?= $data_profile->username ?>" readonly>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="form-control-label">New Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <div class="col-md-12">
                        <label for="">&nbsp;</label>
                        <input type="hidden" class="form-control" id="id_users" value="<?= $data_profile->id_user ?>">
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
            formData.append('foto_user', $('#foto_user').prop('files')[0] == undefined ? 'kosong' : $('#foto_user').prop('files')[0])
            formData.append('id_user', $('#id_users').val())
            formData.append('fullname', $('#fullname').val())
            formData.append('phone', $('#phone').val())
            formData.append('password', $('#password').val())

            $.ajax({
                url: '<?= site_url($site_url . '/update') ?>',
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

                        setTimeout(function() {
                            location.reload();
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