<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration</title>
    <!-- Add necessary CSS and JS links here -->
</head>

<body>
    <div class="container">
        <h2>Admin Registration Form</h2>
        <form action="register_admin.php" method="POST">
            <label>First Name:</label>
            <input type="text" name="firstname" required><br>

            <label>Last Name:</label>
            <input type="text" name="lastname" required><br>

            <label>Email:</label>
            <input type="email" name="email" required><br>

            <label>Password:</label>
            <input type="password" name="password" required><br>

            <!-- Add more fields as needed, such as gender, birthday, etc. -->

            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>