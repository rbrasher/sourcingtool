<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('concept_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_saved');?></p>
    </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('concept_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Concepts</h1>
    <a href="<?php echo base_url();?>concepts/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Concept</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th width="70">#</th>-->
                    <th style="text-align: center;">Product</th>
                    <th style="text-align: center;">Listing Mock</th>
                    <th style="text-align: center;">Box Art Work</th>
                    <th style="text-align: center;">Instruction Manual</th>
                    <th style="text-align: center;">Product Design</th>
                    <th style="text-align: center;">Brand</th>
                    <th style="text-align: center;">UPC</th>
                    <th style="text-align: center;">Domain</th>
                    <th style="text-align: center;">Notes</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($concepts) : ?>
                <?php foreach($concepts as $concept) : ?>
                <tr>
                    <!--<td><?php //echo $concept->id;?></td>-->
                    <td>
                        <?php 
                            foreach($products as $product) :
                                if($product->id == $concept->product_id) {
                                    echo $product->name;
                                }
                            endforeach;
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach($approval_statuses as $status) :
                                if($concept->listing_mock == $status->id) {
                                    echo $status->approval_status;
                                }
                            endforeach;
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach($approval_statuses as $status) :
                                if($concept->box_art_work == $status->id) {
                                    echo $status->approval_status;
                                }
                            endforeach;
                        ?>
                    </td>
                    <td><?php echo $concept->instruction_manual;?></td>
                    <td><?php echo $concept->product_design;?></td>
                    <td><?php echo $concept->brand;?></td>
                    <td><?php echo $concept->upc;?></td>
                    <td><?php echo $concept->domain;?></td>
                    <td><?php echo $concept->notes;?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>concepts/edit/<?php echo $concept->id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>concepts/delete/<?php echo $concept->id;?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="11" style="text-align: center;">No Concepts have been set up yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
</div>
