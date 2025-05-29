@extends('front_end.layout.main')
@section('content')


<section class="leagues">
    <div class="container">
        <div class="leagues-inner">
            <div class="back-btn">
                <a href="{{ route('matche-detail',['matcheId'=>$myTeam[0]['dbMatchId']]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            
            <h2>{{ date('Y') }} - {{ date('Y') + 1 }} Season</h2>

            <div class="team-view-sec">
                <div class="team-view-header">
                    <h4>Choose Your Captain and Vice Captain</h4>
                    <ul>
                        <li>
                            <span class="c-logo"> C </span>
                            <div class="c-details">
                                <h6>Captain gets</h6>
                                <p>2X (Double Points)</p>
                            </div>
                        </li>
                        <li>
                            <span class="c-logo"> VC </span>
                            <div class="c-details">
                                <h6> Vice Captain gets</h6>
                                <p>1.5X (Double Points)</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="leagues-inner-content">
                <div class="team-view-table scroll-view small-logo">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Points</th>
                                <th scope="col">% C BY</th>
                                <th scope="col">% VC BY</th>

                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach($myTeam as $value)
                                <tr>
                                    <td class="player-dp">
                                        <img src="{{ $value['team_logo'] }}" alt="dp">
                                    </td>
                                    <td>
                                        <h6>{{ $value['player_name'] }}</h6>
                                        {{-- <span>34 pts</span> --}}
                                    </td>
                                    <td>
                                        <span class="c-logo">C</span>
                                        <p class="team_captain" data-league_id = {{ $value['league_id'] }} data-match_id = {{ $value['match_id'] }} data-team_id = {{ $value['team_id'] }} data-player_id = {{ $value['player_id'] }} data-already_captain = {{ $value['already_captain'] ?? '' }}>
                                            <button class="plus player-toggle captain-plus team-view-cls" data-event="cap_plus">
                                               {{-- <i class="fa fa-plus" aria-hidden="true"></i> --}}
                                               <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                            </button>
                                            <button class="minus player-toggle d-none captain-minus team-view-cls" data-event="cap_minus">
                                               {{-- <i class="fa fa-minus" aria-hidden="true"></i> --}}
                                               <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </button>
                                        </p>
                                    </td>
                                    <td>
                                        <span class="c-logo">VC</span>
                                        {{-- <p>0.37%</p> --}}

                                        <p class="team_captain team_vice_captain" data-league_id = {{ $value['league_id'] }} data-match_id = {{ $value['match_id'] }} data-team_id = {{ $value['team_id'] }} data-player_id = {{ $value['player_id'] }}>
                                            <button class="plus player-toggle vice-cap-plus team-view-cls" data-event="vice_plus">
                                                <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                            </button>
                                            <button class="minus player-toggle d-none vice-cap-minus team-view-cls" data-event="vice_minus">
                                                <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="team-btns">
                    <a href="#" id="save-team-btn" class="next-btn">Save</a>
                </div>
            </div>
        </div>
    </div>
</section>


 <div id="errorModal" class="modal">
    <div class="modal-content">
        <div class="modal-image">
            <img src="{{asset('assets/images/cancel.png')}}" alt="error">
        </div>
        <span class="close-button"><img src="{{asset('assets/images/modal-close.png')}}" alt="" class="tab-close"></span>
        <p id="cap-message"></p>
        <div class="ok-btn">
            <button class="ok-button">OK</button>
        </div>
    </div>
</div>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <div class="modal-image">
            <img src="{{asset('assets/images/cancel.png')}}" alt="error">
        </div>
        <span class="close-button"><img src="{{asset('assets/images/modal-close.png')}}" alt="" class="tab-close"></span>
        <p id="login-message"></p>
        <div class="ok-btn">
            {{-- <button class="ok-button">OK</button> --}}
            <button class="ok-button" type="button" id="login-click">Login</button>
        </div>
    </div>
</div>


@endsection

@section('custom-script')

