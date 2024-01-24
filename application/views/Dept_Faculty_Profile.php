<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js'></script> -->

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
                            <li class="active text-gray-silver">Faculty Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        @media print {
            body {
                visibility: hidden;
            }

            #printableArea {
                visibility: visible;
                position: absolute;
                left: 0;
                top: 0;
            }

        
        }

     
    </style>
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">

                <div class="col-md-8 blog-pull-right" id="printableArea">
                    <h3 class="text-theme-colored mt-0"><?= $faculty->name; ?> Profile </h3>
                    <div class="row mt-0">
                        <article class="post clearfix">
                            <div class="col-sm-3">
                                <div class="entry-header">
                                    <?php
                                    $url = glob('./assets/departments/' . $short_name . '/faculty/profile_' . $faculty->id . '-*.jpg');
                                    if ($url) {
                                        if (file_exists($url[0])) {
                                            $profile_pic = base_url() . $url[0];
                                        } else {
                                            $profile_pic = base_url() . "assets/departments/avatar.jpg";
                                        }
                                    } else {
                                        $profile_pic = base_url() . "assets/departments/avatar.jpg";
                                    }
                                    // echo '<img src="'.$img.'" class="pic128">';
                                    ?>
                                    <div class="post-thumb"> <img class="img-responsive img-fullwidth img-thumbnail" src="<?= $profile_pic; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="">

                                    <!-- <h4 class="entry-title mt-0 mb-0 pt-0">Name : <?= $faculty->name; ?></h5><br> -->
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Faculty ID : <?= $faculty->faculty; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Department : <?= $parentMenu; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Email : <?= $faculty->email; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Mobile : <?= $faculty->mobile; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Qualification : <?= $faculty->qualification; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Specialization : <?= $faculty->specialization; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Additional Responsibility : <?= $faculty->additional; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Research Interest : <?= $faculty->research; ?></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">Google Scholar Link : <a href="<?= $faculty->google; ?>"> <?= $faculty->google; ?> </a></h5><br>
                                    <h5 class="entry-title mt-0 mb-0 pt-0">IRINS link : <a href="<?= $faculty->irins; ?>"> <?= $faculty->irins; ?> </a></h5>


                                    <h5 class="no-print">
                                        <?php
                                        if ($faculty->profile) {
                                            $url = base_url() . 'assets/departments/' . $short_name . '/profiles/' . $faculty->profile;
                                            echo anchor($url, '<i class="fa fa-download"></i> View Profile', 'class="text-danger" target="_blank"');
                                        }
                                        ?>
                                        <!-- <button id="downloadBtn">Download as PDF</button> -->
                                        <a onclick="convertToPDF()" class="text-danger"><i class="fa fa-download"></i> Download Profile</a>
                                        <!-- <input type="button" onclick="printDiv('printableArea')" class="text-danger" id="no-print" value="Download Profile" /> -->
                                    </h5>
                                </div>
                            </div>
                            <?php if ($publications) { ?>
                                <div class="col-sm-12 col-md-12 text-left sm-text-center mt-10">
                                    <table class="table">
                                        <tr>
                                            <th width="5%">S.No</th>
                                            <th width="12%">Year</th>
                                            <th width="13%">Type</th>
                                            <th width="70%">Publication Details</th>
                                        </tr>
                                        <?php $i = ($page) ? $page + 1 : 1;
                                        foreach ($publications as $publications1) {
                                            if ($publications1->link) {
                                                $link = anchor($publications1->link, '<i class="fa fa-link"></i> Reference Link', 'class="text-danger"  target="_blank"');
                                            } else {
                                                $link = null;
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $i++; ?>.</td>
                                                <td><?= $publications1->academic_year; ?></td>
                                                <td><?= $publicationTypes[$publications1->publication_type]; ?></td>
                                                <td class="text-justify">
                                                    <?php
                                                    echo $publications1->details;
                                                    echo $link;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                    </table>
                                </div>
                            <?php } ?>
                        </article>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
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