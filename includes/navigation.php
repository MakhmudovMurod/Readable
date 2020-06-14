<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> Readable</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php
                $query = "SELECT * FROM categories";
                $select_category_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_category_query)) {
                    $cat_tittle = $row['cat_tittle'];

                    echo "<li><a href='#'>{$cat_tittle}</a></li>";
                }

                ?>

                <li>
                    <a href="admin/index.php">Admin</a>
                </li>
                
                <?php  
                
                if(isset($_SESSION['username']))
                {
                    if(isset($_GET['p_id']))
                    {
                        
                        $the_post_id = $_GET['p_id'];
                        echo"<li><a href='../admin/edit_posts.php?edit_post&p_id={$the_post_id}'>Edit</a><li>";
                    }
                }
                
                ?>



            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>