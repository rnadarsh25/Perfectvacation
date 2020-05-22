<?php


    if(isset($_GET['site_id'])){
        $the_site_id = $_GET['site_id'];
        
        $query = "SELECT * FROM tour_sites WHERE site_id = $the_site_id";
        $select_site = mysqli_query($connection, $query);
        confirm($select_site);
        
        while($row = mysqli_fetch_assoc($select_site)){
            
                $site_id = $row['site_id'];
                $site_package_id = $row['site_package_id'];
                $site_title = $row['site_title'];
                $site_location_id = $row['site_location_id'];
                $site_state = $row['site_state'];
                $site_city = $row['site_city'];
                $site_image = $row['site_image'];
                $site_about = $row['site_about'];
                $site_price = $row['site_price'];
                $site_tour_start_date = $row['site_tour_start_date'];
                $site_tour_end_date = $row['site_tour_end_date'];
            
        }
    }
    

    

    if(isset($_POST['update_site'])){
        
        if(isset($_GET['site_id'])){
        $the_site_id = escape($_GET['site_id']);
        }
        
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
        
        if(empty($_POST['site_image'])){
            
            $query = "SELECT * FROM tour_sites WHERE site_id = $the_site_id";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)){
                $site_image = $row['site_image'];
            }
        }
        
        
        $query = "UPDATE tour_sites SET site_title = '$site_title',site_city = '$site_city',site_state = '$site_state',site_location_id = $site_location_id,site_package_id = $site_package_id,site_image = '$site_image',site_price = '$site_price',site_about = '$site_about',site_tour_start_date = '$site_tour_start_date',site_tour_end_date = '$site_tour_end_date' WHERE site_id = $the_site_id";
        
        
        $update_site = mysqli_query($connection, $query);
        confirm($update_site);
        
        header("Location: sites.php");
        
        
        
    }

?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="place">Place</label>
    <input type="text" value="<?php echo $site_title;?>" class="form-control" name="site_title">
    </div>
    
    <div class="form-group">
    <label for="city">City</label>
    <input type="text" value="<?php echo $site_city;?>" class="form-control" name="site_city">
    </div>
    
    <div class="form-group">
    <label for="state">State</label>
    <input type="text" value="<?php echo $site_state;?>" class="form-control" name="site_state">
    </div>
    
    <div class="form-group">
       <label for="image">Choose Location</label>
        <select name="site_location_id" id="" class="form-control">
          
           <?php
            
            $query = "SELECT * FROM tour_locations WHERE tour_location_id = $site_location_id";
            $select_location = mysqli_query($connection, $query);
            
            confirm($select_location);
            
            while($row = mysqli_fetch_assoc($select_location)){
                $location_id = $row['tour_location_id'];
                $location_name = $row['tour_location_name'];
                
                echo "<option value='$location_id'>$location_name</option>";
            }
            
            ?>
            
            <?php
            
            $query = "SELECT * FROM tour_locations WHERE tour_location_id != $site_location_id";
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
         
          <?php
            
            $query = "SELECT * FROM packages WHERE package_id = $site_package_id";
            $select_package = mysqli_query($connection, $query);
            
            confirm($select_package);
            
            while($row = mysqli_fetch_assoc($select_package)){
                $package_id = $row['package_id'];
                $package_title = $row['package_title'];
                
                echo "<option value='$package_id'>$package_title</option>";
            }
            
            ?>
            
            <?php
            
            $query = "SELECT * FROM packages WHERE package_id != $site_package_id";
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
    <img src="../images/<?php echo $site_image;?>" alt="" width="70" height="70">
    </div>
    
    <div class="form-group">
    <label for="image">Change Image</label>
    <input type="file" class="form-control" name="site_image">
    </div>
    
    <div class="form-group">
    <label for="start_date">Tour start Date</label>
    <input type="date" value="<?php echo $site_tour_start_date;?>" name='site_tour_start_date' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="end_date">Tour End Date</label>
    <input type="date" value="<?php echo $site_tour_end_date;?>" name='site_tour_end_date' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="site_price">Price</label>
    <input type="text" value="<?php echo $site_price;?>" name='site_price' class="form-control">
    </div>
    
    <div class="form-group">
    <label for="about">About</label>
    <textarea name="site_about" id="site_body" cols="30" rows="10" class="form-control"><?php echo $site_about;?></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" name='update_site' value="Update Site" class="btn btn-success btn-md">
    </div>
    
</form>


<script>
    CKEDITOR.replace( 'site_body' );
</script>