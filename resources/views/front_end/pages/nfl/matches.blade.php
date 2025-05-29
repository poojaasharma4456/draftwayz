@extends('front_end.layout.main')
@section('title', 'Matches')
@section('content')

<section class="leagues">
    <div class="container">
        <div class="leagues-inner">
            <div class="back-btn">
                <a href="{{ route('leagues') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>

            <h2>{{ date('Y') }} - {{ date('Y') + 1 }} Season</h2>

            <div class="team-view-sec"></div>

            <div class="leagues-inner-content">
                <div class="matches-table scroll-view">
                    <table id="myTable" class="nfl-match">
                        <thead>
                            <tr>
                                <th scope="col">Team</th>
                                <th scope="col">Match Info</th>
                                <th scope="col">Team</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($matches as $key => $match)
                            <tr class="matche-main" data-fixture-id="{{ $match->id }}">
                                <td class="match-team-logo">
                                    <div class="match-team-inner">
                                        <img class="lazy-load" data-src="{{ checkImageExists($match->home_team_logo) ? $match->home_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-3">
                                    </div>
                                    <h6>{{ $match->home_team_name }}</h6>
                                </td>
                                <td>
                                    <span>{{ date('Y-m-d h:i a', strtotime($match->fixture_date)) }}</span>
                                </td>
                                <td class="match-team-logo">
                                    <div class="match-team-inner">
                                        <img class="lazy-load" data-src="{{ checkImageExists($match->away_team_logo) ? $match->away_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-2">
                                    </div>
                                    <h6>{{ $match->away_team_name }}</h6>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        let table = new DataTable('#myTable');

        // Event delegation for dynamically created elements (like match rows)
        $(document).on('click', '.matche-main', function() {
            var matcheId = $(this).data('fixture-id');  // Get match ID
            var url = "{{ route('matche-detail', [':matcheId']) }}";  // Dynamic URL
            url = url.replace(':matcheId', matcheId);  // Replace placeholder
            window.location.href = url;  // Redirect
        });

        // Lazy load images
        function lazyLoading() {
            let lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy-load");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                // Fallback for older browsers
                lazyImages.forEach(function(lazyImage) {
                    lazyImage.src = lazyImage.dataset.src;
                });
            }
        }

        // Trigger lazy loading on table redraw events (pagination, sort, etc.)
        table.on('draw', function() {
            lazyLoading();
        });

        // Initial lazy load
        lazyLoading();
        
        $('.dt-length').css('display','none');
        $('.dt-column-order').css('display','none');
    });
</script>
@endsection
