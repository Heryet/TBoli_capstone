<?php 
include 'dbcon.php';

$learner_id = $_GET['learner_id'];
$updatestatus = "UPDATE tbl_user_status SET status = 1 WHERE status_id = (SELECT status_id FROM tbl_learner WHERE learner_id = '$learner_id')";
mysqli_query($conn, $updatestatus);
header("Location: admin_student.php?msg=Updated Successfully");
exit();
?>