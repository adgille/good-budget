<?php
    require_once('connect_to_db.php');

    //get the category information from the GET
    if (isset($_POST['category_id'])) {
        $category_to_delete = mysqli_real_escape_string($dbc, trim($_POST['category_id']));

        // submit the delete query to the database
        if (is_numeric($category_to_delete)) {
            $query = "DELETE FROM categories
                      WHERE id = '$category_to_delete'
                      ";
            mysqli_query($dbc, $query)
                    or die('Error deleting category. ' . mysqli_error($dbc));
            Header("Location: index.php");
        } else {
            echo '<p class="error">Please try again</p>';
        }
    } else echo 'no category specefied for deletion';
?>