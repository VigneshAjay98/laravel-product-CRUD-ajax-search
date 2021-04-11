<?php

use Illuminate\Support\Facades\Auth;

$uri = $_SERVER['REQUEST_URI'];
$act = explode('/', $uri);

$admin_menus = ['dashboard', 'users', 'corporate', 'courses'];
$result = array_diff($admin_menus, $act);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(url('asset/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/line-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/fancybox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/jquery.filer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/tooltipster.bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/jqvmap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('asset/css/style.css')); ?>">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Certificate template js -->
    <script src="<?php echo e(url('asset/sample_certificate/compatibility.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/sample_certificate/theViewer.min.js')); ?>"></script>

    <script src="<?php echo e(url('asset/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.repeatable.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

    <style type="text/css">
        div.error {
            color: red;
            font-size: 14px;
        }

        .logo-box {
            padding-top: 5px;
            padding-bottom: 10px;
            display: -webkit-flex;
            display: -ms-flex;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
        }

        .main-menu>ul>li a {
            font-size: 15px;
            color: #233d63;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            position: relative;
            padding-bottom: 33px;
        }

        .card-box-shared-title {
            border-bottom: none !important;
        }
    </style>
</head>

<body>

    <!-- start cssload-loader -->
    <div class="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->

    <?php if(!in_array('course_view', $act)): ?>
    <!--======================================
        START HEADER AREA
    ======================================-->
    <header class="header-menu-area dashboard-header">
        <div class="header-menu-content dashboard-menu-content">
            <div class="container-fluid">
                <div class="main-menu-content">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="logo-box">
                                <a href="<?php echo e(url('/')); ?>" class="logo"><img src="<?php echo e(url('asset/images/logo/logo_grey_sm.jpeg')); ?>" alt="logo"></a>
                                <div class="menu-toggler">
                                    <i class="la la-bars"></i>
                                    <i class="la la-times"></i>
                                </div>
                            </div>
                        </div><!-- end col-lg-2 -->
                        <div class="col-lg-10">
                            <div class="menu-wrapper">
                                <nav class="main-menu">
                                    <ul>
                                        <!-- <li>
                                            <a href="<?php echo e(url('/')); ?>">Home</a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="<?php echo e(url('/course_grid')); ?>">courses</a>
                                        </li> -->
                                        <!-- <li><a href="<?php echo e(url('/contact')); ?>">contact </a></li> -->
                                        <?php if(Auth::check()): ?>
                                        <?php if(count($result) == count($admin_menus)): ?>
                                        <a href="<?php echo e(url('/dashboard')); ?>" style="font-style: italic;">My Portal</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(!(Auth::check())): ?>
                                        <li><a href="<?php echo e(url('/login')); ?>">login</a></li>
                                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                                        <?php endif; ?>
                                    </ul><!-- end ul -->
                                </nav><!-- end main-menu -->
                                <div class="logo-right-button d-flex align-items-center">
                                    <div class="header-action-button d-flex align-items-center">
                                        <div class="notification-wrap d-flex align-items-center">
                                            <div class="notification-item mr-3">
                                                <div class="dropdown">
                                                    <?php if(Auth::check()): ?>
                                                    <div class="dropdown-menu" aria-labelledby="notificationDropdownMenu">
                                                        <div class="mess-dropdown">
                                                            <div class="mess__title">
                                                                <h4 class="widget-title">Notifications</h4>
                                                            </div>
                                                            <div class="mess__body">
                                                                <a href="dashboard.html" class="d-block">
                                                                    <div class="mess__item">
                                                                        <div class="icon-element bg-color-1 text-white">
                                                                            <i class="la la-bolt"></i>
                                                                        </div>
                                                                        <div class="content">
                                                                            <span class="time">1 hour ago</span>
                                                                            <p class="text">Your Resume Updated!</p>
                                                                        </div>
                                                                    </div>
                                                                </a>

                                                            </div>
                                                            <div class="btn-box p-2 text-center">
                                                                <a href="dashboard.html">Show All Notifications</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="user-action-wrap">
                                            <div class="notification-item user-action-item">
                                                <?php if(Auth::check()): ?>
                                                <div class="dropdown">
                                                    <button class="notification-btn dot-status online-status dropdown-toggle" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="<?php if(Auth::user()->pic_dynamicName): ?><?php echo e(url('application/public/uploads/profile_pics/users/'.Auth::user()->pic_dynamicName)); ?><?php else: ?><?php echo e(url('asset/images/user_icon.jpg')); ?><?php endif; ?>" alt="Profile" style="width: 40px; height: 40px">
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="userDropdownMenu">

                                                        <div class="mess-dropdown">
                                                            <div class="mess__title d-flex align-items-center">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="<?php if(Auth::user()->pic_dynamicName): ?><?php echo e(url('application/public/uploads/profile_pics/users/'.Auth::user()->pic_dynamicName)); ?><?php else: ?><?php echo e(url('asset/images/user_icon.jpg')); ?><?php endif; ?>" alt="Profile" style="width: 40px; height: 40px">
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title font-size-16">
                                                                        <a href="#" class="text-white">
                                                                            <?php echo e(Auth::user()->name); ?>

                                                                        </a>
                                                                    </h4>
                                                                    <span class="email"><?php echo e(Auth::user()->email); ?></span>
                                                                </div>
                                                            </div><!-- end mess__title -->
                                                            <div class="mess__body">
                                                                <ul class="list-items">
                                                                    <li class="mb-0">
                                                                        <a href="<?php echo e(url('/profile_edit/'.Auth::user()->id)); ?>" class="d-block">
                                                                            <i class="la la-edit"></i>Edit Profile
                                                                        </a>
                                                                    </li>
                                                                    <?php if(Auth()->user()->role == 'corporate_admin'): ?>
                                                                        <li class="mb-0">
                                                                            <a href="<?php echo e(url('/corp_setting/'.Auth::user()->id.'/edit')); ?>" class="d-block">
                                                                                <i class="la la-edit"></i> Corporate Setting
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <li class="mb-0">
                                                                        <a href="<?php echo e(url('/logout')); ?>" class="d-block">
                                                                            <i class="la la-power-off"></i> Logout
                                                                        </a>
                                                                    </li>
                                                                    <?php else: ?>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div><!-- end mess__body -->
                                                        </div><!-- end mess-dropdown -->
                                                    </div><!-- end dropdown-menu -->
                                                </div><!-- end dropdown -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end logo-right-button -->
                                <div class="user-nav-container">
                                    <div class="humburger-menu">
                                        <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                    </div><!-- end humburger-menu -->
                                    <div class="section-tab section-tab-2">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation">
                                                <a href="#notification-home" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                                    Notifications
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#message-home" role="tab" data-toggle="tab" aria-selected="false">
                                                    Messages
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#account-home" role="tab" data-toggle="tab" aria-selected="false">
                                                    Account
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="user-panel-content">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="notification-home" role="tabpanel">
                                                <div class="user-sidebar-item">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__body">
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-1 text-white">
                                                                        <i class="la la-bolt"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">1 hour ago</span>
                                                                        <p class="text">Your Resume Updated!</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-2 text-white">
                                                                        <i class="la la-lock"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">November 12, 2019</span>
                                                                        <p class="text">You changed password</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-3 text-white">
                                                                        <i class="la la-check-circle"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">October 6, 2019</span>
                                                                        <p class="text">You applied for a job <span class="color-text">Front-end Developer</span></p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-4 text-white">
                                                                        <i class="la la-user"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">Jun 12, 2019</span>
                                                                        <p class="text">Your account has been created successfully</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-5 text-white">
                                                                        <i class="la la-download"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">May 12, 2019</span>
                                                                        <p class="text">Someone downloaded resume</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                        </div><!-- end mess__body -->
                                                        <div class="btn-box p-2 text-center">
                                                            <a href="dashboard.html">Show All Notifications</a>
                                                        </div><!-- end btn-box -->
                                                    </div><!-- end mess-dropdown -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="message-home" role="tabpanel">
                                                <div class="user-sidebar-item">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__body">
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status">
                                                                        <img src="images/team7.jpg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Michelle Moreno</h4>
                                                                        <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                        <span class="time">5 min ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status online-status">
                                                                        <img src="images/team8.jpg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Alex Smith</h4>
                                                                        <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                        <span class="time">2 days ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status">
                                                                        <img src="images/team9.jpg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Michelle Moreno</h4>
                                                                        <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                        <span class="time">5 min ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status online-status">
                                                                        <img src="images/team7.jpg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Alex Smith</h4>
                                                                        <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                        <span class="time">2 days ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status">
                                                                        <img src="images/team8.jpg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Alex Smith</h4>
                                                                        <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                        <span class="time">2 days ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                        </div><!-- end mess__body -->
                                                        <div class="btn-box p-2 text-center">
                                                            <a href="dashboard-message.html">Show All Message</a>
                                                        </div><!-- end btn-box -->
                                                    </div><!-- end mess-dropdown -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-home" role="tabpanel">
                                                <div class="user-sidebar-item user-action-item">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title d-flex align-items-center">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="images/team7.jpg" alt="John Doe">
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h4 class="widget-title font-size-16">
                                                                    <a href="#" class="text-white">
                                                                        Alex Smith
                                                                    </a>
                                                                </h4>
                                                                <span class="email">alexsmith@example.com</span>
                                                            </div>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body">
                                                            <ul class="list-items">
                                                                <li class="mb-0">
                                                                    <a href="my-courses.html" class="d-block">
                                                                        <i class="la la-file-video-o"></i> My courses
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="./view_cart" class="d-block">
                                                                        <i class="la la-shopping-cart"></i> My cart
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="my-courses.html" class="d-block">
                                                                        <i class="la la-bookmark"></i> My wishlist
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="dashboard.html" class="d-block">
                                                                        <span><i class="la la-bell"></i> Notifications</span>
                                                                        <span class="badge bg-info text-white ml-2 p-1">9+</span>
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="./support" class="d-block">
                                                                        <span><i class="la la-envelope"></i> Messages</span>
                                                                        <span class="badge bg-info text-white ml-2 p-1">12+</span>
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="dashboard-settings.html" class="d-block">
                                                                        <i class="la la-gear"></i> Settings
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="dashboard-purchase-history.html" class="d-block">
                                                                        <i class="la la-cart-plus"></i> Purchase history
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="student-detail.html" class="d-block">
                                                                        <i class="la la-user"></i> Public Profile
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="dashboard-settings.html" class="d-block">
                                                                        <i class="la la-edit"></i> Edit Profile
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="#" class="d-block">
                                                                        <i class="la la-question"></i> Help
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="index.html" class="d-block">
                                                                        <i class="la la-power-off"></i> Logout
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                <li>
                                                                    <div class="business-content">
                                                                        <a href="#">
                                                                            <span class="widget-title font-size-18 d-block">Try Aduca for Business</span>
                                                                            <span class="line-height-24 d-block primary-color-3">Bring learning to your company</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div><!-- end mess__body -->
                                                    </div><!-- end mess-dropdown -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end menu-wrapper -->
                        </div><!-- end col-lg-10 -->
                    </div><!-- end row -->
                </div>
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </header><!-- end header-menu-area -->
    <!--======================================
            END HEADER AREA
    ======================================-->
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <script>
        $(document).ready(function() {
            $(this).scrollTop(0);
        });
    </script>
    
    <script src="<?php echo e(url('asset/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/isotope.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/waypoint.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/fancybox.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/wow.js')); ?>"></script>
    <!-- <script src="<?php echo e(url('asset/js/chart.js')); ?>"></script> -->
    <script src="<?php echo e(url('asset/js/doughnut-chart.js')); ?>"></script>
    <!-- <script src="<?php echo e(url('asset/js/bar-chart.js')); ?>"></script> -->
    <script src="<?php echo e(url('asset/js/smooth-scrolling.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/date-time-picker.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/emojionearea.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.filer.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/tooltipster.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.filer.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.vmap.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.vmap.sampledata.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/jquery.vmap-script.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/progress-bar.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/date-time-picker.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/emojionearea.min.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/animated-skills.js')); ?>"></script>
    <script src="<?php echo e(url('asset/js/main.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <?php echo $__env->yieldContent('charts'); ?>

    <!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/layouts/app.blade.php ENDPATH**/ ?>