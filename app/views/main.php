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
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="glyphicon glyphicon-blackboard fa-5x"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $rd_count;?></div>
                                <div>Products in R&D</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url();?>products">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="glyphicon glyphicon-lock fa-5x"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $production_count;?></div>
                                <div>Products in Production</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url();?>products/production">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="glyphicon glyphicon-calendar fa-5x"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $launch_count;?></div>
                                <div>Products Launching - Next 30 Days</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url();?>launchcalendar" target="_blank">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="glyphicon glyphicon-usd fa-5x"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo number_format($est_margin->est_margin, 2, '.', ',');?></div>
                                <div>Estimated Monthly Margin</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url();?>products/production">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->