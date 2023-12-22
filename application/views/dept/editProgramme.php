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
                            <div class="form-group col-md-4">
                                <label for="course_type">Type:</label>
                                <?php echo form_dropdown('course_type', $courseTypes, set_value('course_type', $Programme->course_type),'class="form-control form-control-sm"');  ?>
                                <?php echo form_error('course_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="yearOfApproval">Year of Approval:</label>
                                <input type="text" name="year_of_approval" id="year_of_approval"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('year_of_approval'))?set_value('year_of_approval'):$Programme->year_of_approval;?>">
                                <?php echo form_error('year_of_approval', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intake">Intake:</label>
                                <input type="text" name="intake" id="intake" class="form-control form-control-sm"
                                    value="<?php echo (set_value('intake'))?set_value('intake'):$Programme->intake;?>">
                                <?php echo form_error('intake', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="course_name">Course Name:</label>
                                <input type="text" name="course_name" id="course_name"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('course_name'))?set_value('course_name'):$Programme->course_name;?>">
                                <?php echo form_error('course_name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="accreditations">Accreditation:</label>
                                <textarea name="accreditations" id="accreditations" class="form-control"
                                    rows="5"><?php echo (set_value('accreditations'))?set_value('accreditations'):$Programme->accreditations;?></textarea>
                                <?php echo form_error('accreditations', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="collaborations">Collaborations:</label>
                                <textarea name="collaborations" id="collaborations" class="form-control"
                                    rows="5"><?php echo (set_value('collaborations'))?set_value('collaborations'):$Programme->collaborations;?></textarea>
                                <?php echo form_error('collaborations', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="memberships">Memberships:</label>
                                <textarea name="memberships" id="memberships" class="form-control"
                                    rows="5"><?php echo (set_value('memberships'))?set_value('memberships'):$Programme->memberships;?></textarea>
                                <?php echo form_error('memberships', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update </button>
                        <?php echo anchor('dept/viewProgramme/'.$Programme->id,'<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>