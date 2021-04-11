<?php
    $uri = $_SERVER['REQUEST_URI'];
    $act = explode('/',$uri); 
?>



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
                        <div class="card-box-shared-title">
                            <h3 class="widget-title"><?php if(@$user): ?><?php echo e("Edit Profile"); ?><?php else: ?><?php echo e("Create User"); ?><?php endif; ?></h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="section-tab section-tab-2">
                                <ul class="nav nav-tabs" role="tablist" id="review">
                                    <li role="presentation">
                                        <a href="#profile" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                            Profile
                                        </a>
                                    </li>
                                     <!-- <li role="presentation">
                                        <a href="#password" role="tab" data-toggle="tab" aria-selected="false">
                                             Corporate Users
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                            <?php //echo "<pre>"; print_r($user); exit(); ?>
                            <div class="dashboard-tab-content mt-5">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show" id="profile">
                                        <?php if(@$user): ?>
                                            <?php if(in_array('users', $act)): ?>
                                            <form method="post" action="<?php echo e(url('/users/'.@$user->id)); ?>" id="profile_form" enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                            <?php else: ?>
                                            <?php //echo "in"; exit(); ?>
                                            <form method="post" action="<?php echo e(url('/corporate/'.@$user->id)); ?>" id="profile_form" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <?php endif; ?>
                                        <?php else: ?>  
                                            <?php if(in_array('users', $act)): ?>
                                            <form method="post" action="<?php echo e(url('/users')); ?>" id="profile_form" enctype="multipart/form-data">
                                            <?php else: ?>
                                            <form method="post" action="<?php echo e(url('/corporate')); ?>" id="profile_form" enctype="multipart/form-data">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                            <?php echo csrf_field(); ?>
                                        <div class="user-form">
                                            
                                            <div class="contact-form-action">
                                                <?php if((Auth::user()->role=='super_admin') && in_array('users', $act) ): ?>
                                                    <div class="row mb-3">
                                                        
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="question-overview-filter-item">
                                                                <label class="label-text">User Role<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="sort-ordering user-form-short mt-2">
                                                                    <div class="dropdown bootstrap-select sort-ordering-select">
                                                                        <select class="sort-ordering-select user_role" name="user_role" tabindex="-98">
                                                                            <option value="">Please Select</option>
                                                                            <option value="public" <?php if(@$user->role=='public_user'){ echo "selected"; } ?> >Individual</option>
                                                                            <option value="corporate_user" <?php if(@$user->role=='corporate_user'){ echo "selected"; } ?> >Instituition/Corporate</option>
                                                                        </select>
                                                                    </div>
                                                                    <span class="drop_error"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-sm-6 sel_company">
                                                            <div class="question-overview-filter-item">
                                                                <label class="label-text">Select Company<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="sort-ordering user-form-short mt-2">
                                                                    <div class="dropdown bootstrap-select sort-ordering-select">
                                                                        <select class="sort-ordering-select" name="corp_sel" tabindex="-98">
                                                                        <?php if(@count(@$companies)>0): ?>
                                                                            <option value="">Please Select</option>
                                                                            <?php $__currentLoopData = @$companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($company->id); ?>" <?php if(@$user->corp_id == $company->id) { echo "selected"; } ?> ><?php echo e($company->name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <h6>No records found!</h6>
                                                                        <?php endif; ?>  
                                                                        </select>
                                                                    </div>
                                                                    <span class="dropuser_error"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php endif; ?>

                                                    <div class="row">

                                                        <div class="user-profile-action d-flex align-items-center">
                                                            <div class="user-pro-img">
                                                                <?php if(@$user): ?>
                                                                <img src="<?php echo e(url('application/public/uploads/profile_pics/users/'.@$user->pic_dynamicName)); ?>" alt="user-image" class="img-fluid radius-round border">
                                                                <?php else: ?>
                                                                <img src="<?php echo e(url('asset/images/default_avatar.png')); ?>" alt="user-image" class="img-fluid radius-round border">
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="upload-btn-box course-photo-btn">
                                                                <input type="file" id="profile_pic" name="profile_pic" class="filer_input" accept=".jpg,.png,.jpeg, image/*">
                                                                <h6 class="pic_name"></h6>
                                                                <p>Suitable files are .jpg, .jpeg &amp; .png</p>
                                                                <?php if(@$user->pic_originalName !== null): ?>
                                                                <button class="theme-btn mt-3 remove_pic" type="button">Remove Photo</button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- end user-profile-action -->

                                                        <?php if((Auth::user()->role=='super_admin') && in_array('corporate', $act) ): ?>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">Company Name<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="company_name" value="<?php if(@$user): ?><?php echo e(@$user->company_name); ?><?php else: ?><?php echo e(old('company_name')); ?><?php endif; ?>">
                                                                        <i class="fas fa-clipboard-list input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end col-lg-6 -->
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">Registration Number<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="reg_no" value="<?php if(@$user): ?><?php echo e(@$user->company_reg_no); ?><?php else: ?><?php echo e(old('reg_no')); ?><?php endif; ?>">
                                                                        <i class="fas fa-digital-tachograph input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end col-lg-6 -->
                                                        <?php endif; ?>

                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Name<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="name" value="<?php if(@$user): ?><?php echo e(@$user->name); ?><?php else: ?><?php echo e(old('name')); ?><?php endif; ?>">
                                                                    <span class="la la-user input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="email" value="<?php if(@$user): ?><?php echo e(@$user->email); ?><?php else: ?><?php echo e(old('email')); ?><?php endif; ?>">
                                                                    <span class="la la-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('email')): ?>
                                                                <div class="error"><?php echo e($errors->first('email')); ?></div>
                                                            <?php endif; ?>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Gender</label>
                                                                <div class="input-box">
                                                                    <div class="form-group">
                                                                        <label for="radio-3" class="radio-trigger mb-0 mr-2">
                                                                            <input type="radio" id="radio-3" name="gender" class="gender" value="male" <?php if(@$user->gender == 'male') echo "checked"; ?>>
                                                                            <span class="checkmark"></span>
                                                                            <span class="font-size-15 primary-color-3">Male</span>
                                                                        </label>
                                                                        <label for="radio-4" class="radio-trigger mb-0">
                                                                            <input type="radio" id="radio-4" name="gender" class="gender" value="female" <?php if(@$user->gender == 'female') echo "checked"; ?>>
                                                                            <span class="checkmark"></span>
                                                                            <span class="font-size-15 primary-color-3">Female</span>
                                                                        </label>
                                                                        <label for="radio-5" class="radio-trigger mb-0">
                                                                            <input type="radio" id="radio-5" value="others" name="gender" class="gender" <?php if(@$user){ if( @$user->gender == 'others' ) echo "checked";} ?> >
                                                                            <span class="checkmark"></span>
                                                                            <span class="font-size-15 primary-color-3">Others</span>
                                                                        </label>
                                                                        <div class="gender_error"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-sm-12 gender_other1">
                                                                    <label>Gender Others<span class="primary-color-2 ml-1">*</span></label>
                                                                    <input type="text" name="gender_other" class="form-control gender_other" placeholder="Please specify" value="<?php if(@$user): ?><?php echo e(@$user->gender_other); ?><?php endif; ?>">
                                                                    <?php if($errors->has('gender_other')): ?>
                                                                        <span class="text-danger "><?php echo e($errors->first('gender_other')); ?></span>  
                                                                    <?php endif; ?>
                                                                </div>
                                                                
                                                                <?php if($errors->has('gender')): ?>
                                                                    <div class="error"><?php echo e($errors->first('gender')); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Date of Birth<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="date" name="dob" id="birthday" value="<?php if(@$user): ?><?php echo e(@$user->dob); ?><?php else: ?><?php echo e(old('dob')); ?><?php endif; ?>">
                                                                    <i class="far fa-calendar-minus input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Phone<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="phone" value="<?php if(@$user): ?><?php echo e(@$user->phone); ?><?php else: ?><?php echo e(old('phone')); ?><?php endif; ?>">
                                                                    <i class="fas fa-phone-alt input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">Address<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="address" value="<?php if(@$user): ?><?php echo e(@$user->address); ?><?php else: ?><?php echo e(old('address')); ?><?php endif; ?>">
                                                                        <i class="fas fa-map-marked-alt input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">City<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="city" value="<?php if(@$user): ?><?php echo e(@$user->city); ?><?php else: ?><?php echo e(old('city')); ?><?php endif; ?>">
                                                                        <i class="fas fa-city input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">Country<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="country" value="<?php if(@$user): ?><?php echo e(@$user->country); ?><?php else: ?><?php echo e(old('country')); ?><?php endif; ?>">
                                                                        <i class="fas fa-globe-americas input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="input-box">
                                                                    <label class="label-text">Pincode<span class="primary-color-2 ml-1">*</span></label>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="pincode" value="<?php if(@$user): ?><?php echo e(@$user->pincode); ?><?php else: ?><?php echo e(old('pincode')); ?><?php endif; ?>">
                                                                        <i class="far fa-map input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn register_btn" type="submit" style="float: right;">Submit</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end tab-pane-->
                                    <div role="tabpanel" class="tab-pane fade" id="password">
                                        <div class="user-form padding-bottom-60px">
                                            <div class="user-profile-action-wrap">
                                                <h3 class="widget-title font-size-18 padding-bottom-40px">Change Password</h3>
                                            </div><!-- end user-profile-action-wrap -->
                                            <div class="contact-form-action">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Old Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="Old password">
                                                                    <span class="la la-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">New Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="New password">
                                                                    <span class="la la-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Confirm New Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="Confirm new password">
                                                                    <span class="la la-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit">Change password</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                        <div class="section-block"></div>
                                        <div class="user-form padding-top-60px">
                                            <div class="user-profile-action-wrap padding-bottom-20px">
                                                <h3 class="widget-title font-size-18 padding-bottom-10px">Forgot Password then Recover Password</h3>
                                                <p class="line-height-26">Enter the email of your account to reset password. Then you will receive a link to email
                                                    <br> to reset the password.If you have any issue about reset password <a href="#" class="primary-color-2">contact us</a></p>
                                            </div><!-- end user-profile-action-wrap -->
                                            <div class="contact-form-action">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="Enter email address">
                                                                    <span class="la la-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit">recover password</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end tab-pane-->
                                    <div role="tabpanel" class="tab-pane fade" id="change-email">
                                        <div class="user-form">
                                            <div class="user-profile-action-wrap">
                                                <h3 class="widget-title font-size-18 padding-bottom-40px">Change email</h3>
                                            </div><!-- end user-profile-action-wrap -->
                                            <div class="contact-form-action">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Old Email<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="Old email">
                                                                    <span class="la la-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">New Email<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="New email">
                                                                    <span class="la la-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Confirm New Email<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="text" placeholder="Confirm new email">
                                                                    <span class="la la-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit">save changes</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end tab-pane-->

                                    <div role="tabpanel" class="tab-pane fade" id="account">
                                        <div class="user-profile-action-wrap">
                                            <h3 class="widget-title font-size-18 padding-bottom-40px">My Account</h3>
                                        </div><!-- end user-profile-action-wrap -->
                                       <div class="user-account-wrap padding-bottom-40px">
                                           <div class="row">
                                               <div class="col-lg-4">
                                                   <div class="deactivate-account d-flex align-items-center">
                                                       <div class="payment-option">
                                                           <label for="radio-7" class="radio-trigger mb-0">
                                                               <input type="radio" id="radio-7" name="radio">
                                                               <span class="checkmark"></span>
                                                               <span class="widget-title font-size-18">Deactivate Account</span>
                                                           </label>
                                                       </div>
                                                       <div class="btn-box ml-3">
                                                           <button class="theme-btn line-height-40 font-size-14">Deactivate</button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                        <div class="section-block"></div>
                                        <div class="user-profile-action-wrap padding-top-40px">
                                            <div class="delete-account-wrap">
                                                <h3 class="widget-title font-size-18 pb-2 text-danger">Delete Account Permanently</h3>
                                                <p><span class="text-warning">Warning:</span> Once you delete your account, there is no going back. Please be certain.</p>
                                                <div class="btn-box mt-4">
                                                    <button class="theme-btn line-height-40 font-size-14" data-toggle="modal" data-target=".account-delete-modal">Delete My Account</button>
                                                </div>
                                            </div>
                                        </div><!-- end user-profile-action-wrap -->
                                    </div><!-- end tab-pane-->
                                </div><!-- end tab-content -->
                            </div><!-- end dashboard-tab-content -->
                        </div>
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
                    <button type="submit" class="theme-btn bg-color-6 border-0 text-white" >Delete</button>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<script>

