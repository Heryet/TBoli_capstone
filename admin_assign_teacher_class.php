<?php
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php?Logout");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

</head>

<body class="show"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: false}"
    data-leftbar-theme="dark" data-leftbar-compact-mode="condensed" style="visibility: visible;">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
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
                                    <?php include("admin_sidemenu.php") ?>



                                    <!-- End Sidebar -->


                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 70px; height: 1150px;"></div>
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
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include("admin_topbar.php") ?>
                <!-- end Topbar -->

                <!-- content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">

                                        <select class="form-control select2" data-toggle="select2">
                                            <option>Select</option>
                                            <option value="AK">Literacy</option>
                                            <option value="HI">Numeracy</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal"
                                                data-bs-target="#assignTeacherModal">Assign Teacher</button>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck1">
                                                        <label class="form-check-label"
                                                            for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Teacher Name</th>
                                                <th>Teacher ID</th>
                                                <th>Class/Section</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include 'dbcon.php';

                                            $sql = "SELECT tbl_teachers.teacher_id, tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname,
                    tbl_usercredentials.email, tbl_usercredentials.contact, tbl_user_level.level, tbl_user_status.status
                FROM tbl_teachers
                JOIN tbl_userinfo ON tbl_teachers.user_id = tbl_userinfo.user_id
                JOIN tbl_usercredentials ON tbl_teachers.credentials_id = tbl_usercredentials.usercredentials_id
                JOIN tbl_user_level ON tbl_teachers.level_id = tbl_user_level.level_id
                JOIN tbl_user_status ON tbl_teachers.status_id = tbl_user_status.status_id
                WHERE tbl_user_level.level = 'TEACHER' AND tbl_user_status.status = 1";

                                            $result = mysqli_query($conn, $sql);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck2">
                                                        <label class="form-check-label"
                                                            for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>


                                                <td class="table-user">

                                                    <a href="javascript:void(0);" class="text-body fw-semibold">
                                                        <!-- <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?> -->
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- <?php echo $row['teacher_id'] ?> -->
                                                </td>
                                                <td>
                                                    <!-- <span class="fw-semibold">
                  <!-- <?php echo $row['birthday'] ?> -->
                                                    </span> -->
                                                </td>

                                                <td>
                                                    <a
                                                        href="admin_edit_teacher_acc.php?user_id=<?php echo $row['user_id'] ?>">
                                                        <button type="button" class="btn btn-primary"><i
                                                                class="mdi mdi-pencil"></i> </button>
                                                    </a>
                                                    <a href="admin_teacher_deactivate.php?teacher_id=<?php echo $row['teacher_id'] ?>"
                                                        class="decline">
                                                        <button type="button" class="btn btn-danger"><i
                                                                class="mdi mdi-archive"></i> </button>
                                                    </a>
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

                <!-- Assign Teacher Modal -->
                <div class="modal fade" id="assignTeacherModal" tabindex="-1" role="dialog"
                    aria-labelledby="assignTeacherModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignTeacherModalLabel">Assign Teacher</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="teacherSelect" class="form-label">Teacher</label>
                                        <select class="form-select" id="teacherSelect" name="teacher_id">
                                            <?php
                            include 'dbcon.php';

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Your SQL query for the "Teacher" dropdown
                            $sql = "SELECT tbl_teachers.teacher_id, tbl_userinfo.firstname, tbl_userinfo.lastname
                                    FROM tbl_teachers
                                    JOIN tbl_userinfo ON tbl_teachers.user_id = tbl_userinfo.user_id
                                    JOIN tbl_user_level ON tbl_teachers.level_id = tbl_user_level.level_id
                                    JOIN tbl_user_status ON tbl_teachers.status_id = tbl_user_status.status_id
                                    WHERE tbl_user_level.level = 'TEACHER' AND tbl_user_status.status = 1";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['teacher_id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No teachers available</option>';
                            }

                            mysqli_close($conn);
                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sectionSelect" class="form-label">Class/Section</label>
                                        <select class="form-select" id="sectionSelect" name="section_id">
                                            <?php
                            include 'dbcon.php';

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Your SQL query for the "Class/Section" dropdown
                            $sql = "SELECT `section_id`, `section` FROM `tbl_section` WHERE 1";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['section_id'] . '">' . $row['section'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No sections available</option>';
                            }

                            mysqli_close($conn);
                            ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="assignTeacherButton">Assign</button>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Find the Assign button and add a click event listener to it
                    const assignButton = document.getElementById("assignTeacherButton");
                    if (assignButton) {
                        assignButton.addEventListener("click", function() {
                            // Get selected values from the dropdowns
                            const teacherId = document.getElementById("teacherSelect").value;
                            const sectionId = document.getElementById("sectionSelect").value;

                            // Check if both teacher and section are selected
                            if (teacherId && sectionId) {
                                // Perform an AJAX request to save the assignment in your database
                                // You can use libraries like jQuery.ajax or the Fetch API to do this

                                // Example using Fetch API
                                fetch('assign_teacher.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded',
                                        },
                                        body: `teacher_id=${teacherId}&section_id=${sectionId}`,
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            // Assignment was successful, you can handle success here
                                            alert('Teacher assigned successfully!');
                                            // You may want to refresh the teacher list table here
                                        } else {
                                            // Assignment failed, handle the error here
                                            alert('Failed to assign teacher.');
                                        }
                                    })
                                    .catch(error => {
                                        // Handle any network errors here
                                        console.error('Error:', error);
                                    });
                            } else {
                                // Display an error message if either the teacher or section is not selected
                                alert('Please select a teacher and a class/section.');
                            }
                        });
                    }
                });
                </script>


                <!-- Right Sidebar -->

                <!-- /End-bar -->


                <!-- bundle -->
                <script src="assets/js/vendor.min.js"></script>
                <script src="assets/js/app.min.js"></script>

                <!-- quill js -->
                <script src="assets/js/vendor/quill.min.js"></script>
                <!-- quill Init js-->
                <script src="assets/js/pages/demo.quilljs.js"></script>



</body>

</html>