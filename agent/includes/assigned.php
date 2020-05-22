<h1 class="page-header">
    Welcome to Assigned Section
</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Adults</th>
                <th>Visit_place</th>
                <th>Visit_Date</th>
                <th>Status</th>
<!--
                <th>Allow</th>
                <th>Deny</th>
                <th>Delete</th>
-->
            </tr>
        </thead>
        
        <tbody>
            <?php
            
            if(isset($_SESSION['user_id'])){
                $the_agent_id = $_SESSION['user_id'];
            }
            
            $query = "SELECT * FROM booked_tickets WHERE ticket_agent_id = $the_agent_id ORDER BY booked_status DESC,ticket_visit_date ASC";
            $select_visitors = mysqli_query($connection, $query);
            
            confirm($select_visitors);
            
            while($row = mysqli_fetch_assoc($select_visitors)){
                $ticket_id = $row['ticket_id'];
                $ticket_agent_id = $row['ticket_agent_id'];
                $ticket_firstname = $row['ticket_firstname'];
                $ticket_lastname = $row['ticket_lastname'];
                $ticket_mobile = $row['ticket_mobile'];
                $ticket_email = $row['ticket_email'];
                $ticket_adults = $row['ticket_adults'];
                $ticket_visit_place = $row['ticket_visit_place'];
                $ticket_visit_date = $row['ticket_visit_date'];
                $ticket_book_cancel = $row['book_cancel'];
                $ticket_status = $row['booked_status'];
                
                echo "<tr>";
                
                echo "<td>$ticket_id</td>";
                echo "<td>$ticket_firstname $ticket_lastname</td>";
                echo "<td>$ticket_email</td>";
                echo "<td>$ticket_mobile</td>";
                echo "<td>$ticket_adults</td>";
                
                echo "<td>$ticket_visit_place</td>";
                
                echo "<td>$ticket_visit_date</td>";
                echo "<td>$ticket_status</td>";
                
//                echo "<td><a class='btn btn-success btn-sm' href='users.php?source=booked_tickets&open_id=$ticket_id'>Open</a></td>";
//                
//                echo "<td><a class='btn btn-warning btn-sm' href='users.php?source=booked_tickets&close_id=$ticket_id'>Close</a></td>";
//                
//                echo "<td><a class='btn btn-danger btn-sm' href='users.php?source=booked_tickets&delete_id=$ticket_id'>Delete</a></td>";
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>


<?php

    if(isset($_GET['allow_id'])){
        
        $the_user_id = $_GET['allow_id'];
        $query = "UPDATE users SET user_status = 'allowed' WHERE user_id = $the_user_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=users");
    }

    if(isset($_GET['deny_id'])){
        
        $the_user_id = $_GET['deny_id'];
        $query = "UPDATE users SET user_status = 'denied' WHERE user_id = $the_user_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=users");
    }

    if(isset($_GET['delete_id'])){
        
        $the_user_id = $_GET['delete_id'];
        $query = "DELETE FROM users WHERE user_id = $the_user_id";
        $delete_user = mysqli_query($connection, $query);
        confirm($delete_user);
        header("Location: users.php?source=users");
    }

?>