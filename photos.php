<?php include "includes/header2.php";?>
<head><link type="text/css" rel="stylesheet" href="css/photos.css"/></head>

        <div id="all">
            <?php include "includes/navbar2.php";?>
            <div class="img_div">
            <?php
                $query = "SELECT * FROM all_images";
                $select_images = mysqli_query($connection, $query);
                confirm($select_images);
                while($row = mysqli_fetch_assoc($select_images)){
                    $image_id = $row['image_id'];
                    $image_name = $row['image_name'];
                    $image_title = $row['image_title'];
                    $image_city = $row['image_city'];
                    ?>
                    
                <div class="show_img">
                    <img src="images/<?php echo $image_name;?>" alt="<?php echo $image_title;?>">
                </div>  
                    
            <?php
                }
            ?>
            </div>
            
            <div class="sidebar_ph">
                <img src="images/tigerhills.jpg" alt="">
            </div>
        </div>
<?php include "includes/footer2.php";?>