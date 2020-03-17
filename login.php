
<?php
    session_start();
    require 'connect.php';
    if($_POST['uname']=='admin' and $_POST['psw'] == '12345678')
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
    $sql = "SELECT Ban_Customer FROM customer WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw'])."'";
    $query_user = mysqli_query($conn,$sql);
    $result_user = mysqli_fetch_array($query_user);
    if($result_user['Ban_Customer'] == "ระงับการใช้งาน")
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
    $sql = "SELECT * FROM customer WHERE Email='".mysqli_real_escape_string($conn,$_POST['uname'])."' AND Password='".mysqli_real_escape_string($conn,$_POST['psw'])."'";
    $result_user = mysqli_query($conn,$sql);
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    if($row_user){
       $_SESSION['Status'] = "User";
       $_SESSION['Customer_ID'] = $row_user['Customer_ID'];
       $_SESSION['First_name'] = $row_user['First_name'];
       $_SESSION['Last_name'] = $row_user['Last_name'];
       $_SESSION['Tel'] = $row_user['Tel'];
       $_SESSION['Email'] = $row_user['Email'];
       $_SESSION['IDcard'] = $row_user['IDcard'];
       $_SESSION['Address'] = $row_user['Address'];
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
    session_close();
      
?>