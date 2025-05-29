<?php
namespace App\Jobs;

use App\Services\ApiFootballService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\PlayerStatistic;
use App\Models\StaticsLogs;
use Illuminate\Support\Facades\DB;
use Log;

class FetchLiveMatchData
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle(ApiFootballService $apiFootballService)
    {
        $liveMatches = $apiFootballService->getLiveMatches();
 
        if(isset($liveMatches['response']) && !empty($liveMatches['response'])){

            foreach($liveMatches['response'] as $match){

                $match_id = $match['fixture']['id'];

                $player_statics = $apiFootballService->getPlayerStatics($match_id);

                if(isset($player_statics['response']) && !empty($player_statics['response'])){


                    foreach($player_statics['response'] as $players){
                       
                        
                        foreach($players['players'] as $player_statics){
                            $player_id = $player_statics['player']['id'];
                            $player_minutes = $player_statics['statistics']['0']['games']['minutes'] ?? 0;
                            $player_assists = $player_statics['statistics']['0']['goals']['assists'] ?? 0;
                            $player_total_goals = $player_statics['statistics']['0']['goals']['total'] ?? 0;
                            $player_saves = $player_statics['statistics']['0']['goals']['saves'] ?? 0;
                            $player_yellow_card = $player_statics['statistics']['0']['cards']['yellow'] ?? 0;
                            $player_red_card = $player_statics['statistics']['0']['cards']['red'] ?? 0;


                            $data = PlayerStatistic::updateOrCreate(
                                [
                                    'match_id' => $match_id,
                                    'player_id' => $player_id
                                ],
                                [
                                    'goals' => $player_total_goals,
                                    'assists' => $player_assists,
                                    'yellow_cards' => $player_yellow_card,
                                    'red_cards' => $player_red_card,
                                    'saves' => $player_saves,
                                    'minutes_played' => $player_minutes,
                                ]
                            );

                           if(isset($data) && !empty($data)){
                              StaticsLogs::create(['status' => '1']);
                           }else{
                              StaticsLogs::create(['status' => '0']);
                           }
                        }
                    }
                }
            }
        }
    }
}
