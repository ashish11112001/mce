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
                                <label>Project Title</label>
                                <p class="mb-0">
                                    <?php echo (set_value('project_title'))?set_value('project_title'):$Details->project_title;?>
                                </p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Funding/Sanction Agency</label>
                                <p class="mb-0"><?php echo (set_value('agency'))?set_value('agency'):$Details->agency;?>
                                </p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Principal Investigators</label>
                                <p class="mb-0">
                                    <?php echo (set_value('investigators'))?set_value('investigators'):$Details->investigators;?>
                                </p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sanctioned Year</label>
                                <p class="mb-0">
                                    <?php echo (set_value('sanctioned_year'))?set_value('sanctioned_year'):$Details->sanctioned_year;?>
                                </p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Amount</label>
                                <p class="mb-0"><?php echo (set_value('amount'))?set_value('amount'):$Details->amount;?>
                                </p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Current Status</label>
                                <p class="mb-0"><?php echo (set_value('status'))?set_value('status'):$Details->status;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editResearchGrants/'.$Details->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteResearchGrants/'.$Details->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/researchGrants','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>