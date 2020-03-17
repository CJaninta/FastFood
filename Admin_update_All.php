<?php
	session_start();
	require 'connect.php';
/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Restaurant -------------------------------------------------------------------------->*/
if($_SESSION['check'] == "Restaurant")
{
	$Resname = $_POST['Resname'];
    $Resaddress = $_POST['Resaddress'];
    $Resstart_contract = $_POST['Resstart_contract'];
    $Resend_contract = $_POST['Resend_contract'];
	$Restel = $_POST['Restel'];
	$Restype = $_POST['Restype'];
    // <----------------------------------------------------- เช็คเงื่อนไขในการอัพเดท ------------------------------------------------------>
	if($Resname != "")
	{
	$update = "UPDATE restaurant SET Restaurant_Name = '$Resname' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Resaddress != "")
	{	
	$update = "UPDATE restaurant SET Restaurant_Address = '$Resaddress' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Resstart_contract != "")
	{
	$update = "UPDATE restaurant SET Restaurant_Start_Contract = '$Resstart_contract' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Resend_contract != "")
	{
	$update = "UPDATE restaurant SET Restaurant_End_Contract = '$Resend_contract' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Restel != "")
	{
	$update = "UPDATE restaurant SET Restaurant_Tel = '$Restel' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	if($Restype != "")
	{
	$update = "UPDATE restaurant SET Type_ID = '$Restype' WHERE Restaurant_ID = '".$_SESSION["Restaurant_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	?>
	 <script>
    	if (confirm("แก้ไขเรียบร้อย")) 
    	{
      		window.location="Admin_restaurant-detail.php"; 
    	}
	</script>
	<?php
	  // <----------------------------------------------------- จบเช็คเงื่อนไขในการอัพเดท ------------------------------------------------------>
 	unset($_SESSION["Restaurant_ID"]);
 }
 /*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Restaurant -------------------------------------------------------------------------->*/

 /*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Menu -------------------------------------------------------------------------------->*/
 else if($_SESSION['check'] == "Menu")
 {
 	$Menuname = $_POST['Menuname'];
    $Menutotal = $_POST['Menutotal'];
    $Menuimage = "http://localhost/food/img/menu/".$_POST['Menuimage'];
	if($Menuname != "")
	{
	$update = "UPDATE menu_foods SET Menu_Name = '$Menuname' WHERE Menu_ID = '".$_SESSION["Menu_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Menutotal != "")
	{
	$update = "UPDATE menu_foods SET  = Menutotal WHERE Menu_ID = '".$_SESSION["Menu_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Menuimage != "")
	{
	$update = "UPDATE menu_foods SET  = Menuimage WHERE Menu_ID = '".$_SESSION["Menu_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	unset($_SESSION["Menu_ID"]);
	?>
	 <script>
    	if (confirm("แก้ไขเรียบร้อย")) 
    	{
      		window.location="Admin_restaurant_show_menu.php"; 
    	}
	</script>
 	<?php
 }
 /*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Menu -------------------------------------------------------------------------------->*/

 /*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Promotion -------------------------------------------------------------------------------->*/
 	else if($_SESSION['check'] == "Promotion")
 {
 	$Discount = $_POST['Discount'];
 	$Start_date = $_POST['Start_date'];
 	$Stop_date = $_POST['Stop_date'];
 	if($Discount != "")
	{
	$update = "UPDATE promotion SET Discount = '$Discount' WHERE Promotion_ID = '".$_SESSION["Promotion_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Start_date != "")
	{
	$update = "UPDATE promotion SET Start_date = '$Start_date' WHERE Promotion_ID = '".$_SESSION["Promotion_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Stop_date != "")
	{
	$update = "UPDATE promotion SET Stop_date = '$Stop_date' WHERE Promotion_ID = '".$_SESSION["Promotion_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	unset($_SESSION["Promotion_ID"]);
 ?>
 	<script>
    	if (confirm("แก้ไขเรียบร้อย")) 
    	{
      		window.location="Admin_promotion.php"; 
    	}
	</script>
 <?php
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Update $_SESSION['check'] เป็น Menu -------------------------------------------------------------------------------->*/
 session_write_close();
?>