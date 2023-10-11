<?php
include 'dbcon.php';
    $learnersid = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];;
    $gfirstname = $_POST['gfirstname'];
    $gmiddlename = $_POST['gmiddlename'];
    $glastname = $_POST['glastname'];
    $gbirthday = $_POST['gbirthday'];
    $ggender = $_POST['ggender'];
    $gnumber = $_POST['gphoneNumber'];
    $gemail = $_POST['gemail'];
    $gaddress = $_POST['gaddress'];
    $password = $lastname . $birthday; 
    $encrypted = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_learner_id (lrn) VALUES ('$learnersid')";

    if ($conn->query($sql) === TRUE) {
        $learner_id = $conn->insert_id;
        $sql = "INSERT INTO tbl_userinfo (firstname, middlename, lastname, birthday, gender) VALUES ('$firstname', '$middlename', '$lastname', '$birthday' ,'$gender')";

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

                            if($conn->query($sql) === TRUE) {
                                $level_id = $conn->insert_id;
                                $sql = "INSERT INTO tbl_user_status (status) VALUES ('1')";

                                if ($conn->query($sql) === TRUE) {
                                    $status_id = $conn->insert_id;
                                    $sql = "INSERT INTO tbl_accounts (email, password) VALUES ('$email', '$encrypted')";
                        
                                    if ($conn->query($sql) === TRUE) {
                                        $account_id = $conn->insert_id;
                                        $sql = "INSERT INTO tbl_learner (lrn, user_id, guardian_info_id, guardian_contact_id, address_id, level_id, status_id, account_id, usercredentials_id) VALUES ('$learner_id', '$user_info_id', '$guardian_info_id', '$guardian_contact_id', '$address_id', '$level_id', '$status_id', '$account_id', '$usercredentials_id')";

                                        if ($conn->query($sql) === TRUE) {
                                            header("Location:Teacher_AddStudent.php?msg=Account added successfully");
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
    }
?>