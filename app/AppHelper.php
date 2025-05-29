<?php

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Services\ApiFootballService;
use App\Models\PlayerStatistic;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Facades\Http;


function LeagueTeamPlayerValidation($team_id, $player_id, $player_role, $leagueId, $player_name)
{

    $roleLimits = [
        'DT' => ['min' => 1, 'max' => 1],  // Defensive Tackle
        'WR' => ['min' => 2, 'max' => 3],  // Wide Receiver
        'DE' => ['min' => 1, 'max' => 1],  // Defensive End
        'S'  => ['min' => 1, 'max' => 1],  // Safety
        'RB' => ['min' => 1, 'max' => 1],  // Running Back
        'LS' => ['min' => 0, 'max' => 1],  // Long Snapper (optional)
        'LB' => ['min' => 1, 'max' => 2],  // Linebacker
        'TE' => ['min' => 1, 'max' => 1],  // Tight End
        'FB' => ['min' => 0, 'max' => 1],  // Fullback (optional)
        'G'  => ['min' => 1, 'max' => 1],  // Guard
        'CB' => ['min' => 1, 'max' => 2],  // Cornerback
    ];

    if (!isset($team_id, $player_id, $player_role, $leagueId, $player_name)) {
        return ['success' => false, 'message' => 'Cannot add player.'];
    }

    $myTeam = Session::get('myTeam', []);

    $roleCounts = [
        'DT' => 0,  // Defensive Tackle
        'WR' => 0,  // Wide Receiver
        'DE' => 0,  // Defensive End
        'S'  => 0,  // Safety
        'RB' => 0,  // Running Back
        'LS' => 0,  // Long Snapper (optional)
        'LB' => 0,  // Linebacker
        'TE' => 0,  // Tight End
        'FB' => 0,  // Fullback (optional)
        'G'  => 0,  // Guard
        'CB' => 0,  // Cornerback
    ];

    foreach ($myTeam as $player) {
        if (isset($player['player_role'])) {
            $roleCounts[$player['player_role']]++;
        }
    }

    $totalPlayers = array_sum($roleCounts);

    // Check if adding this player would exceed 11 players
    if ($totalPlayers >= 11) {
        return ['success' => false, 'message' => 'Team can not exceed 11 players.'];
    }

    $response = ['success' => true, 'message' => 'Player added successfully'];

    switch ($player_role) {
        case 'DT':
            // if ($roleCounts['F'] >= $roleLimits['F']) {
            //     $response = ['success' => false, 'message' => 'You can add only one forword player.'];
            // }
            // break;
            if ($roleCounts['DT'] >= $roleLimits['DT']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['DT']['min'] . ' and ' . $roleLimits['DT']['max'] . ' DT player.'];
            }
            break;

        case 'WR':
            if ($roleCounts['WR'] >= $roleLimits['WR']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['WR']['min'] . ' and ' . $roleLimits['WR']['max'] . ' WR player.'];
            }
            break;

        case 'DE':
            if ($roleCounts['DE'] >= $roleLimits['DE']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['DE']['min'] . ' and ' . $roleLimits['DE']['max'] . ' DE player.'];
            }
            break;

        case 'S':
            if ($roleCounts['S'] >= $roleLimits['S']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['S']['min'] . ' and ' . $roleLimits['S']['max'] . ' S player.'];
            }
            break;

        case 'RB':
            if ($roleCounts['RB'] >= $roleLimits['RB']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['RB']['min'] . ' and ' . $roleLimits['RB']['max'] . ' RB player.'];
            }
            break;    

        case 'LS':
            if ($roleCounts['LS'] >= $roleLimits['LS']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['LS']['min'] . ' and ' . $roleLimits['LS']['max'] . ' LS player.'];
            }
            break;     
            
        case 'LB':
            if ($roleCounts['LB'] >= $roleLimits['LB']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['LB']['min'] . ' and ' . $roleLimits['LB']['max'] . ' LB player.'];
            }
            break;  
            
        case 'TE':
            if ($roleCounts['TE'] >= $roleLimits['TE']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['TE']['min'] . ' and ' . $roleLimits['TE']['max'] . ' TE player.'];
            }
            break; 
            
        case 'FB':
            if ($roleCounts['FB'] >= $roleLimits['FB']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['FB']['min'] . ' and ' . $roleLimits['FB']['max'] . ' FB player.'];
            }
            break;  
            
        case 'G':
            if ($roleCounts['G'] >= $roleLimits['G']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['G']['min'] . ' and ' . $roleLimits['G']['max'] . ' G player.'];
            }
            break;  
            
        case 'CB':
            if ($roleCounts['CB'] >= $roleLimits['CB']['max']) {
                $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['CB']['min'] . ' and ' . $roleLimits['CB']['max'] . ' CB player.'];
            }
            break;      

        // case 'F':
        //     if ($roleCounts['F'] >= $roleLimits['F']['max']) {
        //         $response = ['success' => false, 'message' => 'You can add only between ' . $roleLimits['F']['min'] . ' and ' . $roleLimits['F']['max'] . ' strikers.'];
        //     }
        //     break;

        default:
            $response = ['success' => false, 'message' => 'Invalid player role.'];
    }

    // $totalPlayers = array_sum($roleCounts) + 1;
    // dd($totalPlayers);
    // if ($totalPlayers > 5) {
    //     $response = ['success' => false, 'message' => 'Total players must be exactly 11.'];
    // }

    return $response;
}

