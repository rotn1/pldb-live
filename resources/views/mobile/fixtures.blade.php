@extends('mobile.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="ol-xs-12 col-sm-12 col-md-12">

			<table class="table table-hover table-striped">
        		<thead>
        			<tr class="table-header">
        				<th class="text-center" colspan="1"><a class="fixture-button" href="/fixtures/{{ $fixtures[0]->matchweek_id - 1 }}">&#8672;</a></th>
        				<th class="text-center" colspan="2">Giornata {{ $fixtures[0]->matchweek_id }}</th>
        				<th class="text-center" colspan="1"><a class="fixture-button" href="/fixtures/{{ $fixtures[0]->matchweek_id + 1 }}">&#8674;</a></th>
        			</tr>
        		</thead>
        		<thead>
        			<tr class="table-header">
        			</tr>
        		</thead>
        		<tbody class="fixtures-table-body">
        			@foreach ($data as $value)
        				<tr class="text-center" data-href="/matches/{{ $value['calendar_id'] }}">
        					<td><img class="team-logo-icon" src="/storage/{{ $value['home']->logo }}" /></td>
        					<td class="text-center fixture-table-detail">{{ $value['home']->acronym }}</td>
        					<td class="text-center fixture-table-detail">{{ $value['away']->acronym }}</td>
        					<td><img class="team-logo-icon" src="/storage/{{ $value['away']->logo }}" /></td>
        				</tr>	
        			@endforeach
        		</tbody>
        	</table>

        	<div id="modal-container">
                <div class="modal-background">
                    <div class="modal">
                        <div style="margin-top: 20px;" class="col-sm-12 text-center" id="live-div">
                            <a id="live-button" class="btn btn-danger">Live !</a>
                        </div>
                        <div id="details">
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>

@endsection