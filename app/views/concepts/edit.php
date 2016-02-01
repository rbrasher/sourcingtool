<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <form method="post" action="<?php echo base_url();?>concepts/edit/<?php echo $concept->id;?>" enctype="multipart/form-data">
        
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Concept</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>concepts" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>concepts"><span class="glyphicon glyphicon-road"></span> Concepts</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Concept</li>
                </ol>
            </div>
        </div>
        
        <div class="row" style="border-bottom: 1px solid green; margin-bottom: 30px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($products as $product) : ?>
                        <option value="<?php echo $product->id;?>" <?php if($concept->product_id == $product->id) {echo 'selected';};?>><?php echo $product->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Listing Mock</label>
                    <select name="listing_mock" id="listing_mock" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($approval_statuses as $status) : ?>
                        <option value="<?php echo $status->id;?>" <?php if($concept->listing_mock == $status->id) {echo 'selected';} ;?>><?php echo $status->approval_status;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Box Art Work</label>
                    <select name="box_art_work" id="box_art_work" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($approval_statuses as $status) : ?>
                        <option value="<?php echo $status->id;?>" <?php if($concept->box_art_work == $status->id) {echo 'selected';};?>><?php echo $status->approval_status;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Instruction Manual</label>
                    <input type="text" name="instruction_manual" id="instruction_manual" class="form-control" readonly value="<?php echo $concept->instruction_manual;?>"/>
                    <!--<input type="file" name="userfile1" size="20" />-->
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Product Design</label>
                    <input type="text" name="product_design" id="product_design" class="form-control" readonly value="<?php echo $concept->product_design;?>" />
                    <!--<input type="file" name="userfile2" size="20" />-->
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $concept->brand;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>UPC</label>
                    <input type="text" name="upc" id="upc" class="form-control" value="<?php echo $concept->upc;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Domain <span style="font-style:italic; color:gray;">(e.g. http://google.com)</span></label>
                    <input type="text" name="domain" id="domain" class="form-control" value="<?php echo $concept->domain;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" name="notes" id="notes"><?php echo $concept->notes;?></textarea>
                </div>
            </div>
        </div>
        
    </form>
</div>
