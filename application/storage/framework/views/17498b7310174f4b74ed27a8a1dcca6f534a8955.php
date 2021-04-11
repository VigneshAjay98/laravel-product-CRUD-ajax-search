

<?php $__env->startSection('content'); ?>

<style type="text/css">
    .contact-form-action .message-control
    {
        height: 100px;
    }
    .mcq_choice {
        line-height: 0 !important;
        padding: 0 5px 0 5px !important;
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
                            <h3 class="widget-title d-flex justify-content-center">Questions</h3>
                            <h3 class="widget-title"></h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="user-form">
                                <div class="contact-form-action">
                                    <form method="post" id="subtopic_save" action="<?php echo e(url('courses/submit_question/'.$course_id)); ?>">
                                        <?php echo csrf_field(); ?>

                                        <div class="row col-lg-12">
                                            <fieldset id="subTopicfield" class="col-md-8">
                                            </fieldset>
                                            <!-- <textarea class="summernote" name="course_content"></textarea> -->
                                        </div>

                                        <button type="button" class="btn btn-outline-secondary add" id="add"><i class="fas fa-plus"></i> Question</button>
                                        
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

<script>
    var intId = 0;
    var valint = {int: 1};

    var textinput = {int: 0};
    var radio_no = 0;

    $(document).ready(function() {

        <?php if(@count($questions)>0) { ?>

     
        <?php foreach($questions as $question) { ?>
        var lastField = $("#subTopicfield div:last");
        var fieldWrapper = $("<div class=\"fieldwrapper \" id=\"field" + intId + "\"/>");
        var fName = $("<h6 class=\"pb-2\">Question&nbsp;"+(intId+1)+"</h6><div class=\"form-group\"><textarea class=\"message-control form-control\" name=\"question["+intId+"]\" placeholder=\"Write course description here\" required><?php echo e($question->question); ?></textarea></div>");  
        
        var ques_type = $("<div class=\"col-lg-6 col-sm-6 ques_type\"><div class=\"question-overview-filter-item\"><label class=\"label-text\">Question Type<span class=\"primary-color-2 ml-1\">*</span></label><div class=\"\"><div class=\"\"><select class=\"sort-ordering-select question_sel\" name=\"question_sel[]\" tabindex=\"-98\"><option value=\"\">--- Select ---</option>    <option value=\"TOF\" <?php if($question->type =="TOF" ){echo "Selected";}?>>TOF</option><option value=\"MCQ\" <?php if($question->type =="MCQ" ){echo "Selected";}?>>MCQ</option></select></div><span class=\"dropuser_error\"></span></div></div></div>");

        var marks = $("<label class=\"label-text mt-2\">Mark for the Ques<span class=\"primary-color-2 ml-1\"></span></label><input class=\"form-control my-2\" type=\"text\" name=\"mark["+intId+"]\" placeholder=\"Marks\" value=\"<?php echo e($question->mark); ?>\" required><input type=\"hidden\" name=\"ques_id["+intId+"]\" value=\"<?php echo e($question->id); ?>\" required>");

        var removeButton = $("<a class=\"pull-right\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a> <br><hr/>");
        removeButton.click(function() {
            $(this).parent().remove();
        });

        var ques_ans_html ='';

        <?php if($question->type == "TOF"){?>                                   
         ques_ans_html = $("<label class=\"label-text\">Please choose the correct option<span class=\"primary-color-2 ml-1\"></span></label><div class=\"row col-lg-12 col-sm-12\"><div class=\"d-flex align-items-center justify-content-around p-3\" style=\"border: 1px solid #e5e7ea; \"><div class=\"input-box\"><div class=\"\"><label for=\"radio-"+ intId +"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"radio-"+ intId +"\" name=\"answer["+intId+"]\" value=\"True\" <?php if($question->answer=='True'): ?><?php echo e('checked'); ?><?php endif; ?>><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">True</span></label><label for=\"radio-"+ intId+1 +"\" class=\"radio-trigger mb-0\"><input type=\"radio\" id=\"radio-"+ intId+1 +"\" name=\"answer["+intId+"]\" value=\"False\" <?php if($question->answer=='False'): ?><?php echo e('checked'); ?><?php endif; ?>><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">False</span></label></div></div><span class=\"m-2\" style=\"margin-top: -20px;\"> (OR) </span><div class=\"input-box\"><div class=\"\"><label for=\"radio-"+intId+2 +"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"radio-"+ intId+2+"\" name=\"answer["+intId+"]\" value=\"Yes\" <?php if($question->answer=='Yes'): ?><?php echo e('checked'); ?><?php endif; ?>><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">Yes</span></label><label for=\"radio-"+ intId+3 +"\" class=\"radio-trigger mb-0\"><input type=\"radio\" id=\"radio-"+ intId+3 +"\" name=\"answer["+intId+"]\" value=\"No\" <?php if($question->answer=='No'): ?><?php echo e('checked'); ?><?php endif; ?>><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">No</span></label></div></div></div></div>");

        fieldWrapper.append(fName);
        fieldWrapper.append(ques_type);
        fieldWrapper.append(ques_ans_html);
        fieldWrapper.append(marks);
        fieldWrapper.append(removeButton);
        $("#subTopicfield").append(fieldWrapper);

        intId++; 

        <?php } else{
            foreach(json_decode($question->type_content) as $option) { ?>

                var cur_index = $('.mcq_inputsadd').index(this);
        
                var lastField = $(this).prev(".mcq_inputfield div:last");
                var fieldWrapper = $("<div class=\"fieldwrapper \"/>");

                var choice = $("<label for=\"mcq_radio-"+ (cur_index+1) +"-"+radio_no+"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"mcq_radio-"+ (cur_index+1)  +"-"+radio_no+"\" name=\"mcq_radio["+ (cur_index) +"]\" value=\""+(valint['int']++)+"\" <?php if($question->answer==$option): ?><?php echo e('checked'); ?><?php endif; ?> required><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\"><div class=\"form-group\"><textarea class=\"message-control form-control\"  name=\"mcq_input["+(cur_index)+"][]\" placeholder=\"Write course description here\" required><?php print_r($option); ?></textarea></div>");

                var removeButton = $("<a class=\"pull-right\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a><br><hr/>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                
                fieldWrapper.append(choice);
                fieldWrapper.append(removeButton);
                
                radio_no++;

        <?php }  ?>

                fieldWrapper.append(fName);
                fieldWrapper.append(ques_type);
                fieldWrapper.append(marks);
                fieldWrapper.append(removeButton);
                $(this).prev(".mcq_inputfield").append(fieldWrapper);

        <?php } ?>


                fieldWrapper.append(fName);
                fieldWrapper.append(ques_type);
                fieldWrapper.append(ques_ans_html);
                fieldWrapper.append(marks);
                fieldWrapper.append(removeButton);
                $("#subTopicfield").append(fieldWrapper);
        
        
        <?php } } ?>
    });

    $(document).on('click', '.add', function() {

        valint['int'] = 1;
        textinput['int'] = 0;

        var lastField = $("#subTopicfield div:last");
        var fieldWrapper = $("<div class=\"fieldwrapper \" id=\"field" + intId + "\"/>");
        var fName = $("<h6 class=\"pb-2\">Question&nbsp;"+(intId+1)+"</h6><div class=\"form-group\"><textarea class=\"message-control form-control\" name=\"question["+intId+"]\" placeholder=\"Write course description here\" required></textarea></div>");
         
        var ques_type = $("<div class=\"col-lg-6 col-sm-6 ques_type\"><div class=\"question-overview-filter-item\"><label class=\"label-text\">Question Type<span class=\"primary-color-2 ml-1\">*</span></label><div class=\"\"><div class=\"\"><select class=\"sort-ordering-select question_sel\" name=\"question_sel[]\" tabindex=\"-98\"><option value=\"\">--- Select ---</option>    <option value=\"TOF\">TOF</option><option value=\"MCQ\">MCQ</option></select></div><span class=\"dropuser_error\"></span></div></div></div>");

        var tof_yon = $("<div class=\"tof_div\" style=\"display: none;\"><label class=\"label-text\">Please choose the correct option<span class=\"primary-color-2 ml-1\"></span></label><div class=\"row col-lg-12 col-sm-12\"><div class=\"d-flex align-items-center justify-content-around p-3\" style=\"border: 1px solid #e5e7ea; \"><div class=\"input-box\"><div class=\"\"><label for=\"radio-"+ intId +"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"radio-"+ intId +"\" name=\"answer["+intId+"]\" value=\"True\"><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">True</span></label><label for=\"radio-"+ intId+1 +"\" class=\"radio-trigger mb-0\"><input type=\"radio\" id=\"radio-"+ intId+1 +"\" name=\"answer["+intId+"]\" value=\"False\"><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">False</span></label></div></div><span class=\" m-2\" style=\"margin-top: -20px;\"> (OR) </span><div class=\"input-box\"><div class=\"\"><label for=\"radio-"+intId+2 +"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"radio-"+ intId+2+"\" name=\"answer["+intId+"]\" value=\"Yes\"><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">Yes</span></label><label for=\"radio-"+ intId+3 +"\" class=\"radio-trigger mb-0\"><input type=\"radio\" id=\"radio-"+ intId+3 +"\" name=\"answer["+intId+"]\" value=\"No\"><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\">No</span></label></div></div></div></div></div>");

        var options1 = $("<div class=\"mcq_div\" style=\"display: none; border: 1px solid #e5e7ea; padding: 0 0 10px 15px; border-radius: 5px; margin: 5px 0 0 0;\"><label class=\"label-text\">Create options<span class=\"primary-color-2 ml-\"></span></label><fieldset class=\"mcq_inputfield col-md-8\"></fieldset><button type=\"button\" class=\"btn btn-outline-secondary mt-2 mcq_inputsadd\" data-id=\""+intId+"\" ><i class=\"fas fa-plus\"></i> Add</button></div></div></div></div></div>");

        var marks = $("<label class=\"label-text mt-2\">Mark for the Ques<span class=\"primary-color-2 ml-1\"></span></label><input class=\"form-control \" type=\"text\" name=\"mark["+intId+"]\" placeholder=\"Marks\" required>")
        var removeButton = $("<a class=\"pull-right\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a><br><hr/>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(ques_type);
        fieldWrapper.append(tof_yon);
        fieldWrapper.append(options1);
        fieldWrapper.append(marks);
        fieldWrapper.append(removeButton);
        $("#subTopicfield").append(fieldWrapper);

        intId++;        
    });

$(document).on('change', '.question_sel', function(){

    if($(this).find('option:selected').val() == 'MCQ') {
        $(this).parents().eq(3).siblings('.mcq_div').show();
        $(this).parents().eq(3).siblings('.tof_div').hide();
    }
    else {
        $(this).parents().eq(3).siblings('.mcq_div').hide();
        $(this).parents().eq(3).siblings('.tof_div').show();
        
    }
});

$(document).on('click', '.mcq_inputsadd', function(){

        var cur_index = $('.mcq_inputsadd').index(this);
        
        var lastField = $(this).prev(".mcq_inputfield div:last");
        var fieldWrapper = $("<div class=\"fieldwrapper \"/>");

        var choice = $("<label for=\"mcq_radio-"+ (cur_index+1) +"-"+radio_no+"\" class=\"radio-trigger mb-0 mr-2\"><input type=\"radio\" id=\"mcq_radio-"+ (cur_index+1)  +"-"+radio_no+"\" name=\"mcq_radio["+ (cur_index) +"]\" value=\""+(valint['int']++)+"\" required><span class=\"checkmark\"></span><span class=\"font-size-15 primary-color-3\"><div class=\"form-group\"><textarea class=\"message-control form-control\"  name=\"mcq_input["+(cur_index)+"][]\" placeholder=\"Write course description here\" required></textarea></div>");

        var removeButton = $("<a class=\"pull-right\" href=\"javascript:;\" role=\"button\"><i class=\"far fa-trash-alt my-2\" style=\"font-size: 25; color: red;\"></i></a><br><hr/>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(choice);
        fieldWrapper.append(removeButton);
        $(this).prev(".mcq_inputfield").append(fieldWrapper);
        radio_no++;

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/create_question.blade.php ENDPATH**/ ?>