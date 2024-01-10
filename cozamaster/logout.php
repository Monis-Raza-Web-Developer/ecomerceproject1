<?php  
session_start();
// unset($_SESSION['cart']);
unset($_SESSION['useremail']);
echo "<script>alert('log out');
location.assign('index.php') </script>";
?>