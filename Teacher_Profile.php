<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
  <meta charset="utf-8">
  <title>Starter Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <!-- App css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
  <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">
</head>

<body <?php include('dataconfig.php') ?>>
  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu menuitem-active">
      <!-- LOGO -->
      <a href="index.php" class="logo text-center logo-light">
        <span class="logo-lg">
          <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
          <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
      </a>
      <!-- LOGO -->
      <a href="index.php" class="logo text-center logo-dark">
        <span class="logo-lg">
          <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
          <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
      </a>
      <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
              <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                <div class="simplebar-content" style="padding: 0px;">
                  <!--- Sidemenu -->
                  <?php include('teacher_sidemenu.php') ?>
                  <!-- Help Box -->
                  <!-- end Help Box -->
                  <!-- End Sidebar -->
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="simplebar-required placeholder" style="width: 260px; height: 234px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
          </div>
        </div>
      </div>
      <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== --> hello
    <!-- ============================================================== -->
    <div class="content-page">
      <div class="content">
        <!-- Topbar Start -->
        <?php include('teacher_topbar.php') ?>
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right"></div>
                <h3 class="page-title"> Teacher Profile</h3>
              </div>
            </div>
          </div>
          <!-- end page title -->
        </div>
        <!-- container -->
      </div>
      <!-- content -->
      <div class="row">
        <div class="col-sm-12">
          <!-- Profile -->
          <div class="card bg-dark">
            <div class="card-body profile-user-box">
              <div class="row">
                <div class="col-sm-8">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="avatar-lg">
                        <img src="assets/images/users/Jillian-Ward.jpg" alt="" class="rounded-circle img-thumbnail">
                      </div>
                    </div>
                    <div class="col">
                      <div>
                        <h4 class="mt-1 mb-1 text-white">
                          <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?>
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col-->
                <div class="col-sm-4">
                  <div class="text-center mt-sm-0 mt-3 text-sm-end">
                    <span class="badge badge-outline-info">
                      <?php echo $row['level'] ?>
                    </span>
                    <br>
                    <br>
                    <br>
                    <a href="Teacher_Edit_Profile.php">
                      <button type="button" class="btn btn-info">
                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile </button>
                    </a>
                  </div>
                </div>
                <!-- end col-->
              </div>
              <!-- end row -->
            </div>
            <!-- end card-body/ profile-user-box-->
          </div>
          <!--end profile/ card -->
        </div>
        <!-- end col-->
      </div>
      <div class="row">
        <div class="col-sm-4 mb-2 mb-sm-0">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab"
              aria-controls="v-pills-home" aria-selected="true">
              <i class="mdi mdi-home-variant d-md-none d-block"></i>
              <span class="d-none d-md-block">Overview</span>
            </a>
            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab"
              aria-controls="v-pills-profile" aria-selected="false">
              <i class="mdi mdi-account-circle d-md-none d-block"></i>
              <span class="d-none d-md-block">Contact and basic Info</span>
            </a>
            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab"
              aria-controls="v-pills-settings" aria-selected="false">
              <i class="mdi mdi-settings-outline d-md-none d-block"></i>
              <span class="d-none d-md-block">Achivements</span>
            </a>
          </div>
        </div>
        <!-- end col-->
        <div class="col-sm-8">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <h2>Overview</h2>
              <br>
              <br>
              <span class="h4">
                <i class=" uil-graduation-hat"></i> &nbsp;Studied at Mindanao Polytechnic College </span>
              <br>
              <br>
              <span class="h4">
                <i class=" uil-building"></i> &nbsp;Lives in General Santos, General Santos, Philippines </span>
              <br>
              <br>
              <span class="h4">
                <i class="  uil-location"></i> &nbsp;From Laguilayan, Sultan Kudarat, Philippines </span>
              <br>
              <br>
              <span class="h4">
                <i class="  uil-heart"></i> &nbsp;Single</span>
              <br>
              <br>
              <span class="h4">
                <i class="mdi mdi-cellphone-android"></i> &nbsp;09217381873 </span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile<br>
              <br>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


              <h2>Contact and basic Info</h2>
              <br>

              <p class="h3 text-info">Contact</p>
              <br>
              <span class="h4">
                <i class="mdi mdi-cellphone-android"></i> &nbsp;09217381873 </span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile<br>
              <br>

              <span class="h4">
                <i class="mdi mdi-email"></i> &nbsp;Jillianxward@gmail.com </span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email<br>
              <br>

              <p class="h3 text-info">Websites and social links</p><br>

              <span class="h4">
                <i class="mdi mdi-facebook"></i> &nbsp;Jillian Ward </span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook<br>
              <br>
              <span class="h4">
                <i class="mdi mdi-instagram"></i> &nbsp;Jillianxdward</span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instagram<br>
              <br>

              <p class="h3 text-info">Basic info</p><br>

              <span class="h4">
                <i class="dripicons-user"></i> &nbsp;Female</span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender<br>
              <br>
              <span class="h4">
                <i class="mdi mdi-cake-variant"></i> &nbsp;February 23, 2005 </span>
              <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth-date<br>
              <br>



            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

              <div class="card ribbon-box">
                <div class="card-body">
                  <div class="ribbon ribbon-info float-end"><i class="mdi mdi-trophy-award"><span>Certified</span> </i>
                  </div>
                  <p class="mb-0">Certificate of Eligibility from the Professional Regulation Commission (PRC).
                    This certificate confirms that they have met the basic qualifications and prerequisites for the
                    licensure examination.
                  </p>
                </div> <!-- end card-body -->
              </div> <!-- end card-->

              <div class="card ribbon-box">
                <div class="card-body">
                  <div class="ribbon ribbon-success float-end"><i class="mdi mdi-trophy-award"><span>Certified</span>
                    </i> </div>
                  <p class="mb-0">"This year, the esteemed accolade of 'Best Teacher of the Year' was rightfully
                    bestowed upon our exceptional educator, as their
                    unwavering dedication, passion, and profound impact on students' lives made them stand out as the
                    epitome of excellence in the teaching profession."
                  </p>
                </div> <!-- end card-body -->
              </div> <!-- end card-->

              <div class="card ribbon-box">
                <div class="card-body">
                  <div class="ribbon ribbon-warning float-end"><i class="mdi mdi-trophy-award"><span>Certified</span>
                    </i> </div>
                  <p class="mb-0">"With a rare blend of expertise, compassion, and creativity, our teacher has left an
                    indelible mark on the hearts and minds of students, leading to their well-deserved
                    distinction as the 'Best Teacher of the Year' and exemplifying the pinnacle of educational
                    excellence."
                  </p>
                </div> <!-- end card-body -->
              </div> <!-- end card-->





            </div>
          </div>
          <!-- end tab-content-->
        </div>
        <!-- end col-->
      </div>
      <!-- end row-->



      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <script>
                document.write(new Date().getFullYear())
              </script>202320232023202320232023 © Hyper - Coderthemes.com
            </div>
            <div class="col-md-6">
              <div class="text-md-end footer-links d-none d-md-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->
      <!-- ============================================================== -->
      <!-- End Page content -->
      <!-- ============================================================== -->
      <!-- END wrapper -->
      <!-- Start right sidebar -->
      <?php include('Teacher_Settings.php'); ?>
      <!-- End right side bar -->
      <!-- bundle -->
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/js/app.min.js"></script>
    </div>
  </div>
</body>

</html>