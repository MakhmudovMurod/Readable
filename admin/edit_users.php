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
                        // EDIT USER BY CHOOSEN ID
                        if(isset($_GET['edit']))
                        {
                            $the_user_id = $_GET['u_id'];
                        
                            //DISPLAYING USER'S FOORMER INFORMATION
                            $query = "SELECT * FROM users WHERE user_id =  $the_user_id ";
                            $select_user_by_id = mysqli_query($connection, $query);
        
                            while ($row = mysqli_fetch_assoc($select_user_by_id)) {
                                
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $username = $row['username'];
                                $user_image = $row['user_image'];
                                $user_email = $row['user_email'];
                                $user_password = $row['user_password'];
                                $user_role = $row['user_role'];
                                 
                            }
                            
                            // UPDATING USER'S NEW INFORMATION QUERY
                            if(isset($_POST['edit_user']))
                            {
                                
                                
                                $user_firstname = $_POST['firstname'];
                                $user_lastname = $_POST['lastname'];
                                $username = $_POST['username'];
                                $user_image = $_FILES['image']['name'];
                                $user_image_temp = $_FILES['image']['tmp_name'];
                                $user_email = $_POST['email'];
                                $user_password = $_POST['password'];
                                $user_role = $_POST['user_role'];

                                
                                //move_uploaded_file($post_image_temp, "../images/$post_image");

                                // if(empty($post_image))
                                // {
                                //     $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                                //     $select_image = mysqli_query($connection,$query);

                                //     confirm_query($select_image);

                                //     while($row = mysqli_fetch_array($select_image))
                                //     {
                                //         $post_image = $row['post_image'];
                                //     }
                                // }
                                 
                                // UPDATE USER QUERY
                                $query =" UPDATE users SET  ";
                                $query .=" user_firstname = '{$user_firstname}' , ";
                                $query .=" user_lastname = '{$user_lastname}', ";    
                                $query .=" username = '{$username}', ";
                                $query .=" user_image = '{$user_image}' , ";
                                $query .=" user_email = '{$user_email}', ";
                                $query .=" user_password = '{$user_password}', ";
                                $query .=" user_role = '{$user_role}' ";
                                $query .=" WHERE user_id = $the_user_id ";
                                

                                $update_user_query = mysqli_query($connection,$query);

                                header("Location:view_all_users.php");
                                //confirm_query($update_post_query);

                                if(!$update_user_query)
                                {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                            }

                        }                   
                            
                    ?>

                    <form action="" method="post" enctype="multipart/form-data">

                        
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname ?>">
                        </div>
  
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname ?>">
                        </div>

                        
                        <div class="form-group">
                            <select name="user_role"  id="">
                                <option value=""><?php  echo $user_role; ?></option>
                                <?php
                                if($user_role == 'Admin')
                                {
                                    echo "<option value='Subscriber'>Subscriber</option>";
                                }
                                else if ($user_role == 'Subscriber'){
                                    echo "<option value='Admin'>Admin</option>";
                                }
                                
                               ?>
                            </select>                     
                        </div>  
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username ?>"> 
                        </div>

                        <div class="form-group">
                            <label for="image">User Image</label>
                            <input type="file"  name="image">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class = "form-control" name="email" value="<?php echo $user_email ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $user_password ?>">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
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