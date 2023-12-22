<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
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
                        <div class="form-group col-md-4">
                                <label for="academic_year">Academic Year: <span class="text-danger">*</span></label>
                                <?php 
                                    echo form_dropdown('academic_year', $academicYears, $Details->academic_year, 'class="form-control form-control-sm" id="academic_year"'); ?>
                                <?php echo form_error('academic_year', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Select Image: (Max: 2MB) </label>
                                <input type='file' name='files' class="form-control form-control-sm mb-2">
                                <span class="text-danger"><?php echo form_error('files'); ?></span>
                                <?php
                                    if($Details->file_name){
                                            $del = anchor('aicte/editSlider1/'.$Details->id,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                        echo '<li>'.anchor('assets/departments/'.$short_name.'/sliders/'.$Details->file_name, $Details->file_name, 'target="_blank"').'&nbsp;'.$del.'</li>';
                                    }
                                ?>
                           </div>
                         
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update </button>
                        <?php echo anchor('aicte/sliders','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>