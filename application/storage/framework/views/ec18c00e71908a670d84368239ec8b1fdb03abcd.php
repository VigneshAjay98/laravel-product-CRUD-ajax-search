<?php
      $uri = explode('?' ,$_SERVER['REQUEST_URI']);
      $act = explode('/',$uri[0]); 
   ?>



<style>

    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: none !important;
        text-align: center;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #51be78;
        border-color: #51be78;
    }

</style>

<?php $__env->startSection('content'); ?>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="dashboard-content-wrap">
      <?php echo $__env->make('component.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <h3 class="widget-title">Users</h3>
                            <?php if(in_array('corporate', $act)): ?>
                              <a href="<?php echo e(url('/corporate/create')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>Add</a>
                            <?php elseif(in_array('users', $act)): ?>
                              <a href="<?php echo e(url('/users/create')); ?>" class="theme-btn view-btn"><i class="la la-plus mr-2 font-size-16"></i>Add</a>
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

                        <div class="row container">
                            <div class="col-lg-12">
                                <table class="table">
                                  <thead style="border-top: 1px solid #dee2e6;">
                                    <tr>
                                      <th scope="col">Id</th>
                                      <th scope="col">Company</th>
                                      <th scope="col">Role</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Activity</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1; $k=0; ?>
                                    <?php if(count($users)>0): ?>

                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php //  echo"<pre>"; print_r($user->company->name); exit; ?>
                                      <tr>
                                          <td scope="row"><?php echo $i++; ?></td>
                                        <?php if(in_array('corporate', $act)): ?>
                                          <td><?php echo e(@$user->comp_name); ?></td>
                                        <?php else: ?>
                                          <td><?php if(@$user->company->name): ?><?php echo e(@$user->company->name); ?><?php else: ?><?php echo e("-"); ?><?php endif; ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($user->role); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                          <?php if(@$user->status == 'Active'): ?>
                                            <a href="javascript:;" data="<?php echo e($user->status); ?>" data-id="<?php echo e($user->id); ?>" class="btn-primary status" style="padding: 3px 10px;">Active</a>
                                            <?php else: ?>
                                            <a href="javascript:;" data="<?php echo e($user->status); ?>" data-id="<?php echo e($user->id); ?>" class="btn-danger status" style="padding: 3px 10px;">Inactive</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                          <a href="<?php if(in_array('corporate', $act)): ?> <?php echo e(url('/corporate/'.$user->id.'/edit')); ?> <?php else: ?> <?php echo e(url('/users/'.$user->id.'/edit')); ?> <?php endif; ?>"  title="Edit"><i class="far fa-edit" style="color: #4f6481;"></i>&nbsp;&nbsp;</a><!-- |&nbsp;&nbsp;<a href="#" title="Reset Password" style="color: #2e5591;"><i class="fas fa-key" style="color: #22695bba;"></i></a> -->
                                        </td>
                                      </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php else: ?>
                                        <?php $k++; ?>
                                      <?php endif; ?>
                                    </tbody>
                                    </table>
                                      <?php if(@$k>0): ?>
                             <div class="text-center">
                                <h5>No Records Found&nbsp;<i class="fa fa-exclamation" aria-hidden="true"></i></h5>
                             </div>
                             <?php endif; ?>
                            </div>
                           
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


<div class="modal-form text-center" id="modal">
    <div class="modal fade status_model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure you want to <span id="status"></span>?</h4>
                        <input type="hidden" id="user_id">
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" type="button" class="theme-btn border-0 cnf_btn" data-dismiss="modal">Yes</a>
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
$(".status").on("click",function(e){
    var id = $(this).attr('data-id');
    var status = $(this).attr('data');
    $("#user_id").val(id);
    if(status == 'Active')
      $("#status").text('Inactive');
    else
      $("#status").text('Active');
    $('.status_model').modal('show');
});

$('.cnf_btn').on("click", function(e) {
  var id = $('#user_id').val();
  var status = $('#status').text();
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url: "<?php echo e(url('/user_status')); ?>",
      data: {
          _token: '<?php echo e(csrf_token()); ?>',
          id:id, status:status
      },
      success: function(data)
      {
        location.reload();
      }
  });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/user/users_list.blade.php ENDPATH**/ ?>