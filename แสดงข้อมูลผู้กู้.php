<!DOCTYPE html>
<html>

<body>

    <?php
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "trackkingsystem";

    // Create connection
    $objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    // Check connection
    if ($objConnect->connect_error) {
        die("Connection failed: " . $objConnect->connect_error);
    }

    $sql = "SELECT * FROM user_info";
    $result = $objConnect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["Estudentloan_Type"] == 1) {
                echo "<br> กรอ.รายเก่า";
            } elseif ($row["Estudentloan_Type"] == 2) {
                echo "<br> กรอ.รายใหม่";
            } elseif ($row["Estudentloan_Type"] == 3) {
                echo "<br> กยศ.รายเก่า";
            } elseif ($row["Estudentloan_Type"] == 4) {
                echo "<br> กยศ.รายใหม่";
            }

            echo " รหัสนักศึกษา : " . $row["Student_ID"] .
                " ชื่อ-นามกสุล : " . $row["Name"] .
                " เกรดเฉลี่ย : " . $row["Grade"] .
                " รายได้ผู้ปกครอง/ปี(บาท) : " . $row["Parent_Income"] .
                " จำนวนจิตอาสา(ชั่วโมง) : " . $row["Volunteer"] .
                " เบอร์โทร : " . $row["Phone_Number"] . "<br>";
        }
    } else {
        echo "ไม่พบข้อมูล";
    }

    $objConnect->close();
    ?>

</body>

</html>