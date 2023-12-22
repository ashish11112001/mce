
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"> <?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">Other Wings</li>
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
                    <div class="blog-posts single-post">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     <?=$activeMenu;?> </span></h3>
                  	
                  	 <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url();?>assets/images/Spiritual_Enclave/ganapathi.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                       
                </div>
                <div class="col-md-6">
                    <h4>Shree Ganapathi Temple</h4>
                    <p class="text-justify"> A temple is a building reserved for religious or spiritual rituals and activities such as prayer and sacrifice.MCE students and staff can reach this temple to have some relief in their work stress.Temple is opened every day of a week.Temple located in the backside of the MCE campus in MG Road.</p>
                    </div>
                     </div>
                    
                    <div class="clear"></div></br></br>
                    
                     <div class="row">
                     <div class="col-md-6">
                    <h4>Dyana Mandira</h4>
                    <p class="text-justify">Dyana Mandira is also called "Divya Chaithanya"
Here in this place, we conduct peaceful activities like Yoga, Meditation, Devotional-Prayer, Songs, Dance, and more. It's open for students, college staff, and the public can participate in these activities. Yoga has evolved with a focus on exercise, strength, flexibility, and breathing. It can help in boosting physical and mental well-being. These activities will give people, peace, calm, rest, refresh, and more.</p>
                    
                     </div>
                   
                        	
                <div class="col-md-6">
                    <img src="<?php echo base_url();?>assets/images/Spiritual_Enclave/dyana.png" alt="nss"
                        class="img-responsive img-fullwidth img-thumbnail">
                       
                </div>
                </div>
                    
                    
                   
              
					
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