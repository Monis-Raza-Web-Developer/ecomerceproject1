<?php  
session_start();
// session_unset();
include("coonection.php");
if(isset($_POST['addcart'])){
if (isset($_SESSION['cart'])){
    $productId=array_column($_SESSION['cart'],'pid');
    if(in_array($_POST['proid'],$productId)){
        echo "<script>alert('This Product Already Exists')</script>";
    }else{
        $count=count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array("pid"=>$_POST['proid'],"pname"=>$_POST['pnam'],"pimg"=>$_POST['pimage'],"pprice"=>$_POST['ppri'],"pquan"=>$_POST['pqan']);
        echo "<script>alert('add to product added');
        location.assign('shoping-cart.php')</script>";
    }
}
else{
    $_SESSION['cart'][0]=array("pid"=>$_POST['proid'],"pname"=>$_POST['pnam'],"pimg"=>$_POST['pimage'],"pprice"=>$_POST['ppri'],"pquan"=>$_POST['pqan']);
    echo "<script>alert('add to product added');
    location.assign('shoping-cart.php')</script>";
}
}


//remove cart product

if(isset($_GET['removid'])){
    $remove=$_GET['removid'];
    foreach($_SESSION['cart'] as $key=>$value){
        if($remove==$value['pid']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>alert('remove');
            location.assign('shoping-cart.php')</script>";
        }
    }
}








  // sign up
if(isset($_POST['signup'])){
    $name =$_POST['name'];
    $em =$_POST['uemai'];
    $upas =$_POST['upass'];
    $query=$pdo->prepare('insert into users (name,email,passwords)values(=:pn,=:pem,=:ps)');
    $query->bindParam('pn',$name);
    $query->bindParam('pem',$em);
    $query->bindParam('ps',$upas);
    $query->execute();


}

// log in
if(isset($_POST['login'])){
    $nm=$_POST['uemail'];
    $ps=$_POST['pass'];
    $query=$pdo->prepare('select * from users where email =:pe and passwords =:ps');
    $query->bindParam('pe',$nm);
    $query->bindParam('ps',$ps);
    $query->execute();
    $row=$query->fetch(pdo::FETCH_ASSOC);
    if($row){
        $_SESSION['userid']=$row['id'];

        $_SESSION['username']=$row['name'];
        $_SESSION['useremail']=$row['email'];
        $_SESSION['userpassword']=$row['passwords'];
        $_SESSION['userole']=$row['role']; echo"<script>alert('login succesfull');
        location.assign('index.php')</script>";
       }
        }

           // insert review
    if(isset($_POST['reve'])){
        $rud=$_SESSION['userid'];
        $review=$_POST['revei'];
        $urn=$_POST['uen'];
        $ure=$_POST['ueemail'];
        $rpid = $_GET['detid'];
        $query=$pdo->prepare('insert into reviews (productid,userid,username,useremail,review) values 
        (:prid,:urid,:urnm,:urem,:rev)');
        $query->bindParam('prid',$rpid);
        $query->bindParam('urid',$rud);
        $query->bindParam('urnm',$urn);
        $query->bindParam('urem',$ure);
        $query->bindParam('rev',$review);
        $query->execute();
        echo "<script>alert('your review added');
        </script>";

        }
        
     
    
    

      // orderplace
        if(isset($_POST['orderplace'])){
            $uid=$_SESSION['userid'];
            $nme=$_POST['nme'];
            $uem=$_POST['uem'];

            $unum=$_POST['number'];
            $addres=$_POST['address'];
            foreach($_SESSION['cart'] as $key=>$values){
                $prid=$values['pid'];
                $prnm=$values['pname'];
                $prqn=$values['pquan'];
                $pric=$values['pprice'];
                $query=$pdo->prepare("insert into orders (userid,productid,productname,productquantity,productprice,username,useremail,usernum,useraddress) values(:ui,:pi,:pon,:poq,:pop,:pun,:ue,:unum,:oa)");
                $query->bindParam('ui',$uid);
                $query->bindParam('pi',$prid);
                $query->bindParam('pon',$prnm);
                $query->bindParam('pop',$pric);
                $query->bindParam('poq',$prqn);
                $query->bindParam('pun',$nme);
                $query->bindParam('ue',$uem);
                $query->bindParam('unum',$unum);
                $query->bindParam('oa',$addres);
                $query->execute();
                unset($_SESSION['cart']);


            }

            echo"<script>alert('your order place succesfull');
            location.assign('index.php')</script>";

        }
      
       

 // search filtration


 if(isset($_POST['search'])){
    $search=$_POST['search'];
    $query=$pdo->prepare("select * from products where product_name like '%$search%'");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $proan){?>
    
    
        <!-- Block2 -->
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="../dashmin-1.0.0/dashmin-1.0.0/productimg/<?php echo $proan['product_image']?>" alt="IMG-PRODUCT">

                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick View
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="product-detail.php?detid=<?php echo $proan['productid'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        <?php echo $proan['product_name'] ?>
                    </a>

                    <span class="stext-105 cl3">
                    <?php echo $proan['product_price'] ?>
                        
                    </span>
                </div>

                
            </div>
        </div>
    </div>
    <?php } }


if(isset($_POST ['deltrev'])){
    // $rb= $_post ['deltev'];
    $ridi= $_POST['delt'];
    $query=$pdo->prepare('delete from reviews where rid = :diid');
    $query->bindParam('diid',$ridi);
    $query->execute();
 

}
     ?>


 