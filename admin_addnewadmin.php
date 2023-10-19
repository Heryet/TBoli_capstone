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

                                    <!--- Side Menu -->

                                    <?php include('admin_sidemenu.php') ?>

                                    <!-- Help Box -->

                                    <!-- end Help Box -->
                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar- placeholder" style="width: 260px; height: 234px;"></div>
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
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <!-- <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li>

                                        <li class="breadcrumb-item active">Enrollment Services</li>
                                        <li class="breadcrumb-item active">Add Student</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Admin Account Registration</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php
        include 'dbcon.php';

        if (isset($_POST['submit'])) {
            // Determine the next available admin_auto_id
            $result = $conn->query("SELECT MAX(SUBSTRING(admin_auto_id, 3)) AS max_id FROM tbl_admin");
            $row = $result->fetch_assoc();
            $next_id = intval($row['max_id']) + 1;
            $admin_auto_id = 'ad' . sprintf('%03d', $next_id); // Format ID with leading zeros
        
            // Collect form data
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $address = $_POST['address'];
            $password = $lastname . $gender;
            $encrypted = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into tbl_userinfo
            $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) VALUES ('$firstname', '$middlename', '$lastname', '$birthday', '$gender')";
            if ($conn->query($sql) === TRUE) {
                $user_info_id = $conn->insert_id;

                // Insert data into tbl_usercredentials
                $sql = "INSERT INTO tbl_usercredentials (email, contact) VALUES ('$email', '$contact')";
                if ($conn->query($sql) === TRUE) {
                    $credentials_id = $conn->insert_id;

                    // Insert data into tbl_address
                    $sql = "INSERT INTO tbl_address (address) VALUES ('$address')";
                    if ($conn->query($sql) === TRUE) {
                        $address_id = $conn->insert_id;

                        // Insert data into tbl_user_level
                        $sql = "INSERT INTO tbl_user_level (level) VALUES ('ADMIN')";
                        if ($conn->query($sql) === TRUE) {
                            $level_id = $conn->insert_id;

                            // Insert data into tbl_user_status
                            $sql = "INSERT INTO tbl_user_status (status) VALUES ('1')";
                            if ($conn->query($sql) === TRUE) {
                                $status_id = $conn->insert_id;

                                // Insert data into tbl_accounts
                                $sql = "INSERT INTO tbl_accounts (email, password) VALUES ('$email', '$encrypted')";
                                if ($conn->query($sql) === TRUE) {
                                    $account_id = $conn->insert_id;

                                    // Insert data into tbl_admin with generated admin_auto_id
                                    $sql = "INSERT INTO tbl_admin (admin_auto_id, user_id, credentials_id, address_id, level_id, status_id, account_id) 
                                    VALUES ('$admin_auto_id', '$user_info_id', '$credentials_id', '$address_id', '$level_id', '$status_id', '$account_id')";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "<script>alert('Added successfully');</script>";
                                        echo "<script>window.location.href='admin_addnewadmin.php';</script>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>




            <div class="col-">
                <div class="card">
                    <div class="card-body">

                        <h3>Add Admin</h3>

                        <form class="needs-validation" novalidate method="POST">
                            <div class="row g-2">

                                <div class="mb-3 col-md-6">
                                    <label for="FName" class="form-label">First Name <sup>*
                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="FName"
                                        placeholder="First Name" name="firstname" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        First Name should only contain letters and should not be empty
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="MiddleName" class="form-label">Middle Name <sup>*
                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="MiddleName"
                                        placeholder="MiddleName" name="middlename" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Middle Name should only contain letters and should not be empty
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="LName" class="form-label">Last Name <sup>*
                                            <?php echo $lastn ?? ''; ?>
                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="LName"
                                        placeholder="Last Name" name="lastname" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Last Name should only contain letters and should not be empty
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="inputbday" class="form-label">Birthdate <sup>*

                                        </sup></label>
                                    <input type="date" class="form-control" id="inputbday" name="birthday" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select your birthday.
                                    </div>
                                </div>


                            </div>

                            <div class="row g-2">

                                <div class="mb-3 col-md-4">
                                    <label for="inputGender" class="form-label">Gender <sup>*</sup></label>
                                    <select id="inputGender" class="form-select" name="gender" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select your gender.
                                    </div>
                                </div>

                            </div>

                            <h4>Contact Information</h4>
                            <div class="row g-2">
                                <div class="mb-3 col-md-5">
                                    <label for="inputCity" class="form-label">Email Address <sup>*

                                        </sup></label>
                                    <input type="email" class="form-control" id="inputCity" name="email" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Email should contains @ sign e.g., Juan@gmail.com"
                                    </div>
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label for="inputBarangay" class="form-label">Phone Number <sup>*

                                        </sup></label>
                                    <input type="text" pattern="[0-9]+" class="form-control" id="inputBarangay"
                                        name="phone" required maxlength="11" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number, e.g., 09123456789."
                                    </div>
                                </div>
                            </div>
                            <h4>Location</h4>

                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Full address (street, barangay, city)
                                    <sup>*

                                    </sup></label>
                                <input type="text" pattern="[A-Za-z0-9\s]+" class="form-control" id="inputAddress"
                                    placeholder="Enter Address" name="address" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide your address or location
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Create Account" name="submit">
                        </form>



                        <div class="table-responsive">

                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>







            <!-- Footer Start -->
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script>
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
            </footer> -->
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