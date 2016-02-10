<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <?php if($this->session->flashdata('manufacturer_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('manufacturer_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('concept_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('concept_approved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_approved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('concept_rejected')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_rejected');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <form method="post" action="<?php echo base_url();?>products/edit/<?php echo $product->id;?>">
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
                    <li><a href="<?php echo base_url();?>products"><span class="glyphicon glyphicon-blackboard"></span> Products</a></li>
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
            
            <!--
            <div class="col-md-2">
                <div class="form-group">
                    <label>Graphics</label>
                    <select name="graphics" id="graphics" class="form-control">
                        <option value="">Select</option>
                        <?php //foreach($graphics as $g) : ?>
                        <option value="<?php //echo $g->id;?>" <?php //if($product->graphics == $g->id) {echo 'selected';};?>><?php //echo $g->graphics;?></option>
                        <?php //endforeach;?>
                    </select>
                </div>
            </div>
            -->
            
            <div class="col-md-4">
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
            <div class="col-md-2">
                <div class="form-group">
                    <label>Best BSR</label>
                    <input type="text" name="best_bsr" id="best_bsr" class="form-control" value="<?php echo $product->best_bsr;?>" placeholder="Enter Best BSR" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Top 3 Avg BSR</label>
                    <input type="text" name="top_3_avg_bsr" id="top_3_avg_bsr" class="form-control" value="<?php echo $product->top_3_avg_bsr;?>" placeholder="Enter Top 3 Avg BSR" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Top 10 Avg BSR</label>
                    <input type="text" name="top_10_avg_bsr" id="top_10_avg_bsr" class="form-control" value="<?php echo $product->top_10_avg_bsr;?>" placeholder="Enter Top 10 Avg BSR" />
                </div>
            </div>
            
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
                    <input type="text" name="margin_per_sale" id="margin_per_sale" class="form-control" value="<?php echo $product->margin_per_sale;?>" placeholder="Enter Margin Per Sale" />
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
                    <input type="text" name="estimated_margin_per_month" id="estimated_margin_per_month" class="form-control" value="<?php echo $product->estimated_margin_per_month;?>" />
                </div>
            </div>
            
            <!--
            <div class="col-md-2">
                <div class="form-group">
                    <label>Date of Deposit</label>
                    <input type="text" name="date_of_deposit" id="date_of_deposit" class="form-control datep" value="<?php //echo $product->date_of_deposit;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Qty Ordered</label>
                    <input type="text" name="qty_ordered" id="qty_ordered" class="form-control" value="<?php //echo $product->qty_ordered;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Expected Ship Date</label>
                    <input type="text" name="expected_ship_date" id="expected_ship_date" class="form-control datep" value="<?php //echo $product->expected_ship_date;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Ship Method</label>
                    <select name="ship_method" id="ship_method" class="form-control">
                        <option value="">Select</option>
                        <option value="Air" <?php //if($product->ship_method == 'Air') {echo 'selected';};?>>Air</option>
                        <option value="Sea" <?php //if($product->ship_method == 'Sea') {echo 'selected';};?>>Sea</option>
                    </select>
                </div>
            </div>
            -->
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Competitor Price Example</label>
                    <input type="text" name="competitor_price_example" id="competitor_price_example" class="form-control" value="<?php echo $product->competitor_price_example;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Competitor Qty Example</label>
                    <input type="text" name="competitor_qty_example" id="competitor_qty_example" class="form-control" value="<?php echo $product->competitor_qty_example;?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Marketing Hook</label>
                    <input type="text" name="marketing_hook" id="marketing_hook" class="form-control" value="<?php echo $product->mktg_hook;?>" />
                </div>
            </div>
        </div>
        
        <!--
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Arrival Date</label>
                    <input type="text" name="estimated_arrival_date" id="estimated_arrival_date" class="form-control datep" value="<?php //echo $product->estimated_arrival_date;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Date at FBA</label>
                    <input type="text" name="estimated_date_at_fba" id="estimated_date_at_fba" class="form-control datep" value="<?php //echo $product->estimated_date_at_fba;?>" />
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Estimated Launch Date</label>
                    <input type="text" name="estimated_launch_date" id="estimated_launch_date" class="form-control datep" value="<?php //echo $product->estimated_launch_date;?>" />
                </div>
            </div>
        </div>
        -->
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Competitor Link <span style="color: gray; font-style:italic;">(e.g. Amazon Link)</span></label>
                    <input type="text" name="competitor_link" id="competitor_link" class="form-control" value="<?php echo $product->competitor_link;?>" />
                </div>
            </div>
            
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
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sourcing Due Date</label>
                    <input type="text" name="sourcing_due_date" id="sourcing_due_date" class="form-control datep" value="<?php echo $product->sourcing_due_date;?>" />
                </div>
            </div>
        </div>
        
    </form>
    
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Manufacturers</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Total Price</th>
                            <th>Price Per Item</th>
                            <th>Qty Per Pkg</th>
                            <th>MOQ</th>
                            <th>Lead Time</th>
                            <th>Samples Status</th>
                            <th>Brochure</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($manufacturers) : ?>
                        <?php foreach($manufacturers as $manufacturer) : ?>
                        <tr>
                            <td><a href="<?php echo base_url();?>manufacturers/edit/<?php echo $manufacturer->id;?>"><?php echo $manufacturer->name;?></a> <?php if($manufacturer->is_primary == 1) {echo '<strong>(PRIMARY)</strong>';}?></td>

                            <td><?php echo $manufacturer->owner;?></td>
                            <td><?php echo number_format($manufacturer->total_price, 2, '.', ',');?></td>
                            <td><?php echo number_format($manufacturer->price_per_item, 3, '.', ',');?></td>
                            <td><?php echo number_format($manufacturer->qty_per_package, 0, '.', ',');?></td>
                            <td><?php echo $manufacturer->moq;?></td>
                            <td><?php echo $manufacturer->lead_time_in_days;?></td>
                            <td><?php echo $manufacturer->samples_status;?></td>
                            <td><a href="<?php echo base_url();?>documents/brochures/<?php echo $manufacturer->brochure;?>" target="_blank"><?php echo $manufacturer->brochure;?></a></td>
                            <td>
                                <?php if($manufacturer->is_primary == 0) : ?>
                                <a class="btn btn-primary" href="<?php echo base_url();?>products/set_as_primary_manufacturer/<?php echo $product->id;?>/<?php echo $manufacturer->id;?>" title="Set As Primary"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                <?php elseif($manufacturer->is_primary == 1) : ?>
                                <a class="btn btn-danger" href="<?php echo base_url();?>products/remove_as_primary_manufacturer/<?php echo $product->id;?>/<?php echo $manufacturer->id;?>" title="Remove As Primary"><span class="glyphicon glyphicon-remove-circle"></span></a> 
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
            <h4 class="page-header">Concepts</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="centered">Brand</th>
                            <th class="centered">UPC</th>
                            <th class="centered">Domain</th>
                            <th class="centered">Notes</th>
                            <th class="centered">Listing Mock</th>
                            <th class="centered">Box Art Work</th>
                            <th class="centered">Instruction Manual</th>
                            <th class="centered">Product Design</th>
                            <th class="centered">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($concepts) : ?>
                        <?php foreach($concepts as $concept) : ?>
                        <tr>
                            <td class="centered"><a href="<?php echo base_url();?>concepts/edit/<?php echo $concept->id;?>" target="_blank"><?php echo $concept->brand;?></a></td>
                            <td class="centered"><?php echo $concept->upc;?></td>
                            <td class="centered"><?php echo $concept->domain;?></td>
                            <td><?php echo $concept->notes;?></td>
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
                            <td class="centered"><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->instruction_manual;?>" target="_blank"><?php echo $concept->instruction_manual;?></a></td>
                            <td class="centered"><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->product_design;?>" target="_blank"><?php echo $concept->product_design;?></a></td>
                            <td class="centered">
                                <?php if($concept->approval_status == '1') : ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>products/approve_concept/<?php echo $product->id;?>/<?php echo $concept->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                <?php elseif($concept->approval_status == '3') : ?>
                                <a class="btn btn-warning" href="<?php echo base_url();?>products/unapprove_concept/<?php echo $product->id;?>/<?php echo $concept->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else : ?>
                        <tr>
                            <td colspan="8" class="centered">There are no Concepts for this product yet.</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Manufacturer</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#conceptModal">Add Concept</button>
        </div>
    </div>
    
    <!-- Concept Modal -->
    <div class="modal fade" id="conceptModal" tabindex="-1" role="dialog" aria-labelledby="conceptModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="conceptModalLabel">Add Concept</h4>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
                    
                    <?php if($this->session->flashdata('upload_error')) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><?php echo $this->session->flashdata('upload_error');?></p>
                    </div>
                    <?php endif;?>
                    
                    <form method="post" action="<?php echo base_url();?>products/add_concept_from_product/<?php echo $product->id;?>" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" id="product_id" name="product_id" class="form-control" value="<?php echo $product->id;?>" />
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Listing Mock</label>
                                    <select name="listing_mock" id="listing_mock" class="form-control">
                                        <option value="1" selected>Not Approved</option>
                                        <option value="2">Pending Approval</option>
                                        <option value="3">Approved</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Box Art Work</label>
                                    <select name="box_art_work" id="box_art_work" class="form-control">
                                        <option value="1" selected>Not Approved</option>
                                        <option value="2">Pending Approval</option>
                                        <option value="3">Approved</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" id="brand" class="form-control" value="<?php echo set_value('brand');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>UPC</label>
                                    <input type="text" name="upc" id="upc" class="form-control" value="<?php echo set_value('upc');?>" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Domain</label><span style="font-style:italic; color: gray;">(e.g. http://google.com)</span>
                                    <input type="text" name="domain" id="domain" class="form-control" value="<?php echo set_value('domain');?>" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" id="notes" class="form-control"><?php echo set_value('notes');?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instruction Manual</label>
                                    <input type="file" name="userfile1" size="20" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Design</label>
                                    <input type="file" name="userfile2" size="20" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
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
    
    <!-- Manufacturer Modal -->
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
                    
                    <form method="post" action="<?php echo base_url();?>products/add_manufacturer_from_product/<?php echo $product->id;?>" enctype="multipart/form-data">
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
                                    <input type="text" name="owner" id="owner" class="form-control" value="<?php echo set_value('owner');?>" />
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
                            
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Brochure</label><span style="margin-left: 10px; font-style:italic;">(Allowed Types: jpg, png, ai, pdf, xls, doc)</span>
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
    
</div>