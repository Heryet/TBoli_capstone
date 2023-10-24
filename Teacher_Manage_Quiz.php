<?php
// Ensure you start the session
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('teacher_header.php') ?>
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
                <?php include('teacher_topbar.php')?>

                <!-- Start Content-->
                        
                <!-- Add button to open the modal -->
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addQuizModal">Add Multiple Choice</button>
                        </div>
                        <!-- Modal for adding a new quiz assignment -->
                        <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addQuizModalLabel">Add Question</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                        include 'dbcon.php';
                                        if (isset($_GET['quiz_options_id']) && isset($_POST['addQuiz'])) {
                                            $quiz_options_id = $_GET['quiz_options_id'];
                                            $question = $_POST['question'];
                                            $question_opts = $_POST['question_opt'];
                                            $is_right = $_POST['is_right'];

                                            if (empty($is_right)) {
                                                $url = "Teacher_Create_Quiz.php?openerrorModal=true";
                                                ?> 
                                                <script>
                                                    window.location.href= '<?php echo $url; ?>';
                                                </script>
                                                <?php
                                            } else {
                                                $sql = "INSERT INTO tbl_quiz_question (quiz_options_id, question) VALUES ('$quiz_options_id', '$question')";

                                                if ($conn->query($sql) === TRUE) {
                                                    $question_id = $conn->insert_id;
                                                    $options = $_POST['question_opt'];

                                                    for ($i = 0; $i < count($options); $i++) {
                                                        $choice = $options[$i];
                                                        $is_right_value = isset($is_right[$i]) ? 1 : 0;
        
                                                        $sql = "INSERT INTO tbl_quiz_choices (question_id, choices, is_right) VALUES ('$question_id', '$choice', '$is_right_value')";
        
                                                        if ($conn->query($sql) !== TRUE) {
                                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                                        }
                                                    }
                                                    $url = "Teacher_Manage_Quiz.php";
                                                    ?> 
                                                    <script>
                                                        window.location.href= $url;
                                                    </script>
                                                    <?php
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                            }
                                        } elseif (isset($_GET['quiz_options_id']) && isset($_POST['btnSave'])) {
                                            $quiz_options_id = $_GET['quiz_options_id'];
                                            $question = $_POST['question'];
                                            $question_opts = $_POST['question_opt'];
                                            $is_right = $_POST['is_right'];

                                            if (empty($is_right)) {
                                                $url = "Teacher_Create_Quiz.php?openerrorModal=true";
                                                ?> 
                                                <script>
                                                    window.location.href= '<?php echo $url; ?>';
                                                </script>
                                                <?php
                                            } else {
                                                $sql = "INSERT INTO tbl_quiz_question (quiz_options_id, question) VALUES ('$quiz_options_id', '$question')";
        
                                                if($conn->query($sql) === TRUE) {
                                                $question_id = $conn->insert_id;
                                                $options = $_POST['question_opt'];
            
    
                                                    // loop
                                                    for ($i = 0; $i < count($options); $i++) {
                                                        $choice = $options[$i];
                                                        $is_right_value = isset($is_right[$i]) ? 1 : 0;
                
                                                        $sql = "INSERT INTO tbl_quiz_choices (question_id, choices, is_right) VALUES ('$question_id', '$choice', '$is_right_value')";
                
                                                        if ($conn->query($sql) !== TRUE){
                                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                                        }
                                                    }
                                                    $url = "Teacher_Manage_Quiz.php";
                                                    ?> 
                                                    <script>
                                                        window.location.href= $url;
                                                    </script>
                                                    <?php
                                                }    
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST">
                                            <div id="msg"></div>
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <input type="hidden" name="id" />
                                                <textarea rows='3' name="question" required="required" class="form-control"></textarea>
                                            </div>
                                            <label>Options:</label>

                                            <div class="form-group" id="options">
                                                <textarea rows="2" name="question_opt[0]" required="" class="form-control" value=""></textarea>
                                                <span>
                                                    <label><input type="radio" name="is_right[0]" class="is_right" value="1">
                                                        <small>Question Answer</small></label>
                                                </span>
                                                <br>
                                                <textarea rows="2" name="question_opt[1]" required="" class="form-control"></textarea>
                                                <label><input type="radio" name="is_right[1]" class="is_right" value="1">
                                                    <small>Question Answer</small></label>
                                                <br>
                                                <textarea rows="2" name="question_opt[2]" required="" class="form-control"></textarea>
                                                <label><input type="radio" name="is_right[2]" class="is_right" value="1">
                                                    <small>Question Answer</small></label>
                                                <br>
                                                <textarea rows="2" name="question_opt[3]" required="" class="form-control"></textarea>
                                                <label><input type="radio" name="is_right[3]" class="is_right" value="1">
                                                    <small>Question Answer</small></label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="addQuiz">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    <!-- Button to open modal -->
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#addQuizTrueFalse">Add True or False</button>
                    </div>
                    <!-- Modal for adding a new quiz true or false -->
                    <div class="modal fade" id="addQuizTrueFalse" tabindex="-1" role="dialog" aria-labelledby="addQuizTrueFalseLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addQuizTrueFalseLabel">Add True or False Question</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="trueFalseQuestion">Question</label>
                                            <input type="text" id="trueFalseQuestion" name="question" class="form-control" placeholder="Enter your question here">
                                            <br>
                                            <label>Options:</label>
                                            <div class="form-group" id="trueFalseOptions">
                                                <input type="text" name="question_opt[0]" class="form-control" value="True" readonly>
                                                <br>
                                                <label>Answer:</label>
                                                <label><input type="radio" name="is_right[0]" class="is_right" value="1"><small>True</small></label>
                                                <br>
                                                <input type="text" name="question_opt[1]" class="form-control" value="False" readonly>
                                                <br>
                                                <label>Answer:</label>
                                                <label><input type="radio" name="is_right[1]" class="is_right" value="1"><small>False</small></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btnSave">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
    <!-- Question Table -->
    <div class="table-responsive mx-auto" style="max-width: 500dp;">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-centered table-nowrap mb-0 ">
                    <thead>
                        <tr>
                            <th>Question</th>
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
                                            <!-- Use d-flex to align items horizontally -->
                                        <!-- <div class="d-flex align-items-center">  -->
                                                <a href="#" class="edit-icon"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="archive-icon"><i class="fas fa-archive"></i></a>
                                            <!-- </div> -->
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
        </div>
    </div>
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

   

                    <!-- bundle -->
                    <script src="assets/js/vendor.min.js"></script>
                    <script src="assets/js/app.min.js"></script>

                    <!-- quill js -->
                    <script src="assets/js/vendor/quill.min.js"></script>
                    <!-- quill Init js-->
                    <script src="assets/js/pages/demo.quilljs.js"></script>

</body>

</html>