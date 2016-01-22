<div class="container">
    <div class="row" style="margin: 20px 0;">
        <div class="col-md-12">
            <div class="btn-group pull-right">
                <a id="toggle" href="javascript:void(0);" class="btn btn-default">Toggle Manufacturers</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="float: left;padding: 0; overflow-x: scroll;">

    <div class="row" style="margin: 0;">

        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr style="float: left;width: 5000px;">
                        <th width="300">Name</th>
                        <th width="120">Status</th>
                        <th width="100">Qty Per Pkg</th>
                        <th width="100">Total Price</th>
                        <th width="100">Item Price</th>
                        <th width="100">Graphics</th>
                        <th width="300">Packaging</th>
                        <th width="100">Confidence</th>
                        <th width="100">Best BSR</th>
                        <th width="100">Top 3 Avg BSR</th>
                        <th width="150">Top 10 Avg BSR</th>
                        <th width="100">Target Price</th>
                        <th width="100">FBA Fee Est</th>
                        <th width="120">Margin Per Sale</th>
                        <th width="120">Est Sales Per Day</th>
                        <th width="150">Est Margin Per Month</th>
                        <th width="100">Date of Deposit</th>
                        <th width="100">Qty Ordered</th>
                        <th width="120">Expected Ship Date</th>
                        <th width="100">Ship Method</th>
                        <th width="120">Est Arrival Date</th>
                        <th width="120">Est Date at FBA</th>
                        <th width="120">Est Launch Date</th>
                        <th width="160">Competitor Price Example</th>
                        <th width="150">Competitor Qty Example</th>
                        <th width="300">Mktg Hook</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product) : ?>
                    <tr style="float: left;width: 5000px;">
                        <td width="300"><?php echo $product->name;?></td>
                        <td width="120" class="centered"><?php echo $product->product_status;?></td>
                        <td width="100" class="centered"><?php echo number_format($product->quantity_per_package, 0, '.', ',');?></td>
                        <td width="100" class="centered"><?php echo number_format($product->total_price, 2, '.', ',');?></td>
                        <td width="100" class="centered"><?php echo number_format($product->item_price, 2, '.', ',');?></td>
                        <td width="100" class="centered"><?php echo $product->graphics;?></td>
                        <td width="300" class="centered"><?php echo $product->packaging;?></td>
                        <td width="100" class="centered"><?php echo $product->confidence;?></td>
                        <td width="100" class="centered"><?php echo $product->best_bsr;?></td>
                        <td width="100" class="centered"><?php echo $product->top_3_avg_bsr;?></td>
                        <td width="150" class="centered"><?php echo $product->top_10_avg_bsr;?></td>
                        <td width="100" class="centered"><?php echo number_format($product->target_price, 2, '.', ',');?></td>
                        <td width="100" class="centered"><?php echo number_format($product->fba_fee_est, 2, '.', ',');?></td>
                        <td width="120" class="centered"><?php echo number_format($product->margin_per_sale, 2, '.', ',');?></td>
                        <td width="120" class="centered"><?php echo number_format($product->estimated_sales_per_day, 0, '.', ',');?></td>
                        <td width="150" class="centered"><?php echo number_format($product->estimated_margin_per_month, 2, '.', ',');?></td>
                        <td width="100" class="centered"><?php echo $product->date_of_deposit;?></td>
                        <td width="100" class="centered"><?php echo number_format($product->qty_ordered, 0, '.', ',');?></td>
                        <td width="120" class="centered"><?php echo $product->expected_ship_date;?></td>
                        <td width="100" class="centered"><?php echo $product->ship_method;?></td>
                        <td width="120" class="centered"><?php echo $product->estimated_arrival_date;?></td>
                        <td width="120" class="centered"><?php echo $product->estimated_date_at_fba;?></td>
                        <td width="120" class="centered"><?php echo $product->estimated_launch_date;?></td>
                        <td width="160" class="centered"><?php echo number_format($product->competitor_price_example, 2, '.', ',');?></td>
                        <td width="150" class="centered"><?php echo number_format($product->competitor_qty_example, 0, '.', ',');?></td>
                        <td width="300"><?php echo $product->mktg_hook;?></td>


                        <td colspan="26">
                            <?php foreach($manufacturers as $manufacturer) : ?>
                            <?php if($manufacturer->product_id == $product->id) : ?>

                                    <tr class="manu" style="float: left; width: 5000px;">
                                        <th width="300"></th>
                                        <th width="300">Manufacturer</th>
                                        <th width="200" class="centered">Email</th>
                                        <th width="200" class="centered">Contact Info</th>
                                        <th width="100" class="centered">Owner</th>
                                        <th width="100" class="centered">Total Price</th>
                                        <th width="100" class="centered">Price Per Item</th>
                                        <th width="100" class="centered">Qty Per Pkg</th>
                                        <th width="100" class="centered">MOQ</th>
                                        <th width="120" class="centered">Lead Time in Days</th>
                                        <th width="200" class="centered">Samples Status</th>
                                        <th width="200" class="centered">Shipping Terms</th>
                                        <th colspan="10"></th>

                                    </tr>

                                    <tr class="manu" style="float: left; width: 5000px;">
                                        <td width="300"></td>
                                        <td width="300"><?php echo $manufacturer->name;?></td>
                                        <td width="200" class="centered"><?php echo $manufacturer->email_address;?></td>
                                        <td width="200" class="centered"><?php echo $manufacturer->contact_info;?></td>
                                        <td width="100" class="centered"><?php echo $manufacturer->owner;?></td>
                                        <td width="100" class="centered"><?php echo number_format($manufacturer->total_price, 2, '.', ',');?></td>
                                        <td width="100" class="centered"><?php echo number_format($manufacturer->price_per_item, 2, '.', ',');?></td>
                                        <td width="100" class="centered"><?php echo number_format($manufacturer->qty_per_package, 0, '.', ',');?></td>
                                        <td width="100" class="centered"><?php echo number_format($manufacturer->moq, 0, '.', ',');?></td>
                                        <td width="120" class="centered"><?php echo $manufacturer->lead_time_in_days;?></td>
                                        <td width="200" class="centered"><?php echo $manufacturer->samples_status;?></td>
                                        <td width="200" class="centered"><?php echo $manufacturer->shipping_terms;?></td>
                                        <td colspan="10"></td>
                                    </tr>
                                    <tr class="manu"><td colspan="25" height="40"></td></tr>

                            <?php endif;?>
                            <?php endforeach; ?>
                        </td>


                    </tr>

                    <?php endforeach;?>
                </tbody>
            </table>

        </div>

    </div>

</div>
