<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://localhost/food/css/lay.css">
    <link rel="stylesheet" href="http://localhost/food/css/log.css">
    <link rel="stylesheet" href="http://localhost/food/css/type.css">
    <link rel="stylesheet" href="http://localhost/food/css/menu.css">
    <link rel="stylesheet" href="http://localhost/food/css/rec.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php // แก้ชื่อประเภท *******************************************************************************************************?>
    <title>ฟาสต์ฟู้ด</title>
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
        <?php
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

            $type = "SELECT * FROM `type_of_restaurants`";
            $res = "SELECT * FROM `restaurant` WHERE `Type_ID` = '4' limit {$start},{$perpage}";

            $objt = mysqli_query($conn,$type);
            $objres = mysqli_query($conn,$res);
            while($obj = mysqli_fetch_array($objt))
            {
               // แก้ชื่อประเภท *******************************************************************************************************
                if($obj['Type_Name_Restaurant'] == 'ฟาสต์ฟู้ด')
                {
                    $type_id = $obj['Type_ID'];
                }
            }
            $res_id= array();
            $i  = 0;

            while($obj1 = mysqli_fetch_array($objres))
            {
                if($obj1['Type_ID'] == $type_id)
                {
                    $res_id[$i] = $obj1['Restaurant_ID'];
                    $i++;
                }
            }

            $menu_res = "SELECT * FROM `menu_foods_on_restaurant_composite_entity`";
            $objmenu_res = mysqli_query($conn,$menu_res);
            $menu_id = array();
            $i = 0;
            while($obj2 = mysqli_fetch_array($objmenu_res))
            {
                if($res_id[$i] == $obj2['Restaurant_ID'])
                {
                    $menu_id[$i] = $obj2['Menu_ID'];
                    $i++;
                }
            }

            $menu = "SELECT * FROM `menu_foods`";
            $objmenu = mysqli_query($conn,$menu);
            $menu_img = array();
            $i = 0;

            while($obj3 = mysqli_fetch_array($objmenu))
            {
                if($menu_id[$i] == $obj3['Menu_ID'])
                {
                    $menu_img[$i] = $obj3['Menu_img'];
                    $i++;
                }
            }
        
            $i = 0;

    $objres2 = mysqli_query($conn,$res);
    ?>
    <div class="tpaper">
    <?php // แก้ชื่อประเภท *******************************************************************************************************?>
    <h1><i style='font-size:40px' class='fas'>&#xf02b;</i> ฟาสต์ฟู้ด</h1>
    <?php
     while($obj5 = mysqli_fetch_array($objres2))
    {
        if($obj5['Type_ID'] == $type_id)
        {
        ?>
        <div class="tbox">
            <img src="<?php echo $menu_img[$i] ?>" width="100%" height="220">
        </div>
        <div class="tbox">
            <h2><?php echo $obj5['Restaurant_Name']?></h2>
            <h3><?php echo $obj5['Restaurant_Address']?></h3>
            <button class="btmm btmm1" style="vertical-align:middle"
                onclick="window.location.href='http://localhost/food/menu/<?php echo $obj5['Restaurant_ID']?>'">
                เมนู
            </button>
            <?php
               $rec = "SELECT * FROM `recommend_of_ restaurants`";
               $objrec = mysqli_query($conn,$rec);
               $rec_id = 0;
               while($obj4 = mysqli_fetch_array($objrec))
               {
                   if($obj5['Restaurant_ID'] == $obj4['Restaurant_ID'])
                   {
                       $rec_id = 1;
                   }
               }
               if($rec_id > 0)
               {
            ?>
            <h4 style="display: inline"><i class="material-icons"
                style='font-size:20px;color: rgb(29, 192, 7)'>stars</i>ร้านแนะนำ</h4>
            <?php
               }
            ?>
        </div>
        <?php
               $i++;
                }
            }
        ?>
     
    </div>
    <?php
        
        $sql2 = "SELECT * FROM `restaurant` WHERE Type_ID = '2'";
        $query2 = mysqli_query($conn, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
       ?>
       
   <center>
       <nav style = " font-family: 'Kanit', sans-serif;
                  font-size: 22px;
                  font-weight: 700;">
        <a href="http://localhost/food/type/dessert/des.php" aria-label="Previous">
        <span aria-hidden="true" >First</span>
        </a>
        
        <?php 
        for($i=1;$i<=$total_page;$i++){ ?>
        <a href="http://localhost/food/type/dessert/des.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        <a href="http://localhost/food/type/dessert/des.php?page=<?php echo $total_page;?>" aria-label="Next">
        <span aria-hidden="true">Last</span>
        </a>
        </ul>
       </nav>

   </center>
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
                    <buttonl type="button" onclick="window.location.href='register.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
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
                    <buttonl type="button" onclick="window.location.href='register2.php'" style="background-color: rgb(255, 0, 0);">Sign Up</buttonl>
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