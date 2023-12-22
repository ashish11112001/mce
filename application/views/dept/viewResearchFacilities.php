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
                                <label>Contact Person Name</label>
                                <p class="mb-0"><?php echo $Details->person; ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Research Facility</label>
                                <p class="mb-0"><?php echo nl2br($Details->facility); ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <p class="mb-0"><?php echo nl2br($Details->description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editResearchFacilities/'.$Details->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteResearchFacilities/'.$Details->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/researchFacilities','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>