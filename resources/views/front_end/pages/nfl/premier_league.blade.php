@extends('front_end.layout.main')
@section('title', 'Leagues')

@section('content')

<section class="leagues">
    <div class="container">
        <div class="leagues-inner">

            <h2>{{ date('Y') }} - {{ date('Y') + 1 }} Season</h2>

            <div class="team-view-sec">

            </div>
            <div class="leagues-inner-content">
                <div class="leagues-table scroll-view small-logo">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">League</th>
                                <th scope="col">Type</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leagues as $key => $league)
                            <tr>
                                <td class="league-logo">
                                    <img class="lazy-load" data-src="{{ checkImageExists($league->logo) ? $league->logo : asset('assets/images/default-img.png') }}" alt="league-logo">
                                    <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                                </td>
                                <td>
                                    <h6>{{ $league->name }}</h6>
                                    <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                                </td>
                                <td>
                                    <p>{{ $league->type }}</p>
                                    <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                                </td>
                                <td>
                                    <p>{{ $league->start_date }}</p>
                                    <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                                </td>
                                <td>
                                    <p>{{ $league->end_date }}</p>
                                    <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
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

<div id="successModal" class="modal">
    <div class="modal-content">
        <div class="modal-image">
            <img src="{{asset('assets/images/checked.png')}}" alt="error">
        </div>
        <span class="close-button"><img src="{{asset('assets/images/modal-close.png')}}" alt="" class="tab-close"></span>
        <p id="cap-message"></p>
        <div class="ok-btn">
            <button class="ok-button">OK</button>
        </div>
    </div>
</div>

@endsection

@section('custom-script')

<script>

    $(document).ready(function() {

        var successModal = document.getElementById("successModal");

        var closeButton = document.querySelector(".close-button");
        var okButton = document.querySelector(".ok-button");

        function showModal(message) {
            $("#cap-message").html(message);
            successModal.classList.add("show-modal");
        }
       
        function hideModal() {
            successModal.classList.remove("show-modal");
        }

        closeButton.addEventListener("click", hideModal);
        okButton.addEventListener("click", hideModal);

        window.addEventListener("click", function(event) {
            if (event.target === successModal) {
                hideModal();
            }
        });

        @if(session('success'))
            showModal('{{ session('success') }}');
        @endif

        let table = new DataTable('#myTable');

        lazyLoading(); // Initialize lazy loading on document ready

        $(document).on('click', '.dt-paging-button', function() {
            lazyLoading();
        });

        $('.dt-input').on('keyup change', function () {
            lazyLoading();
        });
    });

    function lazyLoading() {
        let lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));

        if ("IntersectionObserver" in window) {
            let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;  // Load image source
                        lazyImage.classList.remove("lazy-load");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);  // Observe each lazy image
            });
        } else {
            // Fallback for older browsers
            lazyImages.forEach(function(lazyImage) {
                lazyImage.src = lazyImage.dataset.src;  // Directly load for older browsers
            });
        }

        $('.dt-length').css('display','none');
        $('.dt-column-order').css('display','none');
    }
</script>
@endsection
