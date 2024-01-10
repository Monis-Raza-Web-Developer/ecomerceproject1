<?php  include("header.php");
include("connection.php");
?>

<?php 
if(isset($_GET['sid'])){
$sid = $_GET['sid'];
$query =$pdo->prepare('select * from marksheet where id = :pid');
$query->bindParam('pid',$sid);
$query->execute();
$row=$query->fetch(PDO::FETCH_ASSOC);
?>

<div class="conatiner">
<form action="" method="post">
        <div class="mb-3">
          <input type="hidden" name="uid" value="<?php echo $row['id']?>">
          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="uname" value="<?php echo $row['stdname']?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">urdu</label>
          <input type="number" class="form-control" name="uemail" id="" value="<?php echo $row['urdu']?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">english</label>
          <input type="number" class="form-control" name="upass" id="" value="<?php echo $row['english']?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">math</label>
          <input type="number" class="form-control" name="umath" id="" value="<?php echo $row['math']?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">computer</label>
          <input type="number" class="form-control" name="ucomp" id="" value="<?php echo $row['computer']?>">
        </div>
        
        <div class="mb-3">
          <label for="" class="form-label">chemistry</label>
          <input type="number" class="form-control" name="uchem" id="" value="<?php echo $row['chemistry']?>">
        </div>
        <button type ="submit" class="btn btn-primary" name="click">submit</button>
    </form>
    </div>



    <?php
}
if(isset($_POST["click"])){
  $uid = $_POST["uid"];
  $data = $_POST["uname"];
  $em = $_POST["uemail"];
  $uc = $_POST["upass"];
  $mat = $_POST["umath"];
  $com = $_POST["ucomp"];
  $ch = $_POST["uchem"];
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
    $rem = "FAIL HO";
  };
 
 
  $query = $pdo->prepare("update marksheet set stdname = :pn,urdu = :pu,english = :pe,math = :pm,computer = :pc,chemistry = :pchem,obtmarks = :po,percentage = :pper,grade = :pg,remarks = :pr where id = :pid");
  $query->bindParam("pid",$uid);
  $query->bindParam("pn",$data);
  $query->bindParam("pu",$em);
  $query->bindParam("pe",$uc);
  $query->bindParam("pm",$mat);
  $query->bindParam("pc",$com);
  $query->bindParam("pchem",$ch);
  $query->bindParam("po",$obt);
  $query->bindParam("pper",$per);
  $query->bindParam("pg",$grade);
  $query->bindParam("pr",$rem);
  $query->execute();
 echo "<script>alert ('data updated');
 location.assign('index7.php'); </script>";
}
?>
<?php
 include("footer.php");
 ?>