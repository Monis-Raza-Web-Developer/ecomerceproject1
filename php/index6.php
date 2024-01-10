<?php  include ("header.php");
include("connection.php")?>
<div class="container">
    <form action="" method ="post">
        <div class="mb-3">
          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="uname" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">urdu</label>
          <input type="number" class="form-control" name="uemail" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">english</label>
          <input type="number" class="form-control" name="upass" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">math</label>
          <input type="number" class="form-control" name="umath" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">computer</label>
          <input type="number" class="form-control" name="ucomp" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        
        <div class="mb-3">
          <label for="" class="form-label">chemistry</label>
          <input type="number" class="form-control" name="uchem" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <button type ="submit" class="btn btn-primary" name="click">submit</button>
    </form>
</div>
<?php
if(isset($_POST["click"])){
  $data = $_POST ["uname"];
  $em = $_POST ["uemail"];
  $uc = $_POST ["upass"];
  $mat = $_POST ["umath"];
  $com = $_POST ["ucomp"];
  $ch = $_POST ["uchem"];
  $obt = $em + $uc + $mat + $com + $ch;
 $tot = 500;
  $per = $obt / $tot * 100;
  $grade ="";
  $rem ="";

  
  if($per > 89){
      $grade = "A1";
      $rem = "EXCELLENT";
  }
  elseif($per >79){
    $grade = "A";
    $rem = "VERY GOOD";
  }
  elseif($per >69){
    $grade = "B";
    $rem = "GOOD";
  }
  elseif($per >59){
    $grade = "C";
    $grade = "POOR";
  }
  elseif($per >49){
    $grade = "D";
    $grade = "VERY POOY";
  }
  else{
    $grade = "fail";
    $rem = " parha karo  " . $data ;
  };
 
  $query = $pdo->prepare("insert into marksheet (stdname,urdu,english,math,computer,chemistry,obtmarks,percentage,grade,remarks)values
  (:pn,:pu,:pe,:pm,:pc,:pcem,:po,:pp,:pg,:pr)");
  $query->bindParam("pn",$data);
  $query->bindParam("pu",$em);
  $query->bindParam("pe",$uc);
  $query->bindParam("pm",$mat);
  $query->bindParam("pc",$com);
  $query->bindParam("pcem",$ch);
  $query->bindParam("po",$obt);
  $query->bindParam("pp",$per);
  $query->bindParam("pg",$grade);
  $query->bindParam("pr",$rem);


  $query->execute();
  echo "<script> alert('data inserted')</script>";}?>
<?php
include("footer.php")
?>