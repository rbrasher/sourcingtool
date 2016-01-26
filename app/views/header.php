<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Sourcing Tool</title>

<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/styles.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/jquery-ui.css" />
<script src="<?php echo base_url();?>bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/jquery-ui.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">Sourcing Tool</a>
        </div>
        <!-- Top menu items -->
        <ul class="nav navbar-right top-nav">
            <!--
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong></h5>
                                    <p class="small text-muted"><span class="glyphicon glyphicon-time"></span> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong></h5>
                                    <p class="small text-muted"><span class="glyphicon glyphicon-time"></span> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong></h5>
                                    <p class="small text-muted"><span class="glyphicon glyphicon-time"></span> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            -->
            
            <!--
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            -->
            <!--
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php //echo $this->session->userdata('email');?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    
                    <li>
                        <a href="javascript:void(0);"><span class="glyphicon glyphicon-user"></span> Profile</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><span class="glyphicon glyphicon-envelope"></span> Inbox</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                    </li>
                    
                    <li class="divider"></li>
                    
                    <li>
                        <a href="<?php //echo base_url();?>authenticate/logout"><span class="glyphicon glyphicon-off"></span> Log Out</a>
                    </li>
                </ul>
            </li>
            -->
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="<?php if($this->uri->segment(1) == ''){echo 'active';};?>">
                    <a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                </li>
                
                <li class="<?php if($this->uri->segment(1) == 'manufacturers') {echo 'active';};?>">
                    <a href="<?php echo base_url();?>manufacturers"><span class="glyphicon glyphicon-globe"></span> Manufacturers</a>
                </li>
                
                <li class="<?php if($this->uri->segment(1) == 'products') {echo 'active';};?>">
                    <a href="<?php echo base_url();?>products"><span class="glyphicon glyphicon-blackboard"></span> Products</a>
                </li>
                
                <li class="<?php if($this->uri->segment(1) == 'po') {echo 'active';};?>">
                    <a href="<?php echo base_url();?>po"><span class="glyphicon glyphicon-list-alt"></span> Purchase Orders</a>
                </li>
                
                <li class="<?php if($this->uri->segment(1) == 'tasks') {echo 'active';};?>">
                    <a href="<?php echo base_url();?>tasks"><span class="glyphicon glyphicon-ok"></span> Tasks</a>
                </li>
                
                <li class="<?php if($this->uri->segment(1) == 'report') {echo 'active';};?>">
                    <a href="<?php echo base_url();?>report"><span class="glyphicon glyphicon-open-file"></span> Report</a>
                </li>
                
                <!--
                <li class="<?php //if($this->uri->segment(1) == 'users') {echo 'active';};?>">
                    <a href="<?php //echo base_url();?>users"><span class="glyphicon glyphicon-user"></span> Users</a>
                </li>
                -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
