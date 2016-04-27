<script>
    function confirmDelete(id) {
        if(confirm("Are you sure you want to delete this listing?") === true) {
            var loc = "<?php echo base_url();?>listings/delete/" + id;
            
            window.location = loc;
        } else {
            console.log('Do not delete.');
        }
    }
</script>
<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('manufacturer_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('manufacturer_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('listing_added')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('listing_added');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <form method="post" action="<?php echo base_url();?>products/edit_production/<?php echo $product->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>products" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>products/production"><span class="glyphicon glyphicon-blackboard"></span> Products</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Product</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $product->name;?>" placeholder="Enter Product Name" />
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach($product_status as $status) : ?>
                        <option value="<?php echo $status->id;?>" <?php if($product->status == $status->id) {echo 'selected';};?>><?php echo $status->product_status;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Qty Per Package</label>
                    <input type="text" name="quantity_per_package" id="quantity_per_package" class="form-control" value="<?php echo $product->quantity_per_package;?>" placeholder="Enter Qty Per Package" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="form-control" value="<?php echo number_format($product->total_price, 2, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Item Price</label>
                    <input type="text" name="item_price" id="item_price" class="form-control" value="<?php echo number_format($product->item_price, 2, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Graphics</label>
                    <select name="graphics" id="graphics" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($graphics as $g) : ?>
                        <option value="<?php echo $g->id;?>" <?php if($product->graphics == $g->id) {echo 'selected';};?>><?php echo $g->graphics;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Packaging</label>
                    <input type="text" name="packaging" id="packaging" class="form-control" value="<?php echo $product->packaging;?>" placeholder="Enter Packaging" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Urgency</label>
                    <select name="confidence_level" id="confidence_level" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($confidence as $c) : ?>
                        <option value="<?php echo $c->id;?>" <?php if($product->confidence_level == $c->id) {echo 'selected';};?>><?php echo $c->confidence_level;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <!--
            <div class="col-md-2">
                <div class="form-group">
                    <label>Best BSR</label>
                    <input type="text" name="best_bsr" id="best_bsr" class="form-control" value="<?php //echo $product->best_bsr;?>" placeholder="Enter Best BSR" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Top 3 Avg BSR</label>
                    <input type="text" name="top_3_avg_bsr" id="top_3_avg_bsr" class="form-control" value="<?php //echo $product->top_3_avg_bsr;?>" placeholder="Enter Top 3 Avg BSR" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Top 10 Avg BSR</label>
                    <input type="text" name="top_10_avg_bsr" id="top_10_avg_bsr" class="form-control" value="<?php //echo $product->top_10_avg_bsr;?>" placeholder="Enter Top 10 Avg BSR" />
                </div>
            </div>
            -->
            <div class="col-md-2">
                <div class="form-group">
                    <label>Target Price</label>
                    <input type="text" name="target_price" id="target_price" class="form-control" value="<?php echo $product->target_price;?>" placeholder="Enter Target Price" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>FBA Fee Est</label>
                    <input type="text" name="fba_fee_est" id="fba_fee_est" class="form-control" value="<?php echo $product->fba_fee_est;?>" placeholder="Enter FBA Fee Est" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Margin Per Sale</label>
                    <input type="text" name="margin_per_sale" id="margin_per_sale" class="form-control" value="<?php echo $product->margin_per_sale;?>" readonly />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Sales Per Day</label>
                    <input type="text" name="estimated_sales_per_day" id="estimated_sales_per_day" class="form-control" value="<?php echo $product->estimated_sales_per_day;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Margin Per Month</label>
                    <input type="text" name="estimated_margin_per_month" id="estimated_margin_per_month" class="form-control" value="<?php echo number_format($product->estimated_margin_per_month, 2, '.', ',');?>" readonly />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Date of Deposit</label>
                    <input type="text" name="date_of_deposit" id="date_of_deposit" class="form-control datep" value="<?php echo $product->date_of_deposit;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Qty Ordered</label>
                    <input type="text" name="qty_ordered" id="qty_ordered" class="form-control" value="<?php echo $product->qty_ordered;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Ship Method</label>
                    <select name="ship_method" id="ship_method" class="form-control">
                        <option value="">Select</option>
                        <option value="Air" <?php if($product->ship_method == 'Air') {echo 'selected';};?>>Air</option>
                        <option value="Sea" <?php if($product->ship_method == 'Sea') {echo 'selected';};?>>Sea</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Expected Ship Date</label>
                    <input type="text" name="expected_ship_date" id="expected_ship_date" class="form-control datep" value="<?php echo $product->expected_ship_date;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Arrival Date</label>
                    <input type="text" name="estimated_arrival_date" id="estimated_arrival_date" class="form-control datep" value="<?php echo $product->estimated_arrival_date;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Date at FBA</label>
                    <input type="text" name="estimated_date_at_fba" id="estimated_date_at_fba" class="form-control datep" value="<?php echo $product->estimated_date_at_fba;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Launch Date</label>
                    <input type="text" name="estimated_launch_date" id="estimated_launch_date" class="form-control datep" value="<?php echo $product->estimated_launch_date;?>" />
                </div>
            </div>
            <!--
            <div class="col-md-2">
                <div class="form-group">
                    <label>Competitor Price Example</label>
                    <input type="text" name="competitor_price_example" id="competitor_price_example" class="form-control" value="<?php //echo $product->competitor_price_example;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Competitor Qty Example</label>
                    <input type="text" name="competitor_qty_example" id="competitor_qty_example" class="form-control" value="<?php //echo $product->competitor_qty_example;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Marketing Hook</label>
                    <input type="text" name="marketing_hook" id="marketing_hook" class="form-control" value="<?php //echo $product->mktg_hook;?>" />
                </div>
            </div>
            -->
        </div>
        
        <div class="row">
            <!--
            <div class="col-md-6">
                <div class="form-group">
                    <label>Competitor Link <span style="color: gray; font-style:italic;">(e.g. Amazon Link)</span></label>
                    <input type="text" name="competitor_link" id="competitor_link" class="form-control" value="<?php //echo $product->competitor_link;?>" />
                </div>
            </div>
            -->
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-control">
                        <option value="">Select</option>
                        <option value="bobby" <?php if($product->assigned_to == 'bobby') {echo 'selected';}?>>Bobby</option>
                        <option value="eamon" <?php if($product->assigned_to == 'eamon') {echo 'selected';}?>>Eamon</option>
                        <option value="eric" <?php if($product->assigned_to == 'eric') {echo 'selected';};?>>Eric</option>
                        <option value="fredy" <?php if($product->assigned_to == 'fredy') {echo 'selected';};?>>Fredy</option>
                        <option value="quinn" <?php if($product->assigned_to == 'quinn') {echo 'selected';};?>>Quinn</option>
                        <option value="yang" <?php if($product->assigned_to == 'yang') {echo 'selected';};?>>Yang</option>
                        <option value="ron" <?php if($product->assigned_to == 'ron') {echo 'selected';};?>>Ron - Do not use!</option>
                    </select>
                </div>
            </div>
            
            <!--
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sourcing Due Date</label>
                    <input type="text" name="sourcing_due_date" id="sourcing_due_date" class="form-control datep" value="<?php //echo $product->sourcing_due_date;?>" />
                </div>
            </div>
            -->
            
        </div>
        
    </form>
    
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Manufacturer</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#listingModal">Add Listing</button>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Manufacturers</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="centered">Owner</th>
                            <th class="centered">Total Price</th>
                            <th class="centered">Price Per Item</th>
                            <th class="centered">Qty Per Pkg</th>
                            <th class="centered">MOQ</th>
                            <th class="centered">Lead Time</th>
                            <th class="centered">Samples Status</th>
                            <th class="centered">Brochure</th>
                            <th class="centered">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($manufacturers) : ?>
                        <?php foreach($manufacturers as $manufacturer) : ?>
                        <tr>
                            <td><a href="<?php echo base_url();?>manufacturers/edit/<?php echo $manufacturer->id;?>"><?php echo $manufacturer->name;?></a> <?php if($manufacturer->is_primary == 1) {echo '<strong>(PRIMARY)</strong>';}?></td>

                            <td class="centered"><?php echo $manufacturer->owner;?></td>
                            <td class="centered"><?php echo number_format($manufacturer->total_price, 2, '.', ',');?></td>
                            <td class="centered"><?php echo number_format($manufacturer->price_per_item, 3, '.', ',');?></td>
                            <td class="centered"><?php echo number_format($manufacturer->qty_per_package, 0, '.', ',');?></td>
                            <td class="centered"><?php echo number_format($manufacturer->moq, 0, '.', ',');?></td>
                            <td class="centered"><?php echo $manufacturer->lead_time_in_days;?></td>
                            <td class="centered"><?php echo $manufacturer->samples_status;?></td>
                            <td class="centered"><a href="<?php echo base_url();?>documents/brochures/<?php echo $manufacturer->brochure;?>" target="_blank"><?php echo $manufacturer->brochure;?></a></td>
                            <td class="centered">
                                <?php if($manufacturer->is_primary == 0) : ?>
                                <a class="btn btn-primary" href="<?php echo base_url();?>products/set_as_primary_production_manufacturer/<?php echo $product->id;?>/<?php echo $manufacturer->id;?>" title="Set As Primary"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                <?php //elseif($manufacturer->is_primary == 1) : ?>
                                <!--<a class="btn btn-danger" href="<?php //echo base_url();?>products/remove_as_primary_production_manufacturer/<?php //echo $product->id;?>/<?php //echo $manufacturer->id;?>" title="Remove As Primary"><span class="glyphicon glyphicon-remove-circle"></span></a>--> 
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else : ?>
                        <tr>
                            <td colspan="10" class="centered">No Manufacturers have been set up.</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Listings</h4>
            <div class="table-responsive" style="margin-bottom: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="centered">Title</th>
                            <th class="centered">Brand</th>
                            <th class="centered">Price</th>
                            <th class="centered">Sale Price</th>
                            <th class="centered">Bullets</th>
                            <th class="centered">Listing Image</th>
                            <th class="centered">Secondary Images</th>
                            <th class="centered">Zip File</th>
                            <th class="centered">Cred Site</th>
                            <th class="centered">Approval Status</th>
                            <th class="centered" width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($listings) : ?>
                        <?php foreach($listings as $listing) : ?>
                        <tr>
                            <td><a href=<?php echo base_url();?>listings/edit/<?php echo $listing->id;?>><?php echo $listing->title;?></a></td>
                            <td class="centered"><?php echo $listing->brand;?></td>
                            <td class="centered"><?php echo $listing->price;?></td>
                            <td class="centered"><?php echo $listing->sale_price;?></td>
                            <td class="centered">
                                <?php 
                                    $listing_count = 0;
                                    if($listing->bullet_1) {
                                        $listing_count++;
                                    }

                                    if($listing->bullet_2) {
                                        $listing_count++;
                                    }

                                    if($listing->bullet_3) {
                                        $listing_count++;
                                    }

                                    if($listing->bullet_4) {
                                        $listing_count++;
                                    }

                                    if($listing->bullet_5) {
                                        $listing_count++;
                                    }

                                    if($listing_count > 0) {
                                        echo 'Yes (' . $listing_count . ' bullets)';
                                    }
                                ?>
                            </td>
                            <td class="centered"><?php echo $listing->listing_image ? 'Yes' : 'None';?></td>
                            <td class="centered">
                                <?php 
                                    $sec_image_count = 0;
                                    
                                    if($listing->sec_image_1) {
                                        $sec_image_count++;
                                    } 
                                    
                                    if($listing->sec_image_2) {
                                        $sec_image_count++;
                                    } 
                                    
                                    if($listing->sec_image_3) {
                                        $sec_image_count++;
                                    } 
                                    
                                    if($listing->sec_image_4) {
                                        $sec_image_count++;
                                    } 
                                    
                                    if($listing->sec_image_5) {
                                        $sec_image_count++;
                                    } 
                                    
                                    if($listing->sec_image_6) {
                                        $sec_image_count++;
                                    }
                                    
                                    if($sec_image_count > 0) {
                                        echo 'Yes (' . $sec_image_count . ' images)';
                                    } else {
                                        echo 'No';
                                    }
                                ?>
                            </td>
                            <td class="centered"><a href="<?php echo base_url() . 'documents/listings/listing_images/' . $listing->zip_file;?>"><?php echo $listing->zip_file;?></a></td>
                            <td class="centered"><a href="<?php echo $listing->credibility_site;?>" target="_blank"><?php echo $listing->credibility_site;?></a></td>
                            <td class="centered">
                                <?php 
                                    switch($listing->approval_status) {
                                        case 1:
                                            echo 'Not Approved';
                                            break;
                                        case 2:
                                            echo 'Pending Approval';
                                            break;
                                        case 3:
                                            echo 'Approved';
                                            break;
                                    }
                                ?>
                            </td>
                            <td class="centered" width="100">
                                <a class="btn btn-default" title="Amazon Preview" href="<?php echo base_url();?>listings/amazonPreview/<?php echo $listing->id;?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a class="btn btn-danger" title="Delete Listing" href="javascript:void(0)" onclick="confirmDelete(<?php echo $listing->id;?>);"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else : ?>
                        <tr>
                            <td colspan="10" class="centered">There are no Listings for this Product.</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    
    <!-- Tabbed Content -->
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#concepts" aria-controls="concepts" role="tab" data-toggle="tab">Concepts</a></li>
                <li role="presentation"><a href="#purchase_orders" aria-controls="purchase_orders" role="tab" data-toggle="tab">Purchase Orders</a></li>
                <li role="presentation"><a href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab">Shipping</a></li>
                <li role="presentation"><a href="#legal" aria-controls="legal" role="tab" data-toggle="tab">Legal</a></li>
                <li role="presentation"><a href="#marketing" aria-controls="marketing" role="tab" data-toggle="tab">Marketing</a></li>
                <!--<li role="presentation"><a href="#listings" aria-controls="listings" role="tab" data-toggle="tab">Listings</a></li>-->
            </ul>

            <div class="tab-content">
                <!-- Concepts -->
                <div role="tabpanel" class="tab-pane fade in active" id="concepts">
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="centered">Listing Mock</th>
                                    <th class="centered">Box Art Work</th>
                                    <th class="centered">Instruction Manual</th>
                                    <th class="centered">Product Design</th>
                                    <th class="centered">Brand</th>
                                    <th class="centered">UPC</th>
                                    <th class="centered">Domain</th>
                                    <th class="centered">Notes</th>
                                    <th class="centered">Approval Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($concepts) : ?>
                                <?php foreach($concepts as $concept) : ?>
                                <tr>
                                    <td class="centered">
                                        <?php 
                                            switch($concept->listing_mock) {
                                                case 1:
                                                    echo 'Not Approved';
                                                    break;
                                                case 2:
                                                    echo 'Pending Approval';
                                                    break;
                                                case 3:
                                                    echo 'Approved';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td class="centered">
                                        <?php 
                                            switch($concept->box_art_work) {
                                                case 1:
                                                    echo 'Not Approved';
                                                    break;
                                                case 2:
                                                    echo 'Pending Approval';
                                                    break;
                                                case 3:
                                                    echo 'Approved';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->instruction_manual;?>" target="_blank"><?php echo $concept->instruction_manual;?></a></td>
                                    <td><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->product_design;?>" target="_blank"><?php echo $concept->product_design;?></a></td>
                                    <td><?php echo $concept->brand;?></td>
                                    <td><?php echo $concept->upc;?></td>
                                    <td><a href="<?php echo $concept->domain;?>" target="_blank"><?php echo $concept->domain;?></a></td>
                                    <td><?php echo $concept->notes;?></td>
                                    <td class="centered">
                                        <?php 
                                            switch($concept->approval_status) {
                                                case 1:
                                                    echo 'Not Approved';
                                                    break;
                                                case 2:
                                                    echo 'Pending Approval';
                                                    break;
                                                case 3:
                                                    echo 'Approved';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="9" class="centered">There are no Concepts for this Product</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Purchase Orders -->
                <div role="tabpanel" class="tab-pane fade" id="purchase_orders">
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="centered">PO Status</th>
                                    <th class="centered">PO #</th>
                                    <th class="centered">PO Amount</th>
                                    <th class="centered">Price Unit Sea</th>
                                    <th class="centered">Price Unit Air</th>
                                    <th class="centered">PI</th>
                                    <th class="centered">PO Date</th>
                                    <th class="centered">PO Qty</th>
                                    <th class="centered">Deposit Date 30</th>
                                    <th class="centered">Ship 1 Qty</th>
                                    <th class="centered">Ship 1 Method</th>
                                    <th class="centered">Ship 1 Plan Ship Date</th>
                                    <th class="centered">Ship 1 Actual Ship Date</th>
                                    <th class="centered">Ship 2 Qty</th>
                                    <th class="centered">Ship 2 Method</th>
                                    <th class="centered">Ship 2 Plan Ship Date</th>
                                    <th class="centered">Ship 2 Actual Ship Date</th>
                                    <th class="centered">Ship 3 Qty</th>
                                    <th class="centered">Ship 3 Method</th>
                                    <th class="centered">Ship 3 Plan Ship Date</th>
                                    <th class="centered">Ship 3 Actual Ship Date</th>
                                    <th class="centered">Lead Time</th>
                                    <th class="centered">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($purchase_orders) : ?>
                                <?php foreach($purchase_orders as $po) : ?>
                                <tr>
                                    <td>
                                        <?php 
                                            switch($po->po_status_id) {
                                                case 1:
                                                    echo 'approved';
                                                    break;
                                                case 2:
                                                    echo 'Deposit Made';
                                                    break;
                                                case 3:
                                                    echo 'Partial Shipped';
                                                    break;
                                                case 4:
                                                    echo 'All Shipped';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $po->po;?></td>
                                    <td><?php echo number_format($po->po_amount, 2, '.', ',');?></td>
                                    <td><?php echo number_format($po->price_unit_sea, 2, '.', ',');?></td>
                                    <td><?php echo number_format($po->price_unit_air, 2, '.', ',');?></td>
                                    <td><?php echo $po->pi;?></td>
                                    <td><?php echo $po->po_date;?></td>
                                    <td><?php echo number_format($po->po_qty, 0, '.', ',');?></td>
                                    <td><?php echo $po->deposit_date_30;?></td>
                                    <td><?php echo number_format($po->ship1_qty, 0, '.', ',');?></td>
                                    <td class="centered">
                                        <?php 
                                            switch($po->ship1_method_id) {
                                                case 1:
                                                    echo 'Air';
                                                    break;
                                                case 2:
                                                    echo 'Sea';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $po->ship1_plan_ship_date;?></td>
                                    <td><?php echo $po->ship1_actual_ship_date;?></td>
                                    <td><?php echo number_format($po->ship2_qty, 0, '.', ',');?></td>
                                    <td class="centered">
                                        <?php 
                                            switch($po->ship2_method_id) {
                                                case 1:
                                                    echo 'Air';
                                                    break;
                                                case 2:
                                                    echo 'Sea';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $po->ship2_plan_ship_date;?></td>
                                    <td><?php echo $po->ship2_actual_ship_date;?></td>
                                    <td><?php echo number_format($po->ship3_qty, 0, '.', ',');?></td>
                                    <td class="centered">
                                        <?php 
                                            switch($po->ship3_method_id) {
                                                case 1:
                                                    echo 'Air';
                                                    break;
                                                case 2:
                                                    echo 'Sea';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $po->ship3_plan_ship_date;?></td>
                                    <td><?php echo $po->ship3_actual_ship_date;?></td>
                                    <td class="centered"><?php echo $po->non_holiday_lead_time;?></td>
                                    <td><?php echo $po->notes;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="23" class="centered">There are no Purchase Orders for this Product.</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Shipping -->
                <div role="tabpanel" class="tab-pane fade" id="shipping">
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="centered">Ship Method</th>
                                    <th class="centered">Company</th>
                                    <th class="centered">Shipping Company</th>
                                    <th class="centered">Tracking #</th>
                                    <th class="centered">Est. Arrival Date</th>
                                    <th class="centered">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($shipping) : ?>
                                <?php foreach($shipping as $s) : ?>
                                <tr>
                                    <td class="centered">
                                        <?php 
                                            switch($s->ship_method) {
                                                case 1:
                                                    echo 'Air';
                                                    break;
                                                case 2:
                                                    echo 'Sea';
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td class="centered"><?php echo $s->company;?></td>
                                    <td class="centered"><?php echo $s->shipping_company;?></td>
                                    <td class="centered"><?php echo $s->tracking_number;?></td>
                                    <td class="centered"><?php echo $s->estimated_arrival_date;?></td>
                                    <td class="centered"><?php echo $s->notes;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="6" class="centered">There is no Shipping for this Product.</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Legal -->
                <div role="tabpanel" class="tab-pane fade" id="legal">
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="centered">Box PC</th>
                                    <th class="centered">LLC</th>
                                    <th class="centered">Credit Card</th>
                                    <th class="centered">Bank Account</th>
                                    <th class="centered">Amazon Account</th>
                                    <th class="centered">Special Conditions</th>
                                    <th class="centered">Phone #</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($legal) : ?>
                                <?php foreach($legal as $l) : ?>
                                <tr>
                                    <td class="centered"><?php echo $l->box_pc;?></td>
                                    <td class="centered"><?php echo $l->llc;?></td>
                                    <td class="centered"><?php echo $l->credit_card;?></td>
                                    <td class="centered"><?php echo $l->bank_account;?></td>
                                    <td class="centered"><?php echo $l->amazon_account;?></td>
                                    <td><?php echo $l->special_conditions;?></td>
                                    <td class="centered"><?php echo $l->phone_number;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="7" class="centered">There is no Legal for this Product.</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Marketing -->
                <div role="tabpanel" class="tab-pane fade" id="marketing">
                    <div class="table-responsive" style="margin-bottom: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="centered">Seller Central Ad</th>
                                    <th class="centered">AMS Ad</th>
                                    <th class="centered">Mktg Lander</th>
                                    <th class="centered">Keywords</th>
                                    <th class="centered">Adwords</th>
                                    <th class="centered">Notes</th>
                                    <th class="centered">Promo Codes</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($marketing) : ?>
                                <?php foreach($marketing as $m) : ?>
                                <tr>
                                    <td class="centered"><?php echo $m->seller_central_ad;?></td>
                                    <td class="centered"><?php echo $m->ams_ad;?></td>
                                    <td class="centered"><?php echo $m->marketing_lander;?></td>
                                    <td><?php echo $m->keywords;?></td>
                                    <td><?php echo $m->adwords;?></td>
                                    <td><?php echo $m->notes;?></td>
                                    <td class="centered"><?php echo $m->promo_codes;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="7" class="centered">There is no Marketing for this Product.</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Tabbed Content -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Manufacturer</h4>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
                    
                    <?php if($this->session->flashdata('upload_error')) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><?php echo $this->session->flashdata('upload_error');?></p>
                    </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?php echo base_url();?>products/add_manufacturer_from_production_product/<?php echo $product->id;?>" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" id="product_id" name="product_id" class="form-control" value="<?php echo $product->id;?>" />
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="manufacturer_name" id="manufacturer_name" class="form-control" value="<?php echo set_value('manufacturer_name');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" name="email_address" id="email_address" class="form-control" value="<?php echo set_value('email_address');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact Info</label>
                                    <input type="text" name="contact_info" id="contact_info" class="form-control" value="<?php echo set_value('contact_info');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Owner</label>
                                    <input type="text" name="owner" id="owner" class="form-control" value="<?php echo $this->session->userdata('name');//set_value('owner');?>" readonly />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <input type="text" name="total_price" id="total_price" class="form-control" value="<?php echo set_value('total_price');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price Per Item</label>
                                    <input type="text" name="price_per_item" id="price_per_item" class="form-control" value="<?php echo set_value('price_per_item');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Qty per Package</label>
                                    <input type="text" name="qty_per_package" id="qty_per_package" class="form-control" value="<?php echo set_value('qty_per_package');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>MOQ</label>
                                    <input type="text" name="moq" id="moq" class="form-control" value="<?php echo set_value('moq');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lead Time in Days</label>
                                    <input type="text" name="lead_time_in_days" id="lead_time_in_days" class="form-control" value="<?php echo set_value('lead_time_in_days');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
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
                            
                            <div class="col-md-4">
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
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" name="notes" id="notes"><?php echo set_value('notes');?></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Brochure</label><span style="margin-left: 10px; font-style:italic;">(Allowed Types: jpg, png, ai, pdf, xls, doc, xlsx, docx)</span>
                                    <input type="file" name="userfile" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="listingModal" tabindex="-1" role="dialog" aria-labelledby="listingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="listingModalLabel">Add Listing</h4>
                </div>
                <div class="modal-body">
                    <?php if($this->session->flashdata('upload_error')) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><?php echo $this->session->flashdata('upload_error');?></p>
                    </div>
                    <?php endif;?>
                    
                    <form method="post" action="<?php echo base_url();?>products/add_listing_for_production_product/<?php echo $product->id;?>" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" id="product_id" name="product_id" class="form-control" value="<?php echo $product->id;?>" />
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" id="brand" class="form-control" value="<?php echo set_value('brand');?>" /> 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="<?php echo set_value('price');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input type="text" name="sale_price" id="sale_price" class="form-control" value="<?php echo set_value('sale_price');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bullet 1</label>
                                    <input type="text" name="bullet_1" id="bullet_1" class="form-control" value="<?php echo set_value('bullet_1');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bullet 2</label>
                                    <input type="text" name="bullet_2" id="bullet_2" class="form-control" value="<?php echo set_value('bullet_2');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bullet 3</label>
                                    <input type="text" name="bullet_3" id="bullet_3" class="form-control" value="<?php echo set_value('bullet_3');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bullet 4</label>
                                    <input type="text" name="bullet_4" id="bullet_4" class="form-control" value="<?php echo set_value('bullet_4');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bullet 5</label>
                                    <input type="text" name="bullet_5" id="bullet_5" class="form-control" value="<?php echo set_value('bullet_5');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Credibility Site</label><span style="margin-left: 10px;font-style:italic;">(e.g. http://amazon.com)</span>
                                    <input type="text" name="credibility_site" id="credibility_site" class="form-control" value="<?php echo set_value('credibility_site');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Main Listing Image</label>
                                    <input type="file" name="main_image" size="20" />
                                    
                                    <!--<label>Listing Image & Secondary Images</label><span style="margin-left: 10px; font-style:italic;">(Allowed Types: jpg, png)</span>-->
                                    <!--<input type="file" name="myfiles[]" id="myfiles" multiple />-->
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 1</label>
                                    <input type="file" name="sec_image_1" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 2</label>
                                    <input type="file" name="sec_image_2" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 3</label>
                                    <input type="file" name="sec_image_3" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 4</label>
                                    <input type="file" name="sec_image_4" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 5</label>
                                    <input type="file" name="sec_image_5" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Secondary Listing Image 6</label>
                                    <input type="file" name="sec_image_6" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <input type="submit" name="submit" id="listing_submit" class="btn btn-primary" value="Save" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>