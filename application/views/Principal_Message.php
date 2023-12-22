
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
							    <img src="<?=base_url();?>assets/images/Administration/pradeep.jpeg" class="img-fluid" alt="principal">
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
        		        <p class="text-justify">Hearty welcome to an Institute of 58 years of legacy imparting quality technical Education. An Autonomous Institution since 2007, thecollege is one among the leading technical Institutes in the country.<strong>&nbsp;It is a pleasure to mention that the institution improved the position from 16 to 15 in the Data-Quest ranking of top 25 Government Technical Schools in India for the year 2018. Being autonomous institution, eight UG Programmes are NBA accredited under TIER-I and also college is accredited by National Assessment Accreditation Council(NAAC).Our college is having a network bandwidth  1Gbps for the year 2022-23 with campus wide Wi-Fi facility for students and staff. Among few colleges selected under TEQIP-3, our college is identified as mentor institution for Jorhat Engineering College in Assam.</strong></p>
                        <p style=" text-align: justify;">The technical skill development &amp; expansion of knowledge with state of the art facilities makes this Institute as one of the best among Autonomous Colleges. Our College is determined to retain this level of superiority already in command &amp; improve further in every sphere of academic activities including research orientation &amp; overall development of the students.&nbsp;</p>
<p style=" text-align: justify;">To face new challenges, active progress &amp; to lead a successful life education is mandatory. Ever growing need of competitive skills demands a suitable platform, which is being given by qualified scholars &amp; technocrats. The faculty posses a much diversified vision of turning the dreams of students into a concrete reality. Our focus is mainly on imparting quality education which enables the student to excel in other skills. The academic autonomy has created a platform to involve industry leaders, academicians par excellence, R&amp;D heads and all stake holders to strengthen the curricular &amp; to produce quality engineers for today's need. It is a great opportunity for our students to empower themselves with the wings of knowledge &amp; power of innovation &amp; imbibe an attitude akin to practice &amp; positive thinking caring concern !society &amp; nature.&nbsp;</p>
<p style=" text-align: justify;">The Autonomous governance structure, rules &amp; regulations, calendar of events &amp; contact details of faculty &amp; staff are printed in the handbook for your information interaction. The academic planning for one academic year can be done in the handbook.&nbsp;<strong>I Congratulate the effort put forth by Dr.Chandrika J, Dean (Academic Affairs) in bringing out the Hand Book 2022-23 in well structured, with adequate information embedded.</strong><br />I Certainly foresee a great opportunity for the students of our College in this innovative world of technology.</p>
<p style=" text-align: justify;">Wishing you all the Best.</p>
                        <p class="text-justify"><strong style="  color:#c02140;">Dr. S Pradeep,</strong><br /><strong style="  color:#c02140;">Principal</strong> <br />Malnad College of Engineering, <br />Hassan-573202</p>    
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