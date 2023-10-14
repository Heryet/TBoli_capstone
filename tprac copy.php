<!DOCTYPE html>
<html>

<head>
    <title>Name Input Form</title>
</head>

<body>
    <form method="post" action="#">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" pattern="[A-Za-z]+" required>
        <input type="submit" value="Submit">
    </form>
</body>

</html>