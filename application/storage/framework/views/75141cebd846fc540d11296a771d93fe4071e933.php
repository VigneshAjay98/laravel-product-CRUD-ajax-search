<?php

use Illuminate\Support\Facades\Auth;

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
                                        <?php if(Auth::check()): ?>
                                        <a href="<?php echo e(url('/home')); ?>" style="font-style: italic;">My Portal</a>
                                        <?php else: ?>
                                        <li><a href="<?php echo e(url('/login')); ?>">login</a></li>
                                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                                        <?php endif; ?>
                                    </ul><!-- end ul -->
                                </nav><!-- end main-menu -->
                                <div class="logo-right-button d-flex align-items-center">
                                    <div class="header-action-button d-flex align-items-center">
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
                                                               <!--  <div class="image">
                                                                    <a href="#">
                                                                        <img src="<?php if(Auth::user()->pic_dynamicName): ?><?php echo e(url('application/public/uploads/profile_pics/users/'.Auth::user()->pic_dynamicName)); ?><?php else: ?><?php echo e(url('asset/images/user_icon.jpg')); ?><?php endif; ?>" alt="Profile" style="width: 40px; height: 40px">
                                                                    </a>
                                                                </div> -->
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
                                                                        <a href="<?php echo e(url('/logout')); ?>" class="d-block">
                                                                            <i class="la la-power-off"></i> Logout
                                                                        </a>
                                                                    </li>
                                                <?php else: ?>
                                                <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div><!-- end mess-dropdown -->
                                                    </div><!-- end dropdown-menu -->
                                                </div><!-- end dropdown -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end logo-right-button -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</body>

</html><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\learning\application\resources\views/layouts/app.blade.php ENDPATH**/ ?>