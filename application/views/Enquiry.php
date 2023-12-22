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
                  <li class="active text-gray-silver">Admissions</li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     Contact Details </span></h3>
               <h4>Admission through CET (Govt. Quota)</h4>
               <p class="text-justify">The admission is through Common Entrance Test (CET) conducted by the Department for Technical Education in Karnataka. Online application and seat allotment will be processed by the KEA cell. Students who got selected for our college can come directly to the college Admission block with an Admission order.</p>
                  <h4>Admission through Management (Non-Govt. Quota)</h4>         
                  <ul>
                      <li> Management seats will be allotted on a first come first serve basis.</li>
                      <li> Applications for management seats are received at MTES ® Office Hassan and seats are allotted.</li>
                  </ul>
                           <p class="text-justify"><strong>Contact us:</strong></br><strong>Phone 08172-245317</strong></br><strong>E-Mail: office@mcehassan.ac.in</strong></p>
                           
                            </div>


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
    <!-- end main-content -->