@extends('layouts.app')

@section('content')

<section class="recover-area section--padding" style="padding-top: 50px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-25 pb-2">Set Password</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" id="changepassword" action="{{ url('/setpassword') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Enter email address" value="{{ $user->email }}" readonly>
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                              @if ($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                                                <span class="la la-lock input-icon"></span>
                                            </div>
                                              @if ($errors->has('password'))
                                                <div class="error">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Confirm Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                                                <span class="la la-lock input-icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            @include('component.alert')
                                        </div>
                                    </div>
                                    <input class="form-control" type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <div class="form-group">
                                            <button class="theme-btn" type="submit">Save</button>
                                        </div>
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

$("#setpassword").validate({
    errorElement: "div",
    rules: {
        password: {
            required: true,
        },
        password_confirmation: {
            required: true,
            minlength: 8,
            equalTo : "#password"
        },
    },
    messages: {
        password: {
            required: "The password field is required.",
        },
        password_confirmation: {
            required: "The confirm password field is required.",
            equalTo: "Confirm password must be same as password.",
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
</script>

@endsection