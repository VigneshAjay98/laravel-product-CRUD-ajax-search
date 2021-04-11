

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
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">Product Details</h3>
                        </div>
                        <div class="container">
                            <?php if(@$product): ?>
                            <?php $images = json_decode($product->images); ?>
                            <div class="card-item">
                                <div class="card-content">
                                    <h3 class="card__title">
                                        <a><?php echo e(@$product->name); ?></a>
                                    </h3>
                                    <div class="card-image" style="width: 30%;">
                                        <a class="card__img"><img src="<?php echo e(url('application/public/uploads/products/'.@$images[0])); ?>" alt=""></a>
                                    </div>
                                    <p class="card__label">
                                        <span>Category: <?php echo e(@$product->category); ?></span>
                                    </p>
                                    <div class="container">
                            <div class="my-course-content-wrap">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show" id="all-courses">
                                        <div class="my-course-content-body">
                                            <div class="lecture-overview-item">
                                                <div class="question-overview-filter-wrap my-course-filter-wrap d-flex align-items-center justify-content-center">
                                                    
                                                </div>
                                            </div><!-- end lecture-overview-item -->
                                            <div class="my-course-container">
                                                <div class="row">
                                                     <div class="col-lg-12">
                                                        <div class="portfolio-list row">
                                                            <?php $__currentLoopData = @$images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="single-portfolio-item col-lg-4 all" style="width: 15%;">
                                                                <div class="portfolio-hover">
                                                                    <a class="portfolio-link" href="<?php echo e(url('application/public/uploads/products/'.$image)); ?>" data-fancybox="gallery" data-caption="Image 1">
                                                                        <img src="<?php echo e(url('application/public/uploads/products/'.$image)); ?>" alt="portfolio-image">
                                                                        <i class="la la-plus icon-element"></i>
                                                                    </a>
                                                                </div><!-- end portfolio-hover -->
                                                            </div><!-- end single-portfolio-item -->
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div><!-- end tab-pane -->
                                </div>
                            </div>
                            </div>
                        </div>
                                    <div class="card-para mb-3">
                                        <h3 class="widget-title">Description</h3>
                                        <p class="font-size-14 line-height-24">
                                            <?php echo e(@$product->description); ?>

                                        </p>
                                    </div>
                                    <?php if(Auth()->user()->role == 'admin'): ?>
                                        <div class="btn-box w-100 text-center mb-3">
                                            <?php if(@$product->status == 'Active'): ?>
                                            <a class="theme-btn d-block active" style="color: #fff;"><?php echo e(@$product->status); ?></a>
                                            <?php else: ?>
                                                <a class="theme-btn d-block inactive" style="color: #fff; background-color: #dc3545;"><?php echo e(@$product->status); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                    <div class="btn-box w-100 text-center mb-3">
                                        <a href="#" class="theme-btn d-block">BUY NOW</a>
                                    </div>
                                    <?php endif; ?>
                                    <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                        <span class="card__price">$58.00</span>
                                        <?php if(Auth()->user()->role == 'user'): ?>
                                        <a href="#" class="text-btn">Add to cart</a>
                                        <?php endif; ?>
                                    </div><!-- end card-price-wrap -->
                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div>
                        <?php endif; ?>
                        
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

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\product\application\resources\views/product_details.blade.php ENDPATH**/ ?>