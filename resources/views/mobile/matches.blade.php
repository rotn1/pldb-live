<!-- MOBILE -->

<!-- HOME TEAM -->
<div style="margin-top: 10px;" class="col-xs-12 col-sm-12 col-md-12">
	<table class="table-sm">
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">{{ $data['home_squad'][0]->player->fantateam->name }}</th>
			</tr>
			<tr class="table-header text-center" style="font-size: 1em;">
				<th colspan="1" style="width: 20%">Score</th>
				<th colspan="1" style="width: 20%">FScore</th>
				<th colspan="1" style="width: 20%">mA</th>
				<th colspan="1" style="width: 20%">mC</th>
				<th colspan="1" style="width: 20%">mD</th>
			</tr>
		</thead>
		<tbody>
			<tr class="subs-table">
				<td>{{ $data['home_score'] }}</td>
				<td>{{ $data['home_fantascore'] }}</td>
				<td>{{ $data['home_mod_a'] }}</td>
				<td>{{ $data['home_mod_c'] }}</td>
				<td>{{ $data['home_mod_d'] }}</td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">Titolari</th>
			</tr>
			<tr class="table-header" style="font-size: 1em;">
				<th>Player</th>
				<th>Position</th>
				<th>Vote</th>
				<th>Events</th>
				<th>FVote</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data['home_squad'] as $player)
				@if ($player->is_starter)
					<tr class="{{ $player->position }}">
						<td class="match-table-detail">{{ $player->player->fantaname }}</td>
						<td class="match-table-detail">{{ $player->position }}</td>
						<td class="match-table-detail">{{ ($player->vote == NULL) ? '-' : $player->vote }}</td>
						<td class="match-table-detail">
							@if ($player->events != NULL)
								@foreach (explode(',', $player->events) as $event)
									<img class="events-icon" src="/storage/{{ $event }}">
								@endforeach
							@endif
						</td>
						<td class="match-table-detail">{{ ($player->fantavote == NULL) ? '-' : $player->fantavote }}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">Riserve</th>
			</tr>
			<tr class="table-header" style="font-size: 1em;">
				<th>Player</th>
				<th>Position</th>
				<th>Vote</th>
				<th>Events</th>
				<th>Fantavote</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data['home_squad'] as $player)
				@if (!$player->is_starter)	
					<tr class="subs-table">
						<td>{{ $player->player->fantaname }}</td>
						<td>
							@foreach (array($player->player->role1, $player->player->role2, $player->player->role3) as $element)
								{{ $element }}
							@endforeach
						</td>
						<td>{{ ($player->vote == NULL) ? '-' : $player->vote }}</td>
						<td>
							@if ($player->events != NULL)
								@foreach (explode(',', $player->events) as $event)
									<img class="events-icon" src="/storage/{{ $event }}">
								@endforeach
							@endif
						</td>
						<td>{{ ($player->fantavote == NULL) ? '-' : $player->fantavote }}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>

<hr id='hzline' />

<!-- AWAY TEAM -->
<div style="margin-top: 10px;" class="col-xs-12 col-sm-12 col-md-12">
	<table class="table-sm">
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">{{ $data['away_squad'][0]->player->fantateam->name }}</th>
			</tr>
			<tr class="table-header" style="font-size: 1em;">
				<th colspan="1" style="width: 20%">Score</th>
				<th colspan="1" style="width: 20%">Fantascore</th>
				<th colspan="1" style="width: 20%">Mod A</th>
				<th colspan="1" style="width: 20%">Mod C</th>
				<th colspan="1" style="width: 20%">Mod D</th>
			</tr>
		</thead>
		<tbody>
			<tr class="subs-table">
				<td>{{ $data['away_score'] }}</td>
				<td>{{ $data['away_fantascore'] }}</td>
				<td>{{ $data['away_mod_a'] }}</td>
				<td>{{ $data['away_mod_c'] }}</td>
				<td>{{ $data['away_mod_d'] }}</td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">Titolari</th>
			</tr>
			<tr class="table-header" style="font-size: 1em;">
				<th>Player</th>
				<th>Position</th>
				<th>Vote</th>
				<th>Events</th>
				<th>Fantavote</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data['away_squad'] as $player)
				@if ($player->is_starter)	
					<tr class="{{ $player->position }}">
						<td>{{ $player->player->fantaname }}</td>
						<td>{{ $player->position }}</td>
						<td>{{ ($player->vote == NULL) ? '-' : $player->vote }}</td>
						<td>
							@if ($player->events != NULL)
								@foreach (explode(',', $player->events) as $event)
									<img class="events-icon" src="/storage/{{ $event }}">
								@endforeach
							@endif
						</td>
						<td>{{ ($player->fantavote == NULL) ? '-' : $player->fantavote }}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
		<thead>
			<tr>
				<th class="table-header text-center" colspan="5">Riserve</th>
			</tr>
			<tr class="table-header" style="font-size: 1em;">
				<th>Player</th>
				<th>Position</th>
				<th>Vote</th>
				<th>Events</th>
				<th>Fantavote</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data['away_squad'] as $player)
				@if (!$player->is_starter)	
					<tr class="subs-table">
						<td>{{ $player->player->fantaname }}</td>
						<td>
							@foreach (array($player->player->role1, $player->player->role2, $player->player->role3) as $element)
								{{ $element }}
							@endforeach
						</td>
						<td>{{ ($player->vote == NULL) ? '-' : $player->vote }}</td>
						<td>
							@if ($player->events != NULL)
								@foreach (explode(',', $player->events) as $event)
									<img class="events-icon" src="/storage/{{ $event }}">
								@endforeach
							@endif
						</td>
						<td>{{ ($player->fantavote == NULL) ? '-' : $player->fantavote }}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>