<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
  <meta charset="utf-8">
  <!-- <title>Starter Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <!-- App favicon -->
  <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
  <!-- third party css -->
  <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
  <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
  <!-- third party css end -->
  <!-- App css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
  <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
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
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">

                  </ol>
                </div>
                <h4 class="page-title">Assign Lesson to Students</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
        </div>
        <!-- container -->
      </div>
      <!-- content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-4">
                  <!-- Single Select -->
                  <!-- <select class="form-control select2" data-toggle="select2">
                    <option>Select</option>
                    <option value="AK">Literacy</option>
                    <option value="HI">Numeracy</option>
                  </select> -->
                </div>
                <div class="col-sm-8">
                  <div class="text-sm-end">
                    <button type="button" class="btn btn-info mb-2">Assign Learners</button>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <div class="table-responsive">
                <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                  id="products-datatable">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 20px;">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="customCheck1">
                          <label class="form-check-label" for="customCheck1">&nbsp;</label>
                        </div>
                      </th>
                      <th>LRN</th>
                      <th>Student Name</th>
                      <th>Class/Section</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'dbcon.php';

                    $sql = "SELECT tbl_userinfo.user_id, tbl_learner.learner_id, tbl_learner.level_id, tbl_user_level.level, tbl_userinfo.firstname,
                  tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.birthday, tbl_userinfo.gender, tbl_user_status.status,
                  tbl_learner_id.lrn, tbl_address.address, tbl_usercredentials.contact, tbl_usercredentials.email
                  FROM tbl_learner
                  JOIN tbl_user_level ON tbl_learner.level_id = tbl_user_level.level_id
                  JOIN tbl_userinfo ON tbl_learner.user_id = tbl_userinfo.user_id
                  JOIN tbl_learner_id ON tbl_learner.learner_id = tbl_learner_id.learner_id
                  JOIN tbl_user_status ON tbl_learner.status_id = tbl_user_status.status_id
                  JOIN tbl_address ON tbl_learner.address_id = tbl_address.address_id
                  JOIN tbl_usercredentials ON tbl_learner.usercredentials_id = tbl_usercredentials.usercredentials_id
                  WHERE tbl_user_level.level = 'LEARNER' AND tbl_user_status.status = 1";

                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <td>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="customCheck2">
                              <label class="form-check-label" for="customCheck2">&nbsp;</label>
                            </div>
                          </td>
                          <td>
                            <?php echo $row['lrn'] ?>
                          </td>
                          <td class="table-user">
                            <img src="assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle">
                            <a href="javascript:void(0);" class="text-body fw-semibold">
                              <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?>
                            </a>
                          </td>
                          <td>
                            <span class="fw-semibold">
                              <?php echo $row['birthday'] ?>
                            </span>
                          </td>

                          <td>
                            <a href="teacher_view_student.php?user_id=<?php echo $row['user_id'] ?>" class="action-icon">
                              <i class="uil-eye"></i>
                            </a>
                          </td>
                          <td>
                            <?php
                            if ($row['status'] == 1) {
                              ?>
                              <span class="badge bg-success">Active</span>
                              <?php
                            } else {
                              ?>
                              <span class="badge bg-warning">Inactive</span>
                              <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- end card-body-->
          </div>
          <!-- end card-->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

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
      <!-- third party js -->
      <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
      <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
      <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
      <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
      <script src="assets/js/vendor/apexcharts.min.js"></script>
      <script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
      <!-- third party js ends -->
      <!-- demo app -->
      <script src="assets/js/pages/demo.AssignLesson.js"></script>
      <!-- end demo js-->
    </div>
  </div>
</body>

</html>