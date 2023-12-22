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
            <?php
                $url = glob('./assets/departments/'.$short_name.'/faculty/profile_'.$Faculty->id.'-*.jpg');
                if($url){
                    if (file_exists($url[0])) {
                        $profile_pic = base_url().$url[0];
                    }else {
                        $profile_pic = base_url()."assets/departments/avatar.jpg";
                    }	
                }else {
                    $profile_pic = base_url()."assets/departments/avatar.jpg";
                }
            ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo '<img src="'.$profile_pic.'" class="img-thumbnail pic200">'; ?>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <th width="25%">Name:</th>
                                        <td width="75%"><?php echo $Faculty->name; ?></td>
                                    </tr>
                                  
                                    <tr>
                                        <th>Qualification:</th>
                                        <td><?php echo $Faculty->qualification; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Specialization:</th>
                                        <td><?php echo $Faculty->specialization; ?></td>
                                    </tr>
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('meriise/editFaculty/'.$Faculty->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('meriise/FacultyProfilePic/'.$Faculty->id,'<i class="fas fa-image fa-sm fa-fw"></i> Profile Pic', 'data-toggle="modal" data-target="#profileUpload" style="cursor: pointer;" class="btn btn-success btn-sm" '); ?>
                <!--<?php echo anchor('meriise/updateProfile/'.$Faculty->id,'<i class="fas fa-file"></i> Update Profile', 'class="btn btn-warning btn-sm" '); ?>-->
                <?php echo anchor('meriise/deleteFaculty/'.$Faculty->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>

            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('meriise/faculty','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="profileUpload" tabindex="-1" role="dialog" aria-labelledby="profileUpload"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <?=form_open_multipart('meriise/faculty_upload_pic')?>
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"> Profile Pic Upload</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-8 offset-2 text-center">
                            <small>Only JPEG/JPG image type is allowed</small>
                            <img src="<?=$profile_pic;?>" class="img-responsive" id="img_upload"
                                style="height:200px;border:1px solid #afafaf;">
                            <p id="res" class="text-danger"></p>
                            <input type="file" class="form-control" name="logo" id="logo">
                            <input type="hidden" class="form-control" name="faculty_id" id="faculty_id" value="<?=$Faculty->id;?>">
                            <small class="text-warning">Allows max size: 200px X 200px</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: 20px;">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit" id="pic" disabled><i
                        class="fa fa-check-square-o"></i> Upload</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    // Profile pic Upload jQuery Code
    $("#logo").change(function() {
        var img = document.getElementById('logo');

        readIMG(this);

        var _URL = window.URL || window.webkitURL;
        var image, logo;
        if ((logo = this.files[0])) {
            image = new Image();
            image.onload = function() {
                var width = this.width;
                var height = this.height;

                if (width <= 200 && height <= 200) {
                    $("#res").html("");
                    $("#pic").prop('disabled', false);
                } else {
                    $("#res").html("Uploaded image exceeds size limit..!!");
                    $("#pic").prop('disabled', true);
                }
            };
            image.src = _URL.createObjectURL(logo);
        }
    });

    $("#pic").prop('disabled', true);
    $("#logo").change(function() {
        var file = $("#logo").val();
        if (file != '')
            $("#pic").prop('disabled', false);
        else $("#pic").prop('disabled', true);
    });
});

// Profile pic upload JS Code
function readIMG(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#img_upload').attr('src', '<?=base_url();?>assets/departments/avatar.jpg');
        $("#res").html("");
    }
}
</script>