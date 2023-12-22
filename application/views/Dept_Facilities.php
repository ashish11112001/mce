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
                  <li class="active text-gray-silver">Facilities </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-8 blog-pull-right">
                <h3 class="text-theme-colored mt-0"><?=$parentMenu.' '.$page_title;?></h3>
                <?php if($facilities) { ?>
                <div class="section-content">
                    <div class="row multi-row-clearfix">
                        <div class="col-sm-12 col-md-12 text-left sm-text-center">
                            <table class="table">
                                <tr>
                                    <th width="5%">S.No</th>
                                    <th width="15%">Year</th>
                                    <th width="80%">Facility Details</th>
                                </tr>
                                <?php  $i = ($page) ? $page + 1 : 1;
                            foreach($facilities as $achievements1){	
                            ?>
                                <tr>
                                    <td><?=$i++;?>.</td>
                                    <td><?=$achievements1->academic_year;?></td>
                                    <td class="text-justify">
                                        <?=$achievements1->details;?>
                                        <?php
                                            if($achievements1->file_name){
                                                echo "<p>File: ".anchor('assets/departments/'.$short_name.'/facilities/'.$achievements1->file_name, $achievements1->file_name, 'target="_blank"').'</p>';
                                            }
                                            if($achievements1->url){
                                                echo "<p>Link: ".anchor($achievements1->url, 'Click Here.', 'target="_blank"').'</p>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php  } ?>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <nav>
                                    <ul class="pagination theme-colored xs-pull-center mb-xs-40">
                                        <?php echo $links;?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="col-sm-12 col-md-4">
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