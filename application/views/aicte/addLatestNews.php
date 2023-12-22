<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
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
                        value="<?php echo (set_value('news_title'))?set_value('news_title'):'';?>">
                    <span class="text-danger"><?php echo form_error('news_title'); ?></span>
                </div>

                <div class="form-group mx-5">
                    <label for="details">Details</label>
                    <textarea id="news_details" name="news_details" class="form-control" rows="6"
                        placeholder="news details will type here..."><?php echo (set_value('news_details'))?set_value('news_details'):'';?></textarea>
                    <span class="text-danger"><?php echo form_error('news_details'); ?></span>
                    <script>
                    const textarea = document.querySelector('#news_details');
                    ClassicEditor
                        .create(textarea, {
                            link: {
                                // addTargetToExternalLinks: true,
                                decorators: [
                                    {
                                        mode: 'manual',
                                        label: 'Open in New Window',
                                        attributes: {
                                            target: '_blank'
                                        }
                                    }
                                ]
                            }
                        })
                        .then(editor => {
                            window.editor = editor
                            editor.ui.view.editable.editableElement.style.height = '300px';
                        });
                    </script>
                </div>

                <div class="row  mx-5">
                    <div class="form-group col-md-6">
                        <label for="news_display">Select Attachments: (Max: 30MB) </label>
                        <input type='file' name='files[]' multiple="">
                        <span class="text-danger"><?php echo form_error('files'); ?></span>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="display_in">Display in: <span class="text-danger">*</span></label>
                        <?php echo form_dropdown('display_in', $newsDisplay, '', 'class="form-control form-control-sm" id="display_in"'); ?>
                        <?php echo form_error('display_in', '<div class="error">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-group mx-5">
                    <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                            class="fas fa-edit"></i> Create </button>
                    <?php echo anchor('aicte/latestNews','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>