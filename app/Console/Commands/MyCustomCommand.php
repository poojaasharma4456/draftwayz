<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\AddBasketballData;
use App\Jobs\AddFootballData;
class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nfl-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to add leagues and matches.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        AddBasketballData::dispatch();
    }
}
