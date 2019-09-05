
<?php
    require 'connect.php';
    $First_name = $_POST['fname'];
    $Last_name = $_POST['lname'];
    $Tel = $_POST['tel'];
    $License_plate = $_POST['carid'];
    $Brand_Motorcycle = $_POST['carbrand'];
    $Email = $_POST['email'];
    $IDcard = $_POST['idcard'];
    $Address = $_POST['add'];
    $Password = $_POST['psw'];
    
    $query = "INSERT INTO employee (First_name,Last_name,Tel,Email,IDcard,Address,Password,License_plate,Brand_Motorcycle)  VALUES ('$First_name','$Last_name','$Tel','$Email','$IDcard','$Address','$Password','$License_plate','$Brand_Motorcycle')";

    $resultcus = mysqli_query($conn,$query);
    
    if($resultcus)
    {
        header("Location: index.php");
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
    mysqli_close($conn);
?>