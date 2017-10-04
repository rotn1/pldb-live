@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        	<table class="table table-hover table-striped">
        		<thead>
        			<tr class="table-header">
        				<th class="text-center" colspan="2"><a class="fixture-button" href="/fixtures/{{ $fixtures[0]->matchweek_id - 1 }}">&#8672;</a></th>
        				<th class="text-center" colspan="2">Giornata {{ $fixtures[0]->matchweek_id }}</th>
        				<th class="text-center" colspan="2"><a class="fixture-button" href="/fixtures/{{ $fixtures[0]->matchweek_id + 1 }}">&#8674;</a></th>
        			</tr>
        		</thead>
        		<thead>
        			<tr class="table-header">
        				<th class="logo-table-header"></th>
        				<th class="text-center team-table-header">Home Team</th>
        				<th class="text-center score-table-header">Home Score</th>
        				<th class="text-center score-table-header">Away Score</th>
        				<th class="text-center team-table-header">Away Team</th>
        				<th class="logo-table-header"></th>
        			</tr>
        		</thead>
        		<tbody class="fixtures-table-body">
        			@foreach ($data as $value)
        				<tr data-href="/matches/{{ $value['calendar_id'] }}">
        					<td><img class="team-logo-icon" src="/storage/{{ $value['home']->logo }}" /></td>
        					<td class="text-center fixture-table-detail">{{ $value['home']->name }}</td>
        					<td class="text-center fixture-table-detail">{{ $value['home_s'] }}</td>
        					<td class="text-center fixture-table-detail">{{ $value['away_s'] }}</td>
        					<td class="text-center fixture-table-detail">{{ $value['away']->name }}</td>
        					<td><img class="team-logo-icon" src="/storage/{{ $value['away']->logo }}" /></td>
        				</tr>	
        			@endforeach
        		</tbody>
        	</table>
            <div id="modal-container">
                <div class="modal-background">
                    <div class="modal">
                        <div class="col-lg-12 text-center" id="live-div">
                            <a id="live-button" class="btn btn-danger">Live !</a>
                        </div>
                        <div id="details">
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="modal animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-custom-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        -->
        </div>
    </div>
</div>

@endsection