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
<div class="table-responsive">
    <table class="table table-primary">
   
 
        
        <tbody>
        <?php 
  $arr =[["ali" , 20, "cpism" , 8500],
  ["aliya" , 12, "cdism" , 8500],
  ["alan" , 18, "dism" , 8500]
  ]
  ?>
    <?php
  for($i = 0; $i < count($arr); $i++){
   
    ?>
            <tr class="">
           <?php for($j= 0 ; $j < count($arr[$i]);$j++){
            ?>
                <td scope="row"> <?php echo $arr[$i][$j] ?>
    <?php
    }
  }
  ?></td>
              
            </tr>
            
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