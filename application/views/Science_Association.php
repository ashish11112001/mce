
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
                     <img src="<?php echo base_url();?>assets/images/facilities/club/science.jpg" alt="science"
                        class="img-responsive img-fullwidth img-thumbnail">
                   </div>
                   <div class="col-md-7">
                       <h3>Science Association</h3>
                      <h6>Vision : </h6>
                      <p class="text-justify">Spreading knowledge of science and technology for the betterment the society and provide a platform for upcoming talents in this field.</p>
                      <h6>Mission : </h6>
                      <p class="text-justify">To cater genuine interest in science and to enlighten students about the scientific facts by providing a practical dimension</p>
                      <h6>Events conducted by SA:</h6>
                      <p class="text-justify"><b>SMART:</b> It is an event which is conducted for school children to provide them a platform to exhibit their talents along with a scientific exposure . We conduct SMART to enlighten the bright minds and to spread the essence of science.It is one of the main events organized outside the college which emphasizes on helping young student minds to build a better future.</p>
                      <p class="text-justify"><b>SCIENTIA:</b>The word 'Scientia' is derived from Latin which means knowledge, a knowing, expertness, or experience. As the name says we are united to achieve the best of all that means. Science is a building blocks for the widespread architecture called technology. Scientia-One of the major technical event organised in MCE. This event aims at enlightening students and making them realize the practical aspects of science.People from all around the state gather to witness this intercollegiate Technical Fest. To inculcate interests in individual’s development several inter-branch and Open events are conducted in SCIENTIA.</p><br>
                   </div>
                    <div class="col-md-5">
                     <h4>Contact Us</h4>
                            <p>Staff Convener       : Mr. Rudre Gowda<br>
                            Student President   : Vikas H.S. <br>
                            Vice President        : Deepak H.D. 
                                                           Annapoorna D.K.<br
                            General Secretary   : Sharath Krishna C. </p>
                            <p>To know more about Science Association</p><a href="http://samalnad.org/" target="-blank" class="text-primary">click here</a>
                   </div>
                    <div class="col-md-7">
                     <img src="<?php echo base_url();?>assets/images/facilities/club/science1.jpg" alt="science"
                        class="img-responsive img-fullwidth img-thumbnail">
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