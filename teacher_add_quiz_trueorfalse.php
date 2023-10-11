<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $lesson = $_POST['lesson'];
    $maxScore = $_POST['max'];
    $dateStart = $_POST['date_start'];
    $allowLate = isset($_POST['allow']) ? 1 : 0; 
    $grading = $_POST['grading'];
    $due = $_POST['due'];
    $gradingScore = $_POST['grading_score'];
    $instructions = $_POST['instructions'];
    $questions = $_POST['questions']; 
    $correctChoices = $_POST['correct_choice']; 

    $sql = "INSERT INTO tbl_quiz_options (added_by, title, lesson, max_score, date_start, allow_late, grading, due, grading_score, instructions) VALUES ('$user_id', '$title', '$lesson', '$maxScore', '$dateStart', $allowLate, '$grading', '$due', '$gradingScore', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        $quiz_options_id = mysqli_insert_id($conn);


        for ($i = 0; $i < count($questions); $i++) {
            $question = $questions[$i];
            $correctChoice = $correctChoices[$i]; 

            $sql = "INSERT INTO tbl_quiz_true_or_false (quiz_options_id, question, correct_choice) VALUES ($quiz_options_id, '$question', '$correctChoice')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . mysqli_error($conn);
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        header("Location: Teacher_index.php?msg=Quiz - True or False added successfully");
        exit();
    } else {

        echo "Error: " . mysqli_error($conn);
    }


    mysqli_close($conn);
}
?>