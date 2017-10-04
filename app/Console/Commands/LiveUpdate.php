<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Matchweek;
use App\Fixture;
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
use App\Temp_Player_Vote;
use App\Team;

class LiveUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Live update of every match';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function computeFantavote($events, $vote, $position){
        $events = explode(",", $events);
        foreach ($events as $single_event) {
            switch ($single_event) {
                case '1':
                    $vote -= 0.5;
                    break;
                case '2':
                    $vote -= 1;
                    break;
                case '3':
                    if ($position == 'DIF' || $position == 'DC' || $position == 'TS' || $position == 'TD') {
                        $vote += 4;
                    }
                    else if ($position == 'CEN' || $position == 'CC' || $position == 'CS' || $position == 'CD' || $position == 'MD' || $position == 'TR'){
                        $vote += 3.5;
                    }
                    else {
                        $vote += 3;
                    }
                    break;
                case '4':
                    $vote -= 1;
                    break;
                case '5':
                    $vote += 1;
                    break;
                case '6':
                    $vote += 1;
                    break;
                case '7':
                    $vote += 3;
                    break;
                case '8':
                    $vote -= 3;
                    break;
                case '9':
                    $vote += 3;
                    break;
                case '10':
                    $vote -= 2;
                    break;
                default:
                    break;
            }
        }
        if (!(in_array('4', $events)) and ($position == 'PO' || $position == 'POR')) {
            $vote += 1;
        }
        return $vote;
    }

    public function eventValueToEventImg($e, $p){
        $evtimg = array();
        foreach ($e as $value) {
            switch ($value) {
                case '3':
                    $evtimg[] = 'img/golfatto.png';
                    break;
                case '9':
                    $evtimg[] = 'img/rigoresegnato.png';
                    break;
                case '5':
                    $evtimg[] = 'img/assist.png';
                    break;
                case '6':
                    $evtimg[] = 'img/assist.png';
                    break;
                case '1':
                    $evtimg[] = 'img/amm.png'; 
                    break;
                case '2':
                    $evtimg[] = 'img/esp.png';
                    break;
                case '4':
                    $evtimg[] = 'img/golsubito.png';
                    break;
                case '7':
                    $evtimg[] = 'img/rigoreparato.png';
                    break;
                case '8':
                    $evtimg[] = 'img/rigoresbagliato.png';
                    break;
                case '10':
                    $evtimg[] = 'img/autogol.png';
                    break;
                default:
                    break;
            }
        }
        if (!(in_array('4', $e)) and ($p == 'P')) {
            $evtimg[] = 'img/portiereimbattuto.png';
        }
        if (count($evtimg) > 1) {
            return implode(',', $evtimg);
        }
        else return implode('', $evtimg);
    }

    public function updateSquad($player_id, $calendar_id, $element){
        switch ($player_id->fantateam_id) {
            case '1':
                if($player = Brighton::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '2':
                if($player = Vasco::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '3':
                if($player = Hercules::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '4':
                if($player = Sanfrecce::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '5':
                if($player = Nizza::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '6':
                if($player = Nottingham::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '7':
                if($player = Pachuca::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '8':
                if($player = Sabadell::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '9':
                if($player = Unam::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            case '10':
                if($player = Entella::where('player_id', $player_id->id)->where('calendar_id', $calendar_id)->first()){
                    $pos = is_null($player->position) ? $player_id->position : $player->position;
                    $player->fantavote = $this->computeFantavote($element->evento, $element->voto, $pos);
                    $events = $this->eventValueToEventImg(explode(",", $element->evento), $element->ruolo);
                    $player->events = $events;
                    $player->vote = ($element->voto);
                    $player->save();
                }
                break;
            default:
                # code...
                break;
        }
        return;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $teams = Team::all();
        $matchweek = Matchweek::where('starting_date', '<=', date('Y-m-d H:i:s'))->orderBy('starting_date', 'desc')->limit(1)->first()->id;
        foreach ($teams as $team) { 
            $link = 'https://www.fantagazzetta.com/api/live/' . $team->encoded_id . '?g=' . $matchweek . '&i=12';
            $res = $client->request('GET', $link);
            $body = json_decode( $res->getBody() );
            foreach ($body as $element) {
                if($player_id = Player::where('fantaname', $element->nome)->whereNotNull('fantateam_id')->first()){
                    $calendar_id = Fixture::where('matchweek_id', $matchweek)
                                            ->where(function($query) use(&$player_id){
                                                $query->where('home_fantateam_id', $player_id->fantateam_id)
                                                        ->orWhere('away_fantateam_id', $player_id->fantateam_id);
                                            })
                                            ->first()->calendar_id;
                    $this->updateSquad($player_id, $calendar_id, $element);
                }
            }
        }
    }
}
