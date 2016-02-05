<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <form method="post" action="<?php echo base_url();?>listings/edit/<?php echo $listing->id;?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Listing</h1>
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
                    <li><a href="<?php echo base_url();?>listings"><span class="glyphicon glyphicon-list"></span> Listings</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Listing</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select a product</option>
                        <?php foreach($products as $product) : ?>
                        <option value="<?php echo $product->id;?>" <?php if($listing->product_id == $product->id) {echo 'selected';};?>><?php echo $product->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $listing->title;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="product_description" id="product_description" class="form-control wizzy" rows="5"><?php echo $listing->product_description;?></textarea>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Bullets</label>
                    <textarea name="bullets" id="bullets" class="form-control wizzy" rows="5"><?php echo $listing->bullets;?></textarea>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea name="notes" id="notes" class="form-control wizzy" rows="5"><?php echo $listing->notes;?></textarea>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Credibility Site</label><span style="margin-left: 10px;font-style:italic;">(e.g. http://amazon.com)</span>
                    <input type="text" name="credibility_site" id="credibility_site" class="form-control" value="<?php echo $listing->credibility_site;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Listing Image</label>
                    <input type="text" name="listing_image" id="listing_image" class="form-control" value="<?php echo $listing->listing_image;?>" readonly />
                </div>
            </div>
            <div class="col-md-12 centered">
                <img class="scale-with-grid" src="<?php echo base_url();?>documents/listings/listing_images/<?php echo $listing->listing_image;?>" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Secondary Images</label>
                    <input type="text" name="secondary_images" id="secondary_images" class="form-control" value="<?php echo $listing->secondary_images;?>" readonly />
                </div>
            </div>
            <?php $images = explode('|', $listing->secondary_images); ?>
            <?php foreach($images as $image) : ?>
            <div class="col-md-12 centered">
                <img style="border:1px solid red; margin-bottom: 20px;" class="scale-with-grid" src="<?php echo base_url();?>documents/listings/listing_images/<?php echo $image;?>" />
            </div>
            <?php endforeach; ?>
        </div>
        
    </form>
</div>
