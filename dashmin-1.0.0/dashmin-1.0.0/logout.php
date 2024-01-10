<?php  
session_start();

unset($_SESSION['useremail']);
echo "<script>alert('log out');
location.assign('signin.php') </script>";
?>