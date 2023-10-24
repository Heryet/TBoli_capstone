<?php
// Ensure you start the session
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('teacher_header.php') ?>
    <style>
            /* gif modal css */
    #gifModal .modal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    #gifModal .modal-body img {
        max-width: 100%;
        height: auto;
        width: 200px; /* Adjust the width as desired */
        margin-bottom: 10px;
    }
    </style>
</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

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

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <?php include('teacher_sidemenu.php') ?>

                <!-- End Sidebar -->
                <div class="clearfix"></div>
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
                <?php include('teacher_topbar.php') ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                                <h4 class="page-title">Quiz List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Add button to open the modal -->
                    <div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
            data-bs-target="#addQuizModal">Add Quiz</button>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            <div class="input-group-append">
                <button class="btn btn-primary" id="searchButton">Search</button>
            </div>
        </div>
    </div>
</div>

        <!-- modal gif -->
        <div id="gifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/images/gif/check.gif" alt="GIF" class="img-fluid">
                        <p>Created successfully</p>
                    </div>
                </div>
            </div>
        </div>

                    <!-- Modal for adding a new quiz assignment -->
                    <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addQuizModalLabel">Add Quiz Assignment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new quiz assignment -->
                                    <?php 
                                    include 'dbcon.php';

                                    if(isset($_POST['addQuiz'])) {
                                        session_start(); // Add session_start() to use $_SESSION
                                        $user_id = $_SESSION['user_id'];
                                        $quizTitle = $_POST['quizTitle'];
                                        $lesson = $_POST['lesson'];
                                        $instructions = $_POST['instructions'];

                                        $sql = "INSERT INTO tbl_quiz_options (added_by, title, lesson, instructions) VALUES
                                        ('$user_id', '$quizTitle', '$lesson', '$instructions')";

                                        if ($conn->query($sql) === TRUE) {
                                            $url = "Teacher_Create_Quiz.php?success=Student added successfully&openModal=true";
                                            echo '<script>window.location.href = "' . $url . '";</script>';
                                        } else {
                                            // Error occurred
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                    }
                                    ?>
                                    <form class="needs-validation" novalidate action="" method="POST">
                                        <div class="mb-3">
                                            <label for="quizTitle" class="form-label">Quiz Title</label>
                                            <input type="text" class="form-control" id="quizTitle" name="quizTitle" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a title!
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="lessonSelect" class="form-label">Select Lesson</label>
                                            <select id="lessonSelect" class="form-select" name="lesson" required>
                                                <option value="" selected disabled>Select a lesson</option>
                                                <?php
                                                include 'dbcon.php';
                                                $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, tbl_lesson_files.status FROM tbl_lesson
                                                    JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_id
                                                    WHERE tbl_lesson_files.status = 1";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $lesson_id = $row['lesson_id'];
                                                        $name = $row['name'];
                                                        $type = $row['type'];
                                                        $level = $row['level'];
                                                        echo "<option value='$lesson_id'>$type: $level - $name</option>";
                                                    }
                                                } else {
                                                    echo "<option value='' disabled>No lessons available</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select a lesson!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="instructions" class="form-label">Instructions</label>
                                            <textarea class="form-control" id="instructions" name="instructions" required></textarea>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide instructions!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="attemptsSelect" class="form-label">Attempts</label>
                                            <select id="attemptsSelect" class="form-select" name="attempts" required>
                                                <option value="" selected disabled>Select attempts</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select the number of attempts!
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addQuiz">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table to display quiz assignments -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Lesson Name</th>
                                                    <th>Lesson Instructions</th>
                                                    <th>Added By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include 'dbcon.php';

                                                    $sql = "SELECT DISTINCT tbl_quiz_options.quiz_options_id, tbl_quiz_options.added_by, tbl_quiz_options.title, tbl_quiz_options.lesson, tbl_quiz_options.instructions, tbl_userinfo.firstname, tbl_userinfo.lastname, tbl_lesson.name FROM tbl_quiz_options
                                                    JOIN tbl_userinfo ON tbl_quiz_options.added_by = tbl_userinfo.user_id
                                                    JOIN tbl_lesson ON tbl_quiz_options.lesson = tbl_lesson.lesson_id
                                                    WHERE tbl_quiz_options.lesson = tbl_lesson.lesson_id";

                                                    $result = mysqli_query($conn, $sql);

                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                <tr>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['quiz_options_id']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['title']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['name']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['instructions']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['firstname'] . $row ['lastname']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="Teacher_Manage_Quiz.php?quiz_options_id=<?php echo $row['quiz_options_id']; ?>"
                                                            class="btn btn-success btn-sm">Manage</a>
                                                        <a href="Teacher_Add_QuizMultipleC.php?quiz_options_id=<?php echo $row['quiz_options_id']; ?>"
                                                            class="btn btn-primary btn-sm">Edit</a>

                                                        <a href="#" class="btn btn-danger btn-sm">Archive</a>
                                                       
        <a href="view_quiz.php?quiz_options_id=<?php echo $row['quiz_options_id']; ?>"
            class="btn btn-primary btn-sm">View</a>
    
                                                        
                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                                <!-- End of database-generated rows -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container -->
            </div> <!-- content -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary mt-3" id="openAddQuizModal">Add Quiz</button>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="searchButton">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding a new quiz assignment -->
        <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addQuizModalLabel">Add Quiz Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a new quiz assignment -->
                        <form class="needs-validation" novalidate action="" method="POST">
                        <div class="mb-3">
                                            <label for="quizTitle" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="quizTitle" name="quizTitle"
                                                required>
                                            <label for="inputState" class="form-label">Select Lesson</label>
                                            <input type="text" class="form-control" id="selectlesson" name="selectlesson"
                                                required>
                                                <label for="instructions" class="form-label">Instructions</label>
                                            <!-- Changed the "for" attribute to match the textarea id -->
                                            <textarea class="form-control" id="instructions" name="instructions"
                                                required></textarea>
                            <div>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addQuiz">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const tableRows = document.querySelectorAll('.table tbody tr');

        searchButton.addEventListener('click', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (const row of tableRows) {
                const cells = row.querySelectorAll('td');
                let match = false;

                for (const cell of cells) {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        match = true;
                        break;
                    }
                }

                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        searchInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                searchButton.click();
            }
        });
    });
</script>

<!-- script gif modal -->
<script>
    $(document).ready(function() {
        // Check if the "openModal" query parameter is present
        const urlParams = new URLSearchParams(window.location.search);
        const openModal = urlParams.get("openModal");

        if (openModal === "true") {
            // Trigger the modal using JavaScript
            $("#gifModal").modal("show");
        }
    });
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