<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	if($_SESSION['IDcard'] == "")
	{
		echo '<script language="javascript">';
		echo "alert('Please Login!')";
		echo '</script>';
		?>
		<a href="index.php"><font size="50">กลับไปยังหน้าแรก</font></a>
	<?php
		die;
	}
	?>
<head>
    <title>ลงทะเบียน</title>
    <link rel="stylesheet" href="css/lay.css">
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
        <a href="index.php">หน้าแรก</a>
        <a href="promotion.php">โปรโมชั่น</a>
        <a href="his.php">ประวัติการสั่ง</a>
        <a href="user_account.php">บัญชี</a>
        <form  action="http://localhost/food/login.php" method="POST">
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i>
           <?php
              echo ("User : ").$_SESSION['First_name'];
           ?>
        </div>
        </form>
    </div>
    <form action="Edit_Detail_Customer.php" method="POST">
    	<!------------------------------------------------------------------- ส่วนแสดงรายละเอียดของผู้ใชงาน --------------------------------------------------------------->
    <div class="log">
        <div class="log1">
                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                    <h1> ข้อมูลส่วนตัว</h1>
                    <hr>
                    <label for="fname"><b><i style='font-size:24px' class='fas'>&#xf2bd;</i> ชื่อ      : <?php echo $_SESSION["First_name"];?></b></label><br><br>
                    <label for="lname"><b><i style='font-size:24px' class='far'>&#xf2bd;</i> นามสกุล  : <?php echo $_SESSION["Last_name"];?></b></label><br><br>
                    <label for="email"><b><i style='font-size:24px' class='far'>&#xf0e0;</i> Email   : <?php echo $_SESSION["Email"];?></b></label><br><br>
                    <label for="tel"><b><i style='font-size:24px' class='fas'>&#xf095;</i> เบอร์โทร   : <?php echo $_SESSION["Tel"];?></b></label><br><br>
             

                </div>

        </div>
        <div class="log1">

            <div class="container" style="border:3px solid rgb(245, 217, 93)">
                <label for="idcard"><b><i style='font-size:24px' class='far'>&#xf2c2;</i>
                        เลขที่บัตรประชาชน : <?php echo $_SESSION["IDcard"];?></b></label><br><br>
                <label for="add"><b><i style="font-size:24px" class="fa">&#xf2bc;</i> ที่อยู่ : <?php echo $_SESSION["Address"];?></b></label><br><br>
            </div>
            <!------------------------------------------------------------------- จบส่วนแสดงรายละเอียดของผู้ใชงาน --------------------------------------------------------------->
            <br><br>

            <!------------------------------------------------------------------- ปุ่มแก้ไขรายละเอียดผู้ใช้งาน --------------------------------------------------------------->
            <div class="clearfix">
                <button type="submit" class="signupbtn">แก้ไขรายละเอียด</button>
            </div>
            <!------------------------------------------------------------------- จบปุ่มแก้ไขรายละเอียดผู้ใช้งาน --------------------------------------------------------------->
           
        </div>
    </div>
    </form>

</body>

</html>