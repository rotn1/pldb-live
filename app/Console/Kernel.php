<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Matchweek;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\ScrapeMatchday',
        'App\Console\Commands\LiveUpdate',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // SCRAPE SQUADS EACH MATCHDAY
        $schedule->command('scrape:matchday')->everyFifteenMinutes()->when(function(){
            $current_date = date('Y-m-d H:i');
            $dbdates = Matchweek::all();
            foreach ($dbdates as $date) {
                if (strtotime(substr($date->starting_date,0,16)) == strtotime($current_date)) {
                    return true;
                }
            }
            return false;
        });

        // UPDATE VOTES EACH MINUTE PER MATCHDAY
        $schedule->command('live:update')->everyFiveMinutes()->withoutOverlapping()->when(function(){
            $matchweek = Matchweek::where('starting_date', '<=', date('Y-m-d H:i:s'))->orderBy('starting_date', 'desc')->limit(1)->first();
            $current_date = strtotime(date('Y-m-d H:i:s'));
            $starting_time = strtotime($matchweek->starting_date);
            $ending_time = strtotime($matchweek->ending_date);
            if ($current_date < $ending_time && $current_date > $starting_time) {
                return true;
            }
            return false;
        });

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
