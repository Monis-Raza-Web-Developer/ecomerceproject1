<?php include("header.php")


                                $query=$pdo->prepare("SELECT * from users where id=:uid ");
                                $query->execute()

                                $result=$query->fetch(PDO::FETCH_ASSOC);
                                foreach($result as $row){ ?>
                                
<div class="container-fluid">
    
                 <div class="container">
                 <div class="card mb-3" >
  <div class="row g-0">
    <div class="col-sm-4">
      <img src="img/user.jpg" class="" width="100%"  alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-text">Name : <?php echo $row['name']?></h6>
        <h6 class="card-text">Email :<?php echo $ro ?> </h6>
        <h6 class="card-text">Password:</h6>
                               <?php }
                               ?>
      </div>
    </div>
  </div>
</div>
                 </div>>

<?php include("footer.php") ?>