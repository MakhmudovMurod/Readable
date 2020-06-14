<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <!-- form send item to search.php -->
            <div class="input-group">
                <!-- From here search form take input and give POST request to the search.php -->
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!--- form-->
        <!-- /.input-group -->
    </div>


     <!-- Blog  LOGIN  -->
     <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="username" name="username" class="form-control" placeholder="Your username">
            </div>
            
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Your passowrd">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
            </div>
        </form>
        <!--- form-->
        <!-- /.input-group -->
    </div>





    <!-- Blog Categories Well -->
    <div class="well">

        <?php
        $query = "SELECT * FROM categories";
        $select_category_sidebar = mysqli_query($connection, $query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php

                    while ($row = mysqli_fetch_assoc($select_category_sidebar)) {
                        $cat_tittle = $row['cat_tittle'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_tittle}</a></li>";
                    }
                    ?>
                </ul>
            </div>

            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>






    <!-- Side Widget Well -->
    <?php include "includes/widget.php";  ?>
</div>