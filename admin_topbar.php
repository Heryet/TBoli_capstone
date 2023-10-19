<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">

    
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>





        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <?php
                                    include 'dbcon.php';

                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];

                                        $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_user_level.level
                                                    FROM tbl_admin
                                                    JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
                                                    JOIN tbl_user_level ON tbl_admin.level_id = tbl_user_level.level_id
                                                    WHERE (tbl_user_level.level = 'ADMIN' OR tbl_user_level.level = 'COADMIN') AND tbl_userinfo.user_id = '$user_id'
                                                    LIMIT 1;";

                                        $result = mysqli_query($conn, $sql);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            ?>
                    <span
                        class="account-user-name"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></span>
                    <span class="account-position"><?php echo $row['level']; ?></span>
                    <?php
                                        } else {
                                            echo "No records found in tbl_admin";
                                        }
                                    } else {
                                        echo "No user ID provided";
                                    }
                                    ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="admin_profile.php" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>
                <!-- item-->
                <a href="administrator_login.php?logout=true" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>

</div>