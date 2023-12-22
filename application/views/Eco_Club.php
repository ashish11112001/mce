
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li class="text-gray-silver"><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                   <li class="active text-gray-silver">Other Wings</li>
                   <li class="active text-gray-silver">Facilities</li>
                   <li class="active text-gray-silver">Clubs</li>
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
                     <?=$activeMenu;?></span></h3>
                      <div class="col-md-5">
                 <img src="<?php echo base_url();?>assets/images/facilities/club/eco.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                    </div>
                     <div class="col-md-7">
                    <b>Goal</b>
                     <ul class="list theme-colored angle-double-right">
                    <li> To promote student's interest over environmental issues.</li>
                    <li> To get the students actively involved in environmental issues.</li>
                    </ul>
                   <b>Vision</b>
                   <p class="text-justify">To create an environmental friendly society which can actively get involved in environmental education.</p>
                    <b>Mission</b>
                    <p class="text-justify">By involving students to participate in activities like awareness, conservation, education, community participation, etc.</p>
                   <b>Objectives of Eco Club</b>
                   <ul class="list theme-colored angle-double-right">
                    <li> To educate the students about their environment.</li>
                    <li> To create a clean and green consciousness among students through various innovative methods.</li>
                    <li> To involve them in efforts to preserve the environment.</li>
                    <li> To motivate students on how to imbibe habits and life style for minimum waste generation.</li>
                    </ul>
                    <b>Activities of Eco Club</b>
                   <ul class="list theme-colored angle-double-right">
                    <li> Action-based activities like tree plantation (herbal garden), cleanliness drives both within and outside the college campus.</li>
                    <li> Placing display boards on selected trees in the campus by specifying biological names and common names.</li>
                    <li> Eternity - a event which triggers the eco-concern among the technical students and develops an understanding that nature is the ultimate technology.</li>
                    <li> Vanya chaithanya is a event to imbibe concern for wild and wilderness in budding brains of in and around Hassan.</li>
                    <li>Spot Fixing - every year Malnad eco club chooses a spot in Hassan city, immaculate that place and also maintains it.</li>
                    </ul>
                    </div>
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