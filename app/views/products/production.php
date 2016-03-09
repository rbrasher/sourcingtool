<script>
    function confirmReject(id) {
        if(confirm("Are you sure you want to remove this product from Production Products?") === true) {
            var loc = "<?php echo base_url();?>products/unapprove/" + id;
            
            window.location = loc;
        } else {
            console.log('Do not remove from production products.');
        }
    }
</script>
<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('product_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('product_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('product_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('product_deleted');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('product_approved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('product_approved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('product_rejected')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('product_rejected');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Production Products</h1>
    
    <!-- Approved Products -->
    <div class="table-responsive">
        <table id="MyDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="centered">Status</th>
                    <th class="centered">Assigned To</th>
                    <th class="centered"># Manufacturers</th>
                    <th class="centered">Est. Monthly Margin</th>
                    <th class="centered">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($approved_products) : ?>
                <?php foreach($approved_products as $approved_product) : ?>
                    <?php 
                        $count = 0;
                        
                        foreach($manufacturers as $manufacturer) :
                            if($manufacturer->product_id == $approved_product->id) :
                                $count++;
                            endif;
                        endforeach;
                    ?>
                <tr>
                    <td><a href="<?php echo base_url();?>products/edit_production/<?php echo $approved_product->id;?>"><?php echo $approved_product->name;?></a></td>
                    <td class="centered"><?php echo $approved_product->product_status;?></td>
                    <td class="centered"><?php echo $approved_product->assigned_to;?></td>
                    
                    <td class="centered"><?php echo $count;?></td>
                    <td class="centered"><?php echo number_format($approved_product->estimated_margin_per_month, 2, '.', ',');?></td>
                    
                    <td class="centered">
                        <?php if($approved_product->approval_status == '1') : ?>
                        <a class="btn btn-info" href="<?php echo base_url();?>products/review/<?php echo $approved_product->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>
                        <?php endif;?>
                        <?php if($approved_product->approval_status == '2') : ?>
                        <a class="btn btn-success" href="<?php echo base_url();?>products/approve/<?php echo $approved_product->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                        <?php endif;?>
                        <?php if($approved_product->approval_status == '3') : ?>
                        <a class="btn btn-warning" href="javascript:void(0);" onclick="confirmReject(<?php echo $approved_product->id;?>);" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="5">There are no approved products at this time.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>

<?php if($approved_products) : ?>
<script>
    $(document).ready(function() {
        $('#MyDT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
    });
</script>
<?php endif;?>