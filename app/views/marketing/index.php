<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('marketing_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('marketing_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('marketing_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('marketing_deleted');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Marketing</h1>
    <a href="<?php echo base_url();?>marketing/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Marketing</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="centered">Seller Central Ad</th>
                    <th class="centered">AMS Ad</th>
                    <th class="centered">Marketing Lander</th>
                    <th class="centered">Keywords</th>
                    <th class="centered">Adwords</th>
                    <th class="centered">Notes</th>
                    <th class="centered">Promo Codes</th>
                    <!--<th class="centered">Actions</th>-->
                </tr>
            </thead>
            <tbody>
                <?php if($marketing) : ?>
                <?php foreach($marketing as $m) : ?>
                <tr>
                    <td><a href="<?php echo base_url();?>marketing/edit/<?php echo $m->id;?>"><?php echo $m->product_name;?></a></td>
                    <td class="centered"><?php echo $m->seller_central_ad;?></td>
                    <td class="centered"><?php echo $m->ams_ad;?></td>
                    <td class="centered"><?php echo $m->marketing_lander;?></td>
                    <td><?php echo $m->keywords;?></td>
                    <td><?php echo $m->adwords;?></td>
                    <td><?php echo $m->notes;?></td>
                    <td class="centered"><a href=<?php echo base_url();?>documents/promo_codes/<?php echo $m->promo_codes;?>><?php echo $m->promo_codes;?></a></td>
                    <!--
                    <td class="centered">
                        <a class="btn btn-primary" href="<?php //echo base_url();?>marketing/edit/<?php //echo $m->id;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-danger" href="<?php //echo base_url();?>marketing/delete/<?php echo $m->id;?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    -->
                </tr>
                <?php endforeach;?>
                <?php else : ?>
                <tr>
                    <td colspan="8" class="centered">No Marketing Info has been entered yet.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
