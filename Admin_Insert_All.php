<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    unset($_SESSION["Insert"]);
    require 'connect.php';
    $_SESSION["Insert"] = $_REQUEST["Insert"];
?>
<head>
    <title>บัญชีผู้ใช้</title>
    <link rel="stylesheet" href="css/lay.css">
    <link rel="stylesheet" href="css/menu.css">
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
        <a href="Admin_user-detail.php">ข้อมูลผู้ใช้</a>
        <a href="Admin_employee-detail.php">ข้อมูลพนักงาน</a>
        <a href="Admin_restaurant-detail.php">รายละเอียดร้านอาหาร</a>
        <a href="Admin_restaurant_show_menu.php">รายละเอียดเมนูอาหาร</a>
        <a href="Admin_promotion.php">รายละเอียดโปรโมชั่น</a>
        <a href="Admin_recommend.php">ร้านแนะนำ</a>
        
        <form  action="logout_All.php" method="POST">
            <div class="login">
               <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
            </div>
        </form>
        <div class="logtext" style = "color:rgb(29, 24, 78);">
        <i class="fa fa-user" style="font-size:20x"></i> : 
            <?php 
             echo $_SESSION['First_name'];
           ?>
        </div>
    </div>
    <!--------------------------------------------------------------------------------------เปิดกรณี$_SESSION['Insert'] ส่งมาจาก Menu----------------------------------------------------------------------------------------------------->
    <?php
      if($_SESSION['Insert'] == "Menu")
        {
    ?> 
        <form action="Admin_Insert_db.php" method="POST">
            <div class="log">
                 <div class="log1">
                    <div class="container" style="border:3px solid rgb(245, 217, 93)">
                         <h1> Insert food information</h1>
                
                         <hr>
                         <label for="fname"><b><i class='fas fa-file-alt' style='font-size:24px'></i> ร้านอาหาร</b></label>
                         <br><br>
                         <?php 
                         $res = "SELECT * FROM `restaurant`";
                         $objres = mysqli_query($conn,$res);
                        ?>
              <select name="Restaurant_ID" required style ="padding :8px 15px;border:2px solid rgb(245, 217, 93);color:rgb(29, 24, 78);font-family: 'Kanit', sans-serif; font-size: 20px;">
                  <option value = 0>-</option>
               <?php
               while($obj = mysqli_fetch_array($objres)){
               ?>
                 <option value = <?php echo $obj['Restaurant_ID']; ?>><?php echo $obj['Restaurant_Name'];?></option>
                <?php
               }
               ?>
              </select> <br><br>
                        <label for="fname"><b><i class='fas fa-file' style='font-size:24px'></i> ชื่อเมนู</b></label>
                         <input type="text" placeholder="Enter Menu name" name="Menuname" required>

                    </div>

                </div>
             <div class="log1">

                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                
                     <label for="email"><b><i class='fas fa-dollar-sign' style='font-size:24px'></i> ราคา</b></label>
                     <input type="text" placeholder="Enter Menu Price" name="Menutotal" required>

                    <label for="idcard"><b><i class="fa fa-picture-o" style="font-size:24px"></i>
                        รูปภาพ</b></label><br>
                    <input type="file" placeholder="Enter Image" name="Menuimage" required>

                </div>

            <br><br>
                 <div class="clearfix">
                    <button type="submit" class="signupbtn">Confirm</button>
                </div>
           
            </div>
        </div>
    </form>
    <!--------------------------------------------------------------------------------------ปิดกรณี$_SESSION['check'] ส่งมาจาก Menu----------------------------------------------------------------------------------------------------->
    <?php
}
    else if($_SESSION['Insert'] == "Promotion")
        {
    ?> 
        <form action="Admin_Insert_db.php" method="POST">
            <div class="log">
                 <div class="log1">
                    <div class="container" style="border:3px solid rgb(245, 217, 93)">
                         <h1> Insert promotion information</h1>
                
                         <hr>

                        <label for="fname"><b><i class='fas fa-file-alt' style='font-size:24px'></i> เลขเมนู</b></label>
                         <input type="text" placeholder="Enter Menu ID" name="Menu_ID" required>

                         <label for="fname"><b>% เปอร์เซ็นต์ที่ลด</b></label>
                         <input type="text" placeholder="Enter Discount" name="Discount" required>
                    </div>

                </div>
             <div class="log1">

                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                

                    <label for="email"><b><i class='fas fa-calendar-alt' style='font-size:24px'></i> วันที่เริ่มสัญญา : </b></label>
                    <input type="date" placeholder="Enter Start Contract" name="Start_date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;" required>
                    <br><br>
                    <label for="tel"><b><i class='far fa-calendar-alt' style='font-size:24px'></i> วันที่สิ้นสุดสัญญา : </b></label>
                    <input type="date" placeholder="Enter End Contract" name="Stop_date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;" required>

                </div>

            <br><br>
                 <div class="clearfix">
                    <button type="submit" class="signupbtn">Confirm</button>
                </div>
           
            </div>
        </div>
    </form>
</body>
<?php
        }
        session_write_close();
?>
</html>
