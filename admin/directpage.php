<?php include "includes/header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
           
            <?php include "includes/navigation.php";?>
            

        <div id="page-wrapper">
           
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
                      <h1 class="page-header">
                            Welcome to Assets
                            <small>Adarsh</small>
                      </h1>
                       
                    
                        <?php

                            if(isset($_GET['asset'])){
                                $asset = $_GET['asset'];
                            }else{
                                $asset = '';
                            }

                            switch($asset){
                                case 'add_asset': include "includes/add_assets.php";
                                break;
                                
                                case 'feedbacks': include "includes/feedbacks.php";
                                break;    
                                    

                                default: include "includes/assets.php";    
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
