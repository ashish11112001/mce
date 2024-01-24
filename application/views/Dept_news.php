<!-- Start main-content -->
<div class="main-content">
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?php echo base_url(); ?>assets/images/slider3.jpg">
        <div class="container pt-120 pb-120">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white"><?= $parentMenu; ?></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <!-- <li><a href="#">Pages</a></li> -->
                            <li class="active text-gray-silver">Academics</li>
                            <li class="active text-gray-silver">News and Events </li>
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
                            <?php foreach ($Details as $Details1) { ?>
                                <h4 class="text-blue"><?= $Details1->news_title; ?></h4>
                                <div class="text-justify">
                                    <p><?= $Details1->news_details; ?></p>
                                </div>
                                <div class="row">
                                    <?php $fileNames = unserialize($Details1->files);
                                    foreach ($fileNames as $key => $value) { ?>
                                        <!-- Portfolio Item Start -->
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="image-box-thum">
                                                <img class="img-fullwidth" alt="" src="<?= base_url(); ?>assets/departments/<?= $short_name ?>/latest_news/<?= $value; ?>">



                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } ?>
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