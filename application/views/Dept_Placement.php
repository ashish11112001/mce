
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
                   <li class="active text-gray-silver">Placements</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
            <div class="col-md-8 pull-right flip sm-pull-none">
              <div class="row list-dashed">
                <div class="col-md-12">
                  <!-- Slider Revolution Start -->

                  <!-- end .rev_slider_wrapper -->
                 
                  <!-- Slider Revolution Ends -->
                  <h4 class="text-blue">Placement <?=$parentMenu;?></h4>
                  <p class="text-justify"><?php echo $departmentsDetails->placement;?></p>
                  <?php
                    if($Details != null){
                        $table_setup = array ('table_open'=> '<table class="table table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
                          $this->table->set_template($table_setup);
                          $this->table->set_heading(array('data' => 'S.No', 'width' => '5%'),
                                            array('data' => 'Title', 'width' => '80%'),
                                            array('data' => 'Action', 'width' => '15%')
                                            );
                        $i=1;
                        foreach ($Details as $Details1) {
                            if($Details1->file_type == "F"){
                                $fileName = $Details1->details;
                                $files = $Details1->file_names;
                                $files1 = pathinfo($files, PATHINFO_FILENAME);
                                $name = str_replace('_', ' ', $fileName);
                                $btn = anchor('assets/placements/'.$files,'<i class="fa fa-fw fa-download"></i> Download','class="btn btn-danger btn-xs" target="_blank"');
                            }

                            if($Details1->file_type == "L"){
                                $name = anchor($Details1->url, $Details1->file_names,'target="_blank"');
                                $btn = anchor($Details1->url,'<i class="fa fa-fw fa-eye"></i> View','class="btn btn-danger btn-xs" target="_blank"');
                            }
                            

                
                          
                              $this->table->add_row($i++,
                                        $name,
                                        $btn
                                    );
                        }
                        echo $this->table->generate();
                      } 
                ?>

                </div>
              </div>

            </div>
            <div class="col-md-4">
            <?php
                        $sideBar = departmentSideBar($mainMenu, $parentMenu, $activeMenu);
                        print_r($sideBar);
                    ?>
    
           
            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- end main-content -->