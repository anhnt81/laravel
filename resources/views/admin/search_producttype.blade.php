@extends('admin.master_admin')
@section('content')
<div class="form-group col-md-3 col-md-offset-3">
  </div>
     <form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="{{route('search.type')}}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="key" id="key">
        </div>
        <button type="submit" class="btn btn-default" style="margin-top:5px">Tìm Kiếm</button>
    </form>
    <label>Tìm Thấy {{count($types)}} Kết Quả</label>
  <table class="table table-bordered">
    <thead>
    	<th>ID</th>
    	<th>Name</th>
    	<th>Description</th>
    	<th>Image</th>
      <th>Action</th>
    </thead>
    <tbody>
    @foreach($types as $type)
    	<tr>
    		<td>{{$type->id}}</td>
    		<td>{{$type->name}}</td>
    		<td>{{$type->description}}</td>
    		<td><img src="{{asset($type->image)}}" height="50px" width="50px"></td>
    		<td><a href="{{route('edit.type',$type->id)}}">Sửa</a>&nbsp;&nbsp;<a href="">Xóa</a></td>
    	</tr>  
    @endforeach
   </tbody>
  </table>
  <div class="row">{{$types->links()}}</div>
@endsection