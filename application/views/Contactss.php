<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url();?>assets/images/slider3.jpg">
    <div class="container pt-100 pb-100">
        <!-- Section Content -->
        <div class="section-content text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h2 class="text-white font-30">Malnad College of Engineering</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divider: Contact -->
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
        
        <div class="row pt-30">
            <div class="col-md-12">
                <div class="row">
                    <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.187572738971!2d76.09998611482257!3d13.023724190821692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba5483386aa3ffd%3A0x1ffd88ffad2a1ca6!2sMalnad%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1686233536732!5m2!1sen!2sin"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>