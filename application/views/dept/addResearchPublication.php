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
                                <label>Student Name:</label>
                                <textarea name="student_name" id="student_name" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('student_name'))?set_value('student_name'):$student_name;?></textarea>
                                <?php echo form_error('student_name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Publication Title:</label>
                                <textarea name="publication_title" id="publication_title" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('publication_title'))?set_value('publication_title'):$publication_title;?></textarea>
                                <?php echo form_error('publication_title', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Research Description:</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('description'))?set_value('description'):$description;?></textarea>
                                <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Faculty Coordinator:</label>
                                <input type="text" name="coordinator" id="coordinator"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('coordinator'))?set_value('coordinator'):$coordinator;?>">
                                <?php echo form_error('coordinator', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Reference Weblink:</label>
                                <input type="text" name="link" id="link"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('link'))?set_value('link'):$link;?>">
                                <?php echo form_error('link', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchPublications','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>