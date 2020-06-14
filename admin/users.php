<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <?php

                     
                    // setting default value for $source                    
                    // $source = 'admin_posts.php';


                    // if (array_key_exists('source',$_GET)) 
                    // {
                    //     $source = $_GET['source'];
                    // } else {
                    //     $source = "";
                    // }
                    
                    // // Chech page

                    // switch ($source) {
                    //     case 'add_posts':
                    //         include 'add_posts.php';
                    //         break;
                    //     case 'edit_posts':
                    //         include 'edit_posts.php';
                    //         break;
                    //     case 'view_all_posts':
                    //         include 'view_all_posts.php';
                    //         break;
                    //     default:
                    //         include 'view_all_posts.php';
                    // }

                    ?>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>