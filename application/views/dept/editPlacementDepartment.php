<!-- <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<script type="text/javascript" src="<?php echo base_url('assets');?>/ckfinder/ckfinder.js"></script>
<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user"'); ?>
                <div class="form-group row mx-3">
                    <label for="placement_department" class="text-uppercase col-lg-12">Placement Department </label>
                    <textarea id="placement" name="placement" class="rich form-control col-lg-12"
                        rows=6><?php echo (set_value('placement'))?set_value('placement'):$departmentsDetails->placement;?></textarea>
                  
                        <input name="image" type="file" id="upload" class="d-none" onchange="">
                              <!-- <script>
                    const textarea = document.querySelector('#placement');
                    ClassicEditor
                        .create(textarea)
                        .then(editor => {
                            window.editor = editor
                        });
                    </script> -->
                    <script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js'); ?>"></script>

<script type="text/javascript">
    tinymce.init({
        selector: ".rich",
        convert_urls: 0,
        theme: "modern",
        paste_data_images: true,
        plugins: [
            " link image lists  hr  ",
            "  ",
            " table  paste "
        ],
        image_advtab: true,
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        callback(e.target.result, {
                            alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                });
            }
        }
    });
</script>
<script src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
                    <span class="validationError"><?php echo form_error('placement'); ?></span>
                </div>
       
                <div class="form-group row mx-3">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('dept/placementDepartment','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>