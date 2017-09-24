@extends('admin.master_admin')
@section('content')
<div class="panel panel-default">
	<div class="panel panel-header">
		<h2>Danh Sách Đơn Hàng Chưa Thanh Toán</h2>
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
			<th>Pay</th>
			<th>Details</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($bills as $bill)
			<tr>
				<td>{{$bill->id}}</td>
				<td>{{$bill->id_bill}}</td>
				<td>{{$bill->name_customer}}</td>
				<td>{{$bill->name}}</td>
				<td>{{$bill->quantity}}</td>
				<td>{{$bill->unit_price}}</td>
				<td>{{$bill->total}}</td>
				<td>{{$bill->payment}}</td>
				<td>{{$bill->note}}</td>
				<td><input value="Pay" type="button" name="click" id="click" onclick="pay({{$bill->id_bill}})" /></td>
				<td><a href="">Chi Tiết</a></td>
				<td><a href="{{route('delete.bills',$bill->id)}}">Xóa</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row">{{$bills->links()}}</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
	function pay(value) {
		var id = value;
		$.ajax({
			url : 'payProduct',
			data: {
				id : id
			},
			dataType:'text'
		}).done(function (data) {
			alert('Đã Thanh Toán')
			console.log(data)
			window.location.href = 'http://localhost:8000/admin/bills/viewbills/sold'
		}).fail(function () {
			alert('Fail');
		});
	}
</script>
@endsection