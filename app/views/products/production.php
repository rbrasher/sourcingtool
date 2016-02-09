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
    <!--<a href="<?php //echo base_url();?>products/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Product</a>-->
    
    <!-- Approved Products -->
    <div class="table-responsive">
        <table id="MyDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="centered">Status</th>
                    <th class="centered">Assigned To</th>
                    <th class="centered">Urgency</th>
                    <th class="centered">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($approved_products) : ?>
                <?php foreach($approved_products as $approved_product) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>products/edit/<?php echo $approved_product->id;?>"><?php echo $approved_product->name;?></a></td>
                    <td class="centered"><?php echo $approved_product->product_status;?></td>
                    <td class="centered"><?php echo $approved_product->assigned_to;?></td>
                    <td class="centered"><?php echo $approved_product->confidence_level;?></td>
                    <td class="centered">
                        <!--
                        <a class="btn btn-primary" href="<?php //echo base_url();?>products/edit/<?php //echo $approved_product->id;?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php //echo base_url();?>products/delete/<?php //echo $approved_product->id;?>" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                        -->
                        <?php if($approved_product->approval_status == '1') : ?>
                        <a class="btn btn-info" href="<?php echo base_url();?>products/review/<?php echo $approved_product->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>
                        <?php endif;?>
                        <?php if($approved_product->approval_status == '2') : ?>
                        <a class="btn btn-success" href="<?php echo base_url();?>products/approve/<?php echo $approved_product->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                        <?php endif;?>
                        <?php if($approved_product->approval_status == '3') : ?>
                        <a class="btn btn-warning" href="<?php echo base_url();?>products/unapprove/<?php echo $approved_product->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
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