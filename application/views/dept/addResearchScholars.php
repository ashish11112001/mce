<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user"'); ?>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Guide Name</label>
                                <input type="text" name="guide_name" id="guide_name"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('guide_name'))?set_value('guide_name'):$guide_name;?>">
                                <?php echo form_error('guide_name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Student Name</label>
                                <input type="text" name="student_name" id="student_name"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('student_name'))?set_value('student_name'):$student_name;?>">
                                <?php echo form_error('student_name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Field of Study</label>
                                <textarea name="field_of_study" id="field_of_study" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('field_of_study'))?set_value('field_of_study'):$field_of_study;?></textarea>
                                <?php echo form_error('field_of_study', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Admission Year</label>
                                <?php
                                    $years = array(" " => "Select");
                                    for($i = 1970; $i<=date("Y"); $i++){
                                        $years[$i] = $i;
                                    }
                                    echo form_dropdown('year', $years, set_value('year', $year),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('year', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Scholar Type</label>
                                <?php
                                    $scholar_type_options = array(" " => "Select", "1" => "Part Time", "2" => "Full Time");
                                    echo form_dropdown('scholar_type', $scholar_type_options, set_value('scholar_type', $scholar_type),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('scholar_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Research Type</label>
                                <?php
                                    $research_type_options = array(" " => "Select", "1" => "Ph.D", "2" => "M.Sc (Engg by Research)");
                                    echo form_dropdown('research_type', $research_type_options, set_value('research_type', $research_type),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('research_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchScholars','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>