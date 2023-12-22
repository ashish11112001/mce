<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Malnad College of Engineering" />
  <meta name="keywords" content="Malnad College of Engineering" />
  <meta name="author" content="Malnad College of Engineering" />

  <!-- Page Title -->
  <title>Malnad College of Engineering</title>

  <!-- Favicon and Touch Icons -->
  <link href="<?php echo base_url(); ?>assets/images/favicon.png" rel="shortcut icon" type="image/png">
  <!-- <link href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
  <link href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
  <link href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144"> -->

  <!-- Stylesheet -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/css-plugin-collections.css" rel="stylesheet" />
  <!-- CSS | menuzord megamenu skins -->
  <link id="menuzord-menu-skins" href="<?php echo base_url(); ?>assets/css/menuzord-skins/menuzord-border-bottom.css" rel="stylesheet" />
  <!-- CSS | Main style file -->
  <link href="<?php echo base_url(); ?>assets/css/style-main.css" rel="stylesheet" type="text/css">
  <!-- CSS | Preloader Styles -->
  <link href="<?php echo base_url(); ?>assets/css/preloader.css" rel="stylesheet" type="text/css">
  <!-- CSS | Custom Margin Padding Collection -->
  <link href="<?php echo base_url(); ?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
  <!-- CSS | Responsive media queries -->
  <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
  <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
  <!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"> -->

  <!-- Revolution Slider 5.x CSS settings -->
  <link href="<?php echo base_url(); ?>assets/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />

  <!-- CSS | Theme Color -->
  <link href="<?php echo base_url(); ?>assets/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

  <!-- external javascripts -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverSlide.js"></script>
  <!-- JS | jquery plugin collection for this theme -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-plugin-collection.js"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3QQE9Z2QCD"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-3QQE9Z2QCD');
  </script>
  <!-- Revolution Slider 5.x SCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <style>
    .nav-new {
      position: fixed;
      width: 70px;
      z-index: 9999;
      margin-top: 250px;
      margin-left: 95%;
      transition: all 0.3s linear;
      box-shadow: 2px 2px 8px 0px rgba(0, 0, 0, .4);
    }

    .nav-new li {
      height: 60px;
      position: relative;
    }

    .nav-new li a {
      color: white;
      display: block;
      height: 100%;
      width: 100%;
      line-height: 60px;
      padding-left: 25%;
      border-bottom: 1px solid rgba(0, 0, 0, .4);
      transition: all .3s linear;
    }

    .nav-new li:nth-child(1) a {
      background: #4267B2;
    }

    .nav-new li:nth-child(2) a {
      background: #1DA1F2;
    }

    .nav-new li:nth-child(3) a {
      background: #E1306C;
    }

    .nav-new li:nth-child(4) a {
      background: #2867B2;
    }

    .nav-new li:nth-child(5) a {
      background: #333;
    }

    .nav-new li:nth-child(6) a {
      background: #ff0000;
    }

    .nav-new li a i {
      position: absolute;
      top: 17px;
      left: 20px;
      font-size: 27px;
    }

    .nav-new ul li a span {
      display: none;
      font-weight: bold;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .nav-new a:hover {
      z-index: 1;
      width: 200px;
    }

    .nav-new ul li:hover a span {
      padding-right: 40%;
      display: block;
    }

    .side-ul {
      direction: rtl;
    }
  </style>
</head>

<body class="">
  <div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
      <div id="spinner">
        <img alt="" src="<?php echo base_url(); ?>assets/images/preloaders/5.gif">
      </div>
      <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <div class="nav-new visible-lg">
      <ul class="side-ul">
        <li><a href="<?= base_url(); ?>home/Program"><i class="fa fa-calendar"></i><span>Programmes</span></a></li>
        <li><a href="<?= base_url(); ?>home/Circulars_News"><i class="fa fa-file"></i><span>Circulars</span></a></li>
        <li><a href="<?= base_url(); ?>home/forms"><i class="fa fa-download"></i><span>Forms</span></a></li>
        <li><a href="<?= base_url(); ?>home/Gallerys"><i class="fa fa-picture-o"></i><span>Gallery</span></a></li>
        <li><a href="<?= base_url(); ?>home/feedback"><i class="fa fa-pencil-square-o"></i><span>Feedback</span></a></li>
      </ul>
    </div>
    <!-- Header -->
    <header id="header" class="header">
      <div class="header-top bg-theme-color-2 sm-text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-9 pt-10 pb-10">
              <div class="widget no-border m-0">
                <?php
                $Scrolling = $this->admin_model->getDetails('scrolling', '1')->row();
                ?>
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" class="text-white">
                  <?= $Scrolling->scroll_text; ?>
                </marquee>
                <!-- <ul class="list-inline">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">123-456-789</a> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Mon-Fri 8:00 to 2:00 </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">contact@yourdomain.com</a> </li>
              </ul> -->
              </div>
            </div>
            <!--<div class="col-md-3 pt-10 pb-10">-->
            <!--  <div class="widget no-border m-0">-->
            <!--    <ul class="list-inline text-right sm-text-center">-->
            <!--      <li>-->
            <!--        <a href="<?= base_url(); ?>home/FAQ" class="text-white">FAQ</a>-->
            <!--      </li>-->
            <!--      <li class="text-white">|</li>-->
            <!--      <li>-->
            <!--        <a href="<?= base_url(); ?>home/Help_Desk" class="text-white">Help Desk</a>-->
            <!--      </li>-->
            <!--      <li class="text-white">|</li>-->
            <!--      <li>-->
            <!--        <a href="<?= base_url(); ?>home/Support" class="text-white">Support</a>-->
            <!--      </li>-->
            <!--    </ul>-->
            <!--  </div>-->
            <!--</div>-->
            <div class="col-md-3 pb-10">
              <div class="widget no-border m-0">
                <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                  <li class="mt-sm-10 mb-sm-10">
                    <!-- Modal: Appointment Starts -->
                    <a class="btn btn-default btn-flat btn-xs bg-light p-5 font-11 pl-10 pr-10" href="<?= base_url(); ?>home/Admission_Information">Admission</a>
                  </li>
                  <li class="mt-sm-10 mb-sm-10">
                    <a class="btn btn-default btn-flat btn-xs bg-danger p-5 font-11 pl-10 pr-10" href="https://mceparents.contineo.in/" target="_blank">Student portal</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="logo-nav">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-5">
              <a class="logo-brand pull-left flip" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/images/MCE_logo.png" alt="MCE">
              </a>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-7">
              <div class="col-xs-12 col-sm-12 col-md-12 mb-5 mt-5">
                <div class="widget no-border m-0">
                  <ul class="list-inline sm-text-center pull-right top-menu">
                    <li>
                      <a href="https://canarabank.com/NET_Banking.aspx" target="_blank" class="blink">Online Payment</a>
                    </li>
                    <!-- <li class="">|</li> -->
                    <li>
                      <?php echo anchor('home/MOU', 'MOU'); ?>
                    </li>
                    <!-- <li class="">|</li> -->
                    <li>
                      <!-- <a href="https://www.mcealumni.in/" target="" class="blink">Alumni</a> -->
                      <?php echo anchor('home/Alumnii', 'Alumni'); ?>
                    </li>
                    <!-- <li class="">|</li> -->
                    <li>
                      <?php echo anchor('home/Media', 'Media'); ?>
                    </li>
                    <li>
                      <?php echo anchor('home/Gallerys', 'Gallery'); ?>
                    </li>
                    <!-- <li class="">|</li> -->
                    <li>
                      <?php echo anchor('home/contactss', 'Contact'); ?>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="widget no-border m-0">
                  <div class="accreditations-brand text-right sm-text-center">
                    <!-- <?php echo anchor('home/AICTE', '<img src="' . base_url() . 'assets/images/accreditations/AICTE.png">'); ?> -->
                    <?php echo anchor('home/NBA', '<img src="' . base_url() . 'assets/images/accreditations/NBA.png">'); ?>
                    <?php echo anchor('home/DVV-Clarification', '<img src="' . base_url() . 'assets/images/accreditations/naac.jpg">'); ?>
                    <!-- <?php echo anchor('home/Affiliation_from_VTU', '<img src="' . base_url() . 'assets/images/accreditations/VTU.png">'); ?> -->
                    <?php echo anchor('home/ARIIA', '<img src="' . base_url() . 'assets/images/accreditations/ARIIA.png">'); ?>

                    <a href="<?php echo base_url(); ?>assets/files/RatingCertificate_2021-22.pdf" target="_blank"><img src="<?= base_url(); ?>assets/images/accreditations/mhrd.jpg"></a>
                    <a href="<?php echo base_url(); ?>assets/files/RatingCertificate_2021-22.pdf" target="_blank"><img src="<?= base_url(); ?>assets/images/accreditations/iic.jpg"></a>
                    <?php echo anchor('home/NIRF', '<img src="' . base_url() . 'assets/images/accreditations/NIRF.png">'); ?>
                    <?php echo anchor('home/QS-I-GAUGE', '<img src="' . base_url() . 'assets/images/accreditations/Overall-INDIAN-COLLEGE-GOLD.png">'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-pink">
          <div class="container-fluid">
            <nav id="menuzord-left" class="menuzord default">

              <ul class="menuzord-menu">

                <?php
                $navBar = menu()->navBar;
                foreach ($navBar as $navBar) {
                  $children = 0;
                  if (isset($navBar->children)) {
                    $children =  $navBar->children;
                  }
                  if (is_array($children)) {
                    $childrenCount = count($children);
                  } else {
                    $childrenCount = 0;
                  }

                  if ($navBar->display) {
                    echo '<li class="">';
                    //  LEVEL - 1
                    if ($navBar->link) {
                      if (isset($navBar->redirect)) {
                        $navBarLink = preg_replace('/\s+/', '-', $navBar->redirect);
                        $navBarLink = preg_replace('/[^A-Za-z0-9\-]/', '', $navBarLink);
                      } else {
                        $navBarLink = preg_replace('/\s+/', '-', $navBar->name);
                        $navBarLink = preg_replace('/[^A-Za-z0-9\-]/', '', $navBarLink);
                      }
                      echo anchor("home/" . $navBarLink, $navBar->name);
                    } else {
                      echo '<a>' . $navBar->name . '</a>';
                    }
                    //  LEVEL - 1


                    // LEVEL 2 - SINGLE
                    if (isset($navBar->children) && $navBar->childrenDisplay) {
                      $childrens =  $navBar->children;
                      echo '<ul class="dropdown">';
                      foreach ($childrens as $children) {
                        if ($children->display) {
                          echo '<li class="dropdown-submenu">';
                          if (isset($children->navigate)) {
                            echo anchor($children->navigate, $children->name, 'class="dropdown-item" target="_blank"');
                          } else {
                            if (isset($children->redirect)) {
                              if (isset($children->department)) {
                                $parent = $children->name;
                                $childrenLink = preg_replace('/\s+/', '-', $children->redirect . '/' . $parent);
                                // $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);

                              } else {
                                $childrenLink = preg_replace('/\s+/', '-', $children->redirect);
                                $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
                              }
                            } else {
                              $childrenLink = preg_replace('/\s+/', '-', $children->name);
                              $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
                            }
                            echo anchor("home/" . $childrenLink, $children->name, 'class="dropdown-item"');
                          }
                          if (isset($children->children) && $children->subchildrenDisplay) {
                            $children =  $children->children;
                            echo '<ul class="dropdown">';
                            foreach ($children as $children) {
                              if ($children->display) {
                                echo '<li>';
                                if (isset($children->navigate)) {
                                  echo anchor($children->navigate, $children->name, 'class="dropdown-item" target="_blank"');
                                } else {
                                  if (isset($children->redirect)) {
                                    $childrenLink = preg_replace('/\s+/', '-', $children->redirect);
                                    $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
                                  } else {
                                    $childrenLink = preg_replace('/\s+/', '-', $children->name);
                                    $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
                                  }
                                  echo anchor("home/" . $childrenLink, $children->name, 'class="dropdown-item"');
                                }
                                echo '</li>';
                              }
                            }
                            echo '</ul>';
                          }



                          echo '</li>';
                        }
                      }
                      echo '</ul>';
                    }
                    // LEVEL 2

                    echo '</li>';
                  }
                }
                ?>





              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>