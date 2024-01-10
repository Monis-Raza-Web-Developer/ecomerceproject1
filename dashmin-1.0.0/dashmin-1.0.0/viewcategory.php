<?php
include ("header.php"); ?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">category name</th>
                                        <th scope="col">category image</th>
                                        <th scope="col" colspan="2" class="text-center">action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                <?php 
                                $qery=$pdo->query("select * from category");
                                $result=$qery->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['catogeryname'] ?></td>
                                        <td><img src="catimg/<?php echo $row['catogeryimg'] ?>"  width="100px" alt=""></td>
                                        <td > <a href="updatecategory.php?id=<?php echo $row['id']  ?>" class="btn btn-primary">edit</a></td>
                                        <td scope="row"><a href="?did=<?php echo $row['id']?>" class="btn btn-primary" role="button">Delete</a></td>

                                    </tr>
</tbody><?php }

if(isset($_GET ['did'])){
    $iid =$_GET['did'];
    $query=$pdo->prepare('delete from category where id = :cid');
    $query->bindParam('cid',$iid);
    $query->execute();
    echo "<script>alert ('data deleted');
location.assign('viewcategory.php'); </script>";
  }?>?>
                            </table>
                     
                    </div>
                   
                    </div>
                </div>
         

<?php
include ("footer.php") ?>