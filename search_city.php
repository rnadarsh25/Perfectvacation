<?php include "includes/header2.php";?>
<head><link type="text/css" rel="stylesheet" href="css/details.css"/></head>

        <div id="all">
            <?php include "includes/navbar2.php";?>

            <div class="primary_detail">
                <div class="primary_image">
                    <div class="show_img">

                    <?php
                    if(isset($_POST['search_city_btn'])){
                        
                        $the_site_city = escape($_POST['the_search_city']);
                        
                        $query = "SELECT * FROM tour_sites WHERE site_city LIKE '%$the_site_city%' ORDER BY site_id DESC";
                        $select_latest_image = mysqli_query($connection, $query);
                        confirm($select_latest_image);
                        
                        $row = mysqli_fetch_assoc($select_latest_image);
                        $latest_image = $row['site_image'];
                        
                        echo "<img src='images/$latest_image' alt=''>";
                    }
                      
                    ?>
                    </div>
                    <!--All images-->
                    
                    <?php
                
                if(isset($_POST['search_city_btn'])){
                    
                    $the_site_city = escape($_POST['the_search_city']);
                    
                    $query = "SELECT * FROM tour_sites WHERE site_city LIKE '%$the_site_city%'";
                    $select_all_sites = mysqli_query($connection, $query);
                    confirm($select_all_sites);
                    
                    while($row = mysqli_fetch_assoc($select_all_sites)){
                        
                        $site_id = $row['site_id'];
                        $site_title = $row['site_title'];
                        $site_state = $row['site_state'];
                        $site_city = $row['site_city'];
                        $site_image = $row['site_image'];
                        
                        ?>
                        <div class="imgs">
                        <img src="images/<?php echo $site_image;?>" alt="">
                        </div>
                    <?php

                        }
                    ?>
                    
                    <!-- <div class="imgs"><img src="images/hampi.jpg" alt=""></div>
                    <div class="imgs"></div>
                    <div class="imgs"></div>
                    <div class="imgs"></div> 
                    <div class="imgs"></div>                     -->

                </div>
                <div class="primary_name">
                    <div class="show_name">
                        <h1><?php echo $site_city;?></h1>
                        <h2><?php echo $site_state?> , India</h2>
                        <?php
                         
                            $query = "SELECT * FROM tour_sites WHERE site_city LIKE '%$the_site_city%'";
                            $count_sites_query = mysqli_query($connection, $query);
                            confirm($count_sites_query);
                        
                            $sites_count = mysqli_num_rows($count_sites_query);
                         
                         ?>
                        <h2 style="color: #df293a;"><?php echo $sites_count;?> tourists places found</h2>
                    </div>
                    <div class="show_offers">

                        <?php
                            
                        $query = "SELECT MIN(site_price) as 'lowest' FROM tour_sites WHERE site_city LIKE '%$the_site_city%'";
                        $select_min_price = mysqli_query($connection, $query);
                        confirm($select_min_price);
                        $row = mysqli_fetch_assoc($select_min_price);
                        $lowest_price = $row['lowest'];    
                        
                        ?>

                        <h3><span style="color: darkgreen;">Rs.<?php echo $lowest_price;?> </span><Span>onwards
                        <a href="directpage.php?source=packages" style="text-decoration: none; color: skyblue;">view packages</a></Span></h3>
                           
                        <a href="directpage.php?source=packages"><input type="button" class="package_btn" value="Get customized Packages"></a>
                        <a href="hotels.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $the_site_id?>"><input type="button" class="hotel_btn" value="View Hotels"></a>
                    </div>
                    <div class="show_guide">
                        <div class="guides"><h1>Weather: <span>18 deg.cel</span></h1></div>
                        <div class="guides"><h1>Best time: <span>Feb - Mar / Sept- Nov</span></h1></div>
                        <div class="guides"><h1>Ideal Duration: <span>3-5 days</span></h1></div>
                        <div class="guides"><h1>Nearest Airport: <span>Subash Chandra Bose Intl. Airport</span></h1></div>
                    </div>
                </div>
            </div>
            <?php
            }         
            ?>
            <div class="site_container">

            <?php 
                
            if(isset($_POST['search_city_btn'])){
                
                $the_site_city = escape($_POST['the_search_city']);
                
                $query = "SELECT * FROM tour_sites WHERE site_city LIKE '%$the_site_city%'";
                $select_all_sites = mysqli_query($connection, $query);
                confirm($select_all_sites);
                
                while($row = mysqli_fetch_assoc($select_all_sites)){
                    
                    $site_id = $row['site_id'];
                    $site_package_id = $row['site_package_id'];
                    $site_title = $row['site_title'];
                    $site_location_id = $row['site_location_id'];
                    $site_image = $row['site_image'];
                    $site_price = $row['site_price'];
                    $the_location_id = $site_location_id;
                    
            ?>

                <div class="show_site">
                    <div class="site_img">
                        <a href="site_detail.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $site_id;?>"><img src="images/<?php echo $site_image;?>" alt=""></a>
                    </div>
                    <div class="site_footer">
                        <a href="site_detail.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $site_id;?>"><h1><?php echo $site_title?><br><span>1.0 km from city center.</span></h1></a>
                    </div>
                </div>
            <?php
                    
                }
            }
            
            ?>    
            </div>
            <div class="add2"></div>
        </div>
       <?php include "includes/feedback2.php";?>

<?php include "includes/footer2.php";?>