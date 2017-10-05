@extends('mobile.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="text-center">

                <div>
                    @foreach ($matches as $match)
                        <div data-href="/matches/{{ $match->calendar_id }}" class="box text-center {{ ($match->home_fantateam_id == Auth::user()->fantateam_id) ? (($match->home_fantateam_score >= $match->away_fantateam_score) ? (($match->home_fantateam_score > $match->away_fantateam_score) ? 'green' : 'grey') : 'red') : (($match->home_fantateam_score >= $match->away_fantateam_score) ? (($match->home_fantateam_score > $match->away_fantateam_score) ? 'red' : 'grey') : 'green') }}">
                            <h3><strong>G{{ $match->matchweek_id }}</strong></h2>
                            @if ($match->home_fantateam_id == Auth::user()->fantateam_id)
                                <p class="text-center"><span class="span-matches">VS&#32;&#32;&#32;&#32;</span> <img class="team-logo-matches" src="/storage/{{ $match->away_fantateam->logo }}" /></p>
                            @else
                                <p class="text-center"><span class="span-matches">&#64;&#32;&#32;&#32;&#32;</span><img class="team-logo-matches" src="/storage/{{ $match->home_fantateam->logo }}" /></p>
                            @endif
                            <p class="text-center"><span class="span-matches-score">{{ $match->home_fantateam_score }} - {{ $match->away_fantateam_score }}</span></p>
                        </div>
                    @endforeach
                </div>
            </div>


            <div id="modal-container">
                <div class="modal-background">
                    <div class="modal">
                        <div id="details">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
