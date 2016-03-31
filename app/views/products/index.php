<script>
    function confirmDelete(id) {
        if(confirm("Are you sure you want to delete this product?") === true) {
            var loc = "<?php echo base_url();?>products/delete/" + id;
            
            //window.location = loc;
            window.open(loc);
        } else {
            console.log('Do not delete.');
        }
    }
    
    function sendForReview(id) {
        if(confirm("Are you sure you want to send this product for Review?") === true) {
            var loc = "<?php echo base_url();?>products/review/" + id;
            
            window.location = loc;
        } else {
            console.log('Do not send for review.');
        }
    }
    
    function confirmApprove(id) {
        if(confirm("Are you sure you want to APPROVE this Product?") === true) {
            var loc = "<?php echo base_url();?>products/approve/" + id;
            
            window.location = loc;
        } else {
            console.log('This is not approved.');
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
    
    <?php if($this->session->flashdata('product_delete_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('product_delete_error');?></p>
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
    
    <h1 class="page-header">R&D Products</h1>
    <a href="<?php echo base_url();?>products/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
    
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#not_approved" aria-controls="not_approved" role="tab" data-toggle="tab">Not Approved</a></li>
            <li role="presentation"><a href="#pending_approval" aria-controls="pending_approval" role="tab" data-toggle="tab">Pending Approval</a></li>
            <li role="presentation"><a href="#not_viable" aria-controls="not_viable" role="tab" data-toggle="tab">Not Viable</a></li>
        </ul>
        
        <div class="tab-content">
            <!-- Not Approved -->
            <div role="tabpanel" class="tab-pane fade in active" id="not_approved">
                <div class="table-responsive" style="margin-top: 20px;">
                    <table id="MyDT" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="centered">Status</th>
                                <th class="centered">Assigned To</th>
                                <th class="centered">Sourcing Due Date</th>
                                <th class="centered"># Manufacturers</th>
                                <th class="centered">Est. Monthly Margin</th>
                                <th class="centered">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($products) : ?>
                            <?php foreach($products as $product) : ?>
                                <?php $count = 0; ?>
                                <?php foreach($manufacturers as $manufacturer) : ?>
                                    <?php 
                                        if($manufacturer->product_id == $product->id) : 
                                            $count++;
                                        endif;
                                    ?>
                                <?php endforeach;?>
                            <tr>
                                <td><a href="<?php echo base_url();?>products/edit/<?php echo $product->id;?>"><?php echo $product->name;?></a></td>
                                <td class="centered"><?php echo $product->product_status;?></td>
                                <td class="centered"><?php echo ucfirst($product->assigned_to);?></td>
                                <td class="centered"><?php echo $product->sourcing_due_date;?></td>
                                <td class="centered"><?php echo $count;?></td>
                                <td class="centered">$<?php echo number_format($product->estimated_margin_per_month, 2, '.', ',');?></td>
                                
                                <td class="centered">
                                    <?php if($product->approval_status == '1') : ?>
                                    <a class="btn btn-info" href="javascript:void(0);" onclick="sendForReview(<?php echo $product->id;?>);" title="Send for Review"><span class="glyphicon glyphicon-share"></span></a>
                                    <!--<a class="btn btn-info" href="<?php //echo base_url();?>products/review/<?php //echo $product->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>-->
                                    <?php endif;?>
                                    <?php if($product->approval_status == '2') : ?>
                                    <a class="btn btn-success" href="<?php echo base_url();?>products/approve/<?php echo $product->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                    <?php endif;?>
                                    <?php if($product->approval_status == '3') : ?>
                                    <a class="btn btn-warning" href="<?php echo base_url();?>products/unapprove/<?php echo $product->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    <?php endif;?>
                                    <a class="btn btn-danger" onclick="confirmDelete(<?php echo $product->id;?>);" href="javascript:void(0);" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php else : ?>
                            <tr>
                                <td colspan="5">No products have been entered.</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Products Pending Approval -->
            <div role="tabpanel" class="tab-pane fade" id="pending_approval">
                <div class="table-responsive" style="margin-top: 20px;">
                    <table id="pendingDT" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="centered">Status</th>
                                <th class="centered">Assigned To</th>
                                <th class="centered">Urgency</th>
                                <th class="centered">Sourcing Due Date</th>
                                <th class="centered">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($pending_products) : ?>
                            <?php foreach($pending_products as $pending_product) : ?>
                            <tr>
                                <td><a href="<?php echo base_url();?>products/edit/<?php echo $pending_product->id;?>"><?php echo $pending_product->name;?></a></td>
                                <td class="centered"><?php echo $pending_product->product_status;?></td>
                                <td class="centered"><?php echo $pending_product->assigned_to;?></td>
                                <td class="centered"><?php echo $pending_product->confidence_level;?></td>
                                <td class="centered"><?php echo $product->sourcing_due_date;?></td>
                                <td class="centered">
                                    <?php if($pending_product->approval_status == '1') : ?>
                                    <a class="btn btn-info" href="<?php echo base_url();?>products/review/<?php echo $pending_product->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>
                                    <?php endif;?>
                                    <?php if($pending_product->approval_status == '2') : ?>
                                    <a class="btn btn-success" href="javascript:void(0);" onclick="confirmApprove(<?php echo $pending_product->id;?>);" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                    <!--
                                    <a class="btn btn-success" href="<?php //echo base_url();?>products/approve/<?php //echo $pending_product->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                    -->
                                    <?php endif;?>
                                    <?php if($pending_product->approval_status == '3') : ?>
                                    <a class="btn btn-warning" href="<?php echo base_url();?>products/unapprove/<?php echo $pending_product->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php else : ?>
                            <tr>
                                <td colspan="6" class="centered">There are no products pending approval at this time.</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Not Viable -->
            <div role="tabpanel" class="tab-pane fade" id="not_viable">
                <div class="table-responsive" style="margin-top: 20px;">
                    <table id="not_viable_DT" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="centered">Status</th>
                                <th class="centered">Assigned To</th>
                                <th class="centered">Sourcing Due Date</th>
                                <th class="centered"># Manufacturers</th>
                                <th class="centered">Est. Monthly Margin</th>
                                <th class="centered">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($not_viable_products) : ?>
                            <?php foreach($not_viable_products as $nvp) : ?>
                                <?php $count = 0; ?>
                                <?php foreach($manufacturers as $manufacturer) : ?>
                                    <?php 
                                        if($manufacturer->product_id == $nvp->id) : 
                                            $count++;
                                        endif;
                                    ?>
                                <?php endforeach;?>
                            <tr>
                                <td><a href="<?php echo base_url();?>products/edit/<?php echo $nvp->id;?>"><?php echo $nvp->name;?></a></td>
                                <td class="centered"><?php echo $nvp->product_status;?></td>
                                <td class="centered"><?php echo ucfirst($nvp->assigned_to);?></td>
                                <td class="centered"><?php echo $nvp->sourcing_due_date;?></td>
                                <td class="centered"><?php echo $count;?></td>
                                <td class="centered">$<?php echo number_format($nvp->estimated_margin_per_month, 2, '.', ',');?></td>
                                
                                <td class="centered">
                                    <?php if($nvp->approval_status == '1') : ?>
                                    <a class="btn btn-info" href="javascript:void(0);" onclick="sendForReview(<?php echo $nvp->id;?>);" title="Send for Review"><span class="glyphicon glyphicon-share"></span></a>
                                    <!--<a class="btn btn-info" href="<?php //echo base_url();?>products/review/<?php //echo $product->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>-->
                                    <?php endif;?>
                                    <?php if($nvp->approval_status == '2') : ?>
                                    <a class="btn btn-success" href="<?php echo base_url();?>products/approve/<?php echo $nvp->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                                    <?php endif;?>
                                    <?php if($nvp->approval_status == '3') : ?>
                                    <a class="btn btn-warning" href="<?php echo base_url();?>products/unapprove/<?php echo $nvp->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    <?php endif;?>
                                    <a class="btn btn-danger" onclick="confirmDelete(<?php echo $nvp->id;?>);" href="javascript:void(0);" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php else : ?>
                            <tr>
                                <td colspan="7" class="centered">There are not non-viable products at this time.</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#MyDT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
        
        <?php if($pending_products) : ?>
        $('#pendingDT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
        <?php endif;?>
            
        <?php if($not_viable_products) : ?>
        $('#not_viable_DT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
        <?php endif;?>
    });
</script>