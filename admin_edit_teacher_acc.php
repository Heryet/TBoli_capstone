<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="admin_add_Teacher_acc.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<?php

include 'dbcon.php';
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT tbl_teachers.teacher_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.birthday, tbl_userinfo.gender,
    tbl_usercredentials.email, tbl_usercredentials.contact, tbl_accounts.password, tbl_teacher_valid.id, tbl_address.address
    FROM tbl_teachers
    JOIN tbl_userinfo ON tbl_userinfo.user_id = tbl_teachers.user_id
    JOIN tbl_usercredentials ON tbl_usercredentials.usercredentials_id = tbl_teachers.credentials_id
    JOIN tbl_accounts ON tbl_accounts.account_id = tbl_teachers.account_id
    JOIN tbl_teacher_valid ON tbl_teacher_valid.valid_id = tbl_teachers.valid_id
    JOIN tbl_address ON tbl_address.address_id = tbl_teachers.address_id
    WHERE tbl_userinfo.user_id = $user_id LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No records found in tbl_admin";
        exit();
    }
    } else {
        echo "No user id provided";
        exit();
    }

    if (isset($_POST['btnAdd'])) {
        $password = $_POST['password'];
        $cfpassword = $_POST['cfpassword'];
        $encrypted = password_hash($password, PASSWORD_DEFAULT);

        if ($password == $cfpassword) {
            $sql = "UPDATE tbl_accounts SET password = '$encrypted' WHERE account_id = '$user_id'";

            if ($conn->query($sql) === TRUE) {
                header("Location: admin_teacher.php?msg=Account updated successfully");
                exit();
            }
        } else {
            header("Location: admin_edit_teacher_acc.php?user_id=$user_id&error=PASSWORD DOESN'T MATCH");
            exit();
        }
    }
?>

    <div class="wrapper rounded bg-white">
        <form action="" method="POST" enctype="multipart/form-data">
    <div class="h3" id="teacher-info">Update Teacher Information</div>

<div class="form">
    <div class="row">

    <div class="col-md-6 mt-md-0 mt-3">
            <label for="teacher-id">Teacher ID</label>
            <input type="text" id="teacher-id" class="form-control" name="teacher_id" value="<?php echo $row['teacher_id'] ?>" readonly required>
        </div>
  
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" class="form-control" name="firstname" value="<?php echo $row['firstname'] ?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="middle-name">Middle Name</label>
            <input type="text" id="middle-name" class="form-control" name="middlename" value="<?php echo $row['middlename'] ?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="phone-number">Phone Number</label>
            <input type="tel" id="phone-number" class="form-control" name="contact" value="<?php echo $row['contact'] ?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" readonly  required>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" class="form-control" name="birthday" value="<?php echo $row['birthday'] ?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label for="birthday">Gender</label>
            <input type="date" id="gender" class="form-control" name="gender" value="<?php echo $row['gender'] ?>" readonly  required>
        </div>
    </div>
    <div class="row">
        <div class="my-md-2 my-3">
            <label for="full-address">Full Address (street, barangay, city)</label>
            <input type="address" id="full-address" class="form-control" name="address" value="<?php echo $row['address'] ?>" readonly  required>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 mt-md-0 mt-3">
        <label for="valid-id">Valid ID</label>
        <a href="teachers/valid/<?php echo $row['id'] ?>" target="_blank">
            <input type="text" id="valid-id" class="form-control" name="valid" value="<?php echo $row['id'] ?>" readonly required>
        </a>
    </div>
    </div>
    <div class="row">
    <label><h3>Update Teacher Password</h3></label> 
    <?php if (isset($_GET['error'])) { ?>
        <p class="error">
        <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <div class="col-md-6 mt-md-0 mt-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $row['password']?>" required>
    </div>
    <div class="col-md-6 mt-md-0 mt-3">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="cfpassword" required>
    </div>
  </div>
    <input type="submit" class="btn btn-primary mt-3" value="Add Account" name="btnAdd">
</div>
</form>
</div>
</div>



</div>