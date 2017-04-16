@if(Session::has('sc_msg'))
	<div class="alert alert-success">{{ Session::get('sc_msg') }}</div>
@endif



@if(Session::has('err_msg'))
<div class="alert alert-danger">
	@if(is_array(Session::get('err_msg')))
		<ul>
			@foreach(Session::get('err_msg') as $err)
				<li>{{ $err }}</li>
			@endforeach
		</ul>
	@else
		{{ Session::get('err_msg') }}
	@endif	
</div>
@endif