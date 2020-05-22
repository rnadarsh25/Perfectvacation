<?php include "includes/header2.php";?>

        <div id="all">

        <?php
            
            if(!isset($_GET['location_id'])){
                header("Location: directpage.php?source=packages&location_id=1");
            }
            
        ?>

        <div class="nav"><a href="index.php"><li>Home</li></a></div>
        <?php
                            
            $query = "SELECT * FROM packages";
            $select_packages = mysqli_query($connection, $query);
            if(!$select_packages){
                die("Query Failed".mysqli_error($connection));
            }

            while($row = mysqli_fetch_assoc($select_packages)){
            $package_id = $row['package_id'];
            $package_title = $row['package_title'];
            
            echo "<div class='nav'><a href='directpage.php?source=packages&location_id=$package_id'><li>$package_title</li></a></div>";
        }

        ?>

            <div id="detail">
                <div id="detail_heading">

                <?php
            
                if(isset($_GET['location_id'])){
                $the_package_id = escape($_GET['location_id']);

                $query = "SELECt * FROM packages WHERE package_id = $the_package_id";
                $select_package = mysqli_query($connection, $query);
                confirm($select_package);

                $row = mysqli_fetch_assoc($select_package);
                $package_title = $row['package_title'];
                echo "<h1>$package_title Package</h1>";       
                       
                }
                    
                ?>        
                </div>
                <div id="total_found">

                <?php
                            
                if(isset($_GET['location_id'])){
                    $the_package_id = escape($_GET['location_id']);

                    $query = "SELECT * FROM tour_sites WHERE site_package_id = $the_package_id";
                    $select_sites = mysqli_query($connection, $query);
                    confirm($select_sites);
                    
                    $sites_count = mysqli_num_rows($select_sites);
                
                    echo "<h1>$sites_count places found in $package_title india</h1>";    
                }
                
                ?>
                </div>
                <div id="sort_by">
                    Sort by:
                    <select name="" id="">
                        <option value="revelence">revelence</option>
                        <option value="pltoh">price(low to high)</option>
                        <option value="phtol">price(high to low)</option>
                        <option value="dltoh">duartion(low to high)</option>
                        <option value="dhtol">duration(high to low)</option>
                    </select>
                </div>
            </div>
            <div id="sidebar"></div>
            <div id="list">

            <?php 
            
            if(isset($_GET['location_id'])){
                $the_location_id = escape($_GET['location_id']);
                
                $query = "SELECT * FROM tour_sites WHERE site_package_id = $the_location_id GROUP BY site_city ORDER BY site_id DESC";
                $select_sites = mysqli_query($connection, $query);
                confirm($select_sites);
                
                while($row = mysqli_fetch_assoc($select_sites)){
                    
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
                    
            ?>

                <div id="single_item">
                    <div class="list_img">
                        <img src="images/<?php echo $site_image;?>"/>
                    </div>
                    <div class="list_detail">
                        <div class="list_name">
                            <h1><?php echo $site_city;?><br><span>3 Nights</span></h1>
                        </div>
                        <div class="list_gifts">
                            <div class="gifts"><i class="fa fa-bed fa-md"></i><br>Hotel</div>
                            <div class="gifts"><i class="fas fa-concierge-bell"></i><br>Meal</div>
                            <div class="gifts"><i class="fas fa-car"></i><br>Cab</div>
                            <div class="gifts"><i class="fas fa-apple-alt"></i><br>Breakfast</div>
                            <div class="gifts"><i class="fas fa-bus-alt"></i><br>Bus</div>
                            <div class="gifts"><i class="fas fa-wine-glass-alt"></i><br>Party</div>
                        </div>
                    </div>
                    <div class="list_price">
                        <div class="price_heading"><h1>starting from</h1></div>
                        <div class="price"><h1>RS. <?php echo $site_price;?></h1></div>
                        <div class="price_btn"><a href="details.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $site_city;?>&site_id=<?php echo $site_id;?>">
                        <input type="button" class="cont_btn" value="Continue"></a></div>
                    </div>
                </div>
            <?php     
                }
            }
            
            ?> 
            </div>          

        </div>

    <?php include "includes/footer2.php";?>