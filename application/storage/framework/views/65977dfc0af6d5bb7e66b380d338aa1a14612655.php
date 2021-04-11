

<?php $__env->startSection('content'); ?>

<style>

    .course-item-list-accordion .card-header .btn[aria-expanded=true]:after {
    content: "\f106";
}

    .course-item-list-accordion .card-header .btn:after {
    position: absolute;
    content: "\f107";
    font-family: "FontAwesome";
    top: 50%;
    right: 20px;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    font-size: 24px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.fa-star {
    font-size: 25px;
    color: #ffd816;
}

</style>
<?php // echo"<pre>"; print_r($courses); exit; ?>
<?php // echo"<pre>"; echo last(request()->segments()); exit; ?>
<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area course-dashboard-header">
    <div class="header-menu-fluid">
        <div class="header-menu-content course-dashboard-menu-content">
            <div class="container-fluid">
                <div class="main-menu-content d-flex align-items-center">
                    <div class="logo-box">
                        <a href="<?php echo e(url('/')); ?>" class="logo" title="Aduca"><img src="<?php echo e(asset('asset/images/logo/logo_grey_sm.jpeg')); ?>" alt="logo"></a>
                    </div>
                    <div class="course-dashboard-title">
                        <a href="#"><?php echo e(@$course_master->title); ?></a>
                    </div>
                    <div class="menu-wrapper">
                        <div class="logo-right-button">
                            <ul class="d-flex align-items-center">
                                <!-- <li><a href="#" class="theme-btn theme-btn-light" data-toggle="modal" data-target=".rating-modal-form"><i class="la la-star mr-1"></i>leave a rating</a></li> -->
                                <li><a href="#" class="theme-btn theme-btn-light" data-toggle="modal" data-target=""><i class="la la-save mr-1"></i>Save</a></li>
                                <li><a href="#" class="theme-btn theme-btn-light" data-toggle="modal" data-target=".exit-modal"><i class="la la-door-closed mr-1"></i>Exit</a></li>
                                <li>
                                    <div class="msg-action-dot">
                                        <div class="dropdown">
                                            <a class="action-dot" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li><a class="dropdown-item" href="#">Favorite this course</a></li>
                                                    <li><a class="dropdown-item" href="#">Archive this course</a></li>
                                                    <li><a class="dropdown-item" href="#">Gift this course</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- end logo-right-button -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->

<!--======================================
        START COURSE-DASHBOARD
======================================-->
<section class="course-dashboard">
    <div class="course-dashboard-wrap">
        <div class="course-dashboard-container d-flex">
            
            <div class="course-dashboard-sidebar-column">
                <button class="sidebar-open" type="button"><i class="la la-angle-left"></i>Content</button>
                <div class="course-dashboard-sidebar-wrap">
                    <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
                        <h3 class="widget-title font-size-20">Content</h3>
                        <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
                    </div><!-- end course-dashboard-side-heading -->
                    <div class="course-dashboard-side-content">
                        <div class="accordion course-item-list-accordion" id="accordionCourseMenu">
                            <div class="card">

                                <!-- Topics Dropdown Menu -->
                                <div class="card-header" id="collapseMenuOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link topics_menu" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <span class="topic_btn">
                                                <?php if(@$user_contents == @$subtopic_count): ?>
                                                <i class="la la-check primary-color-2 mr-2"></i>
                                                <?php endif; ?>
                                            </span>
                                            <span class="widget-title font-size-15 font-weight-semi-bold">Topics</span>

                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="collapseMenuOne" data-parent="">
                                    <div class="card-body">
                                        <div class="course-content-list">

                                            <?php if(@count(@$course_topics) > 0): ?>
                                            <?php $__currentLoopData = $course_topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="accordion course-item-list-accordion" id="mobileCourseMenu">
                                            <div class="card">
                                                <div class="card-header topic_class" topic-id="<?php echo e($course_topic->id); ?>" id="collapseMenu<?php echo e($course_topic->id); ?>">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTopic<?php echo e($course_topic->id); ?>" aria-expanded="false" aria-controls="collapseTopic<?php echo e($course_topic->id); ?>">
                                                            <span class="widget-title font-size-15 font-weight-semi-bold"><?php echo e($course_topic->title); ?></span>
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseTopic<?php echo e($course_topic->id); ?>" class="collapse" aria-labelledby="collapseMenu<?php echo e($course_topic->id); ?>">
                                                    <div class="card-body">
                                                        <div class="course-content-list">
                                                            <ul class="course-list sec_1">
                                                                <?php $__currentLoopData = $course_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($course_content->topic_id == $course_topic->id): ?>
                                                                
                                                                <a class="course_anchor" data-id="<?php echo e($course_content->id); ?>">
                                                                    <li class="course-item-link">
                                                                        <div class="course-item-content-wrap">
                                                                            <div class="custom-checkbox">
                                                                                <?php if(@count($completed_topics)>0): ?>
                                                                                    <?php $__currentLoopData = $completed_topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $completed_topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($completed_topic->subtopic_id == $course_content->id): ?>
                                                                                        <?php echo '<i class="la la-check primary-color-2 mr-2 complete_ticks"></i>'; ?>
                                                                                    <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php endif; ?>
                                                                                <input type="checkbox" id="chb29">
                                                                            </div>
                                                                            <div class="course-item-content">
                                                                                <h4 class="widget-title font-size-15 font-weight-medium">
                                                                                    
                                                                                    <?php echo e($course_content->title); ?></h4>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </a>
                                                                
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                                <!-- Assessment Dropdown Menu -->
                                <div class="card-header asses-menu" id="collapseMenuThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="assessment_btn">
                                                <?php if(@$course_complete->assessment_status == 'completed'): ?>
                                                    <i class="la la-check primary-color-2 mr-2"></i>
                                                <?php endif; ?>
                                            </span>
                                            <span class="widget-title font-size-15 font-weight-semi-bold">Assessment</span>
                                        </a>
                                    </h2>
                                </div>
                                 <div id="collapseThree" class="collapse" aria-labelledby="collapseMenuThree" data-parent="">
                                    <div class="card-body">
                                        <div class="course-content-list">
                                            <ul class="course-list">
                                                <a data-id="<?php echo last(request()->segments()) ?>" id="assessment_menu">
                                                <li class="course-item-link active-resource" >
                                                    <div class="course-item-content-wrap">
                                                        <div class="course-item-content d-flex justify-content-center">
                                                            <h4 class="widget-title font-size-15 font-weight-medium"><span class="assess_check">Go to Assessment</span></h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                </a>
                                                <li class="course-item-link active-resource" id="viewresult_menu" style="display: none;">
                                                    <div class="course-item-content-wrap">
                                                        <div class="course-item-content d-flex justify-content-center">
                                                            <h4 class="widget-title font-size-15 font-weight-medium">View result</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <?php if(@count($feedbacks)>0): ?>
                                <div class="card-header feed-menu">
                                    <div class="course-content-list">
                                        <ul class="course-list">
                                            <li class="course-item-link active-resource" id="feedback_menu">
                                                <div class="course-item-content-wrap">
                                                    <div class="course-item-content">
                                                        <h4 class="widget-title font-size-15 font-weight-medium"><span class="feedback_btn"></span>Feedback</h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <span class="d-flex justify-content-center align-items-center course_success"></span>
                                <div class="get_certBtn"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end course-dashboard-sidebar-column -->
            <div class="course-dashboard-column">
                <div class="lecture-viewer-container" style="height: 100vh;">
                    <div class="p-3" class="course_read" id="course_read">

                        <?php  echo $course_master->content; ?>

                    </div>

                    <div class="lecture-viewer-text-wrap" id="assesment_view">
                        <div class="lecture-viewer-text-content">
                            <div class="lecture-viewer-text-body">
                                <!-- <h2 class="widget-title font-size-35 pb-4">Download your Footage for your Quick Start</h2> -->
                                <div class="lecture-viewer-content-detail">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lecture-viewer-text-wrap" id="feedback_view">
                        <div class="lecture-viewer-text-content">
                            <div class="lecture-viewer-text-body">
                                <div class="lecture-viewer-content-detail">

                                    <div class="row">

                                        <div class="col-lg-12 mx-auto">
                                            <div class="card-box-shared mb-0">
                                                <div class="card-box-shared-body">
                                                    <div class="contact-form-action">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                </div>
                                                                <form method="post" id="user_feedback" action="<?php echo e(url('/feedback/'.@$course_master->id)); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                <?php if(@count($feedbacks)>0): ?>
                                                                <?php if(array_search("star",$feedbacks)): ?>
                                                                <div class="col-lg-12">
                                                                    <p>To help us continually to improve and develop our training, we would be greatly if you would provide your rating.</p>
                                                                    <table class="table table-bordered star" style="table-layout: fixed; width: 100%;">
                                                                        <tbody>
                                                                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($value=='star'): ?>
                                                                            <tr>
                                                                                <th style="word-wrap: break-word;overflow-wrap: break-word;">
                                                                                    <?php echo e($key); ?>

                                                                                </th>
                                                                                <td class="star_rating" align="center">
                                                                                    <i class="far fa-star mx-2" data-rating="1"></i>
                                                                                    <i class="far fa-star mx-2" data-rating="2"></i>
                                                                                    <i class="far fa-star mx-2" data-rating="3"></i>
                                                                                    <i class="far fa-star mx-2" data-rating="4"></i>
                                                                                    <i class="far fa-star mx-2" data-rating="5"></i>
                                                                                    <input type="hidden" name="rating" class="rating-value">
                                                                                </td>
                                                                            </tr>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                                
                                                                <?php if(@count($feedbacks)>0): ?>
                                                                <?php if(array_search("tick",$feedbacks)): ?>
                                                                <div class="col-lg-12">
                                                                    <p>To help us continually to improve and develop our training, we would be greatly if you would complete the following boxes.</p>
                                                                    <table class="table table-bordered">
                                                                      <thead>
                                                                        <tr>
                                                                          <th scope="col"></th>
                                                                          <th scope="col">Very Poor</th>
                                                                          <th scope="col">Poor</th>
                                                                          <th scope="col">Good</th>
                                                                          <th scope="col">Very Good</th>
                                                                          <th scope="col">Excellent</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                      
                                                                        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($value=='tick'): ?>
                                                                            <tr class="course_feedTick">
                                                                              <th scope="row"><?php echo e($key); ?></th>
                                                                              <td></td>
                                                                              <td></td>
                                                                              <td></td>
                                                                              <td></td>
                                                                              <td></td>
                                                                            </tr>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php endif; ?>

                                                                <?php if(@count($feedbacks)>0): ?>
                                                                <?php if(array_search("textbox",$feedbacks)): ?>
                                                                <div class="col-lg-12">
                                                                    <hr>Please Provide your descriptive feedback here. </hr>
                                                                </div>
                                                                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($value=='textbox'): ?>
                                                                <div class="col-lg-12">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col"><p><?php echo e($key); ?></p></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th><textarea class="form-control" id="exampleFormControlTextarea1" style="border: none; padding: 0;" required></textarea></th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="col-lg-12 d-flex justify-content-end">
                                                                    <button type="submit" class="theme-btn theme-btn-light bg-color-1 text-white feed_submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

<div class="lecture-viewer-text-wrap" id="result_view">
<div class="lecture-viewer-text-content">
<div class="lecture-viewer-text-body">
<div class="lecture-viewer-content-detail">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card-box-shared mb-0">
                <div class="card-box-shared-body">
                    <div class="col-lg-12">
                        <p class="d-flex justify-content-center mb-2 res-title" style="font-size: 25px;">Congratulations! You have Successfully completed this course</p>
                        <div class="quiz-content-wrap bg-black padding-top-60px padding-bottom-60px">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="quiz-content text-center">
                                            <p class="lead font-weight-regular font-size-18 text-color-rgba mb-0 pb-2 res-date"></p>
                                            <h2 class="section__title text-white padding-bottom-30px res-score">Your Score is: 0</h2>
                                            <div class="btn-box">
                                                <a href="#" class="theme-btn theme-btn-light mr-2 res-restart">Restart Quiz</a>
                                                <a href="#" class="theme-btn theme-btn-light complete-cont">Continue</a>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </div><!-- end container -->
                        </div><!-- end quiz-content-wrap -->
                    </div>
                </div><!-- end card-box-shared -->
                <div class="quiz-action-nav bg-white py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="quiz-action-content d-flex align-items-center justify-content-center">
                                    <ul class="quiz-nav d-flex align-items-center res-status">
                                        
                                    </ul>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end quiz-action-nav -->
            </div><!-- end col-lg-10 -->
        </div>
    </div>
</div>
</div>
</div>
</div><!-- end lecture-viewer-container -->
                
                <div class="section-block"></div>
                
            </div><!-- end course-dashboard-column -->
        </div><!-- end course-dashboard-container -->
    </div><!-- end course-dashboard-wrap -->
</section><!-- end course-dashboard -->
<!--======================================
        END COURSE-DASHBOARD
======================================-->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- answer submit modal -->
<div class="modal-form text-center" id="modal">
    <div class="modal fade end_test-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1"></h4>
                        <p class="modal-sub"></p>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" type="button" class="theme-btn border-0" data-dismiss="modal"></a>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<!-- Exit confirmation modal -->
<div class="modal-form text-center">
    <div class="modal fade exit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure to exit!</h4>
                        <p class="modal-sub">Save your progress before leaving.</p>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo e(url('/dashboard')); ?>" type="button" class="theme-btn border-0" >Save & Exit</a>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<script>

$(document).ready(function(){

    <?php if(@$user_contents == @$subtopic_count) { ?>
        $('#collapseMenuOne').css('background-color','#d9dee3');
        $('.asses-menu').show();
        
    <?php } else { ?>
        $('.asses-menu').hide();
        $('.feed-menu').hide();
    <?php } if(@$course_complete->assessment_status == 'completed') { ?>
        $('#collapseMenuThree').css('background-color','#d9dee3');
        $('#assessment_menu').remove();
        $('#viewresult_menu').show();
        $('.feed-menu').show();
    <?php } else { ?>
        $('.feed-menu').hide();
    <?php } if(@$course_complete->completion_status == 'completed') { ?>
        $('.feedback_btn').html('<i class="la la-check primary-color-2 mr-2"></i>');
        $('#feedback_menu').css('background-color','#d9dee3');

        $('.get_certBtn').html('<a href="<?php echo e(url("my_certificate")); ?>" class="theme-btn d-flex justify-content-center mt-2">Course Completed Successfully</a>');
    <?php } ?>

    $('.course_anchor').click(function(){

        $('#assesment_view').css('display', 'none');
        $('#result_view').css('display', 'none');
        $('#feedback_view').css('display', 'none');

        // Topics tick
        var tick = $(this).find('.custom-checkbox').html('<i class="la la-check primary-color-2 mr-2 complete_ticks"></i>');
        var check_tick = $(this).find('.complete_ticks').length;
        if(check_tick !== 0){
            console.log('true');
        }
        else {
            return tick;
        }
        
        var check = $('.custom-checkbox > .la-check').length;
        var topicLength = $('.course_anchor').length;
        // console.log(check);
        if(topicLength == check){
            $('.topic_btn').empty();
            $('.topic_btn').html('<i class="la la-check primary-color-2 mr-2"></i>');
            $('#collapseMenuOne').css('background-color','#d9dee3');
            $('.asses-menu').show();        
        }

        // Topics content ajax
        var sub_id = $(this).attr('data-id');
        var course_id = "<?php echo e($course_master->id); ?>"; 
        var topic_id = $(this).parents().eq(4).find('.topic_class').attr('topic-id');
        var user_id = "<?php echo e(Auth::user()->id); ?>";
        
        $.ajax({
        type: 'GET',
        dataType: 'json',
        data: {sub_id: sub_id, course_id: course_id, topic_id: topic_id, user_id:user_id },
        url: "<?php echo e(url('/get_content')); ?>/"+sub_id,
            success: function (response) { 
                // console.log(response['data'][0]);
                $('#course_read').empty();
                $('#course_read').append(response['data'][0].content);
            }
        });
    });

    // Feedback view
    $('#feedback_menu').click(function() {
        $('#assesment_view').css('display', 'none');
        $('#result_view').css('display', 'none');
        $('#feedback_view').css('display', 'block');
    });
  
    $('.course_feedTick > td').click(function(){
        $(this).siblings('td').empty();
            $(this).html('<i class="la la-check tick primary-color-2 d-flex align-items-center justify-content-center" style="font-size: 26;">');
    });

    $('.tick_check > td:empty').click(function(){
        $(this).html('<i class="la la-check tick primary-color-2 d-flex align-items-center justify-content-center" style="font-size: 25;">');
    });

    // Feedback submit button
    // $(document).on('click', '.feed_submit', function(){
        // $('.feedback_btn').html('<i class="la la-check primary-color-2 mr-2"></i>');
        // $('#feedback_menu').css('background-color','#d9dee3');

        // var completed_html = '<div class="d-flex flex-column" style="margin: 200px 50px 250px 50px;"><h3 align="center"><span style="color: #51be78;">Congratulations!</span> You have successfully completed this course.</h3><br/><h3 align="center">Please contact your admin to get certificate.</h3></div>';
        // $('#feedback_view').empty();
        // $('#feedback_view').append(completed_html);
        // $('.get_certBtn').html('<a href="<?php echo e(url("my_certificate")); ?>" class="theme-btn d-flex justify-content-center mt-2">Course Completed Successfully</a>');

    //     $('#user_feedback').submit();
    // });

});

</script>

<script>

$(document).ready(function() { 

    var final_answers = [];

    var ques_id = '';
    // Assessment view ajax
    $('#assessment_menu').click(function(){

        $('#result_view').css('display', 'none');
        $('#feedback_view').css('display', 'none');

        var course_id = $(this).attr('data-id');
        var user_id = "<?php echo e(Auth()->user()->id); ?>";
        var course_id = "<?php echo e(@$course_master->id); ?>";
        $.ajax({
        type: 'GET',
        dataType: 'json',
        data: {id:0, user_id: user_id, course_id: course_id,type:"first"},
        url: "<?php echo e(url('/get_question')); ?>/"+course_id+"/first",
            success: function (response) { 
                // console.log(response);
                $('#course_read').empty();
                $('#course_read').append(response['content']);
              
            }
        });
    }); 

// Next Question AJAX
 $('body').on('click','.next_ques',function() {
      var user_id = "<?php echo e(Auth()->user()->id); ?>";
      var ques_id = $('.question_dynamic').attr('id');
      var course_id = "<?php echo e(@$course_master->id); ?>";
        //Answer set in the Array
        answer_set(ques_id);
        console.log(final_answers);

          $.ajax({
            type: 'get',
            dataType: 'json',
            data: {id:ques_id, user_id: user_id, course_id: course_id,type:"next"},
            url: "<?php echo e(url('/get_question')); ?>/"+ques_id+"/next",
                success: function (response) { 
                    // console.log(response);
                    $('#course_read').empty();
                    var res=response['content'];
                    var ans_ques = final_answers.find(x => x.ques_id == response['ques_id']);

                    console.log(ans_ques);
                    if(ans_ques != undefined){
                    
                        if(ans_ques['answer'] == "True" || ans_ques['answer'] == "Yes" ) {
                            res = res.replace('id="radio-1"', 'id="radio-1" checked');
                        }else if(ans_ques['answer'] == "False" || ans_ques['answer'] == "No" ) {
                            res = res.replace('id="radio-2"', 'id="radio-2" checked');

                        }else {
                            var replace = 'value="'+ans_ques['answer']+'"';
                            var replacing_var = 'value="'+ans_ques['answer']+'" checked';
                            res = res.replace(replace, replacing_var);
                        }
                    }

                    $('#course_read').append(res);
                }
            });

  }); 

 function answer_set(ques_id){
        let index = final_answers.findIndex(x => x.ques_id == ques_id);
        var obj ={};
        if($('input[name="answer"]:checked')) {
             obj['ques_id']=ques_id;
             obj['answer']=$('input[name="answer"]:checked').val();
        }
        if(index == -1){
            final_answers.push(obj)
        }else{
            final_answers[index]= obj;
        }
    }

// Previous Question AJAX
$('body').on('click','#prev_ques',function() {
      // alert('hi');
      var user_id = "<?php echo e(Auth()->user()->id); ?>";
      var ques_id = $('.question_dynamic').attr('id');
      var course_id = "<?php echo e(@$course_master->id); ?>"
        //Answer set in the Array
        answer_set(ques_id);
         console.log(final_answers);
 
          $.ajax({
            type: 'get',
            dataType: 'json',
            data: { id:ques_id,user_id: user_id, course_id: course_id,type:"prev"},
            url: "<?php echo e(url('/get_question')); ?>/"+ques_id+"/prev",
                success: function (response) { 

                    $('#course_read').empty();

                    var res=response['content'];
                    var ans_ques = final_answers.find(x => x.ques_id == response['ques_id']);

                    if(ans_ques != undefined){
                    
                        if(ans_ques['answer'] == "True" || ans_ques['answer'] == "Yes" ){
                            res = res.replace('id="radio-1"', 'id="radio-1" checked');
                        }else if(ans_ques['answer'] == "False" || ans_ques['answer'] == "No" ){
                            res = res.replace('id="radio-2"', 'id="radio-2" checked');

                        }else {
                            var replace = 'value="'+ans_ques['answer']+'"';
                            var replacing_var = 'value="'+ans_ques['answer']+'" checked';
                            res = res.replace(replace, replacing_var);
                        }
                    }

                    $('#course_read').append(res);
                }
            });
  });

// End button 
$('body').on('click', '.end_btn',function(){

    var ques_id = $('.question_dynamic').attr('id');
    answer_set(ques_id);

    console.log(final_answers);

    for(let i=0; i<final_answers.length; i++) {
        if(final_answers[i]['answer'] === undefined) {
            $('#modal').find('h4').text('Please complete all the answers before submit');
            $('#modal').find('p').text('');
            $('#modal').find('a').text('OK');

            break;
        }else {
            $('#modal').find('h4').text('Your answers will be submitted!.');
            $('#modal').find('p').text('Are you sure to proceed.');
            $('#modal').find('a').addClass('assess_subConfirmation').text('Yes');
        }
    }

    $('.end_test-modal').modal('show');
        
});

// Assessment  submission
$(document).on('click', '.assess_subConfirmation', function(){
    var user_id = "<?php echo e(Auth()->user()->id); ?>";
    var ques_id = $('.question_dynamic').attr('id');
    var course_id = "<?php echo e(@$course_master->id); ?>"

  //Answer set in the Array
    answer_set(ques_id);
    console.log(final_answers);

    $.ajax({
            type: 'POST',
            url: "<?php echo e(url('/assessment_submit')); ?>",
            data: {_token: '<?php echo e(csrf_token()); ?>',answers: final_answers, user_id: user_id, course_id: course_id },
            success: function (response) {  
                console.log(response);
                console.log(response.attend_ques);
                var res_html = '<li>Questions attended '+response.attend_ques+'/'+response.total_ques+'</li><li>Correct answers: '+response.answer_ques+'</li><li>'+response.correct_mark+'/'+response.total_mark+' Score</li>';
                $('.res-restart').hide();

                if(response.result == "PASS") {
                    res_html = res_html+'<li>Result: <span style="color: green;">PASS</span></li>'
                    $('.assessment_btn').html('<i class="la la-check primary-color-2 mr-2"></i>');
                    $('#collapseMenuThree').css('background-color','#d9dee3');
                    $('.assess_check').prepend('<i class="la la-check primary-color-2 mr-2"></i>');
                    $('#viewresult_menu').css('display', 'block');
                    $('#assessment_menu').remove();
                    $('.feed-menu').show();
                }else {
                    res_html = res_html+'<li>Result: <span style="color: red;">FAIL</span></li>'
                    $('.res-restart').show();
                    $('.complete-cont').remove();
                }
               $('.res-status').html(res_html);
               $('.res-date').html(response.date);
               $('.res-score').html("Your Score is:"+response.correct_mark);

            }
        });

        // $('.assessment_btn').html('<i class="la la-check primary-color-2 mr-2"></i>');
        // $('#collapseMenuThree').css('background-color','#d9dee3');
        // $('.assess_check').prepend('<i class="la la-check primary-color-2 mr-2"></i>');
        // $('#viewresult_menu').css('display', 'block');
        $('#result_view').css('display', 'block');
        // $('.feed-menu').show();
    });

// Result Score Board view
$(document).on('click', '#viewresult_menu', function(){

    var user_id = "<?php echo e(Auth()->user()->id); ?>";
    var course_id = "<?php echo e(@$course_master->id); ?>"

    $.ajax({
            type: 'GET',
            url: "<?php echo e(url('/view_result')); ?>",
            data: {_token: '<?php echo e(csrf_token()); ?>', user_id: user_id, course_id: course_id },
            success: function (response) {  
                console.log(response);
                console.log(response.attend_ques);
                var res_html = '<li>Questions attended '+response.attend_ques+'/'+response.total_ques+'</li><li>Correct answers: '+response.correct_answer +'</li><li>'+response.correct_mark+'/'+response.total_mark+' Score</li>';
                $('.res-restart').hide();

                if(response.result == "PASS"){
                    res_html = res_html+'<li>Result: <span style="color: green;">PASS</span></li>'
                }else{
                    res_html = res_html+'<li>Result: <span style="color: red;">FAIL</span></li>'
                    $('.res-restart').show();
                }
               $('.res-status').html(res_html);
               $('.res-date').html(response.date);
               $('.res-score').html("Your Score is:"+response.correct_mark);

            }
        });

        $('#course_read').empty();
        $('#result_view').css('display', 'block');

});


});

// Restart quiz 
$(document).on('click', '.res-restart', function(){
    window.location.reload();
});

// Score board continue button
$(document).on('click', '.complete-cont', function(){

    $('#result_view').css('display', 'none');
    $('#feedback_view').css('display', 'block');

});


// Star rating feedback form
$(document).ready(function() {

      var SetRatingStar = function() {
        return $('.fa-star').each(function() {
          if (parseInt($(this).siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('far fa-star').addClass('fas fa-star');
          } else {
            return $(this).removeClass('fas fa-star').addClass('far fa-star');
          }
        });
      };

      $(document).on('click', '.fa-star', function() {
        $(this).siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
      });

      SetRatingStar();
});

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course_view.blade.php ENDPATH**/ ?>