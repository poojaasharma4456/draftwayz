@extends('front_end.layout.main')
@section('content')

<section class="form-section py-7">
    <div class="container">

        <div class="card">
            <div class="card_title">
                <h1>Create Account</h1>
                
            </div>
            <div class="form diff-form">

                @if(Session::has('success'))
                    <span class="register-success">{{ Session::get('success') }}</span>
                @endif
                
                <form action="{{ route('register.post') }}" method="POST" id="signupForm">
                    @csrf
                    <input type="text" name="first_name" id="firstName" placeholder="Enter first name here" value="{{ old('first_name') }}" />

                    @error('first_name')
                        <br>
                        <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <input type="text"  name="last_name" id="lastName" placeholder="Enter last name here" value="{{ old('last_name') }}" />

                    @error('last_name')
                      <br>
                      <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email here" />

                    @error('email')
                     <br>
                     <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <input type="number" name="phone" id="phoneNumber" placeholder="Enter phone number here" value="{{ old('phone') }}" />

                    @error('phone')
                     <br>
                     <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <input type="password" name="password" id="password" placeholder="Enter password here" />

                    @error('password')
                    <br>
                    <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <input type="password" name="password_confirmation" id="confirmPassword" placeholder=" Password confirmation" />

                    <div class="g-recaptcha" data-sitekey={{env('RECAPTCHA_SITE_KEY')}}></div>

                    @error('g-recaptcha-response')
                      <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <button class="btn" type="submit">SIGN UP</button>
                    <div class="sign-up-cls">
                        <a href="{{route('login')}}">Already have an account? Login</a>
                    </div>
                </form>
                {{-- <div id="errorMessages" style="color: red;"></div> --}}
            </div>
        </div>

    </div>
</section>

@endsection

@section('custom-script')

<script>
    $(document).ready(function () {
        var response = 'You have to complete the CAPTCHA.';
        @if($errors->has('g-recaptcha-response'))
            $('#captchaModal').modal('show');
            $('#cap-message').text(response);
        @endif
    });

    $(document).ready(function() {
        $('#phoneNumber').on('input', function() {
            var value = $(this).val();
            if (value < 0) {
                $(this).val('');
            }
        });
    });

</script>


@endsection
