<?php include "includes/db.php";?>
<?php include "includes/functions.php"?>
<?php ob_start();?>
<?php session_start();?>

<?php

    if(isset($_POST['login_btn'])){
        
        $mobile = mysqli_real_escape_string($connection, $_POST['input_mobile']);
        if(empty($mobile)){
            $message = "*Field need to be filled!";
        }
        else if(strlen($mobile)<10 || strlen($mobile)>10){
            $message = "*Enter valid mobile number!";
        }else{
         
        $query = "SELECT * FROM users WHERE user_mobile = '$mobile'";
        $select_user = mysqli_query($connection, $query);
        if(!$select_user){
            die("Query Failed".mysqli_error($connection));
        }
        
        if(mysqli_num_rows($select_user)>0){
        
        while($row = mysqli_fetch_assoc($select_user)){
            $db_id = $row['user_id'];
            $db_mobile = $row['user_mobile'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_email = $row['user_email'];
            $db_city = $row['user_city'];
            $db_status = $row['user_status'];
        }
        
        if($mobile == $db_mobile && !empty($db_firstname && $db_status=='allowed')){
        $_SESSION['user_id'] = $db_id;
        $_SESSION['firstname'] = $db_firstname;    
        $_SESSION['lastname'] = $db_lastname;    
        $_SESSION['email'] = $db_email;
        $_SESSION['mobile'] = $db_mobile;
        $_SESSION['user_city'] = $db_city;
            
        if(isset($_SESSION['feedback'])){
            header("Location: give_feedback.php");
        }    
            
        header("Location: index.php");    
        }else if($db_status!='allowed'){
            $message = "Sorry! Your account has been temporarly blocked!";
        }    
            
        }    
        else{
            $_SESSION['register_mobile'] = $mobile;
            header("Location: register.php");
        }    
            
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="css/login.css"/>
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
                <h1>sign in / sign up</h1>
                <?php
                    if(isset($message)){
                        echo "<h5 style='color:red; margin:0px 0px 5px 0px;'>$message</h5>";
                    }
                ?>
                <form action="" method="POST">
                    <input type="text" value="+91" class="code_box" readonly>
                    <input type="text" name="input_mobile" placeholder="Enter mobile number" class="mobile_box"><br>
                    <input type="submit" name="login_btn" value="verify number" id="verify_btn"/><br><br>
                    <!-- <span class="span_div">Prefer to sign in with password? -->
                    <!-- <a style="text-decoration: none;color:#df293a;font-weight: bold;" href="#"> click here!</a></span> -->
                </form>
            </div>
            <div class="opt">
                <fieldset class="sign_opt">
                <legend id="legend">Or sign in as</legend>
                <a href="login2.php" class="agent">Travel Agent ></a>
                <a href="login2.php" class="admin">Provider ></a>
                <a href="login2.php" class="admin">Corporate ></a>
                </fieldset>
            </div>
        </div>
    </div>

</body>
</html>