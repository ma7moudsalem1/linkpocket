@if(Session::has('flash_message'))
<div class="alert alert-success" data-dismiss="alert" aria-label="Close">{{ Session::get('flash_message') }}</div>
@endif

@if(Session::has('cusMessage'))
	<div class="alert alert-danger" data-dismiss="alert" aria-label="Close">{{ Session::get('cusMessage') }}</div>
@endif

