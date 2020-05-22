<?php include "includes/header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        
            
            <?php include "includes/navigation.php";?>
            
            <!-- /.navbar-collapse -->
            
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <h1 class="page-header">
                            Welcome !
                            <small> Admin Panel</small>
                        </h1>
                        
                    </div>
                </div>
                
    <div class="row">
    
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        if(isset($_SESSION['user_id'])){
                            $the_agent_id = $_SESSION['user_id'];
                        }
                        $query = "SELECT * FROM booked_tickets WHERE ticket_agent_id = $the_agent_id and booked_status='open'";
                        $select_all_open_ticket = mysqli_query($connection, $query);
                        $open_tickets_count = mysqli_num_rows($select_all_open_ticket);
                        
                    ?>
                    
                  <div class='huge'><?php echo $open_tickets_count;?></div>
                        <div>Open Tickets</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=assigned">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                     <?php
                        
                        $query = "SELECT * FROM booked_tickets WHERE ticket_agent_id = $the_agent_id and booked_status='closed'";
                        $select_all_closed_ticket = mysqli_query($connection, $query);
                        $closed_tickets_count = mysqli_num_rows($select_all_closed_ticket);
                        
                    ?>
                    
                     <div class='huge'><?php echo $closed_tickets_count;?></div>
                      <div>Closed Tickets</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=assigned">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
<!--    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        
//                        $query = "SELECT * FROM users WHERE user_status='allowed'";
//                        $select_all_users = mysqli_query($connection, $query);
//                        $users_count = mysqli_num_rows($select_all_users);
//                        
                    ?>
                    
                    <div class='huge'><?php //echo $users_count;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=users">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        
//                        $query = "SELECT * FROM agents WHERE agent_active='yes'";
//                        $select_all_agents = mysqli_query($connection, $query);
//                        $agents_count = mysqli_num_rows($select_all_agents);
//                        
                    ?>
                    
                    <div class='huge'><?php //echo $agents_count;?></div>
                        <div> Agents</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=agents">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
<div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
//                        
//                        $query = "SELECT * FROM admins";
//                        $select_all_admins = mysqli_query($connection, $query);
//                        $admins_count = mysqli_num_rows($select_all_admins);
//                        
                    ?>
                    
                    <div class='huge'><?php //echo $admins_count;?></div>
                        <div> Admins</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=admins">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                       <?php
                        
//                        $query = "SELECT * FROM feedbacks";
//                        $select_all_feedbacks = mysqli_query($connection, $query);
//                        $feedbacks_count = mysqli_num_rows($select_all_feedbacks);
//                        
                    ?>
                        <div class='huge'><?php //echo $feedbacks_count;?></div>
                         <div>Feedbacks</div>
                    </div>
                </div>
            </div>
            <a href="feedbacks.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>  
                            
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php";?>