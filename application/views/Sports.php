
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"> <?=$activeMenu;?></h2>
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
                    <div class="blog-posts single-post">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     <?=$activeMenu;?> </span></h3>
                  	
			    <h3 class="text-theme-colored mt-0">Indoor Games</h3>
                <!-- <div class="col-md-5">
                    <img src="<?php echo base_url();?>assets/images/sports/shuttle.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Shuttle Badminton</h4>
                </div> -->
                <table>
<tr>
  <td>
  <img src="<?php echo base_url();?>assets/images/sports/shuttle.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Shuttle Badminton</h4>
  </td>
  <td>
  <img src="<?php echo base_url();?>assets/files/sports/gym.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Gymnasium</h4>
  </td>
</tr>


                </table>
                <div class="col-md-12">
                    
                    <p class="text-justify">A sport is of anything professional student find amusing or entertaining and the skilful activity requiring commitment, strategy, and fair play. To have a sound mind in a sound body a fully furnished sports and game facilities are provided to the student community to enrich themselves.</p>
                    <ul class="list theme-colored angle-double-right">
                        <li>
                            MCE campus covers various infrastructure in sports.</li>

                            <li>Shuttle Badminton - 3 Wooden courts, 1 Outdoor court</li>
                             <li> Gymnasium</li>

                                   <li> Timings: Morning- 06:00 am to 08:00 am</li>

                                         <li> Evening- 04:00 pm to 07:00 pm</li>
                      
                    </ul>
                </div></br>
                
                   <!-- <div class="col-md-5">
                    <img src="<?php echo base_url();?>assets/images/sports/table.jpg" alt="tt"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Table Tennis</h4>
                </div> --> 
    <table>
<tr>
  <td>
  <img src="<?php echo base_url();?>assets/images/sports/table.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Table Tennis</h4>
  </td>
  <td>
  <img src="<?php echo base_url();?>assets/files/sports/swimming.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                        <h4 class="text-center">Swimming Pool</h4>
  </td>
</tr>
              </table>

                <div class="col-md-12">
                    <ul class="list theme-colored angle-double-right">
                        <li>
                            In the complex of Indoor games one Table tennis sports is available for Students and Staffs to play.</li>
                          <li> Swimming Pool</li>

                            <li> Table tennis Timings:  Morning 05:30 am to 07:30 am</li>

                                   <li> Evening 05:30 pm to 07:30 pm.</li>

                            <li>  Swimming Pool Timings:  Morning 06:00 am to 08:00 am</li>

                              <li> Afternoon 02:30 pm to 06:00 pm.</li>


                                         </ul>
                      
                    </ul>

<h4>
MCE students details of sports & games facilities<?php echo anchor('assets/files/sports/MCE Sports Facilitys.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
               
          
                         <h4>
MCE students VTU sports & games Achievement for the year 2018-23<?php echo anchor('assets/files/sports/MCE Students Achivements  Photos.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
 <h4>
VTU Inter Collegiate sports selection dates Of the year 2023-24<?php echo anchor('assets/files/sports/vtu sports selection.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
<h4>
VTU Inter Collegiate sports/games selection trails for the year 2023-24<?php echo anchor('assets/files/sports/VTU GAMES SELECTION TRAILS.jpeg','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
<h4>
Calendar of VTU Inter Collegiate sports/games for the year 2023-24<?php echo anchor('assets/files/sports/VTU-Sports-Calendar-2023-24-Even Sem.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
<h4>
   VTU state Level Handball(M)Championship and selection trails 2024<?php echo anchor('assets/files/sports/invitation of handball.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
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