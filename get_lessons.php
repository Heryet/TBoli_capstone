<?php
include 'dbcon.php';

$sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, GROUP_CONCAT(DISTINCT tbl_lesson_files.status) AS status
        FROM tbl_content
        JOIN tbl_lesson ON tbl_lesson.lesson_id = tbl_content.lesson_id
        JOIN tbl_lesson_files ON tbl_lesson_files.lesson_files_id = tbl_content.lesson_files_id
        WHERE tbl_lesson_files.status = 1
        GROUP BY tbl_lesson.name";

$result = mysqli_query($conn, $sql);

$options = '';

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $lesson_id = $row['lesson_id'];
        $name = $row['name'];
        $type = $row['type'];
        $options .= "<option value='$lesson_id'>$type: $name</option>";
    }
} else {
    $options .= "<option disabled>No records found</option>";
}

echo $options;
?>
