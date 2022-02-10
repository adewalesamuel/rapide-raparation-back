<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> {{ $title ?? '' }} | {{ env('APP_NAME') ?? '' }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{asset("vendors/feather/feather.css")}}>
  <link rel="stylesheet" href={{asset("vendors/mdi/css/materialdesignicons.min.css")}}>
  <link rel="stylesheet" href={{asset("vendors/ti-icons/css/themify-icons.css")}}>
  <link rel="stylesheet" href={{asset("vendors/typicons/typicons.css")}}>
  <link rel="stylesheet" href={{asset("vendors/simple-line-icons/css/simple-line-icons.css")}}>
  <link rel="stylesheet" href={{asset("vendors/css/vendor.bundle.base.css")}}>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{asset("vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}>
  <link rel="stylesheet" href={{asset("js/select.dataTables.min.css")}}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{asset("css/vertical-layout-light/style.css")}}>
  <link rel="stylesheet" href={{asset("css/main.css")}}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{asset("images/favicon.png")}} />
</head>
<body>
  <div class="container-scroller">
    {{--<div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/star-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div> --}}