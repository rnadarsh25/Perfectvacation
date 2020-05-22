<?php include "includes/header2.php";?>
<head><link type="text/css" rel="stylesheet" href="css/hotels.css"/></head>

        <div id="all">
            <?php include "includes/navbar2.php";?>
            <div class="search_bar">
                <h1>Nearby Hotels</h1>
                <input type="text" class="search_input" placeholder="hotel / locality / city">
                <input type="button" class="search_btn" value = "search" onclick="searchAll()"/>
            </div>
            <div class="add3"></div>
            <div class="filter_bar">
                <h2>Filter by</h2>
                <input type="checkbox">Rs. 100 - Rs. 1000<br><br>
                <input type="checkbox">Rs. 1000 - Rs. 2000<br><br>
                <input type="checkbox">Rs. 2000 - Rs.  3000<br><br>
                <input type="checkbox">Rs. 3000 - Rs. 4000<br><br>
                <input type="checkbox">Rs. 4000 - Rs. 5000<br><br>
                <input type="checkbox">Rs. 5000+<br><br>
            </div>
            <div class="list">
            <?php if(isset($_GET['source_city']) && !empty($_GET['source_city'])){
                    $the_site_city = escape($_GET['source_city']);
                    $query = "SELECT * FROM  hotels WHERE hotel_city = '$the_site_city' ORDER BY hotel_ratestar DESC";
                    $select_hotels = mysqli_query($connection, $query);
                    confirm($select_hotels);
                    
                    while($row = mysqli_fetch_assoc($select_hotels)){
                        
                         $hotel_id = $row['hotel_id'];
                         $hotel_name = $row['hotel_name'];
                         $hotel_city = $row['hotel_city'];
                         $hotel_image = $row['hotel_image'];
                         $hotel_distance = $row['hotel_distance'];
                         $hotel_ratestar = $row['hotel_ratestar'];
                         $hotel_ratecmt = $row['hotel_ratecmt'];
                         $hotel_price = $row['hotel_price'];
                        
                        ?>
                <div id="single_item">
                    <div class="list_img">
                        <img src="hotels/<?php echo $hotel_image;?>"/>
                    </div>
                    <div class="list_detail">
                        <div class="list_name">
                            <h1><?php echo $hotel_name;?></h1>
                            <h2><?php echo $hotel_distance;?> km from city center</h2>
                            <span><?php echo $hotel_ratestar?>* <span><?php echo $hotel_ratecmt;?></span></span>
                        </div>
                    </div>
                    <div class="list_price">
                        <div class="price_heading"><h1>starting from</h1></div>
                        <div class="price"><h1>INR <?php echo $hotel_price;?></h1></div>
                        <div class="price_btn"><a href=""><input type="button" class="cont_btn" value="Book now"></a></div>
                    </div>
                </div>
            <?php
                    
                }
            }else{
                echo "<h1 style='font-family: Raleway, sans-serif, cursive;color: #df293a; font-size:25px;'>No hotels available in your location.</h1>";
            }
            
            ?>    
            </div>

            <div class="add_bar"></div>
        </div>
<?php include "includes/footer2.php";?>