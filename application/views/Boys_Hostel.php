
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li class="text-gray-silver"><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                   <li class="active text-gray-silver">Other Wings</li>
                    <li class="active text-gray-silver">Facilities</li>
                  <li class="active text-gray-silver">Hostel</li>
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
                <p class="text-justify">Boys Hostel Malnad College of Engineering Boys Hostel started during the year 1961 cater to the needs of the students who are coming from far away places. Now, the hostel is very well equipped with modernized kitchen and huge dining hall which can accommodate nearly 260 students at a time for lunch/dinner. Hoysala, Hemavathi and Hasanambaare the 3 blocks which accommodate nearly 600 to 650 students in 324 rooms. All the rooms are provided with cots, tables, chairs and ceiling fans. Good and well maintained rooms, corridors, bath and Water closets.</p>
                <p class="text-justify">Ragging free hostel campus in secured by security services, Internet browsing centre has been provided to all the boarders of the hostel. Generator facility, 24 hrs. Water supply, hot water for bathing and hygienic food, aquagard water for drinking is served to all the boarders of the hostel. Two TV rooms are made available and indoor games and sports are encouraged.</p>
                <p class="text-justify">The hostel is running under the able leadership of the present Administrator/Warden Prof., G Manjunath. Very well managed office and disciplined staff are also an added quality to MCE Boys Hostel. For further information contact.</p>
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10%">S.No</th>
                             <th width="40%">NAME & DESIGNATION</th>
                            <th width="10%">Contact</th>
                            <th width="5%">Members</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td>Prof. G. Manjunath Associate Professor in IP & E/ Warden of Boys Hostel	</td>
                            <td></td>
                            <td> <img class="img-responsive img-fullwidth img-thumbnail" src="<?=base_url().'assets/images/facilities/Manjunath.png'?>" alt="Manjunath"></td>
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