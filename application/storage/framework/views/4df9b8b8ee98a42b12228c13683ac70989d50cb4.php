

<?php $__env->startSection('content'); ?>

<style>
    
    .contact-form-action .form-control {

        padding: 0 0 0 20px;
    }

</style>
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
                        <div class="card-box-shared-title" style="padding-bottom: 0;">
                            <h3 class="widget-title d-flex justify-content-center">Feedback</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <form method="post" id="feedback_save" action="<?php echo e(url('courses/store_feedback/'.$course->id)); ?>">
                                        <?php echo csrf_field(); ?>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <!-- <label class="label-text"><span class="primary-color-2 ml-1"></span></label> -->
                                                <div class="form-group d-flex justify-content-around align-items-center" style="margin-bottom: -15px;">
                                                    <div class="input-box">
                                                        <div class="form-group">
                                                            <label for="radio-1" class="radio-trigger mb-0 mr-2">
                                                                <input type="radio" id="radio-1" name="type" class="table" value="table" checked>
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">Table</span>
                                                            </label>
                                                            <label for="radio-2" class="radio-trigger mb-0">
                                                                <input type="radio" id="radio-2" name="type" class="rating" value="rating">
                                                                <span class="checkmark"></span>
                                                                <span class="font-size-15 primary-color-3">Rating</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="clo-lg-12 mb-2">
                                          <textarea class="form-control" name="feedback_label" placeholder="Enter Label" rows="4" cols="50" required></textarea>
                                        </div> -->

                                        <div class="clo-lg-12">
                                            <fieldset id="feed_table">
                                            </fieldset>
                                            <button type="button" class="btn btn-outline-secondary table_add" id="table_add"><i class="fas fa-plus"></i>Queries</button>
                                            <!-- <textarea class="summernote" name="course_content"></textarea> -->
                                        </div>

                                        <div class="clo-lg-12 mt-2">
                                            <fieldset id="feed_desc">
                                            </fieldset>
                                            <button type="button" class="btn btn-outline-secondary desc_add" id="desc_add"><i class="fas fa-plus"></i>Description</button>
                                        </div>
                                        
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

  $(document).ready(function() {

    <?php if(@count($feeds)>0) { ?>
     
      <?php foreach($feeds as $feed) { if( ($feed->type=='tick') || ($feed->type=='star') ) { ?>
      var lastField = $("#feed_table div:last");
      var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
      var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center mb-3 \" id=\"field" + intId + "\"/>");
      fieldWrapper.data("idx", intId);
 
      var fName = $("<textarea class=\"form-control\" name=\"feedback_table[]\" placeholder=\"Enter Queries\" rows=\"4\" cols=\"50\" required><?php echo e($feed->content); ?></textarea> ");
      var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");

      removeButton.click(function() {
          $(this).parent().remove();
      });
      fieldWrapper.append(fName);
      fieldWrapper.append(removeButton);
      $("#feed_table").append(fieldWrapper);

    <?php } else { ?>
      var lastField = $("#feed_desc div:last");
      var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
      var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center mb-3 \" id=\"field" + intId + "\"/>");
      fieldWrapper.data("idx", intId);
      // var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"feedback_table[]\" placeholder=\"Enter Queries\" required> ");
      var fName = $("<textarea class=\"form-control\" name=\"feedback_desc[]\" placeholder=\"Enter Description\" rows=\"4\" cols=\"50\" required><?php echo e($feed->content); ?></textarea><input type=\"hidden\" name=\"feed_id[]\" value=\"<?php echo e($feed->id); ?>\" required> ");
      var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");

      removeButton.click(function() {
          $(this).parent().remove();
      });
      fieldWrapper.append(fName);
      fieldWrapper.append(removeButton);
      $("#feed_desc").append(fieldWrapper);
    <?php } } } ?>

  });

    $("#table_add").click(function() {
      var lastField = $("#feed_table div:last");
      var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
      var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center mb-3 \" id=\"field" + intId + "\"/>");
      fieldWrapper.data("idx", intId);
      // var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"feedback_table[]\" placeholder=\"Enter Queries\" required> ");
      var fName = $("<textarea class=\"form-control\" name=\"feedback_table[]\" placeholder=\"Enter Queries\" rows=\"4\" cols=\"50\" required></textarea> ");
      var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");

      removeButton.click(function() {
          $(this).parent().remove();
      });
      fieldWrapper.append(fName);
      fieldWrapper.append(removeButton);
      $("#feed_table").append(fieldWrapper);   
    });

    $("#desc_add").click(function() {
      var lastField = $("#feed_desc div:last");
      var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
      var fieldWrapper = $("<div class=\"fieldwrapper d-flex align-items-center mb-3 \" id=\"field" + intId + "\"/>");
      fieldWrapper.data("idx", intId);
      // var fName = $("<input class=\"form-control my-2\" type=\"text\" name=\"feedback_table[]\" placeholder=\"Enter Queries\" required> ");
      var fName = $("<textarea class=\"form-control\" name=\"feedback_desc[]\" placeholder=\"Enter Description\" rows=\"4\" cols=\"50\" required></textarea> ");
      var removeButton = $("<a class=\"ml-3 theme-btn delete-btn\" href=\"javascript:;\" role=\"button\"><i class=\"la la-trash mr-1 font-size-16\"></i></a>");

      removeButton.click(function() {
          $(this).parent().remove();
      });
      fieldWrapper.append(fName);
      fieldWrapper.append(removeButton);
      $("#feed_desc").append(fieldWrapper);   
    });

</script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course/feedback.blade.php ENDPATH**/ ?>