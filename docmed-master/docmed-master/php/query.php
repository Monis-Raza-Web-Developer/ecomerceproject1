<?php 
include("connection.php");
session_start();
   


// sign up

if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $passwords = $_POST['password'];
    $role= $_POST['role'];
    $query=$pdo->prepare("insert into users (name,email,passwords,role)values(:un,:ue,:up,:ur)");
     $query->bindParam("un",$name);
     $query->bindParam("ue",$email);
     $query->bindParam("up",$passwords);
     $query->bindParam("ur",$role);
     $query->execute();
     echo "<script>alert('sign up succesfully');
     location.assign('login.php')</script>";
    
    }


      // log in
         if(isset($_POST['login'])){
            $logemail=$_POST['logemail'];
            $logpassword=$_POST['logpassword'];
            $query=$pdo->prepare("select * from users where email=:loge AND passwords =:logp ");
            $query->bindParam('loge',$logemail);
            $query->bindParam('logp',$logpassword);
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

     


 ?>