<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>
                    <?php

                    if (isset($_POST['create_post'])) {

                        $post_title = $_POST['title'];
                        $post_author = $_POST['author'];
                        $post_category_id = $_POST['post_category_id'];
                        $post_status = $_POST['post_status'];
                        $post_image = $_FILES['image']['name'];
                        $post_image_temp = $_FILES['image']['tmp_name'];
                        $post_tag = $_POST['post_tag'];
                        $post_content = $_POST['post_content'];
                        $post_date = date('d-m-y');
                        //$post_comment_count = 4;

                        //FUNCTION TO MOVE UPLOADED IMAGES
                        move_uploaded_file($post_image_temp, "../images/$post_image");

                        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tag,post_status) VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}',
                        '{$post_tag}','{$post_status}') ";

                        $add_post_query = mysqli_query($connection, $query);

                        if(!$add_post_query)
                        {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                    }

                    ?>



                  
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
  
                        <div class="form-group">
                            <select name="post_category"  id="post_category">
                                <?php
                                
                                $query = "SELECT * FROM categories ";
                                $select_categories = mysqli_query($connection, $query);
                            
                                 

                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_tittle = $row['cat_tittle'];

                                    echo "<option value='{$cat_id}'>{$cat_tittle}</option>";
                                } 

                               ?>
                            </select>                     
                        </div>  




                        <!-- <div class="form-group">
                            <label for="post_category">Post Category Id</label>
                            <input type="text" class="form-control" name="post_category_id">
                        </div> -->


                        <div class="form-group">
                            <label for="title">Post Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        
                         
                        <div class="form-group">
                        <label for="post_status">Post Status</label>
                        <select name="post_status" id="">
                            <option value="">Select Status</option>
                            <option value="">published</option>
                            <option value="">draft</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="post_tag">Post Tags</label>
                            <input type="text" class="form-control" name="post_tag">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-control " name="post_content" id="body" cols="30" rows="10">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                        </div>
                    </form>

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