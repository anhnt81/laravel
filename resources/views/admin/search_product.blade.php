@extends('admin.master_admin')
@section('content')
<div class="form-group col-md-3 col-md-offset-3">
  </div>
     <form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="{{route('search.product')}}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword">
        </div>
        <button type="submit" class="btn btn-default" style="margin-top:5px">Tìm Kiếm</button>
    </form>
<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>ID_Type</th>
        <th>Description</th>
        <th>Unit_Price</th>
        <th>Promotion_Price</th>
        <th>Unit</th>
        <th>New</th>
        <th>Image</th>
        <th>Action</th>
    </thead>
        <tbody>
    @foreach($products as $product)
         <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->id_type}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->unit_price}}</td>
          <td>{{$product->promotion_price}}</td>
          <td>{{$product->unit}}</td>
          <td>{{$product->new}}</td>
          <td><img src="{{asset($product->image)}}" height="50px" width="50px"></td>
          <td><a href="{{route('edit.product',$product->id)}}">Sửa</a>&nbsp;&nbsp;<a href="{{route('delete.product',$product->id)}}">Xóa</a></td>
      </tr>
    @endforeach
        </tbody>
</table>
  <div class="row">{{$products->links()}}</div>
@endsection