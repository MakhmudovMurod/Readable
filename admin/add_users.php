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

                    if (isset($_POST['add_user'])) {

                        $user_image = $_FILES['image']['name'];
                        $user_image_temp = $_FILES['image']['tmp_name'];
                        $user_firstname = $_POST['firstname'];
                        $user_lastname = $_POST['lastname'];
                        $user_role = $_POST['user_role'];
                        $username = $_POST['username'];
                        $user_email = $_POST['email'];
                        $user_password = $_POST['user_password'];
                        
                        //move_uploaded_file($user_image_temp,"./images/$user_image");

                        $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_image,user_password,randSalt) ";
                        $query .= " VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_image}','{$user_password}','sometext') ";

                        $add_user_query = mysqli_query($connection, $query);

                        if(!$add_user_query)
                        {
                            die("QUERY FAILED" .mysqli_error($connection));
                        }

                        echo "User Created: " . " " . "<a href='view_all_users.php'>View Users</a>";
                    }

                    ?>

                    <form action="" method="post" enctype="multipart/form-data">

                        
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname">
                        </div>
  
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname">
                        </div>

                        
                        <div class="form-group">
                            <select name="user_role"  id="user_role">
                                <option value="subscriber">Select options</option>
                                <option value="Admin">Admin</option>
                                <option value="Subscriber">Subscriber</option>
                                <?php
                                
                                // $query = "SELECT * FROM users ";
                                // $select_users = mysqli_query($connection, $query);
                            
                                 

                                // while ($row = mysqli_fetch_assoc($select_users)) {
                                //     $user_id = $row['user_id'];
                                //     $user_role = $row['user_role'];

                                //     echo "<option value='{$user_id}'>{$user_role}</option>";
                                // } 

                               ?>
                            </select>                     
                        </div>  
                        
                        
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="image">User Image</label>
                            <input type="file"  name="image">
                        </div>


                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class = "form-control" name="email">
                        </div>

                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        
                        
                         

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_user" value="Create User">
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