<script>
   $(document).ready(function(){

    var errorModal = document.getElementById("errorModal");
    var loginModal = document.getElementById("loginModal");

    // Function to show the error modal and set the message
    function showModal(message) {
        $("#cap-message").html(message);
        errorModal.classList.add("show-modal");
    }

    // Function to show the login modal and set the message
    function showLoginModal(message) {
        $("#login-message").html(message);
        loginModal.classList.add("show-modal");
    }

    // Function to hide the modals
    function hideModal(modal) {
        modal.classList.remove("show-modal");
    }

    // Hide modal when the close button or ok button is clicked
    $('.close-button').on('click', function() {
        var modal = $(this).closest('.modal')[0];  // Get the closest modal
        hideModal(modal);
    });

    $('.ok-button').on('click', function() {
        var modal = $(this).closest('.modal')[0];  // Get the closest modal
        hideModal(modal);
    });

    // Hide login modal when login button is clicked
    $('#login-click').on('click', function() {
        window.location.href = "{{ route('login') }}";
    });

    // Hide modal when clicking outside the modal
    window.addEventListener("click", function(event) {
        if (event.target === errorModal) {
            hideModal(errorModal);
        }
        if (event.target === loginModal) {
            hideModal(loginModal);
        }
    });



     @if(Session::has('success'))
       var flashMessage = "<?= Session::get('success') ?>";
       $("#success-message").html(flashMessage)
       $("#successModal").modal('show');
     @endif

     var myTeam = @json($myTeam);

     $('.tbody tr').each(function() {
        var row = $(this);
        // Retrieve data attributes from the row
        var leagueId = row.find('.team_captain').data('league_id');
        var matchId = row.find('.team_captain').data('match_id');
        var teamId = row.find('.team_captain').data('team_id');
        var playerId = row.find('.team_captain').data('player_id');

        // Check for captain status
        var isCaptain = myTeam.some(function(player) {
            return player.league_id == leagueId &&
                   player.match_id == matchId &&
                   player.team_id == teamId &&
                   player.player_id == playerId &&
                   player.is_captain == '1';
        });

        // Check for vice-captain status
        var isViceCaptain = myTeam.some(function(player) {
            return player.league_id == leagueId &&
                   player.match_id == matchId &&
                   player.team_id == teamId &&
                   player.player_id == playerId &&
                   player.is_vice_captain == '1';
        });

        // Show or hide buttons based on the player status
        if (isCaptain) {
            row.find('.team_captain .plus').css('display','none');
            row.find('.team_captain .minus').css('display','block');
        } else {
            row.find('.team_captain .plus').css('display','block');
            row.find('.team_captain .minus').css('display','none');
        }

        if (isViceCaptain) {
            row.find('.team_vice_captain .plus').css('display','none');
            row.find('.team_vice_captain .minus').css('display','block');
        } else {
            row.find('.team_vice_captain .plus').css('display','block');
            row.find('.team_vice_captain .minus').css('display','none');
        }
    });

    $('#login-click').on('click',function(){
      window.location.href = "{{ route('login') }}";
    })

     $('#save-team-btn').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('auth.check') }}",
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {

             if(data.captain != true){
                  var flashMessage = "Please select a captain.";
                //   alert(flashMessage);
                 showModal(flashMessage); 
                //   $("#cap-message").html(flashMessage);
                //   $('#errorModal').css('display', 'block'); // Show modal
                  return false;
             }else if(data.vice_captain != true){
                  var flashMessage = "Please select a vice captain.";
                  console.log('c');
                  showModal(flashMessage); 
                //   alert(flashMessage);
                //   $("#cap-message").html(flashMessage);
                //   $('#errorModal').css('display', 'block'); // Show modal
                  return false;
             }else if(data.error == false){
                  console.log(data.error);
                  console.log('w');
                  var flashMessage = "You need to log in before making a team.";
                  showLoginModal(flashMessage);

                //   $("#login-message").html(flashMessage);
                //   $('#loginModal').removeClass('d-none');
             }else{
               window.location.href = "{{ route('save-team') }}";
             }
            }
        });
    });

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $(document).on('click', '.player-toggle', function() {
         var button = $(this);

         var league_id = button.closest('p').data('league_id');
         var match_id = button.closest('p').data('match_id');
         var team_id = button.closest('p').data('team_id');
         var player_id = button.closest('p').data('player_id');

         if (button.hasClass('captain-plus')) {

            var visibleMinusCount = $('.captain-minus').filter(function() {
                return $(this).css('display') !== 'none';
            }).length;

            if (visibleMinusCount >= 1) {
               var flashMessage = "Captain already selected.";
               showModal(flashMessage); 
            //    $("#cap-message").html(flashMessage);
            //    $('#capModal').removeClass('d-none')
               return false;
            }
         }

         if (button.hasClass('vice-cap-plus')) {
            // var visibleMinusCount = $('.vice-cap-minus').not('.d-none').length;

            var visibleMinusCount = $('.vice-cap-minus').filter(function() {
                return $(this).css('display') !== 'none';
            }).length;

            if (visibleMinusCount >= 1) {
               var flashMessage = "Vice Captain already selected.";
               showModal(flashMessage); 
            //    $("#cap-message").html(flashMessage);
            //    $('#capModal').modal('show')
               return false;
            }
         }

         var event = $(this).data('event');

         var formData = {
            event : event,
            league_id : league_id,
            match_id : match_id,
            team_id : team_id,
            player_id : player_id,
         };

         $.ajax({
            url: "{{ route('make.captain') }}",
            type: 'POST',
            data: formData,
            success: function(response) {

               if(event == 'cap_plus'){

                  button.css('display','none');
                  button.closest('td').find('.minus').css('display','block');

               }else if(event == 'cap_minus'){

                  button.css('display','none');
                  button.closest('td').find('.plus').css('display','block');

               }

               if(event == 'vice_plus'){

                 button.css('display','none');
                 button.closest('td').find('.minus').css('display','block');

               }else if(event == 'vice_minus'){

                  button.css('display','none');
                  button.closest('td').find('.plus').css('display','block');

               }
            },
            error: function(xhr, status, error) {
                  console.error('Error:', error);
            }
         });
      });

      $('#cap-ok').on('click', function() {
         $('#capModal').modal('hide');
      });

   });
</script>

<script>

// Log In Button
document.querySelector('#login-click').addEventListener('click', function() {
    document.querySelector('.log-in-model').classList.add('model-open');
});

// Close Button and Overlay for both Sign Up and Log In
document.querySelectorAll('.close-btn, .bg-overlay').forEach(function(element) {
    element.addEventListener('click', function() {
        document.querySelectorAll('.custom-model-main').forEach(function(modal) {
            modal.classList.remove('model-open');
        });
    });
});

</script>


@endsection

