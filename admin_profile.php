<?php
session_start();
$user_id = $_SESSION['user_id'];

?>


<?php
include 'profileinfo.php';
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
<<<<<<< HEAD

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
                                    <?php include('admin_sidemenu.php') ?>
                                    <!-- Help Box -->
                                    <!-- end Help Box -->
                                    <!-- End Sidebar -->
                                    <div class="clearfix"></div>
=======
<?php
include 'dbcon.php';

$sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, 
tbl_userinfo.birthday, tbl_userinfo.gender, tbl_usercredentials.email, tbl_usercredentials.contact, tbl_address.*
FROM tbl_userinfo
JOIN tbl_usercredentials ON tbl_userinfo.user_id = '$user_id'
JOIN tbl_address ON tbl_userinfo.user_id = tbl_address.address_id;";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
        $name = $firstname . ' ' . $middlename . ' ' . $lastname;
        $birthday = $row['birthday'];
        $gender = $row['gender'];
        $email = $row['email'];
        $contact = $row['contact'];
        $address = $row['address'];
    }
}
?>
<div class="container">
    <form action="profile_update.php" method="POST">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <label for="profilePicture">
                                        <img id="profileImage" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                            alt="Maxwell Admin">
                                    </label>
                                    <input type="file" class="form-control-file" id="profilePicture"
                                        style="display: none;">
                                </div>
                                <div class="form-group">
                                    <h5 class="user-name">
                                        <?php echo $name?>
                                    </h5>
>>>>>>> 12e09c54707996372dbdab6211120947a22e9ea8
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-required placeholder" style="width: 260px; height: 234px;"></div>
                </div>
<<<<<<< HEAD
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
=======
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">First Name</label>
                                    <input type="text" class="form-control" id="fullName" name="firstname"
                                        placeholder="<?php echo $firstname ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Middle Name</label>
                                    <input type="text" class="form-control" id="fullName" name="middlename"
                                        placeholder="<?php echo $middlename ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Last Name</label>
                                    <input type="text" class="form-control" id="fullName" name="lastname"
                                        placeholder="<?php echo $lastname ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Gender</label>
                                    <input type="text" class="form-control" id="website" name="gender" placeholder="<?php echo $gender ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Birthdate</label>
                                    <input type="text" class="form-control" id="website" name="birthday" placeholder="<?php echo $birthday ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="email" placeholder="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="contact_number"
                                        placeholder="<?php echo $contact ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo $address ?>">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Change Password</h6>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">New Password</label>
                                    <input type="password" class="form-control" id="fullName" name="password"
                                        placeholder="Enter new password">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Confirm Password</label>
                                    <input type="text" class="form-control" id="fullName" name="cfpassword"
                                        placeholder="Confirm password">
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-secondary"
                                        onclick="window.history.back();">Cancel</button>
                                    <button type="submit" id="submit" name="btnUpdate"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
>>>>>>> 12e09c54707996372dbdab6211120947a22e9ea8
                    </div>
                </div>
            </div>
            <!-- Sidebar -left -->
        </div>
<<<<<<< HEAD
        <!-- Left Sidebar End -->
        <!-- ============================================================== --> 
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include('admin_topbar.php') ?>
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right"></div>
                                <h3 class="page-title">Admin Profile</h3>
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
                                                <img src="assets/images/users/Jillian-Ward.jpg" alt=""
                                                    class="rounded-circle img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <h4 class="mt-1 mb-1 text-white">
                                                    <?php echo $name?>
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
                                        <a href="admin_edit_profile.php">
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
                        <a class="nav-link active show" id="v-pills-profile-tab" data-bs-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Contact and basic Info</span>
                        </a>
                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Achivements</span>
                        </a>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-sm-8">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
=======
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
>>>>>>> 12e09c54707996372dbdab6211120947a22e9ea8


                            <h2>Contact and basic Info</h2>
                            <br>

                            <p class="h3 text-info">Contact</p>
                            <br>
                            <span class="h4">
                                <i class="mdi mdi-cellphone-android"></i> &nbsp;<?php echo $contact ?></span>
                            <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile<br>
                            <br>

                            <span class="h4">
                                <i class="mdi mdi-email"></i> &nbsp;<?php echo $email ?></span>
                            <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email<br>
                            <br>

                            

                            <p class="h3 text-info">Basic info</p><br>

                            <span class="h4">
                                <i class="dripicons-user"></i> &nbsp;<?php echo $gender ?></span>
                            <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender<br>
                            <br>
                            <span class="h4">
                                <i class="mdi mdi-cake-variant"></i> &nbsp;<?php echo $birthday ?></span>
                            <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth-date<br>
                            <br>



                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">

                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-info float-end"><i
                                            class="mdi mdi-trophy-award"><span>Certified</span> </i>
                                    </div>
                                    <p class="mb-0">Certificate of Eligibility from the Professional Regulation
                                        Commission (PRC).
                                        This certificate confirms that they have met the basic qualifications and
                                        prerequisites for the
                                        licensure examination.
                                    </p>
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->

                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-success float-end"><i
                                            class="mdi mdi-trophy-award"><span>Certified</span>
                                        </i> </div>
                                    <p class="mb-0">"This year, the esteemed accolade of 'Best Teacher of the Year' was
                                        rightfully
                                        bestowed upon our exceptional educator, as their
                                        unwavering dedication, passion, and profound impact on students' lives made them
                                        stand out as the
                                        epitome of excellence in the teaching profession."
                                    </p>
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->

                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-warning float-end"><i
                                            class="mdi mdi-trophy-award"><span>Certified</span>
                                        </i> </div>
                                    <p class="mb-0">"With a rare blend of expertise, compassion, and creativity, our
                                        teacher has left an
                                        indelible mark on the hearts and minds of students, leading to their
                                        well-deserved
                                        distinction as the 'Best Teacher of the Year' and exemplifying the pinnacle of
                                        educational
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
            <?php //include('Teacher_Settings.php'); ?>
            <!-- End right side bar -->
            <!-- bundle -->
            <script src="assets/js/vendor.min.js"></script>
            <script src="assets/js/app.min.js"></script>
        </div>
    </div>
</body>

</html>