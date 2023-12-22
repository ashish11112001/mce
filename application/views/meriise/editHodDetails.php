<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user"'); ?>
                <div class="form-group row">
                    <label for="hod_name" class="col-lg-2 col-form-label text-right font-weight-bold">Name</label>
                    <div class="col-lg-10">
                        <input type="text" id="hod_name" name="hod_name" class="form-control form-control-sm col-lg-8"
                            value="<?php echo (set_value('hod_name'))?set_value('hod_name'):$departmentsDetails->hod_name;?>">
                        <span class="text-danger"><?php echo form_error('hod_name'); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hod_designation" class="col-lg-2 col-form-label text-right font-weight-bold">Designation</label>
                    <div class="col-lg-10">
                        <input type="text" id="hod_designation" name="hod_designation"
                            class="form-control form-control-sm col-lg-8"
                            value="<?php echo (set_value('hod_designation'))?set_value('hod_designation'):$departmentsDetails->hod_designation;?>">
                        <span class="text-danger"><?php echo form_error('hod_designation'); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hod_email" class="col-lg-2 col-form-label text-right font-weight-bold">Email</label>
                    <div class="col-lg-10">
                        <input type="text" id="hod_email" name="hod_email" class="form-control form-control-sm col-lg-8"
                            value="<?php echo (set_value('hod_email'))?set_value('hod_email'):$departmentsDetails->hod_email;?>">
                        <span class="text-danger"><?php echo form_error('hod_email'); ?></span>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="text-uppercase col-lg-2 text-right ">Details</label>
                    <div class="col-lg-10">
                    <textarea id="hod_message" name="hod_message" class="form-control col-lg-8"
                        rows=6><?php echo (set_value('hod_message'))?set_value('hod_message'):$departmentsDetails->hod_message;?></textarea>
                    <script>
                    const messageTextarea = document.querySelector('#hod_message');
                    ClassicEditor
                        .create(messageTextarea)
                        .then(editor => {
                            window.editor = editor
                        });
                    </script>
                    <span class="text-danger"><?php echo form_error('hod_message'); ?></span>
                    </div>
                    
                </div>

                <div class="form-group row mx-3">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('dept/hodDetails','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>