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
                  <li class="active text-gray-silver">Programmes</li>
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
                <h3 class="text-theme-colored mt-0"><?=$parentMenu;?> Programmes</h3>

                <div id="accordion1" class="panel-group accordion">
                    <?php
                  if($Programmes != null) {
                    foreach ($Programmes as $Programmes1) {
                ?>
                    <div class="panel">
                        <div class="panel-title">
                            <a data-toggle="collapse" href="#accordion1<?=$Programmes1->id;?>" class="active"
                                aria-expanded="true"> <span class="open-sub"></span>
                                <?=$Programmes1->course_name.' ['.$Programmes1->course_type.']';?></a>
                        </div>
                        <div id="accordion1<?=$Programmes1->id;?>" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                            <div class="content">
                                <table class="table">
                                    <tr>
                                        <th width="20%">Course Name</th>
                                        <td width="2%">:</td>
                                        <td width="78%"><?=$Programmes1->course_name;?></td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>:</td>
                                        <td><?=$courseTypes[$Programmes1->course_type];?></td>
                                    </tr>
                                    <tr>
                                        <th>Year of Approval</th>
                                        <td>:</td>
                                        <td><?=$Programmes1->year_of_approval;?></td>
                                    </tr>
                                    <tr>
                                        <th>Intake</th>
                                        <td>:</td>
                                        <td><?=$Programmes1->intake;?></td>
                                    </tr>
                                    <?php if($Programmes1->accreditations){ ?>
                                    <tr>
                                        <th>Accreditations</th>
                                        <td>:</td>
                                        <td><?=$Programmes1->accreditations;?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($Programmes1->collaborations){ ?>
                                    <tr>
                                        <th>Collaborations</th>
                                        <td>:</td>
                                        <td><?=$Programmes1->collaborations;?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($Programmes1->memberships){ ?>
                                    <tr>
                                        <th>Memberships</th>
                                        <td>:</td>
                                        <td><?=$Programmes1->memberships;?></td>
                                    </tr>
                                    <?php } ?>
                                </table>

                                <?php
                                    $PEOs = $this->admin_model->getDetailsbyfieldSort($Programmes1->id,'pid','id','ASC','peos')->result();
                                    if($PEOs != null){
                                ?>
                                <h5 class="text-theme-colored mt-20">Program Educational Objectives (PEOs)</h5>
                                <table class="table" width="100%" cellspacing="0">
                                    <?php
                                        $i=1;
                                        foreach ($PEOs as $PEOs1) {
                                    ?>
                                    <tr>
                                        <th width="10%"><?="PEO".$i++;?></th>
                                        <td width="90%" class="text-justify"><?=$PEOs1->objective_name;?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php } ?>

                                <?php
                                    $PSOs = $this->admin_model->getDetailsbyfieldSort($Programmes1->id,'pid','id','ASC','psos')->result();
                                    if($PSOs != null){
                                ?>
                                <h5 class="text-theme-colored mt-20">Program Specific Outcomes (PSOs)</h5>
                                <table class="table" width="100%" cellspacing="0">
                                    <?php
                                        $i=1;
                                        foreach ($PSOs as $PSOs1) {
                                    ?>
                                    <tr>
                                        <th width="10%"><?="PSO".$i++;?></th>
                                        <td width="90%" class="text-justify"><?=$PSOs1->outcome_name;?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php } ?>

                                <?php
                                    $POs = $this->admin_model->getDetailsbyfieldSort($Programmes1->id,'pid','id','ASC','pos')->result();
                                    if($POs != null){
                                ?>
                                <h5 class="text-theme-colored mt-20">Program Outcomes (POs)</h5>
                                <table class="table" width="100%" cellspacing="0">
                                    <?php
                                        $i=1;
                                        foreach ($POs as $POs1) {
                                    ?>
                                    <tr>
                                        <th width="10%"><?="PO".$i++;?></th>
                                        <td width="90%" class="text-justify"><?=$POs1->outcome_name;?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                 }
                ?>
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