<?php 
include("header.php")
?>
<?php 
if(isset($_GET['id'])){
    $catid=$_GET['id'];
    $query=$pdo->prepare("select * from category where id =:ci");
    $query->bindParam('ci',$catid);
$query->execute();
$row=$query->fetch(PDO::FETCH_ASSOC);
    
} ?>


<div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add  CAtegory</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="catid" value="<?php echo $row['id'] ?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="catname" value="<?php echo $row['catogeryname'] ?>">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="catimg">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"  value=>
                                    <img src="catimg/<?php echo $row['catogeryimg'] ?>?>"  width="100px" alt=""> 
                                    <br>
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="updcat">Add category</button>
                            </form>
                        </div>
                    </div>
</div>



<?php 
include("footer.php")
?>