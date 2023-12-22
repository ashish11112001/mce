
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white">Secretary Message</h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">About Us</li>
                  <li class="active text-gray-silver">Messages</li>
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
                  	
			    <div class="row py-2">
						<div class="col-md-3 order-md-2 mb-4 mb-lg-0">
						    <span class="img-thumbnail d-block">
							    <img src="<?=base_url();?>assets/images/messages/secretary.jpg" class="img-fluid" alt="secretary">
							</span>
						</div>
						<div class="col-md-9 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-6 mb-0 pt-0 mt-0"></h2>
							</div>
							<div class="overflow-hidden mb-2">
								<p class="font-weight-bold text-primary mb-40"></p>
								<!--<p><i class="fa fa-envelope"></i> indira.cse@bmsce.ac.in <br/> <i class="fa fa-envelope"></i> indiramanjunath@yahoo.com </p>-->
							</div>
							
						</div>
				</div>    
			    <div class="row">
        		    <div class="col">
        		        <p class="text-justify">Malnad College of Engineering is one of the premier institutions in the country serving the field of Technical education since 1960. The college is bringing out this information Handbook for the year 2019-2020. I am happy to observe that this book is comprehensive and clear with regard to the structure, governance, and rules of autonomous programs of the College. This handbook would be of great help for the students, faculty, and staff of the college. I wish that all the students make the best use of this handbook.</p>
                        <p class="text-justify"><strong style="  color:#c02140;">Sri R T Dyave Gowda</strong><br /><strong style="  color:#c02140;">Hon. Secretary,</strong> <br />Malnad College of Engineering, <br />Hassan-573202</p>    
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