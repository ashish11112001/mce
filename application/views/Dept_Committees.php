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
                  <li class="active text-gray-silver">Committees</li>
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
                <h3 class="text-theme-colored mt-0"><?=$parentMenu;?> Committees</h3>

                <div id="accordion1" class="panel-group accordion">
                    <?php 
                    // print_r($Committees);
                  if($Committees != null) {
                    foreach ($Committees as $Committees1) {
                        $Members = $this->admin_model->getCommitteeMembers($Committees1->id)->result();
                        if($Members != null){
                ?>
                    <div class="panel">
                        <div class="panel-title">
                            <a data-toggle="collapse" href="#accordion1<?=$Committees1->id;?>" class="active"
                                aria-expanded="true"> <span class="open-sub"></span>
                                <?=$Committees1->name;?></a>
                        </div>
                        <div id="accordion1<?=$Committees1->id;?>" class="panel-collapse collapse in" role="tablist"
                            aria-expanded="true">
                            <div class="content">
                                <!-- <h5 class="text-theme-colored mt-20">Program Educational Objectives (PEOs)</h5> -->
                                <table class="table" width="100%" cellspacing="0">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Position in Committee</th>
                                    </tr>
                                    <?php
                                        $i=1;
                                        foreach ($Members as $Members1) {
                                    ?>
                                    <tr>
                                        <td width="5%"><?=$i++;?></td>
                                        <td width="60%" class="text-justify">
                                            <?php
                                                echo $Members1->name;
                                                echo ($Members1->designation)?'<br>'.$Members1->designation:null;
                                                echo ($Members1->organisation)?'<br>'.$Members1->organisation:null;
                                                echo ($Members1->email)?'<br>'.$Members1->email:null;
                                            ?>
                                        </td>
                                        <td width="35%" class="text-justify"><?=$Members1->position;?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                     }
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