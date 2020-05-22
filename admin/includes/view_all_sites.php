<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Location</th>
                <th>State</th>
                <th>City</th>
                <th>Image</th>
                <th>Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php

            $query = "SELECT * FROM tour_sites";
            $select_all_sites = mysqli_query($connection, $query);

            confirm($select_all_sites);

            while($row = mysqli_fetch_assoc($select_all_sites)){

                $site_id = $row['site_id'];
                $site_package_id = $row['site_package_id'];
                $site_title = $row['site_title'];
                $site_location = $row['site_location_id'];
                $site_state = $row['site_state'];
                $site_city = $row['site_city'];
                $site_image = $row['site_image'];
                $site_about = $row['site_about'];
                $site_price = $row['site_price'];
                $site_tour_start_date = $row['site_tour_start_date'];
                $site_tour_end_date = $row['site_tour_end_date'];
                
                echo "<tr>";
                
                echo "<td>$site_id</td>";
                echo "<td>$site_title</td>";
                
                $query = "SELECT * FROM packages WHERE package_id = $site_package_id";
                $select_package = mysqli_query($connection, $query);
                confirm($select_package);
                while($row = mysqli_fetch_assoc($select_package)){
                    $package_id = $row['package_id'];
                    $package_title = $row['package_title'];
                    
                    echo "<td>$package_title</td>";
                    
                }
                
                $query = "SELECT * FROM tour_locations WHERE tour_location_id = $site_location";
                $select_location = mysqli_query($connection, $query);
                confirm($select_location);
                while($row = mysqli_fetch_assoc($select_location)){
                    $location_id = $row['tour_location_id'];
                    $location_name = $row['tour_location_name'];
                    
                      echo "<td>$location_name</td>";
                    
                }
            
                echo "<td>$site_state</td>";
                echo "<td>$site_city</td>";
                echo "<td><img src='../images/$site_image' width='60' height='60'></td>";
                echo "<td>$site_price</td>";
                echo "<td>$site_tour_start_date</td>";
                echo "<td>$site_tour_end_date</td>";
                echo "<td><a href ='sites.php?source=edit_site&site_id=$site_id'>Edit</a></td>";
                echo "<td><a href ='sites.php?delete={$site_id}'>Delete</a></td>";
                
                
                echo "</tr>";

            }

          ?>
        </tbody>
        
</table>


<?php
    
    if(isset($_GET['delete'])){
        
        echo $del_site_id = $_GET['delete'];
        $query = "DELETE FROM tour_sites WHERE site_id = $del_site_id";
        $delete_site_query = mysqli_query($connection, $query);
        confirm($delete_site_query);
        
        header("Location: sites.php");
    }

?>