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
                                    value="<?php echo (set_value('name'))?set_value('name'):$Faculty->name;?>">
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="experience">Designation:</label>
                                <?php echo form_dropdown('designation_id', $designationType, $Faculty->designation_id, 'class="form-control form-control-sm" id="designation_id"'); ?>
                                <?php echo form_error('designation_id', '<div class="error">', '</div>'); ?>
                            </div>
                     
                            <div class="form-group col-md-6">
                                <label for="experience">Staff Type:</label>
                                <?php echo form_dropdown('staff_type', $staffType, $Faculty->staff_type, 'class="form-control form-control-sm" id="staff_type"'); ?>
                                <?php echo form_error('staff_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="qualification">Qualification:</label>
                                <input type="text" name="qualification" id="qualification" class="form-control form-control-sm"
                                    value="<?php echo (set_value('qualification'))?set_value('qualification'):$Faculty->qualification;?>">
                                <?php echo form_error('qualification', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="specialization">Specialization:</label>
                                <input type="text" name="specialization" id="specialization" class="form-control form-control-sm"
                                    value="<?php echo (set_value('specialization'))?set_value('specialization'):$Faculty->specialization;?>">
                                <?php echo form_error('specialization', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm"
                                    value="<?php echo (set_value('email'))?set_value('email'):$Faculty->email;?>">
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intake">Mobile:</label>
                                <input type="text" name="mobile" id="mobile" class="form-control form-control-sm"
                                    value="<?php echo (set_value('mobile'))?set_value('mobile'):$Faculty->mobile;?>">
                                <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="additional">Additional Responsibility:</label>
                                <input type="text" name="additional" id="additional" class="form-control form-control-sm"
                                    value="<?php echo (set_value('additional'))?set_value('additional'):$Faculty->additional;?>">
                                <?php echo form_error('additional', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intake">Research Interest:</label>
                                <input type="text" name="research" id="research" class="form-control form-control-sm"
                                    value="<?php echo (set_value('research'))?set_value('research'):$Faculty->research;?>">
                                <?php echo form_error('research', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Google Scholar Link:</label>
                                <input type="text" name="google" id="google" class="form-control form-control-sm"
                                    value="<?php echo (set_value('google'))?set_value('google'):$Faculty->google;?>">
                                <?php echo form_error('google', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intake">IRINS link:</label>
                                <input type="text" name="irins" id="irins" class="form-control form-control-sm"
                                    value="<?php echo (set_value('irins'))?set_value('irins'):$Faculty->irins;?>">
                                <?php echo form_error('irins', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="additional">Faculty ID:</label>
                                <input type="text" name="faculty" id="faculty" class="form-control form-control-sm"
                                    value="<?php echo (set_value('faculty'))?set_value('faculty'):$Faculty->faculty;?>">
                                <?php echo form_error('faculty', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intake">Date of Join:</label>
                                <input type="date" name="doj" id="doj" class="form-control form-control-sm"
                                    value="<?php echo (set_value('doj'))?set_value('doj'):$Faculty->doj;?>">
                                <?php echo form_error('doj', '<div class="error">', '</div>'); ?>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('faculty/profile','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>