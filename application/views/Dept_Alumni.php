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
                  <li class="active text-gray-silver">Alumni </li>
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
                <h3 class="text-theme-colored mt-0"><?=$parentMenu;?> Alumni</h3>
                <div class="section-content">
                    <div class="row multi-row-clearfix">
                        <div class="col-sm-12 col-md-12 text-left sm-text-center">
                            <?php  
                            foreach($staff as $alumni1){

                               $url = glob('./assets/departments/'.$short_name.'/alumni/profile_'.$alumni1->id.'-*.jpg');
					           if($url){
						          if (file_exists($url[0])) {
							        $profile_pic = base_url().$url[0];
						          }else {
							        $profile_pic = base_url()."assets/departments/avatar.jpg";
						          }	
					            }else {
						           $profile_pic = base_url()."assets/departments/avatar.jpg";
					            }
                        ?>
                            <div class="upcoming-events media maxwidth400 bg-light mb-20">
                                <div class="row equal-height">
                                    <div class="col-sm-2 pr-0 pr-sm-15">
                                        <div class="thumb p-15">
                                            <img class="img-thumbnail img-fullwidth" src="<?=$profile_pic;?>"
                                                alt="<?=$alumni1->name;?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 border-right pl-0 pl-sm-15">
                                        <div class="event-details alumni-details p-15 mt-10">
                                            <h4 class="name"><?=$alumni1->name;?></h4>
                                            <h5 class="occupation"><?=$alumni1->designation;?></h5>
                                            <h5 class="additional">
                                                <?php 
                                                   echo ($alumni1->mobile) ? '<span class="pr-20"><i class="fa fa-phone"></i> '.$alumni1->mobile.'</span>' : null;
                                                   echo ($alumni1->email) ? '<span><i class="fa fa-envelope-o"></i> '.$alumni1->email.'</span>' : null;
                                                ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  
                          }
                        ?>
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