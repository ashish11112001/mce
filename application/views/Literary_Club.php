
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
                   <li class="active text-gray-silver">Literary-Clubs</li>
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
                 <img src="<?php echo base_url();?>assets/images/facilities/club/LITERARY CLUB.jpg" alt="litarary"
                        class="img-responsive img-fullwidth img-thumbnail">
               </div>
                <div class="col-md-7">
                  <h3>LITERARY CLUB</h3>
                  <p class="text-justify">From its genesis in 1993, The Literary Club A.K.A LIT remains as an indispensable club in Malnad College of Engineering, reaching greater heights in event management every year.</p>
                  <p class="text-justify">MOTTO:  To foster the talents and assorted interests of blooming engineers with creative skills and a penchant for literature.</p>
                  <h6 class="text-underline">What We Do:</h6>
                  <p class="text-justify">* MALNAD, the annual fest of the college organised by The Literary Club consists of a total of 35 events which is a blend of literary, art, sports and cultural competitions spread across four categories.</p>
                  <p class="text-justify">The fest goes on for about a week during which variety of events are conducted .</p>
                  <p class="text-justify">The fest is divided into four categories which are as follows :</p>
                  <ul class="list theme-colored angle-double-right">
                    <li> Balwaan</li>
                    <li> Buddhimaan</li>
                    <li> Kalakrithi</li>
                    <li> Darpan</li>
                 </ul>
                 <ol class="list list-ordened list-ordened-style-3">
										<li> Balwaan includes all the sports related events such as water polo, pentathlon etc.</li>
										<li> Buddhimaan comprises of literary events such as literati, spell-a-thon, toastmaster which test the vocabulary and oratory skills of the participants.</li>
										<li>Kalakrithi involves all the artistic events such as graffiti ,art attack etc to test the creativity and artistic talents among the participants.</li>
										<li>Darpan includes cultural events such as dance for a cause,dance to the tune and many more.</li>
				</ol>
				<p class="text-justify">During the fest, all the branch compete for the overall championship title -"SARVOTTAM" . on the concluding day of the fest, the dance floor is set ablaze by the peppy tunes of the DJ. 2500+ people witness the Malnad each year</p>
				<p class="text-justify">* NOESIS: It is an e-magazine released during odd semesters to showcase the literary skills of the members of the club. It consists of articles in English, Kannada and Hindi. It also consists of art and photography by the club members.</p>
				<p class="text-justify">* SPARK: It is an inspirational talk. Inspirational speakers like Mr. Sujith Lalwani, Mr. Saveen Hegde motivated huge number of students. Achievers from our college addressed the students last year.</p>
				<p class="text-justify">* PINNACLE: It is a literary fest conducted in the odd semester. Consisting exciting events like knockout, khichdi, 90’s kids. It aims to test and enhance the literary skills of the participants.</p>
               </div>
               <div class="col-md-5">
                   <h3>About Us</h3>
                   <h6 class="text-underline">Contact us:</h6>
                    <p>Dr. S Pradeep<br>
                    Chairperson & Principal</p>
                   <h6>Staff Convenors:</h6>
                    <p>Dr. T P Jeevan<br>
                    Mrs. R E Margaret<br>
                    Mr. H K Sharath</p>
                   <h6>Student wing:</h6>
                    <p>Swaroop Bhat K - President<br>
                    Shankar Sharma S - Vice President</p>
                    <p>To know more about us <a href="http://www.literaryclub.in/" target="_blank" class="text-primary">click here</a></p>
               </div>
               <div class="col-md-7">
                   <img src="<?php echo base_url();?>assets/images/facilities/club/literary.jpg" alt="litarary"
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