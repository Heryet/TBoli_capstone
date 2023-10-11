<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <div class="container">
        <h1>Quiz Result</h1>

        <?php
        // Check if the score and total questions were passed as URL parameters
        if (isset($_GET['score']) && isset($_GET['total'])) {
            $score = intval($_GET['score']);
            $totalQuestions = intval($_GET['total']);

            // Calculate the percentage score
            $percentageScore = ($score / $totalQuestions) * 100;

            echo "<p>Your Score: $score out of $totalQuestions</p>";
            echo "<p>Percentage Score: $percentageScore%</p>";

            // Provide feedback based on the percentage score
            if ($percentageScore >= 80) {
                echo "<p>Congratulations! You did great!</p>";
            } elseif ($percentageScore >= 50) {
                echo "<p>You passed the quiz.</p>";
            } else {
                echo "<p>You need to study more and retake the quiz.</p>";
            }
        } else {
            echo "<p>Invalid request. Please go back and try again.</p>";
        }

        // Debugging: Display submitted answers
        if (isset($_POST['btnSubmit'])) {
            echo "<h3>Submitted Answers:</h3>";
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'customRadio') === 0) {
                    $questionNumber = substr($key, 11);
                    echo "Question $questionNumber: $value<br>";
                }
            }
        }
        ?>

        <!-- Add a button to go back to teacher_numeracy_module -->
        <button onclick="goBack()">Go Back to Teacher Numeracy Module</button>

        <!-- JavaScript function to navigate back -->
        <script>
            function goBack() {
                window.location.href = 'teacher_numeracy_module.php'; // Replace with the actual URL
            }
        </script>
    </div>
</body>
</html>
