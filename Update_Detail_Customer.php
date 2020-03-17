<?php
	session_start();
	require 'connect.php';
	$First_name = $_POST['fname'];
    $Last_name = $_POST['lname'];
    $Tel = $_POST['tel'];
    $Email = $_POST['email'];
	$Address = $_POST['add'];
	$IDcard = $_POST['idcard'];
    // <----------------------------------------------------- เช็คเงื่อนไขในการอัพเดท ------------------------------------------------------>
if($_SESSION['Status'] == 'User')
{
	if($First_name != "")
	{
	$_SESSION['First_name'] = $First_name;
	$update = "UPDATE customer SET First_name = '$First_name' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Last_name != "")
	{
	$_SESSION['Last_name'] = $Last_name;	
	$update = "UPDATE customer SET Last_name = '$Last_name' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Email != "")
	{
	$_SESSION['Email'] = $Email;
	$update = "UPDATE customer SET Email = '$Email' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Tel != "")
	{
	$_SESSION['Tel'] = $Tel;
	$update = "UPDATE customer SET Tel = '$Tel' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Address != "")
	{
	$_SESSION['Address'] = $Address;
	$update = "UPDATE customer SET Address = '$Address' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	if($Idcard != "")
	{
	$_SESSION['IDcard'] = $IDcard;
	$update = "UPDATE customer SET IDcard = '$IDcard' WHERE Customer_ID = '".$_SESSION["Customer_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
}
else if($_SESSION['Status'] == "Employee")
{
	$Brand_Motorcycle = $_POST['Brand_Motorcycle'];
	$License_plate = $_POST['License_plate'];
	if($First_name != "")
	{
	$_SESSION['First_name'] = $First_name;
	$update = "UPDATE employee SET First_name = '$First_name' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Last_name != "")
	{
	$_SESSION['Last_name'] = $Last_name;	
	$update = "UPDATE employee SET Last_name = '$Last_name' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Email != "")
	{
	$_SESSION['Email'] = $Email;
	$update = "UPDATE employee SET Email = '$Email' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Tel != "")
	{
	$_SESSION['Tel'] = $Tel;
	$update = "UPDATE employee SET Tel = '$Tel' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}

	if($Address != "")
	{
	$_SESSION['Address'] = $Address;
	$update = "UPDATE employee SET Address = '$Address' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	if($Idcard != "")
	{
	$_SESSION['IDcard'] = $IDcard;
	$update = "UPDATE employee SET IDcard = '$IDcard' WHERE Employee_ID = '".$_SESSION["Employee_ID"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	if($Brand_Motorcycle != "")
	{
	$_SESSION['Brand_Motorcycle'] = $Brand_Motorcycle;
	$update = "UPDATE employee SET Brand_Motorcycle = '$Brand_Motorcycle' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
	if($License_plate != "")
	{
	$_SESSION['License_plate'] = $IDcard;
	$update = "UPDATE employee SET License_plate = '$License_plate' WHERE IDcard = '".$_SESSION["IDcard"]."'";
	$objQuery = mysqli_query($conn,$update);
	}
}

	  // <----------------------------------------------------- จบเช็คเงื่อนไขในการอัพเดท ------------------------------------------------------>
	
	?>
    <script>
    if (confirm("อัพเดทเเรียบร้อย")) {
      window.location="index.php"; 
    }
	</script>
 	<?php
 session_write_close();
?>