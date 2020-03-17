<?php
	require_once('connect.php');
	date_default_timezone_set("Asia/Bangkok");
	$day = date("Y-m-d");echo $day;
	$A = "SELECT Restaurant_ID FROM restaurant WHERE Restaurant_End_Contract NOT BETWEEN Restaurant_Start_Contract AND '$day' ";
	$B = mysqli_query($conn,$A);

	$num = mysqli_num_rows($B);
	if($B)
	{
		echo $num;
		while($c = mysqli_fetch_array($B))
		{
			echo $c['Restaurant_ID']." ";
		}
	}
	else
	{
		echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
	}
?>