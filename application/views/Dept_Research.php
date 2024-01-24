    <!-- Start main-content -->
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$parentMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">Academics</li>
                  <li class="active text-gray-silver">Research</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-9 blog-pull-right">
                <h3 class="text-theme-colored mt-0"><?=$parentMenu.' '.$page_title;?></h3>
                <?php $activityType = $this->globals->activityTypes(); ?>
                <ul id="researchTab" class="nav nav-tabs boot-tabs">
                    <li class="active"><a href="#research" class="tabBorderDesign" data-toggle="tab">Research</a></li>
                    <li class=""><a href="#faculty_scholars" class="tabBorderDesign" data-toggle="tab">Faculty & Scholars</a></li>
                    <li class=""><a href="#facilities" class="tabBorderDesign" data-toggle="tab">Facilities</a></li>
                    <li class=""><a href="#grants" class="tabBorderDesign" data-toggle="tab">Grants</a></li>
                    <li class=""><a href="#publications" class="tabBorderDesign" data-toggle="tab">Publications</a></li>
                    <li class=""><a href="#collaborations" class="tabBorderDesign" data-toggle="tab">Collaboration/MOU's</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="research">
                        <?php
                        $researchAreas = $this->admin_model->getDetailsbyfield($dept_id,'dept_id','research_areas')->result();
                        if($researchAreas != null) {
                          echo "<ul class='list theme-colored check'>";
                          foreach($researchAreas as $researchAreas1){
                            echo "<li class='list-group-item'>".$researchAreas1->research_area."</li>";
                          }
                          echo "</ul>";
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="faculty_scholars">
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <?php 
                                    $researchFaculties = $this->admin_model->getDetailsbyfieldSort($dept_id,'dept_id','year_of_award','DESC','research_faculties')->result();
                                    if($researchFaculties != null) {
                                    echo '<h4>Research Faculty Details</h4>';
                                ?>
                                <table class="table table-hover">
                                    <tr>
                                        <th widt    h="5%">S.No</th>
                                        <th width="30%">Research Supervisor</th>
                                        <th width="30%">Specialization</th>
                                        <th width="20%">Awarded University</th>
                                        <th width="15%">Year of Award</th>
                                    </tr>
                                    <?php  $i = 1;
                                        foreach($researchFaculties as $researchFaculties1){	
                                    ?>
                                    <tr>
                                        <td><?=$i++;?>.</td>
                                        <td><?=$researchFaculties1->faculty_name;?></td>
                                        <td><?=$researchFaculties1->research_area;?></td>
                                        <td><?=$researchFaculties1->university;?></td>
                                        <td><?=$researchFaculties1->year_of_award;?></td>
                                    </tr>
                                    <?php  } ?>
                                </table>
                                <?php } ?>
                                <?php 
                                    $researchScholars = $this->admin_model->getDetailsbyfieldSort($dept_id,'dept_id','year','DESC','research_scholars')->result();
                                    if($researchScholars != null) {
                                    echo '<h4>Research Scholars</h4>';
                                ?>
                                <table class="table table-hover">
                                    <tr>
                                        <th width="5%">S.No</th>
                                        <th width="30%">Student Name</th>
                                        <th width="30%">Guide Name</th>
                                       
                                        <th width="20%">Field of Study</th>
                                        <th width="15%">Scholar Type</th>
                                        <th width="15%">Research Type </th>
                                        <th width="15%">Year of Admission</th>
                                    </tr>
                                    <?php  $i = 1;
                                        $scholarTypes = array("1" => "Part Time", "2" => "Full Time");
                                        $researchTypes = array("1" => "Ph.D", "2" => "M.Sc (Engg by Research)");
                                        foreach($researchScholars as $researchScholars1){	
                                        
                                    ?>
                                    <tr>
                                        <td><?=$i++;?>.</td>
                                        <td><?=$researchScholars1->student_name;?></td>
                                        <td><?=$researchScholars1->guide_name;?></td>
                                        
                                        <td><?=$researchScholars1->field_of_study;?></td>
                                        <td><?=$scholarTypes[$researchScholars1->scholar_type];?></td>
                                        <td><?=$researchTypes[$researchScholars1->research_type];?></td>
                                        <td><?=$researchScholars1->year;?></td>
                                    </tr>
                                    <?php  } ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="facilities">
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <?php 
                                    $researchFacilities = $this->admin_model->getDetailsbyfield($dept_id,'dept_id','research_facilities')->result();
                                    if($researchFacilities != null) {
                                ?>
                                <div id="accordion1" class="panel-group accordion">
                                    <?php  foreach ($researchFacilities as $researchFacilities1) { ?>
                                    <div class="panel">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" href="#accordion1<?=$researchFacilities1->id;?>"
                                                class="active" aria-expanded="true"> <span class="open-sub"></span>
                                                <?=$researchFacilities1->facility;?></a>
                                        </div>
                                        <div id="accordion1<?=$researchFacilities1->id;?>"
                                            class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                                            <div class="content">
                                                <table class="table">
                                                    <tr>
                                                        <th width="20%">Contact Person Name</th>
                                                        <td width="2%">:</td>
                                                        <td width="78%"><?=$researchFacilities1->person;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="20%">Description</th>
                                                        <td width="2%">:</td>
                                                        <td width="78%"><?=nl2br($researchFacilities1->description);?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="grants">
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <?php $researchGrants = $this->admin_model->getDetailsbyfield($dept_id,'dept_id','research_grants')->result();
                                if($researchGrants != null) {
                            ?>
                                <table class="table table-hover">
                                    <?php  foreach ($researchGrants as $researchGrants1) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-1"> <b>Project Title : </b>
                                                <?=$researchGrants1->project_title;?></p>
                                            <p class="mb-1"> <b>Sanctioned Year : </b>
                                                <?=$researchGrants1->sanctioned_year;?></p>
                                            <p class="mb-1"> <b>Amount : </b> <?=$researchGrants1->amount;?></p>
                                            <p class="mb-1"> <b>Funding/Sanction agency : </b>
                                                <?=$researchGrants1->agency;?></p>
                                            <p class="mb-1"> <b>Status : </b> <?=$researchGrants1->status;?></p>
                                            <p class="mb-1"> <b>Principal Investigators : </b>
                                                <?=$researchGrants1->investigators;?></p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="publications">
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <?php $researchPublications = $this->admin_model->getDetailsbyfield($dept_id,'dept_id','research_publications')->result();
                                if($researchPublications != null) {
                            ?>
                                <table class="table table-hover">
                                    <?php  foreach ($researchPublications as $researchPublications1) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-1"> <b>Student Name : </b>
                                                <?=$researchPublications1->student_name;?></p>
                                            <p class="mb-1"> <b>Title of the Paper : </b>
                                                <?=$researchPublications1->publication_title;?></p>
                                            <p class="mb-1"> <b>Research Description : </b>
                                                <?=$researchPublications1->description;?></p>
                                            <p class="mb-1"> <b>Faculty Coordinator : </b>
                                                <?=$researchPublications1->coordinator;?></p>
                                            <?php if($researchPublications1->link) { ?>
                                            <p class="mb-1"> <b>Reference Link: </b>
                                                <?=anchor($researchPublications1->link,$researchPublications1->link,'target="_blank"');?>
                                            </p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="collaborations">
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <?php $researchCollaborations = $this->admin_model->getDetailsbyfield($dept_id,'dept_id','research_collaborations')->result();
                                if($researchCollaborations != null) {
                            ?>
                                <table class="table table-hover">
                                    <?php  foreach ($researchCollaborations as $researchCollaborations1) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-1"> <b>Title : </b>
                                                <?=$researchCollaborations1->title;?></p>
                                            <?php if($researchCollaborations1->description) { ?>
                                            <p class="mb-1"> <b>Description : </b>
                                                <?=$researchCollaborations1->description;?></p>
                                            <?php } ?>
                                            <?php if($researchCollaborations1->file_names) { 
                                                echo "<p class='mb-1'> <b>Reference Files: </b> <br> ";
                                                $fileNames = unserialize($researchCollaborations1->file_names);
                                                foreach($fileNames as $key => $value){
                                                    echo '<li>'.anchor('assets/departments/'.$short_name.'/research/'.$value, $value, 'target="_blank"').'</li>';
                                                }
                                                echo "</p>";
                                             } ?>
                                            <?php if($researchCollaborations1->link) { ?>
                                            <p class="mb-1"> <b>Reference Link: </b> <br>
                                                <?=anchor($researchCollaborations1->link,$researchCollaborations1->link,'target="_blank"');?>
                                            </p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="sidebar sidebar-left mt-sm-30">
                    <?php
                        $sideBar = departmentSideBar($mainMenu, $parentMenu, $activeMenu);
                        print_r($sideBar);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>