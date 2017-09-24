@extends('admin.master_admin')
@section('content')
<form class="form-horizontal" method="post" action="{{route('created.type')
}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h4>Product Type Information</h4>
    <div class="form-group">
        <div class="col-sm-7 col-md-offset-4">
            <img src="" height="150px" width="150px">
       </div>
       <div class="col-md-4">
           
       </div>
           <input type="file" name="image" id="file" multiple="">
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label">Name</label>
        <div class="col-sm-7 col-md-8">
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label">Description</label>
        <div class="col-sm-7 col-md-8">
            <input type="text" class="form-control" name="description">
        </div>
    </div>
    <div class="col-md-4"></div>
    @if(Session::has('message'))
    <p style="color:red">{{Session::get('message')}}</p>
    <div class="col-md-4"></div>
    @endif
    <div>
        <button class="btn btn-default" type="reset">Reset</button>
        <button class="btn btn-success" type="submit">Add</button>
    </div>
</form>
@endsection