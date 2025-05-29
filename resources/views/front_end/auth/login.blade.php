@extends('front_end.layout.main')
@section('content')


<section class="form-section py-7">
    <div class="container">

        <div class="card">
            <div class="card_title">
                <h1>Log In Into Your Account</h1>

                @if(Session::has('error'))
                    <span class="login-error error-msg">{{ Session::get('error') }}</span>
                @endif

            </div>
            <div class="form" >
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <input type="text" name="email" id="email" placeholder="Enter your email" />
                    @error('email')
                        <br>
                        <span class="text-danger" style="color: red;">{{ $message }}</span>
                    @enderror
                    <input type="password" name="password" placeholder="Password" id="Enter your password" />
                    @error('password')
                        <span class="text-danger" style="color: red;">{{ $message }}</span>
                    @enderror

                    <div class="g-recaptcha" data-sitekey={{env('RECAPTCHA_SITE_KEY')}}></div>

                    @error('g-recaptcha-response')
                      <span class="text-danger" style="color:red;">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn">LOG IN</button>
                    <div class="sign-up-cls">
                        <a href="{{route('register')}}">Don't have an account? Sign up</a>
                    </div>
                </form>
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
</script>


@endsection
