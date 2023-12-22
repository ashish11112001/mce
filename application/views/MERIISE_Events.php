
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">ME-RIISE</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
       <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
       
          <div class="col-md-9 blog-pull-right flip sm-pull-none">
          <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
              <?= $activeMenu; ?></span></h3>
          <?php foreach ($documents as $docs) { ?>
            <div class="upcoming-events bg-white-f3 mb-20">
              <div class="row">
                
                <div class="col-sm-12 pl-10 pl-sm-15">
                  <div class="event-details p-15 mt-20">
                    <h4 class="media-heading text-uppercase font-weight-500"><?= $docs->news_title; ?></h4>
                    <p><?= $docs->news_details; ?></p>
                    <?php
                    
                 
                    $unserializedData = unserialize($docs->files);

                    if ($unserializedData !== false && is_array($unserializedData)) {
                        // Extract and print the values
                        foreach ($unserializedData as $value) {
                          echo anchor('assets/departments/MERIISE/latest_news/' . $value, '<i class="fa fa-download"></i> Download', 'class="btn btn-flat btn-dark btn-theme-colored btn-sm" target="_blank"'). "\n";;
                        }
                    } 
                    
                   
                    ?>
                  

                  </div>
                </div>

              </div>
            </div>
          <?php  } ?>
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