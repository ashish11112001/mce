
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
                  	
                <div class="col-md-4">
                    <img src="<?php echo base_url();?>assets/images/nss/nss.jpg" alt="shuttle"
                        class="img-responsive img-fullwidth img-thumbnail">
                       
                </div>
                <div class="col-md-8">
                    
                    <p class="text-justify"> The National Service Scheme (NSS) is a Central Sector Scheme of Government of India, Ministry of Youth Affairs & Sports. It provides an opportunity for the student youth of Technical Institution, Graduate & Post Graduate at colleges and University level of India to take part in various government led community service activities & programs. The sole aim of the NSS is to provide hands-on experience to young students in delivering community service.</p>
                    <h4>Feature of Logo:</h4>
                    <p class="text-justify">All the youth volunteers who opt to serve the nation through the NSS led community service wear the NSS badge with pride and a sense of responsibility towards helping needy.
                     The Konark wheel in the NSS badge having 8 bars signifies the 24 hours of a the day, reminding the wearer to be ready for the service of the nation round the clock i.e. for 24 hours.</p>
                    <p class="text-justify">Red colour in the badge signifies energy and spirit displayed by the NSS volunteers. The Blue colour signifies the cosmos of which the NSS is a tiny part, ready to contribute its share for the welfare of the mankind.</p>
                    <p class="text-justify"><strong>Motto:</strong>NOT ME BUT YOU</p>
                    </div>
                    
                     <div class="col-md-8">
                    
                   
                    <h4>Major Activities:</h4>
                    <ul class="list theme-colored angle-double-right" >
                        <li>National Integration Camp (NIC)</li>
                         <li> Adventure Program</li>
                          <li>NSS Republic Day Parade Camp</li>
                          <li>National Youth Festivals</li>
                          <li>National Service Scheme Award</li>
                    </ul>
                     </div>
                    
                     
                   
                   
                    
                        	
                <div class="col-md-4">
                    <img src="<?php echo base_url();?>assets/images/nss/" alt="nss"
                        class="img-responsive img-fullwidth img-thumbnail">
                       
                </div>
                    
                    
                    <div class="col-md-12">
                       <table class="table ">
                 
                   <tbody>
                       <tr>
                   <td><?php echo anchor('assets/images/nss/Har Ghar Tiranga.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>Har Ghar Tiranga” on the occasion of Azadi ka Amrit Mahotsav - 75years of independence day celebration</td>
                   </tr>
                   <tr>
                   <td><?php echo anchor('assets/images/nss/NSS all programe.pdf','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?>To view activities conducted by MCE-NSS in 2022</td>
                   </tr>
                  <tr>
                   <td><?php echo anchor('https://www.nss.gov.in/','<i class="fa fa-eye"></i> Click here','class="btn btn-warning btn-sm" target="_blank"');?> To view National NSS website</td> 
                   </tr>
              </tbody>
               </table>
               <p ><strong>Contact Us: </strong></p>
                 <p ><strong style=" color:#c02140;">Mr. Vijayakumar G Tile<br/>Mobile: 9916220730&nbsp;</strong><br /><span >NSS Co-ordinator,&nbsp;</span><br>Asst. Professor in Mechanical Engg.&nbsp;</span></p>  
              
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