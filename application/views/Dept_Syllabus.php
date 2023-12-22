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
                  <li class="active text-gray-silver">Syllabus / Time Table/ Calender of events</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-9 blog-pull-right">
                <h3 class="text-theme-colored text-uppercase mt-0"><?=$parentMenu;?> Syllabus / Time Table/ Calender of events</h3>
                <?php
                    if($Details != null){
                        $table_setup = array ('table_open'=> '<table class="table table-hover js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
                          $this->table->set_template($table_setup);
                          $this->table->set_heading(array('data' => 'S.No', 'width' => '5%'),
                                            array('data' => 'Course/Subject', 'width' => '80%'),
                                            array('data' => 'Download', 'width' => '15%')
                                            );
                        $i=1;
                        foreach ($Details as $Details1) {
                            $fileName = null;
                            $files = $Details1->file_names;
                            $files1 = pathinfo($files, PATHINFO_FILENAME);
                            $name = str_replace('_', ' ', $files1);

                        //   $fileName = null;
                        //   $files = $Details1->file_names;
                        //   if($files){
                        //       $fileNames = unserialize($files);
                        //       $fileName = $fileNames[0];					 
                        //       $fileName1 = pathinfo($fileName, PATHINFO_FILENAME);
                        //       $name = str_replace('_', ' ', $fileName1);
                        //   }
                          
                              $this->table->add_row($i++,
                                        $name,
                                        anchor('assets/departments/'.$short_name.'/syllabus/'.$files,'<i class="fa fa-fw fa-download"></i> Download','class="btn btn-danger btn-xs" target="_blank"')
                                    );
                        }
                        echo $this->table->generate();
                      } 
                ?>
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
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>admin_assets/js/pages/be_tables_datatables.min.js"></script>