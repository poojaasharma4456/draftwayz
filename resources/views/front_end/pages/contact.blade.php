@extends('front_end.layout.main')
@section('title', 'Contact Us')
@section('content')


<section class="header-pages-content-section py-5 text-center">
    <div class="container">
        <div class="header-pages-content-wrapper">

            <div class="pages-group">
                <h2 class="section-heading pb-3">
                    Contact Us
                </h2>
                <p>
                We’re here to assist you with any questions, concerns, or feedback. Whether you need help with your account, have a technical issue, or simply want to share your thoughts, our team at Draft Wayz is ready to support you. Please reach out to us using the contact form below, and we’ll get back to you as soon as possible.

                </p>
                <div class="contact-group ">
                    <div class="contact-left">
                        <div class="contact-icon-image">
                            <img src="{{asset('assets/images/contact-icon1.jpg')}}" alt="icon">
                        </div>
                        <h3>
                        Customer Support

                        </h3>
                        <p>
                        For issues or inquiries related to your account or the platform functionality, please fill out the form below, and our support team will assist you promptly.

                        <!-- <p>
                            <a href="mailto:info@draftdayz.com">info@draftdayz.com</a>
                        </p>                         -->
                    </div>
                    <div class="contact-right">
                        <div class="contact-icon-image">
                            <img src="{{asset('assets/images/contact-icon2.jpg')}}" alt="icon">
                        </div>
                        <h3>
                        General Inquiries & Feedback
                        </h3>
                        <p>
                        Have a question or suggestion? We'd love to hear from you! Whether it’s about partnerships, media inquiries, or feedback on your fantasy football experience, we’re all ears.

                        </p>
                        <!-- <p>
                            <a href="mailto:info@draftdayz.com">info@draftdayz.com</a>
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="pages-group-form">
                <div class="form-container">
                    <div class="form-image">
                        <img src="{{asset('assets/images/contact-image.jpg')}}" alt="image">
                    </div>

                    <div class="form-wrapper">
                        @if(Session::has('success'))
                            <span class="contact-success text-center" style="width:100%;">{{ Session::get('success') }}</span>
                        @endif

                        <form class="contact-form" action="{{ route('contact.save') }}" method="post" id="contactForm">
                            @csrf
                            <div class="formbold-mb-5">
                                <input type="text" name="full_name" id="full_name" placeholder="Your Name" class="formbold-form-input" value="{{ old('full_name') }}">
                                <p class="remove-text d-none contact-error" id="nameError"></p>
                                {{-- <span class="error-message" id="name-error">Name field is refdsf</span> --}}
                            </div>
                            <div class="formbold-mb-5">
                                <input type="email"  name="email" id="email" value="{{ old('email') }}" placeholder="Your Email Address"
                                    class="formbold-form-input">
                                <p class="remove-text d-none contact-error" id="emailError"></p>
                                {{-- <span class="error-message" id="email-error"></span> --}}
                            </div>
                            <div class="formbold-mb-5">
                                <input type="text" name="subject" id="subject" placeholder="Select from options or write custom" class="formbold-form-input" >
                                <p class="remove-text d-none contact-error" id="nameError"></p>
                             
                            </div>
                            <div class="formbold-mb-5">
                                <textarea rows="6" name="message" id="message-text-area" placeholder="Your Message..."
                                    class="formbold-form-input">{{ old('message') }}</textarea>
                                {{-- <span class="error-message" id="message-error"></span> --}}
                                <p class="remove-text d-none contact-error" id="messageError"></p>
                            </div>

                            <div class="formbold-mb-5">
                                <div class="g-recaptcha" data-sitekey={{env('RECAPTCHA_SITE_KEY')}}></div>
                                <p class="remove-text d-none contact-error" id="captchaError"></p>
                            </div>

                            <div>
                                <button type="button" class="formbold-btn contact-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="pages-group">
                <h2 class="section-heading pb-3">
                 Follow Us

                </h2>
                <p>
                Stay connected and keep up with the latest news, updates, and promotions from Draft Wayz:

                </p>
                <div class="social-icons">

                    <div class="twitter social-ikons"><a href="#"><img src="{{asset('assets/images/twitter.png')}}"
                                class="twitter" alt="twitter-icon"></a></div>
                                <div class="fb social-ikons"><a href="#"><img src="{{asset('assets/images/fb.png')}}" class="fb"
                                alt="fb-icon"></a></div>
                    <div class="insta social-ikons"><a href="#"><img src="{{asset('assets/images/insta.png')}}"
                                class="instagram" alt="instagram-icon"></a></div>
                 
                </div>
            </div>

            <div class="pages-group">
                <!-- <h2 class="section-heading pb-3">
                    Business Inquiries
                </h2> -->
                <p>
                Draft Wayz is committed to providing top-notch customer support and continuously improving your fantasy football experience. We’re always here to help—just send us a message!

                </p>
                <!-- <p>
                    <a href="mailto:business@draftdayz.com">business@draftdayz.com</a>
                </p> -->
            </div>

         

        </div>
    </div>
</section>
  


@endsection

@section('custom-script')

<script>
    $(document).ready(function () {

        $('.contact-btn').on('click', function() {
            var valid = true;

            $('.remove-text').css('display','none').css('font-size','15px');

            if ($('#full_name').val().trim() === '') {
                $('#nameError').css('display','block').text('Full name field is required.');
                valid = false;
            }

            var email = $('#email').val().trim();
            
            if($('#email').val().trim() === ''){
                $('#emailError').css('display','block').text('Email field is required.');
                valid = false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($('#email').val().trim() != '' && !emailPattern.test(email)) {
                $('#emailError').css('display','block').text('Please enter a valid email address.');
                valid = false;
            }

            if ($('#message-text-area').val().trim() === '') {
                $('#messageError').css('display','block').text('Message field is required.');
                valid = false;
            }


            if (grecaptcha.getResponse() == '') {
                $('#captchaError').css('display','block').text('You must complete the CAPTCHA.');
                valid = false;
            }

            // if (!$('#agree').is(':checked')) {
            //     $('#agreeError').removeClass('d-none').text('You must agree to the terms.');
            //     valid = false;
            // }

            if (valid) {
                $('#contactForm').submit();
            }
        });





    });
</script>


@endsection
