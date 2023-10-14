<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once 'dbcon.php';

if (isset($_POST['updatequiz'])) {
    // Get the updated quiz data from the form
    $title = $_POST['title'];
    $lesson = $_POST['name'];
    $max = $_POST['max'];
    $dateStart = $_POST['date_start'];
    $due = $_POST['due'];
    $instructions = $_POST['instructions'];

    // Retrieve quiz_option_id (modify this part to match how you retrieve it)
    $quiz_option_id = $_POST['quiz_option_id']; // This is a placeholder; you should use the correct method to get the quiz_option_id

    // Update the quiz in the database
    $sql = "UPDATE tbl_quiz_options SET
        title = '$title',
        name = '$lesson',
        max = '$max',
        date_start = '$dateStart',
        due = '$due',
        instructions = '$instructions'
        WHERE quiz_option_id = $quiz_option_id";

    if (mysqli_query($conn, $sql)) {
        // Quiz updated successfully
        header("Location: Teacher_Create_Quiz.php?msg=Quiz updated successfully");
        exit();
    } else {
        // Error occurred
        echo "Error updating quiz: " . mysqli_error($conn);
    }
}
?>