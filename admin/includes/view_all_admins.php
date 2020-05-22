<h1 class="page-header">
    Welcome to Admin Section
</h1>
    <div>
        <a class="btn btn-success btn-md" href="users.php?source=add_admin">Add new Admin</a>
    </div>   

       <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <?php
                if($_SESSION['user_role']=='imboss'){
                ?>
                <th>Active</th>
                <th>Block</th>
                <th>Edit</th>
                <th>Delete</th>
                <?php
                
                }
                ?>
                
            </tr>
        </thead>
        
        <tbody>
            <?php
            
            $query = "SELECT * FROM admins ORDER BY admin_id";
            $select_admins = mysqli_query($connection, $query);
            
            confirm($select_admins);
            
            while($row = mysqli_fetch_assoc($select_admins)){
                $admin_id = $row['admin_id'];
                $admin_firstname = $row['admin_firstname'];
                $admin_lastname = $row['admin_lastname'];
                $admin_email = $row['admin_email'];
                $admin_mobile = $row['admin_mobile'];
                $admin_image = $row['admin_image'];
                $admin_status = $row['admin_status'];
                $admin_date = $row['admin_date'];
                
                echo "<tr>";
                
                echo "<td>$admin_id</td>";
                echo "<td>$admin_firstname $admin_lastname</td>";
                echo "<td>$admin_email</td>";
                echo "<td>$admin_mobile</td>";
                
                echo "<td><img src='../images/$admin_image' width='60' height='50'/></td>";
                
                echo "<td>$admin_status</td>";
                echo "<td>$admin_date</td>";
                
                if($_SESSION['user_role']=='imboss'){
                echo "<td><a class='btn btn-success btn-sm' href='users.php?source=admins&active_id=$admin_id'>Active</a></td>";
                
                echo "<td><a class='btn btn-warning btn-sm' href='users.php?source=admins&block_id=$admin_id'>Block</a></td>";
                
                echo "<td><a class='btn btn-primary btn-sm' href='users.php?source=admins&edit_id=$admin_id'>Edit</a></td>";
                
                echo "<td><a class='btn btn-danger btn-sm' href='users.php?source=admins&delete_id=$admin_id'>Delete</a></td>";
                }
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>



<?php

    if(isset($_GET['active_id'])){
        
        $the_admin_id = $_GET['active_id'];
        $query = "UPDATE admins SET admin_status = 'active' WHERE admin_id = $the_admin_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=admins");
    }

    if(isset($_GET['block_id'])){
        
        $the_admin_id = $_GET['block_id'];
        $query = "UPDATE admins SET admin_status = 'blocked' WHERE admin_id = $the_admin_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=admins");
    }

    if(isset($_GET['delete_id'])){
        
        $the_admin_id = $_GET['delete_id'];
        $query = "DELETE FROM admins WHERE admin_id = $the_admin_id";
        $delete_admin = mysqli_query($connection, $query);
        confirm($delete_admin);
        header("Location: users.php?source=admins");
    }

?>
