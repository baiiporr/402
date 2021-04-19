<?php session_start(); ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตารางกำหนดการ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <script>
    $(document).ready(function() {
        $("#submit").click(function() {


            $.ajax({
                url: 'connection.php',
                type: 'post',
                success: function(response) {
                    $('input').attr('readonly', true);
                    $('input').attr('readonly', false);
                    alert(response);
                }
            });
        });


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
        color: rgb(44, 49, 58);
        text-align: center;
        height: auto;
        margin-top: 20px;
        margin-left: 130px;
        width: 200px;
        background-color: #4d585e4f;
    }

    .table {
        text-align: center;
        color: rgb(44, 49, 58);
    }

    .text-uppercase {
        color: rgb(44, 49, 58);
    }

    .k {
        color: rgb(44, 49, 58);
    }

    .nav-link {
        color: rgb(44, 49, 58);
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

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="จนทหน้าหลัก.html">หน้าหลัก</a>
                        </li>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="จนทตารางกำหนดการ.html">ตารางกำหนดการ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="จนทประกาศรายชื่อ.html">ประกาศรายชื่อผู้กู้</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ติดตามสถานะกรอรายใหม่.html">ติดตามสถานะ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="จนทคำนวณเงิน.html">สรุปรายงานการกู้ยืม</a>
                            </li>
                        </ul>
                </div>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link " href="#">ออกจากระบบ</a>
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

        }
    }
    </script>


    <!-- slide pic -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">


            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="images/picศกร1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-uppercase">ตารางกำหนดการ</h2>
                    <p class="k">ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                </div>
            </div>

        </div>

    </div>

    <!--ไฟล์ตาราง-->
    <div class="a">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <form action="connection.php" name="form1" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">ไฟล์ตารางกำหนดการ</label>
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="submit" value="บันทึกไฟล์ลงระบบ" name="submit" class="btn ass_btn  ">

                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>

    </div>

    <?php
    //1. เชื่อมต่อ database: 
    include('data.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง: 
    $query = "SELECT * FROM file" or die("Error:" . mysqli_error(""));
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
    $result = mysqli_query($conn, $query);
    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
    echo "<table border='1' align='center' width='500'>";
    while ($row = mysqli_fetch_array($result)) {

        $pdffile = $row['file_name'];
        echo "<tr>";

        echo "<td>" . "<img src='uploads/" . $row["file_name"] . "' width='1000'>" . "</td>";
        echo "<a href=uploads/$pdffile>$pdffile</a>";

        echo "</tr>";
    }
    echo "</table>";
    //5. close connection
    mysqli_close($conn);
    ?>



    <!--ตารางกำหนดการ-->


    <div class="a">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <table class="table">
                        <thead>

                            <p>ภาคเรียนที่ 1 รุ่นที่ 1 รายเก่าไม่ย้ายสถานศึกษา</p>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">กิจกรรม</th>
                                <th scope="col">ระยะเวลา</th>
                                <th scope="col">หมายเหตุ</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>นักศึกษายื่นแบบคาขอกู้ยืมผ่านระบบe-studentloan</td>
                                <td>1 มิ.ย.- 31 ส.ค. 2562</td>
                                <td> - </td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>ประชุมกรรมการกู้ยืมประจาสถานศึกษา</td>
                                <td> 14 พ.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td> ประกาศรับสมัครกู้ยืม รุ่นที่ 1/2562 รายเก่าไม่ย้ายสถานศึกษา</td>
                                <td> 1-31 พ.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>ส่งใบสมัครพร้อมเอกสารแนบ</td>
                                <td> 23 – 25 พ.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>สัมภาษณ์</td>
                                <td> 23 – 25 พ.ค. 2562</td>
                                <td>สัมภาษณ์พร้อมส่งใบสมัคร</td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>ประกาศรายชื่อนักศึกษาที่ผ่านการพิจารณาให้กู้ยืม</td>
                                <td> 10 มิ.ย. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>นศ.บันทึกค่าเล่าเรียนในระบบ e-studentloan</td>
                                <td>23-24 ก.ค. 2562</td>
                                <td>รอกองทุนฯเปิดะบบ</td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>นักศึกษาลงนามในแบบยืนยันค่าจดทะเบียน + ค่าครองชีพ</td>
                                <td>29-30 ส.ค.2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>ส่งแบบยืนยันค่าจดทะเบียนเรียน,ค่าครองชีพ ทางไปรษณีย์ให้ธนาคารกรุงไทย สานักงานใหญ่
                                </td>
                                <td> 5 ก.ย.2562</td>
                                <td>-</td>
                            </tr>





                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <div class="b">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <p>ภาคเรียนท่ี1 รุ่นท่ี2 สาหรับนักศึกษาช้ันปีท่ี1และผู้ยืมรายใหม่,รายเก่า</p>
                                <th scope="col">#</th>
                                <th scope="col">กิจกรรม</th>
                                <th scope="col">ระยะเวลา</th>
                                <th scope="col">หมายเหตุ</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>ยื่นแบบคาขอกู้ยืมผ่านระบบe-studentloan</td>
                                <td>1มิ.ย.-31ส.ค.2562</td>
                                <td> - </td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>ประกาศรับสมัครกู้ยืม รุ่นที่ 2/2562 รายเก่าและรายใหม่</td>
                                <td>6 มิ.ย. 2560</td>
                                <td>ทาง http://sa.tu.ac.th/ และ https://www.reg.tu.ac.th/</td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>นักศึกษาช้ันปีที่ 1/2562
                                    ภาคปกติที่ประสงค์ใช้สิทธ์ิจดทะเบียนเรียนโดยไม่ต้องสารองเงินจ่ายโปรดส่งใบสมัคร</td>
                                <td>5 – 6 ส.ค. 2562</td>
                                <td>มธ.ศูนย์รังสิต</td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>ส่งใบสมัครพร้อมเอกสารแนบ</td>
                                <td>20 – 22 ส.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>สัมภาษณ์</td>
                                <td>20 – 22 ส.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>ประกาศรายช่ือนักศึกษาที่ผ่านการพิจารณาให้กู้ยืม</td>
                                <td>30 ส.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>บันทึกสัญญา
                                    และพิมพ์สัญญาออกจากระบบฯให้ผู้ปกครองลงนามที่อำเภอ/เทศบาล/เขต/ที่มหาวิทยาลัยธรรมศาสตร์
                                </td>
                                <td>7-10 ก.ย.2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>นักศึกษาบันทึกค่าเล่าเรียนในระบบ e-studentloan</td>
                                <td>16-17 ก.ย.2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>นักศึกษาลงนามในแบบยืนยันค่าจดทะเบียน + ค่าครองชีพ</td>
                                <td>23-24 ก.ย. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>ส่งสัญญาและแบบยืนยันค่าจดทะเบียนเรียน,ค่าครองชีพทางไปรษณีย์ให้ธนาคารกรุงไทย
                                    สานักงานใหญ่</td>
                                <td>1 ต.ค. 2562</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <div class="c">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <p>ภาคเรียนที่ 2 /2562</p>
                                <th scope="col">#</th>
                                <th scope="col">กิจกรรม</th>
                                <th scope="col">ระยะเวลา</th>
                                <th scope="col">หมายเหตุ</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>ยื่นแบบคำขอกู้ยืมผ่านระบบ e-studentloan</td>
                                <td>1 พ.ย. - 31 ม.ค. 2563</td>
                                <td> - </td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>นักศึกษาพิมพ์คำขอกู้ยืมออกจากระบบ</td>
                                <td>6-8 พ.ย. 2562</td>
                                <td>ทาง www.studentloan.or.th ส่งงานบริการและให้คำปรึกษา</td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>นักศึกษาบันทึกค่าเล่าเรียนในระบบ e-studentloan</td>
                                <td>1-5 ธ.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>พิมพ์แบบยืนยันค่าเล่าเรียนออกจากระบบ e-studentloan</td>
                                <td>11-15 ธ.ค. 2562</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>นักศึกษาลงนามในแบบยืนยันค่าจดทะเบียน + ค่าครองชีพ</td>
                                <td>23-25 ธ.ค. 2562</td>
                                <td>-</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
            <p>
            </p>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>

</html>