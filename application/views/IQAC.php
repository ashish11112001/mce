
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.png">
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
            <div class="col-md-9 pull-right flip sm-pull-none">
              <div class="row mt-10">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     <?=$activeMenu;?></span></h3>
                    
							<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 3000}">
								<div>
									<div class="testimonial testimonial-style-2">
										<blockquote>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.</p>
										</blockquote>
										<div class="testimonial-arrow-down"></div>
										<div class="testimonial-author">
											<img src="img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
											<p><strong class="font-weight-extra-bold">John Smith</strong><span>CEO & Founder - Okler</span></p>
										</div>
									</div>
								</div>
								<div>
									<div class="testimonial testimonial-style-2">
										<blockquote>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										</blockquote>
										<div class="testimonial-arrow-down"></div>
										<div class="testimonial-author">
											<img src="img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
											<p><strong class="font-weight-extra-bold">John Smith</strong><span>CEO & Founder - Okler</span></p>
										</div>
									</div>
								</div>
							</div>
						  <h4>Internal Quality Assurance Cell (IQAC)</h4>
						  <p class="text-justify">Malnad College of Engineering has established the Internal Quality Assurance Cell (IQAC) as a quality sustenance division as per the guidelines of UGC. The cell is intended for planning, guiding and monitoring quality assurance and quality enhancement activities of the institute. It will channelize and standardize the efforts and measures of the institution towards academic excellence. The cell documents and reports various activities of the college for various higher education requirements. The IQAC regularly undertake few activities such as Academic Audit, preparation of Annual Report, participation in NIRF, NAAC, NBA, Affiliations and all other quality audit process of the institute. The cell is constituted under the chairmanship of Principal with a senior faculty as a Coordinator. It consists of management representative, eminent persons from industry & academia along with faculty from MCE nominated by the principal.</p>
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10%">S.No</th>
                            <th width="10%">photo</th>
                             <th width="40%">Name & Department</th>
                            <th width="20%">Designation</th>
                            <th width="20%">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/Administration/Dr.Y.M.Shashidhara.jpg'?>" alt="Dr. B . UMA"></td>
                            <td>Dr.Y.M.Shashidhara , Department of Automobile	</td>
                            <td>Professor</td>
                            <td>IQAC Coordinator</td>
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