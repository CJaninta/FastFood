<!DOCTYPE html>
<?php
    session_start(); 
    if($_SESSION['IDcard'] == "")
	 {
     ?>
     <script>
       if (confirm("กรุณาเข้าสู่ระบบ")) {
         window.location="index.php"; 
      }
     </script>
     <?php
	 }
?>
<html lang="en">

<head>
    <title>Fast Food</title>
    <link rel="stylesheet" href="http://localhost/food/css/lay.css">
    <link rel="stylesheet" href="http://localhost/food/css/body.css">
    <link rel="stylesheet" href="http://localhost/food/css/rec.css">
    <link rel="stylesheet" href="http://localhost/food/css/log.css">
    <link rel="stylesheet" href="http://localhost/food/css/his.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

    <div class="header">
        <center><a href="index.php"><img src="http://localhost/food/img/logo.png" width="230" height="230"></a></center>
    </div>

    <div class="topnav">
        <a href="index.php">หน้าแรก</a>
        <a href="promotion.php">โปรโมชั่น</a>
        <a href="cus_his.php">ประวัติการสั่ง</a>
        <a href="user_account.php">บัญชี</a>
        <?php // <------------------------------------- เช็คเงื่อนไขตอน Login กรณี Login แล้ว ----------------------------------------------->
        ?>
        <form  action="http://localhost/food/logout_All.php" method="POST">
            <div class="login">
                <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;"><i class='fas fa-sign-out-alt' style='font-size:17px'></i> Logout</button>
            </div>
        </form>
        <?php
        ?>
        <form  action="http://localhost/food/login.php" method="POST">
        <div class="logtext" style = "color:rgb(29, 24, 78);">
            <i class="fa fa-user" style="font-size:20x"></i>
           <?php
              echo ("User : ").$_SESSION['First_name'];
           ?>
        </div>
        </form>
    </div>
    
    <div class="hispaper">
        <center>
             <h2 style="float:left"><i class='fas fa-history' style='font-size:48px'></i> ประวัติการสั่ง </h2>
         </center><br><br><br><br><br>
<table>
  <tr>
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ลำดับรายการ</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">รายการอาหาร</div></th>
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">จำนวน</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ราคารวมทั้งหมด</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ผู้ส่ง</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">วันที่สั่งซื้อ</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">สถานะการส่ง</div></th>
  </tr>
  <tr>
  <?php
     require('connect.php');
      $perpage = 5;
            if(isset($_GET['page']))
                {
                     $page = $_GET['page'];
                } 
                else 
                {
                    $page = 1;
                }
                     $start = ($page - 1) * $perpage;
     $cus = 'SELECT First_name,Customer_ID FROM `customer`';
     $em = 'SELECT Employee_ID,First_name,Tel FROM `employee`';
     $or = "SELECT * FROM `order` WHERE `Customer_ID` = '".$_SESSION['Customer_ID']."' limit {$start},{$perpage} ";

     $objcus = mysqli_query($conn,$cus);
     $objem = mysqli_query($conn,$em);
     $objor = mysqli_query($conn,$or);

     if($objor){
     $order_id = array();
     $order_date = array();
     $order_em = array();
     $order_status =array();
     $promotion;
     $i = 0;

     while($obj = mysqli_fetch_array($objor))
     {
         if($obj['Customer_ID'] == $_SESSION['Customer_ID'])
         {
             $order_id[$i] = $obj['Order_ID'];
             $i++;
         }
     }

     $menu = 'SELECT * FROM `menu_on_order_composite_entity`';
     $objmenu = mysqli_query($conn,$menu);

     $me = "SELECT * FROM `menu_foods`";

     $i = 0;
     $ori = 0;

     $menu_id = array();
     $menu_name = array();
     $objor = mysqli_query($conn,$or);
     while($obj5 = mysqli_fetch_array($objor))
     {
         if($obj5['Order_ID'] == $order_id[$ori])
         {
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"><?php echo $start+$ori+1;?></div></td>
            <?php
            $objmenu = mysqli_query($conn,$menu);
            $me_i = 0;
            while($obj6 = mysqli_fetch_array($objmenu))
            {
                if($obj5['Order_ID'] == $obj6['Order_ID'])
                {
                    $menu_id[$me_i] = $obj6['Menu_ID'];
                    $menu_total[$me_i] =  $obj6['Total'];
                    $menu_amount[$me_i] = $obj6['Menu_Amount'];
                    $me_i++;
                }
            }
            $objme = mysqli_query($conn,$me);
            $me_i = 0;
            while($obj7 = mysqli_fetch_array($objme))
            {
                if($obj7['Menu_ID'] == $menu_id[$me_i])
                {
                    date_default_timezone_set("Asia/Bangkok");
                    $day = date("Y-m-d");

                   
                    $menu_name[$me_i] = $obj7['Menu_Name'];
                    $me_i++;
                }
            }

            $objem = mysqli_query($conn,$em);
            while($obj8 = mysqli_fetch_array($objem))
            {
                if($obj5['Employee_ID'] == $obj8['Employee_ID'])
                {
                    $order_em = $obj8['First_name'];
                    $tel = $obj8['Tel'];
                    $employee_working = $obj8['Employee_ID']; // ^^; eiei
                }
            }
            $order_status = $obj5['Order_Status'];
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php
            for($j=0;$j<$me_i;$j++)
            {
                echo $menu_name[$j];?><br><br><?php
            }
            ?>
            <br><br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php 
            for($j=0;$j<$me_i;$j++)
            {
                echo $menu_amount[$j];?><br><br><?php
            }
            ?>
            <br><br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php 
            for($j=0;$j<$me_i;$j++)
            {
                echo number_format($menu_total[$j], 2 )."";?><br><br><?php
            }
            $total =0;
            for($j=0;$j<$me_i;$j++)
            {
               $total += $menu_total[$j];
            }
            ?><div style = "color:rgb(106, 90, 205)"><?php
            echo "รวมทั้งหมด"." ".number_format($total, 2 )." "."บาท";?><br></div><?php
            ?>
            <br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"> <?php  echo $order_em;?><br><span style = "color:grey"><?php  echo $tel;?></span></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"><?php echo $obj5['Order_date_time'];?></div></td>
            <?php
            if($order_status=="กำลังส่ง"){
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:blue;"><?php echo ($order_status);?></td>
            <td align="center"><a href="update_status_order.php?Order_date_time=<?php $_SESSION["Order_Status"]=$order_status;$_SESSION["Employee_Working"]= $employee_working;echo $obj5['Order_date_time'];?>" style ="color:red"> ยกเลิก</a></td>
            <?php
            }
            else if($order_status=="จัดส่งแล้ว" )
            {
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:green;"><?php echo ($order_status);?></td>
            <?php
            }
            else
            {
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:red;"><?php echo ($order_status);?></td>
            <?php
            }
            ?>
            </tr>     
            <?php
            $menu_id =null;
            $promotion = null;
            $ori++;
         }

     }
?>

</table>
<center>
<?php
$sql2 = "SELECT * FROM `order` WHERE Customer_ID = '".$_SESSION['Customer_ID']."'";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="cus_his.php" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="cus_his.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="cus_his.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>
        </center>
         <?php } ?>
</div>

</body>

</html>