
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
                   <li class="active text-gray-silver">Other Committee</li>
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
              <div class="row mt-10">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     <?=$activeMenu;?> </span></h3>
                     <h3>Department of Civil Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/CIVIL BoS.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/CIVIL BoS.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>
                    
                
                <h3>Department of Mechanical Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/Mechanical Engg. BOS Members List AY 23-24 (1).pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/Mechanical Engg. BOS Members List AY 23-24 (1).pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>


                <h3>Department of Electrical And Electronics Engineering </h3>
                   <?php echo anchor('assets/files/Board of studies/EEE BoS - 2023.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/EEE BoS - 2023.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                <h3>Department of Electronics And Communication Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/ECE dept. BOS,IAB member list.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/ECE dept. BOS,IAB member list.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                <h3>Department of Computer Science And Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/CS and Engg. BoS.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/CS and Engg. BoS.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>
                
                <h3>Department of Electronics And Instrumentation Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/E and I E.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/E and I E.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                   <h3>Department of Information Science And Engineering</h3>
                   <?php echo anchor('assets/files/Board of studies/IS and Engg. BoS.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/IS and Engg. BoS.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                  <h3>Department of Artificial Intelligence And Machine Learning</h3>
                   <?php echo anchor('assets/files/Board of studies/CSE(AI&ML) BOS (1).pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/CSE(AI&ML) BOS (1).pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>
                 
                 <h3>Department of Computer Science And Business Systems</h3>
                   <?php echo anchor('assets/files/Board of studies/CS and BS.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/CS and BS.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                  <h3>Department of Physics</h3>
                   <?php echo anchor('assets/files/Board of studies/Physics BOS 2023.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/Physics BOS 2023.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                 <h3>Department of Chemistry</h3>
                   <?php echo anchor('assets/files/Board of studies/Chemistry BOS.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/Chemistry BOS.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                 <h3>Department of Mathematics</h3>
                   <?php echo anchor('assets/files/Board of studies/Maths BoS 2023.pdf','<i class="fa fa-download"></i> Download','class="btn btn-warning btn-sm" target="_blank"');?>
                <iframe src="<?=base_url();?>assets/files/Board of studies/Maths BoS 2023.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>

                   
                </div>


              </div>

            </div>
            <div class="col-md-4">
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