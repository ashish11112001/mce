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
                <?php 
                    echo anchor('dept/addAlbumImage/'.$album_id,'<i class="fas fa-plus fa-sm fa-fw"></i> Add New', 'class="btn btn-primary btn-sm"');
                    echo anchor('dept/albums','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-danger btn-sm ml-2" ');
                ?>
                </div>
            </div>
            <div class="card-body px-2">
                <?php echo $table;?>
            </div>
        </div>
    </div>
</main>