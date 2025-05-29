<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\League;
use App\Models\Matche;
use App\Models\Player;

class ApiNflService
{
    protected $client;
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = env('API_NFL_BASE_URL');
        $this->apiKey = env('API_NFL_API_KEY');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 5.0,
        ]);
    }

    public function get($endpoint, $params = [],$type = "GET")
    {
        try {
            $response = $this->client->request($type, $endpoint, [
                'query' => $params,
                'verify' => false,
                'headers' => [
                    'x-rapidapi-host' => 'v1.american-football.api-sports.io',
                    'x-rapidapi-key' => $this->apiKey,

                ],
            ]);

            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents(), true);
            }

            return ['error' => 'Request failed'];
        }
    }

    public function getCurrentTeamCount()
    {
        $count = 0;
        if(Session::has('myTeam') && is_array(Session::get('myTeam')))
        {
            $team_data = Session::get('myTeam');
            $count = count($team_data);
        }
        return $count ;
    }

    public function getLiveMatches(){
        $matches = $this->get('/fixtures', [
            'live' => 'all',
            'season' => date("Y"),
            //  'last' => 5
        ]);
        return $matches;
     }

     public function getPlayerStatics($matchId){
        $matches = $this->get('/fixtures/players', [
            'fixture' => $matchId,
        ]);
        
        return $matches;
     }


     public function getLeagues()
     {
         $currentYear = date("Y"); 
         $nextYear = $currentYear + 1;

         $leagues = $this->get('/leagues', [
             'season' => $currentYear
             // 'last' => 5
         ]);

         return $leagues;
     }

    public function addBasKetBallData($leagues)
    {
        foreach ($leagues as $league) {
            $league_res = League::updateOrCreate(
                [
                    'league_id' => $league['league']['id'],
                ],
                [
                    'name' => $league['league']['name'] ?? '',
                    'type' => $league['league']['type'] ?? 'League',
                    'logo' => $league['league']['logo'] ?? '',
                    'country_name' => $league['country']['name'] ?? '',
                    'country_code' => $league['country']['code'] ?? '',
                    'country_flag' => $league['country']['flag'] ?? '',
                    'year' => $league['seasons'][0]['year'] ?? '',
                    'start_date' => $league['seasons'][0]['start'] ?? '',
                    'end_date' => $league['seasons'][0]['end'] ?? '',
                ]
            );
    
            if ($league_res) {
                $this->processLeagueMatches($league_res);
            }
        }
    }
    
    private function processLeagueMatches($league)
    {
        $matches = $this->getMatches($league);
    
        if (!empty($matches['response'])) {
            $this->addMatch($matches['response'], $league->id);
        }
    }
    
    private function getMatches($league)
    {
        $currentYear = date("Y"); 
        $nextYear = $currentYear + 1;

        return $this->get('/games', [
            'league' => $league->league_id,
            // 'from' => Carbon::now()->format('Y-m-d'),
            // 'to' => Carbon::now()->addYear(100)->format('Y-m-d'),
            'season' => $currentYear
        ]);
    }
    
    private function addMatch($matches, $league_id)
    {
        foreach ($matches as $match) {
          
            $match_res = Matche::updateOrCreate(
                [
                    'league_id' => $league_id,
                    'fixture_id' => $match['game']['id'] ?? null,
                ],
                [
                    'venue_name' => $match['game']['venue']['name'] ?? null,
                    'venue_city' => $match['game']['venue']['city'] ?? null,
                    'long_status' => $match['game']['status']['long'] ?? null,
                    'short_status' => $match['game']['status']['short'] ?? null,
                    'home_team_id' => $match['teams']['home']['id'] ?? null,
                    'home_team_name' => $match['teams']['home']['name'] ?? null,
                    'home_team_logo' => $match['teams']['home']['logo'] ?? null,
                    'away_team_id' => $match['teams']['away']['id'] ?? null,
                    'away_team_name' => $match['teams']['away']['name'] ?? null,
                    'away_team_logo' => $match['teams']['away']['logo'] ?? null,
                    'fixture_date' => $match['game']['date']['date'] ?? null,
                ]
            );
    
            if ($match_res) {
                $this->addPlayers($match_res);
            }
        }
    }
    
    private function addPlayers($match_res)
    {
        $home_team_logo = $match_res->home_team_logo;
        $away_team_logo = $match_res->away_team_logo;
        $home_team_id = $match_res->home_team_id;

        $teamIds = [$match_res->home_team_id, $match_res->away_team_id];
    
        foreach ($teamIds as $teamId) {

            $playerDetails = $this->getPlayers($teamId);
    
            if (!empty($playerDetails['response'])) {
                $this->savePlayers($playerDetails['response'], $match_res->id, $teamId, $home_team_logo, $away_team_logo,$home_team_id);
            }
        }
    }
    
    private function getPlayers($teamId)
    {
        $currentYear = date("Y"); 
        $nextYear = $currentYear + 1;

        return $this->get('players', [
            'team' => $teamId,
            'season' => $currentYear
        ]);
    }
    
    private function savePlayers($players, $matchId, $teamId, $home_team_logo, $away_team_logo,$home_team_id)
    {
        $teamLogo = ((int)$teamId == $home_team_id) ? $home_team_logo : $away_team_logo;

        foreach ($players as $player) {

            Player::updateOrCreate(
                [
                    'match_id' => $matchId ?? null,
                    'player_id' => $player['id'] ?? null,
                ],
                [
                    'player_team_id' => $teamId ?? null,
                    'name' => $player['name'] ?? null,
                    'age' => $player['age'] ?? null,
                    'position' => $player['position'] ?? null,
                    'injured' => '0',
                    'team_logo' => $teamLogo ?? null,
                ]
            );
        }
    }
}
