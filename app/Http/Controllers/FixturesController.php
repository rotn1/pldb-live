<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Matchweek;
use Cookie;

class FixturesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d H:i:s');
        $m_id = Matchweek::where('starting_date', '<=', $date)->orderBy('starting_date', 'desc')->limit(1)->first()->id;
        $data = [];
        $fixtures = Fixture::where('matchweek_id', $m_id)->get();
        foreach ($fixtures as $match) {
            array_push($data, ['home' => $match->home_fantateam, 
                               'away' => $match->away_fantateam,
                               'home_s' => $match->home_fantateam_score,
                               'away_s' => $match->away_fantateam_score,
                               'calendar_id' => $match->calendar_id
                              ]
                        );
        }
        return view('fixtures')->with('data', $data)->with('fixtures', $fixtures);
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
        if ($id > 0 && $id < 37) {
            $data = [];
            $fixtures = Fixture::where('matchweek_id', $id)->get();
            foreach ($fixtures as $match) {
                array_push($data, ['home' => $match->home_fantateam, 
                                   'away' => $match->away_fantateam,
                                   'home_s' => $match->home_fantateam_score,
                                   'away_s' => $match->away_fantateam_score,
                                   'calendar_id' => $match->calendar_id
                                  ]
                            );
            }
            return view('fixtures')->with('data', $data)->with('fixtures', $fixtures);
        } else {
            $id < 1 ? $id = $id+1 : $id = $id-1;
            $data = [];
            $fixtures = Fixture::where('matchweek_id', $id)->get();
            foreach ($fixtures as $match) {
                array_push($data, ['home' => $match->home_fantateam, 
                                   'away' => $match->away_fantateam,
                                   'home_s' => $match->home_fantateam_score,
                                   'away_s' => $match->away_fantateam_score,
                                   'calendar_id' => $match->calendar_id
                                  ]
                            );
            }
            return view('fixtures')->with('data', $data)->with('fixtures', $fixtures);
        }
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
