
<?php
    require 'connect.php';
     $email = $_POST["email"];
    echo $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    
      ?>
      <script>
      if (confirm("อีเมลไม่ถูกต้อง")) {
        window.location="register2.php"; 
      }
      </script>
      <?php
      exit();
     
    }
    if (strlen($_POST['tel']) != "9" AND strlen($_POST['tel']) != "10")
     {
      ?>
      <script>
      if (confirm("เบอร์โทรศัพท์ไม่ถูกต้อง")) 
      {
        window.location="register2.php"; 
      }
      </script>
      <?php
      exit();
     }
    
     if (strlen($_POST['idcard']) != "13")
    {
    
      ?>
      <script>
      if (confirm("เลขบัตรประจำตัวประชาชนไม่ถูกต้อง")) {
        window.location="register2.php"; 
      }
      </script>
      <?php
      exit();
     }
   
    if($_POST["psw"] != $_POST["psw-repeat"])
    {
        ?>
        <script>
        if (confirm("รหัสผ่านไม่ถูกต้อง")) {
          window.location="register2.php"; 
        }
        </script>
        <?php
        exit();
    }
    $strSQL = "SELECT * FROM employee WHERE IDcard = '".trim($_POST['idcard'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if($objResult)
    {
        ?>
        <script>
        if (confirm("เลขที่บัตรประชาชนนี้มีผู้ใช้งานแล้ว")) {
          window.location="register2.php"; 
        }
        </script>
        <?php
            exit();
            die;
    }
    $strSQL = "SELECT * FROM employee WHERE Email = '".trim($_POST['email'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM);
    if ($objResult) {
        ?>
        <script>
        if (confirm("อีเมลนี้ได้ถูกใช้งานแล้ว กรุณาใส่อีเมลใหม่")) {
          window.location="register2.php"; 
        }
        </script>
        <?php
            exit();
            die;
    }
    else
    {
    $employee = "SELECT * FROM employee";
    $query = mysqli_query($conn,$employee);
    $num = mysqli_num_rows($query);

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
       ?>
       <script>
       if (confirm("ลงทะเบียนเรียบร้อย")) {
         window.location="index.php"; 
       }
       </script>
       <?php
    }
    else{
        echo("เกิดข้อผิดพลาด กรุณาลองอีกครั้ง").mysqli_error($conn);
    }
}
    mysqli_close($conn);
?>