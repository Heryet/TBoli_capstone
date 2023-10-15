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

                                    <?php include('teacher_sidemenu.php') ?>

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
        hello
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
                                        <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li>

                                        <li class="breadcrumb-item active">Enrollment Services</li>
                                        <li class="breadcrumb-item active">Add Student</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Student Account Registration</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php
include 'dbcon.php';

if (isset($_POST['submit'])) {
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gfirstname = $_POST['gfirstname'];
    $gmiddlename = $_POST['gmiddlename'];
    $glastname = $_POST['glastname'];
    $gbirthday = $_POST['gbirthday'];
    $ggender = $_POST['ggender'];
    $gnumber = $_POST['gphoneNumber'];
    $gemail = $_POST['gemail'];
    $gaddress = $_POST['gaddress'];
    $address = $_POST['address'];
    
    // Determine the next available learner_auto_id
    $result = $conn->query("SELECT MAX(SUBSTRING(student_auto_id, 4)) AS max_id FROM tbl_student");
    $row = $result->fetch_assoc();
    $next_id = intval($row['max_id']) + 1;
    $student_auto_id = 'stud' . sprintf('%03d', $next_id);


    // Insert other learner information
    $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) VALUES ('$firstname', '$middlename', '$lastname', '$birthday', '$gender')";
    if ($conn->query($sql) === TRUE) {
        $user_info_id = $conn->insert_id;

        $sql = "INSERT INTO tbl_usercredentials (email, contact) VALUES ('$email', '$phone')";
        if ($conn->query($sql) === TRUE) {
            $usercredentials_id = $conn->insert_id;

            $sql = "INSERT INTO tbl_learner_guardian_info (firstname, middlename, lastname, birthday, gender) VALUES ('$gfirstname', '$gmiddlename', '$glastname', '$gbirthday', '$ggender')";
            if ($conn->query($sql) === TRUE) {
                $guardian_info_id = $conn->insert_id;

                $sql = "INSERT INTO tbl_learner_guardian_contact (contact_num, email, address) VALUES ('$gnumber', '$gemail', '$gaddress')";
                if ($conn->query($sql) === TRUE) {
                    $guardian_contact_id = $conn->insert_id;

                    $sql = "INSERT INTO tbl_address (address) VALUES ('$address')";
                    if ($conn->query($sql) === TRUE) {
                        $address_id = $conn->insert_id;

                        $sql = "INSERT INTO tbl_user_level (level) VALUES ('LEARNER')";
                        if ($conn->query($sql) === TRUE) {
                            $level_id = $conn->insert_id;

                            $sql = "INSERT INTO tbl_user_status (status) VALUES ('1')";
                            if ($conn->query($sql) === TRUE) {
                                $status_id = $conn->insert_id;

                                // Insert learner information into tbl_learner with the generated learner_auto_id
                                $sql = "INSERT INTO tbl_student (student_auto_id, lrn, user_id, guardian_info_id, guardian_contact_id, address_id, level_id, status_id, account_id, usercredentials_id) 
            VALUES ('$next_id', '$lrn', '$user_id', '$guardian_info_id', '$guardian_contact_id', '$address_id', '$level_id', '$status_id', '$account_id', '$usercredentials_id')";
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: admin_student.php?msg=Account added successfully");
                                    exit();
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


            <div class="col-">
                <div class="card">
                    <div class="card-body">

                        <h3>Student Information</h3>

                        <form class="needs-validation" novalidate method="POST">
                            <div class="row g-2">

                                <div class="mb-3">
                                    <label for="InputID" class="form-label">LRN<sup>*

                                        </sup></label>
                                    <input type="text" pattern="[0-9]+" class="form-control" id="InputID"
                                        placeholder="02000221026" name="lrn" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter numeric values only.
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="FName" class="form-label">First Name <sup>*
                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="FName"
                                        placeholder="First Name" name="firstname" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        First Name should only contain letters
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
                                        Middle Name should only contain letters
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
                                        Last Name should only contain letters
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
                                    <label class="form-label">Phone Number <sup>*</sup></label>
                                    <input type="text" class="form-control" data-toggle="input-mask"
                                        data-mask-format="(+63) 000-000-0000" name="phone" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number, e.g., 09123456789."
                                    </div>
                                </div>
                            </div>




                            <h3>Parents Information</h3>

                            <div class="row g-2">



                                <div class="mb-3 col-md-6">
                                    <label for="FName" class="form-label">First Name <sup>*

                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="FName"
                                        placeholder="First Name" name="gfirstname" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        First Name should only contain letters
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="MiddleName" class="form-label">Middle Name <sup>*

                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="MiddleName"
                                        placeholder="MiddleName" name="gmiddlename" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Middle Name should only contain letters
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="LName" class="form-label">Last Name <sup>*

                                        </sup></label>
                                    <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="LName"
                                        placeholder="Last Name" name="glastname" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Last Name should only contain letters
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="inputbday" class="form-label">Birthdate <sup>*
                                        </sup></label>
                                    <input type="date" class="form-control" id="inputbday" name="gbirthday" required>
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
                                    <label for="inputgGender" class="form-label">Gender <sup>*
                                        </sup></label>
                                    <select id="inputgGender" class="form-select" name="ggender" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select your gender.
                                    </div>
                                </div>
                            </div>

                            <h4>Location</h4>

                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Full address (street, barangay, city)
                                    <sup>*
                                    </sup></label>
                                <input type="text" pattern="[A-Za-z0-9\s]+" class="form-control" id="inputAddress"
                                    placeholder="Enter Address" name="gaddress" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide your address or location
                                </div>
                            </div>

                            <h4>Contact Information</h4>
                            <div class="row g-2">
                                <div class="mb-3 col-md-5">
                                    <label for="inputCity" class="form-label">Email Address <sup>*

                                        </sup></label>
                                    <input type="email" class="form-control" id="inputCity" name="gemail" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Email should contains @ sign e.g., Juan@gmail.com"
                                    </div>
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label class="form-label">Phone Number <sup>*</sup></label>
                                    <input type="text" class="form-control" data-toggle="input-mask"
                                        data-mask-format="(+63) 000-000-0000" name="phone" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number, e.g., 09123456789."
                                    </div>
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