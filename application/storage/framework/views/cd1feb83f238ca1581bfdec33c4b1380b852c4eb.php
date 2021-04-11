

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(url('asset/sample_certificate/base.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(url('asset/sample_certificate/fancy.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(url('asset/sample_certificate/main.css')); ?>" />
<script src="<?php echo e(url('asset/sample_certificate/compatibility.min.js')); ?>"></script>
<script src="<?php echo e(url('asset/sample_certificate/theViewer.min.js')); ?>"></script>

<style>
    .theme-btn {
        line-height: 30px;
        padding: 0 10px 0 10px;
    }
</style>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dashboard-content-wrap">
        <?php echo $__env->make('component.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">My Certificate</h3>
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
                            <div class="my-bookmark-wrap">
                                <div class="row">
                                    <div class="statement-table purchase-table table-responsive mb-5">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Cert No.</th>
                                                    <th>Course</th>
                                                    <th>User</th>
                                                    <th>Summary</th>
                                                    <th>Valid Till</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                $k = 0; ?>
                                                <?php if(@count($certificates)>0): ?>
                                                <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php //echo "<pre>"; print_r($certificate); exit(); 
                                                    ?>
                                                    <td><?php echo e($i); ?></td>
                                                    <td><?php echo e($certificate->cert_no); ?></td>
                                                    <td><?php echo e($certificate->course_details->title); ?></td>
                                                    <td><?php echo e($certificate->user_details->name); ?></td>
                                                    <td><?php echo e($certificate->score_per); ?>% (<?php echo e(date('d-m-Y', strtotime($certificate->valid_from))); ?>)</td>
                                                    <td><?php echo e(date('d-m-Y', strtotime($certificate->valid_to))); ?></td>
                                                    <td>
                                                        <?php 
                                                            $cur_date = date('d-m-Y');
                                                            if(strtotime($certificate->valid_to) < strtotime($cur_date))
                                                            {
                                                                echo "<span class='badge bg-danger text-white'>Expired</span>";
                                                            }
                                                            elseif (strtotime($certificate->valid_to) < strtotime(date('d-m-Y', strtotime('+30 days'))))
                                                            {
                                                                echo "<span class='badge bg-warning text-white'>Expiring</span>";
                                                            }
                                                            else
                                                            {
                                                                echo "<span class='badge bg-success text-white'>Active</span>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(url('/duplicate_cert/'.$certificate->user_id.'/'.$certificate->course_id)); ?>" title="Duplicate"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;
                                                        <?php if($auth_type == 'corporate_admin'): ?>
                                                            <?php if($certificate->print_status == 'Printed'): ?>
                                                                <a href="<?php echo e(url('/original_print/'.$certificate->user_id.'/'.$certificate->course_id)); ?>" title="Original"><i class="fa fa-print"></i></a>
                                                            <?php else: ?>
                                                                <?php if($certificate->cert_no_config == 'manual' && $certificate->cert_no == 'XXXXX'): ?>
                                                                    <a href="javascript:;" data-user_id="<?php echo e($certificate->user_id); ?>" data-course_id="<?php echo e($certificate->course_id); ?>" class="btn-sm manual_no" title="Original"><i class="fa fa-plus"></i></a>
                                                                <?php endif; ?>
                                                                <?php if($certificate->cert_no != 'XXXXX'): ?>
                                                                    <a href="javascript:;" data-user_id="<?php echo e($certificate->user_id); ?>" data-course_id="<?php echo e($certificate->course_id); ?>" class="btn-sm original" title="Original"><i class="fa fa-print"></i></a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <?php echo e(@$certificates->links()); ?>

                                    </div>
                                </div><!-- end row -->
                            </div>
                        </div>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
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

<div class="modal-form text-center" id="modal">
    <div class="modal fade cnf_model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <form action="<?php echo e(url('/original_cert')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content p-4">
                    <div class="modal-top border-0 mb-4 p-0">
                        <div class="alert-content">
                            <span class="la la-exclamation-circle warning-icon"></span>
                            <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure you want to use the credits ?</h4>
                        </div>
                    </div>
                    <div class="btn-box">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="course_id" id="course_id">
                        <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="theme-btn border-0" value="Yes">
                    </div>
                </div><!-- end modal-content -->
            </form>
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<div class="modal-form text-center" id="manual_no_modal">
    <div class="modal fade manual" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <form action="<?php echo e(url('/cert_no')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content p-4">
                    <div class="modal-top border-0 mb-4 p-0">
                        <div class="alert-content">
                            <span class="la la-exclamation-circle warning-icon"></span>
                            <label class="label-text">Enter the certificate number:</label>
                            <input type="text" name="cert_no" class="form-control" required>
                        </div>
                    </div>
                    <div class="btn-box">
                        <input type="hidden" name="user_id" id="manual_user_id">
                        <input type="hidden" name="course_id" id="manual_course_id">
                        <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="theme-btn border-0" value="Yes">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('.original').on("click", function(e) {
        var user_id = $(this).attr("data-user_id");
        var course_id = $(this).attr("data-course_id");
        $('#user_id').val(user_id);
        $('#course_id').val(course_id);
        $('.cnf_model').modal('show');
    });
    $('.manual_no').on("click", function(e) {
        var user_id = $(this).attr("data-user_id");
        var course_id = $(this).attr("data-course_id");
        $('#manual_user_id').val(user_id);
        $('#manual_course_id').val(course_id);
        $('.manual').modal('show');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/user/myCertificate.blade.php ENDPATH**/ ?>