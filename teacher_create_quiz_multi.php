<?php 
include 'dbcon.php';

if (isset($_POST['createquiz'])) {
    $quiz_options_id = $_GET['quiz_options_id'];
    $questions = $_POST['question'];
    $choices = $_POST['choices'];
    $correctChoices = $_POST['correct_choice'];

    // Insert questions into tbl_quiz_question
    foreach ($questions as $index => $question) {
        $query = "INSERT INTO tbl_quiz_question (quiz_options_id, question) VALUES ('$quiz_options_id', '$question')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $questionId = mysqli_insert_id($conn);

            // Loop through the choices and match the current index
            for ($i = 0; $i < count($choices[$index]); $i++) {
                $choice = $choices[$index][$i];
                $isCorrect = ($i == $correctChoices[$index]) ? 1 : 0; // Check if the current index matches the correct choice
                $query = "INSERT INTO tbl_quiz_choices (question_id, choices, correct_answer) VALUES ('$questionId', '$choice', '$isCorrect')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error inserting choices: " . mysqli_error($conn);
                    // Handle error if needed
                }
            }
        } else {
            echo "Error inserting question: " . mysqli_error($conn);
            // Handle error if needed
        }
    }

    echo "Quiz created successfully!";
}

?>