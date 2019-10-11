<div class="program-box panel panel-primary grid-item">
    <div type="button" data-toggle="collapse" data-target="#add_category_panel" class="panel-heading">
        <h2>Add A Category</h2>
    </div>
    <div class="panel-body collapse" id="add_category_panel">
        <form id="add_category_form" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-xs-6" for="name">Category Name</label>
                <div class="col-xs-6">
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-6" for="planned">Amount planned</label>
                <div class="col-xs-6">
                    <input type="text" name="planned" id="planned" class="form-control" />
                </div>
            </div>
            <input  class="btn btn-primary" type="submit" name="submit_category" value="Submit" />
            <input  class="btn" type="reset" name="reset" value="Clear" />
        </form>
    </div>
</div>