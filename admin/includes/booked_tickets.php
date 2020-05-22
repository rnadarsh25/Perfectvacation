<h1 class="page-header">
    Welcome to Booked Tickets Section
</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Adults</th>
                <th>City</th>
                <th>Visit Date</th>
                <th>Book_Cancel</th>
                <th>Status</th>
                <th>Agent</th>
                <th>Open</th>
                <th>Close</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            
            $query = "SELECT * FROM booked_tickets ORDER BY ticket_id DESC";
            $select_tickets = mysqli_query($connection, $query);
            
            confirm($select_tickets);
            
            while($row = mysqli_fetch_assoc($select_tickets)){
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
                echo "<td>$ticket_book_cancel</td>";
                echo "<td>$ticket_status</td>";
                
                $query = "SELECT * FROM agents WHERE agent_id = $ticket_agent_id";
                $fetch_agent = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($fetch_agent);
                $agent_f = $row['agent_firstname'];
                $agent_l = $row['agent_lastname'];
                
                echo "<td>$agent_f $agent_l</td>";
                
                echo "<td><a class='btn btn-success btn-sm' href='users.php?source=booked_tickets&open_id=$ticket_id'>Open</a></td>";
                
                echo "<td><a class='btn btn-warning btn-sm' href='users.php?source=booked_tickets&close_id=$ticket_id'>Close</a></td>";
                
                echo "<td><a class='btn btn-danger btn-sm' href='users.php?source=booked_tickets&delete_id=$ticket_id'>Delete</a></td>";
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>


<?php

    if(isset($_GET['close_id'])){
        
        $the_ticket_id = escape($_GET['close_id']);
        $query = "UPDATE booked_tickets SET booked_status = 'closed' WHERE ticket_id = $the_ticket_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=booked_tickets");
    }
    if(isset($_GET['open_id'])){
        
        $the_ticket_id = escape($_GET['open_id']);
        $query = "UPDATE booked_tickets SET booked_status = 'open' WHERE ticket_id = $the_ticket_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=booked_tickets");
    }

    if(isset($_GET['delete_id'])){
        
        $the_ticket_id = escape($_GET['delete_id']);
        $query = "DELETE FROM booked_tickets WHERE ticket_id = $the_ticket_id";
        $delete_ticket = mysqli_query($connection, $query);
        confirm($delete_ticket);
        header("Location: users.php?source=booked_tickets");
    }

?>