
    <div class="main-content">
      <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.png">
        <div class="container pt-120 pb-120">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white"><?=$activeMenu;?></h2>
                <ol class="breadcrumb text-center text-black mt-10">
                  <li><a href="#">Home</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver"></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
     <section class="divider">
    <div class="container">
        <div class="row pt-30">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#">
                                <i class="pe-7s-map-2 text-theme-colored"></i></a>
                            <div class="media-body"> <strong>LOCATION</strong>
                                <p>No 21, Salagame Rd, Rangoli Halla, Hassan, Karnataka 573202
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#">
                                <i class="pe-7s-call text-theme-colored"></i></a>
                            <div class="media-body"> <strong>CONTACT NUMBERS</strong>
                                <p>08172-245317</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#">
                                <i class="pe-7s-mail text-theme-colored"></i></a>
                            <div class="media-body"> <strong>CONTACT E-MAIL</strong>
                                <p>office@mcehassan.ac.in</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#">
                                <i class="fa fa-camera text-theme-colored"></i></i></a>
                            <img src="<?php echo base_url(); ?>assets/images/qrcode.png" width="100px" height="100px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="mb-0">GET IN TOUCH WITH US</h1>
                    <h4 class="mb-0 mt-0">We will be available from Monday to Saturday between 9:00 AM to 4:30 PM</h5>
                    <h5 class="mt-0">Kindly contact us if you have any queries which are not cleared through our website.</h5>
                    
                    <?php if($this->session->flashdata('message')){?> 
                      <div align="center" class="alert alert-success" id="msg">      
                        <?php echo $this->session->flashdata('message')?>
                      </div>
                    <?php } ?>
                    
                    <?=form_open($action,'class="" name="form" novalidate');?>
                    <div class="form-group col-md-4 mb-20">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        <?=form_error('name','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-md-4 mb-20">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <?=form_error('email','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-md-4 mb-20">
                        <label for="interest">Subject of Interest</label>
                        <select class="form-control" id="interest" name="interest">
                            <option value="">Select</option>
                            <option value="Placements">Placements</option>
                            <option value="UG Admission">UG Admission</option>
                            <option value="PG Admission">PG Admission</option>
                            <option value="Any Other">Any Other</option>
                          </select>
                          <?=form_error('interest','<div class="text-danger">','</div>');?>
                    </div>
                       
                    <div class="form-group col-md-12 mb-20">
                        <label for="email">Your Query</label>
                        <textarea class="form-control" name="query" id="query" rows="10" placeholder="Enter your Query"></textarea>
                        <?=form_error('query','<div class="text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block">&nbsp;</label>
                        <button type="submit" class="btn btn-danger" id="submit_btn">Send Query</button>
                    </div>
                    
                    <?=form_close();?>
                </div>
            </div>
        </div>
        
    </div>
</section>
    </div>
    <!-- end main-content -->