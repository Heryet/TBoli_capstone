<!--- Sidemenu -->
<ul class="side-nav">


    <li class="side-nav-item">
        <a href="admin_dashboard.php" class="side-nav-link">
            <i class="uil-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards"
            class="side-nav-link collapsed">
            <i class="uil-user-plus"></i>
            <span class="badge bg-success float-end"></span>
            <span> Users </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarDashboards" style="">
            <ul class="side-nav-second-level">
                <li>
                    <a href="admin_addAccount.php">Admin</a>
                </li>
                <li>
                    <a href="admin_student.php">Student</a>
                </li>
                <li>
                    <a href="admin_teacher.php">Teacher</a>
                </li>

            </ul>
        </div>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarLessons" aria-expanded="false" aria-controls="sidebarLessons"
            class="side-nav-link collapsed">
            <i class="dripicons-document-edit"></i>
            <span class="badge bg-success float-end"></span>
            <span>Manage Lesson</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarLessons">
            <ul class="side-nav-second-level">
                <li>
                    <a href="admin_create_quiz.php"><i class="uil-edit-alt"></i>Quiz List</a>
                </li>
                <li>
                    <a href="Teacher_Create_Lesson.php"><i class="uil-edit-alt"></i>Lesson</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboardsLessons" aria-expanded="false"
            aria-controls="sidebarDashboards" class="side-nav-link collapsed">
            <i class="uil-user-plus"></i>
            <span class="badge bg-success float-end"></span>
            <span> Manage Request Lessons </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarDashboardsLessons" style="">
            <ul class="side-nav-second-level">
                <li>
                    <a href="admin_accepted_lessons.php">Accepted Lessons</a>
                </li>
                <li>
                    <a href="admin_pending_lessons.php">Pending Lessons</a>
                </li>
                <li>
                    <a href="admin_archive_lessons.php">Archive Lessons</a>
                </li>

            </ul>
        </div>
    </li>

    <!-- <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarquiz" aria-expanded="false" aria-controls="sidebarquiz"
            class="side-nav-link collapsed">
            <i class="uil-user-plus"></i>
            <span class="badge bg-success float-end"></span>
            <span> Manage Quiz </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarquiz">
            <ul class="side-nav-third-level">
                <li>
                    <a href="admin_Add_QuizMultiple.php"><i class=" uil-list-ul"></i> Multiple Choice</a>
                </li>
                <li>
                    <a href="admin_Add_QuizTrueOrfalse.php"><i class=" uil-check-circle"></i> <i
                            class="uil-times-circle"></i> True or False</a>
                </li>
                <li>
                    <a href="admin_QuizView.php"><i class="uil-eye"></i> Quiz
                        View</a>
                </li>

            </ul>
        </div>
    </li> -->

    <!-- <li class="side-nav-item">
        <a href="admin_assign_lesson_to_teacher.php " class="side-nav-link">
            <i class="uil-user-plus"></i>
            <span>Assign Lesson to Teacher</span>
        </a>
    </li> -->
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarclass" aria-expanded="false" aria-controls="sidebarclass"
            class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Manage Class/Section </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarclass">
            <ul class="side-nav-second-level">
                <li>
                    <a href="admin_class.php">Create Class/Section</a>
                </li>
                <!-- <li>
                    <a href="admin_assign_teacher_class.php">Assign Teacher to
                        Class</a>
                </li> -->
            </ul>
        </div>
    </li>
    <!-- <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarArea" aria-expanded="false" aria-controls="sidebarArea"
            class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Manage Area </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarArea">
            <ul class="side-nav-second-level">
                <li>
                    <a href="admin_manage_area.php">Create/Register Area</a>
                </li>
                <li>
                    <a href="admin_assign_teacher_lesson.php">Assign Teacher to
                        Area</a>
                </li>
                <li>
                    <a href="admin_assign_class_area.php">Assign Class to Area</a>
                </li>
            </ul>
        </div>
    </li> -->
    <li class="side-nav-item">
        <a href="#" class="side-nav-link">
            <i class="uil-user-plus"></i>
            <span>Progress</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail"
            class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Reports </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEmail">
            <ul class="side-nav-second-level">
                <li>
                    <a href="#">List of Teacher</a>
                </li>
                <li>
                    <a href="#">List of Admin</a>
                </li>
                <li>
                    <a href="#">List of Learners</a>
                </li>
                <li>
                    <a href="#">List of Lesson w/Content</a>
                </li>
            </ul>
        </div>
    </li>

</ul>


<!-- End Sidebar -->