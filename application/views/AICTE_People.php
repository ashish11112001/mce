 <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white">Faculty</h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">AICTE IDEA LAB</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-9 blog-pull-right">
                <h3 class="text-theme-colored text-uppercase mt-0"><?=$activeMenu;?></h3>
                <div class="row list-dashed mt-20">
                <?php foreach ($faculty as $faculty1) { 
                    
                    $url = glob('./assets/departments/AICTE/faculty/profile_' . $faculty1->id . '-*.jpg');
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
                      <h5 class="entry-title mt-0 pt-0"><?= $faculty1->specialization;?></h5>
                    </div>
                  </div>
                </article>
                <?php }?>
                
                
              </div> 
                 

            </div>
            <div class="col-sm-12 col-md-3">
                <div class="sidebar sidebar-left mt-sm-30">
                    <?php
                        $sideBar = sideBar($mainMenu, $parentMenu, $activeMenu);
                        print_r($sideBar);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
</div>