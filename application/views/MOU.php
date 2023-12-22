
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
                  
                   
                  
                
               
                 <table class="table ">
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and Bharat Sanchar Nigam Limited(BSNL)</td>
                            <td><?php echo anchor('assets/images/mou/1.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and CIPET, Mysore</td>
                            <td><?php echo anchor('assets/images/mou/2.jpg','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and DHIO Research and Engineering Pvt. Ltd.</td>
                            <td><?php echo anchor('assets/images/mou/3.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and EAFT Technologies</td>
                            <td><?php echo anchor('assets/images/mou/4.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and Eagle Photonics</td>
                            <td><?php echo anchor('assets/images/mou/5.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and EMC Information Systems International</td>
                            <td><?php echo anchor('assets/images/mou/6.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and TEQIP under DTE-GOK</td>
                            <td><?php echo anchor('assets/images/mou/7.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and Best Engineering Aids & Consultancies Pvt. Ltd. (BEACON)</td>
                            <td><?php echo anchor('assets/images/mou/8.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and R&D Infrastructure, Dept. of Science and Technology, GOI</td>
                            <td><?php echo anchor('assets/images/mou/9.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and Engineer Materials Inc.("EM"), USA</td>
                            <td><?php echo anchor('assets/images/mou/10.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                         <tr>
                            <td><?=$i++;?></td>
                            <td>MOU between MCE and Competences Factory Pvt. Ltd., Bangalore</td>
                            <td><?php echo anchor('assets/images/mou/11.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <!--<tr>-->
                        <!--    <td><?=$i++;?></td>-->
                        <!--    <td>17-05-2023 Forenoon</td>-->
                        <!--    <td><?php echo anchor('assets/images/mou/017 FN.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--    <td><?=$i++;?></td>-->
                        <!--    <td>19-05-2023 Forenoon</td>-->
                        <!--    <td><?php echo anchor('assets/images/mou/19 FN.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--    <td><?=$i++;?></td>-->
                        <!--    <td>22-05-2023 Forenoon</td>-->
                        <!--    <td><?php echo anchor('assets/images/mou/022 FN.pdf','<i class="fa fa-eye"></i> View Here','class="btn btn-warning btn-sm" target="_blank"');?></td>-->
                        <!--</tr>-->
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