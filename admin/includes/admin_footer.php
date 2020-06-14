<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin 
                    <?php  echo $_SESSION['username']; ?>
                    <small>Author</small>
                </h1>
            </div>
        </div>
        <!-- End of Page Heading -->

        <!-- DYNAMIC WIDGETS  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <?php 
                                $query = "SELECT * FROM posts";
                                $select_all_post = mysqli_query($connection,$query);
                                $post_count = mysqli_num_rows($select_all_post);

                                echo "<div class='huge'>{$post_count}</div>";
                            
                            ?>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="view_all_posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <?php 
                                $query = "SELECT * FROM comments";
                                $select_all_comment_query = mysqli_query($connection,$query);
                                $comment_count = mysqli_num_rows($select_all_comment_query);

                                echo "<div class='huge'>{$comment_count}</div>";
                            
                            ?>
                              <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="view_all_comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <?php 
                                $query = "SELECT * FROM users";
                                $select_all_user_query = mysqli_query($connection,$query);
                                $user_count = mysqli_num_rows($select_all_user_query);

                                echo "<div class='huge'>{$user_count}</div>";
                            
                            ?>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="view_all_users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <?php 
                                $query = "SELECT * FROM categories";
                                $select_all_category_query = mysqli_query($connection,$query);
                                $category_count = mysqli_num_rows($select_all_category_query);

                                echo "<div class='huge'>{$category_count}</div>";
                            
                            ?>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="admin_categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END OF  WIDGETS -->
        <?php  
        
        $query = "SELECT * FROM posts WHERE post_status = 'published' ";
        $select_all_published_posts = mysqli_query($connection,$query);
        $post_published_count = mysqli_num_rows($select_all_published_posts);

        $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
        $select_all_draft_posts = mysqli_query($connection,$query);
        $post_draft_count = mysqli_num_rows($select_all_draft_posts);

        $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
        $unapproved_comments_query = mysqli_query($connection,$query);
        $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);

        $query = "SELECT * FROM users WHERE user_role = 'Subscriber' ";
        $select_all_subscribers = mysqli_query($connection,$query);
        $subscriber_count = mysqli_num_rows($select_all_subscribers);


        ?>
        <!-- GOOGLE CHART -->
        <div class="row">
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Data ', 'Count'],
                   <?php  
                  
                    $element_text = ['All Posts','Active Posts','Draft Posts','Comments','Pending Comments','Users','Subscribers','Categories'];
                    $element_count = [$post_count,$post_published_count,$post_draft_count,$comment_count, $unapproved_comment_count,$user_count,$subscriber_count,$category_count];

                    for($i=0; $i<8; $i++)
                    {
                        echo "['{$element_text[$i]}' " .  "," .  "{$element_count[$i]}], ";
                    }
                    ?>
                    
                ]);
                
                var options = {
                  chart: {
                    title: '',
                    subtitle: '',
                  }
                };
            
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            
                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>

            <div id="columnchart_material" style="width: auto; height: 500px;"></div>
        </div>
        <!-- END OF GOOGLE CHART -->


    </div>
    <!-- /.container-fluid -->

</div>