<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>po/edit/<?php echo $po->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Purchase Order</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>po" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>po"><span class="glyphicon glyphicon-list-alt"></span> Purchase Orders</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Purchase Order</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select</option>
                        <?php foreach($products as $product) : ?>
                        <option value="<?php echo $product->id;?>" <?php if($po->product_id == $product->id) {echo 'selected';};?>><?php echo $product->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Product</label>
                    <input type="text" name="product" id="product" class="form-control" value="<?php echo $po->product;?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>PO Status</label>
                    <select class="form-control" name="po_status_id" id="po_status_id">
                        <option value="0">Select</option>
                        <option value="1" <?php if($po->po_status_id == 1) {echo 'selected';};?>>Approved</option>
                        <option value="2" <?php if($po->po_status_id == 2) {echo 'selected';};?>>Deposit Made</option>
                        <option value="3" <?php if($po->po_status_id == 3) {echo 'selected';};?>>Partial Shipped</option>
                        <option value="4" <?php if($po->po_status_id == 4) {echo 'selected';};?>>All Shipped</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>PO #</label>
                    <input type="text" name="po" id="po" class="form-control" value="<?php echo $po->po;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>PO Amount</label>
                    <input type="text" name="po_amount" id="po_amount" class="form-control" value="<?php echo number_format($po->po_amount, 2, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Price Unit Sea</label>
                    <input type="text" name="price_unit_sea" id="price_unit_sea" class="form-control" value="<?php echo $po->price_unit_sea;?>" />
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Price Unit Air</label>
                    <input type="text" name="price_unit_air" id="price_unit_air" class="form-control" value="<?php echo $po->price_unit_air;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>PI</label>
                    <input type="text" name="pi" id="pi" class="form-control" value="<?php echo $po->pi;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>PO Date</label>
                    <input type="text" name="po_date" id="po_date" class="form-control datep" value="<?php echo $po->po_date;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>PO Qty</label>
                    <input type="text" name="po_qty" id="po_qty" class="form-control" value="<?php echo number_format($po->po_qty, 0, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Deposit Date 30</label>
                    <input type="text" name="deposit_date_30" id="deposit_date_30" class="form-control datep" value="<?php echo $po->deposit_date_30;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 1 Qty</label>
                    <input type="text" name="ship1_qty" id="ship1_qty" class="form-control" value="<?php echo number_format($po->ship1_qty, 0, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 1 Method</label>
                    <select name="ship1_method_id" id="ship1_method_id" class="form-control">
                        <option value="">Select</option>
                        <option value="1" <?php if($po->ship1_method_id == 1) {echo 'selected';};?>>Air</option>
                        <option value="2" <?php if($po->ship1_method_id == 2) {echo 'selected';};?>>Sea</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 1 Plan Ship Date</label>
                    <input type="text" name="ship1_plan_ship_date" id="ship1_plan_ship_date" class="form-control datep" value="<?php echo $po->ship1_plan_ship_date;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 1 Actual Ship Date</label>
                    <input type="text" name="ship1_actual_ship_date" id="ship1_actual_ship_date" class="form-control datep" value="<?php echo $po->ship1_actual_ship_date;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 2 Qty</label>
                    <input type="text" name="ship2_qty" id="ship2_qty" class="form-control" value="<?php echo number_format($po->ship2_qty, 0, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 2 Method</label>
                    <select name="ship2_method_id" id="ship2_method_id" class="form-control">
                        <option value="">Select</option>
                        <option value="1" <?php if($po->ship2_method_id == 1) {echo 'selected';};?>>Air</option>
                        <option value="2" <?php if($po->ship2_method_id == 2) {echo 'selected';};?>>Sea</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 2 Plan Ship Date</label>
                    <input type="text" name="ship2_plan_ship_date" id="ship2_plan_ship_date" class="form-control datep" value="<?php echo $po->ship2_plan_ship_date;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 2 Actual Ship Date</label>
                    <input type="text" name="ship2_actual_ship_date" id="ship2_actual_ship_date" class="form-control datep" value="<?php echo $po->ship2_actual_ship_date;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 3 Qty</label>
                    <input type="text" name="ship3_qty" id="ship3_qty" class="form-control" value="<?php echo number_format($po->ship3_qty, 0, '.', ',');?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 3 Method</label>
                    <select name="ship3_method_id" id="ship3_method_id" class="form-control">
                        <option value="">Select</option>
                        <option value="1" <?php if($po->ship3_method_id == 1) {echo 'selected';};?>>Air</option>
                        <option value="2" <?php if($po->ship3_method_id == 2) {echo 'selected';};?>>Sea</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 3 Plan Ship Date</label>
                    <input type="text" name="ship3_plan_ship_date" id="ship3_plan_ship_date" class="form-control datep" value="<?php echo $po->ship3_plan_ship_date;?>" />
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ship 3 Actual Ship Date</label>
                    <input type="text" name="ship3_actual_ship_date" id="ship3_actual_ship_date" class="form-control datep" value="<?php echo $po->ship3_actual_ship_date;?>" />
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Non Holiday Lead Time</label>
                    <input type="text" name="non_holiday_lead_time" id="non_holiday_lead_time" class="form-control" value="<?php echo $po->non_holiday_lead_time;?>" />
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <input type="text" name="notes" id="notes" class="form-control" value="<?php echo $po->notes;?>" />
                </div>
            </div>
        </div>
        
    </form>
    
</div>