<?php
session_start();
include'brains/_loginpop.php';
include'brains/_signuppop.php';
include'_dbconnect.php';

echo '<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="/iForums/"><b>iForums</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-  lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../iForums/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Catogeries
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';?>
            <?php
                    $sql = "SELECT * FROM `categories`";
                    $result=mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $cat = $row['category_name'];
                        $id = $row['category_id'];
                     echo'   <li><a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$cat.'</a></li>';
                    }
                    ?>
                  
            <?php
                    // $_SESSION['sno']=$uid;
                    echo
                        '</ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="About.php">About</a>
                        </li>';
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
                         echo'<li class="nav-item">
                        <a class="nav-link " href="Contact.php" tabindex="-1" aria="true">Contact</a>
                        </li>
                        ';}
                       echo' </ul>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
              echo' <p class="text-light mx-2 mb-0 "><b>'.$_SESSION['username'].'</b></p>
           <a href="brains/_logout.php" class="btn btn-outline-light btn-sm mx-2 my-1" type="submit"> Logout</a>';
            }
            else {
            echo'  
             <button class="btn btn-outline-light btn-sm mx-2 my-1" type="submit" data-bs-toggle="modal" data-bs-target="#loginpop">Login</button>
             <button class="btn btn-outline-light btn-sm mr-2 my-1" type="submit"  data-bs-toggle="modal" data-bs-target="#signuppop">SignUp</button>';
            }
            echo'    </div>
                    </div>
                    </nav>';
                if(isset($_GET['se']) && $_GET['se']==true){
                    echo'<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> username/password is wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                else if(isset($_GET['se']) && $_GET['se']==false) {
                   echo' <div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
                    <strong>Welcome</strong><b><em> '.$_SESSION['username'].'</em></b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                  }
            
            if (isset($_GET['success']) && $_GET['success']=="true") {

            echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Your Account has been successfully created!</strong> You can Login now.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }

?>