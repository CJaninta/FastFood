<?php

    require 'connect.php';
    session_start(); 
    date_default_timezone_set(‘Asia/Bangkok’);
    $sql = 'SELECT * FROM `menu_foods`';
    $or_id = 'SELECT Order_ID FROM `order`';
    $objorid = mysqli_query($conn,$or_id);
    $objQuery = mysqli_query($conn,$sql) or die ("Error Query [".$sql."]");
    $amount = array(0,0,0,0,0,0);
    $i=0;
    $day = date("Y-m-d h:i:sa"); 
    $CusID = $_SESSION['Customer_ID'];
    $Total = array(0,0,0,0,0,0);
    $menu = array();
    $me_j = 0;
    $Status = "กำลังส่ง";
    $em ="41";
    while($obj = mysqli_fetch_array($objQuery))
    {
        if($_REQUEST[$obj['Menu_ID']] > 0){
            $menu = $obj['Menu_ID'];
            $amount[$i] = $_REQUEST[$obj['Menu_ID']];
            $Total[$i] = $obj['Menu_Price']*$amount[$i];
            $query = "INSERT INTO `order` (`Order_Amount`, `Order_date_time`, `Order_Total`, `Customer_ID`, `Employee_ID`, `Status`) VALUES ('$amount[$i]','$day', '$Total[$i]', '$CusID ', '$em', '$Status')";
            $objme = mysqli_query($conn,$query);
            $me_j++;
	        if ($objme) {
               echo "New record Inputed successfully";
               echo "/";
	        } else {
	           echo "Error : Input ".mysqli_error($conn);
            }
        }
        $i++;
    }
    while($objor = mysqli_fetch_array($objorid))
    {
         if($objor['Customer_ID'] == $_SESSION['Customer_ID'])
         {
             $id = $objor['Customer_ID'];
         }
    }
    for($i=0;$i<$me_j;$i++)
    {
        $join = "INSERT INTO `bill` (`Order_ID`, `Menu_ID`) VALUES ('$id','$menu[$i]')";
        $objme1 = mysqli_query($conn,$join);
        if ($objme1) {
            echo "New record Inputed successfully";
            echo "/";
         } else {
            echo "Error : Input ".mysqli_error($conn);
         }
    }
    
	
    mysqli_close($conn);
?>