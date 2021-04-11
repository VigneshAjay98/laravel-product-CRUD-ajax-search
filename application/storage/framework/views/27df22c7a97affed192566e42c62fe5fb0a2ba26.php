

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
    }
</style>
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
      <?php echo $__env->make('component.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <h3 class="widget-title">Course Assigned Details</h3>
                            <a href="<?php echo e(url('course_assign/create')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>New Assign</a>
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
                                            <th scope="col">User Name</th>
                                            <th scope="col">Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = @$course_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e(@$course_users->firstItem() + $key); ?> </td>
                                            <td> <?php echo e(@$course_user->course_details->title); ?> </td>
                                            <td> <?php echo e(@$course_user->user_details->name); ?> </td>
                                            <td> <a href="javascript:;" data-id="<?php echo e(@$course_user->id); ?>" data-course_id="<?php echo e(@$course_user->course_id); ?>" data-user_id="<?php echo e(@$course_user->user_id); ?>" class="assign_delete"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($course_users->links()); ?>

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

<div class="modal-form text-center" id="modal">
    <div class="modal fade delete_model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure you want to delete.</h4>
                        <input type="hidden" id="assigned_id">
                        <input type="hidden" id="course_id">
                        <input type="hidden" id="user_id">
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" type="button" class="theme-btn border-0 delete_cnf" data-dismiss="modal">Yes</a>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<script type="text/javascript">
$(".assign_delete").on("click",function(e){
    var id = $(this).attr('data-id');
    var course_id = $(this).attr('data-course_id');
    var user_id = $(this).attr('data-user_id');
    // alert(id);
    $('#assigned_id').val(id);
    $('#course_id').val(course_id);
    $('#user_id').val(user_id);
    $('.delete_model').modal('show');
});

$('.delete_cnf').on("click", function(e) {
    var id = $('#assigned_id').val();
    var course_id = $('#course_id').val();
    var user_id = $('#user_id').val();
    e.preventDefault();
    $.ajax({
        type: 'DELETE',
        url: "<?php echo e(url('/course_assign')); ?>/"+id,
        data: {
            _token: '<?php echo e(csrf_token()); ?>'
        },
        success: function(data)
        {
            location.reload();
        }
    });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course_assign/course_assign_list.blade.php ENDPATH**/ ?>