<?php
session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "trackkingsystem";

$objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_select_db($objConnect, "trackkingsystem");
mysqli_set_charset($objConnect, "utf8");
mysqli_query($objConnect, "SET NAMES UTF8");

// $student_id = $_SESSION['studentID'];
// $insert = "INSERT INTO all_state (Student_ID,State)
//             VALUES ('5809650533',1)";
// $objQuery = mysqli_query($objConnect, $insert);
$student_id = $_SESSION["studentID"];
$select = "SELECT MAX(State) AS stateMax FROM all_state WHERE Student_ID = '$student_id' ";
$objQuerySelect = mysqli_query($objConnect, $select);
$state = mysqli_fetch_array($objQuerySelect);
// echo $state["stateMax"];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดตามสถานะ กรอ.รายเก่า</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script>
    $(document).ready(function() {});
    </script>


    <style>
    body {
        background-color: #acbdcf;
    }

    .satatus {
        font-size: 20px;
        padding-left: 50px;
    }

    .form-check-input {
        margin-left: 30px;
    }

    .text-uppercase {
        margin-left: 60px;
    }

    .v {
        width: 15px;
    }

    h5 {
        color: black;
    }

    .statepic {
        width: 100%;
        height: 30%;
    }
    </style>
</head>

<body>
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
    <div> <img class="d-block w-100" src="images/picศกร1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h2 class="text-uppercase">ติดตามสถานะ</h2>
            <p>ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
            <?php echo $_SESSION['name']; ?>
        </div>
    </div>

    <!--state-->
    <?php
    if ($state["stateMax"] == 1) { ?>
    <div class="d-flex justify-content-center">
        <img src="images/2.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
        <?php
    } else if ($state["stateMax"] == 2) { ?>
        <div class="d-flex justify-content-center">
            <img src="images/5.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
        </div>
        <?php
    } else if ($state["stateMax"] == 3) { ?>
        <div class="d-flex justify-content-center">
            <img src="images/7.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
        </div>
        <?php
    } else if ($state["stateMax"] == 4) { ?>
        <div class=" d-flex justify-content-center">
            <img src="images/9.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
        </div>
        <?php
    } else { ?>
        < class="d-flex justify-content-center">
            <img src="images/1.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
    </div>
    <?php
    }
    ?>

    <!--สีสถานะ-->
    <div class="a">
        <div class="container">
            <h5>ติดตามสถานะ กรอ. รายเก่า</h5>
        </div>
        <div class="container">
            <p class="text-uppercase"> <img class="v"> ยังไม่ได้ทำรายการ</p>
            <p class="text-uppercase"> <img class="v"> รอการตรวจสอบ </p>
            <p class="text-uppercase"> <img class="v"> ตรวจสอบเสร็จสิ้น </p>
        </div>
    </div>
    <p></p>

    <!--ข้อมูล-->
    <div class="b">
        <div class="container">
            <p></p>
            <h5>ตรวจสอบเอกสารก่อนส่งใบสมัครกู้ยืมเงินเพื่อการศึกษา</h5>
        </div>
        <div class="container">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> แบบคำขอกู้ยืมเงิน ที่สมัครผ่านระบบ e-studentloan
                พร้อมติดรูปถ่าย สวมใส่ชุดนักศึกษา ขนาด 1.5 นิ้ว จำนวน 1 รูป</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> ใบเกรดพิมพ์จาก www. reg.tu.ac.th </p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> เอกสารรับรองรายได้/หนังสือรับรองเงินเดือน/สลิปเงินเดือน
                ใช้เฉพาะผู้ที่ประสงค์กู้ยืมค่าครองชีพ</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สำเนาบัตรประจำตัวข้าราชการ/เจ้าหน้าที่รัฐ ฯลฯ
                ที่เซ็นแบบยืนยัน ใช้เฉพาะผู้ที่ประสงค์กู้ยืมค่าครองชีพ</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สำเนาบัตรประจำตัวประชาชนของนักศึกษา จำนวน 1 ชุด</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สำเนาสัญญาหรือสำเนาแบบยืนยันค่าเล่าเรียน จำนวน 1 ชุด ขอได้ที่
                ศกร.</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สำเนาออกเอกสารการเปลี่ยนชื่อ - สกุล(ถ้ามี)</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สมุดฟอร์มบันทึกกิจกรรมอาสา หรือ บริการสาธารณะ
                และเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม/36 ชั่วโมง</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> ฟอร์มแสดงความคิดเห็นของอาจารย์ที่ปรึกษา</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text-uppercase"> <img class="v"> สำเนาใบหน้าเลขที่บัญชีสมุดคู่ฝากธนาคารกรุงไทยฯ จำนวน 1 ชุด
            </p>
            <p></p>
        </div>
    </div>


    </>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
mysqli_close($objConnect);
?>