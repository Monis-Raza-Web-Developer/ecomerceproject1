<?php
include("header.php") ?>

<div class="container">
<form action="" method ="POST">
<div class="mb-3">
  <label for="" class="form-label">countrydode</label>
  <input type="text" class="form-control" name="ccode" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
  <small id="emailHelpId" class="form-text text-muted">Help text</small>
</div>
<button type ="submit" class="btn btn-primary" name =" click">submit</button>
</form>
</div>
<?php 
if(isset ($_POST["click"])){
        
    $data = $_POST ["ccode"]; 
    $code ="+92";
    $c  = strcmp($code,$data);
    if($c==0 ){
        echo "<script>alert('true') </script>";}
    else{
        echo "<script>alert('false') </script>";
    }


}
?>
<?php
include ("footer.php") ?>