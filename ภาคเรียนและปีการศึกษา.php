<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ภาคเรียนและปีการศึกษา</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
    function Save() {

        var Year = $("#year").val().trim();
        var Term = $('input[name=term]:checked', '#term').val();
        $.ajax({
            url: 'บันทึกภาคเรียนและปีการศึกษา.php',
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
                <h2 class="text-uppercase">ภาคเรียนและปีการศึกษา</h2>
                <p>ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                <!-- <?php echo $_SESSION['name']; ?> -->
            </div>
        </div>


        <!--ข้อมูลต่างๆ-->

        <form id="term">
            <div class="a">
                <div class="row form-group">
                    <label class="text-center col-md-2 control-label">ภาคการศึกษา</label>
                    <div class="col-md-5">
                        <label class="radio-inline"><input type="radio" name="term" value="1" checked>ภาคเรียนที่
                            1</label>
                        <label class="radio-inline"><input type="radio" name="term" value="2">ภาคเรียนที่
                            2</label><br>
                    </div>
                    <div class="col-md-4 panel panel-heading" style="display:none; color:red" id="contact_error"></div>
                </div>
            </div>
        </form>
        <div class="c">
            <div class="row form-group">
                <label class="text-center col-md-2 control-label">ปีการศึกษา</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="year" name="year" value="" class="form-control input-md" type="text">
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-4 panel panel-heading" style="display:none; color:red" id="address_error"></div>
        </div>


        <div class="d">
            <div class="form-group row">
                <div class="col-md-7 text-center">
                    <button id="btn_save" name="btn_save" class="btn btn-large btn-success" onclick="Save()">
                        บันทึกข้อมูล</button>

                </div>
            </div>
        </div>
        </fieldset>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


</body>

</html>