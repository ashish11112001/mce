<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
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
                                <label for="academic_year">Academic Year: <span class="text-danger">*</span></label>
                                <?php 
                                    echo form_dropdown('academic_year', $academicYears, '', 'class="form-control form-control-sm" id="academic_year"'); ?>
                                <?php echo form_error('academic_year', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="publication_type">Publication Type: <span class="text-danger">*</span></label>
                                <?php echo form_dropdown('publication_type', $publicationTypes, '', 'class="form-control form-control-sm" id="publication_type"'); ?>
                                <?php echo form_error('publication_type', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="details">Publication Details: <span class="text-danger">*</span></label>
                                <textarea id="details" name="details" class="form-control form-control-sm col-lg-12"
                                    rows=6><?php echo (set_value('details'))?set_value('details'):'';?>
                                </textarea>
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
                                <label for="name">Reference Link:</label>
                                <input type="text" name="link" id="link" class="form-control form-control-sm"
                                    value="<?php echo (set_value('link'))?set_value('link'):'';?>">
                                <?php echo form_error('link', '<div class="error">', '</div>'); ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Add</button>
                        <?php echo anchor('faculty/publications','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>