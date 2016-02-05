<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>shipping/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Shipping Info</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>shipping" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>shipping"><span class="glyphicon glyphicon-plane"></span> Shipping</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Shipping Info</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-6">
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
                    <label>Ship Method</label>
                    <select name="ship_method" id="ship_method" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Air</option>
                        <option value="2">Sea</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" id="company" class="form-control" value="<?php echo set_value('company');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Shipping Company</label>
                    <input type="text" name="shipping_company" id="shipping_company" class="form-control" value="<?php echo set_value('shipping_company');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tracking #</label>
                    <input type="text" name="tracking_number" id="tracking_number" class="form-control" value="<?php echo set_value('tracking_number');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Estimated Arrival Date</label>
                    <input type="text" name="estimated_arrival_date" id="estimated_arrival_date" class="form-control datep" value="<?php echo set_value('estimated_arrival_date');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea name="notes" id="notes" class="form-control"><?php echo set_value('notes');?></textarea>
                </div>
            </div>
        </div>
    </form>
</div>