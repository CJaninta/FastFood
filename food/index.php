<!DOCTYPE html>
 <?php
    session_start(); 
    ob_start();
 ?>
<html lang="en">
<head>
    <title>Fast Food</title>
    <link rel="stylesheet" href="css/lay.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/rec.css">
    <link rel="stylesheet" href="css/log.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

    <div class="header">
        <center><a href="index.html"><img src="img/logo.png" width="230" height="230"></a></center>
    </div>

    <div class="topnav">
        <a href="index.php">หน้าแรก</a>
        <a href="promotion.php">โปรโมชั่น</a>
        <a href="his.php">ประวัติการสั่ง</a>
        <a href="user_account.php">บัญชี</a>

        <?php   // <------------------------------------- เช็คเงื่อนไขตอน Login กรณียังไม่ได้ Login  ----------------------------------------------->
        if($_SESSION['IDcard'] == "" and $_SESSION['First_name'] != 'Admin')
        { echo $_SESSION['IDcard'];
        ?>
        <div class="login">
            <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">พนักงาน</a>
        </div>
        <div class="login">
            <a onclick="document.getElementById('idf').style.display='block'" style="width:auto;">ผู้ใช้บริการ</a>
        </div>
        <div class="logtext">
            Login
        </div>
        <!-- <-------------------------------------ปิดเช็คเงื่อนไขตอน Login กรณียังไม่ได้ Login ---------------------------------------------------> 

        <?php // <------------------------------------- เช็คเงื่อนไขตอน Login กรณี Login แล้ว ----------------------------------------------->
        }
        else if($_SESSION['First_name'] != 'Admin')
        { 
        ?>
        <form  action="logout_All.php" method="POST">
            <div class="login">
               <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;">Logout</button>
            </div>
        </form>
        
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i>
           <?php
              echo ("User : ").$_SESSION['First_name'];
           ?>
        </div>
    </div>
    <!-- <------------------------------------- ปิดเช็คเงื่อนไขตอน Login กรณี Login แล้ว ------------------------------------------------------------->
    <!--<---------------------------------------เช็คกรณีคนที่Login เป็น Admin ---------------------------------------------------------------------->
    <?php
        }
        else
        {
          header( "location: http://localhost/food/Admin.php" );
        }
    ?>
    </div>
    <div class="cat">
        <h1>หมวดหมู่ <i style='font-size:35px' class='fas'>&#xf002;</i></h1>
        <span class="produ">
            <a href="type/japan/japan.html"><img src="img/f1.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/japan/japan.html'">
                <span1>อาหารญี่ปุ่น</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/dessert/des.html"><img src="img/f2.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/dessert/des.html'">
                <span1>ของหวาน</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/order&street/orderfood.html"><img src="img/f3.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/order&street/orderfood.html'">
                <span1>อาหารตามสั่ง & สตรีทฟู้ด</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/fastfood/fast.html"><img src="img/f4.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/fastfood/fast.html'">
                <span1>ฟาสต์ฟู้ด</span1>
            </button>
        </span>
    </div>
    <div class="paper">
        <h1>
            ร้านแนะนำ <i style='font-size:35px' class='fas'>&#xf005;</i>
            <i style='font-size:35px' class='fas'>&#xf005;</i>
            <i style='font-size:35px' class='fas'>&#xf005;</i>
        </h1>
        <span class="rec1">
            <img src="img/rec/r1.jpg" width="100%" height="220">
        </span>
        <span class="rec1">
            <h2>โอยั๊วะ รีเวอร์เทอเรส</h2>
            <ad>1353 ถนนประชาราษฎร์ 1 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร </ad>
            <h3><i style='font-size:15px' class='fas'>&#xf02b;</i> อาหารตามสั่ง</h3>
            <button class="bt bt1" style="vertical-align:middle" onclick="window.location.href='menu/oyua/oyua.php'">
                <span1>เมนู</span1>
            </button>
        </span>
        <span class="rec1">
            <img src="img/rec/r2.jpg" width="100%" height="220">
        </span>
        <span class="rec1">
            <h2>ชิมไทย</h2>
            <ad>812/21 ซอย ประชาชื่น 24 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร </ad>
            <h3><i style='font-size:15px' class='fas'>&#xf02b;</i> อาหารตามสั่ง</h3>
            <button class="bt bt1" style="vertical-align:middle">
                <span1>เมนู</span1>
            </button>

        </span>
        <span class="rec1">
            <img src="img/rec/r3.jpg" width="100%" height="220">
        </span>
        <span class="rec1">
            <h2>Sushiday</h2>
            <ad>1032 ถนนประชาราษฎร์สาย1 แขวง บางซื่อ เขตบางซื่อ กรุงเทพมหานคร </ad>
            <h3><i style='font-size:15px' class='fas'>&#xf02b;</i> อาหารญี่ปุ่น</h3>
            <button class="bt bt1" style="vertical-align:middle">
                <span1>เมนู</span1>
            </button>
        </span>
        <span class="rec1">
            <img src="img/rec/r4.jpg" width="100%" height="220">
        </span>
        <span class="rec1">
            <h2>Waiting Floor</h2>
            <ad>218 วงศ์สว่าง แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร</ad>
            <br>
            <h3><i style='font-size:15px' class='fas'>&#xf02b;</i> ของหวาน</h3>
            <button class="bt bt1" style="vertical-align:middle">
                <span1>เมนู</span1>
            </button>

        </span>
    </div>
    <div id="idf" class="modal">
        <form class="modal-content animate" action="login.php" method="POST">
            <div class="log">
                <div class="log1">
                    <span onclick="document.getElementById('idf').style.display='none'" class="close"
                        title="Close">&times;</span>
                    <center><i class='fas fa-address-card' style='font-size:60px;color:rgb(255, 88, 10)'></i>   ผู้ใช้บริการ</center>
                <div class="container">
                    <label for="uname"><b><i class="material-icons" style='font-size:20px;color:rgb(5, 5, 5)'>&#xe0be;</i> Email</b></label>
                    <input type="text" placeholder="Enter Email" name="uname" required>

                    <label for="psw"><b><i class='fas fa-key' style='font-size:20px;color:rgb(12, 12, 12)'></i> Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <br><br>
                    <button type="submit" class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;">Log in</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember">  Remember me
                    </label>
                </div>
                    <br>
                    <buttonl type="button" onclick="window.location.href='register.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                
                </div>
            </div>
        </form>
    </div>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="login2.php" method="POST">
            <div class="log">
                <div class="log1">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close">&times;</span>
                    <center><i class='fas fa-address-card' style='font-size:60px;color:rgb(22, 30, 153)'></i> พนักงาน</center>
                <div class="container">
                    <label for="uname-em"><b><i class="material-icons" style='font-size:20px;color:rgb(5, 5, 5)'>&#xe0be;</i> Email</b></label>
                    <input type="text" placeholder="Enter Email" name="uname-em" required>

                    <label for="psw-em"><b><i class='fas fa-key' style='font-size:20px;color:rgb(12, 12, 12)'></i> Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw-em" required>
                    <br><br>
                    <button type="submit" class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;">Log in</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember">  Remember me
                    </label>
                </div>
                    <br>
                    <buttonl type="button" onclick="window.location.href='register2.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                
                </div>
            </div>
        </form>
    </div>
    <script src="js/log.js"></script>
</body>

</html>