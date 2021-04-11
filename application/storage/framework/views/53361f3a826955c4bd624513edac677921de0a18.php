

<?php $__env->startSection('content'); ?>

<style>
    
    img {
        width: 100%;
    }

</style>

<section class="login-area section--padding" style="padding-top: 0px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto mt-2">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center" style="padding: 30px 30px 0 30px;">
                        <h3 class="widget-title font-size-25">Login to Your Account!</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">

                            <!-- Login Form Starts here -->

                            <form method="POST" id="login_form" action="./login/submit">
                            <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Email<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <div class="error"><?php echo e($errors->first('email')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" id="myPassword" placeholder="Password">
                                                <span class="la la-lock input-icon"></span>
                                                <div style=" position: absolute; right: 30px; top: 15px;">
                                                    <i class="fa fa-eye" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <?php if($errors->has('password')): ?>
                                                <div class="error"><?php echo e($errors->first('password')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php echo $__env->make('component.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <div class="btn-box">
                                            <button class="theme-btn" type="submit">Login</button>
                                        </div>
                                    </div>

                                    <!-- Registration Link -->

                                    <div class="col-lg-12">
                                        <p class="mt-4">Don't have an account? <a href="<?php echo e(url('/register')); ?>" class="primary-color-2">Register</a></p>
                                    </div>
                                    <!-- Registration Link ends here -->

                                </div>
                            </form>

                            <!-- Login Form ends here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

// Form validation jquery validate

$.validator.addMethod("customemail", function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 'The email must be a valid email address.'
);

$("#login_form").validate({
    errorElement: "div",
    rules: {
        email: {
            required: true,
            customemail:true,
        },
        password: {
            required: true,
        }
        
    },
    messages: {
        email: {
            required: "The email field is required.",
        },
        password: {
            required: "The password field is required.",
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

// password view
function mouseoverPass(obj) {
    var obj = document.getElementById('myPassword');
    obj.type = "text";
}
function mouseoutPass(obj) {
    var obj = document.getElementById('myPassword');
    obj.type = "password";
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\learning\application\resources\views/auth/login.blade.php ENDPATH**/ ?>