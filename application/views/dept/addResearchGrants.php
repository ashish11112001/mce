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
                                <label>Project Title</label>
                                <input type="text" name="project_title" id="project_title"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('project_title'))?set_value('project_title'):$project_title;?>">
                                <?php echo form_error('project_title', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Funding/Sanction Agency</label>
                                <input type="text" name="agency" id="agency"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('agency'))?set_value('agency'):$agency;?>">
                                <?php echo form_error('agency', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Principal Investigators</label>
                                <textarea name="investigators" id="investigators" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('investigators'))?set_value('investigators'):$investigators;?></textarea>
                                <?php echo form_error('investigators', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sanctioned Year</label>
                                <?php
                                    $years = array(" " => "Select");
                                    for($i = 1970; $i<=date("Y"); $i++){
                                        $years[$i] = $i;
                                    }
                                    echo form_dropdown('sanctioned_year', $years, set_value('sanctioned_year', $sanctioned_year),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('sanctioned_year', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Amount</label>
                                <input type="text" name="amount" id="amount"
                                    class="form-control form-control-sm"
                                    value="<?php echo (set_value('amount'))?set_value('amount'):$amount;?>">
                                <?php echo form_error('amount', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Current Status</label>
                                <?php
                                    $status_options = array(" " => "Select", "Ongoing" => "Ongoing", "Completed" => "Completed");
                                    echo form_dropdown('status', $status_options, set_value('status', $status),'class="form-control form-control-sm"'); 
                                ?>
                                <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchGrants','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>