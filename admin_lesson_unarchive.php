<?php 
include 'dbcon.php';

$lesson_files_id = $_GET['lesson_files_id'];
$updatestatus = "UPDATE tbl_lesson_files SET status = 1 WHERE lesson_files_id = '$lesson_files_id'";
mysqli_query($conn, $updatestatus);
header("Location: admin_accepted_lessons.php?msg=Updated Successfully");
exit();
?>