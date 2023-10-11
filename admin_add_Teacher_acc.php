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

    if (isset($_POST['btnAdd'])) {
        // Determine the next available teacher_id
        $result = $conn->query("SELECT MAX(SUBSTRING(teacher_auto_id, 4)) AS max_id FROM tbl_teachers");
        $row = $result->fetch_assoc();
        $next_id = intval($row['max_id']) + 1;
        $teacher_auto_id = 'tch' . sprintf('%03d', $next_id); // Format ID with leading zeros
    
        // Collect form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $password_birthday = preg_replace("/[^a-zA-Z0-9]/", "", $birthday);
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];


        $valid = $_FILES['valid'];
        if (!empty($valid['name'])) {
            $file_name = $valid['name'];
            $file_tmp = $valid['tmp_name'];
            $file_size = $valid['size'];
            $file_error = $valid['error'];

            // Check for any upload errors
            if ($file_error !== UPLOAD_ERR_OK) {

            }

            // Check the file size
            if ($file_size > 10000000) {
                die("File size is too big");
            }

            $image_name = $file_name;

            // Move the uploaded image to the desired directory
            $target_dir = "teachers/valid/";
            $target_path = $target_dir . $image_name;
            if (!move_uploaded_file($file_tmp, $target_path)) {
                die("Error moving the uploaded image. Please try again.");
            }
        }

        $password = $lastname . $password_birthday;
        $encrypted = password_hash($password, PASSWORD_DEFAULT);

        // Insert user info
        $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) 
        VALUES ('$firstname', '$middlename', '$lastname', '$birthday', '$gender')";
        if ($conn->query($sql) === TRUE) {
            $user_info_id = $conn->insert_id;

            // Insert user credentials
            $sql = "INSERT INTO tbl_usercredentials (email, contact) 
                VALUES ('$email', '$contact')";
            if ($conn->query($sql) === TRUE) {
                $credentials_id = $conn->insert_id;

                // Insert address
                $sql = "INSERT INTO tbl_address (address) 
                    VALUES ('$address')";
                if ($conn->query($sql) === TRUE) {
                    $address_id = $conn->insert_id;

                    // Insert user level
                    $sql = "INSERT INTO tbl_user_level (level) 
                        VALUES ('TEACHER')";
                    if ($conn->query($sql) === TRUE) {
                        $level_id = $conn->insert_id;

                        // Insert user status
                        $sql = "INSERT INTO tbl_user_status (status) 
                            VALUES ('1')";
                        if ($conn->query($sql) === TRUE) {
                            $status_id = $conn->insert_id;

                            // Insert teacher valid
                            $sql = "INSERT INTO tbl_teacher_valid (id) 
                                VALUES ('$image_name')";
                            if ($conn->query($sql) === TRUE) {
                                $valid_id = $conn->insert_id;

                                // Insert account
                                $sql = "INSERT INTO tbl_accounts (email, password) 
                                    VALUES ('$teacher_id', '$encrypted')";
                                if ($conn->query($sql) === TRUE) {
                                    $account_id = $conn->insert_id;

                                    // Insert teacher with generated teacher_id
                                    $sql = "INSERT INTO tbl_teachers (teacher_auto_id, user_id, credentials_id, address_id, level_id, status_id, account_id, valid_id) 
                VALUES ('$teacher_auto_id', '$user_info_id', '$credentials_id', '$address_id', '$level_id', '$status_id', '$account_id', '$valid_id')";
                                    if ($conn->query($sql) === TRUE) {
                                        header("Location: admin_teacher.php?msg=Account added successfully");
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    ?>

    <div class="wrapper rounded bg-white">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="h3" id="teacher-info">Teacher Information</div>

            <div class="form">
                <div class="row">

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="teacher-id">Teacher ID</label>
                        <input type="text" id="teacher-id" class="form-control" name="teacher_id" required>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" class="form-control" name="firstname" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="middle-name">Middle Name</label>
                        <input type="text" id="middle-name" class="form-control" name="middlename" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" class="form-control" name="lastname" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="phone-number">Phone Number</label>
                        <input type="tel" id="phone-number" class="form-control" name="contact" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" class="form-control" name="birthday" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender" required>
                            <option value="" selected hidden>Choose Option</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="my-md-2 my-3">
                        <label for="full-address">Full Address (street, barangay, city)</label>
                        <input type="address" id="full-address" class="form-control" name="address" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="valid-id">Valid ID</label>
                        <input type="file" id="valid-id" class="form-control" name="valid" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Add Account" name="btnAdd">
            </div>
        </form>
    </div>
</div>



</div>