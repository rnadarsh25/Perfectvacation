<div class="nav2"><a href="index.php"><li>Home</li></a></div>

<?php
                
    if(isset($_GET['source_city']) && !empty($_GET['source_city'])){
        
        $the_site_city = escape($_GET['source_city']);
        $the_location_id = escape($_GET['location_id']);
        $the_site_id = escape($_GET['site_id']);
        
        echo "<div class='nav2'><a class='active' href='details.php?location_id=$the_location_id&source_city=$the_site_city&site_id=$the_site_id'><li>$the_site_city</li></a></div>";
        
    }
?>
<div class="nav2"><a href="alltours.php?location_id=<?php echo $the_location_id;?>"><li>Tours</li></a></div>
<div class="nav2"><a href="hotels.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $the_site_id?>"><li>Hotels</li></a></div>
<div class="nav2"><a href=""><li>Map</li></a></div>
<div class="nav2"><a href="photos.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $the_site_id?>"><li>Gallary</li></a></div>
<div class="nav2"><a href="food.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $the_site_id?>"><li>Food</li></a></div>