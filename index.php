<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Courier | Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/toastr-master/build/toastr.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="favicon.png">

</head>
<body onload="<?php session_destroy(); ?>">
  <script src="assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <div class="main-wrapper">
      <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center" style="background-image: url('./images/bg.jpg');background-size: cover;">
        <main class="auth-page">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                <div class="mdc-card" style="background: #ffffff8f;">
                  <form id="loginForm">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12" style="background-color: #7a00ff;">
                          <img src="images/awa_logo.png" width="300px">
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" name="awa_username" id="text-field-hero-input" autocomplete="off">
                            <div class="mdc-line-ripple"></div>
                            <label id="username_label" for="text-field-hero-input" class="mdc-floating-label">Username</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" name="awa_password" type="password" id="text-field-hero-input">
                            <div class="mdc-line-ripple"></div>
                            <label id="password_label" for="text-field-hero-input" class="mdc-floating-label">Password</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          <div class="mdc-form-field">
                            <div class="mdc-checkbox">
                              <input type="checkbox"
                              class="mdc-checkbox__native-control"
                              id="checkbox1"/>
                              <div class="mdc-checkbox__background">
                                <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path"
                                fill="none"
                                d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                              </svg>
                              <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                          </div>
                          <label for="checkbox1">Remember me</label>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">
                        <a href="./create_account.php">Create Account</a>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <a href="#!" onclick="login()" class="mdc-button mdc-button--raised w-100">
                    Login
                  </a>
                </div>
              </div>
            </div>
            <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
<!-- plugins:js -->
<script src="vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="vendors/toastr-master/build/toastr.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="assets/js/material.js"></script>
<script src="assets/js/misc.js"></script>
<script src="./js/function.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>
</html>