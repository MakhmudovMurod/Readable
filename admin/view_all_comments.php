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
                        <th> Author </th>
                        <th> Comment </th>
                        <th> E-mail </th>
                        <th> Status </th>
                        <th> In Response to </th>
                        <th> Date </th>
                        <th> Approve </th>
                        <th> Unapprove </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    $query = "SELECT * FROM comments";
                    $select_comments = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_comments)) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];

                        echo  "<tr>";
                        echo "<td>$comment_id</td>";
                        echo "<td>$comment_author</td>";
                        echo "<td>$comment_content</td>";
                        echo "<td>$comment_email</td>";
                        echo "<td>$comment_status</td>";
                        
                        $query = "SELECT * FROM posts  WHERE post_id = $comment_post_id ";
                        
                        $select_post_id_query = mysqli_query($connection,$query);

                        while( $row = mysqli_fetch_assoc($select_post_id_query))
                        {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];

                            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }
                        echo "<td>$comment_date</td>";
                        echo "<td><a href='view_all_comments.php?approve&p_id={$comment_id}'>Approve</a></td>";
                        echo "<td><a href='view_all_comments.php?unapprove&p_id={$comment_id}'>Unapprove</a></td>";
                        //echo "<td><a href='edit_posts.php?edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "<td><a href='view_all_comments.php?delete={$comment_id}'>Delete</a></td>";
                        echo  "</tr>";
                    }





                    ?>
                </tbody>
            </table>

            <?php

            if (isset($_GET['delete'])) {

                $the_comment_id = $_GET['delete'];

                $query = "DELETE FROM comments WHERE comment_id={$the_comment_id} ";

                $delete_comment_query = mysqli_query($connection, $query);
                header("Location:view_all_comments.php"); //REFRESH PAGE
            }
            
            if(isset($_GET['approve']))
            {
                $the_comment_id = $_GET['p_id'];

                $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id} " ;

                $approve_status_query = mysqli_query($connection,$query);
                header("Location:view_all_comments.php");
            }
            
            if(isset($_GET['unapprove']))
            {
                $the_comment_id = $_GET['p_id'];

                $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_comment_id} " ;

                $approve_status_query = mysqli_query($connection,$query);
                header("Location:view_all_comments.php");
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