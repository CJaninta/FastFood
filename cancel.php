<?php
	session_start();
	require('connect.php'); 
	$up = "UPDATE `order` SET Order_Status = 'ยกเลิก' WHERE Order_date_time = '".$_REQUEST['Order_date_time']."'";
	        $objup= mysqli_query($conn,$up);
	
		 $Employee_work = "SELECT Employee_ID FROM employee WHERE Status = 'กำลังส่ง' AND Employee_ID='".$_SESSION['Employee_Working']."'";
   		 $Employee_work_Query = mysqli_query($conn,$Employee_work);
    	 $Employee_work_Result = mysqli_fetch_array($Employee_work_Query);
    	 $em = $Employee_work_Result['Employee_ID'];
    	 
		 $status_employee = "UPDATE employee SET Status = 'ว่าง' WHERE Employee_ID = '$em'";
         $status_employee_Query = mysqli_query($conn,$status_employee);

         session_write_close();
    header("Location: cus_his.php");
?>
	