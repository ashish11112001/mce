
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
                     <h5 class="text-primary">  The functions of GRC are to:</h5>
                                     <ul class="list theme-colored angle-double-right" >
                                           <li>Receive written requests/complaints from students regarding any kind of academic grievances, deliberate and suggest appropriate remedies in genuine cases.</li>
                                           <li>Recommend for implementation, modification of grades, if any, through the proper mechanism.</li>
                                           <li>Conduct enquiry of students involved in malpractice in CIEs, deliberate and decide on the quantum of punishment.</li>
                    </ul>
                    <b>To lodge an online grievance on any issues within the campus please follow the below steps</b><br><br>
                                    <ol class="list list-ordened list-ordened-style-3">
										<li>Click on the given link <b><a href="http://3.108.159.245/auth/login.php" target=_blank class="text-primary">(Mcehassan Online Grievance Portal Link )</a></b>to enter Online Grievance Portal </li>
										<li>Click on Students / Parents / Faculty Members / Non Teaching Staff as required.</li>
										<li>Click on New user registration</li>
										<li>Enter / Select the details and students shall choose the course completion date/month as 30/06.</li>
										<li>Click on register and you will receive the password at your registered mail ID after approval.</li>
										<li>Login using your registered mail ID / Mobile No. and the password.</li>
										<li>After successful login, lodge a grievance.</li>
									</ol><br>
                 <b>Details of Grievance Cell Members:</b>
                   <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10%">S.No</th>
                            <th width="30%">Name</th>
                            <th width="20%">Designation</th>
                            <th width="20%">Contact Number</th>
                            <th width="20%">E-Mail ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>	Dr. S Pradeep Principal</td>
                            <td>Chairman</td>
                            <td>9448719949</td>
                            <td>principal@mcehassan.ac.in</td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>	Dr. H.J.Amarendra
Professor & Dean (Planning and Development)</td>
                            <td>Member</td>
                            <td>9448066954</td>
                            <td>hja@mcehassan.ac.in</td>
                        </tr>
                    
                        <tr>
                           <td><?=$i++;?></td>
                            <td>Dr. Rajanna.S
Professor and Dean (Examination)</td>
                            <td>Member</td>
                            <td>9740620519</td>
                            <td>sp@mcehassan.ac.in</td>
                        </tr>
                        <tr>
                           <td><?=$i++;?></td>
                            <td>Dr Chandrika J
                            Professor and Dean ( Academic Affairs )</td>
                            <td>Member</td>
                            <td>9448871082</td>
                            <td>jc@mcehassan.ac.in</td>
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