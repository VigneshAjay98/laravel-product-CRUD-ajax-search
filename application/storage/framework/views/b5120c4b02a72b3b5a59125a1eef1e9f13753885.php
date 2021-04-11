<?php
    $uri = explode('?',$_SERVER['REQUEST_URI']);
    $act = explode('/',$uri[0]); 
?>

<style>
   @media (max-width: 1440px){ 
        .dashboard-sidebar .dashboard-nav-container {
                width: 300px;
                margin-top: 6%;
        }
    }
   @media (min-width: 1440px){ 
        .dashboard-sidebar .dashboard-nav-container {
                margin-top: 4%;
        }
    }

</style>

<div class="dashboard-sidebar">
        <div class="dashboard-nav-trigger">
            <div class="dashboard-nav-trigger-btn">
                <i class="la la-bars"></i> Dashboard Nav
            </div>
        </div>
        <div class="dashboard-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap" style="margin-top: -40%;">
                <ul class="side-menu-ul">
                    
                    <li class="sidenav__item <?php if(in_array('dashboard', $act)): ?> page-active <?php endif; ?> "><a href="<?php echo e(url('/dashboard')); ?>"><i class="la la-dashboard"></i> Dashboard</a></li>
                    
                    <?php if(Auth::user()->role == 'super_admin'): ?>

                    <li class="sidenav__item <?php if(in_array('courses', $act)): ?> page-active <?php endif; ?> "><a href="<?php echo e(url('courses')); ?>"><i class="la la-plus-circle"></i>Course</a></li>

                    <li class="sidenav__item <?php if(in_array('corporate', $act)): ?> page-active <?php endif; ?> "><a href="<?php echo e(url('/corporate')); ?>"><i class="fas fa-city" style="font-size: 12px; color: #233d63ad; margin-right: 13px;"></i>Corporate</a></li>

                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'corporate_admin'): ?>

                    <li class="sidenav__item <?php if(in_array('users', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('/users')); ?>"><i class="la la-user"></i>Users</a></li>

                    <?php endif; ?>

                    <?php if(Auth::user()->role != 'super_admin'): ?>
                    
                    <li class="sidenav__item <?php if(in_array('courses', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('courses')); ?>"><i class="la la-bell"></i>My Courses</a></li>

                    <li class="sidenav__item <?php if(in_array('my_certificate', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('my_certificate')); ?>"><i class="la la-bell"></i>My Certificate</a></li>

                    <?php endif; ?>


                    <?php if(Auth::user()->role == 'corporate_admin'): ?>

                    <li class="sidenav__item <?php if(in_array('credits', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('credits')); ?>"><i class="la la-shopping-cart"></i>Credits</a></li>
                    
                    <!--  <li class="sidenav__item <?php if(in_array('payment_history', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('payment_history')); ?>"><i class="la la-shopping-cart"></i>Payment History</a></li> -->
                    
                    <li class="sidenav__item <?php if(in_array('course_assign', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('course_assign')); ?>"><i class="la la-shopping-cart"></i>Course Assign</a></li>

                    <li class="sidenav__item <?php if(in_array('invoice', $act)): ?> page-active <?php endif; ?>"><a href="<?php echo e(url('/invoice')); ?>"><i class="la la-power-off"></i>Invoice</a></li>

                    <?php endif; ?>

                    <li class="sidenav__item"><a href="<?php echo e(url('/logout')); ?>"><i class="la la-power-off"></i> Logout </a></li>

                </ul>
            </div><!-- end side-menu-wrap -->
        </div>
    </div><!-- end dashboard-sidebar -->





<?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\learning\application\resources\views/layouts/components/side_menu.blade.php ENDPATH**/ ?>