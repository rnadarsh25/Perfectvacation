<?php include "includes/db.php"?>
<?php include "includes/functions.php"?>
<?php ob_start();?>
<?php session_start(); ?>
<?php

    if(isset($_POST['login2_btn'])){

        $email = mysqli_real_escape_string($connection, $_POST['login_email']);
        $password = mysqli_real_escape_string($connection,$_POST['login_password']);
        $role = mysqli_real_escape_string($connection,$_POST['login_role']);
        
        if(empty($email) || empty($password) || empty($role)){
            $message = "*All Fields need to be filled!!";
        }
        
        switch($role){
            case 'admin': 
            $query = "SELECT * FROM admins WHERE admin_email = '$email'";
            $select_admin = mysqli_query($connection, $query);
            if(!$select_admin){
                die("Query Failed".mysqli_error($connection));
            }
                
            if(mysqli_num_rows($select_admin)>0){    
            while($row = mysqli_fetch_assoc($select_admin)){
                $db_id = $row['admin_id'];
                $db_email = $row['admin_email'];
                $db_password = $row['admin_password'];
                $db_firstname = $row['admin_firstname'];
                $db_role = $row['admin_role'];
                $db_status = $row['admin_status'];
                $db_salt = $row['randSalt'];
            }
                
            $password = crypt($password, $db_salt);    
            
            if($email == $db_email && $password == $db_password && $db_status =='active'){
                $_SESSION['user_id'] = $db_id;
                $_SESSION['firstname'] = $db_firstname;
                $_SESSION['user_role'] = $db_role;
                $_SESSION['user_status'] = $db_status;
                
                header("Location: ./admin/");
            }else{
                $message = "*Email or Password is not matched!!";
            }
        }else{
                $message = "*Admin does not exits!";
            }
            break;
                
            case 'agent': 
            $query = "SELECT * FROM agents WHERE agent_email = '$email'";
            $select_agent = mysqli_query($connection, $query);
            if(!$select_agent){
                die("Query Failed".mysqli_error($connection));
            }

            if(mysqli_num_rows($select_agent)>0){    
            while($row = mysqli_fetch_assoc($select_agent)){
                $db_id = $row['agent_id'];
                $db_email = $row['agent_email'];
                $db_password = $row['agent_password'];
                $db_firstname = $row['agent_firstname'];
                $db_role = $row['agent_role'];
                $db_active = $row['agent_active'];
                $db_salt = $row['randSalt'];
            }    
            
            $password = crypt($password, $db_salt);
                
            if($email == $db_email && $password == $db_password && $db_active =='yes'){
                $_SESSION['user_id'] = $db_id;
                $_SESSION['firstname'] = $db_firstname;
                $_SESSION['user_role'] = $db_role;
                $_SESSION['user_active'] = $db_active;
                
                header("Location: ./agent/");
            }else{
                $message = "*Email or Password is not matched!!";
            } 
          }else{
                $message = "*Agent does not exits!";
            }
            break;    
                
                
                
        }
        
        

    }       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="css/login2.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
     integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

     <link href="https://fonts.googleapis.com/css?family=Arapey|Exo|Great+Vibes|Orbitron|Play|Playfair+Display+SC|Prata|Satisfy|Tangerine&display=swap" 
     rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Be+Vietnam|Raleway|Turret+Road&display=swap"
      rel="stylesheet">
</head>
<body>
    
    <div id="main">
        <div id="header">
            <h1>tourGuide <span>travel with us to 300+ cities , 3000+ travel agents , anywhere.</span></h1>
        </div>
        <div id="moto">
            <h1>There's a smarter way to travel!<br><span>Join tourGuide today!</span></h1>
        </div>
        <div id="login_div">
            <div class="signup_offer">
                <h1>sign up and get exclusive offers</h1>
            </div>
            <div class="login_detail">
                <h1>Login here</h1>
                <?php 
                    
                    if(isset($message)){
                        echo "<h5 style='color: red;'>$message</h5>";
                    }
                    
                ?>
                <form action="" method="POST">
                    <input type="email" name="login_email" placeholder="Enter your email" class="mobile_box"><br>
                    <input type="password" name="login_password" placeholder="Enter password" class="mobile_box"><br>
                    <select name="login_role" id="" class="role">
                        <option value="">Select Role</option>
                        <option value="agent">Agent</option>
                        <option value="#">Provider</option>
                        <option value="admin">Corporate</option>
                    </select><br>
                    <input type="submit" name="login2_btn" value="Login" id="verify_btn"/><br><br>
                    <span class="span_div">Forgot password?
                        <a style="text-decoration: none;color:#df293a;font-weight: bold;" href="#"> click here!</a></span>
                </form>
            </div>
            <div class="opt"></div>
        </div>
    </div>

</body>
</html>