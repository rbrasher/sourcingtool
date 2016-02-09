<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('legal_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('legal_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('legal_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('legal_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Legal</h1>
    <a href="<?php echo base_url();?>legal/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span>Add Legal</a>
    
    <div class="table-responsive">
        <table id="MyDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="centered">Box PC</th>
                    <th class="centered">LLC</th>
                    <th class="centered">Credit Card</th>
                    <th class="centered">Bank Account</th>
                    <th class="centered">Amazon Account</th>
                    <th class="centered">Special Conditions</th>
                    <th class="centered">Phone #</th>
                    <th class="centered">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($legal) : ?>
                <?php foreach($legal as $l) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>legal/edit/<?php echo $l->id;?>"><?php echo $l->product_name;?></a></td>
                    <td class="centered"><?php echo $l->box_pc;?></td>
                    <td class="centered"><?php echo $l->llc;?></td>
                    <td class="centered"><?php echo $l->credit_card;?></td>
                    <td class="centered"><?php echo $l->bank_account;?></td>
                    <td class="centered"><?php echo $l->amazon_account;?></td>
                    <td class="centered"><?php echo $l->special_conditions;?></td>
                    <td class="centered"><?php echo $l->phone_number;?></td>
                    <!--
                    <td class="centered">
                        <a class="btn btn-primary" href="<?php //echo base_url();?>legal/edit/<?php //echo $l->id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php //echo base_url();?>legal/delete/<?php //echo $l->id;?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    -->
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="8" class="centered">No Legal Info has been entered.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>

<?php if($legal) : ?>
<script>
    $(document).ready(function() {
        $('#MyDT').DataTable({
            "autoWidth": false,
            "paging": false,
        });
    });
</script>
<?php endif;?>