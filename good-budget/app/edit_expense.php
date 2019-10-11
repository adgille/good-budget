<?php
    //get the category information from the POST
    $item_update = mysqli_real_escape_string($dbc, trim($_POST['new_expense_name']));
    $amount_update = mysqli_real_escape_string($dbc, trim($_POST['new_amount']));
    $date_update = mysqli_real_escape_string($dbc, trim($_POST['new_date']));
    $item_id = mysqli_real_escape_string($dbc, trim($_POST['expense_id']));
    if (is_numeric($amount_update) && !empty($date_update) && !empty($item_update)) {
        
        
        //update category total first
            $query = "UPDATE categories
                      SET spent = (spent - ((
                                           SELECT amount
                                           FROM expenses
                                           WHERE id = '$item_id'
                                           )
                                           - $amount_update
                                           )
                      )
                      WHERE id= (
                                           SELECT category_id
                                           FROM expenses
                                           WHERE id = '$item_id'
                                           )
                     ";
        mysqli_query($dbc, $query)
                or die('Error updating expense. ' . mysqli_error($dbc));
        
        //update expense entry
        $query = "UPDATE expenses
                  SET
                      amount = '$amount_update',
                      name = '$item_update',
                      date = '$date_update'
                  WHERE
                      id = '$item_id'
                  ";
        mysqli_query($dbc, $query)
                or die('Error updating expense. ' . mysqli_error($dbc));
        Header("Location: index.php");
    } else {
        echo '<p class="error">Please try again</p>';
    }
?>