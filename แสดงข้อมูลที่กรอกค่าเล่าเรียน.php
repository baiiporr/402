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

    $sql = "SELECT * FROM fee_cost";
    $result = $objConnect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo " รหัสนักศึกษา : " . $row["Student_ID"];
            echo  " ค่าเล่าเรียน : " . $row["FeeMoney"];
            echo  " ค่าครองชีพ : " . $row["Cost_Of_Living"];
        }
    } else {
        echo "ไม่พบข้อมูล";
    }

    $objConnect->close();
    ?>

</body>

</html>