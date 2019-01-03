<?php

function confirmQuery($result){
    
    global $connection;
    if(!$result){
        die("QUERY FAILED" .mysqli_error($connection));
    }
    
}

function insertCategories(){

    //Actually works even without it, but it is  advised to add it.
    global $connection;

    if(isset($_POST['submit'])){
        //       echo "<h1>it is working</h1>";  easy way to check if it working
        $cat_title = $_POST['cat_title'];

        if($cat_title =="" || empty($cat_title)){

            echo "This field should not be empty";

        } else{

            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }

        }

    }
}

function findAllCategories(){

    global $connection;

    $query = "SELECT * FROM categories ";
    $select_categories = mysqli_query($connection, $query);


    while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        // put html into the php loop to make table
        echo "<tr>";
        echo "<td>{$cat_id}</td>";     
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'> DELETE </a></td>";  
        echo "<td><a href='categories.php?update={$cat_id}'> UPDATE </a></td>";  
        echo "</tr>";

    }      

}


function deleteCategories(){

    global $connection;
    if(isset($_GET['delete'])){

        $del_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        // this is for the refresh(redirect back to categories.php), otherwise we should refresh the page to get the result after delete
        header("Location: categories.php");
    }                         

}


?>