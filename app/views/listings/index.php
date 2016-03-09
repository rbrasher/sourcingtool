<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('listing_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('listing_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('listing_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('listing_deleted');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('listing_approved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('listing_approved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('listing_rejected')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('listing_rejected');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Listings</h1>
    <a href="<?php echo base_url();?>listings/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Listing</a>
    
    <div class="table-responsive">
        <table id="MyDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="centered">Title</th>
                    <th class="centered">Credibility Site</th>
                    <th class="centered">Approval Status</th>
                    <th class="centered">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($listings) : ?>
                <?php foreach($listings as $listing) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>listings/edit/<?php echo $listing->id;?>"><?php echo $listing->product_name;?></a></td>
                    <td class="centered"><?php echo $listing->title;?></td>
                    <td class="centered"><a href="<?php echo $listing->credibility_site;?>" target="_blank"><?php echo $listing->credibility_site;?></a></td>
                    <td class="centered"><?php echo $listing->approval;?></td>
                    <td class="centered">
                        <a class="btn btn-default" href="<?php echo base_url();?>listings/amazonPreview/<?php echo $listing->id;?>" title="Amazon Preview" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <?php if($listing->approval_status == '1') : ?>
                        <a class="btn btn-info" href="<?php echo base_url();?>listings/review/<?php echo $listing->id;?>" title="Review" target="_blank"><span class="glyphicon glyphicon-share"></span></a>
                        <?php endif;?>
                        <?php if($listing->approval_status == '2') : ?>
                        <a class="btn btn-success" href="<?php echo base_url();?>listings/approve/<?php echo $listing->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                        <?php endif;?>
                        <?php if($listing->approval_status == '3') : ?>
                        <a class="btn btn-warning" href="<?php echo base_url();?>listings/unapprove/<?php echo $listing->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        <?php endif;?>
                        <!--
                        <a class="btn btn-danger" href="<?php //echo base_url();?>listings/delete/<?php //echo $listing->id;?>"><span class="glyphicon glyphicon-trash"></span></a>
                        -->
                    </td>    
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td class="centered" colspan="4">No Listings have been entered yet.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
<?php if($listings) : ?>
<script>
    $(document).ready(function() {
        $('#MyDT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
    });
</script>
<?php endif;?>