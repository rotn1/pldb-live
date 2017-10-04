<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class MatchesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function toFixed($number, $decimals) {
        return number_format($number, $decimals, ".", "");
    }

    public function retrieveSquad($team, $calendar_id){
        switch ($team) {
            case '1':
                $squad = Brighton::where('calendar_id', $calendar_id)->get();
                break;
            case '2':
                $squad = Vasco::where('calendar_id', $calendar_id)->get();
                break;
            case '3':
                $squad = Hercules::where('calendar_id', $calendar_id)->get();
                break;
            case '4':
                $squad = Sanfrecce::where('calendar_id', $calendar_id)->get();
                break;
            case '5':
                $squad = Nizza::where('calendar_id', $calendar_id)->get();
                break;
            case '6':
                $squad = Nottingham::where('calendar_id', $calendar_id)->get();
                break;
            case '7':
                $squad = Pachuca::where('calendar_id', $calendar_id)->get();
                break;
            case '8':
                $squad = Sabadell::where('calendar_id', $calendar_id)->get();
                break;
            case '9':
                $squad = Unam::where('calendar_id', $calendar_id)->get();
                break;
            case '10':
                $squad = Entella::where('calendar_id', $calendar_id)->get();
                break;
            default:
                # code...
                break;
        }
        return $squad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        if ( strtotime(Fixture::where('calendar_id', $id)->first()->matchweek->starting_date) > strtotime(date('Y-m-d H:i:s')) ) {
            return view('errors.errfixture')->with('error', 1);
        }
        elseif ( Fixture::where('calendar_id', $id)->first()->matchweek_id == 2 || Fixture::where('calendar_id', $id)->first()->matchweek_id == 1 ) {
            return view('errors.errfixture')->with('error', 0);
        }

        $home_score_tot = 0;
        $home_fantascore_tot = 0;
        $away_score_tot = 0;
        $away_fantascore_tot = 0;
        $home_def_votes = [];
        $home_cen_votes = [];
        $home_att_votes = [];
        $home_def_count = 0;
        $home_cen_count = 0;
        $home_att_count = 0;
        $away_def_votes = [];
        $away_cen_votes = [];
        $away_att_votes = [];
        $away_def_count = 0;
        $away_cen_count = 0;
        $away_att_count = 0;
        $home_mod_a = 0;
        $home_mod_c = 0;
        $home_mod_d = 0;
        $away_mod_a = 0;
        $away_mod_c = 0;
        $away_mod_d = 0;

        $home_team = Fixture::where('calendar_id', $id)->first()->home_fantateam_id;
        $away_team = Fixture::where('calendar_id', $id)->first()->away_fantateam_id;
        $home_squad = $this->retrieveSquad($home_team, $id);
        $away_squad = $this->retrieveSquad($away_team, $id);
        
        foreach ($home_squad as $player) {
            if ($player->is_starter) {
                switch ($player->position) {
                    case 'DC':
                    case 'TD':
                    case 'TS':
                        $home_def_count += 1;
                        $home_def_votes[] = $player->vote;
                        break;
                    case 'MD':
                    case 'CC':
                    case 'CD':
                    case 'CS':
                    case 'TR':
                        $home_cen_count += 1;
                        $home_cen_votes[] = $player->vote;
                        break;
                    case 'AC':
                    case 'AD':
                    case 'AS':
                    case 'PU':
                        $home_att_count += 1;
                        $home_att_votes[] = $player->vote;
                        break;
                    default:
                        break;
                }
                $home_score_tot += $player->vote;
                $home_fantascore_tot += $player->fantavote;
            }
        }

        foreach ($away_squad as $player) {
            if ($player->is_starter) {
                switch ($player->position) {
                    case 'DC':
                    case 'TD':
                    case 'TS':
                        $away_def_count += 1;
                        $away_def_votes[] = $player->vote;
                        break;
                    case 'MD':
                    case 'CC':
                    case 'CD':
                    case 'CS':
                    case 'TR':
                        $away_cen_count += 1;
                        $away_cen_votes[] = $player->vote;
                        break;
                    case 'AC':
                    case 'AD':
                    case 'AS':
                    case 'PU':
                        $away_att_count += 1;
                        $away_att_votes[] = $player->vote;
                        break;
                    default:
                        break;
                }
                $away_score_tot += $player->vote;
                $away_fantascore_tot += $player->fantavote;
            }
        }

        if ($home_att_count > $away_def_count) {
            while(count($home_att_votes) > count($away_def_votes)){
                sort($home_att_votes);
                array_shift($home_att_votes);
            }
        } elseif ($home_att_count < $away_def_count) {
            while(count($away_def_votes) > count($home_att_votes)){
                sort($away_def_votes);
                array_shift($away_def_votes);
            }
        }

        if ($home_def_count > $away_att_count) {
            while(count($home_def_votes) > count($away_att_votes)){
                sort($home_def_votes);
                array_shift($home_def_votes);
            }
        } elseif ($home_def_count < $away_att_count) {
            while(count($away_att_votes) > count($home_def_votes)){
                sort($away_att_votes);
                array_shift($away_att_votes);
            }
        }

        if ($home_cen_count > $away_cen_count) {
            while(count($home_cen_votes) > count($away_cen_votes)){
                sort($home_cen_votes);
                array_shift($home_cen_votes);
            }
        } elseif ($home_cen_count < $away_cen_count) {
            while(count($away_cen_votes) > count($home_cen_votes)){
                sort($away_cen_votes);
                array_shift($away_cen_votes);
            }
        }

        $home_avg_att = array_sum($home_att_votes)/count($home_att_votes);
        $home_avg_cen = array_sum($home_cen_votes)/count($home_cen_votes);
        $home_avg_def = array_sum($home_def_votes)/count($home_def_votes);

        $away_avg_att = array_sum($away_att_votes)/count($away_att_votes);
        $away_avg_cen = array_sum($away_cen_votes)/count($away_cen_votes);
        $away_avg_def = array_sum($away_def_votes)/count($away_def_votes);

        $home_mod_a = ($this->toFixed((floor(($home_avg_att - $away_avg_def)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($home_avg_att - $away_avg_def)*4) / 4), 2))*2 : 0;
        $home_mod_c = ($this->toFixed((floor(($home_avg_cen - $away_avg_cen)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($home_avg_cen - $away_avg_cen)*4) / 4), 2))*2 : 0;
        $home_mod_d = ($this->toFixed((floor(($home_avg_def - $away_avg_att)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($home_avg_def - $away_avg_att)*4) / 4), 2))*2 : 0;
        $away_mod_a = ($this->toFixed((floor(($away_avg_att - $home_avg_def)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($away_avg_att - $home_avg_def)*4) / 4), 2))*2 : 0;
        $away_mod_c = ($this->toFixed((floor(($away_avg_cen - $home_avg_cen)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($away_avg_cen - $home_avg_cen)*4) / 4), 2))*2 : 0;
        $away_mod_d = ($this->toFixed((floor(($away_avg_def - $home_avg_att)*4) / 4), 2))*2 >= 0 ? ($this->toFixed((floor(($away_avg_def - $home_avg_att)*4) / 4), 2))*2 : 0; 

        return view('matches')->with('data', ["home_squad" => $home_squad, 
                                                "home_score" => $home_score_tot,
                                                "home_mod_a" => $home_mod_a,
                                                "home_mod_c" => $home_mod_c,
                                                "home_mod_d" => $home_mod_d, 
                                                "home_fantascore" => $home_fantascore_tot,
                                                "away_squad" => $away_squad,
                                                "away_score" => $away_score_tot,
                                                "away_mod_a" => $away_mod_a,
                                                "away_mod_c" => $away_mod_c,
                                                "away_mod_d" => $away_mod_d, 
                                                "away_fantascore" => $away_fantascore_tot, 
                                                "calendar_id" => $id
                                            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
