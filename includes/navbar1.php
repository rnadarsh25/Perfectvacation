<div class="nav"><a href="index.php"><li>Home</li></a></div>
<?php
                    
    $query = "SELECT * FROM tour_locations";
    $select_locations = mysqli_query($connection, $query);
    if(!$select_locations){
        die("Query Failed".mysqli_error($connection));
    }

while($row = mysqli_fetch_assoc($select_locations)){
    $location_id = $row['tour_location_id'];
    $location_name = $row['tour_location_name'];
    
    echo "<div class='nav'><a href='alltours.php?location_id=$location_id'><li>$location_name</li></a></div>";
}

?>
