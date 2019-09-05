<?php
	require('connect.php');
	$sql = "UPDATE `order` SET Order_Status = 'ยกเลิก' WHERE Order_ID = '".$_REQUEST["Order_ID"]."' ";
	$objq = mysqli_query($conn,$sql);
	if($objq)
	{
	echo "<script language=\"Javascript\">";
	echo "alert('Cancel Success!')";
	echo "</script>";
	?>
    <html>
      <a href="his.php"><font size="50"><--</font></a>
   </html>
 	<?php
	}
?>