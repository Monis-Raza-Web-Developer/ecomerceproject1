<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form action="" method ="POST">
      <label for="" class="form-label">Name</label>
      <input type="text" name="uname" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
      <label for="" class="form-label">email</label>
      <input type="email" name="uemail" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
      <label for="" class="form-label">course</label>
      <input type="text" name="ucourse" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
      <label for="" class="form-label">fees</label>
      <input type="number" name="ufees" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
      <button type ="submit" name =" click">submit</button>
</form>
    </div>
    
        <!-- echo $em;
        echo $uc;
        echo $uf; -->
        
    
  <div class="table-responsive">
    <table class="table table-primary">
    <?php 
    if(isset ($_POST["click"])){
        
        $data = $_POST ["uname"];
        $em = $_POST ["uemail"];
        $uc = $_POST ["ucourse"];
        $uf = $_POST ["ufees"];?>
        <tbody>
            <tr class="">
                <th scope="row">name</th>
                <th>email</th>
                <th>course</th>
                <th>fees</th>
            </tr>
            <tr class="">
        
                <td scope="row"><?php echo $data ?></td>
                <td><?php echo $em ?></td>
                <td><?php echo $uc ?></td>
                <td><?php echo $uf ?></td>
            </tr>
            <?php
          }?>
        </tbody>
    </table>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>