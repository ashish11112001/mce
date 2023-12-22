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
                            <div class="form-group col-md-12">
                                <label>Title to Display </label>
                                <input type='text' name='details' id="details" class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('details'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Select Attachments: (Max: 30MB) </label>
                                <input type='file' name='files' class="form-control form-control-sm">
                                <span class="text-danger"><?php echo form_error('files'); ?></span>

                             

                            </div>
                             
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/accreditedDocuments','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>