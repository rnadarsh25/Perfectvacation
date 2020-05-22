<h1 class="page-header">
    Welcome to Profile Section
</h1>


<?php


    if(isset($_SESSION['user_id'])){
        $the_agent_id = $_SESSION['user_id'];
        
        $query = "SELECT * FROM agents WHERE agent_id = $the_agent_id";
        $select_agent = mysqli_query($connection, $query);
        confirm($select_agent);
        
        while($row = mysqli_fetch_assoc($select_agent)){
                $agent_id = $row['agent_id'];
                $agent_firstname = $row['agent_firstname'];
                $agent_lastname = $row['agent_lastname'];
                // $agent_password = $row['agent_password'];
                $agent_email = $row['agent_email'];
                $agent_mobile = $row['agent_mobile'];
                $agent_image = $row['agent_image'];
                $agent_active = $row['agent_active'];
                $agent_status = $row['agent_status'];
                $agent_date = $row['agent_date'];
                
                $salt = $row['randSalt'];
            }
    }
    

    

    if(isset($_POST['update_profile'])){
        
        if(isset($_SESSION['user_id'])){
        $the_agent_id = $_SESSION['user_id'];
        }
        
        $agent_firstname = escape($_POST['agent_firstname']);
        $agent_lastname = escape($_POST['agent_lastname']);
        $agent_email = escape($_POST['agent_email']);
        
        // $agent_password = escape($_POST['agent_password']);
        // $agent_password = crypt($agent_password, $salt);
        
        $agent_mobile = escape($_POST['agent_mobile']);
        
        $agent_image = $_FILES['agent_image']['name'];
        $agent_image_tmp = $_FILES['agent_image']['tmp_name'];
        
        
        if(empty($_FILES['agent_image'])){
            
            $query = "SELECT * FROM agents WHERE agent_id = $the_agent_id";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)){
                $agent_image = $row['agent_image'];
            }
        }
        move_uploaded_file($agent_image_tmp , "../images/$agent_image");
        
        $query = "UPDATE agents SET agent_firstname = '$agent_firstname',agent_lastname = '$agent_lastname',agent_email = '$agent_email',agent_mobile = '$agent_mobile',agent_image = '$agent_image' WHERE agent_id = $the_agent_id";
        
        
        $update_agent = mysqli_query($connection, $query);
        confirm($update_agent);
        
        $message = "Profile Updated Successfully!";
        
        
        
    }

?>
   
<?php if(isset($message)){
    echo "<h3 style='color:green;'>$message</h3>";
}?>
   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="agent_firstname">First Name</label>
    <input type="text" value="<?php echo $agent_firstname;?>" class="form-control" name="agent_firstname">
    </div>
    
    <div class="form-group">
    <label for="agent_lastname">Last Name</label>
    <input type="text" value="<?php echo $agent_lastname;?>" class="form-control" name="agent_lastname">
    </div>
    
    <div class="form-group">
    <label for="agent_email">Email</label>
    <input type="email" value="<?php echo $agent_email;?>" class="form-control" name="agent_email">
    </div>
    
    <!-- <div class="form-group">
    <label for="agent_password">Password</label>
    <input type="text" value="<?php //echo $agent_password;?>" class="form-control" name="agent_password">
    </div> -->
    
    <div class="form-group">
    <label for="agent_mobile">Mobile</label>
    <input type="text" value="<?php echo $agent_mobile;?>" class="form-control" name="agent_mobile">
    </div>
    
    <div class="form-group">
    <img src="../images/<?php echo $agent_image;?>" alt="" width="70" height="70">
    </div>
    
    <div class="form-group">
    <label for="agent_image">Change Image</label>
    <input type="file" class="form-control" name="agent_image">
    </div>
    
    <div class="form-group">
    <input type="submit" name='update_profile' value="Update" class="btn btn-success btn-md">
    </div>
    
</form>


<script>
    CKEDITOR.replace( 'site_body' );
</script>