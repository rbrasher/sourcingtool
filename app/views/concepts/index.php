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
    
    <?php if($this->session->flashdata('concept_approved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_approved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('concept_rejected')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('concept_rejected');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Concepts</h1>
    <a href="<?php echo base_url();?>concepts/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Concept</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th width="70">#</th>-->
                    <th class="centered">Product</th>
                    <th class="centered">Listing Mock</th>
                    <th class="centered">Box Art Work</th>
                    <th class="centered">Instruction Manual</th>
                    <th class="centered">Product Design</th>
                    <th class="centered">Brand</th>
                    <th class="centered">UPC</th>
                    <th class="centered">Domain</th>
                    <th class="centered">Notes</th>
                    <th class="centered">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($concepts) : ?>
                <?php foreach($concepts as $concept) : ?>
                <tr>
                    <!--<td><?php //echo $concept->id;?></td>-->
                    <td><a href="<?php echo base_url();?>concepts/edit/<?php echo $concept->id;?>">
                        <?php 
                            foreach($products as $product) :
                                if($product->id == $concept->product_id) {
                                    echo $product->name;
                                }
                            endforeach;
                        ?>
                        </a>
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
                    <td><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->instruction_manual;?>" target="_blank"><?php echo $concept->instruction_manual;?></a></td>
                    <td><a href="<?php echo base_url();?>documents/concepts/<?php echo $concept->product_design;?>" target="_blank"><?php echo $concept->product_design;?></a></td>
                    <td><?php echo $concept->brand;?></td>
                    <td><?php echo $concept->upc;?></td>
                    <td><a href="<?php echo $concept->domain;?>" target="_blank"><?php echo $concept->domain;?></a></td>
                    <td><?php echo $concept->notes;?></td>
                    <td>
                        <!--
                        <a class="btn btn-primary" href="<?php //echo base_url();?>concepts/edit/<?php //echo $concept->id;?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        -->
                        <a class="btn btn-danger" href="<?php echo base_url();?>concepts/delete/<?php echo $concept->id;?>" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                        
                        <?php if($concept->approval_status == '1') : ?>
                        <a class="btn btn-success" href="<?php echo base_url();?>concepts/approve/<?php echo $concept->id;?>" title="Approve"><span class="glyphicon glyphicon-ok-circle"></span></a>
                        <?php elseif($concept->approval_status == '3') : ?>
                        <a class="btn btn-warning" href="<?php echo base_url();?>concepts/unapprove/<?php echo $concept->id;?>" title="Reject"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="11" class="centered">No Concepts have been set up yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
</div>
