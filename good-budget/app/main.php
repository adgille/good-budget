<?php
    //get all category values
    $query = "SELECT id, name, planned, spent, (planned-spent) as remaining 
              FROM categories;";
    $result = mysqli_query($dbc, $query)
            or die('Error querying categories. ' . mysqli_error($dbc));
    if ($result->num_rows > 0){
        echo '<div class="main">';
        //loop through category information
        while ($row = $result->fetch_assoc()){
            $remaining = $row["remaining"];
            $planned = $row["planned"];
            $spent = $row["spent"];
            $name = $row["name"];
            $category_id = $row["id"];
            if ($planned != 0) {
                $percent_remaining = max($remaining/$planned,0) * 100;
            } else {
                $percent_remaining = 0;
            }
            //apply styles based on category data
            if ($percent_remaining > 100) {
                $percent_remaining = 100;
                $budget_color = 'black';
            } else if ($percent_remaining > 50) {
                $budget_color = 'black';
            } else if ($planned>=$spent) {
                $budget_color = 'orange';
            } else {
                $budget_color = 'red';
            }
            //display category panel
            include('categorypanel.php');
        }
    }
    //display Add Category panel
    require_once('addcategorypanel.php');
    echo '</div>';
?>
