<?php include "db.php"?>
<?php include "functions.php";?>
<?php ob_start();?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New index</title>
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <link type="text/css" rel="stylesheet" href="css/header1.css"/>
    <link type="text/css" rel="stylesheet" href="css/footer1.css"/>
    <link type="text/css" rel="stylesheet" href="css/feedback1.css"/>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
     integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

     <link href="https://fonts.googleapis.com/css?family=Arapey|Exo|Great+Vibes|Orbitron|Play|Playfair+Display+SC|Prata|Satisfy|Tangerine&display=swap" 
     rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Be+Vietnam|Raleway|Turret+Road&display=swap"
      rel="stylesheet">

</head>
<body>
    
    <div id="main">

<div id="heading">
    <h1><img src="images/logo.png" class="logo"/>perfectVacation</h1>
    <span id="para1">plan your vacation here! </span>
</div>

<?php
    if(isset($_SESSION['mobile'])){
    ?>
    <div id="login">
        <ul>
        <li id="lname1"><a href="index.php"><i class="fa fa-user"></i><?php echo $_SESSION['firstname']?> <i class="fas fa-angle-down"></i></a>
        <ul>
            <li id="lprofile1"><a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a></li>
            <li id="lout1"><a href="logout.php"><i class="fa fa-fw fa-power-off"></i>logout</a></li>   
        </ul>
        </li>
    </ul>
    </div>
            
    <?php    
    }else{
?>

<div id="login">
    <a href="login.php"><input type="button" value="login / signup" class="login_btn"></a>
</div>
<?php
    }
?>