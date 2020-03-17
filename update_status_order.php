<?php
	session_start();
	require('connect.php');
    if($_SESSION['Status'] != "Employee")
    { 
	?>
     <script>
       if (confirm("ยืนยันเพื่อยกเลิกการสั่งซื้อ")) {
	    window.location="cancel.php?Order_date_time=<?php echo $_REQUEST["Order_date_time"];?>";
	   }
	</script>
    <?php
    }
    else
    {
        $customer ="SELECT Customer_ID from `order` WHERE Employee_ID = '".$_SESSION['Employee_ID']."'";
        $customer_query = mysqli_query($conn,$customer);
        $customer_result = mysqli_fetch_array($customer_query);
        $customer_id = $customer_result['Customer_ID'];
    	$order = "UPDATE `order` SET Order_Status = 'จัดส่งแล้ว'WHERE Order_Status = 'กำลังส่ง' AND Customer_ID = '$customer_id'";
    	$order_query = mysqli_query($conn,$order);
   
    	
    	$status_employee = "UPDATE employee SET Status = 'ว่าง' WHERE Employee_ID = '".$_SESSION['Employee_ID']."'";
    	$status_employee_Query = mysqli_query($conn,$status_employee);
	?>
     <script>
       if (confirm("สำเร็จงาน")) {
	    window.location="Employee-work.php";
	   }
	</script>
    <?php
    }

	/*$sql = "UPDATE `order` SET Order_Status = 'ยกเลิก' WHERE Order_ID = '".$_REQUEST["Order_ID"]."' ";
	$objq = mysqli_query($conn,$sql);*/
	/*if($objq)
	{
	echo "<script language=\"Javascript\">";
	echo "alert('Cancel Success!')";
	echo "</script>";
	header("Location: cus_his.php");
	/*?>
    <html>
      <a href="his.php"><font size="50"><--</font></a>
   </html>
 	<?php
	}*/
?>