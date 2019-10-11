<div class="program-box panel panel-info" id="<?php echo $category_id?>">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            <h2><?php echo $name; ?></h2>
        </div>
        <div class="pull-right">
            <button  type="button" data-toggle="collapse" data-target="#add_expense_form_<?php echo $category_id ?>" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Add Expense
            </button>
            <form class="inline-form" method="post" action="delete_category.php">
                <input type="hidden" name="category_id" value="<?php echo $category_id ?>"/>
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            </form>
            <button  type="button" data-toggle="collapse" data-target="#edit_category_form_<?php echo $category_id ?>" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
        </div>
    </div>
    <div class="panel-body">
        <?php include('addexpenseform.php');?>
        <?php include('edit_category_form.php');?>
        Planned: <span class="planned"><?php echo $planned;?></span>
        Spent: <span class="spent"><?php echo $spent;?></span>
        Remaining: <span class="remaining" style="color:<?php echo $budget_color;?>"><?php echo $remaining;?></span>
        <div class="fullbudgetbar" style = "border-color:<?php echo $budget_color;?>">
            <div style="width:<?php echo $percent_remaining;?>%"class="remainingbudgetbar"></div>
        </div>
        <?php include('expensetable.php')?>
    </div>
</div>