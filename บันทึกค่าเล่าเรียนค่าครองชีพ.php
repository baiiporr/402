<?php
session_start();

//connect db
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

$objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_select_db($objConnect, "trackkingsystem");
mysqli_set_charset($objConnect, "utf8");
mysqli_query($objConnect, "SET NAMES UTF8");
//



$feemoney = $_POST['FeeMoney'];
$cost_of_living = $_POST['Cost_Of_Living'];
$student_id = $_SESSION['studentID'];
$select = "SELECT * FROM state3 WHERE Student_ID = '$student_id' ";
$objQuerySelect = mysqli_query($objConnect, $select);

$count = 0;

while ($row = mysqli_fetch_assoc($objQuerySelect)) {
    $count++;
}

if ($count == 1) {
    $update = "UPDATE state3 SET term=1, year='2021', FeeMoney='$feemoney', Cost_Of_Living='$cost_of_living'
        WHERE Student_ID = $student_id";
    $objQuery = mysqli_query($objConnect, $update);

    if (!$objQuery) {
        echo "Error: " . $objQuery . "<br>" . $objConnect->error;
    } else {
        echo "บันทึกข้อมูลสำเร็จ";
    }
} else {
    $insert = "INSERT INTO state3 (Student_ID, term, year, FeeMoney, Cost_Of_Living)
            VALUES ('$student_id', 1, '2021', $feemoney, $cost_of_living)";
    $objQuery = mysqli_query($objConnect, $insert);

    $insertState = "INSERT INTO all_state (Student_ID, term, year, State)
            VALUES ('$student_id', 1, '2021', 3)";
    $objQuery1 = mysqli_query($objConnect, $insertState);

    if (!$objQuery1) {
        echo "Error: " . $objQuery1 . "<br>" . $objConnect->error;
    } else {
        echo "บันทึกข้อมูลสำเร็จ";
    }
}

mysqli_close($objConnect);