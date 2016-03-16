<div class="container-fluid">
    <!--display messages -->
    <?php if($this->session->flashdata('user_saved')) : ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('user_saved');?></p>
    </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('user_deleted')) : ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('user_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Users</h1>
    <a href="<?php echo base_url();?>users/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add User</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!--<th>Actions</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?php echo $user->id;?></td>
                        <td><?php echo $user->first_name . ' ' . $user->last_name;?></td>
                        <td><?php echo $user->email;?></td>
                        <!--
                        <td>
                            <a href="<?php //echo base_url(); ?>users/edit/<?php //echo $user->id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
                            <a href="<?php //echo base_url(); ?>users/delete/<?php //echo $user->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                        </td>
                        -->
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>