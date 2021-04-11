

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
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">Course Creation</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">

                                    <form method="post" id="topic_save" enctype="multipart/form-data" action="<?php echo e(url ('/courses')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <!-- Hidden course id field for edit -->
                                        <?php if(@$course): ?>
                                        <input class="form-control" type="hidden" name="course_id" placeholder="" value="<?php echo e($course->id); ?>">
                                        <?php endif; ?>
                                        <?php // echo "<pre>"; print_r($course); exit(); 
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box">
                                                    <label class="label-text">Creation For<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="sort-ordering user-form-short mt-2">
                                                        <div class="dropdown bootstrap-select sort-ordering-select">
                                                            <select class="sort-ordering-select user_role" name="type" tabindex="-98">
                                                                <option value="">Please Select</option>
                                                                <option value="public" <?php if (@$course->type == 'public') {
                                                                                            echo "selected";
                                                                                        } ?>>Public</option>
                                                                <option value="corporate" <?php if (@$course->type == 'corporate') {
                                                                                                echo "selected";
                                                                                            } ?>>Instituition/Corporate</option>
                                                            </select>
                                                        </div>
                                                        <span class="drop_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box sel_company">
                                                    <label class="label-text">Select Company<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="sort-ordering user-form-short mt-2">
                                                        <div class="dropdown bootstrap-select sort-ordering-select">
                                                            <select class="sort-ordering-select" name="company_id" tabindex="-98">
                                                                <?php if(@count(@$companies)>0): ?>
                                                                <option value="">Please Select</option>
                                                                <?php $__currentLoopData = @$companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($company->id); ?>" <?php if (@$course->company_id == $company->id) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?php echo e($company->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                <h6>No records found!</h6>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <span class="dropuser_error"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box">
                                                    <label class="label-text">Course Title<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="title" placeholder="" value="<?php echo e(@old('title')?old('title'):@$course->title); ?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box">
                                                    <label class="label-text">Author<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="author" placeholder="" value="<?php if(@$course): ?><?php echo e($course->author); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                        </div><!-- end row -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Sub Title<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="sub_title" row=2 placeholder="Course Sub Title"><?php if(@$course): ?><?php echo e($course->sub_title); ?><?php endif; ?></textarea>
                                                        <span class="la la-pencil input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-6">
                                        <label>Validity Period (Days)</label>
                                        <input type="number" class="form-control" name="validity" value="<?php echo e(@$course->validity); ?>">
                                    </div>
                                </div>
                                        <div class="row">
                                            <div class="col-lg-12 my-2">
                                                <label class="label-text">Course Content<span class="primary-color-2 ml-1">*</span></label>
                                                <textarea id="summernote" name="course_content"><?php if(@$course): ?><?php echo e($course->content); ?><?php endif; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3">
                                                <div class="input-box">
                                                    <label class="label-text">Duration<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="test" name="duration" placeholder="" value="<?php if(@$course): ?><?php echo e($course->duration); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-3 col-sm-3">
                                                <div class="input-box">
                                                    <label class="label-text">Course Price<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name="course_price" placeholder="" value="<?php if(@$course): ?><?php echo e($course->course_price); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-3 col-sm-3">
                                                <div class="input-box">
                                                    <label class="label-text">Pass Percentage<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name="min_percentage" placeholder="" value="<?php if(@$course): ?><?php echo e($course->min_percentage); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-3 col-sm-3">
                                                <div class="input-box">
                                                    <label class="label-text">Status<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <div class="sort-ordering user-form-short">
                                                            <select class="sort-ordering-select" name="status">
                                                                <option value="">--- Select ---</option>
                                                                <option value="Active" <?php if (@$course->status == 'Active') {
                                                                                            echo "selected";
                                                                                        } ?>>Active</option>
                                                                <option value="In Active" <?php if (@$course->status == 'In Active') {
                                                                                                echo "selected";
                                                                                            } ?>>In Active</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><!-- end col-lg-4 -->
                                        </div><!-- end row -->

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <label class="label-text">Topics<span class="primary-color-2 ml-1">*</span></label>
                                                <fieldset id="topicfield" class="col-lg-12 col-sm-12">
                                                </fieldset>
                                                <button type="button" class="btn ml-3 btn-outline-secondary add" id="add"><i class="fas fa-plus"></i> New Topic</button>

                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <label class="label-text">Cover Image<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="upload-btn-box">
                                                    <input type="file" name="files[]" class="filer_input" multiple="multiple">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button class="theme-btn" type="submit">Save</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div><!-- end card-box-shared-body -->
                    </div><!-- end card-box-shared -->
                    <div class="card-box-shared" id="question_section" style="display: none">
                        <div class="card-box-shared-title d-flex justify-content-between">
                            <h3 class="widget-title">Questions & Answers</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="question_div">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="input-box">
                                                        <label class="label-text">Question Type<span class="primary-color-2 ml-1"></span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="sort-ordering user-form-short">
                                                            <select class="sort-ordering-select quest_type">
                                                                <option value="0">--- Select ---</option>
                                                                <option value="1">True or False</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-sm-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Question<span class="primary-color-2 ml-1"></span></label>
                                                        <div class="form-group">
                                                            <textarea class="form-control question_text" name="question_text" readonly style="background-color: #f0f0f0;"></textarea>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Marks<span class="primary-color-2 ml-1"></span></label>
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="text" placeholder="">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-4 -->

                                            </div><!-- end row -->
                                        </div>

                                        <div class="row answer" style="display: none;">
                                            <label class="label-text">Please choose the correct option<span class="primary-color-2 ml-1"></span></label>
                                            <div class="col-lg-12 col-sm-6 d-flex align-items-center justify-content-around" style="border: 1px solid #e5e7ea; padding-top: 20px;">
                                                <div class="input-box">
                                                    <div class="input-box">
                                                        <div class="form-group">
                                                            <label for="radio-1" class="radio-trigger mb-0 mr-2">
                                                                <input type="radio" id="radio-1" name="radio" checked>
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">True</span>
                                                            </label>
                                                            <label for="radio-2" class="radio-trigger mb-0">
                                                                <input type="radio" id="radio-2" name="radio">
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">False</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="margin-top: -20px;">OR</span>
                                                <div class="input-box">
                                                    <div class="input-box">
                                                        <div class="form-group">
                                                            <label for="radio-3" class="radio-trigger mb-0 mr-2">
                                                                <input type="radio" id="radio-3" name="radio" checked>
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">Yes</span>
                                                            </label>
                                                            <label for="radio-4" class="radio-trigger mb-0">
                                                                <input type="radio" id="radio-4" name="radio">
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <a class="theme-btn questAdd-btn mr-2"><i class="la la-plus mr-3 font-size-16"></i>Add</a>
                                                <button class="theme-btn quest_submit" onclick="document.getElementById('feedback_section').style.display='block';" type="button">Next</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end card-box-shared-body -->
                    </div>

                    <div class="card-box-shared" id="feedback_section" style="display: none">
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">Feedback</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <form method="post">

                                        <div class="col-lg-4">
                                            <div class="input-box">
                                                <label class="label-text">Feedback Type<span class="primary-color-2 ml-1"></span></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="sort-ordering-select quest_type">
                                                        <option value="0">--- Select ---</option>
                                                        <option value="1">Table</option>
                                                        <option value="2">Star</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="feed_div">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Feedback <span class="primary-color-2 ml-1"></span></label>
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="text" placeholder="">
                                                            <span class="la la-file-video-o input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                            </div><!-- end row -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <a class="theme-btn feedAdd-btn mr-2"><i class="la la-plus mr-3 font-size-16"></i>Add</a>
                                                <button class="theme-btn quest_submit" onclick="document.getElementById('certificate_generation').style.display='block';" type="button">Next</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end card-box-shared-body -->

                    </div><!-- end card-box-shared -->

                    <div class="card-box-shared" id="certificate_generation" style="display: none">
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">Certificate</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="single-portfolio-item all">
                                                <div class="portfolio-hover">
                                                    <a class="portfolio-link" href="<?php echo e(url('asset/images/certificate/certificate_front.jpg')); ?>" data-fancybox="gallery" data-caption="Image 1">
                                                        <img src="<?php echo e(url('asset/images/certificate/certificate_front.jpg')); ?>" alt="portfolio-image">
                                                        <i class="la la-plus icon-element"></i>
                                                    </a>
                                                </div><!-- end portfolio-hover -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="single-portfolio-item all">
                                                <div class="portfolio-hover">
                                                    <a class="portfolio-link" href="<?php echo e(url('asset/images/certificate/certificate_back.jpg')); ?>" data-fancybox="gallery" data-caption="Image 1">
                                                        <img src="<?php echo e(url('asset/images/certificate/certificate_back.jpg')); ?>" alt="portfolio-image">
                                                        <i class="la la-plus icon-element"></i>
                                                    </a>
                                                </div><!-- end portfolio-hover -->
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <button class="theme-btn quest_submit" type="button">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-box-shared-body -->

                    </div><!-- end card-box-shared -->

                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-content pt-0 pb-4 border-top-0 text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="copy__desc">&copy; 2020 Aduca. All Rights Reserved. by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs.</a></p>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </div><!-- end copyright-content -->
                </div><!-- end col-lg-12 -->
            </div>
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
                    <!-- <label class="label-text">Page Content<span class="primary-color-2 ml-1"></span></label> -->
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

