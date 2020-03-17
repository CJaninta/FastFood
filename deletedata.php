
<?php
    $delete_ID  = $_REQUEST['Order_ID'];
    require('connect.php');

    $sql ='
    DELETE FROM order
    WHERE Order_ID = '.$delete_ID.';
    ';
    
    $objQuery = mysqli_query($conn,$sql);
    if($objQuery) {
        echo "Record ".$delete_ID." was Deleted.";
    } else {
        echo ("Error : Delete").mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>
