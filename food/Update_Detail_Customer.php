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

	  // <----------------------------------------------------- จบเช็คเงื่อนไขในการอัพเดท ------------------------------------------------------>
	echo "<script language=\"Javascript\">";
	echo "alert('Update Success!')";
	echo "</script>";
	?>
    <html>
      <a href="index.php"><font size="50">กลับไปยังหน้าแรก</font></a>
   </html>
 	<?php
 session_write_close();
?>