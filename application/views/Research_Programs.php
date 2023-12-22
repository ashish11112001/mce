<div class="main-content">
     <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">Admissions</li>
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
                <h3 class="text-theme-colored text-uppercase mt-0"><?=$activeMenu;?></h3>
                <p class="text-justify">Research programs leading to Ph.D/M.Sc (Engg.) are available in the following departments.</p>
               <ul class="list theme-colored angle-double-right">
                    <li> Civil Engineering </li>
                    <li> Mechanical Engineering  </li>
                    <li> Electrical & Electronics Engineering.</li>
                    <li> Electronics & Communication Engineering </li>
                    <li> Computer Science & Engineering. </li>
                    <li> Industrial Production and Engineering. </li>
                    <li> Electronics & Instrumentation Engineering. </li>
                    <li> Information Science & Engineering. </li>
                    <li> Mathematics </li>
                    </ul>
                    
                    <h4>Eligibility: </h4>
                    <ul class="list theme-colored angle-double-right">
                    <li class="text-justify">Working professionals, Faculty and others with a postgraduate qualification in the related discipline and in exceptional cases, Professionals with B.E. are eligible to apply for a Ph.D.</li>
                    <li class="text-justify"> The required qualification for M.Sc. (Engg)  by research,  is any 4-year engineering degree in the related discipline. </li>
                    </ul>
                    
                     <h4>Scholarship Details: </h4>
                     <p class="text-justify">Deserving students can avail of several scholarships awarded by the Government of Karnataka. Here is a list of the scholarships and the corresponding applications that can be obtained from the Admission and Scholarship section during the month of August every year.</p>
                    <ul class="list theme-colored angle-double-right">
                    <li class="text-justify">Post Metric Scholarship to SC/STs </li>
                    <li class="text-justify">Fee-reimbursements to SC/STs </li>
                    <li class="text-justify">Fee- a concession to Category-l, II, and III</li>
                    <li class="text-justify">National Scholarship Portal for Minority Religion</li>
                    <li class="text-justify">Defense Scholarship</li>
                    </ul>
               
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="sidebar sidebar-left mt-sm-30">
                    <?php
                        $sideBar = sideBar($mainMenu, $parentMenu, $activeMenu);
                        print_r($sideBar);
                        // require('sidebar_admissions.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>