<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>legal/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Legal</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>legal" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>legal"><span class="glyphicon glyphicon-briefcase"></span> Legal</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Legal</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($products as $product) : ?>
                        <option value="<?php echo $product->id;?>"><?php echo $product->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Box PC</label>
                    <input type="text" name="box_pc" id="box_pc" class="form-control" value="<?php echo set_value('box_pc');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>LLC</label>
                    <input type="text" name="llc" id="llc" class="form-control" value="<?php echo set_value('llc');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Credit Card</label>
                    <input type="text" name="credit_card" id="credit_card" class="form-control" value="<?php echo set_value('credit_card');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Bank Account</label>
                    <input type="text" name="bank_account" id="bank_account" class="form-control" value="<?php echo set_value('bank_account');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Amazon Account</label>
                    <input type="text" name="amazon_account" id="amazon_account" class="form-control" value="<?php echo set_value('amazon_account');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo set_value('phone_number');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Special Conditions</label>
                    <textarea name="special_conditions" id="special_conditions" class="form-control"><?php echo set_value('special_conditions');?></textarea>
                </div>
            </div>
        </div>

    </form>
</div>
