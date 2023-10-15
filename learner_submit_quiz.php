<?php
include 'dbcon.php';

if (isset($_POST['btnSubmit'])) {
    $quiz_options_id = $_POST['quiz_options_id'];
    $score = 0;

    for ($questionNumber = 1; isset($_POST['customRadio' . $questionNumber]); $questionNumber++) {
        $user_answer = $_POST['customRadio' . $questionNumber];
        $correct_answer = $_POST['correct_answer_' . $questionNumber];

        if ($user_answer === $correct_answer) {
            $score++;
        }
    }

    // Subtract 1 from questionNumber
    $questionNumber--;

    // Insert the final score after the loop
    $sql = "INSERT INTO tbl_quiz_score(question_id, score, max_score) VALUES ('', '$score', '$questionNumber')";
    $result = mysqli_query($conn, $sql);

    header("Location: learner_quiz_result.php");
    exit();
}
?>
