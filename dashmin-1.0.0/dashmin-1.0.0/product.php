<?php include("header.php") ?>
<div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">add product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="prname">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product price</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="prprice">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">product quantity</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="prquan">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="primg">
                                </div>
                                <select class="form-select form-select-sm mb-3" name="prcate" aria-label=".form-select-sm example">
                                <option  selected>Select category</option>
                                <?php 
                                $query=$pdo->query('select * from category');
                                    $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $catitem){?>
                                    <option value="<?php echo $catitem['id'] ?>" ><?php echo $catitem['catogeryname'] ?></option>
<?php
                                    }
                                
                                ?>
                                
                                
                            </select>

                                
                                <button type="submit" name="addproduct" class="btn btn-primary">add product</button>
                            </form>
                        </div>
                        <?php  
                         ?>
<?php include("footer.php") ?>
