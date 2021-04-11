

<?php $__env->startSection('content'); ?>

<style>
     .view-btn1 {
    background-color: rgba(81, 190, 120, 0.1);
    border-color: rgba(81, 190, 120, 0.3);
    color: #51be78;
}
</style>
<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title d-flex justify-content-between">
                            <h3 class="widget-title">Assigned To: <?php echo e(@$user->name); ?></h3>
                        </div>

                        <div class="container">
                            <div class="my-course-content-wrap">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active show" id="all-courses">
                                    <div class="my-course-content-body">
                                        
                                        <div class="my-course-container">
                                            <div class="row">

                                                <?php if(@$products): ?>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $images = json_decode($product->images); ?>
                                                 <div class="col-lg-4 column-td-half">
                                                    <div class="card-item card-preview">
                                                        <div class="card-image">
                                                            <a class="card__img"><img src="<?php echo e(url('application/public/uploads/products/'.@$images[0])); ?>" alt=""></a>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content">
                                                            <h3 class="card__title">
                                                                <a><?php echo e($product->name); ?></a>
                                                            </h3>
                                                            <div class="card-para mb-3">
                                                                <p class="font-size-14 line-height-24">
                                                                    <?php echo e(@$product->short_description); ?>

                                                                </p>
                                                            </div>
                                                            <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                                                <span class="card__price"><?php echo e($product->price); ?></span>
                                                            </div><!-- end card-price-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <h3>No Records Found!</h3>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div><!-- end tab-pane -->
                            </div>
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

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<script>
    
    $(document).on('click', '.create_btn', function(){
        $('.create_filters').show();
    });

    // Product creation validation

    $("#create_product").validate({
    errorElement: "div",
    rules: {
        product_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        description: {
            required: true,
        },
        category: {
            required: true,
        },
        price: {
            required: true,
        },
        files: {
            required: true,
        },
        status: {
            required: true,
        }
        
    },
    messages: {
        product_name: {
            required: "Please enter product name.",
        },
        short_description: {
            required: "Please enter short description.",
        },
        description: {
            required: "Please enter description.",
        },
        category: {
            required: "Please enter category.",
        },
        price: {
            required: "Please enter price.",
        },
        files: {
            required: "Please upload images.",
        },
        status: {
            required: "This field is required",
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\product\application\resources\views/assigned_products.blade.php ENDPATH**/ ?>