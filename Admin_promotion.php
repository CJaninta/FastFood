<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- <------------------------------------- หน้าต่างของ Admin ------------------------------------------------------------->
<?php
    if($_SESSION['First_name'] == 'Admin')
    {
?> 
<head>
    <title>ข้อมูลโปรโมชั่น</title>
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
              unset($_SESSION['check']);
              echo $_SESSION["First_name"];
           ?>
        </div>
    </div>
    <!-- <------------------------------------- ส่วนแสดงตาราง User ------------------------------------------------------------->
    <div class="hispaper">
    <center><h2><i class="fas fa-tags" style="font-size: 36px"></i> ข้อมูลโปรโมชั่น</h2>
    <!--------------------------------------------------------------------------------- Start Insert Menu --------------------------------------------------------------------------------------------->

        <h2><a href="Admin_Insert_All.php?Insert=Promotion"style ="color:green">เพิ่ม Promotion</a></h2>

    <!--------------------------------------------------------------------------------- Stop Insert Menu --------------------------------------------------------------------------------------------->
    <?php
     require('connect.php');
     ?>
     <table>
     <tr>
         <th width="100"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ลำดับที่</div></th>
         <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">เลขที่เมนู</div></th>
         <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">รายการอาหาร</div></th>
         <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">เปอร์เซ็นต์ที่ลด</div></th>
         <th width="180"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ราคาก่อนลด</div></th>
         <th width="180"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ราคาหลังลด</div></th>
         <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">วันที่เริ่ม</div></th>
         <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">วันที่หมดอายุ</div></th>
     </tr>
     <?php
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
 $pro = "SELECT * FROM `promotion` limit {$start},{$perpage}";
 $objpro = mysqli_query($conn,$pro);

 if($objpro)
 {
 while($obj = mysqli_fetch_array($objpro))
 {
 ?>
     <tr>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $i+$start;?></div></td>
         <?php
            $me = "SELECT * FROM `menu_foods`";
            $objme= mysqli_query($conn,$me);
            while($objm = mysqli_fetch_array($objme))
            {
                if($obj['Menu_ID'] == $objm['Menu_ID'])
                {
                    $menu_name = $objm['Menu_Name'];
                    $menu_price = $objm['Menu_Price'];
                }
            }
            $menu_price_after = $menu_price-($obj['Discount']*$menu_price)/100 ;

         ?>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $obj["Menu_ID"];?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $menu_name;?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $obj['Discount']."%";?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $menu_price;?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo number_format($menu_price_after);?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $obj["Start_date"];?></td>
         <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $obj["Stop_date"];?></td>
         <td align="center"><a href="Admin_Edit_Detail_All.php?Promotion_ID=<?php echo $obj["Promotion_ID"];?><?php $_SESSION['check'] = "Promotion";?>" style ="color:blue"><i class='far fa-edit' style='font-size:32px;color:rgb(4, 172, 223)'></i></a></td>
         <td align="center"><a href="Admin_delete-All.php?Promotion_ID=<?php echo $obj["Promotion_ID"];?><?php $_SESSION['check'] = "Promotion";?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
     </tr>
 <?php
 $i=$i+1;
 }
 }
 ?>
    </table>
    <?php
         $sql2 = "SELECT * FROM promotion ";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="Admin_promotion.php" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="Admin_promotion.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="Admin_promotion.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>

    </center>
    </div>
    <script src="js/log.js"></script>
</body>
<?php
    }
    else
    {
?>
    <script>
    if (confirm("กรุณากลับไปหน้าแรก")) 
    {
      window.location="index.php"; 
    }
    </script>
<?php
    }
?>
</html>
