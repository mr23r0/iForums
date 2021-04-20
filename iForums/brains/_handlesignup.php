<?php

 if($_SERVER["REQUEST_METHOD"]=="POST"){
     include'_dbconnect.php';
     $username=$_POST['username'];
     $email=$_POST['email'];
     $password= $_POST['password'];        
     $confirmpassword=$_POST['confirmpassword'];
     $exisql="SELECT * FROM `users` WHERE username = '$username'";
     
     $result=mysqli_query($conn,$exisql);
     $numrows=mysqli_num_rows($result);
     if($numrows>0){
         $showerr ="Username/Email already in use";
     }
     else {
         if($password==$confirmpassword) {
           $hash=password_hash($password, PASSWORD_DEFAULT);
           $sql="INSERT INTO `users` ( `username`, `email`, `password`, `dt`) VALUES ( '$username', '$email', '$hash', current_timestamp())" ;
           $result=mysqli_query($conn,$sql);
           if($result){
               $showalert=true;
               header("Location:/iForums/?success=true");
               exit();
           }
         }
         else{
             $showerr="Password do not match, make sure you entered your password in both fields";
             
         }
     }
     header("Location:/?/iForums/success=false");
 }





?>