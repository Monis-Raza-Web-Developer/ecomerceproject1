






                        
<?php include("header.php") ?>
<div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">add category</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">catogery name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="catname">
                                    
                                </div>
                               
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">catogery image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="catimg">
                                </div>
                            
                             
                                
                                
                            </select>

                                
                                <button type="submit" name="addcat" class="btn btn-primary">add category</button>
                            </form>
                        </div>
                        <?php  
                         ?>
<?php include("footer.php") ?>

                   

   



