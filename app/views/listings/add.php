<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>listings/add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Listing</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>listings" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>listings"><span class="glyphicon glyphicon-road"></span> Listings</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Listing</li>
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
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo set_value('title');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="product_description" id="product_description" class="form-control wizzy" rows="5"><?php echo set_value('product_description');?></textarea>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Bullets</label>
                    <textarea name="bullets" id="bullets" class="form-control wizzy" rows="5"><?php echo set_value('bullets');?></textarea>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea name="notes" id="notes" class="form-control wizzy" rows="5"><?php echo set_value('notes');?></textarea>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Credibility Site</label><span style="margin-left: 10px;font-style:italic;">(e.g. http://amazon.com)</span>
                    <input type="text" name="credibility_site" id="credibility_site" class="form-control" value="<?php echo set_value('credibility_site');?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Listing Image & Secondary Images</label>
                    <!--<input type="file" name="userfile1" size="20" />-->
                    <input type="file" name="myfiles[]" id="myfiles" multiple />
                </div>
            </div>
        </div>
        
        <!--
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Secondary Images</label>
                    <input type="file" name="myfiles[]" id="myfiles" multiple />
                    <div id="fileuploader">Upload</div>
                </div>
            </div>
        </div>
        -->
    </form>
</div>