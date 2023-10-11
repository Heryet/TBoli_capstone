<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Notice Board Styles */
.container #content {
  margin: 20px auto;
  max-width: 500px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  background-color: #f9f9f9;
}

.container #content h1 {
  font-size: 28px;
  margin-bottom: 20px;
}

.container #content hr {
  border-top: 1px solid #ccc;
  margin: 20px 0;
}

.container #content textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: none;
}

.container #content input[type="submit"] {
  background-color: #008CBA;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
}

.container #content input[type="submit"]:hover {
  background-color: #007A8D;
}

    </style>
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/justice-scale.png" alt="" style="width: 66px; height: 66px;">
                        </span>
                        <span class="title">Law Office Gensan</span>
                        </a>
                </li>

                <li>
                <a href="Dashboard.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="appointmentlist.php">
                    <span class="icon">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </span>
                    <span class="title">Appointment List</span>
                </a>
            </li>

            <li>
                <a href="LawyerOfficeFinal.php">
                    <span class="icon">
                        <ion-icon name="business-outline"></ion-icon>
                    </span>
                    <span class="title">Law Office</span>
                </a>
            </li>
            <li>
                    <a href="secretarylist.php">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Secretary List</span>
                    </a>
                </li>
            <li>
                <a href="Lawyer.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Lawyer List</span>
                </a>
            </li>

            <li>
                <a href="clientlist.php">
                    <span class="icon">
                        <ion-icon name="reader-outline"></ion-icon>
                    </span>
                    <span class="title">Client List</span>
                </a>
            </li>
            <li>
                <a href="noticeboard.php">
                    <span class="icon">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </span>
                    <span class="title">Notice Board</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="help-outline"></ion-icon>
                    </span>
                    <span class="title">Help</span>
                </a>
            </li>

            <li>
                <a href="homepage.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="user">
                <img src="assets/imgs/customer01.jpg" alt="">
            </div>
        </div>

        <!-- ================= Notice Board================ -->
<div class="container">
	<div id="content" align="center">     
		<form action="notice.php" method="post">
		<h1>Notice Board</h1><hr/>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?> </p>
		<?php } ?>
		<textarea type="text" name="message" class="ed" rows="5" class="form-control"></textarea><br/><br/>
		<input type="submit" class="btn btn-primary" value="Send" id="button1">
		</form>
	</div><hr/>
    <h2>History</h2>
<table>
  <thead>
    <tr>
      <th>Message</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //  connect database
    ?>
  </tbody>
</table>
</body>
</html>

    
<!-- ================= Notice Board ================ --> 
<!-- =============== Scripts ================ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
