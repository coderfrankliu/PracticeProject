<!--
Steps to build a Search Engine:
1.  Build a form to collect users input (get data from _POST['name'])   
2.  get the data from the database
3.  redirect to a new page to show the data      
-->
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method = "post">
            <div class="input-group">
                <input name = "search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name = "submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> <!--search form -->
        <!-- /.input-group -->
    </div>

    <?php

    $query = "SELECT * FROM categories ";
    $select_categories_sidebar = mysqli_query($connection, $query);

    ?>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                        $cat_title = $row['cat_title'];

                        echo "<li><a href='#'>{$cat_title}</a></li>";                        
                    }      

                    ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
        <?php include "widget.php"; ?>

</div>