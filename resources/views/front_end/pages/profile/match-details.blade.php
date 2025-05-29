@extends('front_end.layout.main')
@section('title', 'Match Details')

@section('content')


<section class="leagues">
    <div class="container">
        <div class="leagues-inner">
            <div class="back-btn">
                <a href="{{route('profile.matches')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            <h2>{{ date('Y') }} - {{ date('Y') + 1 }} Season</h2>

            <div class="player-headr">
                <div class="team-logo">
                    <div class="team_inner">
                        <img src="{{ checkImageExists($matchDetails->home_team_logo) ? $matchDetails->home_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-4">
                        {{-- <span>MA</span> --}}
                    </div>
                    <h6>{{ $matchDetails->home_team_name ?? '' }}</h6>
                </div>
                <div class="match-details">
                    <h6>{{ $matchDetails->venue_name ?? ''}}</h6>
                        <p>{{ $matchDetails->venue_city ?? ''}}</p>
                    <span>{{ date('Y-m-d h:i a', strtotime($matchDetails->fixture_date ?? '')) }}</span>
                </div>
                <div class="team-logo">
                    <div class="team_inner">
                        {{-- <span>UPSL</span> --}}
                        <img src="{{ checkImageExists($matchDetails->away_team_logo) ? $matchDetails->away_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-2">
                    </div>
                    <h6>{{ $matchDetails->away_team_name ?? '' }}</h6>
                </div>
            </div>
            <div class="leagues-inner-content">
                <div class="matches-table scroll-view small-logo">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams[0]->teamDetails ?? [] as $data)
                            <tr>
                                <td class="match-team-logo">
                                    <a href="javascript:void(0)">
                                        <img class="table-img me-2" src="{{checkImageExists($data->player_team_logo) ? $data->player_team_logo : asset('assets/images/default-img.png') }}" alt="">
                                    </a>
                                </td>
                                <td class="player-name">
                                    <p>{{$data->player_name}}</p>
                                </td>
                                <td class="match-position">
                                    <p>{{$data->player_pos}}</p>
                                </td>
                                <td class="match-score">
                                    <h4>0</h4>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <div class="team-btns">
                    <a href="team-info" class="next-btn">next</a>
                </div> --}}
            </div>
        </div>
    </div>
</section>


@endsection

