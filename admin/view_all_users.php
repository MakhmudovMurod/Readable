<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">




            <!-- CREATING POSTS TABLE     -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Username </th>
                        <th> Firstname </th>
                        <th> Lastname </th>
                        <th> E-mail </th>
                        <th> Role </th>
                        <th> Date </th>
                        <th> Admin </th>
                        <th> Subscriber </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    $query = "SELECT * FROM users";
                    $select_users = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_users)) {
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $user_password = $row['user_password'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                        $randSalt = $row['randSalt'];
                        

                        echo  "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>$username</td>";
                        echo "<td>$user_firstname</td>";
                        echo "<td>$user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_role</td>";
                        echo "<td>some date</td>";
                        echo "<td><a href='view_all_users.php?change_to_admin={$user_id}'>Admin</a></td>";
                        echo "<td><a href='view_all_users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                        echo "<td><a href='edit_users.php?edit&u_id={$user_id}'>Edit</a></td>";
                        echo "<td><a href='view_all_users.php?delete={$user_id}'>Delete</a></td>";
                        echo  "</tr>";
                    }





                    ?>
                </tbody>
            </table>

            <?php

            // DELETE USER QUERY
            if (isset($_GET['delete'])) {

                $the_user_id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id ={$the_user_id} ";

                $delete_user_query = mysqli_query($connection, $query);
                header("Location:view_all_users.php"); //REFRESH PAGE
            }



            //CHANGE TO ADMIN QUERY
            if(isset($_GET['change_to_admin']))
            {
                $the_user_id = $_GET['change_to_admin'];

                $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id} " ;

                $approve_status_query = mysqli_query($connection,$query);
                header("Location:view_all_users.php");
            }

            //CHANGE TO SUBSCRIBER QUERY
            if(isset($_GET['change_to_sub']))
            {
                $the_user_id = $_GET['change_to_sub'];

                $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id} " ;

                $approve_status_query = mysqli_query($connection,$query);
                header("Location:view_all_users.php");
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