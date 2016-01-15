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
    
    <h1 class="page-header">Products</h1>
    <a href="<?php echo base_url();?>products/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($products) : ?>
                <?php foreach($products as $product) : ?>
                <tr>
                    <td><?php echo $product->id;?></td>
                    <td><?php echo $product->name;?></td>
                    <td><?php echo $product->status;?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>products/edit/<?php echo $product->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>products/delete/<?php echo $product->id;?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="4">No products have been entered.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>