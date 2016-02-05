<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('shipping_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('shipping_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('shipping_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('shipping_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Shipping</h1>
    <a href="<?php echo base_url();?>shipping/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Shipping</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="centered">Ship Method</th>
                    <th class="centered">Company</th>
                    <th class="centered">Shipping Company</th>
                    <th class="centered">Tracking #</th>
                    <th class="centered">Est Arrival Date</th>
                    <th class="centered">Notes</th>
                    <!--<th class="centered">Actions</th>-->
                </tr>
            </thead>
            <tbody>
                <?php if($shipping) : ?>
                <?php foreach($shipping as $s) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>shipping/edit/<?php echo $s->id;?>"><?php echo $s->product_name;?></a></td>
                    <td class="centered">
                        <?php
                            if($s->ship_method == 1) {
                                echo 'Air';
                            } elseif($s->ship_method == 2) {
                                echo 'Sea';
                            } else {
                                echo $s->ship_method;
                            };
                        ?>
                    </td>
                    <td class="centered"><?php echo $s->company;?></td>
                    <td class="centered"><?php echo $s->shipping_company;?></td>
                    <td class="centered"><?php echo $s->tracking_number;?></td>
                    <td class="centered"><?php echo $s->estimated_arrival_date;?></td>
                    <td class="centered"><?php echo $s->notes;?></td>
                    <!--
                    <td class="centered">
                        <a class="btn btn-primary" href="<?php //echo base_url();?>shipping/edit/<?php //echo $s->id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php //echo base_url();?>shipping/delete/<?php //echo $s->id;?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    -->
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="7" class="centered">No Shipping Info has been added yet.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>