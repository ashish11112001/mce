 <div class="main-content">
   <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
     <div class="container pt-120 pb-120">
       <!-- Section Content -->
       <div class="section-content">
         <div class="row">
           <div class="col-md-12 text-center">
             <h2 class="title text-white"><?= $activeMenu; ?></h2>
             <ol class="breadcrumb text-center text-black mt-10">
               <li><a href="#">Home</a></li>
               <!-- <li><a href="#">Pages</a></li> -->
               <li class="active text-gray-silver">AICTE IDEA LAB</li>
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
               <div class="fullwidth-carousel">
                 <div class="item bg-img-cover fullscreen" data-bg-img="<?php echo base_url(); ?>assets/images/aicte/1.jpeg">
                  
                 </div>
                 <div class="item bg-img-cover fullscreen" data-bg-img="<?php echo base_url(); ?>assets/images/aicte/1.jpeg">
                   
                 </div>
                
               </div>
               <h4>MCE-AICTE IDEA LAB</h4>
               <p class="text-justify"><?php echo nl2br($departmentsDetails->about); ?></p>
             </div>
           </div>

         </div>
         <div class="col-md-3">
           <?php
            $sideBar = sideBar($mainMenu, $parentMenu, $activeMenu);
            print_r($sideBar);
            ?>


         </div>
       </div>
     </div>
   </section>