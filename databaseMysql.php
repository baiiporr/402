<html>
<head>
<title>Tracking System For e-Studentloan In Thammasat University</title>
</head>
<body>
    <!--วิธีต่อ database-->
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

$objConnect = mysqli_connect( $serverName,$userName ,$userPassword,$dbName);
mysqli_select_db($objConnect, "trackkingsystem");
mysqli_set_charset($objConnect,"utf8");
mysqli_query($objConnect,"SET NAMES UTF8");


//insert data
$insert = "INSERT INTO user_info (Student_ID,Name, Grade, Parent_Income, Volunteer,Phone_Number, Estudentloan_Type)
VALUES ('6009650406','Thanyanan Methakornanan', 2.38, 250000, 36,'0882786007',1)";
$objQuery = mysqli_query($objConnect,$insert);

    if($objQuery){  
        echo "1";
    }else{
        echo "Error: " . $objQuery . "<br>" . $objConnect->error;
    }

?>


<!---->

<table width="600" border="1">
  <tr>
    <th width="100"> <div align="center">Student_ID </div></th>
    <th width="200"> <div align="center">Name </div></th>
    <th width="100"> <div align="center">Grade </div></th>
    <th width="100"> <div align="center">Parent_Income </div></th>
    <th width="100"> <div align="center">Volunteer </div></th>
    <th width="100"> <div align="center">Phone_Number </div></th>
    <th width="100"> <div align="center">E-studentloan_Type </div></th>
  </tr>
<?php

//การเอาข้อมูลใน DB มาวนลูปใส่

while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["Student_ID"];?></div></td>
    <td><div align="center"><?php echo $objResult["Name"];?></td>
    <td><div align="center"><?php echo $objResult["Gradel"];?></td>
    <td><div align="center"><?php echo $objResult["Parent_Income"];?></div></td>
    <td><div align="center"><?php echo $objResult["Volunteer"];?></div></td>
    <td><div align="right"><?php echo $objResult["Phone_Number"];?></tdalign=></td>
    <td><div align="right"><?php echo $objResult["E-studentloan_Type"];?></tdalign=></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
</body>
</html>