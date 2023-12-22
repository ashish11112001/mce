    <!-- Start main-content -->
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$parentMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">Academics</li>
                  <li class="active text-gray-silver">Contact</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-8 blog-pull-right">
                <h3 class="text-theme-colored mt-0"><?=$parentMenu;?> Head of Department</h3>
                <div class="row mt-0">
                    <article class="post clearfix">
                      
                        <div class="col-sm-9">
                            <div class="entry-content mt-10">
                                <?php echo nl2br($departmentsDetails->hod_message);?>
                                <h4 class="entry-title mt-0 mb-0 pt-0"><?=$departmentsDetails->hod_name;?></h45>
                                <h5 class="entry-title mt-0 mb-0 pt-0"><?=$departmentsDetails->hod_designation;?></h5>
                                <h5 class="entry-title mt-0 mb-0 pt-0"><?=$departmentsDetails->hod_email;?></h5>
                                <h5 class="entry-title mt-0 mb-0 pt-0">Department of <?=$parentMenu;?></h5>
                                <?php
                                    $cv = null;
                                    $cv_path = 'assets/departments/'.$short_name.'/CV/HOD_CV.pdf';
                                    $profile_pic= base_url().'assets/departments/'.$short_name.'/faculty/HOD.jpg';
                                    if (file_exists($cv_path)) {
                                        $cv = base_url().$cv_path;
                                        echo anchor($cv,'<i class="fa fa-download fa-sm fa-fw"></i> Download Curriculum Vitae', 'class="btn btn-dark btn-sm mt-10" target="_blank"');
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                      
                                            <img class="img-thumbnail img-fullwidth" src="<?=$profile_pic;?>">
                                     
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="sidebar sidebar-left mt-sm-30">
                    <?php
                        $sideBar = departmentSideBar($mainMenu, $parentMenu, $activeMenu);
                        print_r($sideBar);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>