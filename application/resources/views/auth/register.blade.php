@extends('layouts.app')

@section('content')

<section class="sign-up section--padding" style="padding-top: 25px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center">
                        <h3 class="widget-title font-size-25">Register</h3>
                    </div>

                    <!-- Registration Form Starts here -->

                    <form method="post" id="register_form" action="{{ url('/register/store') }}">

                        <div class="card-box-shared-body">
                            <div class="contact-form-action">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-12" id="name">
                                            <div class="input-box">
                                                <label class="label-text">Name<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                                    <span class="la la-user input-icon"></span>
                                                </div>
                                                @if ($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="email" placeholder="Email address" value="{{old('email')}}">
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
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                                    <span class="la la-lock input-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Confirm Password<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password">
                                                    <span class="la la-lock input-icon"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Address<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="address" placeholder="Address" value="{{old('address')}}">
                                                    <i class="fas fa-globe-americas input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                </div>
                                                @if ($errors->has('address'))
                                                    <div class="error">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">City<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="city" placeholder="City" value="{{old('city')}}">
                                                    <i class="fas fa-globe-americas input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                </div>
                                                @if ($errors->has('city'))
                                                    <div class="error">{{ $errors->first('city') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">State<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="state" placeholder="State" value="{{old('state')}}">
                                                    <i class="fas fa-globe-americas input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                </div>
                                                @if ($errors->has('state'))
                                                    <div class="error">{{ $errors->first('state') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Country<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="country" placeholder="Country" value="{{old('country')}}">
                                                    <i class="fas fa-globe-americas input-icon" style="font-size: 14px; color: #bfbfca;"></i>
                                                </div>
                                                @if ($errors->has('country'))
                                                    <div class="error">{{ $errors->first('country') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="chb1" name="termscheckbox">
                                                    <label for="chb1">By register, you agree to our <a href="#">Terms of Use</a> and
                                                        <a href="#">Privacy Policy</a>.
                                                    </label>
                                                    <div class="termscheckbox-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <div class="btn-box">
                                                <button class="theme-btn register_btn" type="submit">Register</button>
                                            </div>
                                        </div>

                                        <!-- Login link -->

                                        <div class="col-lg-12">
                                            <p class="mt-4">Already have an account? <a href="{{ url('/login') }}" class="primary-color-2">Log in</a></p>
                                        </div>
                                        <!-- Login link ends here -->

                                    </div>
                            </div>
                    </form>

                    <!-- Registration Form ends here -->

                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

// Registration Form validation
$.validator.addMethod("customemail", function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 'The email must be a valid email address.'
);

$("#register_form").validate({
    errorElement: "div",
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            customemail:true,
        },
        password: {
            required: true,
            minlength: 8,
        },
        password_confirmation: {
            required: true,
            minlength: 8,
            equalTo : "#password"
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        country: {
            required: true,
        },
        termscheckbox: {
            required: true,
        },
        
    },
    messages: {
        name: {
            required: "Please enter name.",
        },
        email: {
            required: "Please enter email.",
        },
        password: {
            required: "Please enter password.",
        },
        password_confirmation: {
            required: "Please enter confirm password.",
            equalTo: "Please enter same password in both password fields."
        },
        address: {
            required: "Please enter address.",
        },
        city: {
            required: "Please enter city.",
        },
        state: {
            required: "Please enter state.",
        },
        country: {
            required: "Please enter country.",
        },
        termscheckbox: {
            required: "Please accept terms and conditions.",
        },
    },
    submitHandler: function (form) {
        form.submit();
    }
});

// Error alignment for termscheckbox
$('.register_btn').click(function(){
      setTimeout(function() {
            $('#termscheckbox-error').appendTo(".termscheckbox-error");
        }, 25);
   });

</script>

@endsection

