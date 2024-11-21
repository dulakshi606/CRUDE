<?php

//include function page
include_once('lib/functions/userFunction.php');

if (isset($_POST['btnLogin'])){
   $result = Authentication($_POST['userName'],$_POST['userPass']);
 echo($result);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS</title>
    <!--Link Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body style=" background-image:url('images/download.jpeg');">
    

<div class="container" style="margin-top: 80px;"> 
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="background-color: rgba(0, 0, 0, 0.4);">
                <div class="card-header" style="color:white">
                    Login Section
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your User Name</label>
                            <input type="text" name="userName" id="userName" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your Password</label>
                            <input type="password" name="userPass" id="userPass" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Login" name="btnLogin" class="btn btn-outline-warning btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="background-color: rgba(0, 0, 0, 0.4);">
                <div class="card-header" style="color:white">
                    Registration section
                </div>
                <div class="card-body">
                    <form action="lib/route/user/registration.php" method="post">
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your Name</label>
                            <input type="text" name="userName" id="userName" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your Email</label>
                            <input type="email" name="userEmail" id="userEmail" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your Password</label>
                            <input type="password" name="userPass" id="userPass" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your Phone number</label>
                            <input type="number" name="userPhone" id="userPhone" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="" style="color:white">Enter your NIC</label>
                            <input type="text" name="userNic" id="userNic" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="btnSave" id="btnSave" value="Register" class="btn btn-outline-success btn-sm">
                            <input type="reset" value="Clear" class="btn btn-outline-danger btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




</body>
</html>