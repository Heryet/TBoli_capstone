<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<?php include('profileinfo.php')?>

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

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

    <style>
    .error {
        text-align: center;
        background: #f59595fb;
        color: #b92c2c;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }
    .success {
        font-size: 20px;
        text-align: center;
        background: #00FF00;
        color: #white;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }
    </style>
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
                                    <?php include('learnerSideMenu.php') ?>


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
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        hello
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include('learnerTopBar.php') ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h3 class="page-title"> Edit Profile</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->


            <div class="row">
                <div class="col-sm-2 mb-2 mb-sm-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Change Profile Picture</span>
                        </a>
                        <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Password and security</span>
                        </a>
                    </div>
                </div> <!-- end col-->

                <div class="col-sm-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">

                            <h3>Password and security</h3>
                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success">
                                    <?php echo $_GET['success']; ?>
                                </p>
                            <?php } ?>
                            <table class="table table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>Change password</h4>
                                        </td>
                                        <td>
                                            <div class="d-grid">
                                                <!-- Signup modal-->
                                                <button type="button" class="btn btn-info btn-rounded"
                                                    data-bs-toggle="modal" data-bs-target="#change-pass">Change</button>
                                                <div id="change-pass" class="modal fade" tabindex="-1" role="dialog"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="text-center mt-2 mb-4">
                                                                    <a href="index.html" class="text-success">
                                                                        <span><img src="assets/images/hacker.gif" alt=""
                                                                                height="100px"></span>
                                                                        <h3>Change Password</h3>
                                                                        <?php if (isset($_GET['error'])) { ?>
                                                                        <p class="error">
                                                                            <?php echo $_GET['error']; ?>
                                                                        </p>
                                                                        <?php } ?>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                                include 'dbcon.php';

                                                                if (isset($_POST['btnChange'])) {
                                                                    $user_id = $_SESSION['user_id'];
                                                                    $userPassword = $_POST['currentpassword'];
                                                                    $newPassword = $_POST['newpassword'];
                                                                    $newPassword2 = $_POST['newpassword2'];

                                                                    // Check if the new passwords are empty
                                                                    if (empty($newPassword) || empty($newPassword2)) {
                                                                        ?> 
                                                                        <script>
                                                                            window.location.href="learner_edit_profile.php?error=All fields must be filled";
                                                                        </script>
                                                                        <?php
                                                                    } elseif ($newPassword !== $newPassword2) {
                                                                        ?> 
                                                                        <script>
                                                                            window.location.href="learner_edit_profile.php?error=Password does not match";
                                                                        </script>
                                                                        <?php
                                                                    } else {
                                                                        // Verify the current password
                                                                        $sql = "SELECT password FROM tbl_accounts WHERE user_id = ?";
                                                                        $stmt = mysqli_prepare($conn, $sql);
                                                                        mysqli_stmt_bind_param($stmt, "s", $user_id);
                                                                        mysqli_stmt_execute($stmt);
                                                                        $result = mysqli_stmt_get_result($stmt);

                                                                        if ($row = mysqli_fetch_assoc($result)) {
                                                                            $storedPassword = $row['password'];
                                                                            if (password_verify($userPassword, $storedPassword)) {
                                                                                // Hash and update the new password
                                                                                $encrypted = password_hash($newPassword, PASSWORD_DEFAULT);
                                                                                $updatePassword = "UPDATE tbl_accounts SET password = ? WHERE user_id = ?";
                                                                                $stmt = mysqli_prepare($conn, $updatePassword);
                                                                                mysqli_stmt_bind_param($stmt, "ss", $encrypted, $user_id);
                                                                                if (mysqli_stmt_execute($stmt)) {
                                                                                    ?> 
                                                                                    <script>
                                                                                        window.location.href="learner_edit_profile.php?success=Account updated successfully";
                                                                                    </script>
                                                                                    <?php
                                                                                } else {
                                                                                    ?> 
                                                                                    <script>
                                                                                        window.location.href="learner_edit_profile.php?error=Account updated unsuccessfully";
                                                                                    </script>
                                                                                    <?php
                                                                                }
                                                                            } else {
                                                                                echo 'Incorrect current password';
                                                                            }
                                                                        } else {
                                                                            echo 'User not found';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                                <form class="ps-3 pe-3" action="" method="POST">
                                                                    <div class="mb-3">
                                                                        <label for="Current-password"
                                                                            class="form-label">Current password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="Current-password"
                                                                                name="currentpassword"
                                                                                class="form-control"
                                                                                placeholder="Enter your current password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="new-password" class="form-label">New
                                                                            password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="new-password"
                                                                                name="newpassword"
                                                                                class="form-control"
                                                                                placeholder="Enter your new password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label">Re-type
                                                                            new password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="password"
                                                                                name="newpassword2"
                                                                                class="form-control"
                                                                                placeholder="Re-type your password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 text-center">
                                                                        <button class="btn btn-primary"
                                                                            type="submit" name="btnChange">Change password</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- ennddd -->
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">

                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">


                            <h4>Upload your picture here!</h4>

                            <br>
                            <br>
                            <!-- File Upload -->
                            <form action="/" method="post" class="dropzone" id="myAwesomeDropzone"
                                data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate">


                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                        <strong>not</strong> actually uploaded.)</span>
                                </div>




                            </form>

                            <div class="d-grid col-sm-2 mt-3">
                                <button type="button" class="btn btn-info">Update</button>

                            </div>

                            <!-- Preview -->
                            <div class="dropzone-previews mt-3" id="file-previews"></div>

                            <!-- file preview template -->
                            <div class="d-none" id="uploadPreviewTemplate">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                    alt="">
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold"
                                                    data-dz-name></a>
                                                <p class="mb-0" data-dz-size></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                    <i class="dripicons-cross"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div> <!-- end tab-content-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script>202320232023202320232023 © Hyper -
                            Coderthemes.com
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
            <?php include('learnerSettings.php'); ?>
            <!-- End right side bar -->


            <!-- bundle -->
            <script src="assets/js/vendor.min.js"></script>
            <script src="assets/js/app.min.js"></script>

            <!-- plugin js -->
            <script src="assets/js/vendor/dropzone.min.js"></script>
            <!-- init js -->
            <script src="assets/js/ui/component.fileupload.js"></script>

        </div>
    </div>
</body>

</html>