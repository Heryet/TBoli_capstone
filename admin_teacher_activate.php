<?php 
include 'dbcon.php';

$teacher_id = $_GET['teacher_id'];
$updatestatus = "UPDATE tbl_user_status SET status = 1 WHERE status_id = (SELECT status_id FROM tbl_teachers WHERE teacher_id = '$teacher_id')";
mysqli_query($conn, $updatestatus);
header("Location: admin_teacher.php?msg=Updated Successfully");
exit();
?>