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
                            Welcome to Admin
                            <small>Adarsh</small>
                        </h1>
                       
                        <?php
            
                        if(isset($_GET['source'])){
                        $directTo = $_GET['source'];
                        }else{
                            $directTo = '';
                        }
                        
                        switch($directTo){
                        
                        case 'add_site': include "includes/add_site.php";
                        break;
                        
                        case 'edit_site': include "includes/edit_site.php";
                        break;        

                        default: include "includes/view_all_sites.php";

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