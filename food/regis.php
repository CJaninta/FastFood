<html>
      <a href="index.php"><font size="50">กลับไปยังหน้าแรก</font></a>
</html>
<?php
    require 'connect.php';
   if($_POST["psw"] != $_POST["psw-repeat"])
    {
        echo "Password not Match!";
        exit();
    }

    $strSQL = "SELECT * FROM customer WHERE IDcard = '".trim($_POST['idcard'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if($objResult)
    {
            echo "<script language=\"Javascript\">";
            echo "alert('IDcard already exists!')";
            echo "</script>";
            exit();
            die;
    }
    $strSQL = "SELECT * FROM customer WHERE Email = '".trim($_POST['email'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if ($objResult) {
            echo "<script language=\"Javascript\">";
            echo "alert('Email already exists!')";
            echo "</script>";
            exit();
            die;
    }
    else
    {
    $strSQL = "SELECT * FROM customer";
    $objQuery = mysqli_query($conn,$strSQL);
    $count = mysqli_num_rows($objQuery);

    $ID_Customer = 10000 + $count;
    $First_name = $_POST['fname'];
    $Last_name = $_POST['lname'];
    $Tel = $_POST['tel'];
    $Email = $_POST['email'];
    $IDcard = $_POST['idcard'];
    $Address = $_POST['add'];
    $Password = $_POST['psw'];
    
    $query = "INSERT INTO customer (Customer_ID,First_name,Last_name,Tel,Email,IDcard,Address,Password)  VALUES ('$ID_Customer','$First_name','$Last_name','$Tel','$Email','$IDcard','$Address','$Password')";
    $resultcus = mysqli_query($conn,$query);
    
    if($resultcus)
    {
        echo "<script language=\"Javascript\">";
        echo "alert('Register Success!')";
        echo "</script>";
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
    ?>
<?php
}
    mysqli_close($conn);
?>
