<!-- Section: inner-header -->
<section class="inner-header bg-yellow">
    <div class="container pt-20 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-sm-8 xs-text-center">
                    <h2 class="text-white mt-10">Latest News</h2>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb white mt-10 text-right xs-text-center">
                    <?php
                        $redirect = array("1" => "home", "2"=>"home/Exam_Timetables", "3" => "home/Exam_Circulars", "4"=>"home/Calendar_of_Events", "5"=>"home/Tenders");
                    ?>
                        <li><?php echo anchor($redirect['1'],'<i class="fa fa-arrow-left"></i> Back to List','class="btn btn-dark btn-circled btn-sm"');?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-10 mb-30 pt-10 pb-30">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="blog-posts single-post">
                    <article class="post clearfix mb-0">
                        <div class="entry-title pt-0 no-text-transform">
                            <h3><a href="#"><?php echo $newsDetails->news_title; echo ($newsDetails->new_label) ? "<img src='".base_url()."assets/images/blinking_new.gif' />" : null;?></a></h3>
                        </div>
                        <div class="entry-meta border-bottom-gray pb-20">
                            <ul class="list-inline">
                                <li>Published On: <span class="text-theme-colored"><?php echo date('d M Y h:i A',strtotime($newsDetails->news_date)); ?></span></li>
                                <li>Category: <span class="text-theme-colored"><?=$newsDcisplay[$newsDetails->display_in];?></span></li>
                            </ul>
                        </div>
                        <div class="entry-content mt-10">
                            <?php 
                            // print_r($newsDetails);
                                if($newsDetails->news_details){
                                    echo $newsDetails->news_details;
                                }

                                if($newsDetails->files){
                                    $fileNames = unserialize($newsDetails->files);
                                    foreach($fileNames as $key => $value){
                                        $fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value);
                                        echo anchor('assets/latest_news/'.$value,'<i class="fa fa-download"></i> '.$fileName,'target="_blank" class="btn btn-border btn-theme-colored btn-circled btn-sm ml-10"');
                                    }
                                }
                            ?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>