<?php include "includes/db.php"?>
<?php include "includes/functions.php"?>
<?php ob_start();?>
<?php session_start();?>

<?php if(!isset($_SESSION['mobile'])){
 header("Location: login.php");
}?>

<?php
    if(isset($_POST['book_btn'])){
        $firstname = escape($_POST['firstname']);
        $lastname = escape($_POST['lastname']);
        $mobile = escape($_POST['mobile']);
        $email = escape($_POST['email']);
        $adults = escape($_POST['adults']);
        $visit_date = escape($_POST['visit_date']);
        $visit_place = escape($_POST['city']);
        
        if(empty($firstname)||empty($lastname)||empty($mobile)||empty($email)||empty($adults)||empty($visit_date)||empty($visit_place)){
            $message = "*All Fields need to be filed";
        }else{
        
        $_SESSION['booked_firstname'] = $firstname;
        $_SESSION['booked_lastname'] = $lastname;
        $_SESSION['booked_mobile'] = $mobile;
        $_SESSION['booked_email'] = $email;
        $_SESSION['booked_adults'] = $adults;
        $_SESSION['booked_visit_date'] = $visit_date;
        $_SESSION['booked_visit_place'] = $visit_place;
        
        $count = 0;
        if(isset($_POST['checkBoxArray'])){
            foreach($_POST['checkBoxArray']  as $checkboxid){
                $query = "SELECT * FROM tour_sites WHERE site_id = $checkboxid";
                $sites_price = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($sites_price);
                $count = $count+$row['site_price'];
            }
        }
        $_SESSION['booked_price'] = $count*$adults;
        }
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link type="text/css" rel="stylesheet" href="css/book_tickets.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
     integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

     <link href="https://fonts.googleapis.com/css?family=Arapey|Exo|Great+Vibes|Orbitron|Play|Playfair+Display+SC|Prata|Satisfy|Tangerine&display=swap" 
     rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Be+Vietnam|Raleway|Turret+Road&display=swap"
      rel="stylesheet">
      

</head>
<body>
    <div id="main">
        <div class="header">
        <?php 
            
        if(isset($_GET['source_city'])){
            $the_site_city = escape($_GET['source_city']);
            $the_site_id = escape($_GET['site_id']);
            $the_location_id = escape($_GET['location_id']);
            
            $query = "SELECT * FROM tour_locations WHERE tour_location_id = $the_location_id";
            $select_location = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_location);
            $location = $row['tour_location_name'];
        }
        
        ?>

            <a href="index.php">Home</a> / 
            <a href="alltours.php?location_id=<?php echo $the_location_id?>"><?php echo $location;?> Tourism</a>/
             <a href="details.php?location_id=<?php echo $the_location_id?>&source_city=<?php echo $the_site_city?>&site_id=<?php echo $the_site_id?>"><?php echo $the_site_city?></a> / <a href="">Booking</a>
        </div>
        <div class="show_all">
            <div class="form_fill">
                <h1>Booking Details</h1>
              <form action="" method="POST">
              <?php if(isset($message)){echo "<h3 style='color:red;'>$message</h3>";}?>
                <input type="text" name="firstname" class="box" placeholder="First Name"
                value="<?php if(isset($_SESSION['mobile'])){ echo $_SESSION['firstname'];} ?>">

                <input type="text" name="lastname" class="box" placeholder="Last Name"
                value="<?php if(isset($_SESSION['mobile'])){ echo $_SESSION['lastname'];} ?>">

                <input type="text" name="mobile" class="box" placeholder="Mobile"
                value="<?php if(isset($_SESSION['mobile'])){ echo $_SESSION['mobile'];} ?>">

                <input type="email" name="email" class="box" placeholder="Email"
                value="<?php if(isset($_SESSION['mobile'])){ echo $_SESSION['email'];} ?>">

                <input type="text" name="adults" class="box" placeholder="Adults"
                value="<?php if(isset($_SESSION['booked_adults'] )){ echo $_SESSION['booked_adults'] ;} ?>">

                <input type="date" name="visit_date" class="box" placeholder="Visiting Date"
                value="<?php if(isset($_SESSION['booked_visit_date'] )){ echo $_SESSION['booked_visit_date'] ;} ?>">

                <input type="text" name="city" class="box2" placeholder="Visiting Place"
                value="<?php if(isset($_GET['source_city'])){ echo $the_site_city;}?>">

                <table class="box2 table1">
                     <thead>
                         <tr>
                             <th><input type="checkbox" id="selectAllBoxes"></th>
                             <th>S.No</th>
                             <th>Image</th>
                             <th>Places to visit</th>
                             <th>Cost</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php 
                         $query = "SELECT * FROM tour_sites WHERE site_city = '$the_site_city'";
                         $select_all_sites = mysqli_query($connection, $query);
                         if(!$select_all_sites){
                             die("Query Failed".mysqli_error($connection));
                         }
                         
                         while($row = mysqli_fetch_assoc($select_all_sites)){
                                $site_id = $row['site_id'];
                                $site_package_id = $row['site_package_id'];
                                $site_title = $row['site_title'];
                                $site_location_id = $row['site_location_id'];
                                $site_state = $row['site_state'];
                                $site_city = $row['site_city'];
                                $site_image = $row['site_image'];
                                $site_about = $row['site_about'];
                                $site_price = $row['site_price'];
                                $site_tour_start_date = $row['site_tour_start_date'];
                                $site_tour_end_date = $row['site_tour_end_date'];
                             
                             echo "<tr>";
                             ?>
    <td><input type='checkbox' class="checkboxes" name="checkBoxArray[]" value="<?php echo $site_id;?>" checked></td>;
                             <?php
                             echo "<td>$site_id</td>";
                             echo "<td><img src='./images/$site_image' width='60' height='60'></td>";
                             echo "<td>$site_title</td>";
                             echo "<td>$site_price</td>";
                             echo "</tr>";
                         }
                         
                         ?>
                     </tbody>
                 </table>

                <input type="submit" class="sub_btn" name="book_btn" value="proceed to payments">
              </form>
            </div>
            <div class="show_price">
                <form action="tickets.php" method="POST">
                <input type="text" value="Selected City: " class="box" readonly><input type="text" class="box"
                value="<?php if(isset($_SESSION['booked_visit_place'])){echo $_SESSION['booked_visit_place'];}?>">

                <input type="text" value="Total Costs: " class="box" readonly><input type="text" class="box"
                value="<?php if(isset($_SESSION['booked_price'])){echo $_SESSION['booked_price'];}?>">

                <input type="submit" value="make payment" class="sub_btn">
                <input type="reset" value="cancel" class="sub_btn">
                </form>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $("#selectAllBoxes").click(function(event){
            if(this.checked){
                $(".checkboxes").each(function(){
                    this.checked = true;
                });
            }else{
                $(".checkboxes").each(function(){
                    this.checked = false;
                })
            }
        })
    })
</script>

</body>
</html>