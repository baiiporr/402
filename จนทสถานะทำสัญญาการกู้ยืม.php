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


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สถานะส่งใบสมัคร</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
    function Save() {

        var Year = $("#year").val().trim();
        var Term = $('input[name=term]:checked', '#term').val();
        $.ajax({
            url: 'บันทึกสถานะส่งใบสมัคร.php',
            type: 'post',
            data: {
                Year: Year,
                Term: Term
            },
            success: function(response) {
                alert(response);
            }
        });
    }
    $(document).ready(function() {

    });
    </script>

    <style>
    body {
        background-color: #acbdcf;
    }

    .button {
        background-color: #283943;
        /* Green */
        border: none;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: auto;
        cursor: pointer;
        border-radius: 12px;
    }

    form {
        padding-left: 20px;
        padding-right: 10px;
    }

    .b {
        margin-bottom: 200px;
    }

    .a {
        padding-top: 50px;
        padding-left: 420px;
    }

    .c {
        text-align: center;
        padding-left: 420px;
    }

    .d {
        padding-left: 400px;
    }
    </style>
</head>

<body>

    <div class="row-md-11">

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
                                <a class="nav-link" href="ภาคเรียนและปีการศึกษา.php">ภาคเรียน/ปีการศึกษา</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ตารางกำหนดการ.php">ตารางกำหนดการ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ประกาศรายชื่อผู้กู้.php">ประกาศรายชื่อผู้กู้</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ติดตามสถานะ.php">ติดตามสถานะ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="สรุปรายงานการกู้ยืม.php">สรุปรายงานการกู้ยืม</a>
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
                <h2 class="text-uppercase">สถานะส่งใบสมัคร</h2>
                <p>ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                <!-- <?php echo $_SESSION['name']; ?> -->
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
            <div class="d-flex justify-content-center">
                <img src="images/1.png" class="img-fluid" alt="Responsive image" style="width: 800px;">
            </div>
            <?php
        }
            ?>
            <!--ข้อมูลต่างๆ-->

            <form id="term">
                <div class="a">
                    <div class="row form-group">
                        <label class="text-center col-md-2 control-label">ทำสัญญาการกู้ยืม</label>
                        <div class="col-md-5">
                            <label class="radio-inline"><input type="radio" name="term" value="1" checked>&nbsp
                                ทำสัญญา&nbsp</label>
                            <label class="radio-inline"><input type="radio" name="term" value="2">&nbsp
                                ไม่ทำสัญญา&nbsp</label><br>
                        </div>
                        <div class="col-md-4 panel panel-heading" style="display:none; color:red" id="contact_error">
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">

                <div class="col-md-4 panel panel-heading" style="display:none; color:red" id="address_error"></div>
            </div>


            <div class="d">
                <div class="form-group row">
                    <div class="col-md-7 text-center">
                        <button class="btn btn-large btn-danger" type="button" onclick="Edit()"> รอดำเนินการ
                        </button>
                        <button id="btn_save" name="btn_save" class="btn btn-large btn-success">
                            เสร็จสิ้น</button>

                    </div>
                </div>
            </div>
            </fieldset>
            </form>
        </div>

        <!--ข้อมูลผู้กู้-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


</body>

</html>