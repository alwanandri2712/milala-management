<style>
    .card-gradient-green {
        background: linear-gradient(150deg, #39ef74, #4600f1 100%);
    }
</style>
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?= base_url('assets/img/theme/profile-cover.jpg') ?>); background-size: cover; background-position: center top;border-radius:10px">
    <span class="mask bg-gradient-default opacity-8"></span>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-white"><?= $session[0]->fullname ?></h1>
            </div>
            <div class="col-md-6">
                <div class="card card-gradient-green">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Your Plan</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-secondary"><?= $this->session->userdata('nama_services') ?></button>
                            </div>
                            <div class="col-md-4">
                                <span class="text-white"> Expired </span>
                            </div>
                            <div class="col-md-4">
                                <span class="text-white"> <?= number_format($this->session->userdata('limit_contact')) ?> / Contacts</span><br>
                                <span class="text-white"> <?= number_format($this->session->userdata('limit_whatsapp')) ?> / Numbers</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--9">
    <div class="row">
        <div class="col-xl-8 order-xl-1">
            <div class="card shadow-ppq">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">My profiles </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Fullname</label>
                                    <input type="text" id="fullname" class="form-control" placeholder="Fullname" value="<?= $session[0]->fullname ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Username" value="<?= $session[0]->username ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">New Password</label>
                                    <input type="text" id="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Phone Number</label>
                                    <input type="number" id="phone_number" class="form-control" placeholder="Phone Number" value="<?= $session[0]->phone ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" id="save_profiles">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

        $("#save_profiles").click(function() {

            let fullname = $("#fullname").val()
            let username = $("#username").val()
            let phone    = $("#phone_number").val()
            let password = $("#password").val()

            $.ajax({
                url: '/<?= $site_url ?>/saveProfiles',
                type: 'POST',
                data: {
                    fullname: fullname,
                    username: username,
                    password: password,
                    phone   : phone,
                },
                beforeSend: function() {
                    $('#save_profiles').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(data) {
                    if (data == 'demo_account') {
                        swal("Opps! Error Update Data Account Demo", {
                            icon: "error",
                        });
                    } else {
                        if (data == 'success') {
                            swal("Poof! Your data has been update!", {
                                icon: "success",
                            }).then(() => {
                                location.reload()
                            });
                        } else {
                            swal("Opps! Error Update Data", {
                                icon: "error",
                            });
                        }
                    }
                    $('#save_profiles').html('Save');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("Error update data!", {
                        icon: "error",
                    });
                    $('#save_profiles').html('Save');
                }
            });
        })
    })
</script>