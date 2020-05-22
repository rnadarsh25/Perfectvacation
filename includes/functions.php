<?php


function escape($string){
    
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
    
}


function confirm($check){
    global $connection;
    
    if(!$check){
        die("Query Failed".mysqli_error($connection));
    }
}

?>