<?php

	$conn = mysqli_connect('localhost','root','12345678','fastfood');

	mysqli_set_charset($conn, 'utf8');

	/*if (mysqli_connect_error()) {
    	echo("Connection : failed (เชื่อมต่อฐานข้อมูล ไม่ สำเร็จ)" . mysqli_connect_error());
	} else {
		echo("Connection : OK (เชื่อมต่อฐานข้อมูลสำเร็จ)") ;
	}*/


?>