<?php include "includes/db.php";?>
<?php include "includes/functions.php"?>
<?php
ob_start();
session_start();

if(isset($_POST['register'])){
    $firstname = mysqli_real_escape_string($connection, $_POST['in_firstname']);
    $lastname = mysqli_real_escape_string($connection,$_POST['in_lastname']);
    $email = mysqli_real_escape_string($connection,$_POST['in_email']);
    $city = mysqli_real_escape_string($connection,$_POST['in_city']);
    
    if(empty($firstname)||empty($lastname)||empty($email)||empty($city)){
        $message = "*All fields need to be filled!";
    }
    else if(isset($_SESSION['register_mobile'])){  
      $the_mobile = $_SESSION['register_mobile'];
        
        $query = "INSERT INTO users VALUES('','$firstname', '$lastname', '$email','$the_mobile','info.jpg','$city','allowed',now())";
        
        $create_user = mysqli_query($connection, $query);
        if(!$create_user){
            $message = "Registration failed!";
        }else{
        
        //fetching data
        $query = "SELECT * FROM users WHERE user_mobile = '$the_mobile'";
        $select_user = mysqli_query($connection, $query);
        if(!$select_user){
            die("Query Failed".mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($select_user)){
            $db_id = $row['user_id'];
            $db_mobile = $row['user_mobile'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_email = $row['user_email'];
            $db_city = $row['user_city'];
        }
        
        if($the_mobile==$db_mobile && !empty($db_firstname)){
        $_SESSION['user_id'] = $db_id;
        $_SESSION['firstname'] = $db_firstname;    
        $_SESSION['lastname'] = $db_lastname;    
        $_SESSION['email'] = $db_email;
        $_SESSION['mobile'] = $db_mobile;
        $_SESSION['user_city'] = $db_city;
            
        $_SESSION['register_mobile'] = null;    
        
        if(isset($_SESSION['feedback'])){
            header("Location: give_feedback.php");
        }  
        header("Location: index.php");    
        }    
            
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
    <link type="text/css" rel="stylesheet" href="css/register.css"/>
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
                <h1>Sign up here</h1>
                <?php if(isset($message)){
            
                echo "<h3 style='color:red;margin:2px 0px;'>$message</h3>";                
        
                }?>
                <form action="" method="POST">
                    <input type="text" name="in_firstname" placeholder="Enter your Firstname" class="mobile_box"><br>
                    <input type="text" name="in_lastname" placeholder="Enter your Lastname" class="mobile_box"><br>
                    <input type="email" name="in_email" placeholder="Enter your email" class="mobile_box"><br>
                    <input type="text" name="in_city" placeholder="Enter your city" class="mobile_box"><br>
                    <input type="submit" name="register" value="Register" id="verify_btn"/><br><br>
                    <span class="span_div">Already have account?
                        <a style="text-decoration: none;color:#df293a;font-weight: bold;" href="login.php"> login here!</a></span>
                </form>
            </div>
            <div class="opt"></div>
        </div>
    </div>

</body>
</html>