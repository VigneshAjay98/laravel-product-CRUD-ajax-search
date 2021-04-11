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
                            <h3 class="widget-title">My Courses</h3>
                        </div>
                        
                        <div class="container">
                            <div class="my-course-content-wrap">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active show" id="all-courses">
                                    <!-- <div class="course-alert-info">
                                        <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="la la-users"></i> <a href="#" class="alert-link">Share Aduca with friends</a>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div> --><!-- end course-alert-info -->
                                    <div class="my-course-content-body">
                                        <div class="lecture-overview-item">
                                            <div class="question-overview-filter-wrap my-course-filter-wrap d-flex align-items-center">
                                                <div class="my-course-sort-by-content">
                                                    <div class="question-overview-filter-item">
                                                        <span class="badge font-size-14 font-weight-semi-bold">Sort by</span>
                                                        <div class="sort-ordering user-form-short mt-2">
                                                            <select class="sort-ordering-select">
                                                                <option value="0" selected="">Recently Accessed</option>
                                                                <option value="1">Recently Enrolled</option>
                                                                <option value="2">Title: A-to-Z</option>
                                                                <option value="3">Title: Z-to-A</option>
                                                                <option value="4">Completion: 0% to 100%</option>
                                                                <option value="5">Completion: 100% to 0%</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- end question-overview-filter-item -->
                                                </div><!-- end my-course-sort-by-content -->
                                                <div class="my-course-filter-by-content">
                                                    <div class="question-overview-filter-item">
                                                        <span class="badge font-size-14 font-weight-semi-bold">Filter by</span>
                                                        <div class="d-flex align-items-center mt-2">
                                                            <div class="sort-ordering user-form-short">
                                                                <select class="sort-ordering-select">
                                                                    <option value="0" selected="">Categories</option>
                                                                    <option value="1">Favorites</option>
                                                                    <option value="2">Archived</option>
                                                                    <option value="3">All Categories</option>
                                                                    <option value="4">Development</option>
                                                                    <option value="5">Design</option>
                                                                    <option value="6">Business</option>
                                                                    <option value="7">Marketing</option>
                                                                    <option value="8">IT & Software</option>
                                                                    <option value="9">Finance & Accounting</option>
                                                                    <option value="10">Personal Development</option>
                                                                    <option value="11">Office Productivity</option>
                                                                    <option value="12">Teaching & Academics</option>
                                                                    <option value="13">Lifestyle</option>
                                                                    <option value="14">Aduca Free Resource Center</option>
                                                                </select>
                                                            </div>
                                                            <div class="sort-ordering user-form-short">
                                                                <select class="sort-ordering-select">
                                                                    <option value="0" selected="">Progress</option>
                                                                    <option value="1">Not Started</option>
                                                                    <option value="2">In Progress</option>
                                                                    <option value="3">Completed</option>
                                                                </select>
                                                            </div>
                                                            <div class="sort-ordering user-form-short">
                                                                <select class="sort-ordering-select">
                                                                    <option selected>All Instructor</option>
                                                                    <option value="1">Aduca Instructor Team</option>
                                                                    <option value="1">Aatef Jaberi</option>
                                                                    <option value="2">Abdul Wali</option>
                                                                    <option value="3">Abhay Talreja</option>
                                                                    <option value="4">Akshay Goel</option>
                                                                    <option value="5">Al Sweigart</option>
                                                                    <option value="6">Alagappan K</option>
                                                                    <option value="7">Bluelime Learning Solutions</option>
                                                                    <option value="8">Boris Paskhaver</option>
                                                                    <option value="9">Brent Dalley</option>
                                                                    <option value="10">Brian Jackson</option>
                                                                    <option value="11">Bruce Chamoff</option>
                                                                    <option value="12">Carl Heaton</option>
                                                                    <option value="13">Chad Tennant</option>
                                                                    <option value="14">Chris Lele</option>
                                                                    <option value="15">Daniel Kalish</option>
                                                                    <option value="16">Daniel White</option>
                                                                    <option value="17">Darrel Wilson</option>
                                                                    <option value="18">EDUmobile Academy</option>
                                                                    <option value="19">Eduonix Learning Solutions</option>
                                                                    <option value="20">Eduonix-Tech</option>
                                                                    <option value="21">Ermin Kreponic</option>
                                                                    <option value="22">Fahad Chaudhry</option>
                                                                    <option value="23">Federico Fort</option>
                                                                    <option value="24">Frahaan Hussain</option>
                                                                    <option value="25">Gabriel Both</option>
                                                                    <option value="26">Gandhi Kumarasamy Sezhian</option>
                                                                    <option value="27">Hayley - Creative Mind Ch</option>
                                                                    <option value="28">Hussein Al Rubaye</option>
                                                                    <option value="29">Infinite Skills</option>
                                                                    <option value="30">Irfan Dayan</option>
                                                                    <option value="31">James Canzanella</option>
                                                                    <option value="32">James G</option>
                                                                    <option value="33">Kawser Ahmed</option>
                                                                    <option value="34">Kraig Mathias</option>
                                                                    <option value="35">Krisztina Rudnay</option>
                                                                    <option value="36">Laurence Svekis</option>
                                                                    <option value="37">Lawrence Kim</option>
                                                                    <option value="17">M Darwish</option>
                                                                    <option value="38">Maggie Osama</option>
                                                                    <option value="39">Nader Hantash</option>
                                                                    <option value="40">Naeem Hussain</option>
                                                                    <option value="41">Phil Ebiner</option>
                                                                    <option value="42">Rufeena Jones S</option>
                                                                    <option value="43">Richard Miles</option>
                                                                    <option value="44">Sandor Kiss</option>
                                                                    <option value="45">Saranya Srinidhi</option>
                                                                    <option value="46">Think Forward Online Training</option>
                                                                    <option value="47">Tim Sharp</option>
                                                                    <option value="48">Usman Raoof</option>
                                                                    <option value="49">Victoria White</option>
                                                                    <option value="50">Wayne Walker</option>
                                                                    <option value="51">Yohann Taieb</option>
                                                                    <option value="52">Zac Johnson</option>
                                                                    <option value="53">Zach Miller</option>
                                                                </select>
                                                            </div>
                                                            <div class="reset-btn-box">
                                                                <button class="theme-btn" type="button">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div><!-- end question-overview-filter-item -->
                                                </div><!-- end my-course-filter-by-content -->
                                                <div class="my-course-search-content">
                                                    <div class="question-overview-filter-item">
                                                        <span class="badge font-size-14 font-weight-semi-bold">Search</span>
                                                        <div class="contact-form-action mt-2">
                                                            <form method="post">
                                                                <div class="input-box">
                                                                    <div class="form-group mb-0">
                                                                        <input class="form-control" type="text" name="search" placeholder="Search courses">
                                                                        <span class="la la-search search-icon"></span>
                                                                    </div>
                                                                </div><!-- end input-box -->
                                                            </form>
                                                        </div><!-- end contact-form-action -->
                                                    </div><!-- end question-overview-filter-item -->
                                                </div><!-- end my-course-search-content -->
                                            </div>
                                        </div><!-- end lecture-overview-item -->
                                        <div class="my-course-container">
                                            <div class="row">
                                                 <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="lesson-details.html" class="card__img">
                                                                <img src="images/img8.jpg" alt="">
                                                                <div class="play-button">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                        <style type="text/css">
                                                                            .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                            .st1{fill:#FFFFFF;}
                                                                        </style>
                                                                        <g>
                                                                        <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                            <div class="msg-action-dot my-course-action-dot">
                                                                <div class="dropdown">
                                                                    <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="la la-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <ul>
                                                                            <li><p class="dropdown-header pt-0 pb-0 primary-color">Collections</p></li>
                                                                            <li>
                                                                                <p class="dropdown-item">
                                                                                    <a href="javascript:void(0)" class="collection-link d-flex align-items-center justify-content-between">
                                                                                        <span>Javascript</span>
                                                                                        <span class="la la-check collection-icon"></span>
                                                                                    </a>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p class="dropdown-item">
                                                                                    <a href="javascript:void(0)" class="collection-link d-flex align-items-center justify-content-between">
                                                                                        <span>Business</span>
                                                                                        <span class="la la-check collection-icon"></span>
                                                                                    </a>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <div class="section-block mt-2 mb-2"></div>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" data-toggle="modal" data-target=".share-modal-form">
                                                                                    Share <i class="ml-auto la la-share"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" data-toggle="modal" data-target=".create-collection-modal-form">
                                                                                    Create New Collection <i class="ml-auto la la-plus"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">Favorite</span>
                                                                                    <i class="ml-auto la la-star"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">Archive</span>
                                                                                    <i class="ml-auto la la-archive"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card-image -->

                                                        <?php if(count(@$courses) > 0): ?>
                                                        <?php $__currentLoopData = @$courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="card-content p-4">
                                                            <h3 class="card__title mt-0">
                                                                <a href="lesson-details.html"><?php echo e(@$course->title); ?></a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">Joseph Delgadillo</a>
                                                                <span>, Internet Marketer & Business Innovator</span>
                                                            </p>
                                                            <div class="course-complete-bar-2 mt-2">
                                                                <div class="progress-item mb-0">
                                                                    <p class="skillbar-title">Complete:</p>
                                                                    <div class="skillbar-box mt-1">
                                                                        <div class="skillbar" data-percent="70%">
                                                                            <div class="skillbar-bar skillbar-bar-1"></div>
                                                                        </div> <!-- End Skill Bar -->
                                                                    </div>
                                                                    <div class="skill-bar-percent">70%</div>
                                                                </div>
                                                            </div><!-- end course-complete-bar-2 -->
                                                            <div class="rating-wrap d-flex mt-3">
                                                                <a href="<?php echo e(url('course_view/'.@$course->id)); ?>" class="theme-btn view-btn1"><i class="la la-eye mr-1 font-size-16"></i>View</a>
                                                                <!-- <a href="javascript:void(0)" data-toggle="modal" data-target=".rating-modal-form" class="btn rating-btn">
                                                                  <i class="la la-star mr-1"></i>Leave a Rating
                                                                </a> -->
                                                            </div><!-- end rating-wrap -->
                                                        </div><!-- end card-content -->

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                        <h1>No records found!</h1>
                                                            <?php endif; ?>
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                        </div>
                                        <div class="page-navigation-wrap mt-4 text-center">
                                            <div class="page-navigation-inner d-inline-block">
                                                <div class="page-navigation">
                                                    <a href="#" class="page-go page-prev">
                                                        <i class="la la-arrow-left"></i>
                                                    </a>
                                                    <ul class="page-navigation-nav">
                                                        <li><a href="#" class="page-go-link">1</a></li>
                                                        <li class="active"><a href="#" class="page-go-link">2</a></li>
                                                        <li><a href="#" class="page-go-link">3</a></li>
                                                        <li><a href="#" class="page-go-link">4</a></li>

                                                    </ul>
                                                    <a href="#" class="page-go page-next">
                                                        <i class="la la-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <p class="font-size-14 mt-3">Showing 1-6 of 14 courses</p>
                                        </div><!-- end page-navigation-wrap -->
                                    </div>
                                </div><!-- end tab-pane -->
                                <div role="tabpanel" class="tab-pane fade" id="collections">
                                    <div class="my-collection-wrap">
                                        <div class="my-collection-item">
                                            <div class="my-collection-info">
                                                <div class="d-flex align-items-center pb-2">
                                                    <h3 class="widget-title">Javascript</h3>
                                                    <div class="my-collection-action-wrap ml-2">
                                                        <span class="la la-edit icon-element" title="Edit" data-toggle="modal" data-target=".edit-collection-modal-form"></span>
                                                        <span class="la la-trash icon-element" title="Delete" data-toggle="modal" data-target=".account-delete-modal"></span>
                                                    </div>
                                                </div>
                                                <p>Leading the basics fundamentals</p>
                                            </div>
                                            <div class="my-collection-card-body padding-top-35px">
                                                <div class="row">
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img8.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <?php if(count(@$courses) > 0): ?>
                                                            <?php $__currentLoopData = @$courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html"><?php echo e(@$course->title); ?></a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <!-- <a href="teacher-detail.html">Joseph Delgadillo</a>
                                                                    <span>, Internet Marketer & Business Innovator</span> -->
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="70%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">80%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="<?php echo e(url('/admin/course_view/'.@$course->id)); ?>" data-toggle="modal" data-target=".rating-modal-form" class="btn rating-btn">
                                                                        <i class="la la-star mr-1"></i>Leave a Rating
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img9.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html">Modern JavaScript From The Beginning</a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <a href="teacher-detail.html">Hussain Rubaye</a>
                                                                    <span>, Software Engineer and Developer</span>
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="0%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">0%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="lesson-details.html" class="btn rating-btn">
                                                                        <i class="la la-eye mr-1"></i>Start course
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img10.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html">The Complete JavaScript Course 2020: Build Real Projects!</a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <a href="teacher-detail.html">alex smith</a>
                                                                    <span>, Developer, Team Lead, Software Consultant, Loves Technology</span>
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="0%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">0%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="lesson-details.html" class="btn rating-btn">
                                                                        <i class="la la-eye mr-1"></i>Start course
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                </div><!-- end row -->
                                            </div>
                                        </div><!-- end my-collection-item -->
                                        <div class="my-collection-item">
                                            <div class="my-collection-info">
                                                <div class="d-flex align-items-center pb-2">
                                                    <h3 class="widget-title">Business</h3>
                                                    <div class="my-collection-action-wrap ml-2">
                                                        <span class="la la-edit icon-element" title="Edit" data-toggle="modal" data-target=".edit-collection-modal-form"></span>
                                                        <span class="la la-trash icon-element" title="Delete" data-toggle="modal" data-target=".account-delete-modal"></span>
                                                    </div>
                                                </div>
                                                <p>Leading the basics fundamentals</p>
                                            </div>
                                            <div class="my-collection-card-body padding-top-35px">
                                                <div class="row">
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img8.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html">An Entire MBA in 1 Course:Award Winning Business School Prof</a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <a href="teacher-detail.html">Joseph Delgadillo</a>
                                                                    <span>, Internet Marketer & Business Innovator</span>
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="70%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">70%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".rating-modal-form" class="btn rating-btn">
                                                                        <i class="la la-star mr-1"></i>Leave a Rating
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img9.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html">The Complete Financial Analyst Course 2020</a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <a href="teacher-detail.html">Hussain Rubaye</a>
                                                                    <span>, Software Engineer and Developer</span>
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="0%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">0%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="lesson-details.html" class="btn rating-btn">
                                                                        <i class="la la-eye mr-1"></i>Start course
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 column-td-half">
                                                        <div class="card-item">
                                                            <div class="card-image">
                                                                <a href="lesson-details.html" class="card__img">
                                                                    <img src="images/img10.jpg" alt="">
                                                                    <div class="play-button">
                                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                            <g>
                                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <div class="msg-action-dot my-course-action-dot">
                                                                    <div class="dropdown">
                                                                        <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="la la-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                                Remove from collection <i class="la la-eye-slash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card-image -->
                                                            <div class="card-content p-4">
                                                                <h3 class="card__title mt-0">
                                                                    <a href="lesson-details.html">Ninja Writing: The Four Levels Of Writing Mastery</a>
                                                                </h3>
                                                                <p class="card__author">
                                                                    <a href="teacher-detail.html">alex smith</a>
                                                                    <span>, Developer, Team Lead, Software Consultant, Loves Technology</span>
                                                                </p>
                                                                <div class="course-complete-bar-2 mt-2">
                                                                    <div class="progress-item mb-0">
                                                                        <p class="skillbar-title">Complete:</p>
                                                                        <div class="skillbar-box mt-1">
                                                                            <div class="skillbar" data-percent="0%">
                                                                                <div class="skillbar-bar skillbar-bar-1"></div>
                                                                            </div> <!-- End Skill Bar -->
                                                                        </div>
                                                                        <div class="skill-bar-percent">0%</div>
                                                                    </div>
                                                                </div><!-- end course-complete-bar-2 -->
                                                                <div class="rating-wrap d-flex mt-3">
                                                                    <a href="lesson-details.html" class="btn rating-btn">
                                                                        <i class="la la-eye mr-1"></i>Start course
                                                                    </a>
                                                                </div><!-- end rating-wrap -->
                                                            </div><!-- end card-content -->
                                                        </div><!-- end card-item -->
                                                    </div><!-- end col-lg-4 -->
                                                </div><!-- end row -->
                                            </div>
                                        </div><!-- end my-collection-item -->
                                    </div>
                                </div><!-- end tab-pane -->
                                <div role="tabpanel" class="tab-pane fade" id="wishlist">
                                    <div class="my-wishlist-wrap">
                                        <div class="my-wishlist-info d-flex align-items-center justify-content-between">
                                            <h3 class="widget-title">My wishlists</h3>
                                            <div class="lecture-overview-item m-0">
                                                <div class="my-course-search-content">
                                                    <div class="question-overview-filter-item">
                                                        <div class="contact-form-action">
                                                            <form method="post">
                                                                <div class="input-box">
                                                                    <div class="form-group mb-0">
                                                                        <input class="form-control" type="text" name="search" placeholder="Search courses">
                                                                        <span class="la la-search search-icon"></span>
                                                                    </div>
                                                                </div><!-- end input-box -->
                                                            </form>
                                                        </div><!-- end contact-form-action -->
                                                    </div><!-- end question-overview-filter-item -->
                                                </div><!-- end my-course-search-content -->
                                            </div>
                                        </div>
                                        <div class="my-wishlist-card-body padding-top-35px">
                                            <div class="row">
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="course-details.html" class="card__img"><img src="images/img11.jpg" alt=""></a>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content">
                                                            <p class="card__label">
                                                                <span class="card__label-text">all levels</span>
                                                                <a href="#" class="card__collection-icon primary-color-2" data-toggle="tooltip" data-placement="top" title="Remove form wishlist"><span class="la la-heart"></span></a>
                                                            </p>
                                                            <h3 class="card__title">
                                                                <a href="course-details.html">User Experience Design - Adobe XD UI UX Design</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">kamran paul</a>
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
                                                                <ul class="card-duration d-flex justify-content-between align-items-center">
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-play-circle"></i> 45 Classes
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-clock-o"></i> 3 hours 20 min
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- end card-action -->
                                                            <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                                                <span class="card__price">Free</span>
                                                                <a href="#" class="text-btn">Get Enrolled</a>
                                                            </div><!-- end card-price-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="course-details.html" class="card__img"><img src="images/img12.jpg" alt=""></a>
                                                            <div class="card-badge">
                                                                <span class="badge-label">bestseller</span>
                                                            </div>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content">
                                                            <p class="card__label">
                                                                <span class="card__label-text">all levels</span>
                                                                <a href="#" class="card__collection-icon primary-color-2" data-toggle="tooltip" data-placement="top" title="Remove form wishlist"><span class="la la-heart"></span></a>
                                                            </p>
                                                            <h3 class="card__title">
                                                                <a href="course-details.html">The Complete Digital finance Marketing Course</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">jose purtila</a>
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
                                                                    <span class="star__rating">4.2</span>
                                                                  <span class="star__count">(30)</span>
                                                                </span>
                                                            </div><!-- end rating-wrap -->
                                                            <div class="card-action">
                                                                <ul class="card-duration d-flex justify-content-between align-items-center">
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-play-circle"></i> 45 Classes
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-clock-o"></i> 3 hours 20 min
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- end card-action -->
                                                            <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                                                <span class="card__price"><span class="before-price">$189.00</span> $119.00</span>
                                                                <a href="#" class="text-btn">Add to cart</a>
                                                            </div><!-- end card-price-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="course-details.html" class="card__img"><img src="images/img13.jpg" alt=""></a>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content">
                                                            <p class="card__label">
                                                                <span class="card__label-text">all levels</span>
                                                                <a href="#" class="card__collection-icon primary-color-2" data-toggle="tooltip" data-placement="top" title="Remove form wishlist"><span class="la la-heart"></span></a>
                                                            </p>
                                                            <h3 class="card__title">
                                                                <a href="course-details.html">Complete Python Bootcamp: Go from zero to hero</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">noelle travesy</a>
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
                                                                    <span class="star__rating">4.5</span>
                                                                    <span class="star__count">(40)</span>
                                                                </span>
                                                            </div><!-- end rating-wrap -->
                                                            <div class="card-action">
                                                                <ul class="card-duration d-flex justify-content-between align-items-center">
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-play-circle"></i> 45 Classes
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="meta__date">
                                                                            <i class="la la-clock-o"></i> 3 hours 20 min
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- end card-action -->
                                                            <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                                                <span class="card__price">$68.00</span>
                                                                <a href="#" class="text-btn">Add to cart</a>
                                                            </div><!-- end card-price-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end my-wishlist-wrap -->
                                </div><!-- end tab-pane -->
                                <div role="tabpanel" class="tab-pane fade" id="archived">
                                    <div class="my-archived-wrap">
                                        <div class="my-wishlist-info">
                                            <h3 class="widget-title">My archives</h3>
                                        </div>
                                        <div class="my-archived-card-body padding-top-35px">
                                            <div class="row">
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="lesson-details.html" class="card__img">
                                                                <img src="images/img8.jpg" alt="">
                                                                <div class="play-button">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                        <g>
                                                                            <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                            <div class="msg-action-dot my-course-action-dot">
                                                                <div class="dropdown">
                                                                    <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="la la-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                            Unarchive <i class="la la-archive"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content p-4">
                                                            <h3 class="card__title mt-0">
                                                                <a href="lesson-details.html">The Complete Full-Stack JavaScript Course!</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">Joseph Delgadillo</a>
                                                                <span>, Internet Marketer & Business Innovator</span>
                                                            </p>
                                                            <div class="course-complete-bar-2 mt-2">
                                                                <div class="progress-item mb-0">
                                                                    <p class="skillbar-title">Complete:</p>
                                                                    <div class="skillbar-box mt-1">
                                                                        <div class="skillbar" data-percent="70%">
                                                                            <div class="skillbar-bar skillbar-bar-1"></div>
                                                                        </div> <!-- End Skill Bar -->
                                                                    </div>
                                                                    <div class="skill-bar-percent">70%</div>
                                                                </div>
                                                            </div><!-- end course-complete-bar-2 -->
                                                            <div class="rating-wrap d-flex mt-3">
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target=".rating-modal-form" class="btn rating-btn">
                                                                    <i class="la la-star mr-1"></i>Leave a Rating
                                                                </a>
                                                            </div><!-- end rating-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="lesson-details.html" class="card__img">
                                                                <img src="images/img9.jpg" alt="">
                                                                <div class="play-button">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                        <g>
                                                                            <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                            <div class="msg-action-dot my-course-action-dot">
                                                                <div class="dropdown">
                                                                    <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="la la-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                            Unarchive <i class="la la-archive"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content p-4">
                                                            <h3 class="card__title mt-0">
                                                                <a href="lesson-details.html">Microsoft SQL Server 2019 for Everyone</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">Hussain Rubaye</a>
                                                                <span>, Software Engineer and Developer</span>
                                                            </p>
                                                            <div class="course-complete-bar-2 mt-2">
                                                                <div class="progress-item mb-0">
                                                                    <p class="skillbar-title">Complete:</p>
                                                                    <div class="skillbar-box mt-1">
                                                                        <div class="skillbar" data-percent="0%">
                                                                            <div class="skillbar-bar skillbar-bar-1"></div>
                                                                        </div> <!-- End Skill Bar -->
                                                                    </div>
                                                                    <div class="skill-bar-percent">0%</div>
                                                                </div>
                                                            </div><!-- end course-complete-bar-2 -->
                                                            <div class="rating-wrap d-flex mt-3">
                                                                <a href="lesson-details.html" class="btn rating-btn">
                                                                    <i class="la la-eye mr-1"></i>Start course
                                                                </a>
                                                            </div><!-- end rating-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-half">
                                                    <div class="card-item">
                                                        <div class="card-image">
                                                            <a href="lesson-details.html" class="card__img">
                                                                <img src="images/img10.jpg" alt="">
                                                                <div class="play-button">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                                                .st1{fill:#FFFFFF;}
                                                                            </style>
                                                                        <g>
                                                                            <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                            <div class="msg-action-dot my-course-action-dot">
                                                                <div class="dropdown">
                                                                    <a class="action-dot btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="la la-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                                                            Unarchive <i class="la la-archive"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card-image -->
                                                        <div class="card-content p-4">
                                                            <h3 class="card__title mt-0">
                                                                <a href="lesson-details.html">WordPress for Beginners – Master WordPress</a>
                                                            </h3>
                                                            <p class="card__author">
                                                                <a href="teacher-detail.html">alex smith</a>
                                                                <span>, Developer, Team Lead, Software Consultant, Loves Technology</span>
                                                            </p>
                                                            <div class="course-complete-bar-2 mt-2">
                                                                <div class="progress-item mb-0">
                                                                    <p class="skillbar-title">Complete:</p>
                                                                    <div class="skillbar-box mt-1">
                                                                        <div class="skillbar" data-percent="0%">
                                                                            <div class="skillbar-bar skillbar-bar-1"></div>
                                                                        </div> <!-- End Skill Bar -->
                                                                    </div>
                                                                    <div class="skill-bar-percent">0%</div>
                                                                </div>
                                                            </div><!-- end course-complete-bar-2 -->
                                                            <div class="rating-wrap d-flex mt-3">
                                                                <a href="lesson-details.html" class="btn rating-btn">
                                                                    <i class="la la-eye mr-1"></i>Start course
                                                                </a>
                                                            </div><!-- end rating-wrap -->
                                                        </div><!-- end card-content -->
                                                    </div><!-- end card-item -->
                                                </div><!-- end col-lg-4 -->
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end my-archived-wrap -->
                                </div><!-- end tab-pane -->
                            </div>
                        </div>
                </div>

                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-content mt-0 pt-0 pb-4 border-top-0 text-center">
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
                    <button type="submit" class="theme-btn bg-color-6 border-0 text-white" >Delete</button>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\product\application\resources\views/my_courses.blade.php ENDPATH**/ ?>