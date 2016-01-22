<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>tasks/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Task</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>tasks" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>products"><span class="glyphicon glyphicon-ok"></span> Tasks</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Task</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="task_desc" id="task_desc" class="form-control" value="<?php echo set_value('description');?>" placeholder="Enter description of task" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Owner</label>
                    <select name="task_owner" id="task_owner" class="form-control">
                        <option value="">Select an Owner</option>
                        <option value="Quinn@innitech.com">Quinn</option>
                        <option value="Fredy@innitech.com">Fredy</option>
                        <option value="Bobby@innitech.com">Bobby</option>
                        <option value="ron@innitech.com">Ron</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Due Date</label>
                    <input type="text" name="task_due_date" id="task_due_date" class="form-control datep" value="<?php echo set_value('task_due_date');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Status</label>
                    <select name="task_status" id="task_status" class="form-control">
                        <option value="todo">Todo</option>
                        <option value="done">Done</option>
                    </select>
                </div>
            </div>
        </div>
        
    </form>
</div>