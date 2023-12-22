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
            </div>
            <div class="card-body">
                <?php
                    $img = 'assets/departments/'.$short_name.'/faculty/HOD.jpg';
                    if (file_exists($img)) {
                        $img = base_url().$img;
                    } else {
                        $img = base_url().'assets/departments/avatar.jpg';
                    }
                ?>
                <div class="form-group row">
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4 text-center">
                        <?=form_open_multipart('dept/hod_upload_pic')?>
                        <img src="<?=$img;?>" class="img-responsive" id="img_upload"
                            style="height:200px;border:1px solid #afafaf;">
                        <h6 class="small text-warning mt-2">Note: Max Width x Height is 200 X 200 px and Only JPEG/JPG
                            image type is allowed</h6>
                        <p id="res" class="text-danger"></p>
                        <input type="file" class="form-control" name="logo" id="logo">

                        <button class="btn btn-sm btn-primary mt-2" type="submit" id="pic" disabled><i
                                class="fa fa-check-square-o"></i> Upload Photo</button>
                                <?php echo anchor('dept/hodDetails','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-danger btn-sm mt-2"'); ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>