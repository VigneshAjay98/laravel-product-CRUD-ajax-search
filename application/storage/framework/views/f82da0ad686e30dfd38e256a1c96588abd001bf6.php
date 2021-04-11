

<?php $__env->startSection('content'); ?>
<!-- ================================
    START DASHBOARD AREA
================================= -->
<style type="text/css">
    .upload-btn-box .jFiler-input .jFiler-input-button:after {
      position: absolute;
      content: 'Upload a Certificate' !important;
      top: 0;
      left: 0;
      padding-top: 10px;
      color: #7f8897;
      width: 100%;
      height: 100%;
      padding-left: 30px;
    }
</style>
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <form method="POST" action="<?php echo e(url('/courses/certificate/'.$course->id.'/store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content dashboard-bread-content d-flex align-items-center justify-content-between">
                            <div class="card-box-title" style="padding-bottom: 0;">
                                <h3 class="widget-title d-flex justify-content-left"><?php echo e($course->title); ?></h3>
                                <br>
                            </div>
                            <div class="card-item card-list-layout">
                                <div class="card-image">
                                    <a href="./course_view" class="card__img"><img src="<?php echo e(URL::to('/')); ?>/application/public/<?php echo e($course->img); ?>" alt=""></a>
                                </div><!-- end card-image -->
                                <div class="card-content">
                                    <h3 class="card__title mt-0">
                                        <a href="./course_view"><?php echo e($course->title); ?></a>
                                    </h3>
                                    <p class="card__author">
                                        <a href="teacher-detail.html"><?php echo e($course->sub_title); ?></a>
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
                                                    <?php if($course->status=='Active'): ?>
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
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="card-price-wrap d-flex align-items-center">
                                        <p class="card__price">&#163; <?php echo e($course->course_price); ?>.00</p>
                                        <div class="edit-action">
                                        </div>
                                    </div><!-- end card-price-wrap -->
                                </div><!-- end card-content -->
                            </div>
                        </div>
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="section-block"></div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card-box-shared">
                            <div class="card-box-shared-title">
                                <h3 class="widget-title">Certificates</h3>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Certificate Name</label>
                                        <input type="text" class="form-control" name="certificate_name" value="<?php echo e(@$certificate->certificate_name); ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Certificate Price</label>
                                        <input type="text" class="form-control" name="certificate_price" value="<?php echo e(@$certificate->certificate_price); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="input-box">
                                            <label>Certificate No. Config</label>
                                            <div class="input-box">
                                                <div class="form-group">
                                                    <label for="radio-3" class="radio-trigger mb-0 mr-2">
                                                        <input type="radio" id="radio-3" name="cert_no_config" class="cert_no_config" value="automatic" <?php if(@$certificate->cert_no_config == 'automatic') echo "checked"; ?>>
                                                        <span class="checkmark"></span>
                                                        <span class="font-size-15 primary-color-3">Automatic</span>
                                                    </label>
                                                    <label for="radio-4" class="radio-trigger mb-0">
                                                        <input type="radio" id="radio-4" name="cert_no_config" class="cert_no_config" value="manual" <?php if(@$certificate->cert_no_config == 'manual') echo "checked"; ?>>
                                                        <span class="checkmark"></span>
                                                        <span class="font-size-15 primary-color-3">Manual</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-6">
                                            <label>Original</label>
                                            <div class="upload-btn-box">
                                                <input type="file" name="original_certificate" id="original_certificate" class="filer_input">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Duplicate</label>
                                            <div class="upload-btn-box">
                                                <input type="file" name="duplicate_certificate" id="duplicate_certificate" class="filer_input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <textarea class="summernote" name="certificate_content"> <?php echo e(@$certificate->certificate_content); ?></textarea>
                                    </div>
                                </div>
                                <input class="theme-btn register_btn" style="float: right; margin-top: 10px;" type="submit" value="submit">
                            </div>
                        </div>
                    </div>
                </div><!-- end col-lg-12 -->
            </form>
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

<!-- account-delete-modal -->
<div class="modal-form text-center">
    <div class="modal fade account-delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Your account will be deleted permanently!</h4>
                        <p class="modal-sub">Are you sure to proceed.</p>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="theme-btn bg-color-6 border-0 text-white">Delete</button>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->


<script type="text/javascript">
    $(document).ready(function() {

        setTimeout(function() {
            var myAttr = $('#original_certificate').attr('multiple');
            if (typeof myAttr !== 'undefined' && myAttr !== false) {
                $('#original_certificate').removeAttr("multiple");
                $('#original_certificate').attr('name','original_certificate');
            }
        }, 250);
               
        setTimeout(function() {
            var myAttr = $('#duplicate_certificate').attr('multiple');
            if (typeof myAttr !== 'undefined' && myAttr !== false) {
                $('#duplicate_certificate').removeAttr("multiple");
                $('#duplicate_certificate').attr('name','duplicate_certificate');
            }
        }, 250);

        $('.summernote').summernote({
          placeholder: 'Certificate Content',
          tabsize: 2,
          height: 100
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/certificates.blade.php ENDPATH**/ ?>