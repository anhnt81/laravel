@extends('admin.master_admin')
@section('content')
<div class="panel panel-default">
	<div class="panel panel-header">
		<h2>Danh Sách Đơn Hàng Đã Thanh Toán</h2>
	</div>
	<table class="table table-bordered">
		<thead>
			<th>ID</th>
			<th>Bill</th>
			<th>Customer</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Total</th>
			<th>Payment</th>
			<th>Note</th>
			<th>Details</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($bills as $bill)
			<tr>
				<td id="id">{{$bill->id}}</td>
				<td>{{$bill->id_bill}}</td>
				<td>{{$bill->name_customer}}</td>
				<td>{{$bill->name}}</td>
				<td>{{$bill->quantity}}</td>
				<td>{{$bill->unit_price}}</td>
				<td>{{$bill->total}}</td>
				<td>{{$bill->payment}}</td>
				<td>{{$bill->note}}</td>
				<td><a href="">Chi Tiết</a></td>
				<td><a href="{{route('delete.bills',$bill->id)}}">Xóa</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row">{{$bills->links()}}</div>
@endsection
