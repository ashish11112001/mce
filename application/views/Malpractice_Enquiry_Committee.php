
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
                  <li class="active text-gray-silver">Examination</li>
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
                     <?=$activeMenu;?></span></h3>
                    <h5>The functions of MEC are to:</h5> 
                    <ul class="list theme-colored angle-double-right">
                        <li class="text-justify">Conduct enquiry of students involved in malpractice.</li>
                        <li class="text-justify">Deliberate and decide on the quantum of punishment depending upon the gravity of the offense (The general punishment for all cases of malpractice, in SEE’s - theory or practical examinations, shall be: awarding of F grade in the corresponding course, denial of permission to take up the immediate makeup SEE, allowing the student to re-register for the same semester only during the next year, i.e., after a break of one year, etc.).</li>
                    </ul>
                    
                    <table class="table table-bordered">
										
										<tbody>
											<tr>
												<td>
													Chairman:    
												</td>
												<td>
													Chief Superintendent of Examination or his Nominee
												</td>
											</tr>
											<tr>
											    	<td>
														Convener:    
												</td>
												<td>
													Dean (Exams)
												</td>
											</tr>
												<tr>
											    	<td>
														Members:   
												</td>
												<td>
													Dean(AA), Dean(SA), Concerned HOD and Faculty nominated by Chairman
												</td>
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