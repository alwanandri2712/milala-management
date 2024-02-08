<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Meta -->
  <meta name="description" content="Milala Auto Services">
  <meta name="author" content="Milala Auto Services">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.png') ?>">

  <title>Dashboard Management Milala Auto Services</title>

  <!-- vendor css -->
  <link href="<?= base_url('lib/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/dashforge.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dashforge.auth.css') ?>">

</head>

<body>
  <div class="content content-fixed content-auth">
    <div class="container">
      <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
        <div class="media-body align-items-center d-none d-lg-flex">
          <div class="mx-wd-600">
            <img src="<?= base_url('assets/img/img15.png') ?>" style="border:black;" class="img-fluid" alt="">
          </div>
        </div><!-- media-body -->
        <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
          <div class="wd-100p">
            <h3 class="tx-color-01 mg-b-5">MILALA AUTO SERVICES</h3>
            <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
            <div class="form-group mt-2">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Enter Your Username" id="username">
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between mg-b-5">
                <label class="mg-b-0-f">Password</label>
              </div>
              <input type="password" class="form-control" placeholder="Enter your Password" id="password">
            </div>
            <button class="btn btn-primary btn-block" id="login"> Sign In <i data-feather="log-in"></i></button>
          </div>
        </div><!-- sign-wrapper -->
      </div><!-- media -->
    </div><!-- container -->
  </div><!-- content -->

  <script src="<?= base_url('lib/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('lib/feather-icons/feather.min.js') ?>"></script>
  <script src="<?= base_url('lib/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

  <script src="<?= base_url('assets/js/dashforge.js') ?>"></script>

  <!-- append theme customizer -->
  <script src="<?= base_url('lib/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashforge.settings.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    $(document).ready(function() {

      /* biar bisa langsung pencet enter */
      $("#password,#username").keypress(function(e) {
        if (e.which == 13) {
          $("#login").click()
        }
      })

      $('#login').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();

        if (username == '' || password == '') {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Username dan Password tidak boleh kosong!',
          })
        } else {
          $.ajax({
            url: '<?= base_url('Login/auth') ?>',
            type: 'POST',
            data: {
              username: username,
              password: password
            },
            beforeSend: function() {
              $('#login').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
            },
            success: function(res) {
              if (res == 'valid_login') {
                $('#login').html('Succes Login , Redirecting <i class="fa fa-spin fa-spinner"></i> ...')
                window.location.href = '<?= base_url('home') ?>';
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Username dan Password tidak sesuai!',
                })
                $('#login').html('Sign In <i data-feather="log-in"></i>')
              }
            }
          })
        }
      })
    })

    $(function() {
      'use script'

      window.darkMode = function() {
        $('.btn-white').addClass('btn-dark').removeClass('btn-white');
      }

      window.lightMode = function() {
        $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
      }

      var hasMode = Cookies.get('df-mode');
      if (hasMode === 'dark') {
        darkMode();
      } else {
        lightMode();
      }
    })
  </script>
</body>

</html>