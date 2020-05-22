<?php
    
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "tourguide";

    $connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    if(!$connection){
        die("Db Connection failed.".mysqli_error($connection));
    }


?>