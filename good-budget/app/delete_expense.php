<?php
    require_once('connect_to_db.php');
    //get the category information from the POST
    if (isset($_POST['expense_id'])) {
        $expense_to_delete = mysqli_real_escape_string($dbc, trim($_POST['expense_id']));
        if (is_numeric($expense_to_delete)) {
            //unspend the money
            $query = "UPDATE categories
                      SET spent = (spent - (
                                           SELECT amount
                                           FROM expenses
                                           WHERE id = '$expense_to_delete'
                                           )
                      )
                      WHERE id= (
                                           SELECT category_id
                                           FROM expenses
                                           WHERE id = '$expense_to_delete'
                                           )
                     ";
            mysqli_query($dbc, $query)
                    or die('Error updating category. ' . mysqli_error($dbc));
            //delete the expense entry
            $query = "DELETE FROM expenses
                      WHERE id = '$expense_to_delete'
                      ";
            mysqli_query($dbc, $query)
                    or die('Error deleting expense. ' . mysqli_error($dbc));
            Header("Location: index.php");
        } else {
            echo '<p class="error">Please try again</p>';
        }
    } else echo 'no expense specefied for deletion';
?>