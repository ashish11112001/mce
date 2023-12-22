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
                                    echo form_dropdown('academic_year', $academicYears, '', 'class="form-control form-control-sm" id="academic_year"'); ?>
                                <?php echo form_error('academic_year', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="details">Facilitie Details: <span class="text-danger">*</span></label>
                                <textarea name="details" id="details" cols="30" rows="6" class="form-control form-control-sm"><?php echo (set_value('name'))?set_value('name'):'';?></textarea>
                                <script>
                                    const textarea = document.querySelector('#details');
                                    ClassicEditor
                                        .create(textarea, {
                                            toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]
                                        })
                                        .then(editor => {
                                            window.editor = editor
                                        });
                                </script>
                                <?php echo form_error('details', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Select Attachments: (Max: 30MB) </label>
                                <input type='file' name='files' class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('files'); ?></span>
                           </div>
                           <div class="form-group col-md-12">
                                <label>Link / URL </label>
                                <input type='text' name='url' id="url" class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('url'); ?></span>                                 
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Add</button>
                        <?php echo anchor('dept/facilities','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>