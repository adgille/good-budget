<div id="edit_expense_form_<?php echo $expense_id ?>" class="collapse" role="dialog" style:"margin-top:20px">
    <form action = "index.php" method="post" class="form-horizontal collapse" style="margin-top:10px">
        <div class="form-group">
            <label class="control-label col-xs-6" for="new_expense_name">Expense Name</label>
            <div class="col-xs-6">
                <input type="text" name="new_expense_name" id="new_expense_name" class="form-control" value="<?php echo $name ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-6" for="new_amount">Amount</label>
            <div class="col-xs-6">
                <input type="text" name="new_amount" id="new_amount" class="form-control" value="<?php echo $amount ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-6" for="new_date">Date</label>
            <div class="col-xs-6">
                <input type="date" name="new_date" id="new_date" class="form-control" value="<?php echo $date ?>"/>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="expense_id" value="<?php echo $expense_id ?>"/>
            <div class="text-right">
                <input  class="btn btn-primary btn-sm" type="submit" name="edit_expense" value="Submit" />
            </div>
        </div>
    </form>
</div>