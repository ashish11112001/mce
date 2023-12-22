<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
    <div class="container pt-120 pb-120">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="title text-white"><?= $activeMenu; ?></h2>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="#">Home</a></li>
              <!-- <li><a href="#">Pages</a></li> -->
              <li class="active text-gray-silver">ME-RIISE</li>
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


              <p class="text-justify">Ministry of Education (MoE), Govt. of India has established ‘ MoE’s Innovation Cell (MIC)’ to systematically foster the culture of innovation amongst all Higher Education Institutions(HEIs). The primary mandate of MIC is to encourage, inspire, and nurture young students by supporting them to work with new ideas and transform them int prototypes while they are informative years. MIC has envisioned encouraging the creation of ‘Institution’s Innovation Council (IICs)’ across selected HEIs. A network of these IICs will be established to promote innovation in the Institution through multitudinous modes leading to an innovation promotion eco-system in the campuses. In collaboration with ME-RIISE (Malnad Enclave for Research, Innovation, Incubation, Start-ups, and Entrepreneurship ) Institution Innovation Cell has been established in the college with the vision of fostering innovation and support students to enrich their spirit of entrepreneurship.</p>
              <img src="<?php echo base_url(); ?>assets/images/IIC/2.jpg" width="20px" height="20px" alt="NAIN" class="img-responsive img-fullwidth img-thumbnail">
              <img src="<?php echo base_url(); ?>assets/images/IIC/RatingCertificate_2022-23_page-0001 (1) - Copy.jpg" width="20px" height="20px" alt="NAIN" class="img-responsive img-fullwidth img-thumbnail">
              </br></br>



              <img src="<?php echo base_url(); ?>assets/images/IIC/3.jpg" width="20px" height="20px" alt="NAIN" class="img-responsive img-fullwidth img-thumbnail">
              <br>
              <h4>Documents</h4>

              <table class="table ">
                <tbody>
                  <?php $i = 1;
                  foreach ($documents as $docs) { ?>

                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $docs->details; ?></td>
                      <td> <?php echo anchor('assets/departments/MERIISE/mhrddocuments/' . $docs->file_names, '<i class="fa fa-download"></i> View Here', 'class="btn btn-warning btn-sm" target="_blank"'); ?></td>
                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>


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