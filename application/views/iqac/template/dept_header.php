<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Malnad College of Engineering </title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?php echo base_url();?>admin_assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo base_url();?>admin_assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo base_url();?>admin_assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url();?>admin_assets/css/oneui.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
    <script src="<?php echo base_url();?>admin_assets/js/core/jquery.min.js"></script>

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/js/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet"
        href="<?php echo base_url();?>admin_assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <!-- Sidebar -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="<?php echo base_url();?>">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide font-size-h5 tracking-wider">
                        <span class="font-w400">Malnad Website</span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Extra -->
                <div>
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                        href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Extra -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/dashboard','<i class="nav-main-link-icon si si-speedometer"></i> <span class="nav-main-link-name">Dashboard</span>','class="nav-main-link '.(($activeMenu == "dashboard")?"active":"").' "');  ?>
                        </li>
                    
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/documents','<i class="nav-main-link-icon si si-list"></i> <span class="nav-main-link-name">IQAC MOMS</span>','class="nav-main-link '.(($activeMenu == "documents")?"active":"").' "');  ?>
                        </li>
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/aqarreports','<i class="nav-main-link-icon si si-list"></i> <span class="nav-main-link-name">AQAR Reports</span>','class="nav-main-link '.(($activeMenu == "aqarreports")?"active":"").' "');  ?>
                        </li>
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/aqardocuments','<i class="nav-main-link-icon si si-list"></i> <span class="nav-main-link-name">AQAR Documents</span>','class="nav-main-link '.(($activeMenu == "aqardocuments")?"active":"").' "');  ?>
                        </li>
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/changePassword','<i class="nav-main-link-icon si si-lock"></i> <span class="nav-main-link-name">Change Password</span>','class="nav-main-link '.(($activeMenu == "changePassword")?"active":"").' "');?>
                        </li>
                        <li class="nav-main-item">
                            <?php echo anchor('iqac/logout','<i class="nav-main-link-icon si si-logout"></i> <span class="nav-main-link-name">Logout</span>','class="nav-main-link"');?>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                        data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <?php echo anchor('https://www.mcehassan.ac.in/','<i class="fa fa-fw fa-globe"></i>','class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" target="_blank"'); ?>
                    <!-- END Toggle Mini Sidebar -->

                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- <button type="button" class="btn btn-sm btn-dual d-md-none" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i>
                        </button> -->
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual d-flex align-items-center"
                            id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="<?php echo base_url();?>admin_assets/media/drait.png"
                                alt="Header Avatar" style="width: 21px;">
                            <span class="d-none d-sm-inline-block ml-2"><?=$short_name;?></span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary-dark rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="<?php echo base_url();?>admin_assets/media/drait.png" alt="">
                                <p class="mt-2 mb-0 text-white font-w500"><?=$username;?></p>
                            </div>
                            <div class="p-2">
                                <?php echo anchor('iqac/changePassword','<span class="font-size-sm font-w500">Change Password</span>','class="dropdown-item d-flex align-items-center justify-content-between"');?>
                                <?php echo anchor('iqac/logout','<span class="font-size-sm font-w500">Log Out</span>','class="dropdown-item d-flex align-items-center justify-content-between"');?>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->