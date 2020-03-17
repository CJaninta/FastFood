<!DOCTYPE html>
<?php 
session_start();
if($_SESSION['First_name'] == 'Admin')
    {
  require('connect.php');

?> 
<html lang="en">
<!-- <------------------------------------- หน้าต่างของ Admin ------------------------------------------------------------->
<head>
    <title>รายการอาหาร</title>
    <link rel="stylesheet" href="css/menu.css">
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
                unset($_SESSION['Insert']);
                echo $_SESSION['First_name'];
           ?>
        </div>
    </div>
    <!-- <------------------------------------- ส่วนแสดงตาราง User ------------------------------------------------------------->
    <div class="hispaper">
    <!----------------------------------------------------------------------------------------------------------------------------------------- เปิด เช็คแสดงชื่อว่าเมนูจากร้านไหน ------------------------------------------------------------------------------------------>
        <?php $name_restaurant = "SELECT Restaurant_Name FROM restaurant WHERE Restaurant_ID = '".$_GET['Restaurant_ID']."'"; $name_restaurant_Query = mysqli_query($conn,$name_restaurant); $name_restaurant_Result = mysqli_fetch_array($name_restaurant_Query);?>
    <!----------------------------------------------------------------------------------------------------------------------------------------- ปิด เช็คแสดงชื่อว่าเมนูจากร้านไหน ------------------------------------------------------------------------------------------>
    <?php
        if($_GET['Restaurant_ID'] != "")
        {
    ?>
    <center><h2><i class="material-icons" style="font-size:40px">menu</i> เมนูอาหาร ร้าน : <?php echo $name_restaurant_Result['Restaurant_Name'];?></h2>
    <?php
        }
        else
        {
    ?>
    <center><h2><i class="material-icons" style="font-size:40px">menu</i> ร้าน : <?php echo $_POST['search_restaurant'];?></h2>
    <?php
        }
    ?>
    <!--------------------------------------------------------------------------------- Start Insert Menu --------------------------------------------------------------------------------------------->

        <h2><a href="Admin_Insert_All.php?Insert=Menu"style ="color:green">เพิ่ม Menu</a></h2>

    <!--------------------------------------------------------------------------------- Stop Insert Menu --------------------------------------------------------------------------------------------->
<?php
    if($_GET['Restaurant_ID'] != "")
    {
?>
    <form  method = "POST" action = "Admin_restaurant_show_menu.php?Restaurant_ID=<?php echo $_GET["Restaurant_ID"];?>">
        <input name = "search" type = "text" placeholder = " ค้นหารายการอาหาร" style = "height:10px;width : 15%;font-size : 20px;border: 2px solid rgb(240, 116, 1);border-radius:20px;color :blue;" required>
        <button type="submit" class="btmm btmm1" style ="padding: 3px 3px ;font-size:30px"><i class='fas fa-search' style='font-size:20px;display:block'></i></button>
    </form>
<?php
   }
   else
   {
?>
    <form  method = "POST" action = "Admin_restaurant_show_menu.php">
        <input name = "search_restaurant" type = "text" placeholder = " ร้านอาหาร " style = "height:10px;width : 15%;font-size : 20px;border: 2px solid rgb(240, 116, 1);border-radius:20px;color :blue;" required>
        <button type="submit" class="btmm btmm1" style ="padding: 3px 3px ;font-size:30px"><i class='fas fa-search' style='font-size:20px;display:block'></i></button>
    </form>
<?php
   }
?>
    <?php
    if($_GET['Restaurant_ID'] == "")
    {
    ?>
    <table  style="height: 20px">
        <tr>
            <th width="100"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ลำดับที่</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ร้านอาหาร</div></th>
        </tr>

    <?php
    $i=1;
    if($_POST['search_restaurant'] =="")
        {
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
                     $res = "SELECT * FROM restaurant limit {$start} , {$perpage}";
                    $resQuery = mysqli_query($conn,$res);
        
                    while($res = mysqli_fetch_array($resQuery))
                {
        ?>
            <tr>
                <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $start+$i;?></div></td>
                <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><a href = "Admin_restaurant_show_menu.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?>"><?php echo $res["Restaurant_Name"];?></a></td>
            </tr>
    <?php
            $i++;
                }
    ?>
        </table>
    <?php
         $sql2 = "SELECT * FROM restaurant ";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="Admin_restaurant_show_menu.php" aria-label="Previous">
         <span aria-hidden="true">First</span>
         </a>
         <?php for($i=1;$i<=$total_page;$i++){ ?>
         <a href="Admin_restaurant_show_menu.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="Admin_restaurant_show_menu.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>

    <?php
    }
    else
    {
       $res = "SELECT * FROM restaurant WHERE Restaurant_Name = '".$_POST['search_restaurant']."'";
       $resQuery = mysqli_query($conn,$res);
       $res = mysqli_fetch_array($resQuery)
    ?>
            <tr>
                <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $i;?></div></td>
                <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><a href = "Admin_restaurant_show_menu.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?>"><?php echo $res["Restaurant_Name"];?></a></td>
            </tr>
    <?php
    }
}
 else if(isset($_GET['Restaurant_ID']))
{
?>
    <table>
        <tr>
            <th width="100"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ลำดับที่</div></th>
            <th width="230"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ชื่อเมนู</div></th>
            <th width="200"> <div align="center" style = "border: 2px solid rgb(245, 217, 93);color :blue;font-size:17px">ราคา</div></th>
        </tr>
    <?php
    $j = 1;
    if($_POST['search'] == "")
    {
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
    $Restaurant_ID = $_GET['Restaurant_ID'];
    $menu = "SELECT Menu_ID FROM `menu_foods_on_restaurant_composite_entity`  WHERE Restaurant_ID = '$Restaurant_ID' limit {$start},{$perpage}";
    $objM = mysqli_query($conn,$menu);
    while($result = mysqli_fetch_array($objM))
    {
       $Menu_ID = $result['Menu_ID'];
       $menu2 ="SELECT * FROM menu_foods   WHERE Menu_ID = '$Menu_ID' ";
       $objM2 = mysqli_query($conn,$menu2);
      
       $result2 = mysqli_fetch_array($objM2);
       ?>

        <tr>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $j;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $result2["Menu_Name"];?></div></td> 
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $result2["Menu_Price"];?></div></td> 
             <td align="center"><a href="Admin_Edit_Detail_All.php?Menu_ID=<?php echo $result2["Menu_ID"];?><?php $_SESSION['check'] = "Menu";?>" style ="color:blue"><i class='far fa-edit' style='font-size:32px;color:rgb(4, 172, 223)'></i></a></td>
            <td align="center"><a href="Admin_delete-All.php?Menu_ID=<?php echo $result2["Menu_ID"];?><?php $_SESSION['check'] = "Menu";?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
        </tr>
    <?php
    $j++;
    }
    }
    else
    {
        $j = 1;
        $research = "SELECT * FROM menu_foods WHERE Menu_Name = '".$_POST['search']."'";
        $research_Query  = mysqli_query($conn,$research);
        $research_Result = mysqli_fetch_array($research_Query);
        ?>
        <tr>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $j;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $research_Result["Menu_Name"];?></div></td> 
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $research_Result["Menu_Type"];?></div></td> 
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $research_Result["Menu_Price"];?></div></td> 
             <td align="center"><a href="Admin_Edit_Detail_All.php?Menu_ID=<?php echo $research_Result["Menu_ID"];?><?php $_SESSION['check'] = "Menu";?>" style ="color:blue"><i class='far fa-edit' style='font-size:32px;color:rgb(4, 172, 223)'></i></a></td>
            <td align="center"><a href="Admin_delete-All.php?Menu_ID=<?php echo $research_Result["Menu_ID"];?><?php $_SESSION['check'] = "Menu";?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
        </tr>
    <?php
    }
}  
?>
    </table>
    <?php
     $sql2 = "SELECT Menu_ID FROM `menu_foods_on_restaurant_composite_entity`  WHERE Restaurant_ID = '$Restaurant_ID'";
         $query2 = mysqli_query($conn, $sql2);
         $total_record = mysqli_num_rows($query2);
         $total_page = ceil($total_record / $perpage);
        ?>
        <br><br><br>

        <nav>
         <a href="Admin_restaurant_show_menu.php" aria-label="Previous">
         <span aria-hidden="true">First</span>
         </a>
         <?php for($i=1;$i<=$total_page;$i++){ ?>
         <a href="Admin_restaurant_show_menu.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="Admin_restaurant_show_menu.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>
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
    session_write_close();
?>
</html>