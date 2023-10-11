<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="admin_add_Admin_acc.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!------ Include the above in your HEAD tag ---------->


<div class="container">
<?php
include 'dbcon.php';

if (isset($_POST['btnAdd'])) {
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gfirstname = $_POST['gfirstname'];
    $gmiddlename = $_POST['gmiddlename'];
    $glastname = $_POST['glastname'];
    $gbirthday = $_POST['gbirthday'];
    $ggender = $_POST['ggender'];
    $gnumber = $_POST['gphoneNumber'];
    $gemail = $_POST['gemail'];
    $gaddress = $_POST['gaddress'];
    $address = $_POST['address'];
    
    // Determine the next available learner_auto_id
    $result = $conn->query("SELECT MAX(SUBSTRING(student_auto_id, 4)) AS max_id FROM tbl_student");
    $row = $result->fetch_assoc();
    $next_id = intval($row['max_id']) + 1;
    $student_auto_id = 'stud' . sprintf('%03d', $next_id);


    // Insert other learner information
    $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) VALUES ('$firstname', '$middlename', '$lastname', '$birthday', '$gender')";
    if ($conn->query($sql) === TRUE) {
        $user_info_id = $conn->insert_id;

        $sql = "INSERT INTO tbl_usercredentials (email, contact) VALUES ('$email', '$phone')";
        if ($conn->query($sql) === TRUE) {
            $usercredentials_id = $conn->insert_id;

            $sql = "INSERT INTO tbl_learner_guardian_info (firstname, middlename, lastname, birthday, gender) VALUES ('$gfirstname', '$gmiddlename', '$glastname', '$gbirthday', '$ggender')";
            if ($conn->query($sql) === TRUE) {
                $guardian_info_id = $conn->insert_id;

                $sql = "INSERT INTO tbl_learner_guardian_contact (contact_num, email, address) VALUES ('$gnumber', '$gemail', '$gaddress')";
                if ($conn->query($sql) === TRUE) {
                    $guardian_contact_id = $conn->insert_id;

                    $sql = "INSERT INTO tbl_address (address) VALUES ('$address')";
                    if ($conn->query($sql) === TRUE) {
                        $address_id = $conn->insert_id;

                        $sql = "INSERT INTO tbl_user_level (level) VALUES ('LEARNER')";
                        if ($conn->query($sql) === TRUE) {
                            $level_id = $conn->insert_id;

                            $sql = "INSERT INTO tbl_user_status (status) VALUES ('1')";
                            if ($conn->query($sql) === TRUE) {
                                $status_id = $conn->insert_id;

                                // Insert learner information into tbl_learner with the generated learner_auto_id
                                $sql = "INSERT INTO tbl_student (student_auto_id, lrn, user_id, guardian_info_id, guardian_contact_id, address_id, level_id, status_id, account_id, usercredentials_id) 
            VALUES ('$next_id', '$lrn', '$user_id', '$guardian_info_id', '$guardian_contact_id', '$address_id', '$level_id', '$status_id', '$account_id', '$usercredentials_id')";
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: admin_student.php?msg=Account added successfully");
                                    exit();
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
    <form action="" method="POST">
        <div class="wrapper rounded bg-white">
            <div class="h3">Register Learner</div>

            <div class="form">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>LRN</label>
                        <input type="text" class="form-control" name="lrn" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthday" required>
                    </div>
                    <div class=" col-md-6 mt-md-0 mt-3">
                        <label>Gender</label>
                        <select id="sub" name="gender" required>
                            <option value="" selected hidden>Choose Option</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="my-md-2 my-3">
                        <label>Full Address (street, barangay, city)</label>
                        <input type="address" class="form-control" name="address" required>
                    </div>
                </div>

                <div class="h3">Guardian Information</div>

                <div class="form">
                    <div class="row">

                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="gfirstname" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="gmiddlename" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="glastname" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" name="gphoneNumber" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="gemail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Birthday</label>
                            <input type="date" class="form-control" name="gbirthday" required>
                        </div>
                        <div class=" col-md-6 mt-md-0 mt-3">
                            <label>Gender</label>
                            <select id="sub" name="ggender" required>
                                <option value="" selected hidden>Choose Option</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="my-md-2 my-3">
                            <label>Full Address (street, barangay, city)</label>
                            <input type="address" class="form-control" name="gaddress" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Add Account" name="btnAdd">
                </div>
            </div>
        </div>
    </form>

</div>