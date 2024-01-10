<?php 
session_start();
// session_unset();
include ("header.php");
include("connection.php")?>
<form action="" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Email</label>
      <input type="email" class="form-control" name="uemail" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">password</label>
      <input type="password" class="form-control" name="upass" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
    </div>
    <button type ="submit" class="btn btn-primary" name="login">submit</button>
</form>


<?php
if(isset($_POST["login"])){
    $em = $_POST ["uemail"];
    $uc = $_POST ["upass"];
$query= $pdo->prepare('select * from users where email =:pe && passwords = :pp   ');
$query->bindParam('pe',$em);
$query->bindParam('pp',$uc);
$query->execute();

$row=$query->fetch(PDO::FETCH_ASSOC);
if($row)
{
  $_SESSION['username']=$row['name'];
  $_SESSION['useremail']=$row['email'];
  $_SESSION['userpassword']=$row['passwords'];
  $_SESSION['userid']=$row['id'];
echo"<script>alert('login succesfull');
location.assign('profile.php')</script>";
}
}
?>

<?php 
include("footer.php")?>