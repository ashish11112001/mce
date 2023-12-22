
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
                  <li class="active text-gray-silver">NIRF</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
       <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
            <div class="col-md-12 pull-right flip sm-pull-none">
              <div class="row mt-10">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                     The National Institutional Ranking Framework (NIRF)</span></h3>
                  
                   
                   <p class="text-justify"> The National Institutional Ranking Framework (NIRF) was approved by the MHRD and launched by the Honourable Minister of Human Resource Development on 29th September 2015.</p>
                    <p class="text-justify">This framework outlines a methodology to rank institutions across the country. The methodology draws from the overall recommendations broad understanding arrived at by a Core Committee set up by MHRD, to identify the broad parameters for ranking various universities and institutions. The parameters broadly cover “Teaching, Learning and Resources,” “Research and Professional Practices,” “Graduation Outcomes,” “Outreach and Inclusivity,” and “Perception”.</p>
                    
                   <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">S.No</th>
                            <th width="65%">Details</th>
                            <th width="30%">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>NIRF DATA-Engineering 2021 </td>
                            <td><?php echo anchor('assets/files/NIRF/1.pdf','<i class="fa fa-download"></i> Click Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>NIRF DATA-Overall 2020</td>
                            <td><?php echo anchor('assets/files/NIRF/2.pdf','<i class="fa fa-download"></i> Click Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>Institute Data for NIRF - 2022</td>
                            <td><?php echo anchor('assets/files/NIRF/3.pdf','<i class="fa fa-download"></i> Click Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>Institute Data for NIRF - 2023</td>
                            <td><?php echo anchor('assets/files/NIRF/4.pdf','<i class="fa fa-download"></i> Click Here','class="btn btn-warning btn-sm" target="_blank"');?></td>
                        </tr>
                       
                    </tbody>
                </table>
                
                
                   
                
                </div>


              </div>

            </div>
           
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->