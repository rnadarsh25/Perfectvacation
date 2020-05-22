<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Content</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <th>Allow</th>
                <th>Deny</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            
            $query = "SELECT * FROM feedbacks ORDER BY feedback_id DESC";
            $select_feedbacks = mysqli_query($connection, $query);
            
            confirm($select_feedbacks);
            
            while($row = mysqli_fetch_assoc($select_feedbacks)){
                $feedback_id = $row['feedback_id'];
                $feedback_author = $row['feedback_author'];
                $feedback_email = $row['feedback_email'];
                $feedback_content = $row['feedback_content'];
                $feedback_image = $row['feedback_image'];
                $feedback_status = $row['feedback_status'];
                $feedback_date = $row['feedback_date'];
                
                echo "<tr>";
                
                echo "<td>$feedback_id</td>";
                echo "<td>$feedback_author</td>";
                echo "<td>$feedback_email</td>";
                echo "<td>$feedback_content</td>";
                
                echo "<td><img src='../images/$feedback_image' width='60' height='50'/></td>";
                
                echo "<td>$feedback_status</td>";
                echo "<td>$feedback_date</td>";
                echo "<td><a class='btn btn-success btn-sm' href='feedbacks.php?allow_id=$feedback_id'>Allow</a></td>";
                
                echo "<td><a class='btn btn-warning btn-sm' href='feedbacks.php?deny_id=$feedback_id'>Deny</a></td>";
                
                echo "<td><a class='btn btn-danger btn-sm' href='feedbacks.php?delete_id=$feedback_id'>Delete</a></td>";
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>


<?php

    if(isset($_GET['allow_id'])){
        
        $the_feedback_id = $_GET['allow_id'];
        $query = "UPDATE feedbacks SET feedback_status = 'allowed' WHERE feedback_id = $the_feedback_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: feedbacks.php");
    }

    if(isset($_GET['deny_id'])){
        
        $the_feedback_id = $_GET['deny_id'];
        $query = "UPDATE feedbacks SET feedback_status = 'denied' WHERE feedback_id = $the_feedback_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: feedbacks.php");
    }

    if(isset($_GET['delete_id'])){
        
        $the_feedback_id = $_GET['delete_id'];
        $query = "DELETE FROM feedbacks WHERE feedback_id = $the_feedback_id";
        $delete_feedback = mysqli_query($connection, $query);
        confirm($delete_feedback);
        header("Location: feedbacks.php");
    }

?>