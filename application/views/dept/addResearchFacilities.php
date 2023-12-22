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
                                <label>Contact Person Name</label>
                                <input type="text" name="person" id="person" class="form-control form-control-sm"
                                    value="<?php echo (set_value('person'))?set_value('person'):$person;?>">
                                <?php echo form_error('person', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Research Facility</label>
                                <input type="text" name="facility" id="facility" class="form-control form-control-sm"
                                    value="<?php echo (set_value('facility'))?set_value('facility'):$facility;?>">
                                <?php echo form_error('facility', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm"><?php echo (set_value('description'))?set_value('description'):$description;?></textarea>
                                <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> <?=$btn_name;?> </button>
                                <?php echo anchor('dept/researchFacilities','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>