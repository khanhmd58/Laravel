@if(count($errors))
	@foreach($errors->all() as $key => $val)
		<div class="alert alert-danger " role="alert">{{$val}}</div>
	@endforeach
@else
	@if(Session::has('error'))
    	<div class="alert alert-danger " role="alert">{{Session::get('error')}}</div>
    @endif
@endif

@if(Session::has('success'))
	<div class="alert alert-success col-md-4 col-md-offset-3" role="alert">{{Session::get('success')}}</div>
@endif

@if(Session::has('notice_delete'))
	<div class="alert alert-success col-md-4 col-md-offset-3" role="alert">{{Session::get('notice_delete')}}</div>
@endif

@if(Session::has('notice_add'))
	<div class="alert alert-success col-md-4 col-md-offset-3" role="alert">{{Session::get('notice_add')}}</div>
@endif

@if(Session::has('notice_edit'))
	<div class="alert alert-success col-md-4 col-md-offset-3" role="alert">{{Session::get('notice_edit')}}</div>
@endif

@if(Session::has('user') && Session::has('pass'))
	Xin Chào <span style="color:red;">{{Session::get('user')}}</span>
@endif
