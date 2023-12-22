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
                                <label for="details">Member Name : <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo (set_value('name'))?set_value('name'):$Details->name;?>">
                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="details">Designation : </label>
                                <input type="text" name="designation" id="designation" class="form-control" value="<?php echo (set_value('designation'))?set_value('designation'):$Details->designation;?>">
                                <?php echo form_error('designation', '<div class="error">', '</div>'); ?>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="details">Category / Position in Commitee: <span class="text-danger">*</span></label>
                                <input type="text" name="position" id="position" class="form-control" value="<?php echo (set_value('position'))?set_value('position'):$Details->position;?>">
                                <?php echo form_error('position', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="details">Organisation/Nominated: </label>
                                <input type="text" name="organisation" id="organisation" class="form-control" value="<?php echo (set_value('organisation'))?set_value('organisation'):$Details->organisation;?>">
                                <?php echo form_error('organisation', '<div class="error">', '</div>'); ?>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="details">Email: </label>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo (set_value('email'))?set_value('email'):$Details->email;?>">
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> &nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                class="fas fa-edit"></i> Update</button>
                        <?php echo anchor('dept/committeeMembers/'.$committee_id,'<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" '); ?>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>