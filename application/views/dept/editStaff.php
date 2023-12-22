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
                                <label for="name">Staff Name:</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('name'))?set_value('name'):$Staff->name;?>">
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="designation">Designation:</label>
                                <input type="text" name="designation" id="designation"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('designation'))?set_value('designation'):$Staff->designation;?>">
                                <?php echo form_error('designation', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="experience">Experience (in Yrs):</label>
                                <input type="text" name="experience" id="experience" class="form-control form-control-sm"
                                    value="<?php echo (set_value('experience'))?set_value('experience'):$Staff->experience
                                    ;?>">
                                <?php echo form_error('experience', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('email'))?set_value('email'):$Staff->email;?>">
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intake">Mobile:</label>
                                <input type="text" name="mobile" id="mobile" class="form-control form-control-sm"
                                    value="<?php echo (set_value('mobile'))?set_value('mobile'):$Staff->mobile;?>">
                                <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intake">Priority Order:</label>
                                <input type="number" name="priority_order" id="priority_order" min="0" class="form-control form-control-sm"
                                    value="<?php echo (set_value('priority_order'))?set_value('priority_order'):$Staff->priority_order;?>">
                                <?php echo form_error('priority_order', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('dept/staff','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>