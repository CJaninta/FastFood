<?php
	require('connect.php');
	$sql = "DELETE FROM employee WHERE Employee_ID = '".$_REQUEST["Employee_ID"]."' "; 
	if(mysqli_query($conn, $sql)){ 
    echo "Record was deleted successfully."; 
	}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($conn); 
} 
?>