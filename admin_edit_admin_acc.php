<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="admin_add_Admin_acc.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!------ Include the above in your HEAD tag ---------->
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
    <div class="container-fluid">
        <?php
        include 'dbcon.php';
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];


            $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.birthday, tbl_userinfo.gender, tbl_usercredentials.email,
            tbl_usercredentials.contact, tbl_address.address, tbl_accounts.email, tbl_accounts.password FROM tbl_admin
            JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
            JOIN tbl_usercredentials ON tbl_admin.credentials_id = tbl_usercredentials.usercredentials_id
            JOIN tbl_address ON tbl_admin.address_id = tbl_address.address_id
            JOIN tbl_accounts on tbl_admin.account_id = tbl_accounts.account_id
            WHERE tbl_userinfo.user_id = $user_id LIMIT 1";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "No records found in tbl_admin";
                exit();
            }
        } else {
            echo "No admin id provided";
            exit();
        }

        if (isset($_POST['btnAdd'])) {
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];
            $encrypted = password_hash($password, PASSWORD_DEFAULT);

            if ($password == $cfpassword) {
                $sql = "UPDATE tbl_accounts SET password = '$encrypted' WHERE account_id = '$user_id'";

                if ($conn->query($sql) === TRUE) {
                    header("Location: admin_addAccount.php?msg=Account updated successfully");
                    exit();
                }
            } else {
                header("Location: admin_edit_admin_acc.php?user_id=$user_id&error=PASSWORD DOESN'T MATCH");
                exit();
            }
        }
        ?>
        <form action="" method="POST">
        <div class="wrapper rounded bg-white">
            <div class="h3">Update user account</div>

            <div class="form">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $row ['firstname']?>" readonly required >
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="<?php echo $row ['middlename']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row ['lastname']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo $row ['contact']?>" readonly required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday" value="<?php echo $row ['birthday']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $row ['gender']?>" readonly required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row ['email']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Full Address (street, barangay, city)</label>
                        <input type="address" class="form-control" name="address" value="<?php echo $row ['address']?>" readonly required>
                    </div>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>
                    <div class="h3" style="margin-top: 20px;">Update user password</div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $row['lastname'] . $row['birthday']?>" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cfpassword" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Update" name="btnAdd">
            </div>
            <div>
            </div>
            <div>
                
            </div>
        </div>
        </form>
    </div>
</body>
</html>
