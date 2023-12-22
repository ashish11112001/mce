<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
    <div class="container pt-120 pb-120">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="title text-white"><?= $activeMenu; ?></h2>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="#">Home</a></li>
              <!-- <li><a href="#">Pages</a></li> -->
              <li class="active text-gray-silver">ME-RIISE</li>
              <li class="active text-gray-silver">Team</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
      <div class="row">
        <div class="col-md-9 pull-right flip sm-pull-none">
          <div class="row mt-10">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                  <?= $activeMenu; ?></span></h3>
              <h3> <span class="text-theme-colored">
                  Meet the heart of our team!</span></h3>
              <h4>Final year student members</h4>
            
           
              <?php foreach ($faculty as $faculty1) { 
                    
                    $url = glob('./assets/departments/MERIISE/student/profile_' . $faculty1->id . '-*.jpg');
                    $profile_pic = base_url() . $url[0];
                    ?>
              <article class="post clearfix">
                <div class="col-sm-3">
                  <div class="entry-header">
                    <div class="post-thumb"> <img class="img-responsive img-fullwidth img-thumbnail" src="<?= $profile_pic; ?>" alt="<?= $faculty1->name;?>"> </div>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="entry-content mt-0">
                    <h4 class="entry-title mt-0 pt-0"><?= $faculty1->name;?></h4>
                    <h5 class="entry-title mt-0 pt-0"><?= $faculty1->designation;?></h5>
                    <h5><?= $faculty1->department;?></h5>
                    <!-- <p class="mb-30 text-justify">Dr. G. Rajendra graduated in Industrial Production Engineering  from Bangalore University, in the year 1985. He further pursued his M.Tech in Metal Casting in the year 1985 from Bangalore University and obtained his Ph.D from Visvesvaraya Technological University, Belgaum. He has got 34 years of rich experience in teaching research  and administration. He has published several articles in reputed national and international journals, He is the adjudicator for Ph.D. thesis for various universities across India. He has produced 4 doctorates in the areas of robust design, design and development of production systems, supply chain network and design of experiments and guiding research scholars. He has authored several books in subjects like OR, TQM, Manufacturing Processes, Engineering Economics & Human Resource Management. He is a life Member of several professional bodies and also serving  as a Chairman for various academic bodies, He is an invited speaker for various seminars and conference by Industry and the Institutions across the country. He has guided about 100 applied projects in the fields of Production, Industrial Engineering and Management many of which are successfully implemented. Dr G. Rajendra is the Principal of Dr. Ambedkar Institute of Technology, Bangalore.</p> -->
                    <!--<?php echo anchor('assets/images/Administration/Dr.M.Meenakshi.pdf', 'View Profile', 'class="btn btn-primary btn-sm" target="_blank"'); ?>-->
                  </div>
                </div>
              </article><br>
              <?php }?>

            </div>


          </div>

        </div>
        <div class="col-md-3">
          <?php
          $sideBar = sideBar($mainMenu, $parentMenu, $activeMenu);
          print_r($sideBar);
          ?>


        </div>
      </div>
    </div>
  </section>
</div>
<!-- end main-content -->