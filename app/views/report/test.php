<div class="container-fluid" style="float: left;padding: 0; overflow-x: scroll;">
    <div class="row" style="margin: 0;">
        <div class="table-responsive">
            <ul>
                <li>
                    <div class="report_header three">Name</div>
                    <div class="report_header">Status</div>
                    <div class="report_header">Qty per Pkg</div>
                    <div class="report_header">Total Price</div>
                    <div class="report_header">Item Price</div>
                    <div class="report_header two">Graphics</div>
                    <div class="report_header three">Packaging</div>
                    <div class="report_header">Confidence</div>
                    <div class="report_header">Best BSR</div>
                    <div class="report_header">Top 3 Avg BSR</div>
                    <div class="report_header">Top 10 Avg BSR</div>
                    <div class="report_header">Target Price</div>
                    <div class="report_header">FBA Fee Est.</div>
                    <div class="report_header">Margin Per Sale</div>
                    <div class="report_header">Est Sales Per Day</div>
                    <div class="report_header">Est Margin Per Month</div>
                    <div class="report_header">Date of Deposit</div>
                    <div class="report_header">Qty Ordered</div>
                    <div class="report_header">Expected Ship Date</div>
                    <div class="report_header">Ship Method</div>
                    <div class="report_header">Est Arrival Date</div>
                    <div class="report_header">Est Date at FBA</div>
                    <div class="report_header">Est Launch Date</div>
                    <div class="report_header">Competitor Price Example</div>
                    <div class="report_header">Competitor Qty Example</div>
                    <div class="report_header">Mktg Hook</div>
                </li>
                
                <?php foreach($products as $product) : ?>
                <li>
                    <div class="report_data three"><?php echo $product->name;?></div>
                    <div class="report_data centered"><?php echo $product->product_status;?></div>
                    <div class="report_data centered"><?php echo number_format($product->quantity_per_package, 0, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->total_price, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->item_price, 2, '.', ',');?></div>
                    <div class="report_data two centered"><?php echo $product->graphics;?></div>
                    <div class="report_data three"><?php echo $product->packaging;?></div>
                    <div class="report_data centered"><?php if($product->confidence) {echo $product->confidence;} else {echo '';};?></div>
                    <div class="report_data centered"><?php echo $product->best_bsr;?></div>
                    <div class="report_data centered"><?php echo $product->top_3_avg_bsr;?></div>
                    <div class="report_data centered"><?php echo $product->top_10_avg_bsr;?></div>
                    <div class="report_data centered"><?php echo number_format($product->target_price, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->fba_fee_est, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->margin_per_sale, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->estimated_sales_per_day, 0, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->estimated_margin_per_month, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo $product->date_of_deposit;?></div>
                    <div class="report_data centered"><?php echo number_format($product->qty_ordered, 0, '.', ',');?></div>
                    <div class="report_data centered"><?php echo $product->expected_ship_date;?></div>
                    <div class="report_data centered"><?php echo $product->ship_method;?></div>
                    <div class="report_data centered"><?php echo $product->estimated_arrival_date;?></div>
                    <div class="report_data centered"><?php echo $product->estimated_date_at_fba;?></div>
                    <div class="report_data centered"><?php echo $product->estimated_launch_date;?></div>
                    <div class="report_data centered"><?php echo number_format($product->competitor_price_example, 2, '.', ',');?></div>
                    <div class="report_data centered"><?php echo number_format($product->competitor_qty_example, 0, '.', ',');?></div>
                    <div class="report_data"><?php echo $product->mktg_hook;?></div>
                </li>
                <?php endforeach;?>
                
            </ul>
        </div>
    </div>
</div>