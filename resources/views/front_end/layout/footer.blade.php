<footer class="draftdayz-footer pt-5">
    <div class="container">

        <div class="footer-wrapper">
            <div class="footer-logo footer-items">
                <a href="{{url('/')}}"> <img src="{{asset('assets/images/logo.png')}}" alt="logo" loading="lazy"></a>
                <div class="social-icons">
                    <div class="fb social-ikons"><a href="#"><img src="{{asset('assets/images/fb.png')}}" class="fb"
                                alt="fb-icon"></a></div>
                    <div class="insta social-ikons"><a href="#"><img src="{{asset('assets/images/insta.png')}}"
                                class="instagram" alt="instagram-icon"></a></div>
                    <div class="twitter social-ikons"><a href="#"><img src="{{asset('assets/images/twitter.png')}}"
                                class="twitter" alt="twitter-icon"></a></div>
                </div>
            </div>

            <div class="footer-links footer-items">
                <h3>Menu Links</h3>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('play-guide') }}">Play Guide</a></li>
                    <li><a href="{{ route('about.us') }}">About Us</a></li>
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-quick-links footer-items">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{route('personal.info')}}">Personal Information Policy</a></li>
                   <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                    <li><a href="{{route('terms.condition')}}">Terms & Conditions</a></li> 
                </ul>
            </div>

        </div>
        <div class="disclaimer">
            <div class="disclaimer-wrapper py-3 text-center">
                <h3>
                    Disclaimer
                </h3>
                <p>
                The content on Draft Wayz is intended for entertainment purposes only. While we strive to provide accurate statistics, player information, and other relevant data from reliable sources, we cannot guarantee their correctness. Engaging in fantasy football carries inherent risks, and users are encouraged to conduct their own research to make informed decisions. By using this website, you acknowledge that Draft Wayz and its affiliates are not liable for any losses or damages that may arise from your participation in fantasy sports or reliance on the information presented. Please play responsibly.
                </p>
            </div>
        </div>
        <div class="ssl-certificate text-center py-3">
            <img src="{{asset('assets/images/ssl.svg')}}" alt="">
        </div>
        <div class="copyright py-3">
            <p>Copyright &copy; 2024 draftwayz.com All Rights Reserved</p>
        </div>
    </div>
</footer>