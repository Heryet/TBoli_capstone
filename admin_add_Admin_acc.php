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
</head>

<body>
    <div class="container-fluid">
        <?php
        include 'dbcon.php';

        if (isset($_POST['btnAdd'])) {
            // Determine the next available admin_auto_id
            $result = $conn->query("SELECT MAX(SUBSTRING(admin_auto_id, 3)) AS max_id FROM tbl_admin");
            $row = $result->fetch_assoc();
            $next_id = intval($row['max_id']) + 1;
            $admin_auto_id = 'ad' . sprintf('%03d', $next_id); // Format ID with leading zeros
        
            // Collect form data
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $address = $_POST['address'];
            $password = $lastname . $gender;
            $encrypted = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into tbl_userinfo
            $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) VALUES ('$firstname', '$middlename', '$lastname', '$birthday', '$gender')";
            if ($conn->query($sql) === TRUE) {
                $user_info_id = $conn->insert_id;

                // Insert data into tbl_usercredentials
                $sql = "INSERT INTO tbl_usercredentials (email, contact) VALUES ('$email', '$contact')";
                if ($conn->query($sql) === TRUE) {
                    $credentials_id = $conn->insert_id;

                    // Insert data into tbl_address
                    $sql = "INSERT INTO tbl_address (address) VALUES ('$address')";
                    if ($conn->query($sql) === TRUE) {
                        $address_id = $conn->insert_id;

                        // Insert data into tbl_user_level
                        $sql = "INSERT INTO tbl_user_level (level) VALUES ('ADMIN')";
                        if ($conn->query($sql) === TRUE) {
                            $level_id = $conn->insert_id;

                            // Insert data into tbl_user_status
                            $sql = "INSERT INTO tbl_user_status (status) VALUES ('1')";
                            if ($conn->query($sql) === TRUE) {
                                $status_id = $conn->insert_id;

                                // Insert data into tbl_accounts
                                $sql = "INSERT INTO tbl_accounts (email, password) VALUES ('$email', '$encrypted')";
                                if ($conn->query($sql) === TRUE) {
                                    $account_id = $conn->insert_id;

                                    // Insert data into tbl_admin with generated admin_auto_id
                                    $sql = "INSERT INTO tbl_admin (admin_auto_id, user_id, credentials_id, address_id, level_id, status_id, account_id) 
                                    VALUES ('$admin_auto_id', '$user_info_id', '$credentials_id', '$address_id', '$level_id', '$status_id', '$account_id')";
                                    if ($conn->query($sql) === TRUE) {
                                        header("Location:admin_addAccount.php?msg=Account added successfully");
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>

        <form action="" method="POST">
            <div class="wrapper rounded bg-white">
                <div class="h3">Add Admin</div>

                <div class="form">
                    <div class="row">
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
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Full Address (street, barangay, city)</label>
                            <input type="address" class="form-control" name="address" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Add Admin" name="btnAdd">
                </div>
            </div>
        </form>
    </div>
</body>

</html>