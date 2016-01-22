<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('task_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('task_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('task_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('task_deleted');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('task_completed')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('task_completed');?></p>
    </div>
    <?php endif;?>
    
    
    <h1 class="page-header">Tasks</h1>
    <a href="<?php echo base_url();?>tasks/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Task</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($tasks) : ?>
                <?php foreach($tasks as $task) : ?>
                <tr>
                    <td><?php echo $task->id;?></td>
                    <td><?php echo $task->task_desc;?></td>
                    <td><?php echo $task->task_owner;?></td>
                    <td><?php echo $task->task_due_date;?></td>
                    <td><?php echo $task->task_status;?></td>
                    <td>
                        <a title="Complete" class="btn btn-success" href="<?php echo base_url();?>tasks/complete/<?php echo $task->id;?>"><span class="glyphicon glyphicon-ok"></span><!-- Complete--></a>
                        <a title="Edit" class="btn btn-primary" href="<?php echo base_url();?>tasks/edit/<?php echo $task->id;?>"><span class="glyphicon glyphicon-pencil"></span><!-- Edit--></a>
                        <a title="Delete" class="btn btn-danger" href="<?php echo base_url();?>tasks/delete/<?php echo $task->id;?>"><span class="glyphicon glyphicon-trash"></span><!-- Delete--></a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="4">No tasks have been entered.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    
</div>
