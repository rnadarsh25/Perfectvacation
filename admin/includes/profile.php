<h1 class="page-header">
    Welcome to Profile Section
</h1>


<?php


    if(isset($_SESSION['user_id'])){
        $the_admin_id = $_SESSION['user_id'];
        
        $query = "SELECT * FROM admins WHERE admin_id = $the_admin_id";
        $select_admin = mysqli_query($connection, $query);
        confirm($select_admin);
        
        while($row = mysqli_fetch_assoc($select_admin)){
                $admin_id = $row['admin_id'];
                // $admin_password = $row['admin_password'];
                $admin_firstname = $row['admin_firstname'];
                $admin_lastname = $row['admin_lastname'];
                $admin_email = $row['admin_email'];
                $admin_mobile = $row['admin_mobile'];
                $admin_image = $row['admin_image'];
                $admin_status = $row['admin_status'];
                $admin_date = $row['admin_date'];
                
                $salt = $row['randSalt'];
            }
    }
    

    

    if(isset($_POST['update_profile'])){
        
        if(isset($_SESSION['user_id'])){
        $the_admin_id = $_SESSION['user_id'];
        }
        
        $admin_firstname = escape($_POST['admin_firstname']);
        $admin_lastname = escape($_POST['admin_lastname']);
        $admin_email = escape($_POST['admin_email']);
        // $admin_password = escape($_POST['admin_password']);
        // $admin_password = crypt($admin_password, $salt);
        
        $admin_mobile = escape($_POST['admin_mobile']);
        
        $admin_image = $_FILES['admin_image']['name'];
        $admin_image_tmp = $_FILES['admin_image']['tmp_name'];
        
        
        if(empty($_FILES['admin_image'])){
            
            $query = "SELECT * FROM admins WHERE admin_id = $the_admin_id";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)){
                $admin_image = $row['admin_image'];
            }
        }
        move_uploaded_file($admin_image_tmp , "../images/$admin_image");
        
        $query = "UPDATE admins SET admin_firstname = '$admin_firstname',admin_lastname = '$admin_lastname',admin_email = '$admin_email',admin_mobile = '$admin_mobile',admin_image = '$admin_image' WHERE admin_id = $the_admin_id";
        
        
        $update_admin = mysqli_query($connection, $query);
        confirm($update_admin);
        
        $message = "Profile Updated Successfully!";
        
        
        
    }

?>
   
<?php if(isset($message)){
    echo "<h3 style='color:green;'>$message</h3>";
}?>
   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="admin_firstname">First Name</label>
    <input type="text" value="<?php echo $admin_firstname;?>" class="form-control" name="admin_firstname">
    </div>
    
    <div class="form-group">
    <label for="admin_lastname">Last Name</label>
    <input type="text" value="<?php echo $admin_lastname;?>" class="form-control" name="admin_lastname">
    </div>
    
    <div class="form-group">
    <label for="admin_email">Email</label>
    <input type="email" value="<?php echo $admin_email;?>" class="form-control" name="admin_email">
    </div>
    
    <!-- <div class="form-group">
    <label for="admin_password">Change Password</label>
    <input type="password" value="<?php echo $admin_password;?>" class="form-control" name="admin_password">
    </div> -->
    
    <div class="form-group">
    <label for="admin_mobile">Mobile</label>
    <input type="text" value="<?php echo $admin_mobile;?>" class="form-control" name="admin_mobile">
    </div>
    
    <div class="form-group">
    <img src="../images/<?php echo $admin_image;?>" alt="" width="70" height="70">
    </div>
    
    <div class="form-group">
    <label for="admin_image">Change Image</label>
    <input type="file" class="form-control" name="admin_image">
    </div>
    
    <div class="form-group">
    <input type="submit" name='update_profile' value="Update" class="btn btn-success btn-md">
    </div>
    
</form>


<script>
    CKEDITOR.replace( 'site_body' );
</script>