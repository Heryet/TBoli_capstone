<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/login.css">
    <style>
    .error {
    text-align: center;
    background: #f59595fb;
    color: #b92c2c;
    padding: 10px;
    width: 100%;
    border-radius: 5px;
    }
  </style>
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://i.imgur.com/uNGdWHi.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form method="POST">
                <?php
                    session_start();
                    include 'dbcon.php';

                    if (isset($_POST['btnLogin'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        if (empty($email)) {
                            header("Location: login.php?error=Email must be filled");
                            exit();
                        } elseif (empty($password)) {
                            header("Location: login.php?error=Password must be filled");
                            exit();
                        } else {
                            $sql = "SELECT tbl_userinfo.user_id, tbl_accounts.email, tbl_accounts.password, tbl_user_level.level, tbl_user_status.status
                            FROM tbl_admin 
                            JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
                            JOIN tbl_accounts ON tbl_admin.account_id = tbl_accounts.account_id
                            JOIN tbl_user_level ON tbl_admin.level_id = tbl_user_level.level_id
                            JOIN tbl_user_status ON tbl_admin.status_id = tbl_user_status.status_id
                            WHERE tbl_accounts.email = '$email'
                            AND tbl_user_status.status = 1 AND tbl_user_level.level = 'ADMIN'";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $storedPasswordHash = $row['password'];
                                $level = $row['level'];

                                if (password_verify($password, $storedPasswordHash) && $row['status'] == 1) {
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $_SESSION['email'] = $email;
                                    $_SESSION['user_level'] = $level;

                                    if ($level === 'ADMIN') {
                                        header("Location: admin_dashboard.php?Login Successfully");
                                        exit();
                                    }
                                }
                            }
                            header("Location: login.php?error=Invalid email or password");
                            exit();
                        }
                    }
                    ?>
                <div class="card2 card border-0 px-4 py-5">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>
                    <div class="row px-3"> 
                        <label class="mb-1"><h6 class="mb-0 text-sm">Email</h6></label>
                        <input class="mb-4" type="text" name="email" placeholder="Enter Email">
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                            <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                        </div>
                    </div>
                    <div class="row mb-3 px-3">
                        <button type="submit" class="btn btn-blue text-center" name="btnLogin">Login</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>