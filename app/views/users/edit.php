<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display validation errors -->
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>users/edit/<?php echo $user->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>users" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>users"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit User</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name;?>" placeholder="Enter First Name" />
                </div>
                
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name;?>" placeholder="Enter Last Name" />
                </div>
                
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $user->email;?>" placeholder="Enter Email Address"
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $user->password;?>" placeholder="Enter Password" readonly />
                </div>
                
            </div>
        </div>
    </form>
</div>