@extends('front_end.layout.main')
@section('title', 'My Matches')

@section('content')

<section class="leagues">
    <div class="container">


        <div class="leagues-inner">
            <h2>My Matches </h2>

            <!-- Content -->
            <div class="leagues-inner-content">
                <div class="matches-table scroll-view">
                    <table id="myTable" class="my-team-list">
                        <thead>
                            <tr>
                                <th scope="col">Team</th>
                                <th scope="col">Match Info</th>
                                <th scope="col">Team</th>
                                <th scope="col">Score </th>
                                <th scope="col">Status </th>

                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($matches as $match)    
                        
                            <tr class="matche-main" data-fixture-id="{{ $match->fixture_id ?? ''}}" data-league-id="{{ $match->league->league_id ?? ''}}">
                                <td class="match-team-logo">
                                    <a href="javascript:void(0)">
                                        <img class="table-img me-2" src="{{ checkImageExists($match->home_team_logo) ? $match->home_team_logo : asset('assets/images/default-img.png') }}" alt="">
                                        <h6>{{ $match->home_team_name ?? '' }}</h6>
                                    </a>
                                </td>
                                <td>
                                    <span>{{ date('Y-m-d h:i a', strtotime($match->fixture_date ?? '')) }}</span>
                                </td>
                                <td class="match-team-logo">
                                    <img src="{{checkImageExists($match->away_team_logo) ? $match->away_team_logo : asset('assets/images/default-img.png') }}" alt="Chelmsford City logo">
                                    <h6>{{ $match->away_team_name ?? '' }}</h6>
                                </td>
                                <td class="match-score">
                                    <h4>0</h4>
                                </td>
                                <td class="match-status">
                                    <p class="win">-- </p>

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

<script>

    $('#myTable').DataTable({
        "order": false
    });

    $('.dt-length').css('display','none');
    $('.dt-column-order').css('display','none');

</script>

<script>
   $(".matche-main").on('click', function() {
    var fixtureId = $(this).data('fixture-id');
    var leagueId = $(this).data('league-id');
    var url = "{{ route('profile.match-detail', [':leagueId', ':fixtureId']) }}";
    url = url.replace(':fixtureId', fixtureId).replace(':leagueId', leagueId);
    window.location.href = url;
  });
</script>

<script>
    // $(document).ready({
    //     $('.dt-length').css('display','none');
    //     $('.dt-column-order').css('display','none');
    // })
</script>

@endsection
