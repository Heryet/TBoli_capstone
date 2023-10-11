<?php 
$sname = "localhost";
$uname = "root";
$password = "";
$dbname = "tbolidb";

$conn = mysqli_connect($sname, $uname, $password, $dbname);

if(!$conn) {
    echo "Connection Failed";
}

?>