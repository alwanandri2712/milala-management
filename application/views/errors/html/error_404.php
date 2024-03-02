<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="<?= APP_NAME ?>">
    <meta name="author" content="<?= APP_NAME ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title> <?= APP_NAME ?> </title>

    <!-- vendor css -->
    <link href="<?= BASE_URL.'lib/@fortawesome/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?= BASE_URL.'lib/ionicons/css/ionicons.min.css" rel="stylesheet' ?>">
    <link href="<?= BASE_URL.'lib/jqvmap/jqvmap.min.css" rel="stylesheet' ?>">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/dashforge.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/dashforge.profile.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/dashforge.dashboard.css' ?>">
    <link id="dfMode" rel="stylesheet" href="<?= BASE_URL.'assets/css/skin.light.css' ?>">
    <link id="dfSkin" rel="stylesheet" href="<?= BASE_URL.'assets/css/skin.gradient1.css' ?>">

    <!-- Datatable -->
    <link href="<?= BASE_URL.'lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css' ?>" rel="stylesheet">
    <script src="<?= BASE_URL.'lib/jquery/jquery.min.js' ?>"></script>

    <script src="<?= BASE_URL.'lib/datatables.net/js/jquery.dataTables.min.js' ?>" type="text/javascript"></script>
    <script src="<?= BASE_URL.'lib/datatables.net-dt/js/dataTables.dataTables.min.js' ?>" type="text/javascript"></script>
    <script src="<?= BASE_URL.'lib/datatables.net-responsive/js/dataTables.responsive.min.js' ?>" type="text/javascript"></script>
    <script src="<?= BASE_URL.'lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js' ?>" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="content content-fixed content-auth-alt">
        <div class="container ht-100p tx-center">
            <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
                <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15"><img src="<?= BASE_URL ?>assets/img/img_404page.png" class="img-fluid" alt=""></div>
                <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">404 Page Not Found</h1>
                <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">Oopps. The page you were looking for doesn't exist.</h5>
                <button class="btn btn-primary" onclick="window.history.back()"> <i class="fa fa-arrow-left"></i> Back </button>
            </div>
        </div>
    </div>
</body>

</html>