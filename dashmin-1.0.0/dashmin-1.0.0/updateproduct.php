<?php 
include("header.php")
?>
<?php 
if(isset($_GET['id'])){
    $proid=$_GET['id'];
    $query=$pdo->prepare("select * from products where productid =:pi");
    $query->bindParam('pi',$proid);
$query->execute();
$row=$query->fetch(PDO::FETCH_ASSOC);
    
} ?>


<div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">update product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="proid" value="<?php echo $row['productid']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proname" value="<?php echo $row['product_name'] ?>">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">pro image</label>
                                  
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="proimg">
                                    <img src="catimg/<?php echo $row['product_image'] ?>?>"  width="100px" alt=""> 
                                </div>
                                
                                   

                                    <label for="exampleInputEmail1" class="form-label">product price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proprice" value="<?php echo $row['product_price'] ?>">
                                        <label for="exampleInputEmail1" class="form-label">product quantity</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proquan" value="<?php echo $row['product_quantity'] ?>">






                                        <h5>select categery</h5>
                                          <select class="form-select form-select-sm mb-3" name="prcate" aria-label=".form-select-sm example">
                                <option  selected>Select category</option>
                                <?php 
                                $query=$pdo->query('select * from category');
                                    $cat=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($cat as $catitem){?>
                                    <option  value="<?php echo $catitem['id'] ?>" <?=$row['category_type']==$catitem['id']? 'selected':''
                                    ?>> <?php echo $catitem['catogeryname'] ?>
                                </option>
                                <?php }
                                ?>
                                   </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="updpro">update product</button>
                            </form>
                        </div>
                    </div>
</div>



<?php 
include("footer.php")
?>