// function LeagueTeamPlayerValidation($team_id, $player_id, $player_role, $leagueId, $player_name)
// {
//     // Define role limits based on your provided positions
//     $roleLimits = [
//         'DT' => ['min' => 1, 'max' => 1],  // Defensive Tackle
//         'WR' => ['min' => 2, 'max' => 3],  // Wide Receiver
//         'DE' => ['min' => 1, 'max' => 1],  // Defensive End
//         'S'  => ['min' => 1, 'max' => 1],  // Safety
//         'RB' => ['min' => 1, 'max' => 1],  // Running Back
//         'LS' => ['min' => 0, 'max' => 1],  // Long Snapper (optional)
//         'LB' => ['min' => 1, 'max' => 2],  // Linebacker
//         'TE' => ['min' => 1, 'max' => 1],  // Tight End
//         'FB' => ['min' => 0, 'max' => 1],  // Fullback (optional)
//         'G'  => ['min' => 1, 'max' => 1],  // Guard
//         'CB' => ['min' => 1, 'max' => 2],  // Cornerback
//     ];

//     if (!isset($team_id, $player_id, $player_role, $leagueId, $player_name)) {
//         return ['success' => false, 'message' => 'Cannot add player.'];
//     }

//     // Get the current team from the session
//     $myTeam = Session::get('myTeam', []);

//     // Initialize role count
//     $roleCounts = array_fill_keys(array_keys($roleLimits), 0);

//     // Count the current number of players per role in the team
//     foreach ($myTeam as $player) {
//         if (isset($player['player_role'])) {
//             $roleCounts[$player['player_role']]++;
//         }
//     }

//     // Calculate the total number of players
//     $totalPlayers = array_sum($roleCounts);

//     // Condition to check if adding this player would exceed 11 players in total
//     if ($totalPlayers >= 11) {
//         return ['success' => false, 'message' => 'Team cannot exceed 11 players.'];
//     }

//     // Validate based on player role limits
//     $response = ['success' => true, 'message' => 'Player added successfully'];

//     if (isset($roleLimits[$player_role])) {
//         $roleMin = $roleLimits[$player_role]['min'];
//         $roleMax = $roleLimits[$player_role]['max'];

//         // Check if the number of players in this role exceeds the max limit
//         if ($roleCounts[$player_role] >= $roleMax) {
//             $response = ['success' => false, 'message' => 'You can add only between ' . $roleMin . ' and ' . $roleMax . ' ' . $player_role . ' players.'];
//         }
//     } else {
//         $response = ['success' => false, 'message' => 'Invalid player role.'];
//     }

//     return $response;
// }


function getMatchStatus($date)
{
    $startTime = Carbon::now();  // Keep this as a Carbon object
    $endTime = Carbon::parse($date);  //$date is utc timezone
    $minutesDifference = $startTime->diffInMinutes($endTime);
    return $minutesDifference; // Outputs the difference in minutes
}

function checkImageExists($url)
{
    try {
        // Send a HEAD request to check if the image exists
        $response = Http::head($url);
        
        // Check if the response status is 200 (OK)
        return $response->status() === 200;
    } catch (\Exception $e) {
        // In case of an exception (e.g., invalid URL), return false
        return false;
    }
}

// function checkMatch($leagueId)
//  {
//     $res = false;
//     $apiFootballService = app(ApiFootballService::class);
//     $matches =$apiFootballService->get('/fixtures', [
//         'league' => $leagueId,
//         'from' => Carbon::now()->format('Y-m-d'),
//         'to' => Carbon::now()->addYear(100)->format('Y-m-d'),
//         'season' =>  Carbon::now()->format('Y')
//     ]);

//     if(!empty($matches['response']))
//     {
//         $res = true;
//     }
//     return $res;
//  }
?>
