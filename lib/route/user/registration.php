<?php

include_once('../../functions/userFunction.php'); //update path as necessary


    $result = userRegistration($_POST['userName'],$_POST ['userEmail'],$_POST['userPass'],$_POST['userPhone'],$_POST['userNic']);

    echo($result);


?>