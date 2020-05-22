<?php

    if(isset($_POST['add_image'])){
        
        $image_title = escape($_POST['image_title']);
        $image_city = escape($_POST['image_city']);
        
        $image_name = $_FILES['image_name']['name'];
        $image_name_tmp = $_FILES['image_name']['tmp_name'];
        move_uploaded_file($image_name_tmp, "../images/$image_name");
        
        $query = "INSERT INTO all_images VALUES('', '$image_name', '$image_title', '$image_city')";
        $add_new_image = mysqli_query($connection, $query);
        
        confirm($add_new_image);
        
        header("Location: directpage.php");
        
        
        
    }

    if(isset($_POST['add_video'])){
        
        $video_title = escape($_POST['video_title']);
        $video_city = escape($_POST['video_city']);
        
        $video_name = $_FILES['video_name']['name'];
        $video_name_tmp = $_FILES['video_name']['tmp_name'];
        move_uploaded_file($video_name_tmp, "../videos/$video_name");
        
        $query = "INSERT INTO all_videos VALUES('', '$video_name', '$video_title', '$video_city')";
        $add_new_video = mysqli_query($connection, $query);
        
        confirm($add_new_video);
        
        header("Location: directpage.php");
        
        
        
    }

?>

<!--
<!DOCTYPE html>
<html lang="en">
-->
<head>
<!--
    <meta charset="UTF-8">
    <title>Assets</title>
-->
    <link rel="stylesheet" href="css/assets.css">
<!--
</head>
<body>
-->
    
    <div class="main">
        
        <div id="images">
          
          <div class="addnew">
           <h5 class="addnew_btn" style="font-size:16px;">Images</h5>
           </div>
           
           <form action="" method="post" enctype="multipart/form-data" style="padding: 10px 15px 0px 10px;">
               
               <div class="form-group">
                   <label for="image_title">Title</label>
                   <input type="text" name="image_title" class="form-control">
               </div>
               
               <div class="form-group">
                   <label for="image_city">City</label>
                   <input type="text" name="image_city" class="form-control">
               </div>
               
               <div class="form-group">
                   <label for="image_name">Select Image</label>
                   <input type="file" name="image_name" class="form-control">
               </div>
               
               <div class="form-group">
                   <input type="submit" value="Add Image" name="add_image" class="btn btn-success btn-md">
               </div>
               
           </form>
            
        </div>
        
        <div id="videos">
          
          <div class="addnew">
           <h5 class="addnew_btn" style="font-size:16px;">Videos</h5>
           </div>
           
           <form action="" method="post" enctype="multipart/form-data" style="padding: 10px 10px 0px 15px;">
               
               <div class="form-group">
                   <label for="video_title">Title</label>
                   <input type="text" name="video_title" class="form-control">
               </div>
               
               <div class="form-group">
                   <label for="video_city">City</label>
                   <input type="text" name="video_city" class="form-control">
               </div>
               
               <div class="form-group">
                   <label for="video_name">Select video</label>
                   <input type="file" name="video_name" class="form-control">
               </div>
               
               <div class="form-group">
                   <input type="submit" value="Add Video" name="add_video" class="btn btn-success btn-md">
               </div>
               
           </form>
            
        </div>
        
    </div>
    
<!--
</body>
</html>-->
