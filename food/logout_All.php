<?php
session_start();
unset($_SESSION['First_name']);
unset($_SESSION['Last_name']);
unset($_SESSION['Tel']);
unset($_SESSION['Email']);
unset($_SESSION['IDcard']);
unset($_SESSION['Address']);

echo "<script language=\"Javascript\">";
echo "alert('ออกจากระบบ')";
echo "</script>";
header("Location: index.php");
 session_write_close();
 ?>
