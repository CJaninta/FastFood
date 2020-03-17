<?php
	session_start();
	require_once('connect.php');
if($_SESSION["Insert"] == "Menu")
{
	$strSQL = "SELECT Menu_Name FROM menu_foods WHERE Menu_Name = '".trim($_POST['Menuname'])."' ";
	$objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if($objResult)
    {
    	 ?>
        <script>
        	if (confirm("เมนูนี้มีอยู่แล้ว"))
        	 {
         		 window.location="Admin_Insert_All.php?Insert=Menu"; 
        	 }
        </script>
        <?php
            exit();
            die;
    }
    $strSQL = "SELECT * FROM menu_foods";
    $objQuery = mysqli_query($conn,$strSQL);
    $count = mysqli_num_rows($objQuery);

    $Restaurant_ID = $_POST['Restaurant_ID'];
    $Menu_Name = $_POST['Menuname'];
    $Menu_Price = $_POST['Menutotal'];
    $Menu_Type = $_POST['Menutype'];
    $Menu_img = "http://localhost/food/img/menu/".$_POST['Menuimage'];
    $query = "INSERT INTO menu_foods (Menu_name,Menu_Price,Menu_img)  VALUES ('$Menu_Name','$Menu_Price','$Menu_img')";
    $result = mysqli_query($conn,$query);

    $query = "SELECT Menu_ID FROM menu_foods WHERE Menu_Name = '$Menu_Name'";
    $result = mysqli_query($conn,$query);
    $Menu = mysqli_fetch_array($result);
    $Menu_ID = $Menu['Menu_ID'];
     
    $composite_entity = "INSERT INTO menu_foods_on_restaurant_composite_entity (Menu_ID,Restaurant_ID) VALUES ('$Menu_ID','$Restaurant_ID')";
    $composite_entity_query = mysqli_query($conn,$composite_entity);

    

    
    if($composite_entity_query)
    {
        ?>
       <script>
       if (confirm("ลงทะเบียนรายการอาหารเรียบร้อย")) {
         window.location="Admin_restaurant_show_menu.php"; 
       }
       </script>
       <?php
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
    ?>
<?php
}
else if($_SESSION["Insert"] == "Promotion")
{
 	$strSQL = "SELECT Menu_Name FROM promotion WHERE Menu_Name = '".trim($_POST['Menu_ID'])."' ";
	$objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if($objResult)
    {
    	 ?>
        <script>
        	if (confirm("มีรายการนี้อยู่แล้ว"))
        	 {
         		 window.location="Admin_Insert_All.php?Insert=Promotion"; 
        	 }
        </script>
        <?php
            exit();
            die;
    }
    $strSQL = "SELECT * FROM promotion";
    $objQuery = mysqli_query($conn,$strSQL);
    $count = mysqli_num_rows($objQuery);

    $Promotion_ID = 1000001+$count*2;
    $Discount = $_POST['Discount'];
    $Start_date = $_POST['Start_date'];
    $Stop_date = $_POST['Stop_date'];
    $Menu_id = $_POST['Menu_ID'];

    $query = "INSERT INTO promotion (Promotion_ID,Discount,Start_date,Stop_date,Menu_id)  VALUES ('$Promotion_ID','$Discount','$Start_date','$Stop_date','$Menu_id')";
    $resultcus = mysqli_query($conn,$query);
    if($resultcus)
    {
        ?>
       <script>
       if (confirm("ลงทะเบียนโปรโมชั่นเรียบร้อย")) {
         window.location="Admin_promotion.php"; 
       }
       </script>
       <?php
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
    ?>
<?php
}
else if ($_SESSION["Insert"] == "Recommend")
{
    $strSQL = "SELECT Restaurant_ID FROM `recommend_of_ restaurants` WHERE Restaurant_ID = '".trim($_GET['Restaurant_ID'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if($objResult)
    {
         ?>
        <script>
            if (confirm("ร้านนี้เป็นร้านแนะนำอยู่แล้ว!!"))
             {
                 window.location="Admin_reccomment.php"; 
             }
        </script>
        <?php
            exit();
            die;
    }
    $strSQL = "SELECT * FROM `recommend_of_ restaurants`";
    $objQuery = mysqli_query($conn,$strSQL);
    $count = mysqli_num_rows($objQuery);

     $Recommend_ID = $count + 8000;
     $Restaurant_ID = $_GET['Restaurant_ID'];
     $query = "INSERT INTO `recommend_of_ restaurants` (Recommend_ID,Restaurant_ID)  VALUES ('$Recommend_ID','$Restaurant_ID')";
     $objQuery = mysqli_query($conn,$query);
     if($objQuery)
    {
        ?>
       <script>
       if (confirm("เพิ่มร้านแนะนำเรียบร้อย")) {
         window.location="Admin_recommend.php"; 
       }
       </script>
       <?php
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
    ?>
<?php
}
mysqli_close($conn);
?>