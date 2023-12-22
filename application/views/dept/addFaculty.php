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
                                <label for="name">Faculty Name:</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm"
                                    value="<?php echo (set_value('name'))?set_value('name'):'';?>">
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="experience">Designation:</label>
                                <?php echo form_dropdown('designation_id', $designationType, '', 'class="form-control form-control-sm" id="designation_id"'); ?>
                                <?php echo form_error('designation_id', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="designation" class="pl-2">Additional Designation:</label>
                                <div class="row  pl-5">
                                    <div class="custom-control custom-checkbox mb-3 col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="isHOD" name="isHOD">
                                        <label class="custom-control-label" for="isHOD">is HOD</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3 col-md-4">
                                        <input type="checkbox" class="custom-control-input ml-20" id="isPrincipal"
                                            name="isPrincipal">
                                        <label class="custom-control-label ml-20" for="isPrincipal">is Principal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3 col-md-5">
                                        <input type="checkbox" class="custom-control-input" id="isVicePrincipal"
                                            name="isVicePrincipal">
                                        <label class="custom-control-label" for="isVicePrincipal">is
                                            Vice-Principal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="experience">Staff Type:</label>
                                <?php echo form_dropdown('staff_type', $staffType, '', 'class="form-control form-control-sm" id="staff_type"'); ?>
                                <?php echo form_error('staff_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="qualification">Qualification:</label>
                                <input type="text" name="qualification" id="qualification" class="form-control form-control-sm"
                                    value="<?php echo (set_value('qualification'))?set_value('qualification'):'';?>">
                                <?php echo form_error('qualification', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="specialization">Specialization:</label>
                                <input type="text" name="specialization" id="specialization" class="form-control form-control-sm"
                                    value="<?php echo (set_value('specialization'))?set_value('specialization'):'';?>">
                                <?php echo form_error('specialization', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm"
                                    value="<?php echo (set_value('email'))?set_value('email'):'';?>">
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intake">Mobile:</label>
                                <input type="text" name="mobile" id="mobile" class="form-control form-control-sm"
                                    value="<?php echo (set_value('mobile'))?set_value('mobile'):'';?>">
                                <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Add</button>
                        <?php echo anchor('dept/faculty','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>