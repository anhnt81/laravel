@extends('admin.master_admin')
@section('content')
@if(count($errors) > 0)
<ul>
@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form class="form-horizontal" method="post" action="{{route('update.type',$types->id)}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h4>Product Type Information</h4>
    <div class="form-group">
        <div class="col-sm-7 col-md-offset-4">
            <img src="{{ asset($types->image) }}" height="150px" width="150px">
       </div>
       <div class="col-md-4">
           
       </div>
           <input type="file" name="image" id="file" multiple="">
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label">ID</label>
        <div class="col-sm-7 col-md-8">
            <input type="text" class="form-control" name="id" value="{{$types->id}}" disabled="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label">Name</label>
        <div class="col-sm-7 col-md-8">
            <input type="text" class="form-control" name="name" value="{{$types->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label">Description</label>
        <div class="col-sm-7 col-md-8">
            <input type="text" class="form-control" name="description" value="{{$types->description}}">
        </div>
    </div>
    <div class="col-md-4"></div>
    @if(Session::has('message'))
    <p style="color:red">{{Session::get('message')}}</p>
    <div class="col-md-4"></div>
    @endif
    <div>
        <button class="btn btn-default" type="reset">Reset</button>
        <button class="btn btn-success" type="submit">Update</button>
    </div>
</form>
@endsection
