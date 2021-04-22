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
                    <h2 class="text-uppercase">ประกาศข่าวสาร</h2>
                    <p class="k">ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                </div>
            </div>

        </div>

    </div>



    <div class="a">
        <div class="container">
            <div class="d-flex justify-content-center card w-75">
                <div class="card-body">
                    <form action="บันทึกข้อมูลข่าวสาร.php" name="form1" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">ไฟล์รูปภาพข่าวสาร(แสดงเพียงแค่ รูปภาพ
                                เท่านั้น)</label>
                            <input class="form-control" type="file" name="fileToUploadinfo" id="fileToUploadinfo">
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="submit" value="ลบไฟล์รูปภาพ" id="deleteinfo" name="deleteinfo"
                                class="btn ass_btn  ">
                            <input type="submit" value="บันทึกไฟล์ลงระบบ" id="submitaddinfo" name="submitaddinfo"
                                class="btn ass_btn  ">
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>

    </div>




    <?php
    //ไฟล์jpg,png
    //1. เชื่อมต่อ database: 
    include('data.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง: 
    $query = "SELECT * FROM file2" or die("Error:" . mysqli_error(""));
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
    $result = mysqli_query($conn, $query);
    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
    echo "<table border='1' align='center' width='500'>";
    while ($row = mysqli_fetch_array($result)) {

        $pdffile = $row['file_name'];

        echo "<tr>";
        echo "<td>" . "<img src='uploadinfo/" . $row["file_name"] . "' width='1000'>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //5. close connection
    mysqli_close($conn);

    ?>







    </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>

</html>