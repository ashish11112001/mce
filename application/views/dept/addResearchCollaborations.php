<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user"  enctype="multipart/form-data"'); ?>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Collaboration / MoU Title:</label>
                                <textarea name="title" id="title" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('title'))?set_value('title'):$title;?></textarea>
                                <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description:</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('description'))?set_value('description'):$description;?></textarea>
                                <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Select Attachments: (Max: 30MB) </label>
                                <input type='file' name='files[]' multiple="" class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('files'); ?></span>

                                <?php if($btn_name == "Edit"){ ?>
                                <ul class="mt-3">
                                    <?php
                                        if($files){
                                            $fileNames = unserialize($files);
                                            foreach($fileNames as $key => $value){
                                                $del = anchor('dept/deleteResearchCollaborationsFile/'.$eid.'/'.$key,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                                echo '<li>'.anchor('assets/departments/'.$short_name.'/research/'.$value, $value, 'target="_blank"').'&nbsp;'.$del.'</li>';
                                            }
                                        }
                                    ?>
                                </ul>
                                <?php } ?>

                            </div>
                            <div class="form-group col-md-12">
                                <label>Reference Weblink:</label>
                                <input type="text" name="link" id="link"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('link'))?set_value('link'):$link;?>">
                                <?php echo form_error('link', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchCollaborations','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>