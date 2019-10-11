<?php
    //get the category information from the POST
    $planned = mysqli_real_escape_string($dbc, trim($_POST['planned']));
    $spent = 0;
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    // submit the expense to the database
    if (is_numeric($planned) && is_numeric($spent) && !empty($name)) {
        $query = "INSERT INTO categories (
                    planned,
                    spent,
                    name
                )
                    VALUES (
                    '$planned',
                    '$spent',
                    '$name'
                )";
        mysqli_query($dbc, $query)
                or die('Error inserting category. ' . mysqli_error($dbc));
        Header("Location: index.php");
    } else {
        echo '<p class="error">Please try again</p>';
    }
    ?>