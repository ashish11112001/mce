
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
                  	
			    <!--<h3 class="text-theme-colored mt-0">Network Control Centre-NCC</h3>-->
                <div class="col-md-5">
                    <img src="<?php echo base_url();?>assets/images/network/ncc.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                       
                </div>
                <div class="col-md-7">
                    
                    <p class="text-justify"> A network control center (NCC) is a central location from which network administrators manage, control and monitor one or more networks. The overall function is to maintain optimal network operations across a variety of platforms, mediums and communications channels. NCCs are responsible for monitoring power failures, communication line alarms (such as bit errors, framing errors, line coding errors, and circuits down) and other performance issues that may affect the network.</p>
                    <p class="text-justify">MCE Network Control Center holds all network activities carried out in the MCE campus with proper security devices. This MCE-NCC helps staffs & students to access free Wi-fi facility within the campus.</p>
                    </div>
                    
                    <div class="col-md-12">
                         <h4>
MCE Network Control Center IT Policy <?php echo anchor('assets/images/network/NCC IT Policy.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?></h4>
               <table class="table ">
                 
                   <tbody>
                       <tr>
                   <td><?php echo anchor('assets/images/network/E-Mail(T).pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>To get form for creating E-mail account for- Teaching Staff.</td>
                   </tr>
                   <tr>
                   <td><?php echo anchor('assets/images/network/E-Mail(NT).pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>To get form for creating E-mail account for- Non-Teaching Staff</td>
                   </tr>
                  <tr>
                   <td><?php echo anchor('assets/images/network/Wifi_Staff.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?> To get form for Wireless Internet Access- Staff.</td> 
                   </tr>
                   <tr>
                    <td><?php echo anchor('assets/images/network/Wifi_Stud.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>To get form for Wireless Internet Access- Student</td> 
                    </tr>
                    <tr>
                     <td><a href="http://192.168.10.251/MCEQ/" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-eye"></i> Click here</a> To raise query for issues related to System H/w, S/w and Network connection(wired or wireless).</td> 
             </tr>
              </tbody>
               </table>
               </div>
               
               
                <h4>Voice Over Internet Protocol</h4>
                <div class="col-md-6">
                    
                   
                     <img src="<?php echo base_url();?>assets/images/network/voip.jpg" alt="tt"
                        class="img-responsive img-fullwidth img-thumbnail">
                       </div>
                   
                
                  <div class="col-md-6">
                      <p class="text-justify">Voice over Internet Protocol(VoIP) is established within our campus. College staffs are requested to utilize effectively to make calls with a four-digit extension number assigned to every individual. </p>
                      <p class="text-justify">To make use of VoIP users must install VoIP enabled app into their mobile phones. We recommend installing the "Grandstream Wave GS Wave" app to enable the VoIP facility. </p>
                      <p class="text-justify">To view, the list of VoIP Intercom Directory <a href="http://192.168.10.251/VOIP/" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-eye"></i> Click here</a> </p> 
                     </div>
                     <div class="col-md-12">
                      <p class="text-justify">Go through the following manual and/or Video tour in the install app and configure your Individual VoIP Intercom account.</p>
                      <p><?php echo anchor('assets/images/network/VoIP_Manual.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>  Click here to view the manual to install the GS Wave app and account configuration.</p>
                      <p class="text-justify">Below is the Video tour of installing the GS Wave app and Account Configuration.</p>
                     </div>
                
               
                    
                     <iframe src="<?=base_url();?>assets/files/network control center/VOIP.mp4" width="100%" height="400px" style="padding:20px 0px"></iframe>
								
							

						
					
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