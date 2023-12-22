
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
                 <img src="<?php echo base_url();?>assets/images/facilities/club/Technical CLub.png" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                    </div>
                     <div class="col-md-7">
                     <p class="text-justify">The Malnad Technical Club was founded on 09-09-2009 to cope up with the rapid growth of technology.</p>
                     <p class="text-justify">It has come a long way seeding constructive ideas and encouraging students to delve into the colossal of technology.</p>
                     <h6>Our Vision</h6>
                     <p class="text-justify">Harnessing every possible technology and enhancing the culture of professionalism.</p>
                    <h6>Mission</h6>
                     <ul class="list theme-colored angle-double-right">
                    <li> Providing a base for technical development and enhancement of technical knowledge.</li>
                    <li> Escalate student’s chances in competitive examinations</li>
                    <li>Enhance the student’s interest in modern technologies by conducting various competitions, symposiums, conferences, etc.</li>
                    <li>Handling projects to cater to the needs of the present generation.</li>
                    </ul>
                    <h4>Contact us:</h4><a href="">mce.techclub@gmail.com</a>
                    <h4>To explore all our events and projects, visit :</h4><a href="http://ww38.malnadtechnicalclub.org/" target="_blank">http://malnadtechnicalclub.org</a><br>
                    </div><br>
                    
                     <div class="col-md-7">
                     <h3>EVENTS</h3>
                     <p class="text-justify">ENIGMA, which was evolved as a State-Level Technical fest also imbibes a few national level competitions in it. With the tagline-<b> Unleash the mystery of Technology; </b> it sets an arena for the students to flaunt their technical acumen.</p>
                     <p class="text-justify">Around 15 events are conducted, which falls under three major domains</p>
                     <ul class="list theme-colored angle-double-right">
                    <li> Design and build events</li>
                    <li> Online events</li>
                    <li> Paper events</li>
                    </ul>
                    <p class="text-justify">The most fascinating events come under Design and Build events such as Robokombat, Mystique Locomotor, Xtreme Machine, Trail Blazer where students design and build their own bots to perform the required action.</p>
                    <p class="text-justify">Online events comprise of Online quiz, MCE Dollars- A virtual stock market game, Factual Reel etc. where the participants submit their responses through social media. Paper events encompass Inquizitive, Ingenium, Play Bytes, Resonance etc.</p>
                    <p class="text-justify">The most enlivening part of the fest is ‘ THE SHOW’. On the final day of the event, various shows are organized every year such as the Laser Show, the Drone Show and the Sand Art Show.</p>
                    <p class="text-justify">TECHSANDHYA- The first ever technical newsletter of the college; published every year during Enigma. It provides a wonderful platform for science and tech enthusiasts to put forth their creativity and ideas on a technical faucet.</p>
                    <h6 class="text-underline">Contact us:</h6>mce.techclub@gmail.com
                    <img src="<?php echo base_url();?>assets/images/facilities/club/e1.jpg" alt="events"
                    class="img-responsive img-fullwidth img-thumbnail"><br>
                    <img src="<?php echo base_url();?>assets/images/facilities/club/e2.jpg" alt="events"
                    class="img-responsive img-fullwidth img-thumbnail">
                    </div>
                     <div class="col-md-5">
                        <img src="<?php echo base_url();?>assets/images/facilities/club/events.jpg" alt="events"
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