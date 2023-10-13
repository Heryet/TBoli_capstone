<?php
session_start();
$user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">

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
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

    <!-- Add this inside your <head> tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (required for Select2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>


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
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Quiz</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <div class="row">
                <div class="card">
                    <form action="teacher_create_quiz_multi.php" method="POST" id="multiple_choice">
                        <div class="row justify-content-md-center mt-4">
                            <div class="card col-sm-11">
                                <div class="card-body">
                                    <div class="question-list">
                                        <div class="question-container mb-4">
                                            <label>Question #1</label>
                                            <input type="text" class="form-control mb-3" name="question[]" placeholder="Enter your question here" required>
                                            <div class="form-check">
                                                <input type="radio" name="correct_choice[0][]" class="form-check-input" value="a">
                                                <label class="form-check-label">Choice a</label>
                                                <input type="text" class="form-control" name="choices[0][]" required>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="correct_choice[0][]" class="form-check-input" value="b">
                                                <label class="form-check-label">Choice b</label>
                                                <input type="text" class="form-control" name="choices[0][]" required>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="correct_choice[0][]" class="form-check-input" value="c">
                                                <label class="form-check-label">Choice c</label>
                                                <input type="text" class="form-control" name="choices[0][]" required>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="correct_choice[0][]" class="form-check-input" value="d">
                                                <label class="form-check-label">Choice d</label>
                                                <input type="text" class="form-control" name="choices[0][]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Create Quiz" name="createquiz">
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <input type="button" class="btn btn-primary add-question-btn" value="Add Question" name="addquestion">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        // Counter to keep track of the number of questions added
        let questionCounter = 1;

        // Function to add a new question container
        function addQuestion() {
            questionCounter++;

            // Clone the original question container
            const originalQuestion = document.querySelector('.question-container');
            const newQuestion = originalQuestion.cloneNode(true);

            // Update the label and input names to reflect the new question number
            newQuestion.querySelector('label').textContent = `Question #${questionCounter}`;
            newQuestion.querySelector('input[name="question[]"]').value = '';
            newQuestion.querySelectorAll('input[name^="choices[0]"]').forEach(input => input.value = '');
            newQuestion.querySelectorAll('input[name^="correct_choice[0]"]').forEach(input => input.checked = false);

            // Update the names of radio buttons and input elements for the new question
            newQuestion.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.name = `correct_choice[${questionCounter - 1}][]`;
            });
            newQuestion.querySelectorAll('input[type="text"]').forEach(input => {
                const currentName = input.name;
                input.name = currentName.replace('0', questionCounter - 1);
            });

            // Append the new question container to the question list
            const questionList = document.querySelector('.question-list');
            questionList.appendChild(newQuestion);
            }
            // Add an event listener to the "Add Question" button
            const addQuestionBtn = document.querySelector('.add-question-btn');
            addQuestionBtn.addEventListener('click', addQuestion);
            </script>




        <script>
            $(document).ready(function () {
                $("#multiple_choice").on("submit", function () {
                    var hvalue = $('.instructions').text();
                    $(this).append("<input type='hidden' name='instructions' value=' " + hvalue + " '/>");
                });
            });
        </script>



        <!-- end content here -->
    </div>
    <!-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <p class="mb-0">...</p>
                            </div> -->
    </div> <!-- end tab-content-->
    </div> <!-- end col-->
    </div>
    <!-- end row-->




    <!-- Footer Start -->
    <!-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
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

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    <script>
        $(document).ready(function () {
            $('#inputState').select2();
        });
    </script>


    <!-- Start right sidebar -->
    <?php include('Teacher_Settings.php'); ?>
    <!-- End right side bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>

</body>

</html>