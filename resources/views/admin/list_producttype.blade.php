@extends('admin.master_admin')
@section('content')
<div class="col-md-3">
<form enctype="multipart/form-data" action="{{route('created.type')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="#" data-toggle="modal" data-target="#myModal" id="addtype" class="btn btn-default" style="margin-top:15px"><i  class="fa fa-plus"></i>Thêm Loại Sản Phẩm</a>
  <div class="modal fade" tabindex="-1" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add ProductType</h4>
        </div>
        <div class="modal-body">
            <p>Image<input type="file" name="image" id="file" multiple=""></p>
            <p>Name<input type="text" name="name" id="name" class="form-control"></p>
            <p>Description<input type="text" name="description" id="description" class="form-control"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none">Close</button>
          <button type="button" class="btn btn-primary" style="display: none">Save changes</button>
          <button type="submit" class="btn btn-primary" id="addButton">Add</button>
      </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#addButton').submit(function(event){
      var name = $('#name').val();
      var image = $('#file').val();
      var description = $('#description').val();
      $.post(
        'list.producttype',{'image' : image,'name' : name, 'description' : description, '_token':$('input[name=_token]').val()},function(data){
          console.log(data);
      }
      );
  });
});
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
<div class="col-md-4"></div>
<div class="col-md-5">
<form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="{{route('search.type')}}">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="key">
</div>
<button type="submit" class="btn btn-default" style="margin-top:5px">Tìm Kiếm</button>
</form>
</div>
<table class="table table-bordered">
  <thead>
     <th>ID</th>
     <th>Name</th>
     <th>Description</th>
     <th>Image</th>
     <th>Action</th>
 </thead>
 @foreach($types as $type)
 <tbody>
     <tr>
        <td>{{$type->id}}</td>
        <td>{{$type->name}}</td>
        <td>{{$type->description}}</td>
        <td><img src="{{asset($type->image)}}" height="50px" width="50px"></td>
        <td><a href="{{route('edit.type',$type->id)}}">Sửa</a>&nbsp;&nbsp;<a href="{{route('delete.type',$type->id)}}">Xóa</a></td>
    </tr>
</tbody>
@endforeach
</table>
<div class="form-group col-md-3" style="margin-top:10px">
  @if(Session::has('message'))
  <p>{{Session::get('message')}}</p>
  @endif
</div>
<div class="row">{{$types->links()}}</div>
@endsection