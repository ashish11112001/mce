<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user"'); ?>

                <div class="form-group row mx-3">
                    <label for="nain" class="text-uppercase col-lg-12">About NAIN</label>
                    <textarea id="nain" name="nain" class="form-control  col-lg-12"
                        rows=6><?php echo (set_value('nain'))?set_value('nain'):$departmentsDetails->nain;?></textarea>
                    <script>
                    const nainTextarea = document.querySelector('#nain');
                    ClassicEditor
                        .create(nainTextarea)
                        .then(editor => {
                            window.editor = editor
                        });
                    </script>
                    <span class="validationError"><?php echo form_error('nain'); ?></span>
                </div>

                <div class="form-group row mx-3">
                    <label for="uba_department" class="text-uppercase col-lg-12">About UBA </label>
                    <textarea id="uba" name="uba" class="form-control col-lg-12"
                        rows=6><?php echo (set_value('uba'))?set_value('uba'):$departmentsDetails->uba;?></textarea>
                    <script>
                    const textarea = document.querySelector('#uba');
                    ClassicEditor
                        .create(textarea)
                        .then(editor => {
                            window.editor = editor
                        });
                    </script>
                    <span class="validationError"><?php echo form_error('uba'); ?></span>
                </div>
                <div class="form-group row mx-3">
                    <label for="uba_department" class="text-uppercase col-lg-12">Infrastructure </label>
                    <textarea id="infrastructure" name="infrastructure" class="form-control col-lg-8"
                        rows=4><?php echo (set_value('infrastructure'))?set_value('infrastructure'):$departmentsDetails->infrastructure;?></textarea>
                        <span class="validationError" placeholder="https://www.youtube.com/embed/oIDqz2BrVec?si=Mqv0mldIJh11BKnW"><?php echo form_error('infrastructure'); ?></span>
                </div>

                <div class="form-group row mx-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('meriise/cms','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>