<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>manufacturers/edit/<?php echo $manufacturer->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Manufacturer</h1>
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
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Manufacturer</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $manufacturer->name;?>" placeholder="Enter Manufacturer Name" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="email_address" id="email_address" class="form-control" value="<?php echo $manufacturer->email_address;?>" placeholder="Enter Manufacturer Email" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Contact Info</label>
                    <input type="text" name="contact_info" id="contact_info" class="form-control" value="<?php echo $manufacturer->contact_info;?>" placeholder="Enter Contact Info" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Owner</label>
                    <input type="text" name="owner" id="owner" class="form-control" value="<?php echo $manufacturer->owner;?>" placeholder="Enter Owner" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="form-control" value="<?php echo number_format($manufacturer->total_price, 2, '.', ',');?>" placeholder="Enter Total Price" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Price Per Item</label>
                    <input type="text" name="price_per_item" id="price_per_item" class="form-control" value="<?php echo number_format($manufacturer->price_per_item, 2, '.', ',');?>" placeholder="Enter price per item" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Qty Per Package</label>
                    <input type="text" name="qty_per_package" id="qty_per_package" class="form-control" value="<?php echo number_format($manufacturer->qty_per_package, 0, '.', ',');?>" placeholder="Enter Qty Per Package" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>MOQ</label>
                    <input type="text" name="moq" id="moq" class="form-control" value="<?php echo number_format($manufacturer->moq, 0, '.', ',');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Lead Time in Days</label>
                    <input type="text" name="lead_time_in_days" id="lead_time_in_days" class="form-control" value="<?php echo $manufacturer->lead_time_in_days;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Samples Status</label>
                    <select name="samples_status" id="samples_status" class="form-control">
                        <option value="">Select a status</option>
                        <?php foreach($samples_status as $status) : ?>
                        <option value="<?php echo $status->id;?>" <?php if($manufacturer->samples_status == $status->id){echo 'selected';};?>><?php echo $status->samples_status;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Shipping Terms</label>
                    <select name="shipping_terms" id="shipping_terms" class="form-control">
                        <option value="">Select Shipping Terms</option>
                        <?php foreach($shipping_terms as $terms) : ?>
                        <option value="<?php echo $terms->id;?>" <?php if($manufacturer->shipping_terms == $terms->id){echo 'selected';};?>><?php echo $terms->shipping_terms;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>