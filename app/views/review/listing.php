<script>
    $(document).ready(function() {
        
        $('#approve').click(function(e) {
            e.preventDefault();
            
            $.post("<?php echo base_url();?>listings/approve/<?php echo $listing->id;?>", function(status){
                window.close();
            });
        });
        
        $('#reject').click(function(e) {
            e.preventDefault();
            
            $.post("<?php echo base_url();?>listings/unapprove/<?php echo $listing->id;?>", function(status){
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
                    <td><span style="font-weight: bold;float: left; width: 200px;">Product:</span> <?php echo $listing->product_name;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Title:</span> <?php echo $listing->title;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Description:</span> <?php echo $listing->product_description;?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Bullets:</span> <?php echo $listing->bullets; ?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Notes:</span> <?php echo $listing->notes; ?></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Credibility Site:</span> <a href="<?php echo $listing->credibility_site;?>" target="_blank"><?php echo $listing->credibility_site; ?></a></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold;float: left; width: 200px;">Listing Image:</span> <img src="<?php echo base_url();?>documents/listings/listing_images/<?php echo $listing->listing_image;?>" /></td>
                </tr>
                
                <?php $images = explode('|', $listing->secondary_images); ?>
                <tr>
                    <td>
                        <span style="font-weight: bold;float: left; width: 200px;">Secondary Images:</span><br />
                        <?php foreach($images as $image) : ?>
                            <img style="border:1px solid red; margin-bottom: 20px;" class="scale-with-grid" src="<?php echo base_url();?>documents/listings/listing_images/<?php echo $image;?>" /><br />
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-4">
            <div class="btn-group">
                <a href="javascript:void(0);" id="approve" class="btn btn-success">Approve</a>
                <a href="javascript:void(0);" id="reject" class="btn btn-danger">Reject</a>
            </div>
        </div>
    </div>
</div>