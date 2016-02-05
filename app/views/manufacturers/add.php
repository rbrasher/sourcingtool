<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo base_url();?>manufacturers/add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Manufacturer</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>manufacturers" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>manufacturers"><span class="glyphicon glyphicon-globe"></span> Manufacturers</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Manufacturer</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select a product</option>
                        <?php foreach($products as $product) : ?>
                        <option value="<?php echo $product->id;?>"><?php echo $product->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="Enter Manufacturer Name" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="email_address" id="email_address" class="form-control" value="<?php echo set_value('email_address');?>" placeholder="Enter Email Address" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Contact Info</label>
                    <input type="text" name="contact_info" id="contact_info" class="form-control" value="<?php echo set_value('contact_info');?>" placeholder="Enter Contact Info" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Owner</label>
                    <input type="text" name="owner" id="owner" class="form-control" value="<?php echo set_value('owner');?>" placeholder="Enter Owner" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="form-control" value="<?php echo set_value('total_price');?>" placeholder="Enter Total Price" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Price Per Item</label>
                    <input type="text" name="price_per_item" id="price_per_item" class="form-control" value="<?php echo set_value('price_per_item');?>" placeholder="Enter price per item" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Qty Per Package</label>
                    <input type="text" name="qty_per_package" id="qty_per_package" class="form-control" value="<?php echo set_value('qty_per_package');?>" placeholder="Enter Quantity Per Package" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>MOQ</label>
                    <input type="text" name="moq" id="moq" class="form-control" value="<?php echo set_value('moq');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Lead Time in Days</label>
                    <input type="text" name="lead_time_in_days" id="lead_time_in_days" class="form-control" value="<?php echo set_value('lead_time_in_days');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Samples Status</label>
                    <select name="samples_status" id="samples_status" class="form-control">
                        <option value="">Select a status</option>
                        <?php foreach($samples_status as $status) : ?>
                        <option value="<?php echo $status->id;?>"><?php echo $status->samples_status;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Shipping Terms</label>
                    <select name="shipping_terms" id="shipping_terms" class="form-control">
                        <option value="">Select Shipping Terms</option>
                        <?php foreach($shipping_terms as $t) : ?>
                        <option value="<?php echo $t->id;?>"><?php echo $t->shipping_terms;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Brochure</label><span style="margin-left: 10px; font-style:italic;">(Allowed Types: jpg, png, ai, pdf, xls, doc)</span>
                    <input type="file" name="userfile" size="20" />
                </div>
            </div>
            
        </div>

    </form>
</div>