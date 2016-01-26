<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('po_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('po_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('po_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('po_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Purchase Orders</h1>
    <a href="<?php echo base_url();?>po/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add PO</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>PO #</th>
                    <th>PO Amount</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($pos) : ?>
                <?php foreach($pos as $po) : ?>
                <tr>
                    <td><?php echo $po->id;?></td>
                    <td><?php echo $po->product;?></td>
                    <td><?php
                            switch($po->po_status_id) {
                                case 0:
                                    echo 'Unknown';
                                    break;
                                case 1:
                                    echo 'Approved';
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
                    <td>$<?php echo number_format($po->po_amount, 2, '.', ',');?></td>
                    <td><?php echo $po->notes;?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>po/edit/<?php echo $po->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>po/delete/<?php echo $po->id;?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else :?>
                <tr>
                    <td colspan="7">No Purchase Orders have been entered yet.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>