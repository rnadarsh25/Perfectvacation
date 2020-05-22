<?php include "includes/header1.php";?>
<?php 
    
    if(isset($_POST['feed_btn'])){
        $feed_name = mysqli_real_escape_string($connection,$_POST['feedback_author']);
        $feed_email = mysqli_real_escape_string($connection,$_POST['feedback_email']);
        
        $feed_image = $_FILES['feedback_image']['name'];
        $feed_image_tmp = $_FILES['feedback_image']['tmp_name'];
        move_uploaded_file($feed_image_tmp, "images/$feed_image");
        
        $feed_content = mysqli_real_escape_string($connection,$_POST['feedback_content']);
        
        if(!isset($_SESSION['user_id'])){
            $_SESSION['feedback'] = 'feedback';
            $message1 = "*Need to login first!";
        }
        else if(empty($feed_name)||empty($feed_email)||empty($feed_image)||empty($feed_content)){
            $message1 = "*All fields need to be filled";
        }
        else{
          
        $_SESSION['feed_name'] = $feed_name;
        $_SESSION['feed_email'] = $feed_email;
        $_SESSION['feed_image'] = $feed_image;
        $_SESSION['feed_content'] = $feed_content;
        
        
        
        $query = "INSERT INTO feedbacks VALUES('','$feed_name', '$feed_email', '$feed_content', '$feed_image', 'denied', now())";
        
        $submit_feedback = mysqli_query($connection, $query);
        if(!$submit_feedback){
            die("Query Failed".mysqli_error($connection));
        }
        
        $message2 = "FeedBack submitted successfully!";
        
            
          
            
        $to = $feed_email;
        $subject = "no-reply";     
        $msg = "Thank you for your feedback!";
        $header = "From: info@tourguide.com";    

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail($to,$subject,$msg, $header);    
               
            
            
        $_SESSION['feed_name'] = null;
        $_SESSION['feed_email'] = null;
        $_SESSION['feed_image'] = null;
        $_SESSION['feed_content'] = null;
        $_SESSION['feedback'] = 'feedback';    
        }
        
    }

?>


<head><link type="text/css" rel="stylesheet" href="css/feedback.css"/></head>

        <div id="all">
            <div class="form_fill">
                <h1>Give Feedback</h1>
            <?php 
            if(isset($message2)){
                echo "<h3 style='color:green;font-family: 'Raleway', sans-serif;'>$message2</h3>";
            }if(isset($message1)){
                echo "<h3 style='color:red;font-family: 'Raleway', sans-serif;'>$message1</h3>";
            }
            ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="feedback_author" placeholder="Name" class="box2" value="<?php if(isset($_SESSION['feed_name'])){echo $_SESSION['feed_name'];}?>">
                    <input type="email" name="feedback_email" placeholder="Email" class="box2" value="<?php if(isset($_SESSION['feed_email'])){echo $_SESSION['feed_email'];}?>">
                    <label for="" class="box2">Choose Image</label>
                    <input type="file" name="feedback_image" placeholder="Choose Image" class="box2">
                    <textarea name="feedback_content" id="" placeholder="Write your feedback" class="box3"><?php if(isset($_SESSION['feed_content'])){echo $_SESSION['feed_content'];}?></textarea>
                    <input type="submit" value="Submit" class="sub_btn" name="feed_btn">
                    <a href=""><input style="background-color: orange;" type="button" value="Home" class="sub_btn"></a>
                </form>
            </div>
            <div id="sidebar_div"></div>
        </div>
<?php include "includes/footer1.php"?>