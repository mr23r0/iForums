<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>iForums - Profile, Online Disscussion Forums</title>
</head>

<body>
    <?php include'brains/_header.php'; ?>
    <?php include'brains/_dbconnect.php'; ?>
    <div class=" container my-4 px-2 py-2 bg-light">

        <?php 
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `thread` WHERE `thread_id`=$id";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)){
                $username=$row['thread_user_id'];
                $threaddescription=$row['thread_description'];
                $sqluid="SELECT * FROM `users` WHERE sno=$username";
                $resultn=mysqli_query($conn, $sqluid);
                $rowc=mysqli_fetch_assoc($resultn);
                $uname=$rowc['username'];
        }
        ?>
        <div class="row featurette">
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                    style="width: 400px; height:350px;" src="img/usr.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading"> <?php echo $uname?> </h2>
                <p class="lead"><br>No Spam / Advertising / Self-promote in the forums. ...
                    <br>Do not post copyright-infringing material. ...
                    <br>Do not post “offensive” posts, links or images. ...
                    <br>Do not upload any provided payload/virus/malware to <em>Virustotal.com</em>
                    <br>Do not cross post questions. ...
                    <br>Remain respectful of other members at all times.

                    <br>Thank You For Paying attention.
                </p>
            </div>

        </div>

    </div>

    <div class="container">
        <h1>Asked Questions...</h1>
        <?php
        $id = $_GET['threadid'];
        $sqll = "SELECT * FROM `thread` WHERE `thread_user_id`=$username";
        $result=mysqli_query($conn, $sqll);
        while($row=mysqli_fetch_assoc($result)){
            // $uid=$_SESSION['userid'];
            $sqluid="SELECT * FROM `users` WHERE sno=$username";
            $resultc=mysqli_query($conn, $sqluid);
            $rowc=mysqli_fetch_assoc($resultc);
            $uname=$rowc['username'];
            $user=$row['thread_user_id'];
            $description=$row['thread_description'];
            $id=$row['thread_id'];
      echo '  <div class="media my-3 py-2 ">
            <img class="mr-3" src="img/usr.jpg" width="45" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">'.$uname.'</h5>
               '.$description.'
            </div>
       
    </div>';
        }
        ?>
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