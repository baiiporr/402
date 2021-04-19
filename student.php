<?php session_start(); ?>
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
    </style>
</head>

<body>

    <?php
    if ($_SESSION) {
    ?>

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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="images\picศกร1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h6 class="text-uppercase">WELCOME</h6>
                    <?php echo $_SESSION['name']; ?>
                    <p>Tracking System For e-Studentloan In Thammasat University</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images\picdome2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-uppercase">WELCOME</h2>
                    <?php echo $_SESSION['name']; ?>
                    <p>Tracking System For e-Studentloan In Thammasat University</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images\picsc3.jpg" alt="Third slide">
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
            <img src="images\ตารางกำหนด.png" class="card-img-top" alt="circle1" style="width: 200px; display: block;
            margin-left: auto;
            margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button">
                        <a href="ตารางกำหนดการ.php">ตารางกำหนดการ</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col">
            <img src="images\สร้างคำร้อง.png" class="card-img-top" alt="circle2" style="width: 200px;display: block;
            margin-left: auto;
            margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="สร้างคำร้อง.php">สร้างคำร้อง</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="images\ประกาศรายชื่อผู้กู้.png" class="card-img-top" alt="circle3" style="width: 200px;display: block;
            margin-left: auto;
            margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="ประกาศรายชื่อผู้กู้.php">ประกาศรายชื่อผู้กู้</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="images\ติดตามสถานะ.png" class="card-img-top" alt="circle4" style="width: 200px;display: block;
            margin-left: auto;
            margin-right: auto;">
            <div class="card-body">
                <div class="col text-center">
                    <div class="button"><a href="ติดตามสถานะผู้กู้.php">ติดตามสถานะ</a></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else
        echo "<h1>กรุณาเข้าสู่ระะบบ</h1>"
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</body>

</html>