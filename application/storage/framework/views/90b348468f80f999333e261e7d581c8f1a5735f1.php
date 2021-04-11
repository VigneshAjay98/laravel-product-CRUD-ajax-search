<?php
    $uri = $_SERVER['REQUEST_URI'];
    $act = explode('/',$uri); 
?>



<?php $__env->startSection('content'); ?>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <h3 class="widget-title">Courses</h3>
                            <?php if(Auth::user()->role == 'super_admin'): ?>
                            <a href="<?php echo e(url ('courses/create')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>Create New</a>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mx-3 d-flex justify-content-center" style="padding: 15px; border: 1px solid; border-radius: 10px; color: #dee2e6;">
                          <div class="contact-form-action d-flex">
                              <form>
                                <?php echo csrf_field(); ?>
                                  <div class="input-box">
                                      <div class="form-group d-flex align-items-center">
                                          <input class="form-control mr-2" type="text" name="search" placeholder="Search for anything">
                                          <input type="submit" value="Search" class="theme-btn view-btn">
                                      </div>
                                  </div>
                              </form>
                          </div>
                        </div>
                        <div class="card-box-shared-body">
                            <?php if(@count($courses)>0): ?>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-item card-list-layout">
                                <div class="card-image">
                                    <a href="course_view/<?php echo e(!empty($course->e_id)?$course->e_id:$course->id); ?>" class="card__img"><img src="<?php echo e(URL::to('/')); ?>/application/public/<?php echo e($course->img); ?>" alt=""></a>
                                </div><!-- end card-image -->
                                <div class="card-content">
                                    <h3 class="card__title mt-0">
                                        <a href="/course_view/<?php echo e(!empty($course->e_id)?$course->e_id:$course->id); ?>"><?php echo e($course->title); ?></a>
                                    </h3>
                                    <p class="card__author">
                                        <a href="#"><?php echo e($course->sub_title); ?></a>
                                    </p>
                                
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <ul class="review-stars">
                                            <li><span class="la la-star"></span></li>
                                            <li><span class="la la-star"></span></li>
                                            <li><span class="la la-star"></span></li>
                                            <li><span class="la la-star"></span></li>
                                            <li><span class="la la-star-o"></span></li>
                                        </ul>
                                        <span class="star-rating-wrap">
                                            <span class="star__rating">4.4</span>
                                            <span class="star__count">(20)</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    <div class="card-action">
                                        <ul class="card-duration d-flex">
                                            <li>
                                                <span class="meta__date mr-2">
                                                    <span class="status-text">Status:</span>
                                                    <?php if($course->status == 'Active'): ?>
                                                    <span class="badge bg-success text-white">Active</span>
                                                    <?php else: ?>
                                                    <span class="badge bg-danger text-white">InActive</span>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="meta__date mr-2">
                                                    <span class="status-text">Duration:</span>
                                                    <span class="status-text primary-color-3"><?php echo e($course->duration); ?></span>

                                                </span>
                                            </li>
                                          <!--   <li>
                                                <span class="meta__date mr-2">
                                                    <span class="status-text">Students:</span>
                                                    <span class="status-text primary-color-3">12</span>
                                                </span>
                                            </li> -->
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="card-price-wrap d-flex align-items-center">
                                        <p class="card__price">&#xa3;<?php echo e($course->course_price); ?>.00</p>
                                        <div class="edit-action">
                                            <ul class="edit-list">
                                                <li><a href="./course_view/<?php echo e(!empty($course->e_id)?$course->e_id:$course->id); ?>" class="theme-btn view-btn"><i class="la la-eye mr-1 font-size-16"></i>View</a></li>
                                                <?php if(Auth::user()->role == 'super_admin'): ?>
                                                <li><a href="<?php echo e(url('/courses/'.$course->id.'/edit')); ?>" class="theme-btn edit-btn"><i class="la la-edit mr-1 font-size-16"></i>Edit </a></li>
                                                <li><span class="theme-btn delete-btn" data-toggle="modal" data-target=".item-delete-modal"><i class="la la-trash mr-1 font-size-16"></i>Delete</span></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div><!-- end card-price-wrap -->
                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
           <?php echo $__env->make('layouts.components.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course/list.blade.php ENDPATH**/ ?>