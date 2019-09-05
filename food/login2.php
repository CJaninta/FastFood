<?php

    require 'connect.php';
    $Email = mysqli_real_escape_string($conn,$_POST['uname-em']);
    $Password = mysqli_real_escape_string($conn,$_POST['psw-em']);


    $sql = "SELECT * FROM employee WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname-em'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw-em'])."'";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if($result_user->num_rows == 1){
       session_start();
       $row_em = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
       $_SESSION['First_name'] = $row_em['First_name'];
       echo "เข้าสู่ระบบเรียบร้อย ..";
    }
    else{
        echo "ชื่ออีเมลหรือรหัสไม่ถูกต้อง ..";
    }
?>