<div class="main-content">
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.png">
        <div class="container pt-120 pb-120">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white"><?= $activeMenu; ?></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <!-- <li><a href="#">Pages</a></li> -->
                            <li class="active text-gray-silver">Research</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-9 pull-right flip sm-pull-none">
                    <div class="row mt-10">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h3 class="line-bottom mt-0"> <span class="text-theme-colored">
                                    <?= $activeMenu; ?></span></h3>

                            <p>&nbsp;</p>
                            <p><br />The college has an active Research wing. It is headed by Dr. M.S.Srinath, Dean (Research) and Professor of Computer Science and Engg. The nine Engineering Departments: Civil Engineering, Mechanical Engineering, Electrical &amp; Electronics Engineering, Electronics &amp; Communication Engineering, Automobile Engineering, Industrial &amp; Production Engineering, Computer Science &amp; Engineering, Electronics &amp; Instrumentation Engineering and Information Science &amp; Engineering have been recognized as research centres by the Visvesvaraya Technological University (VTU), Belagavi. Also, Mathematics and Physics departments are recognized as research centres by the VTU. There are a total of 53 VTU registered guides actively involved in the research activities. Currently 107 scholars, both full time and part time have enrolled for Ph.D. program and 9 students are pursuing M.Sc. (Engg.) by Research program. The College has provided ambience for the research activities in terms of the laboratory facilities, sponsorship for attending conferences, seminars and conclaves, incentives for publishing quality research papers etc. The faculty and scholars of the college are regularly presenting their research findings in the conferences of repute and publishing in the renowned journals of good impact factor. The major areas of research work being carried out by various Departments are as follows.</p>
                            <h4><strong>DRILLBIT(plagiarism checker)&nbsp;Link:</strong><a href="https:/www.drillbitplagiarism.com/">&nbsp;</a><strong><a href="https://www.drillbitplagiarism.com/">https://www.drillbitplagiarism.com/</a></strong></h4>
                            <p>&nbsp;</p>
                            <table width="0" class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="39">
                                            <p><strong>1.</strong></p>
                                        </td>
                                        <td width="291">
                                            <p><strong>CODE OF ETHICS</strong></p>
                                        </td>
                                        <td width="111">
                                            <p><strong><a href=" <?php echo base_url();?>assets/files/RESEARCH/CODE OF ETHICS.pdf">CLICK HERE</a></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="39">
                                            <p><strong>2</strong>.</p>
                                        </td>
                                        <td width="291">
                                            <p><strong>RESEARCH PROMOTION POLICY</strong></p>
                                        </td>
                                        <td width="111">
                                            <p><strong><a href=" <?php echo base_url();?>assets/files/RESEARCH/RESEARCH PROMOTION POLICY.pdf">CLICK HERE</a></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="39">
                                            <p><strong>3.</strong></p>
                                        </td>
                                        <td width="291">
                                            <p><strong>SEED MONEY POLICY</strong></p>
                                        </td>
                                        <td width="111">
                                            <p><strong><a href=" <?php echo base_url();?>assets/files/RESEARCH/SEED MONEY POLICY .pdf">CLICK HERE</a></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="39">
                                            <p><strong>4.</strong></p>
                                        </td>
                                        <td width="291">
                                            <p><strong>CONSULTANCY POLICY</strong></p>
                                        </td>
                                        <td width="111">
                                            <p><strong><a href=" <?php echo base_url();?>assets/files/RESEARCH/CONSULTANCY POLICYpdf.pdf">CLICK HERE</a></strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
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
</div>
<!-- end main-content -->