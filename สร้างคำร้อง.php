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
$student_id = $_SESSION["studentID"];
$select = "SELECT * FROM user_info WHERE Student_ID = '$student_id'";
$objQuerySelect = mysqli_query($objConnect, $select);
$_student_type = 1;
$_grade = null;
$_parent_income = null;
$_volunteer = null;
$_phone_number = "";
$count = 0;
while ($row = mysqli_fetch_assoc($objQuerySelect)) {
    $_student_type = $row['Estudentloan_Type'];
    $_grade = $row['Grade'];
    $_parent_income = $row['Parent_Income'];
    $_volunteer = $row['Volunteer'];
    $_phone_number = $row['Phone_Number'];
    $count++;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สร้างคำร้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
    function Edit() {
        $('#grade').attr('readonly', false);
        $('#parent_income').attr('readonly', false);
        $('#volunteer').attr('readonly', false);
        $('#phone_number').attr('readonly', false);
        $(':radio:not(:checked)').attr('disabled', false);
    }

    $(document).ready(function() {
        <?php if ($count != 0) { ?>
        $('input').attr('readonly', true);
        $(':radio:not(:checked)').attr('disabled', true);
        <?php
            } ?>
        $("#btn_save").click(function() {
            var StudentId = $("#student_id").val().trim();
            var Name = $("#student_name").val();
            var Grade = $("#grade").val().trim();
            var ParentIncome = $("#parent_income").val().trim();
            var Volunteer = $("#volunteer").val().trim();
            var PhoneNum = $("#phone_number").val().trim();
            var Type = $('input[name=e-student_type]:checked', '#e-student_type').val();
            $.ajax({
                url: 'บันทึกสร้างคำร้อง.php',
                type: 'post',
                data: {
                    StudentId: StudentId,
                    Name: Name,
                    Grade: Grade,
                    ParentIncome: ParentIncome,
                    Volunteer: Volunteer,
                    PhoneNum: PhoneNum,
                    Type: Type
                },
                success: function(response) {
                    $('input').attr('readonly', true);
                    $(':radio:not(:checked)').attr('disabled', true);
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
                <h2 class="text-uppercase">สร้างคำร้อง</h2>
                <p>ระบบติดตามสถานะการกู้ยืมเงิน กรอ. และกยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                <?php echo $_SESSION['name']; ?>
            </div>
        </div>


        <!--ข้อมูลต่างๆ-->

        <form id="e-student_type">
            <div class="a">
                <div class="row form-group">
                    <label class="col-md-2 control-label" for="e-student_type">ประเภทกองทุน</label>
                    <div class="col-md-5">
                        <label class="radio-inline"><input type="radio" name="e-student_type" value="1"
                                <?php if ($_student_type == 1) {
                                                                                                            echo 'checked="checked"';
                                                                                                        } ?>>กรอ.รายเก่า&nbsp</label>
                        <label class="radio-inline"><input type="radio" name="e-student_type" value="2"
                                <?php if ($_student_type == 2) {
                                                                                                            echo 'checked="checked"';
                                                                                                        } ?>>กรอ.รายใหม่&nbsp</label>
                        <label class="radio-inline"><input type="radio" name="e-student_type" value="3"
                                <?php if ($_student_type == 3) {
                                                                                                            echo 'checked="checked"';
                                                                                                        } ?>>กยศ.รายเก่า&nbsp</label>
                        <label class="radio-inline"><input type="radio" name="e-student_type" value="4"
                                <?php if ($_student_type == 4) {
                                                                                                            echo 'checked="checked"';
                                                                                                        } ?>>กยศ.รายใหม่&nbsp</label>
                    </div>
                    <div class="col-md-4 panel panel-heading" style="display:none; color:red" id="contact_error"></div>
                </div>
            </div>
        </form>
        <div class="c">
            <div class="row form-group">
                <label class="col-md-3 control-label" for="student_id">รหัสนักศึกษา</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="student_id" name="student_id" value=" <?php echo $_SESSION["studentID"] ?>"
                            class="form-control input-md" type="text" readonly>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-3 control-label" for="student_name">ชื่อจริง-นามสกุล</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="student_name" name="student_name" value="<?php echo $_SESSION["name"] ?>"
                            class="form-control input-md" type="text" readonly>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-md-3 control-label" for="grade">เกรดเฉลี่ย</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="grade" name="grade" placeholder="" class="form-control input-md" type="text"
                            value=" <?php echo $_grade; ?>">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-3 control-label" for="parent_income">รายได้ผู้ปกครอง/ปี(บาท)</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="parent_income" name="parent_income" placeholder="" class="form-control input-md"
                            type="text" value=" <?php echo $_parent_income; ?>">
                    </div>
                </div>
            </div>
            <div class=" row form-group">
                <label class="col-md-3 control-label" for="volunteer">จำนวนจิตอาสา(ชั่วโมง)</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="volunteer" name="volunteer" placeholder="" class="form-control input-md" type="text"
                            value=" <?php echo $_volunteer; ?>">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-3 control-label" for="phone_number">เบอร์ติดต่อ</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input id="phone_number" name="phone_number" placeholder="" class="form-control input-md"
                            type="text" value=" <?php echo $_phone_number; ?>">
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
                    <button class="btn btn-large btn-danger" type="button" onclick="Edit()"> แก้ไขข้อมูล
                    </button>
                    <button id="btn_save" name="btn_save" class="btn btn-large btn-success">
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