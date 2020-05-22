<?php

    if(isset($_POST['add_site'])){
        
        $site_title = escape($_POST['site_title']);
        $site_city = escape($_POST['site_city']);
        $site_state = escape($_POST['site_state']);
        $site_location_id = escape($_POST['site_location_id']);
        $site_package_id = escape($_POST['site_package_id']);
        $site_tour_start_date = escape($_POST['site_tour_start_date']);
        $site_tour_end_date = escape($_POST['site_tour_end_date']);
        $site_about = escape($_POST['site_about']);
        $site_price = escape($_POST['site_price']);
        
        $site_image = $_FILES['site_image']['name'];
        $site_image_tmp = $_FILES['site_image']['tmp_name'];
        move_uploaded_file($site_image_tmp , "../images/$site_image");
        
        
        $query = "INSERT INTO tour_sites VALUES('', '$site_title',$site_package_id, $site_location_id,'$site_state', '$site_city', '$site_image', '$site_about','$site_price','$site_tour_start_date', '$site_tour_end_date')";
        
        $add_site = mysqli_query($connection, $query);
        confirm($add_site);
        
        
        $query = "INSERT INTO all_images VALUES('', '$site_image', '$site_title', '$site_city')";
        $add_new_image = mysqli_query($connection, $query);
        
        confirm($add_new_image);
        
        header("Location: sites.php");
        
        
        
    }

?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="place">Place</label>
    <input type="text" class="form-control" name="site_title">
    </div>
    
    <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" name="site_city">
    </div>
    
    <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" name="site_state">
    </div>
    
    <div class="form-group">
       <label for="image">Choose Location</label>
        <select name="site_location_id" id="" class="form-control">
           <option value="">Select Options</option>
            
            <?php
            
            $query = "SELECT * FROM tour_locations";
            $select_locations = mysqli_query($connection, $query);
            confirm($select_locations);
            
            while($row = mysqli_fetch_assoc($select_locations)){
                
                $location_id = $row['tour_location_id'];
                $location_name = $row['tour_location_name'];
                
                echo "<option value='$location_id'>{$location_name}</option>";
            }
            
            ?>
            
        </select>
    </div>
    
    <div class="form-group">
       <label for="image">Choose Package</label>
        <select name="site_package_id" id="" class="form-control">
           <option value="">Select Options</option>
            
            <?php
            
            $query = "SELECT * FROM packages";
            $select_packages = mysqli_query($connection, $query);
            confirm($select_packages);
            
            while($row = mysqli_fetch_assoc($select_packages)){
                
                $package_id = $row['package_id'];
                $package_title = $row['package_title'];
                
                echo "<option value='$package_id'>{$package_title}</option>";
            }
            
            ?>
            
        </select>
    </div>
    
    <div class="form-group">
    <label for="image">Choose Image</label>
    <input type="file" class="form-control" name="site_image">
    </div>
    
    <div class="form-group">
    <label for="start_date">Tour start Date</label>
    <input type="date" name='site_tour_start_date' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="end_date">Tour End Date</label>
    <input type="date" name='site_tour_end_date' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="site_price">Price</label>
    <input type="text" name='site_price' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="about">About</label>
    <textarea name="site_about" id="site_body" cols="30" rows="10" class="form-control"></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" name='add_site' value="Add Site" class="btn btn-success btn-md">
    </div>
    
</form>


<script>
    CKEDITOR.replace( 'site_body' );
</script>