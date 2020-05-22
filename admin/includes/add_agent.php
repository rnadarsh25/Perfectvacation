<h1 class="page-header">
    Add new agent Section
</h1>

<?php 
    
    if(isset($_POST['add_agent'])){
        
        $agent_firstname = mysqli_real_escape_string($connection, $_POST['agent_firstname']);
        $agent_lastname = mysqli_real_escape_string($connection, $_POST['agent_lastname']);
        $agent_city = mysqli_real_escape_string($connection, $_POST['agent_city']);
        $agent_email = mysqli_real_escape_string($connection, $_POST['agent_email']);
        $agent_mobile = mysqli_real_escape_string($connection, $_POST['agent_mobile']);
        $agent_password = mysqli_real_escape_string($connection, $_POST['agent_password']);
        $agent_active = mysqli_real_escape_string($connection, $_POST['agent_active']);
        $agent_status = mysqli_real_escape_string($connection, $_POST['agent_status']);
        
        $agent_image = $_FILES['agent_image']['name'];
        $agent_image_tmp = $_FILES['agent_image']['tmp_name'];
        move_uploaded_file($agent_image_tmp, "../images/$agent_image");
        
        $query = "INSERT INTO agents VALUES('', 'agent', '$agent_password', '$agent_firstname', '$agent_lastname','$agent_email','$agent_mobile', '$agent_image','$agent_active', '$agent_status','$agent_city',now())";
        
        $add_agent = mysqli_query($connection, $query);
        confirm($add_agent);
        
        $message = "Agent Created successfully!";
        
    }

?>

<?php

    if(isset($message)){
        echo "<h3 style='color:green;font-size:16px;'>$message</h3>";
    }
    
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="agent_firstname">First Name</label>
        <input type="text" name="agent_firstname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="agent_lastname">Last Name</label>
        <input type="text" name="agent_lastname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="agent_city">City</label>
        <input type="text" name="agent_city" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="agent_email">Email</label>
        <input type="email" name="agent_email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="agent_mobile">Mobile</label>
        <input type="text" name="agent_mobile" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="agent_password">password</label>
        <input type="password" name="agent_password" class="form-control">
    </div>

    <div class="form-group">
       <label for="agent_active">Active</label>
        <select name="agent_active" class="form-control" id="">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div> 
    
    <div class="form-group">
       <label for="agent_status">Status</label>
        <select name="agent_status" class="form-control" id="">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select>
    </div>                       
    
    <div class="form-group">
        <label for="agent_image">Choose Image</label>
        <input type="file" name="agent_image" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit" name="add_agent" class="btn btn-success btn-sm">
    </div>
</form>