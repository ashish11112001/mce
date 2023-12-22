<main id="main-container">
    <div class="content">

        <?php if($this->session->flashdata('message')){?>
        <div class="alert <?=$this->session->flashdata('status');?>" id="msg">
            <p class="mb-0"><?php echo $this->session->flashdata('message')?></p>
        </div>
        <?php } ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
                <div class="dropdown no-arrow">
                    <?php echo anchor('meriise/editcms/','<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Update', 'class="text-danger" ');?>
                </div>
            </div>
            <div class="card-body px-5">
            <div class="form-group text-justify">
                    <label class="col-form-label text-right font-weight-bold">About NAIN : </label>
                    <?php echo $departmentsDetails->nain;?>
                </div>
                <div class="form-group text-justify">
                    <label class="col-form-label text-right font-weight-bold">About UBA : </label>
                    <?php echo $departmentsDetails->uba;?>
                </div>
                <div class="form-group text-justify">
                    <label class="col-form-label text-right font-weight-bold">Infrastructure : </label>
                    <iframe width="300" height="150" src="<?php echo $departmentsDetails->infrastructure;?>" frameborder="0"  allowfullscreen></iframe>   
                </div>
            
            </div>
        </div>
    </div>
</main>