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


<div class="container">
<?php
include 'dbcon.php';
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT tbl_learner_id.lrn, tbl_userinfo.firstname AS userinfo_firstname, tbl_userinfo.middlename AS userinfo_middlename, tbl_userinfo.lastname AS userinfo_lastname, tbl_userinfo.birthday AS userinfo_birthday, tbl_userinfo.gender AS userinfo_gender,
    tbl_usercredentials.email AS userinfo_email, tbl_usercredentials.contact AS userinfo_contact, tbl_address.address AS userinfo_address, tbl_accounts.password AS userinfo_password,
    tbl_learner_guardian_info.firstname AS guadian_firstname, tbl_learner_guardian_info.middlename AS guadian_middlename, tbl_learner_guardian_info.lastname AS guadian_lastname,
    tbl_learner_guardian_info.birthday AS guadian_birthday, tbl_learner_guardian_info.gender AS guadian_gender, tbl_learner_guardian_contact.contact_num AS guadian_contact, tbl_learner_guardian_contact.email AS guadian_email, tbl_learner_guardian_contact.address AS guadian_address
    FROM tbl_learner
    JOIN tbl_learner_id ON tbl_learner_id.learner_id = tbl_learner.lrn
    JOIN tbl_userinfo ON tbl_userinfo.user_id = tbl_learner.user_id
    JOIN tbl_usercredentials ON tbl_usercredentials.usercredentials_id = tbl_learner.usercredentials_id
    JOIN tbl_address ON tbl_address.address_id = tbl_learner.address_id
    JOIN tbl_accounts ON tbl_accounts.account_id = tbl_learner.account_id
    JOIN tbl_learner_guardian_info ON tbl_learner_guardian_info.guardian_info_id = tbl_learner.guardian_info_id
    JOIN tbl_learner_guardian_contact ON tbl_learner_guardian_contact.guardian_contact_id = tbl_learner.guardian_contact_id
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
                header("Location: admin_student.php?msg=Account updated successfully");
                exit();
            }
        } else {
            header("Location: admin_edit_student_acc.php?user_id=$user_id&error=PASSWORD DOESN'T MATCH");
            exit();
        }
    }
?>
    <form action="" method="POST">
    <div class="wrapper rounded bg-white">
            <div class="h3">Update Learner Account</div>

            <div class="form">
                <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                        <label>LRN</label>
                        <input type="text" class="form-control" name="lrn" value="<?php echo $row['lrn']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $row['userinfo_firstname']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="<?php echo $row['userinfo_middlename']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row['userinfo_lastname']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo $row['userinfo_contact']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['userinfo_email']?>" readonly required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday" value="<?php echo $row['userinfo_birthday']?>" readonly required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $row['userinfo_gender']?>" readonly required>
                    </div>
                </div>
                <div class="row">
                  
                    <div class="my-md-2 my-3">
                        <label>Full Address (street, barangay, city)</label>
                        <input type="address" class="form-control" name="address" value="<?php echo $row['userinfo_address']?>" readonly   required>
                    </div>
                </div>

                <div class="h3">Update Learner Guardian Information</div>

<div class="form">
    <div class="row">
  
        <div class="col-md-6 mt-md-0 mt-3">
            <label>First Name</label>
            <input type="text" class="form-control" name="gfirstname" value="<?php echo $row['guadian_firstname']?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="gmiddlename" value="<?php echo $row['guadian_middlename']?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Last Name</label>
            <input type="text" class="form-control" name="glastname" value="<?php echo $row['guadian_lastname']?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Phone Number</label>
            <input type="tel" class="form-control" name="gphoneNumber" value="<?php echo $row['guadian_contact']?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Email</label>
            <input type="email" class="form-control" name="gemail" value="<?php echo $row['guadian_email']?>" readonly  required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Birthday</label>
            <input type="date" class="form-control" name="gbirthday" value="<?php echo $row['guadian_birthday']?>" readonly  required>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Birthday</label>
            <input type="text" class="form-control" name="ggender" value="<?php echo $row['guadian_gender']?>" readonly  required>
        </div>
    </div>
    <div class="row">
      
        <div class="my-md-2 my-3">
            <label>Full Address (street, barangay, city)</label>
            <input type="address" class="form-control" name="gaddress" value="<?php echo $row['guadian_address']?>" readonly  required>
        </div>
    </div>
    <div class="row">
    <label><h3>Update Learner Password</h3></label> 
    <?php if (isset($_GET['error'])) { ?>
        <p class="error">
        <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <div class="col-md-6 mt-md-0 mt-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $row['userinfo_password']?>" required>
    </div>
    <div class="col-md-6 mt-md-0 mt-3">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="cfpassword" required>
    </div>
  </div>
                <input type="submit" class="btn btn-primary mt-3" value="Add Account" name="btnAdd">
            </div>
        </div>
    </div>
    </form>

</div>