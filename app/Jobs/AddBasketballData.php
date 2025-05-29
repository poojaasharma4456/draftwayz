<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ApiNflService;
use App\Models\PlayerStatistic;
use App\Models\StaticsLogs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\League;


class AddBasketballData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(ApiNflService $apiNflService)
    {
       $all_leagues = $apiNflService->getLeagues();
       
       if(isset($all_leagues['response']) && !empty($all_leagues['response'])){
          $apiNflService->addBasKetBallData($all_leagues['response']);
       }
    }
}
