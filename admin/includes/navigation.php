<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            
                <li><a href="../index.php">Home</a></li>
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['firstname'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="users.php?source=profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            
           <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_one"><i class="fa fa-fw fa-arrows-v"></i> Sites <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_one" class="collapse">
                            <li>
                                <a href="sites.php?source=view_all_sites">View All Sites</a>
                            </li>
                            <li>
                                <a href="sites.php?source=add_site">Add Site</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="directpage.php"><i class="fa fa-fw fa-edit"></i> View Assets </a>
                    </li>
                    
                    
                    <li>
                        <a href="feedbacks.php"><i class="fa fa-fw fa-edit"></i> Feedbacks</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_three"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_three" class="collapse">
                            <li>
                                <a href="users.php?source=users">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=agents">View All Agents</a>
                            </li>
                            <li>
                                <a href="users.php?source=admins">View All Admins</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="users.php?source=booked_tickets"><i class="fa fa-fw fa-edit"></i>Booked Tickets</a>
                    </li>
                    
                    <li>
                        <a href="users.php?source=profile"><i class="fa fa-fw fa-file"></i> Profile </a>
                    </li>
                    
                </ul>
            </div>
            
</nav>