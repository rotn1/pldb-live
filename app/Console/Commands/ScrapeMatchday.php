<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Fixture;
use App\Matchweek;
use App\Player;
use App\Fantateam;
use App\Brighton;
use App\Entella;
use App\Hercules;
use App\Nizza;
use App\Nottingham;
use App\Pachuca;
use App\Sabadell;
use App\Sanfrecce;
use App\Unam;
use App\Vasco;

use Goutte;

class ScrapeMatchday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:matchday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape all the fantateams squads for the current matchday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function insertIntoDB($team, $home_starting, $home_subs, $calendar_id){
        switch ($team) {
            case '1':
                foreach ($home_starting as $key => $value) {
                    $brighton = new Brighton;
                    $brighton->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $brighton->calendar_id = $calendar_id;
                    $brighton->is_starter = true;
                    $brighton->position = $value['pos'];
                    $brighton->save();
                }
                foreach ($home_subs as $key => $value) {
                    $brighton = new Brighton;
                    $brighton->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $brighton->calendar_id = $calendar_id;
                    $brighton->is_starter = false;
                    $brighton->bench_pos = $key+1;
                    $brighton->save();
                }
                break;
            case '2':
                foreach ($home_starting as $key => $value) {
                    $vasco = new Vasco;
                    $vasco->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $vasco->calendar_id = $calendar_id;
                    $vasco->is_starter = true;
                    $vasco->position = $value['pos'];
                    $vasco->save();
                }
                foreach ($home_subs as $key => $value) {
                    $vasco = new Vasco;
                    $vasco->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $vasco->calendar_id = $calendar_id;
                    $vasco->is_starter = false;
                    $vasco->bench_pos = $key+1;
                    $vasco->save();
                }
                break;
            case '3':
                foreach ($home_starting as $key => $value) {
                    $hercules = new Hercules;
                    $hercules->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $hercules->calendar_id = $calendar_id;
                    $hercules->is_starter = true;
                    $hercules->position = $value['pos'];
                    $hercules->save();
                }
                foreach ($home_subs as $key => $value) {
                    $hercules = new Hercules;
                    $hercules->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $hercules->calendar_id = $calendar_id;
                    $hercules->is_starter = false;
                    $hercules->bench_pos = $key+1;
                    $hercules->save();
                }
                break;
            case '4':
                foreach ($home_starting as $key => $value) {
                    $sanfrecce = new Sanfrecce;
                    $sanfrecce->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $sanfrecce->calendar_id = $calendar_id;
                    $sanfrecce->is_starter = true;
                    $sanfrecce->position = $value['pos'];
                    $sanfrecce->save();
                }
                foreach ($home_subs as $key => $value) {
                    $sanfrecce = new Sanfrecce;
                    $sanfrecce->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $sanfrecce->calendar_id = $calendar_id;
                    $sanfrecce->is_starter = false;
                    $sanfrecce->bench_pos = $key+1;
                    $sanfrecce->save();
                }
                break;
            case '5':
                foreach ($home_starting as $key => $value) {
                    $nizza = new Nizza;
                    $nizza->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $nizza->calendar_id = $calendar_id;
                    $nizza->is_starter = true;
                    $nizza->position = $value['pos'];
                    $nizza->save();
                }
                foreach ($home_subs as $key => $value) {
                    $nizza = new Nizza;
                    $nizza->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $nizza->calendar_id = $calendar_id;
                    $nizza->is_starter = false;
                    $nizza->bench_pos = $key+1;
                    $nizza->save();
                }
                break;
            case '6':
                foreach ($home_starting as $key => $value) {
                    $nottingham = new Nottingham;
                    $nottingham->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $nottingham->calendar_id = $calendar_id;
                    $nottingham->is_starter = true;
                    $nottingham->position = $value['pos'];
                    $nottingham->save();
                }
                foreach ($home_subs as $key => $value) {
                    $nottingham = new Nottingham;
                    $nottingham->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $nottingham->calendar_id = $calendar_id;
                    $nottingham->is_starter = false;
                    $nottingham->bench_pos = $key+1;
                    $nottingham->save();
                }
                break;
            case '7':
                foreach ($home_starting as $key => $value) {
                    $pachuca = new Pachuca;
                    $pachuca->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $pachuca->calendar_id = $calendar_id;
                    $pachuca->is_starter = true;
                    $pachuca->position = $value['pos'];
                    $pachuca->save();
                }
                foreach ($home_subs as $key => $value) {
                    $pachuca = new Pachuca;
                    $pachuca->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $pachuca->calendar_id = $calendar_id;
                    $pachuca->is_starter = false;
                    $pachuca->bench_pos = $key+1;
                    $pachuca->save();
                }
                break;
            case '8':
                foreach ($home_starting as $key => $value) {
                    $sabadell = new Sabadell;
                    $sabadell->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $sabadell->calendar_id = $calendar_id;
                    $sabadell->is_starter = true;
                    $sabadell->position = $value['pos'];
                    $sabadell->save();
                }
                foreach ($home_subs as $key => $value) {
                    $sabadell = new Sabadell;
                    $sabadell->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $sabadell->calendar_id = $calendar_id;
                    $sabadell->is_starter = false;
                    $sabadell->bench_pos = $key+1;
                    $sabadell->save();
                }
                break;
            case '9':
                foreach ($home_starting as $key => $value) {
                    $unam = new Unam;
                    $unam->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $unam->calendar_id = $calendar_id;
                    $unam->is_starter = true;
                    $unam->position = $value['pos'];
                    $unam->save();
                }
                foreach ($home_subs as $key => $value) {
                    $unam = new Unam;
                    $unam->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $unam->calendar_id = $calendar_id;
                    $unam->is_starter = false;
                    $unam->bench_pos = $key+1;
                    $unam->save();
                }
                break;
            case '10':
                foreach ($home_starting as $key => $value) {
                    $entella = new Entella;
                    $entella->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $entella->calendar_id = $calendar_id;
                    $entella->is_starter = true;
                    $entella->position = $value['pos'];
                    $entella->save();
                }
                foreach ($home_subs as $key => $value) {
                    $entella = new Entella;
                    $entella->player_id = Player::where('surname', $value['surname'])->where('name', 'like', $value['name'] . '%')->first()->id;
                    $entella->calendar_id = $calendar_id;
                    $entella->is_starter = false;
                    $entella->bench_pos = $key+1;
                    $entella->save();
                }
                break;
            default:
                # code...
                break;
        }
        return;
    }

    public function scrape($id){

        $home_players = [];
        $home_subs = [];
        $home_pos = [];
        $away_players = [];
        $away_subs = [];
        $away_pos = [];
        $match = Fixture::where('calendar_id', $id)->first();
        $home_team = Fixture::where('calendar_id', $id)->first()->home_fantateam_id;
        $away_team = Fixture::where('calendar_id', $id)->first()->away_fantateam_id;

        // PLDB SITE CRAWLING
        $link = 'https://www.pldbmilano.it/partita_det.asp?calef_id='.$id;
        $crawler = Goutte::request('GET', $link);

        // HOME TEAM CRAWLING
        $crawler->filter('div.col-sm-6:nth-of-type(1) tr:nth-of-type(3) tr:nth-of-type(n+2) td:nth-of-type(2)')->each(function ($node) use(&$home_players) {
            preg_match('/.+?(?=(([A-Z]|\s)\.))/', $node->text(), $matches);
            $n = $matches[2];
            $n = ($n == '') ? ' ' : $n;
            $s = trim($matches[0]);
            $home_players[] = ['surname' => $s, 'name' => $n];
        });
        $crawler->filter('div.col-sm-6:nth-of-type(1) tr:nth-of-type(3) tr:nth-of-type(n+2) td:nth-of-type(3)')->each(function ($node) use(&$home_pos) {
            $home_pos[] = $node->text();
        });
        $crawler->filter('div.col-sm-6:nth-of-type(1) tr:nth-of-type(5) tr:nth-of-type(n+2) td:nth-of-type(2)')->each(function ($node) use(&$home_subs) {
            $substr = preg_replace('/\([^)]*\)/', '', $node->text());
            preg_match('/.+?(?=(([A-Z]|\s)\.))/', $substr, $matches);
            $n = $matches[2];
            $n = ($n == '') ? ' ' : $n;
            $s = trim($matches[0]);
            $home_subs[] = ['surname' => $s, 'name' => $n];
        });

        // AWAY TEAM CRAWLING
        $crawler->filter('div.col-sm-6:nth-of-type(2) tr:nth-of-type(3) tr:nth-of-type(n+2) td:nth-of-type(2)')->each(function ($node) use(&$away_players) {
            preg_match('/.+?(?=(([A-Z]|\s)\.))/', $node->text(), $matches);
            $n = $matches[2];
            $n = ($n == '') ? ' ' : $n;
            $s = trim($matches[0]);
            $away_players[] = ['surname' => $s, 'name' => $n];
        });
        $crawler->filter('div.col-sm-6:nth-of-type(2) tr:nth-of-type(3) tr:nth-of-type(n+2) td:nth-of-type(3)')->each(function ($node) use(&$away_pos) {
            $away_pos[] = $node->text();
        });
        $crawler->filter('div.col-sm-6:nth-of-type(2) tr:nth-of-type(5) tr:nth-of-type(n+2) td:nth-of-type(2)')->each(function ($node) use(&$away_subs) {
            $substr = preg_replace('/\([^)]*\)/', '', $node->text());
            preg_match('/.+?(?=(([A-Z]|\s)\.))/', $substr, $matches);
            $n = $matches[2];
            $n = ($n == '') ? ' ' : $n;
            $s = trim($matches[0]);
            $away_subs[] = ['surname' => $s, 'name' => $n];
        });

        foreach($home_players as $key=>$value) {
            $home_players[$key]['pos'] = $home_pos[$key];
            $away_players[$key]['pos'] = $away_pos[$key];
        }

        $this->insertIntoDB($home_team, $home_players, $home_subs, $id);
        $this->insertIntoDB($away_team, $away_players, $away_subs, $id);

        return;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $current_date = date('Y-m-d H:i:s');
        $match_id = Matchweek::where('starting_date', '<=', $current_date)->orderBy('starting_date', 'desc')->limit(1)->first()->id;
        $fixtures = Fixture::where('matchweek_id', $match_id)->get();
        foreach ($fixtures as $match) {
            $this->scrape($match->calendar_id);
        }
    }
}
