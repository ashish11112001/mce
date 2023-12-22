<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Change Password</h3>
            </div>
            <div class="block-content block-content-full">
            
            <div id="hideDiv" class="text-center"> 
               <?php echo $this->session->flashdata('message'); ?>
            </div>

                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <?php echo form_open($action, 'class="mb-5 user"'); ?>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right" for="name">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="name" name="name"
                                    placeholder="Name" value="<?=$name;?>" disabled>
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right" for="email">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="email" name="email"
                                    placeholder="Email" value="<?=$email;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-4 col-form-label text-right">Old
                                Password : </label>
                            <div class="col-sm-8">
                                <input type="password" name="oldPassword" id="oldPassword" class="form-control form-control-sm col-sm-8"
                                    value="<?php echo (set_value('oldPassword'))?set_value('oldPassword'):$oldPassword;?>">
                                <span class="text-danger"><?php echo form_error('oldPassword'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password" class="col-sm-4 col-form-label text-right">New
                                Password : </label>
                            <div class="col-sm-8">
                                <input type="password" name="newPassword" id="newPassword" class="form-control form-control-sm col-sm-8"
                                    value="<?php echo (set_value('newPassword'))?set_value('newPassword'):$newPassword;?>">
                                <span class="text-danger"><?php echo form_error('newPassword'); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4"> &nbsp;</div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                        class="fas fa-edit"></i> Update</button>
                                <?php echo anchor('faculty/dashboard','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); ?>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>