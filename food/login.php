<html>
      <a href="index.php"><font size="50">กลับไปยังหน้าแรก</font></a>
</html>
<?php
    session_start();
    require 'connect.php';
    if($_POST['uname']=='admin' and $_POST['psw'] == '12345678')
    {
      $_SESSION['First_name'] = 'Admin';
       echo "<script language=\"Javascript\">";
       echo "alert('Admin เข้าสู่ระบบเรียบร้อย')";
       echo "</script>";
       header("Location: Admin_user-detail.php");
    }
    else
    {
    $sql = "SELECT * FROM customer WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw'])."'";
    $result_user = mysqli_query($conn,$sql);
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    if($row_user){
       $_SESSION['First_name'] = $row_user['First_name'];
       $_SESSION['Last_name'] = $row_user['Last_name'];
       $_SESSION['Tel'] = $row_user['Tel'];
       $_SESSION['Email'] = $row_user['Email'];
       $_SESSION['IDcard'] = $row_user['IDcard'];
       $_SESSION['Address'] = $row_user['Address'];
       echo "<script language=\"Javascript\">";
       echo "alert('เข้าสู่ระบบเรียบร้อย')";
       echo "</script>";
       header("Location: index.php");
    }
    else{
        echo "<script language=\"Javascript\">";
        echo "alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง')";
        echo "</script>";
    }
    }
    session_close();
      
?>