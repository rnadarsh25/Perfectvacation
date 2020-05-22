<div id="feedback">
<div class="feed_heading"><h1>Feedbacks</h1></div>
<div class="show_feed1"></div>
<div class="show_feed2">
        <div class="feed_container">

        <?php
           
        $query = "SELECT * FROM feedbacks WHERE feedback_status='allowed' ORDER BY feedback_id DESC";
        $select_feedbacks = mysqli_query($connection, $query);
        if(!$select_feedbacks){
            die("Query Failed".mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_feedbacks)){
            
            $feedback_id = $row['feedback_id'];
            $feedback_author = $row['feedback_author'];
            $feedback_content = $row['feedback_content'];
            $feedback_image = $row['feedback_image'];
            
        ?>
               <div class="all_contain">
                   <img src="images\<?php echo $feedback_image;?>" alt="" width="200px" height="200px">
                   <h1><?php echo $feedback_content;?><br><span>- <?php echo $feedback_author;?></span></h1>
               </div> 
        
               <?php
                    
                }
            
           ?>       
        </div>
</div>
<div class="show_feed3"></div>
</div>