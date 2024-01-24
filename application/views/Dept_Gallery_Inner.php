<!-- Start main-content -->
<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
    <div class="container pt-120 pb-120">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="title text-white"><?= $parentMenu; ?></h2>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="#">Home</a></li>
              <!-- <li><a href="#">Pages</a></li> -->
              <li class="active text-gray-silver">Academics</li>
              <li class="active text-gray-silver">Gallery</li>
              <li class="active text-gray-silver"><?= $album->name ;?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
      <div class="row">
        <div class="col-md-8 pull-right flip sm-pull-none">
          <div class="row list-dashed">
          
            <div class="col-md-12">



          
                                                <div id="grid" class="gallery-isotope grid-3 gutter clearfix">
              
                  <?php foreach ($albums as $img) { ?>
                    <!-- Portfolio Item Start -->
                    <div class="gallery-item wheel">
                      <div class="work-gallery">
                        <div class="gallery-thumb">
                          <img class="img-fullwidth" alt="" src="<?= base_url(); ?>assets/departments/<?= $short_name ?>/albums/<?= $img->file_names; ?>">
                          <div class="gallery-overlay"></div>
                          <div class="gallery-contect">
                            <ul class="styled-icons icon-bordered icon-circled icon-sm">

                              <li><a data-rel="prettyPhoto" href="<?= base_url(); ?>assets/departments/<?= $short_name ?>/albums/<?= $img->file_names; ?>"><i class="fa fa-arrows"></i></a></li>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  <?php } ?>
                  <!-- Portfolio Item End -->

                </div>
             




            </div>
          </div>
          <?php
            $url = base_url() . 'home/Gallery/' . $id ;
                                                echo anchor($url, '<i class="fa fa-arrow-left"></i> Back to Album List', 'class="text-danger" ');
           ?>
        </div>
        <div class="col-md-4">
          <?php
          $sideBar = departmentSideBar($mainMenu, $parentMenu, $activeMenu);
          print_r($sideBar);
          ?>



        </div>
      </div>
    </div>
  </section>

</div>
<!-- end main-content -->