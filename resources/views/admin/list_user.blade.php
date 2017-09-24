@extends('admin.master_admin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="col-md-3">
<form action="{{route('created.user')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <a href="#" data-toggle="modal" data-target="#myModal" id="adduser" class="btn btn-default" style="margin-top:12px"><i  class="fa fa-plus"></i>Thêm User</a>
  <div class="modal fade" tabindex="-1" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
          <p>Name<input type="text" name="name" id="name" class="form-control"></p>
          <p>Email<input type="email" name="email" id="email" class="form-control"></p>
          <p>Password
            <div class="form-group"><input type="password" name="password" id="password"></div></p>
            <p>Phone<input type="text" name="phone" id="phone" class="form-control"></p>
            <p>Address<input type="text" name="address" id="address" class="form-control"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none">Close</button>
            <button type="button" class="btn btn-primary" style="display: none">Save changes</button>
            <button class="btn btn-primary" id="addButton">Add</button> 
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
</div>
<div class="form-group col-md-4">
</div>
<div class="col-md-5">
<form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="{{route('search.user')}}">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search" name="key" id="key">
  </div>
  <button type="submit" class="btn btn-default" style="margin-top:5px">Tìm Kiếm</button>
</form>
</div>
<table class="table table-bordered">
    <thead> 
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th style="text-align: center">Action</th>
  </thead>
  @foreach($users as $user)
  <tbody class="list">
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->full_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->address}}</td>
        <td><center><a href="{{route('edit.user',$user->id)}}">Sửa
        </a>&nbsp;<a href="{{route('delete.user',$user->id)}}">Xóa</a></center>
        </td>
        </tr>
    </tbody>
    @endforeach
</table>
@if(Session::has('message'))
<div class="col-md-4"></div><p style="color:red">{{Session::get('message')}}</p>
@endif
<div class="row">{{$users->links()}}</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#adduser').click(function(){
            $('myModal').modal('show');
        });
        $('#addButton').click(function(){
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var address = $('#address').val();

            var data = {'name' : name,'email' : email, 'password' : password,'phone' : phone , 'address': address };
            var url: "created.user";
            $.ajax({
                url: "created.user",
                dataType:"text",
                data: data,
                success:function(data){
                console.log(data);
                }.fail(function () {
                    alert('Fail');
                });
            });
                $.post(
                    'list.user',{'name' : name,'email' : email, 'password' : password,'phone' : phone , 'address': address,'_token':$('input[name=_token]').val()},function(data){
                        console.log(data);
                    }
                    );
        });
        $('#key').keyup(function(event){
          console.log($('#key').val());
          $.ajax({
            url: "search.user",
            dataType:"text",
            data:{
              data:$('#key').val()
            },
            success:function(data){
              console.log(data);
            }
          });
        });
    });

</script>
@endsection
