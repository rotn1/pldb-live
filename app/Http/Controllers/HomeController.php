<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
use App\Player;
use App\Fixture;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $team_id = $user->fantateam_id;
        $matches = Fixture::where('home_fantateam_id', $team_id)->orWhere('away_fantateam_id', $team_id)->get();

        return view('home')->with('matches', $matches);
    }
}
