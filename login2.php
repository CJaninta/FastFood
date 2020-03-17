<?php
    session_start();
    require 'connect.php';
    if($_POST['uname-em']=='admin' and $_POST['psw-em'] == '12345678')
    {
      $_SESSION['First_name'] = 'Admin';
       ?>
       <script>
       if (confirm("Admin เข้าสู่ระบบเรียบร้อย")) {
         window.location="Admin_user-detail.php"; 
       }
       </script>
       <?php
    }
    $sql = "SELECT Ban_Employee FROM employee WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname-em'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw-em'])."'";
    $query_employee = mysqli_query($conn,$sql);
    $result_employee = mysqli_fetch_array($query_employee);
    if($result_employee['Ban_Employee'] == "ระงับการใช้งาน")
    {
    ?>
       <script>
       if (confirm("บัญชีนี้ถูกระงับการใช้งาน กรุณาสมัครสมาชิคใหม่")) {
         window.location="index.php"; 
       }
       </script>
       <?php
    }
    else
    {
    $sql = "SELECT * FROM employee WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname-em'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw-em'])."'";
    $result_employee = mysqli_query($conn,$sql);
    $row_employee = mysqli_fetch_array($result_employee,MYSQLI_ASSOC);
    if($row_employee){
       $_SESSION['Status'] = "Employee";
       $_SESSION['Employee_ID'] = $row_employee['Employee_ID'];
       $_SESSION['First_name'] = $row_employee['First_name'];
       $_SESSION['Last_name'] = $row_employee['Last_name'];
       $_SESSION['Tel'] = $row_employee['Tel'];
       $_SESSION['Email'] = $row_employee['Email'];
       $_SESSION['IDcard'] = $row_employee['IDcard'];
       $_SESSION['Address'] = $row_employee['Address'];
       $_SESSION['Brand_Motorcycle'] = $row_employee['Brand_Motorcycle'];
       $_SESSION['License_plate'] = $row_employee['License_plate'];
       //echo "<script language=\"Javascript\">";
       //echo "alert('เข้าสู่ระบบเรียบร้อย')";
       ?>
       <script>
       if (confirm("เข้าสู่ระบบเรียบร้อย")) {
         window.location="index.php"; 
       }
       </script>
       <?php
       //echo "</script>";
       //header("Location: index.php");
    }
    else{

        ?>
        <script>
        if (confirm('อีเมลหรือรหัสผ่านไม่ถูกต้อง')) {
          window.location="index.php"; 
        }
        </script>
        <?php
        
    }
    }
    session_write_close();
      
?>