// Delete pic
$(document).on('click', '.jFiler-item-trash-action', function(){
    $('.pic_name').empty();
});

// Form validation
$.validator.addMethod("customemail", function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 'The email must be a valid email address.'
);

jQuery.validator.addMethod('phoneUK', function(phone_number, element) {
  return this.optional(element) || phone_number.length > 9 &&
  phone_number.match(/^(\(?(0|\+44|)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
  }, 'Please specify a valid phone number'
);

$("#profile_form").validate({
    errorElement: "div",
    rules: {
        <?php if( (Auth::user()->role=='super_admin') && in_array('users', $act) ) { ?>
        user_role: {
            required: true,
        }, 
        corp_sel: {
            required: {
                depends: function (element) {
                    var check= $('.user_role option:selected').val() == 'corporate_user';
                    return check;
                }
            },
        },
        <?php } ?>
        <?php if( (Auth::user()->role=='super_admin') && in_array('corporate', $act) ) { ?>
        company_name: {
            required: true,
        },
        reg_no: {
            required: true,
        },
        <?php } ?>
        name: {
            required: true,
        },
        email: {
            required: true,
            customemail:true,
        },
        gender: {
            required: true,
        },
        gender_other: {
            required: {
                depends: function (element) {
                    return $('#radio-5').is(':checked');
                }
            },
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        country: {
            required: true,
        },
        pincode: {
            required: true,
        },
        dob: {
            required: true,
        },
        phone: {
            required: true,
            phoneUK: true,
        },
        captcha: {
            required: true,
        },
        termscheckbox: {
            required: true,
        },
        
    },
    messages: {
        <?php if( (Auth::user()->role=='super_admin') && in_array('corporate', $act) ) { ?>
        company_name: {
            required: "Please enter company name.",
        },
        reg_no: {
            required: "Please enter register number.",
        },
        <?php } ?>
        <?php if( (Auth::user()->role=='super_admin') && in_array('users', $act) ) { ?>
        user_role: {
            required: "Please choose user role.",
        },
        corp_sel: {
            required: "Please choose company.",
        },
        <?php } ?>
        name: {
            required: "Please enter name.",
        },
        email: {
            required: "Please enter email.",
        },
        gender: {
            required: "Please choose gender.",
        },
        gender_other: {
            required: "Please specify gender.",
        },
        address: {
            required: "Please enter address.",
        },
        city: {
            required: "Please enter city.",
        },
        country: {
            required: "Please enter country.",
        },
        pincode: {
            required: "Please enter pincode.",
        },
        dob: {
            required: "Please enter date of birth.",
        },
        phone: {
            required: "Please enter phone number.",
        },
        captcha: {
            required: "Please enter captcha.",
        },
        termscheckbox: {
            required: "Please accept terms and conditions.",
        },
    },
    submitHandler: function (form) {
        form.submit();
    }
});

// Profile Pic multiselect removal
$( document ).ready(function() {
    setTimeout(function() {
        var myAttr = $('#profile_pic').attr('multiple');
        if (typeof myAttr !== 'undefined' && myAttr !== false) {
            $('#profile_pic').removeAttr("multiple");
            $('#profile_pic').attr('name','profile_pic');
        }
    }, 250);
       
});

// Profile Pic
$(document).on("change","#profile_pic",function() {
      var input = this;
      $('.invalid_error').text('Invalid Format');
      if (input.files && input.files[0]) {
         var filename = input.files[0]["name"];
         var reader = new FileReader();
         var ext = filename.split('.'); 
         reader.onload = function(e) {
            $('.register_btn').attr('disabled', false);
            if(ext[1] == 'jpg' || ext[1] == 'gif' || ext[1] == 'tif' || ext[1] == 'jpeg' || ext[1] == 'png' )
            {
               $('.pic_name').text(filename);
               $('.pic_name').css('color', 'blue');
            }
            else{
               $('#profile_pic').val('');
               $('.pic_name').text('Invalid Format');
               $('.pic_name').css('color', 'red');
               $('.register_btn').attr('disabled', true);
            }
         }
       reader.readAsDataURL(input.files[0]);     
      }
   });

// Error alignments
$('.register_btn').click(function(){
      setTimeout(function() {
            $('#gender-error').appendTo(".gender_error");
            $('#termscheckbox-error').appendTo(".termscheckbox-error");
            $('#user_role-error').appendTo(".drop_error");
            $('#corp_sel-error').appendTo(".dropuser_error");
        }, 25);
   });

// Other genders visibility
$('.gender_other1').hide();
$('.gender').on('change',function(){
    if($('#radio-5').is(':checked')) {
        $('.gender_other1').show();
    }
    else {
        $('.gender_other').val(null);
        $('.gender_other1').hide();
    }
});

// When edit other gender visibility
if($('#radio-5').is(':checked')) {
        $('.gender_other1').show();
    }

// Remove Profile Pic
$(document).ready(function(){

    $('.remove_pic').click(function(){
        $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    _method: 'DELETE',
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                url: "<?php echo e(url('/corporate/'.@$user->id)); ?>",
                success: function(response)
                {
                    location.reload();
                }
            });
    });
            
});

// Company selection 
$('.sel_company').hide();
$('.user_role').change(function(){
    // console.log($('.user_role option:selected').val());
    if($('.user_role option:selected').val() == 'corporate_user'){
        $('.sel_company').show();
    }
    else {
        $('.sel_company').hide();
    }
});

// Display Company after save
if($('.user_role option:selected').val() == 'corporate_user'){
    console.log($('.user_role option:selected').val());
    $('.sel_company').show();
}

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/user/profile.blade.php ENDPATH**/ ?>