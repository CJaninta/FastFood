<?php
    session_start();
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- <------------------------------------- หน้าต่างของ Admin ------------------------------------------------------------->
<?php
    if($_SESSION['Status'] == 'Employee')
    {
?> 
<head>
    <title>กำลังดำเนินงาน</title>
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
        <a href="Employee-work.php">กำลังดำเนินงาน</a>
        <a href="Employee-detail.php">ข้อมูลส่วนตัวพนักงาน</a>
        <a href="Employee-work_history.php">ประวัติการส่งงาน</a>
        <form  action="logout_All.php" method="POST">
            <div class="login">
                <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
            </div>
        </form>
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            Employee :
            <?php
              unset($_SESSION['check']);
              echo $_SESSION["First_name"];
           ?>
        </div>
    </div>
<!---------------------------------------------------------------------------------------------------------------- เปิด รายละเอียดการจัดสั่ง ----------------------------------------------------------------------------->
  </div>
    <?php
       $sql = "SELECT * FROM `order` WHERE Employee_ID = '".$_SESSION['Employee_ID']."' AND Order_Status = 'กำลังส่ง'";
       $Query = mysqli_query($conn,$sql);
       $num = mysqli_num_rows($Query);
       $emp = $_SESSION['Employee_ID'];
       if($num != 0)
       {
    ?>

       <div class = "hispaper"><center><h2><i class='fas fa-user-alt' style='font-size:36px'></i> กำลังดำเนินงาน</h2>
        <div class="map">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1LKZ1qKAfhB6eo_Yf3jw9oiTLG9zERE36" callback=initMap width=100% height="480"></iframe>
        <table>
        <tr>
          <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ร้าน</div></th>
          <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ที่อยู่ร้าน</div></th>
          <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">รายการออเดอร์</div></th>
          <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">จำนวน</div></th>
          <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ราคา</div></th>
          <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">เบอร์โทรร้าน</div></th>
          <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ลูกค้า</div></th>
          <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ที่อยู่ลูกค้า</div></th>
          <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">เบอร์โทรลูกค้า</div></th>
        </tr>
        <?php
        $sql1 = "SELECT * FROM `order`";
        $Query1 = mysqli_query($conn,$sql1);
    
        while($obj = mysqli_fetch_array($Query1))
        {
            if($obj['Employee_ID'] == $emp AND $obj['Order_Status'] == 'กำลังส่ง')
            {
                $order_id = $obj['Order_ID'];
                $cus = $obj['Customer_ID'];
            }
        }
        $cuspp = "SELECT * FROM `customer`";
        $objcus = mysqli_query($conn,$cuspp);

        while($obj9 = mysqli_fetch_array($objcus))
        {
            if($obj9['Customer_ID'] == $cus)
            {
                $cus_name = $obj9['First_name']." ".$obj9['Last_name'];
                $cus_ad = $obj9['Address'];
                $tel = $obj9['Tel'];
            }
        }
        $menu = "SELECT * FROM `menu_on_order_composite_entity`";
        $objme = mysqli_query($conn,$menu);
        $menu_amount = array();
        $total = array();
        $i = 0;
        $mi = 0;
        while($obj = mysqli_fetch_array($objme))
        {
            if($order_id == $obj['Order_ID'])
            {
                $menu_id[$i] = $obj['Menu_ID'];
                $menu_amount[$i] = $obj['Menu_Amount'];
                $total[$i] = $obj['Total'];
                $res = "SELECT * FROM `menu_foods_on_restaurant_composite_entity`";
                $objres = mysqli_query($conn,$res);
                while($obj2 = mysqli_fetch_array($objres))
                {
                    if($menu_id[$i] == $obj2['Menu_ID'])
                    {
                        $res = $obj2['Restaurant_ID'];
                    }
                }
            $i++;

            }
        }

        $menu_n = "SELECT * FROM `menu_foods`";
        $objme_n = mysqli_query($conn,$menu_n);
        $menu_name =array();
        while($obj3 = mysqli_fetch_array($objme_n))
        {
            if($obj3['Menu_ID'] == $menu_id[$mi])
            {
                $menu_name[$mi] = $obj3['Menu_Name'];
                $mi++;
            }
        }
        $res_n = "SELECT * FROM `restaurant`";
        $objres_n = mysqli_query($conn,$res_n);
        while($obj6 = mysqli_fetch_array($objres_n))
        {
            if($obj6['Restaurant_ID'] == $res)
            {
                $res_name = $obj6['Restaurant_Name'];
                $res_add = $obj6['Restaurant_Address'];
                $res_tel = $obj6['Restaurant_Tel'];
            }
        }
        ?>
        <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"><?php echo $res_name;?></div></td>
        <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res_add;?></div></td>
        <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center">
        <?php
        $j = 0;
            for($j = 0;$j<$mi;$j++)
            {
                echo $menu_name[$j];?><br><br><?php
            }
            ?>
         </div></td>
        
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center">
            <?php
            $j = 0;
            for($j = 0;$j<$i;$j++)
            {
                echo $menu_amount[$j];?><br><br><?php
            }
            ?>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center">
            <br><br>

            <?php
            $j = 0;
            $tr = 0;
            for($j = 0;$j<$i;$j++)
            {
                $tr+=($total[$j]*$menu_amount[$j]);
                echo number_format($total[$j],2);?><br><br><?php
            }
            $j = 0;
            ?>
            <h4 style = "font-size:15px">รวมทั้งหมด : <?php echo number_format($tr,2)?> บาท</h4>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res_tel;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $cus_name;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $cus_ad;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $tel;?></div></td>
   
        <form action="update_status_order.php">
        <div>
             <button type="submit" class="signupbtn" 
             style = 
                     "font-family: 'Kanit', sans-serif;
                      font-size: 25px;
                      font-weight: 500;
                      border-radius: 20px;
                      background-color: rgb(41, 172, 5);
                      border: 5px solid rgb(41, 172, 5);
                      padding: 10px 30px;
                      color:white;
             ">ส่งของ</button>
        </div>
        </form>
        <br>
       <?php
        }
       else
       {
    ?>
     <div class="hispaper">
    <center><h2 style="color:gray">ไม่มีการสั่งออเดอร์</h2>
    </center>
    <?php
       }
    ?>
    <!---------------------------------------------------------------------------------------------------------------- เปิด รายละเอียดการจัดสั่ง ----------------------------------------------------------------------------->
    </table>
    </center>
</div>
</body>
<?php
}
close($conn);
?>