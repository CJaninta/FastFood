<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect.php');
  $pro = $_POST['search'];
  $p = '%'.$pro.'%';
  $q = "SELECT * FROM `restaurant` WHERE Restaurant_Name LIKE '$p'";
  $result = mysqli_query($conn,$q);
  $result1 = mysqli_query($conn,$q);
  $j=1;
  $i=0;
  $res1 = "SELECT * FROM `restaurant`";
  $objM = mysqli_query($conn,$res1);
  $่res_i = array();
  $res_n = array();
  while($ob = mysqli_fetch_array($objM)){
      $res_i[$i] = $j;
      $res_n[$i] = $ob["Restaurant_Name"];
      $i++;
      $j++;
  }

?> 
<!-- <------------------------------------- หน้าต่างของ Admin ------------------------------------------------------------->
<head>
    <title>รายละเอียดร้านอาหาร</title>
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
            session_start();
            unset($_SESSION['check']);
             echo $_SESSION['First_name'];
           ?>
        </div>
        </div>
    </div>
    <!-- <------------------------------------- ส่วนแสดงตาราง Restaurant ------------------------------------------------------------->
    <div class="hispaper">
    <center><h2><i class="material-icons" style="font-size:40px">restaurant_menu</i> รายละเอียดร้านอาหาร</h2>
    <form  method = "POST" action = "Admin_restaurant-detail.php">
        <input name = "search" type = "text" placeholder = " ค้นหาร้าน" style = "height:10px;width : 15%;font-size : 20px;border: 2px solid rgb(240, 116, 1);border-radius:20px;color :blue;" required>
        <button type="submit" class="btmm btmm1" style ="padding: 3px 3px ;font-size:30px"><i class='fas fa-search' style='font-size:20px;display:block'></i></button><br><br>
    </form>
    <?php 
    if($pro == ""){
    ?>
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
    $i=1;
    $res = "SELECT * FROM restaurant limit {$start} , {$perpage}";
    $resQuery = mysqli_query($conn,$res);
    //$row = mysqli_num_rows($resQuery);
    
    while($res = mysqli_fetch_array($resQuery))
    {
    ?>
        <tr>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $i+$start;?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_ID"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Name"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:12px"><div align="center"><?php echo $res["Restaurant_Address"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Start_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_End_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Tel"];?></td>
        <!------------------------------------------------------------------------------------- เช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
        <?php
            $type ="SELECT * FROM type_of_restaurants";
            $typeQuery = mysqli_query($conn,$type);
            while($type1 = mysqli_fetch_array($typeQuery))
            {
           
                if($type1['Type_ID'] == $res['Type_ID'])
                {
                    
                    $name = $type1["Type_Name_Restaurant"];
                }
            }
        ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $name;?></td>
        <!------------------------------------------------------------------------------------- ปิดเช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
        <td align="center"><a href="Admin_Edit_Detail_All.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?><?php $_SESSION['check'] = "Restaurant";?>" style ="color:blue"><i class='far fa-edit' style='font-size:32px;color:rgb(4, 172, 223)'></i></a></td>
            <td align="center"><a href="Admin_delete-All.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?><?php $_SESSION['check'] = "Restaurant";?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
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
         <a href="Admin_restaurant-detail.php" aria-label="Previous">
         <span aria-hidden="true" >First</span>
         </a>
         
         <?php 
         for($i=1;$i<=$total_page;$i++){ ?>
         <a href="Admin_restaurant-detail.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
         <?php } ?>
         <a href="Admin_restaurant-detail.php?page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">Last</span>
         </a>
         </ul>
        </nav>
    <?php
    }
    else if($pro != ""){
    ?>
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
        $j=0;
        $n=0;
        $res_co = array();
        $res = "SELECT * FROM restaurant";
        $resQuery = mysqli_query($conn,$res);
        $row = mysqli_num_rows($resQuery);
    
        while($ob1 = mysqli_fetch_array($result1)){
           $name = $ob1["Restaurant_Name"];
           for($i=0;$i<$row;$i++)
           {   
               if($name == $res_n[$i])
               {
                   $res_co[$j] = $res_i[$i];
                   $j++;
               }
           }
        }
        $i=0;

    while($res = mysqli_fetch_array($result))
    {
    ?>
        <tr>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res_co[$i]?></div></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_ID"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Name"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:12px"><div align="center"><?php echo $res["Restaurant_Address"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Start_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_End_Contract"];?></td>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $res["Restaurant_Tel"];?></td>
        <!------------------------------------------------------------------------------------- เช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
        <?php
            $type ="SELECT * FROM type_of_restaurants";
            $typeQuery = mysqli_query($conn,$type);
            while($type1 = mysqli_fetch_array($typeQuery))
            {
           
                if($type1['Type_ID'] == $res['Type_ID'])
                {
                    
                    $name = $type1["Type_Name_Restaurant"];
                }
            }
        ?>
            <td style = "border: 2px solid rgb(245, 217, 93);font-size:17px"><div align="center"><?php echo $name;?></td>
        <!------------------------------------------------------------------------------------- ปิดเช็คค่า Type ID ว่าตรงกันไหมถ้าตรงกันให้ ECHO ประเภทร้านออกมา ---------------------------------------------------------------------------->
        <td align="center"><a href="Admin_Edit_Detail_All.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?><?php $_SESSION['check'] = "Restaurant";?>" style ="color:blue"><i class='far fa-edit' style='font-size:32px;color:rgb(4, 172, 223)'></i></a></td>
            <td align="center"><a href="Admin_delete-All.php?Restaurant_ID=<?php echo $res["Restaurant_ID"];?><?php $_SESSION['check'] = "Restaurant";?>"><i class='fas fa-trash-alt' style='font-size:32px;color:red'></i></a></td>
        </tr>
    <?php
     $i++;
    }
    ?>
    </table>
    <?php
    }
    ?>
    </center>
    </div>
    <script src="js/log.js"></script>
</body>
</html>
