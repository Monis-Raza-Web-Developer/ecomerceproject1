<?php
include("header.php")?>

<div class="container">
    <h2 class="text-center text-capitalize text-info">marksheet</h2>
   <form action="
   " method ="POST">
   <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input type="text" name="uname" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">physics</label>
      <input type="text" name="uphy" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">chemistry</label>
      <input type="text" name="uchem" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">math</label>
      <input type="text" name="umath" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">pst</label>
      <input type="text" name="upst" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">computer</label>
      <input type="text" name="ucomp" id="" class="form-control" placeholder="" aria-describedby="helpId">
      
    </div>

    <button type ="submit" class="btn btn-primary" name =" click">submit</button>

</form>
</div>


<div class="table-responsive ">


    <table class="table table-primary">
    <?php
if(isset($_POST["click"])){
  $data = $_POST ["uname"];
  $em = $_POST ["uphy"];
  $uc = $_POST ["uchem"];
  $uf = $_POST ["umath"];
  $pst = $_POST ["upst"];
  $comp = $_POST ["ucomp"];
 
  

$obt = $em + $uc + $uf + $pst + $comp;
 
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
  }
 ?>
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">physics</th>
                <th scope="col">Chemistry</th>
                <th scope="col">math</th>
                <th scope="col">PSt</th>
                <th scope="col">Computer</th>
                <th scope="col">obtained marks</th>
                <th scope="col">total marks</th>
                <th scope="col">percentage</th>
                <th scope="col">grade</th>
                <th scope="col">remarks</th>

            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">1</td>
                
                <td><?php echo $data ?></td>
                <td><?php echo $em ?></td>
                <td><?php echo $uc ?></td>
                <td><?php echo $uf ?></td>
                <td><?php echo $pst ?></td>
                <td><?php echo $comp ?></td>
                <td><?php echo $obt ?></td>
                <td><?php echo $tot ?></td>
                <td><?php echo $per ?></td>
                <td><?php echo $grade ?></td>
                <td><?php echo $rem ?></td>

            </tr>
<?php 
}?>
        </tbody>
    </table>
</div>

<?php include ("footer.php")?>