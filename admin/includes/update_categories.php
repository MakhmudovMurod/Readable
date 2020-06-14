<!-- EDIT CATEGORY FORM -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_tittle"> Edit Category</label>


        <?php

        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";

            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_tittle = $row['cat_tittle'];
        ?>

                <input value=" <?php if (isset($cat_tittle)) {
                                    echo $cat_tittle;
                                } ?> " type="text" name="cat_tittle" class="form-control">

        <?php } // end of while 
        } // end of if 
        ?>

        <?php
        //UPDATE CATEGORY   QUERY
        if (isset($_POST['update_category'])) {
            $the_cat_tittle = $_POST['cat_tittle']; // new updated tittle entered by user

            $query = "UPDATE  categories SET cat_tittle = '{$the_cat_tittle}' WHERE cat_id ={$cat_id}";
            $update_query = mysqli_query($connection, $query);
            header("Location:admin_categories.php");
        }


        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>
<!-- END OF EDIT CATEGORY FORM -->