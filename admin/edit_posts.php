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

                        if(isset($_GET['p_id']))
                        {
                            $the_post_id = $_GET['p_id'];
                        }

                        $query = "SELECT * FROM posts WHERE post_id =  $the_post_id ";
                        $select_post_by_id = mysqli_query($connection, $query);
        
                            while ($row = mysqli_fetch_assoc($select_post_by_id)) {
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
                            }

                            if(isset($_POST['update_post']))
                            {
                                
                                
                                $post_author = $_POST['post_author'];
                                $post_title = $_POST['post_title'];
                                $post_category_id = $_POST['post_category'];
                                $post_status = $_POST['post_status'];
                                $post_image = $_FILES['image']['name'];
                                $post_image_temp = $_FILES['image']['tmp_name'];
                                $post_content = $_POST['post_content'];
                                $post_tag = $_POST['post_tag'];
                                
                                move_uploaded_file($post_image_temp, "../images/$post_image");

                                if(empty($post_image))
                                {
                                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                                    $select_image = mysqli_query($connection,$query);

                                    confirm_query($select_image);

                                    while($row = mysqli_fetch_array($select_image))
                                    {
                                        $post_image = $row['post_image'];
                                    }
                                }
                                 
                                // UPDATE POST QUERY
                                $query =" UPDATE posts SET  ";
                                $query .=" post_title = '{$post_title}' , ";
                                $query .=" post_category_id = '{$post_category_id}', ";    
                                $query .=" post_author = '{$post_author}', ";
                                $query .=" post_date = now() , ";
                                $query .=" post_status = '{$post_status}', ";
                                $query .=" post_tag = '{$post_tag}', ";
                                $query .=" post_content = '{$post_content}', ";
                                $query .=" post_image = '{$post_image}' ";
                                $query .=" WHERE  post_id ='{$the_post_id}' ";

                                $update_post_query = mysqli_query($connection,$query);

                                confirm_query($update_post_query);

                                echo "<p class='bg-succes'>Post Updated : <a href='../post.php?p_id={$the_post_id}'>View Post</a></p>";


                            }

                           
                    ?>




                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
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


                        <div class="form-group">
                            <label for="title">Post Author</label>
                            <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
                        </div>

                        <div class="form-group">
                        <label for="post_status">Post Status</label>
                        <select name="post_status" id="">
                            <option value="<?php $post_status ?>"><?php echo $post_status ?></option>
                            <?php
                                if($post_status == 'published')
                                {
                                    echo "<option value='draft'>Draft</option>";
                                }
                                else
                                {
                                    echo "<option value='published'>Publish</option>";
                                }

                            ?>
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <img width="100" src="../images/<?php echo $post_image; ?>" alt="no image">
                            <input type="file" name="image">
                            
                        </div>

                        <div class="form-group">
                            <label for="post_tag">Post Tags</label>
                            <input value="<?php echo $post_tag ?>" type="text" class="form-control" name="post_tag">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea  class="form-control " name="post_content" id="body" cols="30" rows="10"><?php echo $post_content ?><?php echo $post_content ?></textarea>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_post" value="UPDATE post">
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