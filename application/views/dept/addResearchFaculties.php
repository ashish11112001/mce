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
                                <label>Faculty Name</label>
                                <input type="text" name="faculty_name" id="faculty_name"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('faculty_name'))?set_value('faculty_name'):$faculty_name;?>">
                                <?php echo form_error('faculty_name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Research Area</label>
                                <input type="text" name="research_area" id="research_area"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('research_area'))?set_value('research_area'):$research_area;?>">
                                <?php echo form_error('research_area', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Awarded University</label>
                                <input type="text" name="university" id="university"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('university'))?set_value('university'):$university;?>">
                                <?php echo form_error('university', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Year of Award</label>
                                <?php
                                    $years = array(" " => "Select");
                                    for($i = 1970; $i<=date("Y"); $i++){
                                        $years[$i] = $i;
                                    }
                                    echo form_dropdown('year_of_award', $years, set_value('year_of_award', $year_of_award),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('year_of_award', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-8 mt-4 text-right">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchFaculties','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>