<!-- <script type="text/template" id="todos_labels">
  <div class="field-group">

  <input type="text" name="todos_labels[{?}]" value="{task}" id="{?}" class="topic_field" style="width: 70%;">

  <a href="#" ><i class="far fa-trash-alt delete mx-2" style="font-size: 30; color: #ff00009e;" title="Remove"></i></a>
  <a href="#" class="sub_add" data-id="{?}" title="Content"><i class="fas fa-plus-circle" style="font-size: 30; color: #51be78;"></i></a>
</div>

</script>

<script type="text/template" id="sub_labels">
  <div class="field-group2">

  <input type="text" name="sub_labels[{?}][task]" value="{task}" id="{?}" class="subtopic_field" style="width: 70%;">

  <a href="#" ><i class="far fa-trash-alt sub_delete mx-2" style="font-size: 30; color: #ff00009e;" title="Remove"></i></a>
  
</div>

</script> -->

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
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
        <?php if (@count($topics) > 0) {
            foreach ($topics as $topic) { ?>
                var lastField = $("#topicfield div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"course_topic[]\" placeholder=\"Enter Topic\" value=\"<?php echo e(@$topic->title); ?>\" required> ");
                var hidden = $("<input class=\"form-control my-2\" type=\"hidden\" name=\"topic_id[]\" value=\"<?php echo e(@$topic->id); ?>\"> ");
                var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");


                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(hidden);
                fieldWrapper.append(removeButton);
                $("#topicfield").append(fieldWrapper);

        <?php }
        } ?>
    });



    $("#add").click(function() {
        var lastField = $("#topicfield div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"course_topic[]\" placeholder=\"Enter Topic\" required> ");
        var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");


        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(removeButton);
        $("#topicfield").append(fieldWrapper);
    });


    $('.add_topic').click(function() {
        var cont = $('.topic_column:first').clone(true, true);
        $(cont).insertAfter('.topic_column:last');
    });

    $('.add_subtopic').click(function() {
        var cont = $(".topic_column:last").clone(true, true);
        $(cont).insertAfter('.subtopic_column:last');
    });

    $('.add_dupsubtopic').click(function() {

    });

    $('.remove_topic').click(function() {
        $(this).parentsUntil('.topic_column').remove();
    });

    $(".todos_labels .topic_repeatable").repeatable({
        addTrigger: ".todos_labels .add",
        deleteTrigger: ".todos_labels .delete",
        template: "#todos_labels"
    });

    $(".todos_labels .topic_repeatable").repeatable({
        addTrigger: ".add",
        deleteTrigger: ".delete",
        max: null,
        min: 0,
        template: null,
        itemContainer: ".field-group"
    });

    $(document).ready(function() {
        $('.questAdd-btn').click(function() {
            $('.question_div > div:first-child').clone().insertAfter(".question_div > div:last");
        });

        $('.feedAdd-btn').click(function() {
            $('.feed_div > div:first-child').clone().insertAfter(".feed_div > div:last");
        });

        $('.add_sub').click(function() {
            $('#subtops > div:first-child').clone().insertAfter('.insert_here');

        });

        $('.quest_type').change(function() {

            if ($('.quest_type option').filter(':selected').val() == 1) {

                console.log($('.quest_type option').filter(':selected').val());
                $('.question_text').removeAttr("readonly style");
                $('.answer').removeAttr("style");
            }
        });

    });
</script>
<script type="text/javascript">
    // Company selection 
    <?php if (@$course->company_id) { ?>
        $('.sel_company').show();
    <?php } else { ?>
        $('.sel_company').hide();
    <?php } ?>
    $('.user_role').change(function() {
        if ($('.user_role option:selected').val() == 'corporate') {
            $('.sel_company').show();
        } else {
            $('.sel_company').hide();
        }
    });

    /*// Display Company after save
    if ($('.user_role option:selected').val() == 'corporate') {
        console.log($('.user_role option:selected').val());
        $('.sel_company').show();
    }*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course/create.blade.php ENDPATH**/ ?>