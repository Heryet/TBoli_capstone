<?php
session_start();
include 'dbcon.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $name = $_POST['name'];
    $objective = $_POST['objective'];
    $type = $_POST['type'];
    $level = $_POST['level'];
    $files = $_FILES['lesson'];

    // Ensure $files is an array
    if (!is_array($files['name'])) {
        die("Invalid file input.");
    }

    $file_count = count($files['name']);

    $lesson_ids = []; // Store lesson_ids for each file

    // First, insert data into tbl_lesson
    $sql = "INSERT INTO tbl_lesson (name, objective, level, type, added_by) VALUES ('$name', '$objective', '$level', '$type', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        $lesson_id = $conn->insert_id; // Get the lesson_id of the newly inserted row
    } else {
        die("Error inserting data into tbl_lesson: " . $conn->error);
    }

    // Insert data into tbl_lesson_files for each file
    for ($i = 0; $i < $file_count; $i++) {
        $file_name = $files['name'][$i];
        $file_tmp = $files['tmp_name'][$i];
        $file_size = $files['size'][$i];
        $file_error = $files['error'][$i];

        if ($file_error !== UPLOAD_ERR_OK) {
            die("Error uploading the file.");
        }

        if ($file_size > 10000000) {
            die("File size is too big.");
        }

        $lesson_name = $file_name;

        $target_dir = "teachers/lessons/";
        $target_path = $target_dir . $lesson_name;

        if (!move_uploaded_file($file_tmp, $target_path)) {
            die("Error moving the uploaded file.");
        }

        $sql = "INSERT INTO tbl_lesson_files (lesson_id, lesson, added_by, status) VALUES ('$lesson_id', '$lesson_name', '$user_id', 2)";

        if ($conn->query($sql) === TRUE) {
            $lesson_files_id = $conn->insert_id;
            $lesson_ids[] = $lesson_files_id;
        } else {
            die("Error inserting data into tbl_lesson_files: " . $conn->error);
        }
    }

    // Insert data into tbl_content
    if (!empty($lesson_ids)) {
        foreach ($lesson_ids as $lesson_files_id) {
            $sql = "INSERT INTO tbl_content (lesson_id, lesson_files_id) VALUES ('$lesson_id', '$lesson_files_id')";

            if ($conn->query($sql) !== TRUE) {
                die("Error inserting data into tbl_content: " . $conn->error);
            }
        }

        header("Location: Teacher_uploadlesson.php?msg=Lesson uploaded successfully");
        exit();
    } else {
        die("Please select at least one file.");
    }
} else {
    echo "No user ID provided";
}
?>
