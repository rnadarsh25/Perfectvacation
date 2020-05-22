<h1 class="page-header">
    Welcome to Users Section
</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
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
            
            $query = "SELECT * FROM users ORDER BY user_id DESC";
            $select_users = mysqli_query($connection, $query);
            
            confirm($select_users);
            
            while($row = mysqli_fetch_assoc($select_users)){
                $user_id = $row['user_id'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_mobile = $row['user_mobile'];
                $user_image = $row['user_image'];
                $user_status = $row['user_status'];
                $user_date = $row['user_date'];
                
                echo "<tr>";
                
                echo "<td>$user_id</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_mobile</td>";
                
                echo "<td><img src='../images/$user_image' width='60' height='50'/></td>";
                
                echo "<td>$user_status</td>";
                echo "<td>$user_date</td>";
                echo "<td><a class='btn btn-success btn-sm' href='users.php?source=users&allow_id=$user_id'>Allow</a></td>";
                
                echo "<td><a class='btn btn-warning btn-sm' href='users.php?source=users&deny_id=$user_id'>Deny</a></td>";
                
                echo "<td><a class='btn btn-danger btn-sm' href='users.php?source=users&delete_id=$user_id'>Delete</a></td>";
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>


<?php

    if(isset($_GET['allow_id'])){
        
        $the_user_id = escape($_GET['allow_id']);
        $query = "UPDATE users SET user_status = 'allowed' WHERE user_id = $the_user_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=users");
    }

    if(isset($_GET['deny_id'])){
        
        $the_user_id = escape($_GET['deny_id']);
        $query = "UPDATE users SET user_status = 'denied' WHERE user_id = $the_user_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=users");
    }

    if(isset($_GET['delete_id'])){
        
        $the_user_id = escape($_GET['delete_id']);
        $query = "DELETE FROM users WHERE user_id = $the_user_id";
        $delete_user = mysqli_query($connection, $query);
        confirm($delete_user);
        header("Location: users.php?source=users");
    }

?>