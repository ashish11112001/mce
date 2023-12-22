<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open($action, 'class="user" enctype="multipart/form-data"'); ?>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                                <label for="details">Title  : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title">
                          
                                <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                            </div>
                        <div class="form-group col-md-12">
                                <label for="details">Order Number  : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="order" id="order">
                                <input type="hidden" class="form-control" name="naac_id" id="naac_id" value="<?=$naac_id;?>">
                                <?php echo form_error('order', '<div class="error">', '</div>'); ?>
                            </div>

                            <?php if($naac_id=='13'||$naac_id=='14')
                            {?>
                            <div class="form-group col-md-12">
                                <label for="details">Detail: <span class="text-danger">*</span></label>
                                <textarea name="detail" id="detail" cols="30" rows="6" class="form-control form-control-sm"><?php echo (set_value('detail'))?set_value('detail'):'';?></textarea>
                                <script>
                                    const textarea = document.querySelector('#detail');
                                    ClassicEditor
                                        .create(textarea, {
                                            toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]
                                        })
                                        .then(editor => {
                                            window.editor = editor
                                        });
                                </script>
                                <?php echo form_error('detail', '<div class="error">', '</div>'); ?>
                            </div>

<?php }?>
                            <div class="form-group col-md-12">
                                <label for="details">File  : <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="files" id="files">
                         
                                <?php echo form_error('files', '<div class="error">', '</div>'); ?>
                            </div>
                          
                            
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Add</button>
                        <?php echo anchor('naac/naacFiles/'.$naac_id,'<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>