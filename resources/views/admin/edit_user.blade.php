@extends('admin.master_admin')
@section('content')
<form class="form-horizontal" method="post" action="{{route('update.user',$users->id)}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<h4>User Information</h4>
<div class="form-group">
	<label class="col-sm-3 col-md-2 control-label">ID</label>
	<div class="col-sm-7 col-md-8">
		<input type="email" class="form-control" name="id" value="{{$users->id}}" disabled="">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 col-md-2 control-label">Email</label>
	<div class="col-sm-7 col-md-8">
		<input type="text" class="form-control" name="email" value="{{$users->email}}" disabled="">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 col-md-2 control-label">Name</label>
	<div class="col-sm-7 col-md-8">
		<input type="text" class="form-control" name="name" value="{{$users->full_name}}">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 col-md-2 control-label">Phone</label>
	<div class="col-sm-7 col-md-8">
		<input type="text" class="form-control" name="phone" value="{{$users->phone}}">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 col-md-2 control-label">Địa Chỉ</label>
	<div class="col-sm-7 col-md-8">
		<input type="text" class="form-control" name="address" value="{{$users->address}}">
	</div>
</div>
<div class="col-md-4"></div>
<div>
@if(Session::has('message'))
<p style="color:red">{{Session::get('message')}}</p>
<div class="col-md-4"></div>
@endif
	<button class="btn btn-default" name="reset" type="reset">Reset</button>
	<button class="btn btn-success" name="update" type="submit">Update</button>
	<button class="btn btn-success" name="cancel" type="submit">Update</button>
</div>
</form>
@endsection