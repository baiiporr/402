<?php session_start();
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
    <title>Tracking System For e-Studentloan In Thammasat University</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <style>
    body {
        background-color: #acbdcf;
    }

    .button {
        background-color: #283943;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: auto;
        cursor: pointer;
        border-radius: 12px;
    }

    .card {
        color: white;
        text-align: center;
        height: auto;
        margin-top: 30px;
        margin-left: 130px;
        width: 200px;
        font-size: 17px;
        background-color: #4d585e4f;
    }

    .text {
        text-align: center;
        margin-top: 20px;
        text-decoration: underline;
        color: black;
        font-size: 20px;
    }

    .p {
        font-size: 16px;
        color: rgb(240, 247, 243);
    }

    .login_btn {
        background-color: #0e134244;
        border: none;
        color: rgb(248, 245, 245);
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        margin-left: 130px;
        display: inline-block;
        font-size: 15px;
        border: center;
        cursor: pointer;
        border-radius: 12px;
    }

    .form-control {
        margin-top: 24px;
        font-size: 17px;
    }

    .card1 {
        background-color: #2c445ac0;
        margin-top: 20px;
        font-size: 17px;
        width: 600px;
        border-radius: 20px;
    }

    .h {
        margin-left: 100px;
    }

    .radio-inline {
        color: rgb(255, 251, 251);
        font-size: 15px;
    }

    .control-label {
        color: rgb(255, 251, 251);
        font-size: 15px;
        padding-right: 30px;
    }

    .form {
        padding-left: 20px;
        padding-right: 10px;
    }

    .e {
        font-size: 15px;
        color: black;
    }

    .a {
        padding-left: 120px;
    }

    .c {
        text-align: center;
        padding-left: 120px;
    }

    .input-md {
        padding-right: 30px;
    }

    .radio {
        padding-right: 30px;
    }

    .p1 {
        font-size: 18px;
        color: black;
    }

    .text1 {
        margin-left: 60px;
        color: black;
    }

    .form-check-input {
        margin-left: 30px;
    }

    .v {
        width: 15px;
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
                <a class="navbar-brand" href="จนทหน้าหลัก.php">หน้าหลัก</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="ภาคเรียนและปีการศึกษา.php">ภาคเรียนและปีการศึกษา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="จนทตารางกำหนดการ.html">ตารางกำหนดการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="จนทประกาศรายชื่อ.html">ประกาศรายชื่อผู้กู้</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#anchor name3">ติดตามสถานะ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="จนทคำนวณเงิน.html">สรุปรายงานการกู้ยืม</a>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/picศกร1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-uppercase">WELCOME</h2>
                    <?php echo $_SESSION['name']; ?>
                    <p>Tracking System For e-Studentloan In Thammasat University</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/picdome2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-uppercase">WELCOME</h2>
                    <?php echo $_SESSION['name']; ?>

                    <p>Tracking System For e-Studentloan In Thammasat University</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/picsc3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-uppercase">WELCOME</h2>
                    <?php echo $_SESSION['name']; ?>
                    <p>Tracking For e-Studentloan In Thammasat University</p>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--วงกลมเมนู-->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <img src="images/ปีการศึกษา_เทอม.png" class="card-img-top" alt="circle2" style="width: 200px;display: block;
                margin-left: auto;
                margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="ภาคเรียนและปีการศึกษา.php" class="p">ภาคเรียน/ปีการศึกษา</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="images/ตารางกำหนด.png" class="card-img-top" alt="circle1" style="width: 200px; display: block;
                margin-left: auto;
                margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button">
                        <a href="จนทตารางกำหนดการ.html" class="p">ตารางกำหนดการ</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <img src="images/ประกาศรายชื่อผู้กู้.png" class="card-img-top" alt="circle2" style="width: 200px;display: block;
                margin-left: auto;
                margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="จนทประกาศรายชื่อ.html" class="p">ประกาศรายชื่อผู้กู้</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="images/ติดตามสถานะ.png" class="card-img-top" alt="circle3" style="width: 200px;display: block;
                margin-left: auto;
                margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"> <a href="#anchor name3" class="p">ติดตามสถานะ</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="images/สร้างคำร้อง.png" class="card-img-top" alt="circle4" style="width: 200px;display: block;
                margin-left: auto;
                margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="จนทคำนวณเงิน.html" class="p">สรุปรายงานการกู้ยืม</a></div>
                </div>
            </div>
        </div>
    </div>


    <!--ติดตามสถานะ-->
    <div class="container">
        <div class="text"> <a name="anchor name3">ติดตามสถานะ</a></div>
        <div class="d-flex justify-content-center h-70">
            <div class="card1">
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-namestudent"></i></span>
                            </div>
                            <input type="text" id="searchbox" name="searchbox" class="form-control form-control-lg"
                                placeholder="ค้นหาจาก รหัสนักศึกษา หรือ ชื่อ-นามสกุล">
                        </div>
                        <div class="col-md-9 text-center">
                            <input type="submit" value="ติดตามสถานะ" class="btn login_btn  ">

                        </div>
                        <p></p>

                    </form>

                    <!--search-->
                    <tbody>
                        <?php $i = 1;
                        while ($objResult = mysqli_fetch_array($objQuerySelect, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $objResult['Student_ID']; ?></td>
                            <td><?php echo $objResult['Name']; ?></td>
                            <td><?php echo $objResult['Grade']; ?></td>
                            <td><?php echo $objResult['Parent_Income']; ?></td>
                            <td><?php echo $objResult['Volunteer']; ?></td>
                            <td><?php echo $objResult['Phone_Number']; ?></td>
                            <td><?php echo $objResult['Estudentloan_Type']; ?></td>
                        </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    </div>
    <p></p>

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
        <div class="d-flex justify-content-center">
            <img src="images/1.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
        </div>
        <?php
    }
        ?>

        <!--ข้อมูลติดตามสถานะ-->
        <div class=" b">
            <div class="container">
                <p></p>
                <h5>ข้อมูลของนักศึกษาที่ประสงค์จะกู้ยืมเงิน</h5>
            </div>
            <div class="container">

            </div>
        </div>
    </div>


    <!--ข้อมูลสถานะ-->

    <div class="b">
        <div class="container">
            <p></p>
            <h5>ตรวจสอบเอกสารก่อนส่งใบสมัครกู้ยืมเงินเพื่อการศึกษา</h5>
        </div>
        <div class="container">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> แบบคำขอกู้ยืมเงิน TU1 พร้อมติดรูปถ่าย สวมใส่ชุดนักศึกษา ขนาด 1.5 นิ้ว จำนวน 1
                รูป</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> ใบเกรดพิมพ์จาก www. reg.tu.ac.th นศ.ชั้นปีที่ 1/2562 ใช้สำเนาใบเกรด
                มัธยมศึกษาตอนปลาย </p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> เอกสารรับรองรายได้ (พร้อมทั้งสำเนาบัตรประตัวตัวข้าราชการ/รัฐวิษาหกิจฯ
                ของผู้รับรองรายได้)
                (เฉพาะ นศ.ที่ประสงค์จะกู้ยืม)</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> สำเนาบัตรประจำตัวประชาชน และสำเนาทะเบียนบ้านของ นศ. และบิดามารดา หรือผู้ปกครอง
                จำนวน 1 ชุด
            </p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> สำเนาใบเปลี่ยนชื่อ-สกุล(ถ้ามี)</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> แผนผังแสดงที่ตั้งของบ้าน/ที่อยู่อาศัยของ บิดา,มารดา หรือผู้ปกครอง</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> ภาพถ่ายบ้านหรือที่พักของ บิดาหรือมารดาหรือผู้ปกครอง ของผู้กู้ยืม</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> สำเนาใบมรณะบัตรของบิดา/มาดา(ถ้ามี)</p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> ฟอร์มแสดงความคิดเห็นของอาจารย์ที่ปรึกษา(นศ.ชั้นปีที่1/2562 ไม่ต้องแนบฟอร์มนี้)
            </p>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <p class="text1"> สำเนาใบหน้าเลขที่บัญชีสมุดคู่ฝากธนาคารกรุงไทยฯ จำนวน 1 ชุด</p>
            <input class="form-check-input" type="checkbox" name="radioNoLabel" id="radioNoLabel1" value=""
                aria-label="...">
            <p class="text1"> เอกสารอื่นๆ</p>

            <p></p>
        </div>
    </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</body>

</html>