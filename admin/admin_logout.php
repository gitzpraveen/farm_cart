<?php
session_start();
echo "<script>alert('LOGOUT Successfully');</script>";
session_destroy();
header("Location: admin_login.php");
exit();
?>