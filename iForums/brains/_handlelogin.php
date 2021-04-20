<?php
include'_dbconnect.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $se=true;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `users` WHERE username ='$username'";
    $result=mysqli_query($conn, $sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1){
        $row=mysqli_fetch_assoc($result);
        
        }
        $uid=$row['sno'];
         if (password_verify($password , $row['password'])) {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            $_SESSION['sno']=$uid;
            // echo "logged in $username";
            $se=false;
            
        header("Location: ../index.php?se=$se");
    }    
    }
        header("Location: ../index.php?se=$se");
 
 ?>