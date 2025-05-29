@extends('front_end.layout.main')
@section('content')


    <!-- Leagues Section Start -->
    <section class="leagues">
        <div class="container">
            <div class="leagues-inner">
                <div class="back-btn">
                    <a href="{{ route('leagueMatches',['leagueId'=>$matchDetails[0]->league->id]) }}">
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
                            <img src="{{ checkImageExists($matchDetails[0]->home_team_logo) ? $matchDetails[0]->home_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-4">
                            {{-- <span> SHL</span> --}}
                        </div>
                        <h6>{{ $matchDetails[0]->home_team_name ?? '' }}</h6>
                    </div>
                    <div class="match-details">
                        <h6>{{ $matchDetails[0]->venue_name ?? ''}}</h6>
                        <p>{{ $matchDetails[0]->venue_city ?? ''}}</p>
                        <span>{{ date('Y-m-d h:i:A',strtotime($matchDetails[0]->fixture_date ?? '')) }}</span>
                    </div>
                    <div class="team-logo">
                        <div class="team_inner">
                            {{-- <span>CNGZ </span> --}}
                            <img src="{{ checkImageExists($matchDetails[0]->away_team_logo) ? $matchDetails[0]->away_team_logo : asset('assets/images/default-img.png') }}" alt="team-logo-2">
                        </div>
                        <h6>{{ $matchDetails[0]->away_team_name ?? '' }}</h6>
                    </div>
                </div>

                <div class="tab-content-wrapper">
                    <div class="toggle-target">
                        <a href="#" class="tab active" data-toggle-target=".tab-content-1">DT</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-2">WR</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-3">DE</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-4">S</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-5">RB</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-6">LS</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-7">LB</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-8">TE</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-9">FB</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-10">G</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-11">CB</a>
                    </div>

                    <div class="tab-content tab-content-1 active">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['DT'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="DT" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-2">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['WR'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="WR" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-3">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['DE'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="DE" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-4">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['S'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="S" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-5">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['RB'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="RB" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-6">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['LS'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="LS" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-7">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['LB'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="LB" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-8">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['TE'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="TE" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-9">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['FB'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="FB" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-10">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['G'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="G" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-11">
                        <div class="constitutes-inner-content">
                            <div class="matches-table matche-det">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
                                            <th scope="col">Selected By</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Age </th>
                                            <th scope="col">Injured </th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($organizedPlayers['CB'] as $item)

                                        <tr data-team-id="{{$item->player_team_id}}" data-player-id="{{$item->player_id}}" data-player-role="CB" data-player-name="{{$item->name}}" data-team-logo="{{$item->team_logo}}" data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing" data-home-team="{{ $matchDetails[0]->home_team_id }}" data-away-team="{{ $matchDetails[0]->away_team_id }}" data-slug-matchid="{{ $matchDetails[0]->id }}">
                                            {{-- <td></td> --}}
                                            <td class="player-name">
                                                <p>{{$item->name ?? ''}}</p>
                                            </td>
                                            <td class="match-team-logo">
                                                {{-- <a href="premier-league-players"> --}}
                                                    <img class="table-img me-2" src="{{ checkImageExists($item->team_logo) ? $item->team_logo : asset('assets/images/default-img.png') }}" alt="">
                                                {{-- </a> --}}
                                            </td>

                                            <td class="match-position">
                                                <p>{{$item->age ?? ''}}</p>
                                            </td>
                                            <td class="credits_points">
                                                <span>No</span>
                                                <button class="plus player-toggle" data-event="plus">
                                                    <img src="{{asset('assets/images/tab-plus.png')}}" alt="plus" class="tab-plus"> </button>
                                                <button class="minus player-toggle d-none" data-event="minus">
                                                    <img src="{{asset('assets/images/tab-minus.png')}}" alt="minus" class="tab-minus"> </button>
                                            </td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="team-btns">
                                <a href="{{ route('my-team') }}" class="next-btn">next</a>
                            </div>
                        </div>
                    </div>
             

                </div>

            </div>
        </div>

    </section> 
    <!-- Leagues Section End -->

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


@endsection

@section('custom-script')

<script>
    $('.tab').on('click', function (evt) {
        evt.preventDefault();

        // Remove 'active' class from all tabs and add to the clicked tab
        $('.tab').removeClass('active');
        $(this).addClass('active');

        // Get the target content associated with the clicked tab
        var sel = $(this).attr('data-toggle-target');

        // Remove 'active' class from all tab contents and add to the selected one
        $('.tab-content').removeClass('active');
        $(sel).addClass('active');
    });


    $(document).ready(function() {

        var errorModal = document.getElementById("errorModal");
        var closeButton = document.querySelector(".close-button");
        var okButton = document.querySelector(".ok-button");

        function showModal(message) {
            $("#cap-message").html(message);
            errorModal.classList.add("show-modal");
        }

        function hideModal() {
            errorModal.classList.remove("show-modal");
        }

        closeButton.addEventListener("click", hideModal);
        okButton.addEventListener("click", hideModal);

        // Hide modal when clicking outside the modal
        window.addEventListener("click", function(event) {
            if (event.target === errorModal) {
                hideModal();
            }
        });

 
    var myTeam = @json(Session::get('myTeam', []));

    $('.tbody tr').each(function() {
        var row = $(this);
        var leagueId = "{{$matchDetails[0]->league->league_id}}";

        var teamId = row.data('team-id');
        var playerId = row.data('player-id');
        var playerRole = row.data('player-role');
        var playerName = row.data('player-name');

        var playerExists = myTeam.some(function(player) {
        return player.team_id == teamId && player.player_id == playerId && player.player_role == playerRole && player.player_name == playerName && player.league_id == leagueId;
        });

        if (playerExists) {
            row.find('.plus').css('display','none');
            row.find('.minus').css('display','block');
        } else {
            row.find('.plus').css('display','block');
            row.find('.minus').css('display','none');
        }
    });

    $('.next-btn').click(function(e) {
    e.preventDefault();

    var nextBtn = $(this);

    $.get("{{ route('current-team-count') }}", function(data, status) {
        
        if (data.success == true && data.count != 11) {
            // $("#error-message").html('Your team must have exactly 5 players.');
            showModal('Your team must have exactly 11 players');

            // $("#cap-message").html('Your team must have exactly 5 players.');
            // $('#capModal').modal('show');
            return false;

        } else {
            window.location.href = nextBtn.attr('href');
        }
    });
    });

    $(document).on('click', '.player-toggle', function() {

        var team_id = $(this).closest('tr').data('team-id');
        var player_id = $(this).closest('tr').data('player-id');
        var player_role = $(this).closest('tr').data('player-role');
        var leagueId = "{{$matchDetails[0]->league->league_id}}";
        var player_name = $(this).closest('tr').data('player-name');
        var team_logo = $(this).closest('tr').data('team-logo');
        var match_id = $(this).closest('tr').data('match-id');
        var team_name = $(this).closest('tr').data('team-name');
        var homeTeamId = $(this).closest('tr').data('home-team');
        var awayTeamId = $(this).closest('tr').data('away-team');
        var dbMatchId = $(this).closest('tr').data('slug-matchid');

        var button = $(this); // Store reference to the clicked button
        var isPlus = button.hasClass('plus'); // Check if the clicked button is a "plus" button
        var event = $(this).data('event');
        var formData = {
            team_id: team_id,
            player_id: player_id,
            player_role: player_role,
            leagueId: leagueId,
            player_name: player_name,
            event : event,
            team_logo : team_logo,
            match_id:match_id,
            team_name:team_name,
            homeTeamId:homeTeamId,
            awayTeamId:awayTeamId,
            dbMatchId:dbMatchId,
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        url: "{{ route('create-team') }}",
        type: 'POST',
        data: formData,
        success: function(response) {
                if(response.success == true){
                    if (isPlus) {
                        
                    button.css('display','none');
                    button.closest('td').find('.minus').css('display','block');
                    button.parent('td').parent('tr').addClass('select-player');
                    } else {
                    button.css('display','none');
                    button.closest('td').find('.plus').css('display','block');
                    button.parent('td').parent('tr').removeClass('select-player');

                    }
                } else {
                    // $("#error-message").html(response.message);
                    // $("#errorModal2").modal('show');
                    // alert(response.message);
                    showModal(response.message);

                    // $("#cap-message").html(response.message);
                    // $('#capModal').modal('show');
                    return false;
                }
        },
        error: function(xhr, status, error) {
                console.error('Error:', error);
        }
        });
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
