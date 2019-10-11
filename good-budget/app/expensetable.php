<?php
    $expenses_query = "SELECT id, category_id, date, name, amount
              FROM expenses
              WHERE category_id = '$category_id'";
    $expenses_result = mysqli_query($dbc, $expenses_query)
            or die('Error querying expenses. ' . mysqli_error($dbc));
    if ($expenses_result->num_rows > 0) {
        ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>item</th>
                        <th>cost</th>
                        <th>date</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($expenses_row = $expenses_result->fetch_assoc()) {
                    $category_id = $expenses_row["category_id"];
                    $date = $expenses_row["date"];
                    $amount = $expenses_row["amount"];
                    $name = $expenses_row["name"];
                    $expense_id = $expenses_row["id"];
                    ?>
                    <tr>
                        <td><?php echo $name ?></td>
                        <td><?php echo $amount ?></td>
                        <td><?php echo $date ?></td>
                        <td>
                            <form class="inline-form" method="post" action="index.php">
                                <input type="hidden" name="expense_id" value="<?php echo $expense_id ?>"/>
                                <button data-toggle="collapse" data-target="#edit_expense_form_<?php echo $expense_id ?>" type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form class="inline-form" method="post" action="index.php">
                                <input type="hidden" name="expense_id" value="<?php echo $expense_id ?>"/>
                                <button name="delete_expense" type="submit" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <?php include('edit_expense_form.php')?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo '<p><small>No expenses recorded for this category</small></p>';
    }
?>