<!-- Sidemenu -->
<ul class="side-nav">
    <li class="side-nav-item menuitem">
        <a href="Teacher_index.php" class="side-nav-link">
            <i class="uil-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers"
            class="side-nav-link collapsed">
            <i class="uil-user-plus"></i>
            <span class="badge bg-success float-end"></span>
            <span>Manage Users</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarUsers">
            <ul class="side-nav-second-level"> -->
    <!-- <li>
          <a href="Teacher_Learners.php"><i class="uil-user-circle"></i> Learner</a>
        </li> -->
    <!-- <li>
                    <a href="Teacher_batchUpload.php"><i class="uil-list-ul"></i> Student Batch Upload</a>
                </li>
            </ul>
        </div>
    </li> -->

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards"
            class="side-nav-link collapsed">
            <i class="uil-user-plus"></i>
            <span class="badge bg-success float-end"></span>
            <span>Add Student</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarDashboards">
            <ul class="side-nav-second-level">
                <li>
                    <a href="Teacher_AddStudent.php"><i class="uil-plus-circle"></i> Add Students</a>
                </li>
                <!-- <li>
          <a href="Teacher_Add_Parents.php"><i class="uil-plus-circle"></i> Add Parents</a>
        </li> -->
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
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                        aria-controls="sidebarSecondLevel">
                        <i class="uil-plus-circle"></i>
                        <span>Add quiz</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSecondLevel">
                        <ul class="side-nav-third-level">
                            <li>
                                <a href="Teacher_Add_QuizMultipleC.php"><i class=" uil-list-ul"></i> Multiple Choice</a>
                            </li>
                            <li>
                                <a href="Teacher_Add_QuizTrueOrfalse.php"><i class=" uil-check-circle"></i> <i
                                        class="uil-times-circle"></i> True or False</a>
                            </li>
                            <li>
                                <a href="Teacher_QuizView.php"><i class="uil-eye"></i> Quiz View</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="Teacher_manage_lesson.php"><i class="uil-edit-alt"></i> Edit Lesson</a>
                </li>
                <li>
                    <a href="Teacher_ManageLesson.php"><i class="uil-plus-circle"></i> Upload Lesson</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="side-nav-item">
        <a href="Teacher_quiz.php" class="side-nav-link">
            <i class="dripicons-document-edit"></i>
            <span>Grade Book</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarAssign" aria-expanded="false" aria-controls="sidebarAssign"
            class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>Manage Assign</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarAssign">
            <ul class="side-nav-second-level">
                <li>
                    <a href="Teacher_AssignClass.php">Assign Class to Student</a>
                </li>
                <li>
                    <a href="Teacher_AssignLesson.php">Assign Lesson to Student</a>
                </li>
            </ul>
        </div>
    </li>

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
            <span>Reports</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEmail">
            <ul class="side-nav-second-level">
                <li>
                    <a href="Teacher_list_of_teacher.php">List of Teacher</a>
                </li>
                <li>
                    <a href="Teacher_studentlist.php">List of Learners</a>
                </li>
                <li>
                    <a href="#">List of Lesson w/Content</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="side-nav-item">
        <a href="Teacher_Create_Quiz.php" class="side-nav-link">
            <i class="uil-user-plus"></i>
            <span>Quiz</span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="Teacher_Create_Lesson.php" class="side-nav-link">
            <i class="uil-user-plus"></i>
            <span>Lesson</span>
        </a>
    </li>
</ul>