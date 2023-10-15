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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

</head>

<body class="show"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}"
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
                                <h4 class="page-title">Assign Area to Teacher</h4>
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

                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal"
                                            data-bs-target="#assignTeacherModal">
                                            Assign Teacher
                                        </button>
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
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Teacher Name</th>
                                            <th>Area</th>
                                            <th>Action</th>
                                            <!-- <th>Status</th> -->
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
                        -- JOIN tbl_area ON tbl_teachers.area_id = tbl_area.area_id
                        WHERE tbl_user_level.level = 'TEACHER' AND tbl_user_status.status = 1";

                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <?php
                    // Query to get all areas
                    $sql_areas = "SELECT * FROM tbl_area";
                    $result_areas = mysqli_query($conn, $sql_areas);
                        ?>

                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><?php echo $row['teacher_id'] ?></td>
                                            <td class="table-user">
                                                <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                    class="me-2 rounded-circle">
                                                <a href="javascript:void(0);" class="text-body fw-semibold">
                                                    <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="areaDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <?php
                            if (!empty($selectedArea)) {
                                echo $selectedArea;
                            } else {
                                echo 'Select Area';
                            }
                            ?>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="areaDropdown">
                                                        <?php
                            // Loop through the areas and create dropdown items
                            while ($area_row = mysqli_fetch_assoc($result_areas)) {
                                ?>
                                                        <a class="dropdown-item"
                                                            href="select_area.php?teacher_id=<?php echo $row['teacher_id']; ?>&area_id=<?php echo $area_row['area_id']; ?>"><?php echo $area_row['area']; ?></a>
                                                        <?php
                            }
                            ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a
                                                    href="admin_edit_teacher_acc.php?user_id=<?php echo $row['user_id'] ?>">
                                                    <button type="button" class="btn btn-primary"><i
                                                            class="mdi mdi-pencil"></i></button>
                                                </a>
                                                <a href="admin_teacher_deactivate.php?teacher_id=<?php echo $row['teacher_id'] ?>"
                                                    class="decline">
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="mdi mdi-archive"></i></button>
                                                </a>
                                            </td>
                                            <!-- <td>
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
                                                    </td> -->
                                        </tr>
                                        <?php
                            }
                        } else {
                            // Display a message if there are no results
                            ?>
                                        <tr>
                                            <td colspan="6">No teachers found.</td>
                                        </tr>
                                        <?php
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

            <!-- Modal -->
            <?php
                    // Query to get all areas
                    $sql_areas = "SELECT * FROM tbl_area";
                    $result_areas = mysqli_query($conn, $sql_areas);
                        ?>
            <div class="modal fade" id="assignTeacherModal" tabindex="-1" role="dialog"
                aria-labelledby="assignTeacherModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignTeacherModalLabel">Assign Area to Teacher</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your content related to assigning an area here -->
                            <form>
                                <div class="mb-3">
                                    <label for="areaTeacher" class="form-label">Select Teacher:</label>
                                    <select class="form-select" id="areaTeacher">
                                        <option value="">Select Teacher</option>
                                        <?php
        // Iterate through the $teachers array and generate options
        foreach ($teachers as $teacher) {
            echo '<option value="' . $teacher['teacher_id'] . '">' . $teacher['firstname'] . ' ' . $teacher['middlename'] . ' ' . $teacher['lastname'] . '</option>';
        }
        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="areaSelect" class="form-label">Assign Area:</label>
                                    <select class="form-select" id="areaSelect">
                                        <?php
                            if (!empty($selectedArea)) {
                                echo $selectedArea;
                            } else {
                                echo 'Select Area';
                            }
                            ?>

                                    </select>
                                </div>
                                <!-- Add more form fields as needed for the assignment process -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            // Function to populate the "Select Teacher" dropdown in the modal
            function populateTeacherDropdown() {
                // Assuming you have an API endpoint to fetch teacher data
                // Replace 'api/teachers' with your actual API endpoint
                fetch('api/teachers')
                    .then(response => response.json())
                    .then(data => {
                        const areaTeacherDropdown = document.getElementById('areaTeacherDropdown');

                        // Clear existing options except the "Select Teacher" option
                        while (areaTeacherDropdown.options.length > 1) {
                            areaTeacherDropdown.remove(1);
                        }

                        // Populate the dropdown with teacher names and IDs
                        data.forEach(teacher => {
                            const option = document.createElement('option');
                            option.value = teacher.teacher_id;
                            option.textContent = teacher.firstname + ' ' + teacher.lastname;
                            areaTeacherDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching teacher data:', error);
                    });
            }

            // Add an event listener to the "Assign Teacher" button
            const assignTeacherButton = document.querySelector('.btn-info');
            assignTeacherButton.addEventListener('click', populateTeacherDropdown);
            </script>



            <!-- bundle -->
            <script src="assets/js/vendor.min.js"></script>
            <script src="assets/js/app.min.js"></script>

            <!-- quill js -->
            <script src="assets/js/vendor/quill.min.js"></script>
            <!-- quill Init js-->
            <script src="assets/js/pages/demo.quilljs.js"></script>



</body>

</html>