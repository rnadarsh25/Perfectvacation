<?php include "includes/header1.php";?>
<?php

    if(isset($_POST['update_profile'])){
        $the_user_id = $_SESSION['user_id'];
        
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
        $mobile = mysqli_real_escape_string($connection,$_POST['mobile']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $city = mysqli_real_escape_string($connection,$_POST['city']);
        
        if(empty($firstname)||empty($lastname)||empty($mobile)||empty($email)||empty($city)){
            $message1 = "*All Fields need to be filled!";
        }else{
        
        $query = "UPDATE users SET user_firstname='$firstname',user_lastname='$lastname', user_mobile='$mobile',user_email='$email',user_city='$city' WHERE user_id = $the_user_id";
        
        $update_profile = mysqli_query($connection, $query);
        if(!$update_profile){
            die("Query failed".mysqli_error($connection));
        }
        
        $message2 = "Profile Updated Successfully!";    
            
        }
        
    }

    if(isset($_POST['upload_image'])){
        $the_user_id = $_SESSION['user_id'];
        
        if(empty($_FILES['image'])|| $_FILES['image']==""){
            $message3 = "*Please select image";
        }else{
        
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "images/$image");
        
        if(empty($_FILES['image'])){
            $query = "SELECT * FROM users WHERE user_id = $the_user_id";
            $select_image = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_image);
            $image = $row['user_image'];
        }
        
        $query = "UPDATE users SET user_image='$image' WHERE user_id = $the_user_id";
        
        $update_profile = mysqli_query($connection, $query);
        if(!$update_profile){
            die("Query failed".mysqli_error($connection));
        }
        
        // $message2 = "Profile Updated Successfully!";    
            
        }
        
    }


?>


<head><link type="text/css" rel="stylesheet" href="css/profile.css"/></head>

        <?php
        if(isset($message1)){
            echo "<h3 style='color:red;text-align:center;'>$message1</h3>";
        }if(isset($message2)){
            echo "<h3 style='color:#00cd66;text-align:center;'>$message2</h3>";
        }
        ?>

        <div id="all">

        <?php
            
            if(isset($_SESSION['mobile'])){
                $the_user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM users WHERE user_id = $the_user_id";
                $select_user = mysqli_query($connection, $query);
                
                if(!$select_user){
                    die("Query Failed".mysqli_error($connection));
                }
                while($row = mysqli_fetch_assoc($select_user)){
                    
                    $user_id = $row['user_id'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_mobile = $row['user_mobile'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_city = $row['user_city'];
                }
            }
                
        ?>

            <div class="form_fill">
                <h1>User Profile</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" value="First Name: " class="box" readonly><input type="text" name="firstname" placeholder="firstname" class="box" value="<?php if(isset($user_firstname)){ echo $user_firstname; }?>">
                <input type="text" value="Last Name: " class="box" readonly><input type="text" name="lastname" placeholder="lastname" class="box" value="<?php if(isset($user_lastname)){ echo $user_lastname; }?>">
                <input type="text" value="Email: " class="box" readonly><input type="email" name="email" placeholder="email" class="box" value="<?php if(isset($user_email)){ echo $user_email; }?>">
                <input type="text" value="Mobile: " class="box" readonly><input type="text" name="mobile" placeholder="mobile" class="box" value="<?php if(isset($user_mobile)){ echo $user_mobile; }?>">
                <input type="text" value="City: " class="box" readonly><input type="text" name="city" placeholder="city" class="box" value="<?php if(isset($user_city)){ echo $user_city; }?>">
                    <input type="submit" name="update_profile" value="Update Profile" class="sub_btn">
                    <a href="index.php"><input style="background-color: orange;" type="button" value="Home" class="sub_btn"></a>
                </form>
            </div>
            <div id="sidebar_div">
                <div class="profile_pic">
                    <img src="images/<?php if(isset($user_image)){ echo $user_image; }?>" alt="">
                </div>
                <?php
                if(isset($message3)){
                    echo "<h3 style='color:red;text-align:center;'>$message1</h3>";
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" value="Change Profile Pic" class="box2" readonly>
                    <input type="file" name="image" placeholder="Choose Image" class="box2">
                    <input type="submit" name="upload_image" value="Upload" style="background: #00cd66;" class="upload_btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>