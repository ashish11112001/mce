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
                <?php echo form_open($action, 'class="user"  enctype="multipart/form-data"'); ?>

                <div class="form-group mx-5">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm" id="news_title" name="news_title"
                        placeholder="Add news title here.."
                        value="<?php echo (set_value('news_title'))?set_value('news_title'):$Details->news_title;?>">
                    <span class="text-danger"><?php echo form_error('news_title'); ?></span>
                </div>

                <div class="form-group mx-5">
                    <label for="details">Details</label>
                    <textarea id="news_details" name="news_details" class="rich form-control" rows="6"
                        placeholder="news details will type here..."><?php echo (set_value('news_details'))?set_value('news_details'):$Details->news_details;?></textarea>
                    <span class="text-danger"><?php echo form_error('news_details'); ?></span>
                    <script>
                    // const textarea = document.querySelector('#news_details');
                    // ClassicEditor
                    //     .create(textarea, {
                    //         link: {
                    //             addTargetToExternalLinks: true,
                    //             decorators: [
                    //                 {
                    //                     mode: 'manual',
                    //                     label: 'New Window'
                    //                 }
                    //             ]
                    //         }
                    //     })
                    //     .then(editor => {
                    //         window.editor = editor
                    //         editor.ui.view.editable.editableElement.style.height = '300px';
                    //     });
                    </script>
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
        image_advtab: false,
    
    });
</script>
<script src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
                </div>

                <div class="row  mx-5">
                    <div class="form-group col-md-6">
                        <label for="news_display">Select Attachments: (Max: 30MB) </label>
                        <input type='file' name='files[]' multiple="">
                        <span class="text-danger"><?php echo form_error('files'); ?></span>
                        <ul class="mt-3">
                            <?php
                                $fileNames = unserialize($Details->files);
                                foreach($fileNames as $key => $value){
                                    $del = anchor('meriise/latestNewsDelete/'.$Details->id.'/'.$key,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                    echo '<li>'.anchor('assets/latest_news/'.$value, $value, 'target="_blank"').'&nbsp;'.$del.'</li>';
                                }
                            ?>
                        </ul>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="display_in">Display in: <span class="text-danger">*</span></label>
                        <?php echo form_dropdown('display_in', $newsDisplay, $Details->display_in, 'class="form-control form-control-sm" id="display_in"'); ?>
                        <?php echo form_error('display_in', '<div class="error">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-group mx-5">
                    <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                            class="fas fa-edit"></i> Update</button>
                    <?php echo anchor('meriise/latestNews','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>