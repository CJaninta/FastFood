<!DOCTYPE html>
<html lang="en">
<head>
    <title>บัญชีผู้ใช้</title>
    <link rel="stylesheet" href="css/lay.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/rec.css">
    <link rel="stylesheet" href="css/regis.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <div class="header">
        <center><a href="index.php"><img src="img/logo.png" width="230" height="230"></a></center>
    </div>
    <div class="topnav">
    <a href="Employee-work.php">กำลังดำเนินงาน</a>
        <a href="Employee-detail.php">ข้อมูลส่วนตัวพนักงาน</a>
        <a href="Employee-work_history.php">ประวัติการส่งงาน</a>
        <form  action="logout_All.php" method="POST">
            <div class="login">
               <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
            </div>
        </form>
        <form  action="login.php" method="POST">
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i>
           <?php
              session_start();
              echo ("User : ").$_SESSION['First_name'];
           ?>
        </div>
        </form>
    </div>
    
    <form action="Update_Detail_Customer.php" method="POST">
    <div class="log">
        <div class="log1">
                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                   <h1> Edit Detail</h1>
                
                    <hr>

                    <label for="fname"><b><i style='font-size:24px' class='fas'>&#xf2bd;</i> ชื่อ</b></label>
                    <input type="text" placeholder="Enter First name" name="fname">

                    <label for="lname"><b><i style='font-size:24px' class='far'>&#xf2bd;</i> นามสกุล</b></label>
                    <input type="text" placeholder="Enter Last name" name="lname">

                    <label for="email"><b><i style='font-size:24px' class='far'>&#xf0e0;</i> Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">


                </div>

        </div>
        <div class="log1">

            <div class="container" style="border:3px solid rgb(245, 217, 93)">
                
                <label for="tel"><b><i style='font-size:24px' class='fas'>&#xf095;</i> เบอร์โทร</b></label>
                    <input type="text" placeholder="Enter Phone number" name="tel"> 

                <label for="idcard"><b><i style='font-size:24px' class='far'>&#xf2c2;</i>
                        เลขที่บัตรประชาชน</b></label>
                <input type="text" placeholder="Enter ID card number" name="idcard">

                <label for="add"><b><i style="font-size:24px" class="fa">&#xf2bc;</i> ที่อยู่</b></label>
                <input type="text" placeholder="Enter Address" name="add">
                <?php
                    if($_SESSION['check'] == "Employee")
                    {
                ?>
                    <label for="tel"><b><i style='font-size:24px' class='fas'>&#xf095;</i> ยี่ห้อ</b></label>
                    <input type="text" placeholder="Enter motorcycle brand" name="Brand_Motorcycle"> 

                     <label for="idcard"><b><i style='font-size:24px' class='far'>&#xf2c2;</i>
                        ทะเบียนรถ</b></label>
                    <input type="text" placeholder="Enter ID motorcycle" name="License_plate">
                <?php
                    }
                ?>
            </div>

            <br><br>
            <div class="clearfix">
                <button type="submit" class="signupbtn">Confirm</button>
            </div>
           
        </div>
    </div>
    </form>

</body>

</html>