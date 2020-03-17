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
    <title>ประวัติการส่งงาน</title>
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

    <div class = "hispaper"><center><h2><i class='fas fa-user-alt' style='font-size:36px'></i> ประวัติการส่งงาน </h2>
    <table>
  <tr>
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ลำดับออเดอร์</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">รายการที่ออเดอร์</div></th>
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">จำนวน</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ราคารวมทั้งหมด</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">ผู้สั่ง</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">วันที่สั่งซื้อ</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color:green">สถานะการส่ง</div></th>
  </tr>
  <tr>
  <?php
     require('connect.php');
     $i=1;
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
                    
     $or1 = "SELECT * FROM `order` WHERE `Employee_ID` = '".$_SESSION['Employee_ID']."' limit {$start},{$perpage} ";
     $objor1= mysqli_query($conn,$or1);

     if($objor1){
     $cus = 'SELECT First_name,Customer_ID,Tel FROM `customer`';
     $em = 'SELECT Employee_ID,First_name FROM `employee`';
     $or = 'SELECT * FROM `order`';

     $objcus = mysqli_query($conn,$cus);
     $objem = mysqli_query($conn,$em);
     $objor = mysqli_query($conn,$or);

     $order_menu = array();
     $order_am = array();
     $order_date = array();
     $order_total = array();
     $order_status = array();
     $order_em = array();
     $employee_working;

     $i = 0;
     $me = 0;
     $mi = 1;
     $or_i = 0;
     $or_mi = 0;
     $or_num = 0;
     while($obi = mysqli_fetch_array($objor1))
     {
         if($obi['Employee_ID'] == $_SESSION['Employee_ID'])
         {
            $employee_working = $obi['Customer_ID'];
            if($order_date[$i-1] != $obi['Order_date_time'])
            {
                $order_date[$i] = $obi['Order_date_time'];
                $i++;
            }      
         }
     }
     $objor1 = mysqli_query($conn,$or1);
     $ori = 0;
     while($obj = mysqli_fetch_array($objor1))
     {
        if($order_date[$ori] == $obj['Order_date_time'])
        {
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"><?php echo $start+$ori+1;?></div></td>
            <?php

            $objor = mysqli_query($conn,$or);
            $or_i = 0;
            $or_mi = 0;
            while($obj1 = mysqli_fetch_array($objor))
            {
                if($order_date[$ori] == $obj1['Order_date_time'])
                {
                    $or_me_composite = 'SELECT * FROM `menu_on_order_composite_entity`';
                    $objorme_composite = mysqli_query($conn,$or_me_composite);
                    while($objm_composite = mysqli_fetch_array($objorme_composite))
                    {
                        if($obj1['Order_ID'] == $objm_composite['Order_ID'])
                        {
                           $or_me = 'SELECT * FROM `menu_foods` WHERE Menu_ID = "'.$objm_composite["Menu_ID"].'"';
                           $objorme = mysqli_query($conn,$or_me);
                           $objm = mysqli_fetch_array($objorme);


                           $order_menu[$or_i] = $objm['Menu_Name'];
                           $order_am[$or_num] = $objm_composite['Menu_Amount'];
                           $order_total[$or_num] = $objm_composite['Total'];
                           $or_num++;
                           $or_i++;
                        }
                    }

                    $objcus = mysqli_query($conn,$cus);
                    while($obje = mysqli_fetch_array($objcus))
                    {
                        if($obje['Customer_ID'] == $obj['Customer_ID'])
                        {
                            $empp = $obje['First_name'];
                            $cus_tel = $obje['Tel'];
                        }
                    }
                    $order_em = $empp;
                    $order_status = $obj['Order_Status'];
                    $or_mi++;
                }
            }
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php
            for($j=0;$j<$or_i;$j++)
            {
                echo $order_menu[$j];?><br><br><?php
            }
            ?>
            <br><br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php 
            for($j=0;$j<$or_num;$j++)
            {
                echo $order_am[$j];?><br><br><?php
            }
            ?>
            <br><br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><br>
            <?php 
            for($j=0;$j<$or_num;$j++)
            {
                echo number_format($order_total[$j], 2 )."";?><br><br><?php
            }
            $total =0;
            for($j=0;$j<$or_num;$j++)
            {
               $total += $order_total[$j];
            }
            ?><div style = "color:rgb(106, 90, 205)"><?php
            echo "รวมทั้งหมด"." ".number_format($total, 2 )." "."บาท";?><br></div><?php
            ?>
            <br>
            </div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"> <?php  echo $order_em;?><br><span style = "color:grey"><?php echo $cus_tel;?></span></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:20px"><div align="center"><?php echo $order_date[$ori];?></div></td>
            <?php
            if($order_status=="กำลังส่ง"){
            ?>
            <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:blue;"><?php echo ($order_status);?></td>
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
            <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:red;">ถูก<?php echo ($order_status);?></td>
            <?php
            }
            ?>
            </tr>     
            <?php
            $ori++;
        }
        $or_num = 0;
    }
  ?>

</table>

<?php
     }
         $sql2 = "SELECT * FROM `order` WHERE `Employee_ID` = '".$_SESSION['Employee_ID']."'";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="Employee-work_history.php" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="Employee-work_history.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="Employee-work_history.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>

    </div>
</body>
</html>
<?php
    }
    session_write_close();
    close($conn);
?>