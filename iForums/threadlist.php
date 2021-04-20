<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>iForums - Disscussion Page,
    Online Disscussion Forums</title>
</head>

<body>
    <?php include'brains/_header.php'; ?>
    <?php include'brains/_dbconnect.php'; ?>
    <?php    
     $alert=false;
     $id = $_GET['catid'];
     if($id){
            if($alert==true){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Input has been submitted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                echo'yoyyoyoy';
            }
}
   ?>
    <div class="container my-4 bg-light">
        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE `category_id`=$id";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $catname=$row['category_name'];
            $catdescription=$row['category_description'];
        }
        ?>
        <div class="jumbotron">
            <h1 class="display-4">Welcome to<b><em> <?php echo $catname?> </em></b>Forum.</h1>

            <p class="lead"><?php echo $catdescription?></p>
            <hr class="my-2 mt-2">
            <p><br>No Spam / Advertising / Self-promote in the forums. ...
                <br>Do not post copyright-infringing material. ...
                <br>Do not post “offensive” posts, links or images. ...
                <br>Do not upload any provided payload/virus/malware to <em>Virustotal.com</em>
                <br>Do not cross post questions. ...
                <br>Remain respectful of other members at all times.
            </p>
            <br>Thank You For Paying attention.</p>

        </div>
    </div>
    <?php
        $alert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $thread_title=$_POST['title'];
            $str= strip_tags($thread_title);
            
            $uid=$_SESSION['sno'];
            $sql = "INSERT INTO `thread` ( `thread_user_id`, `thread_description`, `created`, `thread_cat_id`) VALUES ('$uid', '$str', current_timestamp(), '$id')";
            $result=mysqli_query($conn, $sql);
            $alert=true;
           
        }
    
       ?>
    <hr>
    <div class="container">
        <h1>Questions..</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `thread` WHERE `thread_cat_id`=$id";
        $result=mysqli_query($conn, $sql);
       $noresult=false;
       ?>
        <?php
    if(isset($_SESSION['username']) && $_SESSION['username']==true){
        echo ' <div class="container my-4">
                <form my-4 action="'.$_SERVER['REQUEST_URI'].'" method="post">
                <div class="form-group">
                <div class="form-group">
                    <label for="Question/Answer">Your Question/Answer</label>
                    <textarea class="form-control" name="title" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary my-2">Submit</button>
                </form>
                </div>
                </div>';}
    ?>
    <?php
       

        
        
        while($row=mysqli_fetch_assoc($result)){
            $noresult=true;
            $times=$row['created'];
            $user=$row['thread_user_id'];
            $description=$row['thread_description'];
            $id=$row['thread_id'];
            $sqluid="SELECT * FROM `users` WHERE sno=$user";
            $resultc=mysqli_query($conn, $sqluid);
            $rowc=mysqli_fetch_assoc($resultc);
            $uname=$rowc['username'];
          echo '<div class="media my-3 py-2 ">
                <img class="mr-3 rounded-circle" src="img/usr.jpg" width="45" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0 text-dark"><a href="thread.php?threadid='.$id.'" class="text-dark"><b><em>'.$uname.'</em></b></a></h5>
                        '.$times.'
                        <br>
                        '.$description.'
                    </div>
                
                </div>';
        }
        
        if($noresult==false){
         
            echo '<div class="jumbotron jumbotron-fluid text-center">
            <div class="container fooo">
              <p class="display-4">No result Found!</p>
              <p class="lead text-center"><b><em>Be the first person to ask.</em></b></p>
            </div>
          </div>
          </div>';
        }
       
        
        ?>
      
    </div>
    </div>

    <div class="dk" style="min-height:40vh;">.</div>

    <?php include'brains/_footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>