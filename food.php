<?php include "includes/header2.php";?>
<head><link type="text/css" rel="stylesheet" href="css/food.css"/></head>

        <div id="all">
            <?php include "includes/navbar2.php";?>
            <div class="search_bar">
                <h1>Nearby Restaurents</h1>
                <input type="text" class="search_input" placeholder="restaurent / locality / city">
                <input type="button" class="search_btn" value = "search" onclick="searchAll()"/>
            </div>
            <div class="add3"></div>
            <div class="filter_bar">
                
            </div>
            <div class="list">
            <?php 
                    
            if(isset($_GET['source_city']) && !empty($_GET['source_city'])){
                $the_site_city = escape($_GET['source_city']);
                
                $query = "SELECT * FROM food WHERE food_city = '$the_site_city'";
                $select_resta = mysqli_query($connection, $query);
                confirm($select_resta);
                
                while($row = mysqli_fetch_assoc($select_resta)){
                    
                    $food_id = $row['food_id'];
                    $food_name = $row['food_name'];
                    $food_city = $row['food_city'];
                    $food_image = $row['food_image'];
                    $food_distance = $row['food_distance'];
                    $food_ratestar = $row['food_ratestar'];
                    $food_ratecmt = $row['food_ratecmt'];
            ?>
                <div class="show_site">
                    <div class="site_img">
                        <img src="resta/<?php echo $food_image;?>" alt="">
                    </div>
                    <div class="site_footer">
                        <h1><?php echo $food_name;?><br><span><?php echo $food_distance;?> km from city center.<br><span><?php echo $food_ratestar;?> <?php echo $food_ratecmt;?></span></span></h1>
                    </div>
                </div>
            <?php         
                }
            }else{
            echo "<h1 style='font-family: Raleway, sans-serif, cursive;color: #df293a; font-size:25px;'>No restaurents available in your location.</h1>";
            }
            
            ?>        
                
            </div>

            <div class="add_bar"></div>
        </div>
<?php include "includes/footer2.php";?>