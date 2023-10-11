<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['btnSubmit'])) {
    $user_id = $_SESSION['user_id'];
    include 'dbcon.php'; // Include your database connection script

    // Initialize variables to keep track of the learner's score
    $score = 0;
    $totalQuestions = 0;

    // Loop through the submitted answers
    foreach ($_POST as $key => $value) {
        // Check if the input name starts with 'customRadio' (indicating it's a quiz question)
        if (strpos($key, 'customRadio') === 0) {
            $questionNumber = substr($key, 11); // Extract the question number from the input name

            // Query the database to get the correct answer for this question
            $sql = "SELECT correct_answer FROM tbl_quiz_multiple_choice WHERE multiple_choice_id = $questionNumber";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $correctAnswer = $row['correct_answer'];

                // Check if the submitted answer is correct
                if ($value == $correctAnswer) {
                    $score++; // Increment the score if the answer is correct
                }

                $totalQuestions++; // Increment the total number of questions
            }
        }
    }

    // Calculate the learner's percentage score
    $percentageScore = ($score / $totalQuestions) * 100;

    // Store the learner's score in the database or perform any other necessary actions
    // You can update the user's score in the database here

    // Redirect to a thank-you page or display the score to the learner
    // For example:
    header("Location: LearnerQuizResult.php?score=$score&total=$totalQuestions");
    exit();
} else {
    // If the user is not logged in or the form was not submitted, redirect to the login page or show an error message
    // For example:
    header("Location: learner_login.php");
    exit();
}
?>
