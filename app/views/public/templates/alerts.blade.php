<div class="dash-alert-holder">

	@if ( Session::get('error') && !is_array(Session::get('error')))
        <center>
            <div class="alert alert-danger" style="margin-left:0px">{{{ Session::get('error') }}}</div>
        </center>
    @endif

    @if ( Session::get('notice') && !is_array(Session::get('notice')) )
        <center>
            <div class="alert alert-warning" style="margin-left:0px">{{{ Session::get('notice') }}}</div>
        </center>
    @endif

	@if(Session::get('notice') && is_array(Session::get('notice')))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right:8px;"></button> 
				@foreach(Session::get('notice') as $n)
					{{$n}}<br/>
				@endforeach 
		</div>
	@endif
	
	@if(Session::get('error') && is_array(Session::get('error')))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right:8px;"></button> 
				@foreach(Session::get('error') as $e)
					{{$e}}<br/>
				@endforeach 
		</div>
	@endif
	
	@if(isset($notice))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right:8px;"></button>
			{{$notice}}
		</div>
	@endif
	
	@if(isset($alert))
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right:8px;"></button>
			{{ $alert }}
		</div>
	@endif
</div>