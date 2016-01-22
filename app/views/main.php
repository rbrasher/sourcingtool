<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <span class="glyphicon glyphicon-dashboard"></span> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-time"></span> Tasks Panel</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?php if($tasks) : ?>
                            <?php foreach($tasks as $task) : ?>
                            <a href="<?php echo base_url();?>tasks/edit/<?php echo $task->id;?>" class="list-group-item">
                                <span class="label label-success pull-right" style="font-size: 14px; font-weight: normal;"><span class="glyphicon glyphicon-user"></span> <?php echo $task->task_owner;?><?php //echo $task->task_due_date;?></span>
                                <span class="glyphicon glyphicon-ok"></span> <?php echo $task->task_desc;?>
                                
                            </a>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo base_url();?>tasks">View All Activity <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->