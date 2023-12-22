
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
                  <li class="active text-gray-silver">Other wings</li>
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
                     <?=$activeMenu;?></span></h3>
                     <h5 class="text-underline">About the Language Lab:</h5>
                     <p class="text-justify">A language Laboratory is available at the Institute level with 30+1 users.</p>
                     <p class="text-justify">The language lab software consists of the following modules.</p>
                     <ul class="list theme-colored angle-double-right" >
                         <li>English module</li>
                         <li>Career module</li>
                         <li>Aptitude module</li>
                    </ul>
                     <p class="text-justify">Students who are weak in English communication skills – reading, writing, and comprehension will be identified by the faculty.  Teaching communication skills course and will be given the assignment to work in the language lab. In addition, faculty and students if interested can come to the language lab and work on the above modules.</p>
                     <p class="text-justify">One faculty from each Engineering department will officiate as department-level coordinators for language lab. The department coordinators will make a list of students in consultation with the Communication skills course faculty and the same will be forwarded to the institute coordinator.</p>
                     <p class="text-justify">The laboratory staff in the language lab will assign the user name and password for each student.</p>
                     <p class="text-justify">The students will work on the specified module and the report of their performance is generated which will be submitted to the department coordinator for further action.</p>
                     <b class="text-danger">Coordinator:</b><br>
                     <b>Prof. Naveen Kumar C M,<br>

Assistant professor,<br>

Department of Electronics and Instrumentation Engineering.

</b>
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