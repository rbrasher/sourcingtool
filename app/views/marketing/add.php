<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <form method="post" action="<?php echo base_url();?>marketing/add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Marketing Info</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>marketing" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>marketing"><span class="glyphicon glyphicon-blackboard"></span> Marketing</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Marketing Info</li>
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
                    <label>Seller Central Ad</label><br />
                    <input type="radio" name="seller_central_ad" value="yes" /> Yes
                    <input style="margin-left: 20px;" type="radio" name="seller_central_ad" value="no" checked /> No
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>AMS Ad</label><br />
                    <input type="radio" name="ams_ad" value="yes" /> Yes
                    <input style="margin-left: 20px;" type="radio" name="ams_ad" value="no" checked /> No
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Marketing Lander</label><br />
                    <input type="radio" name="marketing_lander" value="yes" /> Yes
                    <input style="margin-left: 20px;" type="radio" name="marketing_lander" value="no" checked /> No
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Keywords</label>
                    <textarea rows="10" name="keywords" id="keywords" class="form-control"><?php echo set_value('keywords');?></textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Adwords</label>
                    <textarea rows="10" name="adwords" id="adwords" class="form-control"><?php echo set_value('adwords');?></textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea rows="10" name="notes" id="notes" class="form-control"><?php echo set_value('notes');?></textarea>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Promo Codes</label><span style="margin-left: 10px; font-style:italic;">(Allowed Types: csv, xls, doc)</span>
                    <input type="file" name="userfile1" id="userfile1" />
                </div>
            </div>
        </div>
        
    </form>
</div>
