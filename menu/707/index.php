<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://localhost/food/css/lay.css">
    <link rel="stylesheet" href="http://localhost/food/css/log.css">
    <link rel="stylesheet" href="http://localhost/food/css/menu.css">
    <link rel="stylesheet" href="http://localhost/food/css/body.css">
    <link rel="stylesheet" href="http://localhost/food/css/rec.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php // แก้ชื่อเป็นชื่อร้าน *******************************************************************************************************?>
    <title>Burger King</title>
</head>

<body>
    <div class="header">
        <center><a href="http://localhost/food/index.php"><img src="http://localhost/food/img/logo.png"
                    width="230" height="230"></a></center>
    </div>

    <div class="topnav">
        <a href="http://localhost/food/index.php">หน้าแรก</a>
        <a href="http://localhost/food/promotion.php">โปรโมชั่น</a>
        <a href="http://localhost/food/cus_his.php">ประวัติการสั่ง</a>
        <a href="http://localhost/food/user_account.php">บัญชี</a>
        <?php   // <------------------------------------- เช็คเงื่อนไขตอน Login กรณียังไม่ได้ Login  ----------------------------------------------->
        if($_SESSION['IDcard'] == "")
        { echo $_SESSION['IDcard'];
        ?>
        <div class="login">
            <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class='fas fa-user-tie' style='font-size:17.5px'></i> พนักงาน</a>
        </div>
        <div class="login">
            <a onclick="document.getElementById('idf').style.display='block'" style="width:auto;"><i class='fas fa-user-alt' style='font-size:15px'></i> ผู้ใช้บริการ</a>
        </div>
        <div class="logtext">
            Login
        </div>
        <!-- <-------------------------------------ปิดเช็คเงื่อนไขตอน Login กรณียังไม่ได้ Login ---------------------------------------------------> 

        <?php // <------------------------------------- เช็คเงื่อนไขตอน Login กรณี Login แล้ว ----------------------------------------------->
        }
        else
        { 
        ?>
        <form  action="http://localhost/food/logout_All.php" method="POST">
            <div class="login">
                <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
            </div>
        </form>
        <form  action="http://localhost/food/login.php" method="POST">
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i>
           <?php
              echo ("User : ").$_SESSION['First_name'];
           ?>
        </div>
        </form>
        <?php
        }
        ?>
        <!-- <------------------------------------- ปิดเช็คเงื่อนไขตอน Login กรณี Login แล้ว ----------------------------------------------->
    </div>
    <form action="http://localhost/food/order.php" method = "POST">
    <div class="mpaper">
    <?php // แก้ชื่อเป็นชื่อร้าน *******************************************************************************************************?>
        
        <?php //เพิ่ม Menu ตรงนี้ 
        require('connect.php');
        $perpage = 6;
            if(isset($_GET['page']))
            {
                 $page = $_GET['page'];
            } 
            else 
            {
                $page = 1;
            }
                 $start = ($page - 1) * $perpage;
        $sql = "SELECT * FROM `menu_foods`";
        $objpro = mysqli_query($conn,$pro);

        //$sql = 'SELECT * FROM `menu_foods`';
        $sqcom = "SELECT * FROM `menu_foods_on_restaurant_composite_entity` WHERE Restaurant_ID = '707' limit {$start},{$perpage}";
        $res = 'SELECT * FROM `restaurant`';


        $objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
        $objcom = mysqli_query($conn,$sqcom) or die ("Error Query [".$sqcom."]");
        $objres = mysqli_query($conn,$res) or die ("Error Query [".$res."]");

        date_default_timezone_set("Asia/Bangkok");
        $day = date("Y-m-d");

        while($obj= mysqli_fetch_array($objres)){
            // ใส่ชื่อร้าน *******************************************************************************************************
            if($obj['Restaurant_ID'] == '707')
            {
                $res_name = $obj['Restaurant_Name'];
                $res_id = $obj['Restaurant_ID'];
                $res_day_st = $obj['Restaurant_Start_Contract'];
                $res_day_en = $obj['Restaurant_End_Contract'];
            }
        }
        ?>
        <h1 style="display: inline"><i style='font-size:40px' class='fas'>&#xf02b;</i><?php echo $res_name?></h1>
           <button type="submit" class="btmm btmm1" style ="float :right;padding: 15px 40px ;font-size:30px"><i class='fas fa-concierge-bell' style='font-size:36px'></i> สั่งซื้อ</button>
        <?php

        if($day <= $res_day_en && $day >= $res_day_st)
        {
        $rec = "SELECT * FROM `recommend_of_ restaurants`";
        $objrec = mysqli_query($conn,$rec) or die ("Error Query [".$rec."]");
        $rec_res = 0;
        while($objre= mysqli_fetch_array($objrec)){
            if($res_id == $objre['Restaurant_ID'])
            {
                $rec_res = 1;
            }
        }
        if($rec_res > 0)
        {
            ?>
                <h4><i class="material-icons" style='font-size:20px;color: rgb(29, 192, 7)'>stars</i>ร้านแนะนำ</h4>
            <?php
        }
        else{
            ?>
                <br><br><br>
                <?php
        }
        $menu = array();
        $i = 0;

        while($objc = mysqli_fetch_array($objcom))
        {
            if($objc['Restaurant_ID'] == $res_id)
            {
                $menu[$i] = $objc['Menu_ID'];
                $i++;
            }
        }
        $i=0;

        while($objResult = mysqli_fetch_array($objQuery))
        {
            if($objResult['Menu_ID'] == $menu[$i]){
        ?>
        <div class="mbox">
            <br>
            <img src="<?php echo $objResult['Menu_img'];?>" width="100%" height="220">
        </div>
        <div class="mbox">
            <h2><?php echo $objResult['Menu_Name'];?></h2>
            <h3 style="display: inline">ราคา</h3>
            <?php 
                $dis = 0;
                $pro = "SELECT * FROM `promotion`";
                $objpro = mysqli_query($conn,$pro);
                while($obj = mysqli_fetch_array($objpro))
                {
                    if($objResult['Menu_ID'] == $obj['Menu_ID'])
                    {
                        $dis = $obj['Discount'];
                        $day_en = $obj['Stop_date'];
                        $day_st = $obj['Start_date'];
                    }
                }
                 
                if($dis > 0 && $day <= $day_en && $day >= $day_st)
                {
                    $price = $objResult['Menu_Price']-(($dis*$objResult['Menu_Price'])/100);
                    ?>
                    <h2 style="display: inline;color:green"><?php echo number_format($price);?></h2>
                    <h3 style="display: inline">บาท</h3>
                    <h3 style="display: inline;color:green"><i class='fas fa-tags' style='font-size:20px'></i> โปรโมชั่น</h3><br><br>
                   <?php
                }
                else{
                    $price = $objResult['Menu_Price'];
                    ?>
                   <h2 style="display: inline;"><?php echo $price;?></h2>
                   <h3 style="display: inline">บาท</h3><br><br>
                   <?php
                }
            ?>
            <h3 style="display: inline">จำนวน</h3>
            <br><br>
            
              <select name=<?php echo $objResult['Menu_ID'];?> class ="btmm btmm1" style ="padding :8px 15px">
                 <option value = 0>-</option>
                 <option value = 1>1</option>
                 <option value = 2>2</option>
                 <option value = 3>3</option>
                 <option value = 4>4</option>
                 <option value = 5>5</option>
              </select>

        </div>
        <?php
              $i++;
            }
        }
         
    }
    else{
        ?>
        <center><h1>ไม่มีข้อมูลร้าน</h1></center>
        <?php
    }
    ?>
    </div>
    <?php
         $sql2 = "SELECT * FROM `menu_foods_on_restaurant_composite_entity` WHERE Restaurant_ID = '707'";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <center>
        <nav style = " font-family: 'Kanit', sans-serif;
                  font-size: 22px;
                  font-weight: 700;">
         <a href="http://localhost/food/menu/707" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="http://localhost/food/menu/707?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="http://localhost/food/menu/707?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>
        </center>
    
    </form>
    <div id="idf" class="modal">
        <form class="modal-content animate" action="http://localhost/food/login.php" method="POST">
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
                   <buttonl type="button" onclick="window.location.href='http://localhost/food/register.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                
                </div>
            </div>
        </form>
    </div>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="http://localhost/food/login2.php" method="POST">
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
                   <buttonl type="button" onclick="window.location.href='http://localhost/food/register2.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                
                </div>
            </div>
        </form>
    </div>
    <script src="http://localhost/food/js/log.js"></script>
    <script src="http://localhost/food/js/amount.js"></script>
    <?php
       mysqli_close($conn); // ปิดฐานข้อมูล
    ?>
</body>

</html>