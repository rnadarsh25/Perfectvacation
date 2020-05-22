<div id="feature">

<?php 
                        
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
        if(!$select_categories){
            die("Fetching categories failed.".mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($select_categories)){
        
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            
            ?>
             
            <div class="facility"><a href="directpage.php?source=<?php echo $category_title;?>"><?php echo $category_title;?></a></div>
            
            <?php                     
        }
        
?>

    <!-- <div class="facility"><a href="">Places to Visit</a></div>
    <div class="facility"><a href="">Places to Visit</a></div>
    <div class="facility"><a href="">Places to Visit</a></div>
    <div class="facility"><a href="">Places to Visit</a></div>
    <div class="facility"><a href="">Places to Visit</a></div> -->

    <div id="explore">
        <a href="#tours"><input type="button" value="EXPLORE" class="explore_btn"></a>
    </div>
</div>

<div id="all_four">
    <a name="tours" class="a1">
    <div class="all_four_heading">
    <h1>Explore more about India</h1>
    </div>

    <?php 
                            
        $query = "SELECT * FROM packages";
        $select_packages = mysqli_query($connection, $query);
        if(!$select_packages){
            die("Fetching packages failed!".mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_packages)){

            $package_id = $row['package_id'];
            $package_title = $row['package_title'];
            $package_image = $row['package_image'];
        ?>
        
    <div style="background: url('images/<?php echo $package_image;?>');background-size: cover;" class="all_four_tag">
        <a href="directpage.php?source=packages&location_id=<?php echo $package_id?>"><?php echo $package_title;?></a>
    </div>
          
            
    <?php
        }
    ?> 
    
    <div class="go_div"><input onclick="showTrailer()" type="button" value="START" class="go_btn"></div>
    </a>
</div>

<div id="add3">

</div>