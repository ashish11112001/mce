
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
                 <img src="<?php echo base_url();?>assets/images/facilities/club/ROTARACT CLUB.png" alt="litarary"
                        class="img-responsive img-fullwidth img-thumbnail">
                </div>
                <div class="col-md-7">
                    <h3>ROTARACT CLUB</h3>
                    <p class="text-justify">Rotaract Club is a voluntary wing of Rotary Club, Hassan. The motto of the club is to serve the society in various ways for their well being.</p>
                    <h6>Goals</h6>
                  <ul class="list theme-colored angle-double-right">
                    <li> To develop professional and leadership skills.</li>
                    <li> To emphasize respect for the rights of others, and to promote ethical standards and the dignity of all useful occupations.</li>
                    <li> To motivate people for eventual membership in Rotary.</li>
                  </ul>
                  <h6>Vision</h6>
                  <p class="text-justify">The club is a part of Rotary’s youth service partner for young people aged between 18 and 30. We provide unique opportunities that assist our members in becoming the community, business and professional leaders of tomorrow. It provides young people to develop the knowledge and skills that will assist them in personal development and to address the physical and social needs of their communities.</p>
                  <h6>Mission</h6>
                  <p class="text-justify">The Rotaractclub's passion for service and excellence is driven by Rotary International's vision "service above self". Thus, the club commits itself to the society and following the motto of Rotaract: fellowship through service, it enables the Rotaractors to make life long friends and to give back to the community they live in. </p>
                  <h6>Objective of Rotaract Club</h6>
                  <ul class="list theme-colored angle-double-right">
                    <li> To provide an opportunity for young men and women to enhance the knowledge and skills that will assist them in personal development, to address the physical and social needs of their communities.</li>
                    <li> To promote better relations between all people worldwide through a framework of friendship.</li>
                  </ul>
                  <h6>Activities of Rotaract Club</h6>
                   <ul class="list theme-colored angle-double-right">
                    <li> The club conducts various events so as to improve the lives of the individuals in the community.</li>
                    <li> The club organizes REFLECTIONS, the major event of the club which provides an opportunity for the students from several schools in and around Hassan to participate in this event and bring out the best in them.</li>
                    <li>TUSSLE, being another event from the club gives a clear picture of the recruitment process. It helps the students to cope up enough confidence to face future recruitments.</li>
                    <li>The club also contributes its bit by maintaining a record of blood groups of students who are willing to donate blood in case of any emergency.</li>
                  </ul>
                  <h4><a href="http://rotaractclubmce.epizy.com/?fbclid=PAAaayDp2zbMW17GOCc25GDPD2G63np6H7ty7bH2cWy4fDfS8U488uwDKZs7c&i=1" target="_blank" class="text-danger">Web Link For Rotaract Club - Click Here</a></h4>
                </div>
                 <div class="col-md-6">
                     <img src="<?php echo base_url();?>assets/images/facilities/club/r1.jpg" alt="ROTARACT"
                        class="img-responsive img-fullwidth img-thumbnail">
                     <img src="<?php echo base_url();?>assets/images/facilities/club/r2.jpg" alt="ROTARACT"
                        class="img-responsive img-fullwidth img-thumbnail">
                     <img src="<?php echo base_url();?>assets/images/facilities/club/r3.jpg" alt="ROTARACT"
                        class="img-responsive img-fullwidth img-thumbnail">
                 </div>
                <div class="col-md-6">
                 <img src="<?php echo base_url();?>assets/images/facilities/club/r4.jpg" alt="ROTARACT"
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