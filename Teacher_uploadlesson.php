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
    <!-- <link rel="shortcut icon" href="assets/images/users/Jillian-Ward.jpg"> -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css">

    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <style>
        .file-container {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .remove-button {
            margin-left: auto;
            color: red;
            cursor: pointer;
        }
    </style>


</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper menuitem-active">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active show">

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
                <div class="simplebar-wrapper menuitem-active" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask show">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper menuitem-active"
                                style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content show" style="padding: 0px;">

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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="Teacher_Module.php">Dashboard</a></li>

                                        <li class="breadcrumb-item">Upload Lesson</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Upload Lesson</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="teacher_upload_lesson.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label for="projectname" class="form-label">Name</label>
                                            <input type="text" name="name" id="projectname" class="form-control"
                                                placeholder="Enter Lesson name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="project-overview" class="form-label">Objective</label>
                                            <textarea class="form-control" name="objective" id="project-overview"
                                                rows="5" placeholder="Enter some brief about the project.."
                                                required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="project-type" class="form-label">Level of learning</label>
                                            <select class="form-control" name="level" id="project-type" required>
                                                <option>Select</option>
                                                <option value="Literacy">Basic</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advance">Advance</option>
                                            </select>
                                        </div>

                                        <div class="mb-0">
                                            <label for="project-type" class="form-label">Type of lesson</label>
                                            <select class="form-control" name="type" id="project-type" required>
                                                <option>Select</option>
                                                <option value="Literacy">Literacy</option>
                                                <option value="Numeracy">Numeracy</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative" id="datepicker2">
                                            <br>
                                            <input type="submit" class="form-control btn-primary" name="btnAdd">
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 mt-3 mt-xl-0">
                                            <label for="file-upload" class="form-label">Upload Files</label>
                                            <input type="file" name="lesson[]" id="file-upload" class="form-control"
                                                multiple required>
                                            <small class="text-muted">You can select multiple files. Limit: 10
                                                files.</small>
                                            <div class="file-list-container" id="selected-files"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>20232023 © Hyper - Coderthemes.com
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

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


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

    <script src="assets/js/vendor/dropzone.min.js"></script>
    <script src="assets/js/ui/component.fileupload.js"></script>

    <script>
        // Function to handle file selection and display
        function handleFileSelect(event) {
            const files = event.target.files; // Get selected files
            const fileListContainer = document.getElementById('selected-files');

            // Check if the file limit has been reached
            if (fileListContainer.children.length + files.length > 10) {
                alert('You can only upload up to 10 files.');
                return;
            }

            // Iterate through selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Create a new container for each file
                const fileContainer = document.createElement('div');
                fileContainer.classList.add('file-container');
                fileListContainer.appendChild(fileContainer);

                // Display file name
                const fileName = document.createElement('span');
                fileName.innerText = file.name;
                fileContainer.appendChild(fileName);

                // Create remove button (x icon) for each file
                const removeButton = document.createElement('span');
                removeButton.innerHTML = '&#10006;'; // X icon
                removeButton.classList.add('remove-button');
                removeButton.addEventListener('click', function () {
                    // Remove file container when the remove button is clicked
                    fileContainer.remove();
                });
                fileContainer.appendChild(removeButton);
            }
        }

        // Add event listener to file input
        const fileInput = document.getElementById('file-upload');
        fileInput.addEventListener('change', handleFileSelect);
    </script>



</body>

</html>