<?php include "includes/header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
           
            <?php include "includes/navigation.php";?>
            

        <div id="page-wrapper">
           
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
<!--
                      <h1 class="page-header">
                            Welcome to Users and Agents Section
                            <small>Adarsh</small>
                      </h1>
-->
                       
                    
                        <?php

                            if(isset($_GET['source'])){
                                $source= $_GET['source'];
                            }else{
                                $source = '';
                            }

                            switch($source){
                                case 'assigned': include "includes/assigned.php";
                                break;
                                
                                case 'profile': include "includes/profile.php";
                                break;    
                                       
                            }

                        ?>

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php";?>
