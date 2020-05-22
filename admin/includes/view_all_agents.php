<h1 class="page-header">
    Welcome to Agents Section
</h1>
<div>
    <a class="btn btn-success btn-md" href="users.php?source=add_agent">Add new Agent</a>
</div>  

       <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Image</th>
                <th>Active</th>
                <th>Status</th>
                <th>Date</th>
                <th>Allow</th>
                <th>Block</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            
            $query = "SELECT * FROM agents ORDER BY agent_id DESC";
            $select_agents = mysqli_query($connection, $query);
            
            confirm($select_agents);
            
            while($row = mysqli_fetch_assoc($select_agents)){
                $agent_id = $row['agent_id'];
                $agent_firstname = $row['agent_firstname'];
                $agent_lastname = $row['agent_lastname'];
                $agent_email = $row['agent_email'];
                $agent_mobile = $row['agent_mobile'];
                $agent_image = $row['agent_image'];
                $agent_active = $row['agent_active'];
                $agent_status = $row['agent_status'];
                $agent_date = $row['agent_date'];
                
                echo "<tr>";
                
                echo "<td>$agent_id</td>";
                echo "<td>$agent_firstname $agent_lastname</td>";
                echo "<td>$agent_email</td>";
                echo "<td>$agent_mobile</td>";
                
                echo "<td><img src='../images/$agent_image' width='60' height='50'/></td>";
                
                echo "<td>$agent_active</td>";
                echo "<td>$agent_status</td>";
                echo "<td>$agent_date</td>";
                echo "<td><a class='btn btn-success btn-sm' href='users.php?source=agents&allow_id=$agent_id'>Allow</a></td>";
                
                echo "<td><a class='btn btn-warning btn-sm' href='users.php?source=agents&deny_id=$agent_id'>Block</a></td>";
                
                echo "<td><a class='btn btn-danger btn-sm' href='users.php?source=agents&delete_id=$agent_id'>Delete</a></td>";
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
        
</table>


<?php

    if(isset($_GET['allow_id'])){
        
        $the_agent_id = $_GET['allow_id'];
        $query = "UPDATE agents SET agent_active = 'yes' WHERE agent_id = $the_agent_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=agents");
    }

    if(isset($_GET['deny_id'])){
        
        $the_agent_id = $_GET['deny_id'];
        $query = "UPDATE agents SET agent_active = 'no' WHERE agent_id = $the_agent_id";
        $update_status = mysqli_query($connection, $query);
        confirm($update_status);
        header("Location: users.php?source=agents");
    }

    if(isset($_GET['delete_id'])){
        
        $the_agent_id = $_GET['delete_id'];
        $query = "DELETE FROM agents WHERE agent_id = $the_agent_id";
        $delete_agent = mysqli_query($connection, $query);
        confirm($delete_agent);
        header("Location: users.php?source=agents");
    }

?>