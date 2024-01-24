<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>admin_assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
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
                  <li class="active text-gray-silver">Docs</li>
               
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-10 ">
                <h3 class="text-theme-colored text-uppercase mt-0">Docs</h3>
                <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
          <table class="table">
              <tbody><tr>
                  <th>Panel</th>
                  <th>URL</th>
                  <th>Access by</th>
                  <th>Login</th>
              </tr>
              <tr>
                  <td>1</td>
                  <td>Admin</td>
                  <td><a href="<?php echo base_url();?>admin-manage">/admin-manage</a></td>
                  <td>Admin Official Email</td>
              </tr>
              <tr>
                  <td >2</td>
                  <td>Department</td>
                  <td><a href="<?php echo base_url();?>dept">/dept</a></td>
                  <td>Department Official Email</td>
              </tr>
             
              <tr>
                  <td>3</td>
                  <td>Meriise</td>
                  <td><a href="<?php echo base_url();?>meriise-manage">/meriise-manage</a></td>
                  <td>Meriise Official Email</td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>Placement Cell</td>
                  <td><a href="<?php echo base_url();?>placement-manage">/placement-manage</a></td>
                  <td>Placement Cell Official Email</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>Examination Cell</td>
                  <td><a href="<?php echo base_url();?>examination-manage">/examination-manage</a></td>
                  <td>Examination Cell Official Email</td>
              </tr>
              <tr>
                  <td>6</td>
                  <td>Faculty</td>
                  <td><a href="<?php echo base_url();?>faculty">/faculty</a></td>
                  <td>Faculty Official Email</td>
              </tr>
              <tr>
                  <td>7</td>
                  <td>AICTE</td>
                  <td><a href="<?php echo base_url();?>aicte-manage">/aicte-manage</a></td>
                  <td>AICTE Official Email</td>
              </tr>
              <tr>
                  <td>8</td>
                  <td>IQAC</td>
                  <td><a href="<?php echo base_url();?>iqac-manage">/iqac-manage</a></td>
                  <td>IQAC Officia Email </td>
              </tr>
              <tr>
                  <td>9</td>
                  <td>NAAC</td>
                  <td><a href="<?php echo base_url();?>naac-manage">/naac-manage</a></td>
                  <td>NAAC Official Email </td>
              </tr>
              <tr>
                  <td>10</td>
                  <td>NAAC Media</td>
                  <td><a href="<?php echo base_url();?>media-manage">/media-manage</a></td>
                  <td>NAAC Official Email </td>
              </tr>
             
          </tbody></table>
          

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