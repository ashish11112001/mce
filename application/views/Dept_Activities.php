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
                  <li class="active text-gray-silver">Activities </li>
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
                <ul id="activitiesTab" class="nav nav-tabs boot-tabs">
                    <?php
                        foreach($activityType as $key => $value){
                            $active = ($key == 1) ? "active" : null;
                    ?>
                    <li class="<?=$active;?>"><a href="#<?=$key;?>" data-toggle="tab"><?=$value;?></a></li>
                    <?php        
                        }
                    ?>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <?php
                        foreach($activityType as $key => $value){
                            $active = ($key == 1) ? "in active" : null;
                    ?>
                    <div class="tab-pane fade <?=$active;?>" id="<?=$key;?>">
                        <?php
                                $activities = $this->admin_model->get_activities($dept_id, $key);
                                if($activities) {
                            ?>
                        <div class="row multi-row-clearfix">
                            <div class="col-sm-12 col-md-12 text-left sm-text-center">
                                <table class="table table-hover">
                                    <tr>
                                        <th width="5%">S.No</th>
                                        <th width="12%">Year</th>
                                        <th width="83%">Activities</th>
                                        
                                    </tr>
                                    <?php  $i = ($page) ? $page + 1 : 1;
                                            foreach($activities as $activities1){	
                                        ?>
                                    <tr>
                                        <td><?=$i++;?>.</td>
                                        <td><?=$activities1->academic_year;?></td>
                                        <td class="text-justify"><?=$activities1->details;?>
                                    <br>
                                    <?php if($activities1->file_names!='') {echo anchor('assets/activity/'.$activities1->file_names,'<i class="fa fa-fw fa-download"></i> Download','class="btn btn-danger btn-xs" target="_blank"'); } ?>
                                    </td>
                                        
                                    </tr>
                                    <?php  } ?>
                                </table>
                            </div>
                        </div>
                        <?php } else {  ?>
                        <div class="text-center mt-50">
                            <h5 class="text-gray">activities not yet created...!</h5>
                        </div>
                        <?php } ?>
                    </div>
                    <?php        
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