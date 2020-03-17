<!DOCTYPE html>
 <?php
    session_start(); 
    ob_start();
    require('connect.php');
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
        <center><a href="index.php"><img src="img/logo.png" width="230" height="230"></a></center>
    </div>

    <div class="topnav">
        <a href="index.php">หน้าแรก</a>
        <a href="promotion.php">โปรโมชั่น</a>
        <a href="cus_his.php">ประวัติการสั่ง</a>
        <a href="user_account.php">บัญชี</a>


        <?php   // <------------------------------------- เช็คเงื่อนไขตอน Login กรณียังไม่ได้ Login  ----------------------------------------------->
        if($_SESSION['IDcard'] == "" and $_SESSION['First_name'] != 'Admin')
        {
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
        else if($_SESSION['Status'] == "User" )
        { 
        ?>
        <form  action="logout_All.php" method="POST">
            <div class="login">
               <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
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
        else if($_SESSION['First_name'] == 'Admin')
        {
            
          header( "location: http://localhost/food/Admin_user-detail.php" );
        }
        else if($_SESSION['Status'] == "Employee")
        {

            header( "location: http://localhost/food/Employee-work.php" );
        }
    ?>
    </div>
    <div class="cat">
        <h1>หมวดหมู่ <i style='font-size:35px' class='fas'>&#xf002;</i></h1>
        <span class="produ">
            <a href="type/japan/japan.php"><img src="img/f1.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/japan/japan.php'">
                <span1 style = "font-size:25px;">อาหารญี่ปุ่น</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/dessert/des.php"><img src="img/f2.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle;" onclick="window.location.href='type/dessert/des.php'">
                <span1 style = "font-size:25px;">ของหวาน</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/order_street/orderfood.php"><img src="img/f3.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/order_street/orderfood.php'">
                <span1 style = "font-size:25px;">อาหารตามสั่ง</span1>
            </button>
        </span>
        <span class="produ">
            <a href="type/fastfood/fast.php"><img src="img/f4.jpg" width="100%" height="50%"></a><br><br>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='type/fastfood/fast.php'">
                <span1 style = "font-size:25px;">ฟาสต์ฟู้ด</span1>
            </button>
        </span>
    </div>
    <div class="paper">
        <h1>
            ร้านแนะนำ <i style='font-size:35px' class='fas'>&#xf005;</i>
            <i style='font-size:35px' class='fas'>&#xf005;</i>
            <i style='font-size:35px' class='fas'>&#xf005;</i>
        </h1>
        <?php
         $perpage = 4;
            if(isset($_GET['page']))
                {
                     $page = $_GET['page'];
                } 
                else 
                {
                    $page = 1;
                }
                     $start = ($page - 1) * $perpage;
        $rec = "SELECT * FROM `recommend_of_ restaurants` limit {$start},{$perpage}";
        $objrec = mysqli_query($conn,$rec);
           
            $res_id = array();
            $i = 0;

            while($obj1 = mysqli_fetch_array($objrec))
            {
                $res_id[$i] = $obj1['Restaurant_ID'];
                $i++;
            }

            $res_name = array();
            $resadd = array();
            $res_type = array();
            $reccom_type = array();
            $i = 0;
            $j = 0;
            $res = "SELECT * FROM `restaurant`";
            $objres = mysqli_query($conn,$res);
            while($obj0 = mysqli_fetch_array($objres))
            {
                if($res_id[$i] == $obj0['Restaurant_ID'])
                {
                    $res_name[$i] = $obj0['Restaurant_Name'];
                    $res_add[$i] = $obj0['Restaurant_Address'];
                    $res_type[$i] =	$obj0['Type_ID'];
                    $type = "SELECT * FROM `type_of_restaurants`";
                    $objty = mysqli_query($conn,$type);
                    while($obj5 = mysqli_fetch_array($objty))
                    {
                        if($res_type[$i] == $obj5['Type_ID'])
                        {
                            $reccom_type[$j] =	$obj5['Type_Name_Restaurant'];
                            $j++;
                        }
                    }
                    $i++;
                }
            }
          
            /*$reccom_type = array();
            $i = 0;
            $type = "SELECT * FROM `type_of_restaurants`";
            $objty = mysqli_query($conn,$type);
            while($obj5 = mysqli_fetch_array($objty))
            {
                if($res_type[$i] == $obj5['Type_ID'])
                {
                    $reccom_type[$i] =	$obj5['Type_Name_Restaurant'];
                    $i++;
                    echo $i;
                }
            }*/

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

            $menu = "SELECT * FROM `menu_foods` ";
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
        $rec = "SELECT * FROM `recommend_of_ restaurants` limit {$start},{$perpage}";
        $objrec = mysqli_query($conn,$rec);
        while($obj1 = mysqli_fetch_array($objrec))
        {

        ?>
        <span class="rec1">
        <br>
            <img src="<?php echo $menu_img[$i]?>" width="100%" height="220">
        </span>
        <span class="rec1">
            <h2><?php echo $res_name[$i];?></h2>
            <ad><?php echo $res_add[$i];?></ad>
            <h3><i style='font-size:15px' class='fas'>&#xf02b;</i> <?php echo $reccom_type[$i];?></h3>
            <button class="bt bt1" style="vertical-align:middle" onclick="window.location.href='menu/<?php echo $res_id[$i];?>'">
                <span1>เมนู</span1>
            </button>
        </span>
        <?php
        $i++;
        }
?>
</div>
<center><div style="; 
    font-family: 'Kanit', sans-serif;
    font-size: 22px;
    font-weight: 700;
    position: relative;">
    <?php
         $sql2 = "SELECT * FROM `recommend_of_ restaurants` ";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="index.php" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>
</div></center>
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