

<?php $__env->startSection('content'); ?>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<style type="text/css">
    .border {
        border: 1px solid !important;
        border-radius: 10px;
    }

    .icon-box .icon-element {
        width: 40px;
        height: 40px;
        line-height: 45px;
        font-size: 20px;
        margin-right: 10px;
    }

    .icon-box {
        margin-bottom: 0px !important;
        padding: 15px;
    }

    .icon-box .info__title {
        font-size: 15px;
    }

    .icon-box .info__count {
        font-size: 20px;
    }

    .theme-btn {
        padding: 0 20px 0 20px;
        line-height: 35px;
        font-size: 15px;
    }
</style>
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <?php echo $__env->make('component.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-center">
                        <div class="card-box-shared col-lg-5">
                            <div class="card-box-shared-body">
                                <div class="row">
                                    <div class="col-lg-6 column-lmd-2-half column-md-2-full">
                                        <div class="icon-box d-flex align-items-center">
                                            <div class="icon-element icon-element-bg-1 flex-shrink-0">
                                                <i class="la la-graduation-cap"></i>
                                            </div>
                                            <div class="info-content">
                                                <h4 class="info__title mb-2">Courses Credits Available&nbsp;&nbsp;<span class="info__count"><?php echo e(@$course_credit_available); ?></span></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 column-lmd-2-half column-md-2-full">
                                        <div class="icon-box d-flex align-items-center">
                                            <div class="icon-element icon-element-bg-3 flex-shrink-0">
                                                <i class="la la-graduation-cap"></i>
                                            </div>
                                            <div class="info-content">
                                                <h4 class="info__title mb-2">Courses Credits Used&nbsp;&nbsp;<span class="info__count"><?php echo e(@$course_credit_used); ?></span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a href="<?php echo e(url('credits/course/create/')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>Buy Course Credits</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="card-box-shared col-lg-5">
                            <div class="card-box-shared-body">
                                <div class="row">

                                    <div class="col-lg-6 column-lmd-2-half column-md-2-full">
                                        <div class="icon-box d-flex align-items-center">
                                            <div class="icon-element icon-element-bg-1 flex-shrink-0">
                                                <i class="la la-certificate"></i>
                                            </div>
                                            <div class="info-content">
                                                <h4 class="info__title mb-2">Certificate Credits Available&nbsp;&nbsp;<span class="info__count"><?php echo e(@$certificate_credit_available); ?></span></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 column-lmd-2-half column-md-2-full">
                                        <div class="icon-box d-flex align-items-center">
                                            <div class="icon-element icon-element-bg-3 flex-shrink-0">
                                                <i class="la la-certificate"></i>
                                            </div>
                                            <div class="info-content">
                                                <h4 class="info__title mb-2">Certificate Credits Used&nbsp;&nbsp;<span class="info__count"><?php echo e(@$certificate_credit_used); ?></span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 2%">

                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a href="<?php echo e(url('credits/certificate/create')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>Buy Certificate Credits</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <h3 class="widget-title">Course Credit Details</h3>
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
                            <div class="statement-table purchase-table table-responsive mb-5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No.</th>
                                            <th scope="col">Course</th>
                                            <?php if(Auth()->user()->role == 'super_admin'): ?>
                                            <th scope="col">User</th>
                                            <?php endif; ?>
                                            <th scope="col">Type</th>
                                            <th scope="col">Available Credit</th>
                                            <th scope="col">Used Credit</th>
                                            <th scope="col">Total Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = @$credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($credits->firstItem() + $key); ?> </td>
                                            <td> <?php echo e(@$credit->course_details->title); ?> </td>
                                            <?php if(Auth()->user()->role == 'super_admin'): ?>
                                            <?php if(isset($credit->userid)): ?>
                                            <td> <?php echo e(@$credit->user_details->name); ?> </td>
                                            <?php else: ?>
                                            <td> <?php echo e(@$credit->company_details->name); ?> (Corporate) </td>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <td> <?php echo e(@$credit->type); ?> </td>
                                            <td> <?php echo e(@$credit->balance_credit); ?> </td>
                                            <td> <?php echo e(@$credit->used_credit); ?> </td>
                                            <td> <?php echo e(@$credit->credit); ?> </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e(@$credits->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.components.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/credit/credit_history.blade.php ENDPATH**/ ?>