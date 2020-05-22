<?php include "includes/header1.php";?>
<?php

if(!isset($_SESSION['booked_price'])){
    header("Location: index.php");
}

if(isset($_SESSION['booked_price'])){
    $firstname = $_SESSION['booked_firstname'];
    $lastname = $_SESSION['booked_lastname'];
    $mobile = $_SESSION['booked_mobile'];
    $email = $_SESSION['booked_email'];
    $adults = $_SESSION['booked_adults'];
    $visit_place = $_SESSION['booked_visit_place'];
    $visit_date = $_SESSION['booked_visit_date'];
    $price= $_SESSION['booked_price'];
    $payment_status = "Successful";
    
    $user_id =1; //$_SESSION['user_id'];
    $query = "SELECT * FROM agents WHERE agent_status = 'open' AND agent_city = '$visit_place' LIMIT 1";
    $select_agent = mysqli_query($connection, $query);
    if(!$select_agent){
        die("Query Failed".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_agent)){
        $assigned_agent_id = $row['agent_id'];
    }
    
    $query = "INSERT INTO booked_tickets VALUES('', $user_id, $assigned_agent_id, '$firstname', '$lastname', '$mobile', '$email', '$adults', '$visit_place', '$price','$payment_status', '$visit_date', now(),'booked', 'open')";
    
    $insert_booked_ticket = mysqli_query($connection, $query);
    if(!$insert_booked_ticket){
        die("Query Failed".mysqli_error($connection));
    }
    
}

    
?>


<head><link type="text/css" rel="stylesheet" href="css/tickets.css"/></head>
        <div id="all">
            <div class="show_booked_ticket">
                <form action="invoice.php" method = "post" target="_blank">
                <h1>Booking Summary</h1>
                <input type="text" value="First Name: " class="box" readonly><input type="text" name="firstname" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_firstname'])){echo $_SESSION['booked_firstname'];}?>">
                <input type="text" value="Last Name: " class="box" readonly><input type="text" name="lastname" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_lastname'])){echo $_SESSION['booked_lastname'];}?>">
                <input type="text" value="Contact Number: " class="box" readonly><input type="text" name="mobile" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_mobile'])){echo $_SESSION['booked_mobile'];}?>">
                <input type="text" value="Contact Email: " class="box" readonly><input type="text" name="email" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_email'])){echo $_SESSION['booked_email'];}?>">
                <input type="text" value="Adults: " class="box" readonly><input type="text" name="adults" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_adults'])){echo $_SESSION['booked_adults'];}?>">
                <input type="text" value="Visiting Place: " class="box" readonly><input type="text" name="visit_place" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_visit_place'])){echo $_SESSION['booked_visit_place'];}?>">
                <input type="text" value="Visiting Date: " class="box" readonly><input type="text" name="visit_date" placeholder="name" class="box" readonly value="<?php if(isset($_SESSION['booked_visit_date'])){echo $_SESSION['booked_visit_date'];}?>">
                
                <input type="text" value="Agent Assigned:" class="box" readonly><input name="agent_name" type="text" class="box2" readonly value="<?php if(isset($assigned_agent_id)){
                        
                        $query = "SELECT * FROM agents WHERE agent_id = $assigned_agent_id";
                        $fetch_agent = mysqli_query($connection, $query);
                        if(!$fetch_agent){
                            die("Query Failed".mysqli_error($connection));
                        }
                        while($row = mysqli_fetch_assoc($fetch_agent)){
                            $agent_id = $row['agent_id'];
                            $agent_firstname = $row['agent_firstname'];
                            $agent_lastname = $row['agent_lastname'];
                            $agent_mobile = $row['agent_mobile'];
                            $agent_email = $row['agent_email'];
                            
                            echo $agent_firstname." ".$agent_lastname;
                        }
            
                        }?>"><input type="button" value="Agent Details" class="btn2" id="agent_btn"><br>
                        
                        <div id="show_agent">
                            <!-- <input type="text" value="Agent Name:" class="box" readonly><input type="text" value="<?php echo $agent_firstname."  ".$agent_lastname?>" class="box" readonly><br> -->
                            <input type="text" value="Agent Contact Number:" class="box" readonly><input name="agent_mobile" type="text" value="<?php echo $agent_mobile;?>" class="box" readonly><br>
                            <input type="text" value="Agent Email:" class="box" readonly><input name="agent_email" type="text" value="<?php echo $agent_email;?>" class="box" readonly><br>
                        </div>
                
                <input type="text" value="Total Price:" class="box" readonly><input name="price" type="text" class="box" readonly value="<?php if(isset($_SESSION['booked_price'])){echo $_SESSION['booked_price'];}?>">
                <input type="text" value="Payment Status:" class="box" readonly><input name="status" type="text" class="box" readonly value="<?php if(isset($_SESSION['booked_price'])){echo "Successful";}?>">
            </div>
            <div class="feedback_div">
                <a href="feedback.php"><input type="button" value="Give Feedback" class="sub_btn"></a>
            </div>
            <div class="download_ticket">
                <a href=""><input type="submit" value="Download Ticket" name="invoice" class="sub_btn"></a>
            </div>
            </form>
        </div> 
        
        <?php
        $_SESSION['booked_firstname'] = null;
        $_SESSION['booked_lastname'] = null;
        $_SESSION['booked_mobile'] = null;
        $_SESSION['booked_email'] = null;
        $_SESSION['booked_adults'] = null;
        $_SESSION['booked_visit_date'] = null;
        $_SESSION['booked_visit_place'] = null;
        $_SESSION['booked_price'] = null;
        
        ?>    

<?php include "includes/footer1.php";?>