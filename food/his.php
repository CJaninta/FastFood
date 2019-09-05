<!DOCTYPE html>
<?php
    session_start(); 
 
	if($_SESSION['IDcard'] == "")
	{
		echo '<script language="javascript">';
		echo "alert('Please Login!')";
		echo '</script>';
		?>
		<a href="index.php"><font size="50">กลับไปยังหน้าแรก</font></a>
	<?php
		die;
	}
	
?>
<html lang="en">

<head>
    <title>Fast Food</title>
    <link rel="stylesheet" href="css/lay.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/rec.css">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/his.css">
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
        <a href="his.php">ประวัติการสั่ง</a>
        <a href="user_account.php">บัญชี</a>
        <?php // <------------------------------------- เช็คเงื่อนไขตอน Login กรณี Login แล้ว ----------------------------------------------->
        ?>
        <form  action="logout_All.php" method="POST">
            <div class="login">
                <button type="submit" style.display='block' class="bt" style="background-color: rgb(35, 199, 41);padding: 5px 10px;font-size: 18px;font-weight: 500;border-radius: 5px;">Logout</button>
            </div>
        </form>
        <?php
        ?>
        <form  action="login.php" method="POST">
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
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">ลำดับรายการ</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">รายการอาหาร</div></th>
    <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">จำนวน</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">ราคารวมทั้งหมด</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">ผู้ส่ง</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">วันที่สั่งซื้อ</div></th>
    <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);">สถานะการส่ง</div></th>
  </tr>
<?php // <------------------------------------- เเก้เรื่อง Order อีก!!! ----------------------------------------------->
require('connect.php');

$cus = 'SELECT First_name,Customer_ID FROM `customer`';
$em = 'SELECT Employee_ID,First_name FROM `employee`';
$sql = 'SELECT * FROM `order`';
$sql2 = 'SELECT * FROM `menu_foods`';

$objq = mysqli_query($conn,$sql);
$objq2 = mysqli_query($conn,$sql2);
$objcus = mysqli_query($conn,$cus);
$objem = mysqli_query($conn,$em);

while($objc = mysqli_fetch_array($objcus))
{
  if($objc['First_name'] == $_SESSION['First_name'])
  {
    $cuspp = $objc['Customer_ID'];
  }
}


$i = 1;
while($obj = mysqli_fetch_array($objq))
{
  $obj2 = mysqli_fetch_array($objq2);
  if($obj["Customer_ID"] == $cuspp){
?>
  <tr>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $i;?></div></td>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $obj2["Menu_Name"];?></td>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $obj["Order_Amount"];?></td>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $obj["Order_Total"];?></td>
    <?php
    while($obje = mysqli_fetch_array($objem))
    {
      if($obje['Employee_ID'] == $obj['Employee_ID'])
      {
        $empp = $obje['First_name'];
      }
    }
    ?>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $empp;?></td>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center"><?php echo $obj["Order_date_time"];?></td>
    <?php 
     if($obj["Status"]=="กำลังส่ง"){
    ?>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:blue;"><?php echo ($obj["Status"]);?></td>
    <td align="center"><a href="deletedata.php?Order_ID=<?php echo $obj["Order_ID"];?>"> ยกเลิก</a></td>
    <?php
    }
    else{
    ?>
    <td style = "border: 2px solid rgb(245, 217, 93)"><div align="center" style = "color:green;"><?php echo ($obj["Status"]);?></td>
    <?php
    }
    ?>
  </tr>
<?php
   $i++;
 }
}
?>
</table>
</div>

</body>

</html>