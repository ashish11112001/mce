
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: home -->
      <section id="home">

        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
          <div class="rev_slider" data-version="5.0">
            <ul>

              <!-- SLIDE 1 -->
              <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default"
                data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo base_url(); ?>assets/images/slider1.png"
                data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url(); ?>assets/images/slider11.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                  data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
                <!-- LAYERS -->

              </li>

              <!-- SLIDE 3 -->
              <li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default"
                data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo base_url(); ?>assets/images/slider3.png"
                data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url(); ?>assets/images/slider3.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                  data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
                <!-- LAYERS -->

             </li>
            
            </ul>
          </div>
          <!-- end .rev_slider -->
        </div>
        <!-- end .rev_slider_wrapper -->
        <script>
          $(document).ready(function (e) {
            $(".rev_slider").revolution({
              sliderType: "standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                onHoverStop: "off",
                touch: {
                  touchenabled: "on",
                  swipe_threshold: 75,
                  swipe_min_touches: 1,
                  swipe_direction: "horizontal",
                  drag_block_vertical: false
                },
                arrows: {
                  style: "zeus",
                  enable: true,
                  hide_onmobile: true,
                  hide_under: 600,
                  hide_onleave: true,
                  hide_delay: 200,
                  hide_delay_mobile: 1200,
                  tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                  left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                  },
                  right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                  }
                },
                bullets: {
                  enable: true,
                  hide_onmobile: true,
                  hide_under: 600,
                  style: "metis",
                  hide_onleave: true,
                  hide_delay: 200,
                  hide_delay_mobile: 1200,
                  direction: "horizontal",
                  h_align: "center",
                  v_align: "bottom",
                  h_offset: 0,
                  v_offset: 30,
                  space: 5,
                  tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                }
              },
              // responsiveLevels: [1240, 1024, 778],
              // visibilityLevels: [1240, 1024, 778],
              // gridwidth: [1170, 1024, 778, 480],
              // gridheight: [650, 768, 960, 720],
              lazyType: "none",
              // parallax: {
              //   origo: "slidercenter",
              //   speed: 1000,
              //   levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
              //   type: "scroll"
              // },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
              }
            });
          });
        </script>
        <!-- Slider Revolution Ends -->

      </section>

      <section>
        <div class="container-fluid p-0 p-sm-15">
          <div class="section-content">
            <div class="row equal-height-inner home-boxes">
              <div class="col-sm-12 col-md-3 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay1">
                <div class="sm-height-auto bg-theme-colored">
                  <div class="p-30">
                    <h3 class="text-uppercase text-white mt-0">Alumni</h3>
                    <p class="text-white">Alumni Association was formed during mid eighties and started with one chapter at Bangalore.</p>
                    <a href="<?=base_url();?>home/Alumnii" class="btn btn-border btn-circled btn-transparent btn-xs mt-5">Join us Now</a>
                  </div>
                  <i class="flaticon-charity-home-insurance bg-icon"></i>
                </div>
              </div>
              <div
                class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay2">
                <div class="sm-height-auto bg-theme-color-2">
                  <div class="p-30">
                    <h3 class="text-uppercase text-white mt-0">Events</h3>
                    <p class="text-white">Technical events guide engineering students, computer engineers, researchers to dream bigger and achieve them.</p>
                    <a href="<?=base_url();?>home/Events" class="btn btn-border btn-circled btn-transparent btn-xs mt-5">Read More</a>
                  </div>
                  <i class="fa fa-calendar-plus-o bg-icon"></i>
                </div>
              </div>
              <div
                class="col-sm-12 col-md-3 pl-0 pr-0 pl-sm-15 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay3">
                <div class="sm-height-auto bg-theme-color-3">
                  <div class="p-30">
                    <h3 class="text-uppercase text-white mt-0">Placements</h3>
                    <p class="text-white">The department of Training and Placement, established during the early nineties, has a full-fledged office in the campus.</p>
                    <a href="<?=base_url();?>home/Placement-Overview" class="btn btn-border btn-circled btn-transparent btn-xs mt-5">Check
                      Now</a>
                  </div>
                  <i class="flaticon-charity-make-an-online-donation bg-icon"></i>
                </div>
              </div>
              <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay4">
                <div class="sm-height-auto bg-theme-color-4">
                  <div class="p-30">
                    <h3 class="text-white mt-0 mb-5">Student Clubs</h3>
                    <p class="text-white">Club or a society helps you to gain knowledge, skills and experience in leadership, communication, problem-solving.</p>
                    <a href="<?=base_url();?>home/Clubs" class="btn btn-border btn-circled btn-transparent btn-xs mt-5">Contact
                      Now</a>
                  </div>
                  <i class="fa fa-mobile bg-icon"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: About -->
      <section id="about">
        <div class="container mb-0 pt-0 mt-60">
          <div class="section-content">
            <div class="row mt-10">
              <div class="col-xs-12 col-sm-6 col-md-6 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                data-wow-delay="0.5s">
                <h3 class="text-uppercase line-bottom mt-0">Welcome To <span class="text-theme-colored">
                    MCE</span></h3>
                <p class="lead text-justify"><strong> Malnad College of Engineering </strong> established in the year
                  1960, during the
                  second 5 year
                  plan, as a joint venture of Government of India, Government of Karnataka and the Malnad Technical
                  Education Society, Hassan. </p>
                <p class="mb-15 text-justify">The college is one of the few Engineering Colleges in the country
                  recognized for
                  conducting the Technical Education Quality Improvement Programme (TEQIP) sponsored by the World Bank.
                  The Training and Placement centre in the college trains and assists the students in securing
                  employment in reputed companies like Tata Consultancy, Infosys, Wipro, L&T, BEL, Fistchner, Builders’
                  Association of India etc., through campus recruitment programme.</p>

                <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-10" href="#">Know More</a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                    class="fa fa-calendar text-gray-darkgray mr-10"></i>Upcoming <span
                    class="text-theme-colored">Events</span></h3>
                    <?php $i=0; foreach($latestNews as $latestNews1){ if($i<4) {
                        $category = $newsDcisplay[$latestNews1->display_in]; ?>
                      
                    <article class="post media-post clearfix pb-0 mb-10">
                  <div class="post-right">
                    <h4 class="mt-0 mb-5"><?php echo anchor('home/news/'.$latestNews1->news_slug, $latestNews1->news_title,'class="title"'); ?></h4>
                    <ul class="list-inline font-12 mb-5">
                      <li class="pr-0"><i class="fa fa-calendar mr-5"></i> <?php echo date('d M Y',strtotime($latestNews1->news_date)); ?> |</li>
                      <li class="pl-5"><i class="fa fa-map-marker mr-5"></i><?=$category;?></li>
                    </ul>
                    <p class="mb-0 font-13"><?php substr($latestNews1->news_details,0,15);?></p>
                    <!--<a class="" href="<?php base_url();?>home/news/<?=$latestNews1->news_slug;?>">Read More →</a>-->
                    <?php echo anchor('home/news/'.$latestNews1->news_slug, 'Read More →','class="text-theme-colored font-13"'); ?>
                  </div>
                </article>
                <?php } $i++; } ?>

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Features  -->
      <section class="bg-silver-light">
        <div class="container pb-40">
          <div class="section-title text-center mt-0">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="mt-0 line-height-1">Why<span class="text-theme-colored"> MCE ?</span></h2>
                <p>Malnad College of Engineering <br>Hassan</p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-person-inside-a-heart text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Dedicated Qualified Faculties - <a href="https://mcehassan.irins.org/"  class="text-theme-color-2"> Faculty Profile Irins </a></h4>
                    <!--<p>A group of specialists, usually engaged in instruction or research.</p>-->
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-shaking-hands-inside-a-heart text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Skill Development Activities <br> &nbsp;</h4>
                    <!--<p>Skill Development efforts across the country, removal of disconnect.</p>-->
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-hand-holding-a-gift text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Excellent <a href="<?=base_url();?>home/Placement-Records"  class="text-theme-color-2">Placement Record</a><br>&nbsp;</h4>
                    <!--<p>The department of Training and Placement, established during early nineties.</p>-->
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-dove-of-peace-1 text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Industry Interaction</h4>
                    <!--<p>Industrial training offers the students with important practical knowledge.</p>-->
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-shelter text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Disciplined Environment</h4>
                    <!--<p>42 acres of Campus</p>-->
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a
                    class="media-left pull-left flip" href="#"><i
                      class="flaticon-charity-food-donation-1 text-theme-color-2"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading text-uppercase">Extra-curricular Activities - <a href="<?=base_url();?>home/Clubs"  class="text-theme-color-2"> Student Clubs </a></h4>
                    <!--<p>Extracurricular activities are programs outside of the regular school curriculum.</p>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Running Project 1  -->
      <section class="divider parallax layer-overlay overlay-dark-8" data-stellar-background-ratio="0.5"
        data-bg-img="<?php echo base_url(); ?>assets/images/slider3.png">
        <div class="container pb-60 pt-70">
          <div class="section-title text-center">
            <div class="row">
              <div class="col-md-12">
                <h2 class="mt-0 line-height-1 text-white">MCE <span class="text-theme-colored">Accreditations and
                    Rankings</span>
                </h2>
                <p class="text-white">Malnad College of Engineering <br> Hassan</p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              <div class="owl-carousel-6col horse-gallery" data-dots="true">
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/nirf.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/NIRF">NIRF 2023</a></h4>
                    <!-- <span class="category">Nepal / South Asia</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/NIRF" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/ariia.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/ARIIA">ARIIA</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/ARIIA" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>

               
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/iguage.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/QS-I-GAUGE">QS I-GUAGE</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/QS-I-GAUGE" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/accreditations/qro.jpeg" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/QRO">QRO</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/QRO" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/VTU.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/Affiliation_from_VTU">VTU</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/Affiliation_from_VTU" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/AICTE.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/AICTE">AICTE</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/AICTE" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/accreditations/NBA1.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/NBA">NBA</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/NBA" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/NAAC.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/NAAC">NAAC</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/NAAC" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>
                <div class="gallery-item">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url(); ?>assets/images/rankings/IQAC.png" alt="project">
                  </div>
                  <div class="horse-details">
                    <h4 class="title mb-5"><a href="<?=base_url();?>home/IQAC-MOMS">IQAC</a></h4>
                    <!-- <span class="category">Seria / Medilist</span> -->
                    <!-- <p class="font-13 pt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                    <p>
                      <a href="<?=base_url();?>home/IQAC-MOMS" class="btn btn-theme-colored btn-flat mt-5 btn-sm" role="button">Know More</a>
                      <!-- <span class="pull-right ml-10 mt-12 font-14">Goal: $2500</span> -->
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Volunteers -->
      <section id="volunteers">
        <div class="container pt-70 pb-70">
          <div class="section-title text-center">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">Our <span
                    class="text-theme-colored"> Campus Tour</span></h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p> -->
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
               <iframe src="https://www.easytourz.com/BT-EmabedTour/all/2549421e7962ed58" width="100%" height="500" frameborder="0" style="border:0" webkitAllowFullScreen mozallowfullscreen allowFullScreen ></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Section: Client Say -->
      <section class="bg-theme-color-2">
        <div class="container pt-60 pb-60">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase mt-0 pb-10  text-center text-white">Campus Placements</h2>
              <div class="owl-carousel-1col" data-dots="true">
                <div class="item">
                  <div class="testimonial-wrapper text-center">
                    <div class="thumb"><img class="my-10" alt="" src="<?php echo base_url(); ?>assets/images/placements_1.png"></div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-wrapper text-center">
                    <div class="thumb"><img class="py-10" alt="" src="<?php echo base_url(); ?>assets/images/placements_2.png"></div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-wrapper text-center">
                    <div class="thumb"><img class="" alt="" src="<?php echo base_url(); ?>assets/images/placements_3.png"></div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-wrapper text-center">
                    <div class="thumb"><img class="" alt="" src="<?php echo base_url(); ?>assets/images/placements_4.png"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Why Choose Us -->
      <section class="bg-lighter">
        <div class="container pt-40 pb-50">
          <div class="section-content">
            <div class="row">
              <div class="col-md-5 pr-40">
                <h3 class="text-uppercase title mt-0 mt-sm-30 line-bottom">What <span
                    class="text-theme-colored font-weight-700">Students Say ?</span></h3>
                <div class="bxslider bx-nav-top">
                  <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                    <div class="comment">
                      <p class="text-white"><em>M D Ranganath is the Former Chief Financial Officer(CFO) of Infosys, a top leading IT company. He completed his Bachelor of Engineering in the year 1984 at MCE, Hassan.</em></p>
                    </div>
                    <div class="content mt-20">
                      <div class="thumb pull-left flip">
                        <img width="64" src="<?php echo base_url(); ?>assets/images/alumni/ranganath.jpg" alt="" class="img-circle">
                      </div>
                      <div class="testimonials-details pull-left flip ml-20">
                        <h5 class="author text-white mt-0 mb-0 font-weight-600">JM D Ranganath</h5>
                        <h6 class="title font-14 m-0 mt-5 mb-5 text-white">1984 Batch Student</h6>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                    <div class="comment">
                      <p class="text-white"><em>Manu R Saale is the Managing Director and CEO of Mercedes-Benz Research &amp; Development India(MBRDI), Bengaluru. He completed his Bachelors of Engineering in Electronics and Communication in 1995 at MCE, Hassan.</em></p>
                    </div>
                    <div class="content mt-20">
                      <div class="thumb pull-left flip">
                        <img width="64" src="<?php echo base_url(); ?>assets/images/alumni/manu.jpg" alt="" class="img-circle">
                      </div>
                      <div class="testimonials-details pull-left flip ml-20">
                        <h5 class="author text-white mt-0 mb-0 font-weight-600">Manu R Saale</h5>
                        <h6 class="title font-14 m-0 mt-5 mb-5 text-white">1991 Batch Student</h6>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                    <div class="comment">
                      <p class="text-white"><em>Dr. Karisiddappa is the Former Vice-Chancellor of VTU, Belagavi, a leading University in Asia and the only Technical University in Karnataka State. He is an Alumni of MCE. He is a student of our Institute in the year 1976-81 in Civil Engineering.</em></p>
                    </div>
                    <div class="content mt-20">
                      <div class="thumb pull-left flip">
                        <img width="64" src="<?php echo base_url(); ?>assets/images/alumni/karisidappa.jpg" alt="" class="img-circle">
                      </div>
                      <div class="testimonials-details pull-left flip ml-20">
                        <h5 class="author text-white mt-0 mb-0 font-weight-600">Dr. Karisiddappa</h5>
                        <h6 class="title font-14 m-0 mt-5 mb-5 text-white">Vice-Chancellor, VTU, Belagavi, Karnataka.</h6>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7 hidden-xs pl-40">
                <h3 class="title mt-0 mt-sm-30 text-black-666 line-bottom"><i
                    class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>Notable <span class="text-theme-colored">
                    Alumnis</span></h3>
                <div class="row mt-20 multi-row-clearfix">
                  <div class="owl-carousel-3col" data-nav="true">
                    <div class="item">
                      <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20"  src="<?php echo base_url(); ?>assets/images/alumni/ranganath.jpg"
                            alt="..."></a> </div>
                      <div class="caption">
                        <h4 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored">
                            M D Ranganath</span></h4>
                        <p>M D Ranganath is the Former Chief Financial Officer(CFO) of Infosys, a top leading IT company. He completed his Bachelor of Engineering in the year 1984 at MCE, Hassan.</p>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20"  src="<?php echo base_url(); ?>assets/images/alumni/manu.jpg"
                            alt="..."></a> </div>
                      <div class="caption">
                        <h4 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored">
                            Manu R Saale</span></h4>
                        <p>Manu R Saale is the Managing Director and CEO of Mercedes-Benz Research &amp; Development India(MBRDI), Bengaluru. He completed his Bachelors of Engineering in Electronics and Communication in 1995 at MCE, Hassan.</p>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20"  src="<?php echo base_url(); ?>assets/images/alumni/karisidappa.jpg"
                            alt="..."></a> </div>
                      <div class="caption">
                        <h4 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored">
                            Dr. Karisiddappa</span></h4>
                        <p>Dr. Karisiddappa is the Former Vice-Chancellor of VTU, Belagavi, a leading University in Asia and the only Technical University in Karnataka State. He is an Alumni of MCE. He is a student of our Institute in the year 1976-81 in Civil Engineering.</p>
                      </div>
                    </div>
                    <!--<div class="item">-->
                    <!--  <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="<?php echo base_url(); ?>assets/images/alumni/karisidappa.jpg"-->
                    <!--        alt="..."></a> </div>-->
                    <!--  <div class="caption">-->
                    <!--    <h4 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored">-->
                    <!--        </span></h4>-->
                    <!--    <p>Dr. Karisiddappa is the Former Vice-Chancellor of VTU, Belagavi, a leading University in Asia and the only Technical University in Karnataka State. He is an Alumni of MCE. He is a student of our Institute in the year 1976-81 in Civil Engineering.</p>-->
                    <!--  </div>-->
                    <!--</div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- end main-content -->