<?php
include 'dbcon.php';

// Process form submission
if (isset($_POST['btnAdd'])) {
    $area = $_POST['area'];

    // Insert new area into the database
    $sql = "INSERT INTO tbl_area (area) VALUES ('$area')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_manage_area.php?msg=Area added successfully");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!-- HTML form code -->
<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <div class="container">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Add new Area</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="area" name="area" placeholder="New Area" class="form-control"
                                                required="true" value="" type="text">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="btnAdd">Add Area</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>