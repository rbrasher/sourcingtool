<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
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
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-blackboard"></span> Products</a></li>
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
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Expected Ship Date</label>
                    <input type="text" name="expected_ship_date" id="expected_ship_date" class="form-control datep" value="<?php echo $product->expected_ship_date;?>" />
                </div>
            </div>
            
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
        </div>
        
        <div class="row">
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
            
            <div class="col-md-2">
                <div class="form-group">
                    <label>Marketing Hook</label>
                    <input type="text" name="marketing_hook" id="marketing_hook" class="form-control" value="<?php echo $product->mktg_hook;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Competitor Link <span style="color: gray; font-style:italic;">(e.g. Amazon Link)</span></label>
                    <input type="text" name="competitor_link" id="competitor_link" class="form-control" value="<?php echo $product->competitor_link;?>" />
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Assigned To</label>
                    <input type="text" name="assigned_to" id="assigned_to" class="form-control" value="<?php echo $product->assigned_to;?>" />
                </div>
            </div>
        </div>
        
    </form>
</div>