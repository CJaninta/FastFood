<?php
	session_start();
	require('connect.php');
/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Restaurant -------------------------------------------------------------------------------->*/
if($_SESSION['check'] == "Restaurant")
{
	$sql = "DELETE FROM restaurant WHERE Restaurant_ID= '".$_REQUEST["Restaurant_ID"]."' "; 
	$sql_Query = mysqli_query($conn, $sql);
	if($sql_Query)
	{ 
?>
	 <script>
    	if (confirm("Record was deleted successfully.")) 
    	{
      		window.location="Admin_restaurant-detail.php"; 
    	}
	</script>
	<?php
		}	
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Restaurant -------------------------------------------------------------------------------->*/

/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Menu -------------------------------------------------------------------------------------->*/
else if($_SESSION['check'] == "Menu")
{
	$sql = "DELETE FROM `menu_foods_on_restaurant_composite_entity` WHERE Menu_ID = '".$_REQUEST["Menu_ID"]."'";
	$sql2 = "DELETE FROM `menu_foods` WHERE  Menu_ID = '".$_REQUEST["Menu_ID"]."'";
	$sql_Query = mysqli_query($conn, $sql);
	$sql_Query2 = mysqli_query($conn, $sql2);
	if($sql_Query)
	{
		if($sql_Query2)
			{
	?>
	 		<script>
    			if (confirm("Record was deleted successfully.")) 
    				{
      					window.location="Admin_restaurant_show_menu.php"; 
    				}
			</script>
<?php
			}
	}
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Menu --------------------------------------------------------------------------------->*/

/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น User --------------------------------------------------------------------------------->*/
else if($_SESSION['check'] == "User")
{
	$sql = "UPDATE customer SET Ban_Customer = 'ระงับการใช้งาน' WHERE Customer_ID= '".$_REQUEST["Customer_ID"]."' "; 
	$sql_Query = mysqli_query($conn, $sql);
	if($sql_Query)
	{ 
?>
	 <script>
    	if (confirm("Record was Ban successfully.")) 
    	{
      		window.location="Admin_user-detail.php"; 
    	}
	</script>
	<?php
	}	
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น User ---------------------------------------------------------------------------------->*/

/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Employee -------------------------------------------------------------------------------->*/
else if($_SESSION['check'] == "Employee")
{
	$sql = "UPDATE employee SET Ban_Employee = 'ระงับการใช้งาน' WHERE Employee_ID = '".$_REQUEST["Employee_ID"]."' "; 
	$sql_Query = mysqli_query($conn, $sql);
	if($sql_Query)
	{ 
?>
	 <script>
    	if (confirm("Record was Ban successfully.")) 
    	{
      		window.location="Admin_employee-detail.php"; 
    	}
	</script>
	<?php
	}	
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Employee -------------------------------------------------------------------------------->*/

/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Promotion ------------------------------------------------------------------------------->*/
else if($_SESSION['check'] == "Promotion")
{
	$sql = "DELETE FROM `promotion` WHERE `Promotion_ID` = '".$_REQUEST["Promotion_ID"]."' "; 
	$sql_Query = mysqli_query($conn, $sql);
	if($sql_Query)
	{ 
?>
	 <script>
    	if (confirm("Record was deleted successfully.")) 
    	{
      		window.location="Admin_promotion.php"; 
    	}
	</script>
	<?php
	}
	else
	{
	?>
	 <script>
    	if (confirm("ไม่สามารถลบโปรโมชั่นนี้ได้")) 
    	{
      		window.location="Admin_promotion.php"; 
    	}
	</script>
	<?php
	}	
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Promotion ------------------------------------------------------------------------------->*/

/*<---------------------------------------------------------------------------------------------- เปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Reccomment ------------------------------------------------------------------------------->*/
else if($_SESSION['check'] == "Recommend")
{
	$sql = "DELETE FROM `recommend_of_ restaurants` WHERE Restaurant_ID = '".$_REQUEST["Restaurant_ID"]."' "; 
	$sql_Query = mysqli_query($conn, $sql);
	if($sql_Query)
	{ 
?>
	 <script>
    	if (confirm("ร้านนี้ได้ถูกเอาออกจากร้านแนะนำแล้ว")) 
    	{
      		window.location="Admin_recommend.php"; 
    	}
	</script>
	<?php
	}	
}
/*<---------------------------------------------------------------------------------------------- ปิดเช็คเงื่อนไขการ Delete $_SESSION['check'] เป็น Reccomment ------------------------------------------------------------------------------->*/
?>