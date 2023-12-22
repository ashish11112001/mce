<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Sign In</h3>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-2 text-center">
                                    <img src="<?php echo base_url();?>admin_assets/media/drait.png"
                                        alt="Malnad College of Engineering" class="w-100">
                                    <h1 class="h4 mb-1">AICTE Panel</h1>

                                    <!-- Sign In Form -->
                                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <?php echo form_open($action, 'class="js-validation-signin" method="POST"'); ?>
                                    <?php echo '<span class="text-danger">'.validation_errors().'</span>'; ?>
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input class="form-control form-control-alt form-control-lg" type="text"
                                                placeholder="Username" name="username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-alt form-control-lg"
                                                id="password" name="password" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                            </button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
            <div class="content content-full font-size-sm text-muted text-center">
                Powered by <strong>Medha Tech</strong>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>