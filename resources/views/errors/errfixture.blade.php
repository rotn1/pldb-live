<div>
	@if ($error)
		<div class="alert alert-danger errmsg">
		  <strong>Error!</strong> These matches have not started yet.
		</div>
	@else
		<div class="alert alert-danger errmsg">
		  <strong>Error!</strong> We could not retrieve data for these matches.
		</div>
	@endif
</div>