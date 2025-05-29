@extends('front_end.layout.main')
@section('title', 'Home')
@section('content')

    <!-- Banner Section Start -->
    <section class="home-banner">
        <div class="banner-wrapper">
            <div class="banner-text" data-aos="fade-right" data-aos-duration="1000">
                <h1>
                    FANTASY FOOTBALL 
                    THE RIGHT WAY
                </h1>
            </div>
           
                <div class="banner-butns" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{route('leagues')}}" class="banner-btn btn">Play Now</a>
                    {{-- <a href="{{route('login')}}" class="banner-btn btn">LOG IN</a> --}}
                </div>
       
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Website Info Section Start -->
    <div class="website-info-section">
        <div class="container">
            <div class="website-info-wrapper">
                <div class="website-info-text" data-aos="fade-right" data-aos-duration="1000">
                    <p style="text-transform: uppercase;">
                    Draft Wayz is your ultimate platform for fantasy football! Experience the excitement of building your perfect fantasy football team with our user-friendly drafting tools. Connect with other fantasy football fans, manage your league effortlessly, and track player performance in real-time. Whether you're a seasoned fantasy football veteran or just getting started, Draft Wayz offers the tools and community to take your fantasy football experience to the next level.
                    </p>
                </div>
                <div class="website-info-image" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/card1-image.jpg') }}" alt="Premier Platform">
                </div>
            </div>
        </div>
    </div>
    <!-- Website Info Section End -->

    <!-- Why Us Section Start -->
    <div class="why-us-section">
        <div class="container">
            <div class="website-info-wrapper">
                <div class="website-info-image" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/card2-image.jpg') }}" alt="User-Friendly Interface">
                </div>
                <div class="website-info-text" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section-heading">
                    Draft Wayz
                    </h2>
                    <div class="website-info-text-wrapper">
                        <h3>
                        Easy-to-Use Interface
                        </h3>
                        <p>
                        Enjoy a smooth and intuitive design that makes drafting and strategizing simple, whether you're a beginner or an experienced player.
                        </p>
                        <h3>
                        Complete League Management
                        </h3>
                        <p>
                        Set up and customize your league with personalized scoring, draft styles, and real-time stats with ease.
                        </p>
                        <h3>
                        Engaged Community

                        </h3>
                        <p>
                        Connect with fellow fantasy football fans, share insights, and access exclusive content to gain a competitive edge.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Us Section End-->

    <!-- Featured Cards Section Start -->
    <section class="featured-cards-section pt-10">
        <div class="container">
            <div class="featured-cards-wrapper">

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/home-card1-image.webp') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        Interactive Draft Experience
                        </h3>
                        <p>
                        Participate in live, real-time drafts with interactive features such as player tracking, instant trade options, and customizable draft boards to elevate your experience.

                        </p>
                    </div>
                </div>

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/insights.webp') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        In-Depth Insights

                        </h3>
                        <p>
                        Gain access to detailed player stats, injury updates, and performance trends to make informed decisions during drafts and all season long.
                        </p>
                    </div>
                </div>

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/scoring-sytem.jpg') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        Flexible Scoring Systems

                        </h3>
                        <p>
                        Customize your league's scoring rules to match your preferences, whether you favor standard, PPR, or unique scoring formats, ensuring a personalized gameplay experience.

                        </p>
                    </div>
                </div>

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/cross-browser.jpg') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        Cross-Platform Access

                        </h3>
                        <p>
                        Enjoy seamless access to Draft Wayz across all devices, including desktops, tablets, and smartphones, allowing you to manage your team anytime, anywhere.

                        </p>
                    </div>
                </div>

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/expert-resources.jpg') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        Expert Tools and Resources

                        </h3>
                        <p>
                        Gain exclusive access to articles, podcasts, and expert analysis, providing valuable insights and strategies to help you excel in your league.

                        </p>
                    </div>
                </div>

                <div class="featured-cards" data-aos="fade-up" data-aos-duration="1000">
                    <div class="featured-cards-image">
                        <img src="{{ asset('assets/images/social.jpg') }}" alt="card-image">
                    </div>
                    <div class="featured-cards-content text-center">
                        <h3>
                        Social Features and Challenges

                        </h3>
                        <p>
                        Connect with friends and fellow players through social features, join leagues or challenges, and compete for prizes and bragging rights in an exciting and interactive environment.

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Featured Cards Section End -->

@endsection

@section('custom-script')
<script>

$(document).ready(function(){
    @if(Session::has('error'))
      var flashMessage = "<?= Session::get('error') ?>";
      $("#error-message").html(flashMessage)
      $("#errorModal").modal('show');
    @endif
})

</script>
@endsection

