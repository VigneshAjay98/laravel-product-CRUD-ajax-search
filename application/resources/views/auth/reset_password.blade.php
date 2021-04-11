@extends('layouts.app')
<?php
  $uri = $_SERVER['REQUEST_URI'];
  $act = explode('/',$uri);
?>
@section('content')

<style>
    
    img {
        width: 100%;
    }

</style>

<section class="recover-area section--padding" style="padding-top: 0px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title" style="padding: 30px 30px 0 30px;">
                        <h3 class="widget-title font-size-25 pb-2">Reset Password!</h3>
                        <p class="line-height-26">
                            Enter the email of your account to reset password.
                            Then you will receive a link to email to reset the
                            password.If you have any issue about reset password <a href="contact.html" class="primary-color-2">contact us</a>
                        </p>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" id="forgotpassword" action="./resetpassword">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Enter email address">
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row form-group">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="captcha">{!! captcha_img() !!}</span>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-light" id="refresh" style="line-height:2.4; background-color:rgba(81, 190, 120, 0.2); height: 58px;"><i class="fas fa-sync-alt"></i></button>
                                            </div>
                                            <div class="col-md-5">
                                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                                @if ($errors->has('captcha'))
                                                    <div class="error">{{ $errors->first('captcha') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            @include('component.alert')
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <div class="form-group">
                                            <button class="theme-btn" type="submit">reset password</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><a href="./login" class="primary-color-2">Login</a></p>
                                    </div>
                                    <div class="col-lg-6">
                                        @if(!in_array('admin', $act))
                                            <p class="text-right register-text">Not a member? <a href="{{ url('/register') }}" class="primary-color-2">Register</a></p>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

$.validator.addMethod("customemail", function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 'The email must be a valid email address.'
);

$("#forgotpassword").validate({
    errorElement: "div",
    rules: {
        email: {
            required: true,
            customemail:true,
        },
        password: {
            required: true,
        },
        captcha: {
            required: true,
        },
    },
    messages: {
        email: {
            required: "The email field is required.",
        },
        password: {
            required: "The password field is required.",
        },
        captcha: {
            required: "The captcha field is required.",
        },
    },
    submitHandler: function (form) {
        form.submit();
    }
});

function mouseoverPass(obj) {
    var obj = document.getElementById('myPassword');
    obj.type = "text";
}
function mouseoutPass(obj) {
    var obj = document.getElementById('myPassword');
    obj.type = "password";
}

// Captcha refresh
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'refreshcaptcha',
     success:function(data){
        $(".captcha").html(data.captcha);
     }
  });
});

</script>

@endsection