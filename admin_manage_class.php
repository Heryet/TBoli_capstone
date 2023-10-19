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
               <!-- Add button to open the modal -->
                <div class="row">

                    <div class="row">
                           <!-- Button to open modal -->
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#addTeacher">Add Teacher</button>
                    </div>
                    <!-- Modal for adding a new Teacher -->
                    <div class="modal fade" id="addTeacher" tabindex="-1" aria-labelledby="addTeacherModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTeacherModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new student assignment -->
                                    <?php 
                                    include 'dbcon.php';
                                    if(isset($_GET['quiz_options_id']) && isset($_POST['addStudent'])) {
                                        $quiz_options_id = $_GET['quiz_options_id'];
                                        $student = $_POST['student'];

                                        $sql = "INSERT INTO tbl_quiz_student (quiz_options_id, student) VALUES ('$quiz_options_id', '$student')";

                                        $result = mysqli_query($conn, $sql);

                                        if($result) {
                                            header("Location: admin_manage_class.php?msg=Student Added Succesfully");
                                            exit();
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Add Teacher</label>
                                            <select id="inputState" class="form-select" name="student">
                                                <option selected disabled>Select Teacher</option>
                                                <!-- Default option -->
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

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $user_id = $row['teacher_id'];
                                                        $firstname = $row['firstname'];
                                                        $middlename = $row['middlename'];
                                                        $lastname = $row['lastname'];
                                                        $name = $firstname . ' ' . $middlename . ' ' . $lastname;
                                                        echo "<option value='$user_id'>$name</option>";
                                                    }   
                                                } else {
                                                    echo "<option value='' disabled>No lessons available</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addStudent">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addStudentModal">Add Student</button>
                        </div>
                      
            
                    
                    <!-- Modal for adding a new quiz assignment -->
                    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new student assignment -->
                                    <?php 
                                    include 'dbcon.php';
                                    if(isset($_GET['quiz_options_id']) && isset($_POST['addStudent'])) {
                                        $quiz_options_id = $_GET['quiz_options_id'];
                                        $student = $_POST['student'];

                                        $sql = "INSERT INTO tbl_quiz_student (quiz_options_id, student) VALUES ('$quiz_options_id', '$student')";

                                        $result = mysqli_query($conn, $sql);

                                        if($result) {
                                            header("Location: Teacher_Manage_Quiz.php?msg=Student Added Succesfully");
                                            exit();
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Add Student</label>
                                            <select id="inputState" class="form-select" name="student">
                                                <option selected disabled>Select Student</option>
                                                <!-- Default option -->
                                                <?php
                                                include 'dbcon.php';

                                                $sql = "SELECT tbl_userinfo.user_id, tbl_learner.learner_id, tbl_learner.level_id, tbl_user_level.level, tbl_userinfo.firstname,
                                                tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.birthday, tbl_user_status.status,
                                                tbl_learner_id.lrn
                                                FROM tbl_learner
                                                JOIN tbl_user_level ON tbl_learner.level_id = tbl_user_level.level_id
                                                JOIN tbl_userinfo ON tbl_learner.user_id = tbl_userinfo.user_id
                                                JOIN tbl_learner_id ON tbl_learner.learner_id = tbl_learner_id.learner_id
                                                JOIN tbl_user_status ON tbl_learner.status_id = tbl_user_status.status_id
                                                WHERE tbl_user_level.level = 'LEARNER' AND tbl_user_status.status = 1";

                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $user_id = $row['user_id'];
                                                        $firstname = $row['firstname'];
                                                        $middlename = $row['middlename'];
                                                        $lastname = $row['lastname'];
                                                        $name = $firstname . ' ' . $middlename . ' ' . $lastname;
                                                        echo "<option value='$user_id'>$name</option>";
                                                    }   
                                                } else {
                                                    echo "<option value='' disabled>No lessons available</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addStudent">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
    <!-- Question Table -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['quiz_options_id'])) {
                                $quiz_options_id = $_GET['quiz_options_id'];

                                // Define the current page and the number of rows to display
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                $rowsPerPage = 9;

                                // Calculate the offset based on the current page and rows per page
                                $offset = ($currentPage - 1) * $rowsPerPage;

                                $sql = "SELECT tbl_quiz_question.question, tbl_quiz_options.quiz_options_id
                                        FROM tbl_quiz_question
                                        JOIN tbl_quiz_options ON tbl_quiz_question.quiz_options_id = tbl_quiz_options.quiz_options_id
                                        WHERE tbl_quiz_options.quiz_options_id = '$quiz_options_id'
                                        LIMIT $offset, $rowsPerPage";

                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">
                                                    <?php echo $row['question']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="edit-icon"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="#" class="archive-icon"><i class="fas fa-archive"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links for the Question table -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo ($currentPage > 1) ? "Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=" . ($currentPage - 1) : '#'; ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php
                        // Calculate the total number of pages
                        $sqlCount = "SELECT COUNT(*) as total FROM tbl_quiz_question
                                    JOIN tbl_quiz_options ON tbl_quiz_question.quiz_options_id = tbl_quiz_options.quiz_options_id
                                    WHERE tbl_quiz_options.quiz_options_id = '$quiz_options_id'";
                        $countResult = mysqli_query($conn, $sqlCount);
                        $totalRecords = mysqli_fetch_assoc($countResult)['total'];
                        $totalPages = ceil($totalRecords / $rowsPerPage);

                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo "<li class='page-item " . (($currentPage == $i) ? 'active' : '') . "'>";
                            echo "<a class='page-link' href='Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=$i'>$i</a>";
                            echo "</li>";
                        }
                        ?>
                        <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo ($currentPage < $totalPages) ? "Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=" . ($currentPage + 1) : '#'; ?>">
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Student Table -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['quiz_options_id'])) {
                                $quiz_options_id = $_GET['quiz_options_id'];

                                // Define the current page and the number of rows to display
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                $rowsPerPage = 6;

                                // Calculate the offset based on the current page and rows per page
                                $offset = ($currentPage - 1) * $rowsPerPage;

                                $sql = "SELECT tbl_quiz_student.student, tbl_quiz_options.quiz_options_id, CONCAT(tbl_userinfo.firstname, ' ', tbl_userinfo.middlename, ' ', tbl_userinfo.lastname) AS name
                                        FROM tbl_quiz_student
                                        JOIN tbl_quiz_options ON tbl_quiz_student.quiz_options_id = tbl_quiz_options.quiz_options_id
                                        JOIN tbl_userinfo ON tbl_quiz_student.student = tbl_userinfo.user_id
                                        WHERE tbl_quiz_options.quiz_options_id = '$quiz_options_id'
                                        LIMIT $offset, $rowsPerPage";

                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">
                                                    <?php echo $row['name']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="edit-icon"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="#" class="archive-icon"><i class="fas fa-archive"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links for the Student table -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo ($currentPage > 1) ? "Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=" . ($currentPage - 1) : '#'; ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php
                        // Calculate the total number of pages
                        $sqlCount = "SELECT COUNT(*) as total FROM tbl_quiz_student
                                    JOIN tbl_quiz_options ON tbl_quiz_student.quiz_options_id = tbl_quiz_options.quiz_options_id
                                    WHERE tbl_quiz_options.quiz_options_id = '$quiz_options_id'";
                        $countResult = mysqli_query($conn, $sqlCount);
                        $totalRecords = mysqli_fetch_assoc($countResult)['total'];
                        $totalPages = ceil($totalRecords / $rowsPerPage);

                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo "<li class='page-item " . (($currentPage == $i) ? 'active' : '') . "'>";
                            echo "<a class='page-link' href='Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=$i'>$i</a>";
                            echo "</li>";
                        }
                        ?>
                        <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo ($currentPage < $totalPages) ? "Teacher_Manage_Quiz.php?quiz_options_id=$quiz_options_id&page=" . ($currentPage + 1) : '#'; ?>">
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


        <!-- Right Sidebar -->
   

        <div class="rightbar-overlay"></div>
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