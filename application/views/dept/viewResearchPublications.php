<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Student Name:</label>
                                <p class="mb-0"><?php echo (set_value('student_name'))?set_value('student_name'):nl2br($Details->student_name);?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Publication Title:</label>
                                <p class="mb-0"><?php echo (set_value('student_name'))?set_value('publication_title'):nl2br($Details->publication_title);?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Research Description:</label>
                                <p class="mb-0"><?php echo (set_value('description'))?set_value('description'):nl2br($Details->description);?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Faculty Coordinator:</label>
                                <p class="mb-0"><?php echo (set_value('coordinator'))?set_value('coordinator'):nl2br($Details->coordinator);?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Reference Weblink:</label>
                                <p class="mb-0"><?php echo (set_value('link'))?set_value('link'):anchor($Details->link,$Details->link,'target="_blank"');?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editResearchPublications/'.$Details->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteResearchPublications/'.$Details->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/researchPublications','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>