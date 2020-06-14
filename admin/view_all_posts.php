<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

        <?php 
        

        
        
        if(isset($_POST['checkBoxArray']))
        {
            foreach ($_POST['checkBoxArray'] as $post_value_id) {
            
                $bulk_options = $_POST['bulk_options'];

                switch ($bulk_options) {
                    case 'publish': 
                        
                        $query = "UPDATE posts SET post_status = 'published' WHERE post_id = {$post_value_id} ";
                        $publish_post_query = mysqli_query($connection,$query);

                        break;
                    case 'draft': 
                        
                        $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$post_value_id} ";
                        $draft_post_query = mysqli_query($connection,$query);
                        
                        break;

                    case 'delete': 

                        $query = "DELETE FROM posts WHERE post_id = {$post_value_id} ";
                        $delete_post_query = mysqli_query($connection,$query);
                        
                        break;

                    }
               
                 
            }
        }
        
        
        ?>


        <form action="" method="post">
            
            <!-- CREATING POSTS TABLE     -->
            <table class="table table-bordered table-hover">
            
                
                <div id="bulkOptionContainer" class="col-xs-4">
                    <select class="form-control" name="bulk_options" id="">
                        <option value="">Select Options</option>
                        <option value="publish">Publsih</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                    </select>
                </div>
                
                <div class="col-xs-4">
                    <input type="submit" name="submit" class="btn btn-succes" value="Apply">
                    <a class="btn btn-primary" href="add_posts.php">Add New</a>
                </div>
            
                <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox"></th>
                        <th> Id </th>
                        <th> Author </th>
                        <th> Tittle </th>
                        <th> Category </th>
                        <th> Status </th>
                        <th> Image </th>
                        <th> Tags </th>
                        <th> Comments </th>
                        <th> Date </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    $query = "SELECT * FROM posts";
                    $select_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_posts)) {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tag = $row['post_tag'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_content = $row['post_content'];
                        $post_date = $row['post_date'];

                        echo  "<tr>";

                        ?>
                        <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id ?>"></td>
                        
                        <?php
                        echo "<td>$post_id</td>";
                        echo "<td>$post_author</td>";
                        echo "<td>$post_title</td>";
                        // Relating Categories to posts and Displaying it                        
                        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                        
                        $select_category_id = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_category_id))
                        {
                            $cat_id = $row['cat_id'];
                            $cat_tittle = $row['cat_tittle'];

                            echo "<td>$cat_tittle</td>";

                        }
                        ////////////////////////////////////
                        
                        // echo "<td>$post_category_id</td>";
                        echo "<td>$post_status</td>";
                        echo "<td><img src='../images/$post_image' alt='no image' width='80'></td>";
                        echo "<td>$post_tag</td>";
                        echo "<td>$post_comment_count</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><a href='edit_posts.php?edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "<td><a href='view_all_posts.php?delete={$post_id}'>Delete</a></td>";
                        echo  "</tr>";
                    }





                    ?>
                </tbody>
            </table>
        </form>
            <?php

            if (isset($_GET['delete'])) {

                $the_post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id={$the_post_id} ";

                $delete_query = mysqli_query($connection, $query);
                header("Location:view_all_posts.php"); //REFRESH PAGE
            }

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