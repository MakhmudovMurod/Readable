<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <!-- ADD AND EDIT CATEGORY FORM INPUTS -->
                    <div class="col-xs-6">

                        <!-- INSERT DATA TO CATEGORIES TABLE  -->
                        <?php insert_categories(); ?>


                        <!--ADD CATEGORY FORM-->
                        <form action="" method="post">
                            <label for="cat_tittle"> Add Category</label>
                            <div class="form-group">
                                <input type="text" name="cat_tittle" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <!--END OF ADD CATEGORY FORM INPUTS-->

                        <?php

                        // UPDATE AND INCLUDE QUERY
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/update_categories.php";
                        }

                        ?>

                    </div><!-- END OF ADD AND EDIT CATEGORY FORMS -->


                    <!-- CREATING CATEGORY TABLE -->
                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Category Tittle </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // FIND ALL CATEGORIES  QUERY
                                findAllCategories();
                                // DELETE CATEGORY QUERY
                                deleteCategories();
                                ?>
                            </tbody>
                        </table>
                    </div><!-- END OF CREATING CATEGORY TABLE -->


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