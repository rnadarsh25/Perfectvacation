<h1 class="page-header">
    Add new Admin Section
</h1>

<?php 
    
    if(isset($_POST['add_admin'])){
        
        $admin_firstname = mysqli_real_escape_string($connection, $_POST['admin_firstname']);
        $admin_lastname = mysqli_real_escape_string($connection, $_POST['admin_lastname']);
        $admin_email = mysqli_real_escape_string($connection, $_POST['admin_email']);
        $admin_mobile = mysqli_real_escape_string($connection, $_POST['admin_mobile']);
        $admin_password = mysqli_real_escape_string($connection, $_POST['admin_password']);
        $admin_status = mysqli_real_escape_string($connection, $_POST['admin_status']);
        
        $admin_image = $_FILES['admin_image']['name'];
        $admin_image_tmp = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($admin_image_tmp, "../images/$admin_image");
        
        $query = "INSERT INTO admins VALUES('', 'admin', '$admin_password', '$admin_firstname', '$admin_lastname','$admin_email','$admin_mobile', '$admin_image','$admin_status',now())";
        
        $add_admin = mysqli_query($connection, $query);
        confirm($add_admin);
        
        $message = "Admin Created successfully!";
        
    }

?>

<?php

    if(isset($message)){
        echo "<h3 style='color:green;font-size:16px;'>$message</h3>";
    }
    
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="admin_firstname">First Name</label>
        <input type="text" name="admin_firstname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="admin_lastname">Last Name</label>
        <input type="text" name="admin_lastname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="admin_email">Email</label>
        <input type="email" name="admin_email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="admin_mobile">Mobile</label>
        <input type="text" name="admin_mobile" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="admin_password">password</label>
        <input type="password" name="admin_password" class="form-control">
    </div>

    <div class="form-group">
       <label for="admin_status">Select Status</label>
        <select name="admin_status" class="form-control" id="">
            <option value="active">Active</option>
            <option value="blocked">Block</option>
        </select>
    </div>            
    
    <div class="form-group">
        <label for="admin_image">Choose Image</label>
        <input type="file" name="admin_image" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit" name="add_admin" class="btn btn-success btn-sm">
    </div>
</form>