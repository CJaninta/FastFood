<?php
	require('connect.php');
	$sql = "DELETE FROM customer WHERE Customer_ID= '".$_REQUEST["Customer_ID"]."' "; 
	if(mysqli_query($conn, $sql)){ 
    echo "Record was deleted successfully."; 
	}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($conn); 
} 
?>