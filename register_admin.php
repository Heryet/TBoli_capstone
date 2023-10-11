<?php
// Assuming you have a database connection file named "dbcon.php"

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'dbcon.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $auto_id = $_POST['admin_auto_id'];

    // Generate the new admin ID
    $sql = "SELECT MAX(admin_auto_id) AS max_id FROM tbl_auto_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $maxID = $row['max_id'];
    $counter = intval(substr($maxID, 2)) + 1;
    $generatedID = 'ad' . str_pad($counter, 3, "0", STR_PAD_LEFT);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the admin details into the database
    $insertSql = "INSERT INTO tbl_admin (admin_auto_id, firstname, lastname, email, password) VALUES ('$generatedID', '$firstname', '$lastname', '$email', '$hashedPassword')";

    if ($conn->query($insertSql) === TRUE) {
        // Registration successful, redirect to a success page or do any other necessary processing
        header("Location: registration_success.php");
        exit();
    } else {
        // Registration failed, handle the error accordingly
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>