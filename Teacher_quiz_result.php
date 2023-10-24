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

    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />




    <!-- third party css end -->

</head>
<div class="wrapper">
<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active">

            <!-- LOGO -->
                <!-- <a href="index.php" class="logo text-primary logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a> -->

            <!-- LOGO -->
      

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
        <?php include('teacher_topbar.php') ?>

        <!-- Start Content -->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                      
                        </div>
                        <h4 class="page-title">Correct Answer</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->

    </div> <!-- content -->
  


                <div class="table-responsive">
                    <table class="table table-hover table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;"></th>
                                <th>Question</th>
                                <th>Correct Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "dbcon.php";
                            if(isset($_GET['quiz_options_id'])){
                                $quiz_options_id = $_GET['quiz_options_id'];
                                
                                $sql = "SELECT tbl_quiz_question.question, tbl_quiz_choices.choices, tbl_quiz_choices.is_right FROM tbl_quiz_question
                                JOIN tbl_quiz_choices ON tbl_quiz_question.question_id = tbl_quiz_choices.question_id
                                WHERE tbl_quiz_question.quiz_options_id = '$quiz_options_id' AND tbl_quiz_choices.is_right = 1";

                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <?php echo $row['question'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['choices'] ?>
                                            </td>
                                            <td></td>
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
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
         


        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    
    <!-- /End-bar -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const filterButton = document.getElementById('filterButton');
        const quizSelect = document.getElementById('quizSelect');
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

        filterButton.addEventListener('click', function () {
            const selectedQuiz = quizSelect.value;
            const filterTerm = selectedQuiz.toLowerCase();

            for (const row of tableRows) {
                const cells = row.querySelectorAll('td');
                const quizCell = cells[2].textContent.toLowerCase();

                if (selectedQuiz === '' || quizCell.includes(filterTerm)) {
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

        quizSelect.addEventListener('change', function () {
            filterButton.click();
        });
    });
</script>

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->
    <!-- demo app -->
    <script src="assets/js/pages/demo.gradebook.js"></script>
    <!-- end demo js-->



</body>

</html>