@extends('admin.master_admin')
@section('content')
<div class="form-group col-md-3 col-md-offset-3">
  </div>
     <form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="{{route('search.user')}}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="key">
        </div>
        <button type="submit" class="btn btn-default" style="margin-top:5px">Tìm Kiếm</button>
    </form>
    <label>Tìm Thấy {{count($user)}} Kết Quả</label>
  <table class="table table-bordered">
    <thead>
    	<th>ID</th>
    	<th>Name</th>
    	<th>Email</th>
    	<th>Phone</th>
    	<th>Address</th>
    	<th>Action</th>
    </thead>
    <tbody>
    @foreach($user as $u)
    	<tr>
    		<td>{{$u->id}}</td>
    		<td>{{$u->full_name}}</td>
    		<td>{{$u->email}}</td>
    		<td>{{$u->phone}}</td>
    		<td>{{$u->address}}</td>
    		<td><a href="{{route('edit.user',$u->id)}}">Sửa</a>&nbsp;&nbsp;<a href="{{route('delete.user',$u->id)}}">Xóa</a></td>
    	</tr>  
    @endforeach
   </tbody>
  </table>
  <div class="row">{{$user->links()}}</div>
@endsection