<?php 
include 'dbcon.php';

$admin_id = $_GET['admin_id'];
$updatestatus = "UPDATE tbl_user_status SET status = 0 WHERE status_id = (SELECT status_id FROM tbl_admin WHERE admin_id = '$admin_id')";
mysqli_query($conn, $updatestatus);
header("Location: admin_addAccount.php?msg=Updated Successfully");
exit();
?>