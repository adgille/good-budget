<div class="expense_form">
    <form id="add_expense_form_<?php echo $category_id?>" method="post" class="form-horizontal collapse" style="margin-top:10px">
        <div class="form-group">
            <label class="control-label col-xs-6" for="expense_name">Expense Name</label>
            <div class="col-xs-6">
                <input type="text" name="expense_name" id="expense_name" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-6" for="expense_date">Date Purchased</label>
            <div class="col-xs-6">
                <input type="date" name="expense_date" id="expense_date" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-6" for="expense_amount">Amount</label>
            <div class="col-xs-6">
                <input type="text" name="expense_amount" id="expense_amount" class="form-control" />
            </div>
        </div>
        <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id?>" />
        <div class="text-right">
        <input  class="btn btn-primary" type="submit" name="submit_expense" value="Submit" />
        <input  class="btn" type="reset" name="reset" value="Clear" />
        </div>
    </form>
</div>