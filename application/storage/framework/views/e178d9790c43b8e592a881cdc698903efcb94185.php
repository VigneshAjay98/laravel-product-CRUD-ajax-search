

<?php $__env->startSection('content'); ?>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="card-box-shared-body">
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
                    </div><!-- end card-item -->
                </div>
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <h3 align="center"><?php echo e($course_subs->title); ?></h3>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <form method="post" id="subtopic_save" action="<?php echo e(url('/courses/subtopic/'.$course->id.'/'.$course_subs->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <fieldset id="subTopicfield">
                                            </fieldset>
                                        </div>
                                        <input type="hidden" name="course_titleId" value="<?php echo e($course_subs->id); ?>" />
                                        <button type="button" class="btn btn-outline-secondary add" id="add"><i class="fas fa-plus"></i> SubTopic</button>

                                        <div class="row mt-2">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button class="theme-btn" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end card-box-shared-body -->
                    </div><!-- end card-box-shared -->
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

<div class="modal fade add-content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Page Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <textarea id="summernote" value=""></textarea>
                    <input type="hidden" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="theme-btn">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Your Course Content',
            tabsize: 2,
            height: 100
        });
    });
    $("#topic_save").validate({
        errorElement: "div",
        rules: {
            course_title: {
                required: true,
            },
            course_content: {
                required: true,
            }
        },
        messages: {
            course_title: {
                required: "Please enter course_title.",
            },
            course_content: {
                required: true,
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $(document).ready(function() {
        <?php if (@count($sub_topics) > 0) {
            foreach ($sub_topics as $sub_topic) { ?>
                var lastField = $("#subTopicfield div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"course_subtopic[]\" placeholder=\"Enter SubTopic\" required value=\"<?php echo e(@$sub_topic->title); ?>\">");
                var editor = $("<div class=\"col-lg-12 col-sm-6\"><textarea class=\"summernote\" name=\"course_content[]\"><?php echo e(@$sub_topic->content); ?></textarea></div>");
                var hidden = $("<input class=\"form-control my-2\" type=\"hidden\" name=\"subtopic_id[]\" value=\"<?php echo e(@$sub_topic->id); ?>\"> ");
                var removeButton = $("<a class=\"d-flex justify-content-end\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(editor);
                fieldWrapper.append(hidden);
                fieldWrapper.append(removeButton);
                $("#subTopicfield").append(fieldWrapper);
                $('.summernote').summernote({
                    placeholder: 'Your Course Content',
                    tabsize: 2,
                    height: 100
                });
        <?php }
        } ?>
    });
    $("#add").click(function() {
        var lastField = $("#subTopicfield div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"course_subtopic[]\" placeholder=\"Enter SubTopic\" required>");
        var hidden = $("<input class=\"form-control my-2\" type=\"hidden\" name=\"subtopic_id[]\"> ");
        var editor = $("<div class=\"col-lg-12 col-sm-6\"><textarea class=\"summernote\" name=\"course_content[]\"></textarea></div>");
        var removeButton = $("<a class=\"d-flex justify-content-end\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(hidden);
        fieldWrapper.append(editor);
        // fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#subTopicfield").append(fieldWrapper);
        $('.summernote').summernote({
            placeholder: 'Your Course Content',
            tabsize: 2,
            height: 100
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course/createSubTopic.blade.php ENDPATH**/ ?>