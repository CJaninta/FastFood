<?php
	require('connect.php');
	$sql = "DELETE FROM restaurant WHERE Restaurant_ID= '".$_REQUEST["Restaurant_ID"]."' "; 
	if(mysqli_query($conn, $sql)){ 
    echo "Record was deleted successfully."; 
	}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($conn); 
} 
?>