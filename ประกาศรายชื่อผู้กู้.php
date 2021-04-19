<html lang="en">
<?php session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

$objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_select_db($objConnect, "trackkingsystem");
mysqli_set_charset($objConnect, "utf8");
mysqli_query($objConnect, "SET NAMES UTF8");


$student_id = $_SESSION['studentID'];
$select = "SELECT * FROM user_info WHERE Student_ID = '$student_id'";
$objQuerySelect = mysqli_query($objConnect, $select);
$grade = true;
$parent_income = true;
$volunteer = true;
$pass = false;
$_grade;
$_parent_income;
$_volunteer;
$_sutdent_type;
$_phone_number;
$count = 0;
while ($row = mysqli_fetch_assoc($objQuerySelect)) {
    if ($row['Grade'] < 1.90) {
        $grade = false;
    }
    if ($row['Parent_Income'] > 300000) {
        $parent_income = false;
    }
    if ($row['Volunteer'] < 36) {
        $volunteer = false;
    }
    if ($grade && $parent_income && $volunteer) {
        $pass = true;
    }
    $_grade = $row['Grade'];
    $_parent_income = $row['Parent_Income'];
    $_volunteer = $row['Volunteer'];
    $_sutdent_type = $row['Estudentloan_Type'];
    $_phone_number = $row['Phone_Number'];
    $count++;
}
if ($count == 0) {
    $pass = false;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ประกาศรายชื่อผู้กู้</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script>
    $(document).ready(function() {

    });
    </script>

    <style>
    body {
        background-color: #acbdcf;
    }

    .satatus {
        font-size: 20px;
        padding-left: 50px;
    }

    .card {
        color: black;
        /* text-align: center; */
        height: auto;
        margin-top: 20px;
        margin-left: 150px;
        width: 20px;
        background-color: #4d585e4f;
    }

    .table {
        text-align: center;
        color: white;
    }
    </style>
</head>

<body>
    <!-- bar -->
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light " style="background : transparent;" id='nav'>

            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="images/logotu.png " alt="" width="50" height="50">
                </a>
                <a class="navbar-brand" href="student.php">หน้าหลัก</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="ตารางกำหนดการ.php">ตารางกำหนดการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="สร้างคำร้อง.php">สร้างคำร้อง</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ประกาศรายชื่อผู้กู้.php">ประกาศรายชื่อผู้กู้</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ติดตามสถานะกรอรายเก่า.php">ติดตามสถานะ</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link " href="logout.php">ออกจากระบบ</a>
                    </li>

                </ul>
            </div>
        </nav>

    </div>

    <!-- add some javascript code -->

    <script type="text/javascript">
    var nav = document.getElementById('nav');

    window.onscroll = function() {

        if (window.pageYOffset > 100) {

            nav.style.background = "#ffffffff";

        } else {
            nav.style.background = "transparent";
            nav.style.boxShadow = "none";
        }
    }
    </script>
    <!-- slide pic -->
    <div class="carousel-item active">
        <img class="d-block w-100" src="images/picศกร1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h2 class="text-uppercase">ประกาศรายชื่อผู้กู้</h2>
            <p>ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
            <?php echo $_SESSION['name']; ?>
        </div>
    </div>
    <!--ไฟล์ตาราง-->
    <div class="a">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <form>
                        <p class="card-text">
                        <h5 class="text-center">
                            <?php echo $_SESSION['name']; ?>
                        </h5>
                        <h2 class="text-center">
                            <p class="text-center"><?php if ($pass == true) {
                                                        echo "ผ่านการกู้";
                                                    } else {
                                                        echo "ไม่ผ่านการกู้";
                                                    } ?></p>
                        </h2>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <?php if ($count != 0) { ?>
        <div class="a">
            <div class="container">
                <div class="d- flexjustify-content-center card w-75">
                    <div class="card-body">
                        <form>
                            <div class="input-group form-group">
                                <p class="card-text">
                                <h5 class="text-uppercase">ข้อมูลผู้กู้ </h5><br>
                                <br>
                                รหัสนักศึกษา : <?php echo $_SESSION['studentID']; ?><br>
                                ชื่อจริง-นามสกุล : <?php echo $_SESSION['name']; ?><br>
                                ประเภทกองทุน : <?php
                                                    if ($_sutdent_type == 1) {
                                                        echo "กรอ.รายเก่า";
                                                    } else if ($_sutdent_type == 2) {
                                                        echo "กรอ.รายใหม่";
                                                    } else if ($_sutdent_type == 3) {
                                                        echo "กยศ.รายเก่า";
                                                    } else if ($_sutdent_type == 4) {
                                                        echo "กยศ.รายใหม่";
                                                    }
                                                    ?><br>
                                เกรดเฉลี่ย : <?php echo $_grade; ?><br>
                                รายได้ผู้ปกครอง/ปี(บาท) : <?php echo $_parent_income; ?><br>
                                จำนวนจิตอาสา(ชั่วโมง) : <?php echo $_volunteer; ?><br>
                                เบอร์ติดต่อ : <?php echo $_phone_number; ?><br>

                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php } ?>
        <!--ตารางกำหนดการ-->


        <div class="a">
            <div class="container">
                <div class="d-flex justify-content-center card w-75">


                </div>





                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js">
                </script>

</body>

</html>