<script>
    $(document).ready(function() {
        
        $('#approve').click(function(e) {
            e.preventDefault();
            
            $.post("<?php echo base_url();?>products/approve/<?php echo $product->id;?>", function(status){
                window.close();
            });
        });
        
        $('#reject').click(function(e) {
            e.preventDefault();
            
            $.post("<?php echo base_url();?>products/unapprove/<?php echo $product->id;?>", function(status){
                window.close();
            });
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Name:</span> <?php echo $product->name;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Status:</span> <?php echo $product->product_status;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Qty Per Package:</span> <?php echo $product->quantity_per_package;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Total Price:</span> <?php echo number_format($product->total_price, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Item Price:</span> <?php echo number_format($product->item_price);?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Graphics:</span> <?php echo $product->graphics;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Packaging:</span> <?php echo $product->packaging;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Confidence Level:</span> <?php echo $product->confidence_level;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Best BSR:</span> <?php echo number_format($product->best_bsr, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Top 3 Avg BSR:</span> <?php echo number_format($product->top_3_avg_bsr, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Top 10 Avg BSR:</span> <?php echo number_format($product->top_10_avg_bsr, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Target Price:</span> <?php echo number_format($product->target_price, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">FBA Fee Est:</span> <?php echo number_format($product->fba_fee_est, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Margin Per Sale:</span> <?php echo number_format($product->margin_per_sale, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Est. Sales Per Day:</span> <?php echo number_format($product->estimated_sales_per_day, 0, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Est. Margin Per Month:</span> <?php echo number_format($product->estimated_margin_per_month, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Date of Deposit:</span> <?php echo $product->date_of_deposit;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Qty Ordered:</span> <?php echo number_format($product->qty_ordered, 0, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Expected Ship Date:</span> <?php echo $product->expected_ship_date;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Ship Method:</span> <?php echo $product->ship_method;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Est. Arrival Date:</span> <?php echo $product->estimated_arrival_date;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Est. Date at FBA:</span> <?php echo $product->estimated_date_at_fba;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Est. Launch Date:</span> <?php echo $product->estimated_launch_date;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Competitor Price Example:</span> <?php echo number_format($product->competitor_price_example, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Competitor Qty Example:</span> <?php echo number_format($product->competitor_qty_example, 0, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Mktg Hook:</span> <?php echo $product->mktg_hook;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Competitor Link:</span> <a href="<?php echo $product->competitor_link;?>" target="_blank"><?php echo $product->competitor_link;?></a></td>
                </tr>
            </table>
        </div>
    </div>
    
    <?php foreach($manufacturers as $m) : ?>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Manufacturer Name:</span> <?php echo $m->name;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Email:</span> <?php echo $m->email_address;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Contact:</span> <?php echo $m->contact_info;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Owner:</span> <?php echo $m->owner;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Total Price:</span> <?php echo number_format($m->total_price, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Price Per Item:</span> <?php echo number_format($m->price_per_item, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Qty Per Pkg:</span> <?php echo number_format($m->qty_per_package, 0, '.', ',');?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">MOQ:</span> <?php echo $m->moq;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Lead Time (Days):</span> <?php echo $m->lead_time_in_days;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Samples Status:</span> <?php echo $m->samples_status;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Shipping Terms:</span> <?php echo $m->shipping_terms;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Brochure:</span> <a target="_blank" href="<?php echo base_url();?>documents/brochures/<?php echo $m->brochure;?>"><?php echo $m->brochure;?></a></td>
                </tr>
            </table>
        </div>
    </div>
    <?php endforeach;?>
    
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-4">
            <div class="btn-group">
                <a href="javascript:void(0);" id="approve" class="btn btn-success">Approve</a>
                <a href="javascript:void(0);" id="reject" class="btn btn-danger">Reject</a>
            </div>
        </div>
    </div>
</div>