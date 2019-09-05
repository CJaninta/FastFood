<!DOCTYPE html>
<html lang="en">
<!-- <------------------------------------- หน้าต่างของ Admin ------------------------------------------------------------->
<head>
    <title>รายละเอียด User</title>
    <link rel="stylesheet" href="css/lay.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/rec.css">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/his.css">
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
        <a href="Admin_restaurant-detail.php">รายละเอียดร้านอาหาร</a>
        <a href="ADmin_employee-detail.php">ข้อมูลพนักงาน</a>
        <form  action="logout_All.php" method="POST">
            <div class="login">
               <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;">Logout</button>
            </div>
        </form>
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i> : Admin
        </div>
        </div>
    </div>
    <!-- <------------------------------------- ส่วนแสดงตาราง Restaurant ------------------------------------------------------------->
    <div class="hispaper">
    <table>
        <tr>
            <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ลำดับที่</div></th>
            <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">เลขที่ร้าน</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ชื่อร้าน</div></th>
            <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ที่อยู่</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">วันที่เริ่มสัญญา</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">วันที่หมดสัญญา</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">เบอร์โทร</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ประเภทร้าน</div></th>
        </tr>
    <?php
     require('connect.php');
    $i=1;
    $restaurant_detail_sqli = "SELECT * FROM restaurant";
    $type_restaurant_sqli ="SELECT * FROM type_of_restaurants";
    $type_restaurant_Query = mysqli_query($conn,$type_restaurant_sqli);
    $restaurant_detail_Query = mysqli_query($conn,$restaurant_detail_sqli);
    if($restaurant_detail_Query)
    {
    while($restaurant_detail_result = mysqli_fetch_array($restaurant_detail_Query))
    {
    ?>
        <tr>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $i;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_ID"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_Name"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:12px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_Address"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_Start_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_End_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $restaurant_detail_result["Restaurant_Tel"];?></td>
        <!------------------------------------------------------------------------------------- เช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
        <?php
            while($type_restaurant_result = mysqli_fetch_array($type_restaurant_Query))
            {
                 if($type_restaurant_result['Type_ID'] == $restaurant_detail_result['Type_ID'])
                {
        ?>  
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $type_restaurant_result["Type_Name_Restaurant"];?></td>
        <?php
                }
            }
        ?>
        <!------------------------------------------------------------------------------------- ปิดเช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
            <td align="center"><a href="Admin_delete-restaurant.php?Restaurant_ID=<?php echo $restaurant_detail_result["Restaurant_ID"];?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
        </tr>
    <?php
    $i=$i+1;
    }
    }
    ?>
    </div>
    <script src="js/log.js"></script>
</body>
</html>
