<?php
include("header.php");
include("connection.php")?>
<div class="container">
    <form action="" method ="post">
        <div class="mb-3">
          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="uname" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" name="uemail" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" name="upass" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <button type ="submit" class="btn btn-primary" name="click">submit</button>
    </form>
</div>
<?php
if(isset($_POST["click"])){
  $data = $_POST ["uname"];
  $em = $_POST ["uemail"];
  $uc = $_POST ["upass"];
  $query = $pdo->prepare("insert into users (name,email,passwords)values(:pn,:pe,:pp)");
  $query->bindParam("pn",$data);
  $query->bindParam("pe",$em);
  $query->bindParam("pp",$uc);
  $query->execute();
  echo "<script> alert('data inserted')</script>";


}
  ?>

<?php
include("footer.php")?>
