<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('manufacturer_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('manufacturer_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('manufacturer_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('manufacturer_deleted');?></p>
    </div>
    <?php endif;?>

    <h1 class="page-header">Manufacturers</h1>
    <a href="<?php echo base_url();?>manufacturers/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Manufacturer</a>
    
    <div class="table-responsive">
        <!--<table class="table table-striped">-->
        <table id="MyDT" class="display table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Email</th>
                    <th>Contact Info</th>
                    <th>Owner</th>
                    <!--<th>Actions</th>-->
                </tr>
            </thead>
            <tbody>
                <?php if($manufacturers) : ?>
                <?php foreach($manufacturers as $manufacturer) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>manufacturers/edit/<?php echo $manufacturer->id;?>"><?php echo $manufacturer->name;?></a></td>
                    <td><?php echo $manufacturer->product_name;?></td>
                    <td><?php echo $manufacturer->email_address;?></td>
                    <td><?php echo $manufacturer->contact_info;?></td>
                    <td><?php echo $manufacturer->owner;?></td>
                    <!--
                    <td>
                        <a class="btn btn-primary" href="<?php //echo base_url();?>manufacturers/edit/<?php //echo $manufacturer->id;?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php //echo base_url();?>manufacturers/delete/<?php //echo $manufacturer->id;?>" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    -->
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="5">No Manufacturers have been set up.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#MyDT').DataTable({
            "autoWidth": false,
            "paging": false,
            //"ordering": false
        });
    });
</script>