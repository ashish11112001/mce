
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
                  <li class="active text-gray-silver">Other Wings</li>
                  <li class="active text-gray-silver">Facilities</li>
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
                     <?=$activeMenu;?> </span></h3>
                     <div class="col-md-5">
                    <img src="<?php echo base_url();?>assets/images/facilities/bus.jpg" alt="bus"
                        class="img-responsive img-fullwidth img-thumbnail">
                       </div>
                      
                      <h3>Transport Services</h3>
                      <p class="text-justify">MCE operates a few Buses to MCE Girls Hostel to pickup MCE students from the hostel and the same for dropping. </
                      <p class="text-justify">Bus timings between MCE Girls Hostel and MCE Campus</p>
                      <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="20%">Session</th>
                            <th width="20%">Bus timings	</th>
                            <th width="20%">Route</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td>Morning</td>
                            <td>08:00 AM<br>08:15 AM	</td>
                            <td>Hostel --> College<br>Hostel --> College</td>
                        </tr>
                            <tr>
                            <td>Afternoon</td>
                            <td>01:10 PM<br>
                                02:10 PM<br>
                                02:20 PM</td>
                            <td>College --> Hostel<br>
                                Hostel --> College<br>
                                Hostel --> College</td>
                        </tr>
                           <tr>
                            <td>Evening</td>
                            <td>05:45 PM</td>
                            <td>College --> Hostel</td>
                        </tr>
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