<?php
//connect db
session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

$objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_select_db($objConnect, "trackkingsystem");
mysqli_set_charset($objConnect, "utf8");
mysqli_query($objConnect, "SET NAMES UTF8");
//

$year = $_POST['Year'];
$term = $_POST['Term'];

$insert = "INSERT INTO semester (term, year)
            VALUES ('$term', '$year')";
$objQuery = mysqli_query($objConnect, $insert);

if (!$objQuery) {
    echo "Error: " . $objQuery1 . "<br>" . $objConnect->error;
} else {
    echo "บันทึกข้อมูลสำเร็จ";
}
mysqli_close($objConnect);