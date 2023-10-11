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


                <?php include('teacher_topbar.php') ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li>

                                        <li class="breadcrumb-item active">Enrollment Services</li>
                                        <li class="breadcrumb-item active">Add Parents</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Parent Account Registration</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->


            <div class="col-">
                <div class="card">
                    <div class="card-body">

                        <h4>Parents Information</h4>

                        <form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                            <div class="row g-2">



                                <div class="mb-3 col-md-6">
                                    <label for="FName" class="form-label">First Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="FName" required placeholder="First Name"
                                        name="firstname">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="MiddleName" class="form-label">Middle Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="MiddleName" required
                                        placeholder="MiddleName" name="midname">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="LName" class="form-label">Last Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="LName" required placeholder="Last Name"
                                        name="lastname">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="SuffiName" class="form-label">Suffix Name <sup>Optional</sup></label>
                                    <input type="text" class="form-control" id="SuffiName" placeholder="Suffix name"
                                        name="sufname">
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputbday" class="form-label">Birthdate <sup>*</sup></label>
                                    <input type="date" class="form-control" id="inputbday" name="bday">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputGender" class="form-label">Gender <sup>*</sup></label>
                                    <select id="inputGender" class="form-select" name="gender">
                                        <option>Choose</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                            </div>

                            <h4>Location</h4>

                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Full address (street, barangay, city)
                                    <sup>*</sup></label>
                                <input type="text" class="form-control" id="inputAddress" required
                                    placeholder="Enter Address" name="address">
                            </div>

                            <h4>Contact Information</h4>
                            <div class="row g-2">
                                <div class="mb-3 col-md-5">
                                    <label for="inputCity" class="form-label">Email <sup>*</sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city">
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label for="inputBarangay" class="form-label">Phone Number <sup>*</sup></label>
                                    <input type="text" class="form-control" id="inputBarangay" name="barrgy">
                                </div>
                            </div>

                            <!-- <h4>Parent/Guardian</h4>


                            <div class="row g-2">
                                

                            <div class="mb-3 col-md-6">
                                    <label for="FName" class="form-label">First Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="FName" required placeholder="First Name" name="firstname">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="LName" class="form-label">Last Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="LName" required placeholder="Last Name" name="lastname">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="MiddleName" class="form-label">Middle Name <sup>*</sup></label>
                                    <input type="text" class="form-control" id="MiddleName" required placeholder="MiddleName" name="midname">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="SuffiName" class="form-label">Suffix Name <sup>Optional</sup></label>
                                    <input type="text" class="form-control" id="SuffiName" placeholder="Suffix name" name="sufname">
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputbday" class="form-label">Birthdate <sup>*</sup></label>
                                    <input type="date" class="form-control" id="inputbday" name="bday">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputGender" class="form-label">Gender <sup>*</sup></label>
                                    <select id="inputGender" class="form-select" name="gender">
                                        <option>Choose</option>
                                        <option>Female</option>
                                        <option>Male</option> 
                                    </select>
                                </div>
                            </div>

                            <h4>Location</h4>
                                        
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Address <sup>*</sup></label>
                                <input type="text" class="form-control" id="inputAddress" required placeholder="1234 Main St" name="address">
                            </div>
                            
                                        
                            <div class="row g-2">
                                <div class="mb-3 col-md-5">
                                    <label for="inputCity" class="form-label">City <sup>*</sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city">
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label for="inputBarangay" class="form-label">Barangay <sup>*</sup></label>
                                    <input type="text" class="form-control" id="inputBarangay" name="barrgy">
                                </div>

                                <div class="mb-3 col-md-2">
                                    <label for="inputZip" class="form-label">Zip <sup>*</sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip">
                                </div>
                            </div>

                            <h4>Parent/Guardian Contact Infotmation</h4>

                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Phone Number/Tel Number <sup>*</sup></label>
                                <input type="text" class="form-control" id="inputAddress" required placeholder="1234 Main St">
                            </div>

                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Email address <sup>Optional</sup></label>
                                <input type="email" class="form-control" id="inputAddress" required placeholder="1234 Main St">
                            </div> -->





                            <input type="submit" class="btn btn-primary" value="Create Account" name="submit"></input>
                        </form>



                        <div class="table-responsive">

                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>







            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>202320232023202320232023 © Hyper -
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
            <?php include('Teacher_Settings.php'); ?>
            <!-- End right side bar -->


            <!-- bundle -->
            <script src="assets/js/vendor.min.js"></script>
            <script src="assets/js/app.min.js"></script>

        </div>
    </div>
</body>

</html>


<?php

/*if($_SERVER["REQUEST_METHOD"] == "POST"){

    $LID = filter_input(INPUT_POST, "LID", FILTER_SANITIZE_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
    $midname = filter_input(INPUT_POST, "midname", FILTER_SANITIZE_SPECIAL_CHARS);
    $sufname = filter_input(INPUT_POST, "sufname", FILTER_SANITIZE_SPECIAL_CHARS);
    $bday = filter_input(INPUT_POST, "bday", FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $barrgy = filter_input(INPUT_POST, "barrgy", FILTER_SANITIZE_SPECIAL_CHARS);
    $zip = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_SPECIAL_CHARS);
    
    if (empty($LID) || empty($firstname) || empty($lastname) || empty($midname) || empty($bday) || empty($gender) || empty($address) || empty($city) || empty($barrgy) || empty($zip)) {
        echo '<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Please fill in all the missing fields.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("errorModal"));
            modal.show();
        });
    </script>';
    }
    else{
        $sql = "INSERT INTO student_regis (lerner_id , firstname, lastname, midname, sufname, bday, gender, address, city, barrgy, zip) 
            VALUES ('$LID', '$firstname', '$lastname', '$midname', '$sufname', '$bday', '$gender', '$address', '$city', '$barrgy', '$zip')";
            mysqli_query($conn,$sql);
            echo '<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Student account has been created!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("errorModal"));
                modal.show();
            });
        </script>';
    }
}

mysqli_close($conn);*/

?>