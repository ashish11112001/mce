<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <div class="col-md-9 blog-pull-right">
        <h3 class="text-theme-colored text-uppercase mt-0"><?= $activeMenu; ?></h3>
        <div class="row list-dashed mt-20">
        
  <iframe src="<?=base_url();?>assets/files/Administration.pdf" width="100%" height="800px" style="padding:20px 0px"></iframe>
        </div>


      </div>
      <div class="col-sm-12 col-md-3">
        <div class="sidebar sidebar-left mt-sm-30">
          <?php
          $sideBar = sideBar($mainMenu, $parentMenu, $activeMenu);
          print_r($sideBar);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>