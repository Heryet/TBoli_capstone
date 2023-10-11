<?php
include 'dbcon.php';

$title = $_POST['title'];
$max = $_POST['max-score'];
$category = $_POST['category'];
$allow = isset($_POST['allow']) ? 1 : 0;
$start = $_POST['date-start'];
$module = $_POST['module'];
$grading = $_POST['grading'];
$due = $_POST['date-due'];
$grading_score = $_POST['grading-score'];
$instructions = $_POST['instructions'];
$release = $_POST['release_grade'];
$time = isset($_POST['time']) ? 1 : 0; 
$random = isset($_POST['random']) ? 1 : 0;
$feedback = isset($_POST['feedback']) ? 1 : 0;
$allow_review = isset($_POST['allow-review']) ? 1 : 0;
$grading_radio = $_POST['grading-radio'];

$sql = "INSERT INTO tbl_quiz_overview (title, max_score, category, start, module, allow_late, grading, due, grading_score, instructions) VALUES ('$title', '$max', '$category', '$start', '$module', '$allow', '$grading', '$due', '$grading_score', '$instructions')";

if ($conn->query($sql) === TRUE) {
    $quiz_overview_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_quiz_options (release_grade, timed, instant_feedback, randomize, allow_review, grading_option) VALUES ('$release', '$time', '$feedback', '$random', '$allow_review', '$grading_radio')";

    if ($conn->query($sql) === TRUE) {
        $quiz_options_id = $conn->insert_id;

        $sql = "INSERT INTO tbl_quiz (quiz_overview_id, quiz_options_id) VALUES ('$quiz_overview_id', '$quiz_options_id')";

        if ($conn->query($sql) === TRUE) {
            
            if ($time == 1 && $feedback == 1 && $random == 1 && $allow_review == 1) {
                $sql = "UPDATE tbl_quiz_options SET timed = 1, instant_feedback = 1, randomize = 1, allow_review = 1  WHERE quiz_options_id = $quiz_options_id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "Value added to the database successfully.";
                } else {
                    echo "Error adding value to the database: " . mysqli_error($conn);
                }
            } elseif ($allow == 1) {
                $sql = "UPDATE tbl_quiz_overview SET allow_late = 1 WHERE quiz_overview_id = $quiz_overview_id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "Value added to the database successfully.";
                } else {
                    echo "Error adding value to the database: " . mysqli_error($conn);
                }
            } else {
                header("Location: admin_quiz.php?msg=Added Successfully");
            exit();
            }
            header("Location: admin_quiz.php?msg=Added Successfully");
            exit();
        }
    }
}

?>
