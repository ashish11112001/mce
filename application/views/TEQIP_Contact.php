
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
                  <li class="active text-gray-silver">Government Initiative</li>
                  <li class="active text-gray-silver">TEQIP</li>
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
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="30%">Desgnation in TEQIP</th>
                            <th width="30%">NAME</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                            <tr>
                            <td>Principal & Director</td>
                            <td>Dr. C V Venkatesh<br>
 ksj@mcehassan.ac.in </td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/TEQIP/Dr. C V Venkatesh.jpg'?>" alt="Dr. B . UMA"></td>
                        </tr>
                        <tr>
                            <td>TEQIP-III Co-ordinato</td>
                            <td>Dr. N S Jyothi<br>
 nsj@mcehassan.ac.in <br>
9448401110</td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/TEQIP/Dr. N S Jyothi.jpg'?>" alt="Dr. B . UMA"></td>
                        </tr>
                        <tr>
                            <td>Procurement Co-ordinator</td>
                            <td>Dr. Y M Shashidhara<br>
 yms@mcehassan.ac.in</td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/TEQIP/Dr. Y M Shashidhara.jpg'?>" alt="Dr. B . UMA"></td>
                        </tr>
                        <tr>
                            <td>Academic Co-ordinator</td>
                            <td>Dr. M S Srinath <br>
 srinadme@gmail.com<br>
8277421917</td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/TEQIP/Dr. M S Srinath.jpg'?>" alt="Dr. B . UMA"></td>
                        </tr>
                        <tr>
                            <td>Finance Co-ordinator	</td>
                            <td>Dr. Mohan Kumar Chawan <br>
 mkc@mcehassan.ac.in<br>
9481966595 </td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/TEQIP/Dr. Mohan Kumar Chawan.jpg'?>" alt="Dr. B . UMA"></td>
                        </tr>
                    </tbody>
                </table>
                        
                
               
                   
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