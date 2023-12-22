
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
                  <li class="active text-gray-silver">Government Initiative</li>
                  <li class="active text-gray-silver">TEQIP</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
            <div class="col-md-8 pull-right flip sm-pull-none">
              <div class="row mt-10">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     <?=$activeMenu;?> </span></h3>
                  
                        
                  <p class="text-justify">The <b>Technical Education Quality Improvement Programme</b> of Government of India <b>(TEQIP)</b> has been conceived in pursuance of the <b>NPE-1986</b> (as revised in 1992). The Programme aims to upscale and support on-going efforts of GOI to improve quality of technical education and enhance existing capacities of the institutions to become dynamic, demand-driven, quality conscious, efficient and forward looking, responsive to rapid economic and technological developments occurring both at national and international levels. The broad objectives of the Programme are to create an environment in which engineering institutions selected under the Programme can achieve their own set targets for excellence and sustain the same with autonomy and accountability, support development plans including synergistic networking and services to community and economy for achieving higher standards, and to improve efficiency and effectiveness of the technical education management system. The effort would provide a flexible platform to well performing institutions to acquire excellence in specialised areas and emerge as world-class institutions. The Programme will be implemented as a centrally coordinated, multi-state, long-term Programme in overlapping phases. Under each phase, there will be 2 to 3 cycles of selection of well performing institutions in a competitive manner. For the First Cycle of the First Phase, six States namely, Uttar Pradesh, Madhya Pradesh, Himachal Pradesh, Kerala, Haryana and Maharashtra have been selected to participate in the programme based on their commitment and preparedness. All other States/UTs have the option to participate in subsequent selection cycles depending upon preparedness of their institutions.</p>
               
                   
                </div>


              </div>

            </div>
            <div class="col-md-4">
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