<?php
    //get the expense information from the POST
    $expense_name = mysqli_real_escape_string($dbc, trim($_POST['expense_name']));
    $expense_amount = mysqli_real_escape_string($dbc, trim($_POST['expense_amount']));
    $expense_date = mysqli_real_escape_string($dbc, trim($_POST['expense_date']));
    $category_id = mysqli_real_escape_string($dbc, trim($_POST['category_id']));
    if (empty($expense_date)) {
        $expense_date = 'NOW()';
    } else {
        $expense_date = "'" . $expense_date . "'";
    }
    
    // submit the expense to the database
    if (!empty($expense_amount) && !empty($expense_date) && !empty($category_id) && !empty($expense_name)) {
        $query = "INSERT INTO expenses (
                      category_id,
                      amount,
                      name,
                      date
                      )
                  VALUES (
                      '$category_id',
                      '$expense_amount',
                      '$expense_name',
                      $expense_date
                  )";
        mysqli_query($dbc, $query)
                or die('Error inserting expense. ' . mysqli_error($dbc));
        
    
        //upon success, update categories table
        $query = "UPDATE categories
                  SET spent = (spent + $expense_amount)
                  WHERE id='$category_id'";
        mysqli_query($dbc, $query)
                or die('Error updating category. ' . mysqli_error($dbc));
                
        //Queries successful. Redirect to clear POST data       
        Header("Location: index.php#" . $category_id);
    } else {
        echo '<p class="error">missing fields</p>';
    }
?>