<div>
    <form id="edit_category_form_<?php echo $category_id?>" method="post" class="form-horizontal collapse" style="margin-top:10px">
        <div class="form-group">
            <label class="control-label col-xs-6" for="category_update">Category Name</label>
            <div class="col-xs-6">
                <input type="text" name="category_update" id="category_update" value="<?php echo $name?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-6" for="planned_update">Planned Expenses</label>
            <div class="col-xs-6">
                <input type="text" name="planned_update" id="planned_update" value="<?php echo $planned?>" class="form-control" />
            </div>
        </div>
        <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id?>" />
        <div class="text-right">
            <input  class="btn btn-primary" type="submit" name="edit_category" value="Submit" />
            <input  class="btn" type="reset" name="reset" value="Clear" />
        </div>
    </form>
</div>