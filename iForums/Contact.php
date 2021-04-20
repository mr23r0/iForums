<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>iForums - Contact Us<br>
        Online Disscussion Forums</title>
</head>

<body>
    <?php include'brains/_header.php'; ?>
    <?php include'brains/_dbconnect.php'; ?>
    <div class="container text-center my-3">
        <h1>Contact</h1>
    </div>
    <div class="container  my-3">
        <div class="container-sm">
        <?php
        $alert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $name=$_POST['name'];
            $query=$_POST['query'];
            $gender=$_POST['gender'];
            $name= strip_tags($name);
            $qurey= strip_tags($query);
            
            
            $sql = "INSERT INTO `contact` (`name`, `query`, `gender`, `dt`) VALUES ( '$name', '$query', '$gender', current_timestamp());";
            $result=mysqli_query($conn, $sql);
            $alert=true;
           
        }
    
       ?>
            <form  method="post" >
                <div class="form-group row my-4">
                    <label for="name" class="col-sm-2 col-form-label">Your Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="query" class="col-sm-2 col-form-label">Your Query</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="query" placeholder="Enter Your Query here" name="query">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2"
                                    value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Female
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3"
                                    value="option3" >
                                <label class="form-check-label" for="gridRadios3">
                                    Other
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
               
                <div class="form-group row justify-content-center text-center">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger ">Submit</button>
                    </div>
                </div>
            </form>
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