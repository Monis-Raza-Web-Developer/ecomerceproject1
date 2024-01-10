<?php 
session_start();
include("header.php");
include("connection.php");
if(isset($_SESSION['useremail'])){?> 


<div class="conatiner">
<form action="" method="post">
        <div class="mb-3">
          
          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="uname" value="<?php echo $_SESSION['username'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">email</label>
          <input type="email" class="form-control" name="uemail" id="" value="<?php echo $_SESSION['useremail'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">password</label>
          <input type="password" class="form-control" name="upass" id="" value="<?php echo $_SESSION['userpassword'] ?>">
        </div>
        
        
        <button type ="submit" class="btn btn-primary" name="click">submit</button>
    </form>
    </div>


<?php
}else{
    echo "<script>location.assign('login.php')</script>";
}
if(isset($_POST["click"])){
    $name =$_POST['uname'];
    $email =$_POST['uemail'];
    $pass =$_POST['upass'];
    $uid =$_SESSION['userid'];
      
    $query = $pdo->prepare("update users set name = :pn, email= :pe,
    passwords = :pw where id = :pid");
    $query->bindParam("pn",$name);
    $query->bindParam("pe",$email);
    $query->bindParam("pw",$pass);
    $query ->bindParam("pid",$uid);
    $query->execute();
echo "<script>alert('data update succesfully');
location.assign('login.php') </script>";
   
unset($_SESSION['useremail']);
}
?>
<?php
include("footer.php")?>