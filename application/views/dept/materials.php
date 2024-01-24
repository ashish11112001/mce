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
                <?php echo anchor('dept/Subjects','<i class="fas fa-plus fa-sm fa-fw text-danger"></i> Subjects', 'class="text-danger" ');?>
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <?php echo anchor('dept/addMaterials','<i class="fas fa-plus fa-sm fa-fw text-danger"></i> Add File', 'class="text-danger" ');?>
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <?php echo anchor('dept/addMaterialsLink','<i class="fas fa-plus fa-sm fa-fw text-danger"></i> Add Link', 'class="text-danger" ');?>
                </div>
            </div>
            <div class="card-body px-2">
                <?php echo $table;?>
            </div>
        </div>
    </div>
</main>