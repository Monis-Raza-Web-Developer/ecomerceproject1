<?php
include ("header.php") ?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">product name</th>
                                        <th scope="col">product image</th>
                                        <th scope="col">product price</th>

                                        <th scope="col">product quantity</th>
                                        <th scope="col">category name</th>
                                        
                                        <th scope="col" colspan="2" class="text-center">action</th>


                                    </tr>
                                </thead>
                               
                                <tbody>
                                <?php 
                                $qery=$pdo->query("SELECT `products`.*, `category`.`catogeryname`
                                FROM `products` 
                                    inner JOIN `category` ON `products`.`category_type` = `category`.`id`;");
                                $result=$qery->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['productid'] ?></td>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td><img src="productimg/<?php echo $row['product_image'] ?>?>"  width="100px" alt=""></td>
                                        <td><?php echo $row['product_price'] ?></td>
                                        <td><?php echo $row['product_quantity'] ?></td>
                                        <td><?php echo $row['catogeryname'] ?></td>
                                        <td ><a href="updateproduct.php?id=<?php echo $row['productid']  ?>" class="btn btn-primary">edit</a></td>
                <td scope="row"><a href="?did=<?php echo $row['productid']?>" class="btn btn-primary" role="button">Delete</a></td>
                                     
                                    </tr>
</tbody><?php }
  if(isset($_GET ['did'])){
    $iid =$_GET['did'];
    $query=$pdo->prepare('delete from products where productid = :bid');
    $query->bindParam('bid',$iid);
    $query->execute();
    echo "<script>alert ('data deleted');
location.assign('viewproduct.php'); </script>";
  }?>

                            </table>
                     
                    </div>
                   
                    </div>
                </div>
         

<?php
include ("footer.php") ?>