<?php
    //get the category information from the POST
    $planned_update = mysqli_real_escape_string($dbc, trim($_POST['planned_update']));
    $category_update = mysqli_real_escape_string($dbc, trim($_POST['category_update']));
    $category_id = mysqli_real_escape_string($dbc, trim($_POST['category_id']));
    // submit the expense to the database
    if (is_numeric($planned_update) && is_numeric($category_id) && !empty($category_update)) {
        $query = "UPDATE categories
                  SET
                      planned = '$planned_update',
                      name = '$category_update'
                  WHERE
                      id = '$category_id'
                  ";
        mysqli_query($dbc, $query)
                or die('Error inserting category. ' . mysqli_error($dbc));
        Header("Location: index.php");
    } else {
        echo '<p class="error">Please try again</p>';
    }
?>