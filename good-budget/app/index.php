<!DOCTYPE html>
<!-- @author Adam Gille -->
<html lang="en">
    <?php
        session_start();
        require_once('authorize.php');
        require_once('connect_to_db.php');
        //check for user activity
        if (isset($_POST['submit_expense'])) {
            require_once('submit_expense.php');
        } else if (isset($_POST['submit_category'])) {
             require_once('submit_category.php');
        } else if (isset($_POST['edit_category'])) {
            require_once('edit_category.php');
        } else if (isset($_POST['delete_expense'])) {
            require_once('delete_expense.php');
        } else if (isset($_POST['edit_expense'])) {
            require_once('edit_expense.php');
        }
        //display page components
        require_once('header.php');
        require_once('navmenu.php');
        require_once('dashboard.php');
        require_once('main.php');
        require_once('footer.php');
    ?>
</html>