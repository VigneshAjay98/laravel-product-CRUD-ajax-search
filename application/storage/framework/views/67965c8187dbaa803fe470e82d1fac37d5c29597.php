<?php
      $uri = $_SERVER['REQUEST_URI'];
      $act = explode('/',$uri); 
   ?>



<?php $__env->startSection('content'); ?>

<style>

    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: none !important;
        text-align: center;
    }

    .sort-ordering .dropdown-toggle {
      padding: .375rem .75rem;
    }

</style>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <?php echo $__env->make('layouts.components.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <h3 class="widget-title">Users</h3> 
                        </div>

                        <div class="container">
                        <form method="post" id="assign_product" action="<?php echo e(url ('/users')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                              <div class="col-lg-4">
                                    <div class="input-box">
                                        <label class="label-text">Product Name<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Product name">
                                            <input type="hidden" name="product_id" id="product_id" class="product_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-box">
                                        <label class="label-text">Assign to<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="customer_name" name="customer_name" placeholder="Customers name" value="<?php echo e(old('assign')); ?>">
                                            <input type="hidden" name="customer_id" id="customer_id" class="customer_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex align-items-center">
                                    <button class="theme-btn" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div class="row container">
                            <div class="col-lg-12">
                                <table class="table">
                                  <thead style="border-top: 1px solid #dee2e6;">
                                    <tr>
                                      <th scope="col">SL No</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                      <!-- <th scope="col">Certificate</th> -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if(@$users): ?>
                                    <?php $i=1; ?>
                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <th scope="row"><?php echo e($i++); ?></th>
                                      <td><?php echo e($user->name); ?></td>
                                      <td><?php echo e($user->status); ?></td>
                                      <td><a href="<?php echo e(url('users/'.$user->id)); ?>"><i class="la la-eye mr-1 font-size-16"></i></a></td>
                                      <!-- <td>
                                        <a href="#" title="Preview"><i class="far fa-eye" style="color: #212529;"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" title="Generate Certificate" style="color: #2da75c;"><i class="far fa-file-alt" style="color: #22695bba;"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a href="./create_certificate" title="Create Certificate" style="color: #2e5591;"><i class="fas fa-plus"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a href="#" title="Download Certificate" style="color: #2e5591;"><i class="fas fa-download"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a href="mailto:vikky@lentera.in" title="Send mail" style="color: #c73f3fc2;"><i class="far fa-paper-plane"></i></a>
                                      </td> -->
                                    </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr>
                                        <td align="center" colspan="5">No Records Found!</td>
                                    </tr>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <?php echo $__env->make('layouts.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->


<!-- Certificate Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Certificate Preview</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->
    </div>
    <div class="modal-body">
        <div class="certificate_preview d-flex justify-content-center">
            <img src="<?php echo e(url('asset/images/approved.png')); ?>"style="width: 50%;">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Confirm</button>
      </div>
  </div>
</div>


<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<script>
    

    $("#assign_product").validate({
      errorElement: "div",
      rules: {
          product_name: {
              required: true,
          },
          customer_name: {
              required: true,
          }
          
      },
      messages: {
          product_name: {
              required: "Please enter product name.",
          },
          customer_name: {
              required: "Please enter customer name.",
          }
      },
      // submitHandler: function (form) {
      //     form.submit();
      // }
  });

    $(document).ready(function(){

      $( "#product_name" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"<?php echo e(url('product_name')); ?>",
            type: 'get',
            dataType: "json",
            data: {
               _token: '<?php echo e(csrf_token()); ?>',
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#product_name').val(ui.item.label);
           $('#product_id').val(ui.item.value); 
           return false;
        }
      });

      $( "#customer_name" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"<?php echo e(url('customer_name')); ?>",
            type: 'get',
            dataType: "json",
            data: {
               _token: '<?php echo e(csrf_token()); ?>',
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#customer_name').val(ui.item.label);
           $('#customer_id').val(ui.item.value); 
           return false;
        }
      });


    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\product\application\resources\views/users_list.blade.php ENDPATH**/ ?>