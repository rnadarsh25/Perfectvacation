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
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        
                        $query = "SELECT * FROM tour_sites";
                        $select_all_sites = mysqli_query($connection, $query);
                        $sites_count = mysqli_num_rows($select_all_sites);
                        
                    ?>
                    
                  <div class='huge'><?php echo $sites_count;?></div>
                        <div>Sites</div>
                    </div>
                </div>
            </div>
            <a href="sites.php">
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
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                     <?php
                        
                        $query = "SELECT * FROM booked_tickets WHERE book_cancel='booked'";
                        $select_all_tickets = mysqli_query($connection, $query);
                        $tickets_count = mysqli_num_rows($select_all_tickets);
                        
                    ?>
                    
                     <div class='huge'><?php echo $tickets_count;?></div>
                      <div>Booked Tickets</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=booked_tickets">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        
                        $query = "SELECT * FROM users WHERE user_status='allowed'";
                        $select_all_users = mysqli_query($connection, $query);
                        $users_count = mysqli_num_rows($select_all_users);
                        
                    ?>
                    
                    <div class='huge'><?php echo $users_count;?></div>
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
                        
                        $query = "SELECT * FROM agents WHERE agent_active='yes'";
                        $select_all_agents = mysqli_query($connection, $query);
                        $agents_count = mysqli_num_rows($select_all_agents);
                        
                    ?>
                    
                    <div class='huge'><?php echo $agents_count;?></div>
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
                        
                        $query = "SELECT * FROM admins";
                        $select_all_admins = mysqli_query($connection, $query);
                        $admins_count = mysqli_num_rows($select_all_admins);
                        
                    ?>
                    
                    <div class='huge'><?php echo $admins_count;?></div>
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
                        
                        $query = "SELECT * FROM feedbacks";
                        $select_all_feedbacks = mysqli_query($connection, $query);
                        $feedbacks_count = mysqli_num_rows($select_all_feedbacks);
                        
                    ?>
                        <div class='huge'><?php echo $feedbacks_count;?></div>
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
                
   
                            
<div class="row">
                  
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
        
            <?php
            
 $element_text = ['Total Sites','Booked Tickets','Users','Agents','Admins','Feedbacks'];
 $element_count = [$sites_count,$tickets_count,$users_count,$agents_count,$admins_count,$feedbacks_count];
            
                for($i=0;$i<6;$i++){
                    
                    echo "['{$element_text[$i]}'" .","."$element_count[$i]],";
                    
                }
            
            ?>
            
//          ['Posts', 1000],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
             
        <div id="columnchart_material" style="width: 'auto'; height: 380px;"></div>               
              
</div>                             
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php";?>