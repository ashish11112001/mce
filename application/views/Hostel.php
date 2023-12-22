<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
    <div class="container pt-120 pb-120">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="title text-white"><?= $activeMenu; ?></h2>
            <ol class="breadcrumb text-center text-black mt-10">
              <li class="text-gray-silver"><a href="#">Home</a></li>
              <!-- <li><a href="#">Pages</a></li> -->
              <li class="active text-gray-silver">Other Wings</li>
              <li class="active text-gray-silver">Facilities</li>
              <li class="active text-gray-silver">Hostel</li>
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
            <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                  <?= $activeMenu; ?></span></h3>

              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="<?= base_url('home/Boys-Hostel'); ?>"><i class="flaticon-charity-shelter text-theme-colored"></i></a>
                  <div class="media-body">
                    <a href="<?= base_url('home/Boys-Hostel'); ?>">
                      <h4 class="media-heading heading text-uppercase">Boys Hostel</h4>
                    </a>

                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="icon-box bg-white left media border-3px bg-hover-theme-colored mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="<?= base_url('home/Girls-Hostel'); ?>"><i class="flaticon-charity-shelter text-theme-colored"></i></a>
                  <div class="media-body">
                    <a href="<?= base_url('home/Girls-Hostel'); ?>">
                      <h4 class="media-heading heading text-uppercase">Girls Hostel</h4>
                    </a>

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