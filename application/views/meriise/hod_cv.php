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
                    $cv = null;
                    $cv_path = 'assets/departments/'.$short_name.'/CV/HOD.pdf';
                    if (file_exists($cv_path)) {
                        $cv = base_url().$cv_path;
                    } 
                ?>
                <?php echo form_open($action, 'class="user"  enctype="multipart/form-data"'); ?>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label >Select HOD CV: (Maximum upload PDF file size:10MB) </label>
                                <input type='file' name='files' id='files' class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('files'); ?></span>

                                <ul class="mt-3">
                                    <?php
                                        // if(!$files){
                                        //     $fileNames = unserialize($files);
                                        //     foreach($fileNames as $key => $value){
                                        //         $del = anchor('dept/deleteSyllabus/'.$eid.'/'.$key,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                        //         echo '<li>'.anchor('assets/departments/'.$short_name.'/syllabus/'.$value, $value, 'target="_blank"').'&nbsp;'.$del.'</li>';
                                        //     }
                                        // }
                                    ?>
                                </ul>

                            </div>
                             
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> Upload </button>
                                <?php echo anchor('dept/hodDetails','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>