<?php
include 'dbcon.php';

$sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, 
tbl_userinfo.birthday, tbl_userinfo.gender, tbl_usercredentials.email, tbl_usercredentials.contact, tbl_address.*
FROM tbl_userinfo
JOIN tbl_usercredentials ON tbl_userinfo.user_id = '$user_id'
JOIN tbl_address ON tbl_userinfo.user_id = tbl_address.address_id;";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
        $name = $firstname . ' ' . $middlename . ' ' . $lastname;
        $birthday = $row['birthday'];
        $gender = $row['gender'];
        $email = $row['email'];
        $contact = $row['contact'];
        $address = $row['address'];
    }
}
?>