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
                    <?php echo anchor('dept/addSlider','<i class="fas fa-plus fa-sm fa-fw text-danger"></i> Add New', 'class="text-danger" ');?>
                </div>
            </div>
            <div class="card-body px-2">
                <div class="table-responsive">
                    <?php echo $table;?>
                </div>
            </div>
        </div>
    </div>
</main>