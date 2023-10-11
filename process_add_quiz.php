<?php
// Include your database connection here (e.g., include 'dbcon.php')
include 'dbcon.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $quizTitle = $_POST["quizTitle"];
    $pointsPerItem = $_POST["pointsPerItem"];
    $lesson = $_POST["lesson"];
    $teacher = $_POST["teacher"];
    
    // Perform validation if needed

    // Insert the quiz data into the database
    $sql = "INSERT INTO quizzes (title, questions, points_per_item, lesson_id, teacher, created_at) 
            VALUES (?, ?, ?, ?, ?, NOW())"; // Use placeholders

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "siiss", $quizTitle, $questions, $pointsPerItem, $lesson, $teacher);

        if (mysqli_stmt_execute($stmt)) {
            // Quiz insertion successful
            echo "success";
        } else {
            // Quiz insertion failed
            echo "error";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error in prepared statement
        echo "error";
    }

    mysqli_close($conn); // Close the database connection
} else {
    // Invalid request method
    echo "error";
}
?>