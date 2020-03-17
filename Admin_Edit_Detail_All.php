<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    require 'connect.php';
    unset($_SESSION["Restaurant_ID"]);
    unset($_SESSION["Promotion_ID"]);
    unset($_SESSION["Menu_ID"]);
    $_SESSION["Restaurant_ID"] = $_REQUEST["Restaurant_ID"];
    $_SESSION["Promotion_ID"] = $_REQUEST["Promotion_ID"];
    $_SESSION["Menu_ID"] = $_REQUEST["Menu_ID"];
?>
<head>
    <title>แก้ไขข้อมูล</title>
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
        <a href="ADmin_employee-detail.php">ข้อมูลพนักงาน</a>
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
    <!--------------------------------------------------------------------------------------เปิดกรณี$_SESSION['check'] ส่งมาจาก Restaurant----------------------------------------------------------------------------------------------->
    <?php
        if($_SESSION['check'] == "Restaurant")
        {
    ?>
    <form action="Admin_update_All.php" method="POST">
    <div class="log">
        <div class="log1">
                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                   <h1> Edit restaurant information</h1>
                
                    <hr>
                    <?php
                    $res = "SELECT * FROM `restaurant`";
                    $objres = mysqli_query($conn,$res);
                    while($obj = mysqli_fetch_array($objres))
                    {
                        if($obj['Restaurant_ID'] == $_SESSION["Restaurant_ID"])
                        {
                            $res_name = $obj['Restaurant_Name'];
                        }
                    }
                    ?>
                    <label for="fname"><b><i class='fas fa-file-alt' style='font-size:24px'></i> ชื่อร้าน (<?php echo $res_name ?>)</b></label>
                    <input type="text" placeholder="Enter Restaurant name" name="Resname">

                    <label for="lname"><b><i class='far fa-address-card' style='font-size:24px'></i> ที่อยู่ร้าน</b></label>
                    <input type="text" placeholder="Enter Address" name="Resaddress">

                    <label for="idcard"><b><i style='font-size:24px' class='fas'>&#xf095;</i>
                        เบอร์โทรร้าน</b></label>
                    <input type="text" placeholder="Enter Telephone number" name="Restel">
                    


                </div>

        </div>
        <div class="log1">

            <div class="container" style="border:3px solid rgb(245, 217, 93)">
            <label for="email"><b><i class='fas fa-calendar-alt' style='font-size:24px'></i> วันที่เริ่มสัญญา</b></label><br><br>
                    <input name = "Resstart_contract" type = "date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;"><br><br>

                    <label for="email"><b><i class='fas fa-calendar-alt' style='font-size:24px'></i> วันที่สิ้นสุดสัญญา</b></label><br><br>
                    <input name = "Resend_contract" type = "date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;"><br><br> 

                <label for="add"><b><i class='fas fa-sort-alpha-up' style='font-size:24px'></i> ประเภทร้าน</b></label>
                <input type="text" placeholder="Enter Type" name="Restype">
            </div>

            <br><br>
            <div class="clearfix">
                <button type="submit" class="signupbtn">Confirm</button>
            </div>
           
        </div>
    </div>
    </form>
    <!--------------------------------------------------------------------------------------ปิดกรณี$_SESSION['check'] ส่งมาจาก Restaurant----------------------------------------------------------------------------------------------->

    <!--------------------------------------------------------------------------------------เปิดกรณี$_SESSION['check'] ส่งมาจาก Menu----------------------------------------------------------------------------------------------------->
    <?php
        }
        else if($_SESSION['check'] == "Menu")
        {
            $menu = "SELECT * FROM `menu_foods`";
            $objmenu = mysqli_query($conn,$menu);
            while($obj = mysqli_fetch_array($objmenu))
            {
                if($obj['Menu_ID'] == $_SESSION["Menu_ID"])
                {
                    $menu_name = $obj['Menu_Name'];
                    $menu_price = $obj['Menu_Price'];
                    $menu_img = $obj['Menu_img'];
                }
            }
    ?> 
        <form action="Admin_update_All.php" method="POST">
            <div class="log">
                 <div class="log1">
                    <div class="container" style="border:3px solid rgb(245, 217, 93)">
                         <h1> Edit food information</h1>
                
                         <hr>

                        <label for="fname"><b><i class='fas fa-file-alt' style='font-size:24px'></i> ชื่อเมนู <span style = "color:gray">(<?php echo $menu_name?>)</span></b></label>
                        <input type="text" placeholder="Enter Menu name" name="Menuname">

                        <label for="email"><b><i class='fas fa-dollar-sign' style='font-size:24px'></i> ราคา <span style = "color:gray">(<?php echo $menu_price?> บาท)</span></b></label>
                        <input type="text" placeholder="Enter Menu Price" name="Menutotal">

                    </div>

                </div>
             <div class="log1">

                <div class="container" style="border:3px solid rgb(245, 217, 93)">

                    <label for="idcard"><b><i class="fa fa-picture-o" style="font-size:24px"></i>
                        รูปภาพ</b></label><br><br>
                    <img src = "<?php echo $menu_img?>" width="200px" height="150px" ><br><br>
                    <input type="file" placeholder="Enter Image" name="Menuimage">

                </div>
                <br>
                 <div class="clearfix">
                    <button type="submit" class="signupbtn">Confirm</button>
                </div>
           
            </div>
        </div>
    </form>
    <!--------------------------------------------------------------------------------------ปิดกรณี$_SESSION['check'] ส่งมาจาก Menu----------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------เปิดกรณี$_SESSION['check'] ส่งมาจาก Promotion------------------------------------------------------------------------------------------------>
    <?php
        }
    else if($_SESSION['check'] == "Promotion")
        {
            $pro = "SELECT * FROM `promotion`";
            $objpr = mysqli_query($conn,$pro);
            while($obj = mysqli_fetch_array($objpr))
            {
                if($obj['Promotion_ID'] == $_SESSION["Promotion_ID"])
                {
                    $menu_id = $obj['Menu_ID'];
                }
            }
            $menu = "SELECT * FROM `menu_foods`";
            $objme = mysqli_query($conn,$menu);
            while($obj1 = mysqli_fetch_array($objme))
            {
                if($menu_id == $obj1['Menu_ID'])
                {
                    $menu_name = $obj1['Menu_Name'];
                    $menu_img = $obj1['Menu_img'];
                }
            }
    ?>
        <form action="Admin_update_All.php" method="POST">
    <div class="log">
        <div class="log1">
                <div class="container" style="border:3px solid rgb(245, 217, 93)">
                   <h1> Edit promotion information</h1>
                
                    <hr>
                    <h3><?php echo $menu_name;?></h3>
                    <img src = "<?php echo $menu_img;?>" width="180" height="100"><br>

                </div>

        </div>
        <div class="log1">

            <div class="container" style="border:3px solid rgb(245, 217, 93)">

            <label for="fname"><b>% เปอร์เซ็นต์ที่ลด</b></label>
            <input type="text" placeholder="Enter Discount" name="Discount">

            <label for="email"><b><i class='fas fa-calendar-alt' style='font-size:24px'></i> วันที่เริ่มสัญญา : </b></label>
            <input type="date" placeholder="Enter Start Contract" name="Start_date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;">
            <br><br>
            <label for="tel"><b><i class='far fa-calendar-alt' style='font-size:24px'></i> วันที่สิ้นสุดสัญญา : </b></label>
            <input type="date" placeholder="Enter End Contract" name="Stop_date" style = "height:30px;width : 31%;font-size : 20px;border: 2px solid rgb(245, 217, 93);border-radius:10px;color :rgb(8, 60, 173);font-family: 'Kanit', sans-serif;">
            </div>

            <br><br>
            <div class="clearfix">
                <button type="submit" class="signupbtn">Confirm</button>
            </div>
           
        </div>
    </div>
    </form>
    <!--------------------------------------------------------------------------------------ปิดกรณี$_SESSION['check'] ส่งมาจาก Promotion------------------------------------------------------------------------------------------------>
    <?php
        }
        session_write_close();
    ?>

</body>

</html>