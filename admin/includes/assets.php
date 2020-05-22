<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assets</title>
    <link rel="stylesheet" href="css/assets.css">
</head>
<body>
    
    <div class="main">
        
        <div id="images">
           
           <div class="addnew">
           <a href="directpage.php?asset=add_asset" class="addnew_btn"> Add New Image</a>
           </div>
            
            <?php
                
            $query = "SELECT * FROM all_images ORDER BY image_id DESC";
            $select_All_images = mysqli_query($connection, $query);
            confirm($select_All_images);
            
            while($row = mysqli_fetch_assoc($select_All_images)){
                
                $image_id = $row['image_id'];
                $image_name = $row['image_name'];
                $image_title = $row['image_title'];
                $image_city = $row['image_city'];
                
                    
                ?>
            
            <div class="row1">
    
                <div class="res_img1">
                    <img class="img1" src="../images/<?php echo $image_name;?>"/>
                </div>
                <div class="res_footer1">
                    <div class="info1">
                        <h3 style="margin: 0px 0px 3px 0px; font-size: 20px;font-family: 'Raleway', sans-serif;"><?php echo $image_title?></h3>
                        <h4 style="margin: 0px 0px 0px 0px; color: #df293a;font-family: 'Raleway', sans-serif; font-size: 18px;"><?php echo $image_city;?></h4>    
                    </div>
                </div>
    
            </div>       
                    
            <?php
                
            }
                
            ?>
            
        </div>
        
        <div id="videos">
           
           <div class="addnew">
           <a href="directpage.php?asset=add_asset" class="addnew_btn"> Add New Video</a>
           </div>
            
            <?php
                
            $query = "SELECT * FROM all_videos ORDER BY video_id DESC";
            $select_All_videos = mysqli_query($connection, $query);
            confirm($select_All_videos);
            
            while($row = mysqli_fetch_assoc($select_All_videos)){
                
                $video_id = $row['video_id'];
                $video_name = $row['video_name'];
                $video_title = $row['video_title'];
                $video_city = $row['video_city'];
                
                    
                ?>
            
            <div class="row1">
    
                <div class="res_img1">
                    <video style="outline:none;" src="../videos/<?php echo $video_name;?>" width="220" height="140" controls></video>
                </div>
                <div class="res_footer1">
                    <div class="info1">
                        <h3 style="margin: 0px 0px 3px 0px; font-size: 20px;font-family: 'Raleway', sans-serif;"><?php echo $video_title?></h3>
                        <h4 style="margin: 0px 0px 0px 0px; color: #df293a;font-family: 'Raleway', sans-serif; font-size: 18px;"><?php echo $video_city;?></h4>    
                    </div>
                </div>
    
            </div>       
                    
            <?php
                
            }
                
            ?>
            
        </div>
        
    </div>
    
</body>
</html>