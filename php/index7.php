<?php  
include("header.php");
include("connection.php");
?>





<table class="table table-responsive table-primary">
        <thead class="thead-inverse">
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">urdu</th>
                <th scope="col">english</th>
                <th scope="col">math</th>
                <th scope="col">computer</th>
                <th scope="col">Chemistry</th>
                <th scope="col">obtmarks</th>
                <th scope="col">totmarks</th>
                <th scope="col">percentage</th>
                <th scope="col">grade</th>
                <th scope="col">remarks</th>
                <th colspan="2" >action</th>

            </tr>
        </thead>
       
   
        <tbody>
        <?php
        $query = $pdo->query('select * from marksheet'); 
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){?>
            <tr class="table-primary">
                <td scope="row"><?php echo $row['id']?></td>
                <td scope="row"><?php echo $row['stdname']?></td>

                <td scope="row"><?php echo $row['urdu']?></td>

                <td scope="row"><?php echo $row['english']?></td>

                <td scope="row"><?php echo $row['math']?></td>

                <td scope="row"><?php echo $row['computer']?></td>


                <td scope="row"><?php echo $row['chemistry']?></td>

                <td scope="row"><?php echo $row['obtmarks']?></td>

                <td scope="row"><?php echo $row['totmarks']?></td>
                <td scope="row"><?php echo $row['percentage']?></td>
                <td scope="row"><?php echo $row['grade']?></td>
                <td scope="row"><?php echo $row['remarks']?></td>
                <td scope="row"><a href="update.php?sid=<?php echo $row['id']?>" class="btn btn-secondary" role="button">Edit</a></td>
                <td scope="row"><a href="?did=<?php echo $row['id']?>" class="btn btn-primary" role="button">Delete</a></td>
              <?php
               }
              if(isset($_GET ['did'])){
                $iid =$_GET['did'];
                $query=$pdo->prepare('delete from marksheet where id = :pid');
                $query->bindParam('pid',$iid);
                $query->execute();
                echo "<script>alert ('data deleted');
 location.assign('index7.php'); </script>";
              }?>


                

               
            </tr>
           
               <?php
              
            ?>
        </tbody>
     
    </table>
 
   


<?php
 include("footer.php");
 ?>