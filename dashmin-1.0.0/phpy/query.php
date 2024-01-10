<?php 
session_start();
// session_unset();
include("connection.php");
// sign up
if(isset($_POST['dashboard'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $pass =$_POST['upass'];
    $query= $pdo->prepare('insert into users (name,email,passwords)values(:pn,:pe,:pp)');
    $query->bindParam("pn",$name);
    $query->bindParam("pe",$email);
    $query->bindParam("pp",$pass);
    $query->execute();
    echo "<script> alert('sign up succesfull');
    location.assign('signin.php')</script>";}
    

// sign in 


if(isset($_POST['login'])){
  $nm = $_POST['uemai'];
  $ps = $_POST['pass'];
  $query =$pdo->prepare('select * from users where email =:pe and passwords =:pp');
  $query->bindParam("pe",$nm);
  $query->bindParam("pp",$ps);
  $query->execute();
  $row=$query->fetch(PDO::FETCH_ASSOC);
if($row)
{
  $_SESSION['username']=$row['name'];
  $_SESSION['useremail']=$row['email'];
  $_SESSION['userpassword']=$row['passwords'];
  $_SESSION['userole']=$row['role'];
echo"<script>alert('login succesfull');
location.assign('index.php')</script>";
}

}


// add category

if(isset($_POST['addcat'])){
  $catnm=$_POST['catname'];
  $catimg = $_FILES['catimg']['name'];
  $tmpname=$_FILES['catimg']['tmp_name'];
  $extension=pathinfo($catimg,PATHINFO_EXTENSION);
  $designation="catimg/".$catimg;
  if($extension=="jpg" || $extension="jpeg" || $extension="png" || $extension ="webp"){
    if(move_uploaded_file($tmpname,$designation)){
      
        $query=$pdo->prepare('insert into category (catogeryname,catogeryimg)
        values(:cn,:ci)');
        $query->bindParam('cn',$catnm);
        $query->bindParam('ci',$catimg);
        $query->execute();
        echo "<script> alert('add succesfully')</script>";
    }
  }

}


// update category



if(isset($_POST['updcat'])){
  $id=$_POST['catid'];
  $catnm=$_POST['catname'];
  $catimg = $_FILES['catimg']['name'];
  if(!empty($catimg)){
  $tmpname=$_FILES['catimg']['tmp_name'];
  $extension=pathinfo($catimg,PATHINFO_EXTENSION);
  $designation="catimg/".$catimg;
if($extension =="jpg" || $extension =="png" || $extension =="jpeg" || $extension =="webp"){
  if(move_uploaded_file($tmpname,$designation)){
    $query=$pdo->prepare('update category set catogeryname=:cn,catogeryimg=:ci where id =:cid');
    $query->bindParam('cn',$catnm);
    $query->bindParam('ci',$catimg);
    $query->bindParam('cid',$id);
    $query->execute();
    echo "<script> alert('update category with image succesfully');
    location.assign('viewcategory.php')</script>";
  }
}

 }else{
  $query=$pdo->prepare('update category set catogeryname=:cn where id =:cid');
  $query->bindParam('cn',$catnm);
  
  $query->bindParam('cid',$id);
  $query->execute();
  echo "<script> alert('update category without image succesfully');
  location.assign('viewcategory.php')</script>";
 }
}


 // add product
if(isset($_POST['addproduct'])){
  $prnm=$_POST['prname'];
  $prpi=$_POST['prprice'];
  $prqu=$_POST['prquan'];
  $prcat=$_POST['prcate'];
  $primg = $_FILES['primg']['name'];
  $prtmpname=$_FILES['primg']['tmp_name'];
  $extension=pathinfo($primg,PATHINFO_EXTENSION);
  $designation="productimg/".$primg;
  if($extension=="jpg" || $extension="jpeg" || $extension="png" || $extension ="webp"){
    if(move_uploaded_file($prtmpname,$designation)){
      
        $query=$pdo->prepare('insert into products (product_name,product_price,product_quantity,product_image,category_type)
        values(:pn,:pp,:pq,:pi,:ct)');
        $query->bindParam('pn',$prnm);
        $query->bindParam('pp',$prpi);
        $query->bindParam('pq',$prqu);
        $query->bindParam('pi',$primg);
        $query->bindParam('ct',$prcat);
        $query->execute();
        echo "<script> alert('add succesfully')</script>";
    }
  }

}

// update product

if(isset($_POST['updpro'])){
  $proid=$_POST['proid'];
  $pronm=$_POST['proname'];
  $proprice=$_POST['proprice'];
  $proq=$_POST['proquan'];
  $proimg = $_FILES['proimg']['name'];
  if(!empty($proimg)){
  $protmpname=$_FILES['proimg']['tmp_name'];
  $proextension=pathinfo($proimg,PATHINFO_EXTENSION);
  $prodesignation="productimg/".$proimg;
  if($proextension=="jpg" || $proextension="jpeg" || $proextension="png" || $proextension ="webp"){
    if(move_uploaded_file($protmpname,$prodesignation)){

    $query=$pdo->prepare('update products set product_name=:pn,product_image=:pi,product_price=:pp,product_quantity=:pq where productid =:pid');
    $query->bindParam('pn',$pronm);
    $query->bindParam('pid',$proid);

    $query->bindParam('pi',$proimg);
    $query->bindParam('pp',$proprice);
    $query->bindParam('pq',$proq);
    $query->execute();
    echo "<script> alert('update products with image succesfully');
    location.assign('viewproduct.php')</script>";
   }  }}else{
    $query=$pdo->prepare('update products set product_name=:pn,product_price=:pp,product_quantity=:pq where productid =:pid');
    $query->bindParam('pn',$pronm);
    $query->bindParam('pid',$proid);

    $query->bindParam('pp',$proprice);
    $query->bindParam('pq',$proq);
    $query->execute();
    echo "<script> alert('update products without image succesfully');
    location.assign('viewproduct.php')</script>";
   }

  }

?>


