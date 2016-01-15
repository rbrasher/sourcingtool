<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/login.css" />
</head>
<body>
<div class="container">
    <?php $attributes = array('class' => 'form-signin');?>
    
    <?php echo form_open('authenticate/login', $attributes);?>
    <h2 class="form-signin-heading">Login</h2>
    
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>'); ?>
    
    <?php if($this->session->flashdata('fail_login')) : ?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('fail_login');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('access_denied')) : ?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('access_denied');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('logged_out')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('logged_out');?></p>
    <?php endif;?>
    
    <?php
        $data = array(
            'id' => 'email',
            'name' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Email address'
        );
        
        echo form_input($data);
        
        $data = array(
            'id' => 'password',
            'name' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password'
        );
        
        echo form_password($data);
        
        $data = array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'content' => 'Login',
            'type' => 'submit'
        );
        
        echo form_button($data);
        
        echo form_close();
    ?>
</div>
</body>
</html>