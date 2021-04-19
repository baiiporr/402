<?php

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

// Create connection
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
// Check connection
if (!$conn) {
    echo "error";
}