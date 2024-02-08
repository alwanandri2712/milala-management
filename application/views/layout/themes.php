<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Milala Auto Services">
  <meta name="author" content="Milala Auto Services">
  <meta name="robots" content="noindex">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/milala_logo.png') ?>">

  <title>Dashboard Milala Auto Services </title>

  <!-- vendor css -->
  <link href="<?= base_url('lib/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('lib/ionicons/css/ionicons.min.css" rel="stylesheet') ?>">
  <link href="<?= base_url('lib/jqvmap/jqvmap.min.css" rel="stylesheet') ?>">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/dashforge.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dashforge.profile.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dashforge.dashboard.css') ?>">
  <link id="dfMode" rel="stylesheet" href="<?= base_url('assets/css/skin.light.css') ?>">
  <link id="dfSkin" rel="stylesheet" href="<?= base_url('assets/css/skin.gradient1.css') ?>">

  <!-- Datatable -->
  <link href="<?= base_url('lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') ?>" rel="stylesheet">
  <script src="<?= base_url('lib/jquery/jquery.min.js') ?>"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  <script src="<?= base_url('lib/datatables.net/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('lib/datatables.net-dt/js/dataTables.dataTables.min.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('lib/datatables.net-responsive/js/dataTables.responsive.min.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') ?>" type="text/javascript"></script>

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" type="text/javascript"></script>

  <script src="<?= base_url('lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- <link href="<?= base_url('lib/select2/css/select2.min.css') ?>" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

  <style>
    .shadow-ppq {
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .select2 {
      width: 100% !important;
      height: calc(1.5em + 0.9375rem + 2px);
    }

    .select2-container .select2-selection--single {
      height: calc(1.5em + 0.9375rem + 2px);
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #444cf7 !important;
    }
    
    /* .select2-drop-active {
      margin-top: -25px;
    } */

    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      z-index: 9999;
      background-color: #e5e5f7;
      /* opacity: 0.8; */
      background-image: radial-gradient(#444cf7 0.5px, transparent 0.5px), radial-gradient(#444cf7 0.5px, #e5e5f7 0.5px);
      background-size: 20px 20px;
      background-position: 0 0, 10px 10px;
    }

    #ui-datepicker-div {
      z-index: 9999 !important;
    }

    .preloader1 {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #dddddf;
    }

    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 45%;
      text-align: center;
      transform: translate(-50%, -50%);
      font: 14px arial;
    }
  </style>


</head>

<body>

  <!-- <div class="preloader">
    <div class="loading">
      <img src="<?= base_url('assets/img/logo_muara_enim.png') ?>" class="wd-150 shadow-moses">
      <br><br>
      <h1>Bobby Batubara Center</h1>
    </div>
  </div> -->
  <?php $this->load->view('layout/sidebar') ?>

  <div class="content ht-100v pd-0">
    <div class="content-header">
      <!-- <div class="content-search">
        <i data-feather="search"></i>
        <input type="search" class="form-control" placeholder="Search...">
      </div>
      <nav class="nav">
        <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
        <a href="" class="nav-link"><i data-feather="grid"></i></a>
        <a href="" class="nav-link"><i data-feather="align-left"></i></a>
      </nav> -->
    </div><!-- content-header -->

    <div class="content-body">
      <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#"><?= !empty($tittle) ? $tittle : "" ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= !empty($tittle_2) ? $tittle_2 : "" ?></li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1"><?= !empty($tittle_3) ? $tittle_3 : "" ?></h4>
          </div>
        </div>

        <?php $this->load->view($content); ?>
      </div><!-- container -->
    </div>
  </div>

  <!-- <script src="<?= base_url('lib/select2/js/select2.min.js') ?>"></script> -->

  <script src="<?= base_url('lib/feather-icons/feather.min.js') ?>"></script>
  <script src="<?= base_url('lib/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('lib/jquery.flot/jquery.flot.js') ?>"></script>
  <script src="<?= base_url('lib/jquery.flot/jquery.flot.stack.js') ?>"></script>
  <script src="<?= base_url('lib/jquery.flot/jquery.flot.resize.js') ?>"></script>
  <script src="<?= base_url('lib/chart.js/Chart.bundle.min.js') ?>"></script>
  <script src="<?= base_url('lib/jqvmap/jquery.vmap.min.js') ?>"></script>
  <script src="<?= base_url('lib/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>

  <script src="<?= base_url('assets/js/chart.chartjs.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashforge.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashforge.aside.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashforge.sampledata.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashboard-one.js') ?>"></script>

  <!-- append theme customizer -->
  <script src="<?= base_url('lib/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashforge.settings.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="<?= base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  
  <script>
    $(document).ready(function() {
      // $(".preloader").delay(700).fadeOut();
    })


    function newexportaction(e, dt, button, config) {
      var self = this;
      var oldStart = dt.settings()[0]._iDisplayStart;
      dt.one('preXhr', function(e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function(e, settings) {
          // Call the original action function
          if (button[0].className.indexOf('buttons-copy') >= 0) {
            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-excel') >= 0) {
            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-csv') >= 0) {
            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
          }
          dt.one('preXhr', function(e, s, data) {
            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
            // Set the property to what it was before exporting.
            settings._iDisplayStart = oldStart;
            data.start = oldStart;
          });
          // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
          setTimeout(dt.ajax.reload, 0);
          // Prevent rendering of the full data to the DOM
          return false;
        });
      });
      // Requery the server with the new one-time export settings
      dt.ajax.reload();
    }

    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }
      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
  </script>

</body>

</html>