

<?php $__env->startSection('content'); ?>

<style>
    
    .no_ofusers:hover, .no_ofcourses:hover, .assigned_courses:hover, .cert_printed:hover, .total_expenditure:hover, .courses_completed:hover, .courses:hover, .active_courses:hover, .completed_courses:hover, .active_certificates:hover, .expiring_certificates:hover {
        cursor: pointer;
        border: 1px solid;
    }

</style>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    
    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="dashboard-content-wrap" style="padding-top: 0;">
        <div class="container-fluid">
            
            <div class="row mt-5" style="height: 300px">
                <div class="col-lg-12">
                    <h3 class="widget-title">Dashboard</h3>

                    <div class="row mt-5">

                        <?php if(Auth()->user()->role=='super_admin'): ?>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center">
                                <div class="icon-element icon-element-bg-1 flex-shrink-0">
                                    <i class="la la-mouse-pointer"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Total Courses</h4>
                                    <span class="info__count"><?php echo e(@$totalcourses); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center">
                                <div class="icon-element icon-element-bg-4 flex-shrink-0">
                                    <i class="la la-users"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Total Users</h4>
                                    <span class="info__count"><?php echo e(@$totalusers); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center">
                                <div class="icon-element icon-element-bg-3 flex-shrink-0">
                                    <i class="la la-graduation-cap"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Completed Courses</h4>
                                    <span class="info__count"><?php echo e(@$totalcompletedcourses); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php elseif(Auth()->user()->role=='corporate_admin'): ?>
                      
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center no_ofusers">
                                <div class="icon-element icon-element-bg-4 flex-shrink-0">
                                    <i class="la la-users"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">No of Users</h4>
                                    <span class="info__count"><?php echo e(@$totalusers); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center no_ofcourses">
                                <div class="icon-element icon-element-bg-4 flex-shrink-0">
                                    <i class="far fa-file"></i>                                
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">No of Courses</h4>
                                    <span class="info__count"><?php echo e(@$purchasedcourses); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center assigned_courses">
                                <div class="icon-element icon-element-bg-4 flex-shrink-0">
                                    <i class="fas fa-sitemap"></i>                                
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Assigned Courses</h4>
                                    <span class="info__count"><?php echo e(@$assigned_courses); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center cert_printed">
                                <div class="icon-element icon-element-bg-5 flex-shrink-0">
                                    <i class="la la-file-video-o"></i>
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Certificates Printed</h4>
                                    <span class="info__count"><?php echo e(@$certprinted); ?></span>
                                </div><!-- end info-content -->
                            </div>
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center total_expenditure">
                                <div class="icon-element icon-element-bg-1 flex-shrink-0">
                                    <!-- <i class="la la-dollar"></i> -->&#xa3;
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Total Expenditure</h4>
                                    <span class="info__count">&#xa3;&nbsp;<?php echo e(@$totalexpenses); ?></span>
                                </div><!-- end info-content -->
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center courses_completed">
                                <div class="icon-element icon-element-bg-3 flex-shrink-0">
                                    <i class="la la-graduation-cap"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Courses Completed</h4>
                                    <span class="info__count"><?php echo e(@$completed_courses); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 column-lmd-2-half column-md-full">
                            <div class="chart-item">
                                <div class="chart-headline margin-bottom-30px d-flex justify-content-between align-items-center">
                                    <h3 class="widget-title font-size-18">Course Trend</h3>
                                </div>
                                <canvas id="credits_usage"></canvas>
                          
                            </div><!-- end chart-item -->
                        </div><!-- end col-lg-7 -->
                        <div class="col-lg-6 column-lmd-2-half column-md-full">
                            <div class="chart-item">
                                <div class="chart-headline margin-bottom-30px d-flex justify-content-between align-items-center">
                                    <h3 class="widget-title font-size-18">Certificates </h3>
                                </div>
                                <canvas id="certificate-chart"></canvas>
                           
                            </div><!-- end chart-item -->
                        </div><!-- end col-lg-7 -->
                        <div class="col-lg-6 column-lmd-2-half column-md-full">
                            <div class="chart-item">
                                <div class="chart-headline margin-bottom-30px d-flex justify-content-between align-items-center">
                                    <h3 class="widget-title font-size-18">Expenditure Trend</h3>
                                </div>
                                <canvas id="expenses-chart"></canvas>
                                <!-- <div class="chart-legend text-center margin-top-40px">
                                    <ul>
                                        <li>Expenses over the month</li>
                                    </ul>
                                </div> -->
                            </div><!-- end chart-item -->
                        </div><!-- end col-lg-7 -->
                        <div class="col-lg-6 column-lmd-2-half column-md-full">
                            <div class="chart-item">
                                <div class="chart-headline margin-bottom-30px d-flex justify-content-between align-items-center">
                                    <h3 class="widget-title font-size-18">Total Expenses</h3>
                                </div>
                                <canvas id="course_certExpense"></canvas>
                                <!-- <div class="chart-legend text-center margin-top-40px">
                                    <ul>
                                        <li>Expenses over the month</li>
                                    </ul>
                                </div> -->
                            </div><!-- end chart-item -->
                        </div><!-- end col-lg-7 -->
                        <?php else: ?>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center courses">
                                <div class="icon-element icon-element-bg-2 flex-shrink-0">
                                    <i class="la la-file-text-o"></i>
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Courses</h4>
                                    <span class="info__count"><?php echo e(@$completed); ?></span>
                                </div><!-- end info-content -->
                            </div>
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center active_courses">
                                <div class="icon-element icon-element-bg-3 flex-shrink-0">
                                    <i class="la la-graduation-cap"></i>
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Active</h4>
                                    <span class="info__count"><?php echo e(@$pending); ?></span>
                                </div><!-- end info-content -->
                            </div>
                        </div><!-- end col-lg-4 -->
                         <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center completed_courses">
                                <div class="icon-element icon-element-bg-5 flex-shrink-0">
                                    <i class="la la-file-video-o"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Completed</h4>
                                    <span class="info__count"><?php echo e(@$totalpurchased); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center active_certificates">
                                <div class="icon-element icon-element-bg-5 flex-shrink-0">
                                    <i class="la la-file-video-o"></i>
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Active Certificates</h4>
                                    <span class="info__count">0</span>
                                </div><!-- end info-content -->
                            </div>
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4 column-lmd-2-half column-md-2-full">
                            <div class="icon-box d-flex align-items-center expiring_certificates">
                                <div class="icon-element icon-element-bg-1 flex-shrink-0">
                                    <i class="la la-dollar"></i>
                                </div><!-- end icon-element-->
                                <div class="info-content">
                                    <h4 class="info__title mb-2">Expiring Certificate</h4>
                                    <span class="info__count">0</span>
                                </div><!-- end info-content -->
                            </div>
                        </div><!-- end col-lg-4 -->

              
                        <div class="col-lg-6 column-lmd-2-half column-md-full">
                           <div class="chart-item">
                                <div class="chart-headline margin-bottom-30px d-flex justify-content-between align-items-center">
                                    <h3 class="widget-title font-size-18">Course Trend</h3>
                                </div>
                                <canvas id="course-trend"></canvas>
                            </div>
                        </div>
                    </div>
                     <?php endif; ?>
                </div>
            <?php echo $__env->make('layouts.components.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
  
        </div><!-- end container-fluid -->

    </div><!-- end dashboard-content-wrap -->

</section><!-- end dashboard-area -->

<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('charts'); ?>

<script type="text/javascript" >

    <?php if(Auth()->user()->role == "corporate_admin") { ?>

        var ctx = document.getElementById('credits_usage').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                // labels: [<?php // foreach(@$month_namearr as $key => $month_name) { echo "'".$month_name."',";} ?>],
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                      { label: 'Courses bought',
                        fill: false,
                        backgroundColor: '#51be78',
                        borderColor: "#51be78",
                       strokeColor: "rgba(220,220,220,1)",
                       data: [<?php for($i=1; $i<=12; $i++) { if(array_key_exists($i, $credits_arr)) { echo $credits_arr[$i].","; } else { echo " ".",";} } ?>], 
                      },
                      { label: 'Courses Completed',
                      fill: false,
                      backgroundColor: '#ee8807',
                        borderColor: "#ee8807",
                       strokeColor: "rgba(151,187,205,1)",
                       data: [<?php for($i=1; $i<=12; $i++) { if(array_key_exists($i, $purchase_arr)) { echo $purchase_arr[$i].","; } else { echo " ".",";} } ?>]
                      }
                  ]
            },

            // Configuration options go here
            options: {}
        });

        var ctx = document.getElementById('certificate-chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                      { label: 'Certificate bought',
                        fill: false,
                        backgroundColor: '#51be78',
                        borderColor: "#51be78",
                       strokeColor: "rgba(220,220,220,1)",
                       data: [65, 59, 80, 81, 56, 55, 40]
                      },
                      { label: 'Certificate printed',
                      fill: false,
                      backgroundColor: '#ee8807',
                        borderColor: "#ee8807",
                       strokeColor: "rgba(151,187,205,1)",
                       data: [28, 48, 40, 19, 86, 27, 90]
                      }
                  ]
            },

            // Configuration options go here
            options: {}
        });

        var ctx = document.getElementById('expenses-chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                      { label: 'Expenditure on certificate',
                        fill: false,
                       backgroundColor: '#51be78',
                        borderColor: "#51be78",
                       strokeColor: "rgba(220,220,220,1)",
                       data: [65, 59, 80, 81, 56, 55, 40]
                      },
                      { label: 'Expenditure on courses',
                      fill: false,
                      backgroundColor: '#ee8807',
                        borderColor: "#ee8807",
                       strokeColor: "rgba(151,187,205,1)",
                       data: [<?php for($i=1; $i<=12; $i++) { if(array_key_exists($i, $coursespent_arr)) { echo $coursespent_arr[$i].","; } else { echo "0".",";} } ?>]
                      }
                  ]
            },

            // Configuration options go here
            options: {}
        });


        var ctx = document.getElementById("course_certExpense");
    var dashboardChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Course", "Certificate"],
            datasets: [{
                label: '# of Votes',
                data: [2555, 2563],
                backgroundColor: [
                    'rgba(231, 76, 60, 1)',
                    'rgba(255, 164, 46, 1)'
                ],
                borderColor: [
                    'rgba(255, 255, 255 ,1)',
                    'rgba(255, 255, 255 ,1)'
                ],
                borderWidth: 5
            }]

        },
        options: {
            rotation: 1 * Math.PI,
            circumference: 1 * Math.PI,
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            },
            cutoutPercentage: 60
        }
    });
 
    // Counts navigation - Corporate Admin
    $(document).on('click','.no_ofusers', function(){
        window.location = "<?php echo e(url('/users')); ?>";
    });

    $(document).on('click','.no_ofcourses', function(){
        window.location = "<?php echo e(url('/courses')); ?>";
    }); 

    $(document).on('click','.assigned_courses', function(){
        window.location = "<?php echo e(url('/course_assign')); ?>";
    });

    $(document).on('click','.cert_printed', function(){
        window.location = "<?php echo e(url('/my_certificate')); ?>";
    }); 

    $(document).on('click','.total_expenditure', function(){
        window.location = "<?php echo e(url('/credits')); ?>";
    });

    $(document).on('click','.courses_completed', function(){
        window.location = "<?php echo e(url('/courses')); ?>";
    });

    <?php } 
    elseif (Auth()->user()->role=='super_admin')
    {
        
    }
    else { ?>

        var ctx = document.getElementById('course-trend').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                        { label: 'Course allocated',
                        fill: false,
                       backgroundColor: '#51be78',
                        borderColor: "#51be78",
                       strokeColor: "rgba(220,220,220,1)",
                       data: [<?php for($i=1; $i<=12; $i++) { if(array_key_exists($i, @$coursealloc_arr)) { echo @$coursealloc_arr[$i].","; } else { echo "0".",";} } ?>]
                      },
                      // { label: 'Certificate printed',
                      // fill: false,
                      // backgroundColor: '#ee8807',
                      //   borderColor: "#ee8807",
                      //  strokeColor: "rgba(151,187,205,1)",
                      //  data: [28, 48, 40, 19, 86, 27, 90]
                      // }
                  ]

            },

            // Configuration options go here
            options: {}
        });

    // Counts navigation - Users
    $(document).on('click','.courses', function(){
        window.location = "<?php echo e(url('/courses')); ?>";
    });

    $(document).on('click','.active_courses', function(){
        window.location = "<?php echo e(url('/courses')); ?>";
    });

    $(document).on('click','.completed_courses', function(){
        window.location = "<?php echo e(url('/courses')); ?>";
    });

    $(document).on('click','.active_certificates', function(){
        window.location = "<?php echo e(url('/my_certificate')); ?>";
    });

    $(document).on('click','.expiring_certificates', function(){
        window.location = "<?php echo e(url('/my_certificate')); ?>";
    });

    <?php } ?>

    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\learning\application\resources\views/dashboard.blade.php ENDPATH**/ ?>