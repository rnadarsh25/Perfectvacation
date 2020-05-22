<?php include "includes/header2.php";?>
<head><link type="text/css" rel="stylesheet" href="css/site_detail.css"/></head>

        <div id="all">
            <?php include "includes/navbar2.php";?>
            <?php
                
            if(isset($_GET['site_id'])){
                $the_site_id = escape($_GET['site_id']);
                $the_site_city = escape($_GET['source_city']);
                $the_location_id = escape($_GET['location_id']);
                
                $query = "SELECT * FROM tour_sites WHERE site_id = $the_site_id";
                $show_details = mysqli_query($connection, $query);
                confirm($show_details);
                
                while($row = mysqli_fetch_assoc($show_details)){
                    
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

            <div class="showimg2" style="background: url('images/<?php echo $site_image;?>') fixed no-repeat;background-size: cover;">
                <div class="all_detail">
                    <h1><?php echo $site_title?></h1>
                    <h2><?php echo $site_city?></h2>
                    <!-- <a href=""><input type="button" value="Learn more about Himalayan Railway" class="more_btn"></a> -->
                </div>
            </div>
            <div class="sidebar"></div>
            <div class="date_loc">
                <div class="site_div">
                    <img src="https://arcticwild.com/wp-content/themes/arcticwild/assets/img/icon-calendar-dark.svg"
                        alt="calendar" width="40px" height="40px">
                       <h1>Date</h1>
                       <h2><?php echo $site_tour_start_date?> - <?php echo $site_tour_end_date?></h2>
                </div>
                <div class="site_div">
                    <img src="https://arcticwild.com/wp-content/themes/arcticwild/assets/img/icon-region-dark.svg"
                        width="40px" height="40px" alt="region">
                        <h1>Region</h1>
                        <h2><?php echo $site_title?></h2>
                </div>
                <div class="site_div">
                    <img src="https://arcticwild.com/wp-content/themes/arcticwild/assets/img/icon-price-dark.svg"
                        width="40px" height="40px" alt="price">
                        <h1>Trip Cost</h1>
                        <h2>Rs. <?php echo $site_price?></h2>
                </div>
            </div>

            <div class="info">
                <p><strong><?php echo $site_title;?></strong><br> <?php echo $site_about?></p>
               
            </div>

            <div id="gallary_div" style="background: url('images/forest-2560x1440-mountains-sunset-river-hd-15667.jpg') fixed no-repeat;
    background-size: cover;">

                <div id="show_gallary_btn">
                    <input onclick="showGallary()" type="button" id="gallary_btn" value="Show Full Gallary"/>
                </div>
                
                <div id="gallary_box">
                    <h1 id="gallary_heading">Gallary <span></span><input type="button" value="X" onclick="closeGallary()" id="close_btn"/></h1>
                </div>
                <div id="gallary_container">
                    <img class="gallary_img" src="images/railway.jpg"/>
                    <img class="gallary_img" src="images/forest-2560x1440-mountains-sunset-river-hd-15667.jpg"/>
                    <img class="gallary_img" src="images/ropeway.jpg"/>
                    <img class="gallary_img" src="images/rockgaden.jpg"/>
                    <img class="gallary_img" src="images/teaplant.jpg"/>
                    <img class="gallary_img" src="images/teesta.jpg"/>
                    <img class="gallary_img" src="images/tigerhills.jpg"/>
                    <img class="gallary_img" src="images/railway.jpg"/>
                    <img class="gallary_img" src="images/forest-2560x1440-mountains-sunset-river-hd-15667.jpg"/>
                </div>
            </div>
            <?php             
            } }
        ?>            

        </div>

        <?php include "includes/feedback2.php";?>
        <div id="book_ticket_div">
            <a href="book_tickets.php?location_id=<?php echo $the_location_id;?>&source_city=<?php echo $the_site_city;?>&site_id=<?php echo $the_site_id;?>"><input type="button" class="book_btn" value="Book your ticket"></a><br>
            <a href=""><input type="button" class="same" value="Ast Questions"></a>
            <a href="feedback.php"><input type="button" class="same" value="Give Feedback"></a>
        </div>
<?php include "includes/footer2.php";?>