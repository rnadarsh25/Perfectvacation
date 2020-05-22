<?php include "includes/db.php";?>
<?php include "includes/functions.php"?>
<?php
session_start();    
    if(isset($_SESSION['user_city'])){
        $the_user_city = $_SESSION['user_city'];
    }

    if(isset($_GET['source'])){
        
        if(isset($_GET['location_id'])){
            $the_location_id = escape($_GET['location_id']);
        }else{
            $the_location_id = 1;
        }if(isset($_GET['site_id'])){
            $the_site_id = escape($_GET['site_id']);
        }else{
            $the_site_id = null;
        }
        $direct_to = escape($_GET['source']);
        switch($direct_to){
                
            case 'tours': header("Location: alltours.php?location_id=$the_location_id");
            break;
            case 'hotels': header("Location: hotels.php?location_id=$the_location_id&source_city=$the_user_city&site_id=$the_site_id");
            break;
            case 'food': header("Location: food.php?location_id=$the_location_id&source_city=$the_user_city&site_id=$the_site_id");
            break;
            
            case 'photos': header("Location: photos.php?location_id=$the_location_id&source_city=$the_user_city&site_id=$the_site_id");
            break;    
                
            case 'packages': header("Location: show_package_tours.php?location_id=$the_location_id");
            break;    
                
                
        }
        
    }

?>