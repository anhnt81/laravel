@extends('master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="beta-products-list">
			<div class="space60">&nbsp;</div>
				<h4>Sản Phẩm Khuyến Mãi</h4>
				<div class="beta-products-details">
					<div class="clearfix"></div>
				</div>
				<div class="row">
					@foreach($sanpham_khuyenmai as $km)
					<div class="col-sm-3">
						<div class="single-item">
							@if($km->promotion_price!=0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<div class="single-item-header">
								<a href="{{route('sanpham',$km->id)}}"><img src="{{$km->image}}" alt="" height="250px"></a>
							</div>
							<div class="single-item-body">
								<p class="single-item-title">{{$km->name}}</p>
								<p class="single-item-price" style="font-size:15px">
									<span class="flash-del">{{number_format($km->unit_price)}} đồng</span>
									<span class="flash-sale">{{number_format($km->promotion_price)}} đồng</span>
								</p>
							</div>
							<div class="single-item-caption">
								{{-- @if(Auth::Check()) --}}
								<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$km->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<a class="beta-btn primary" href="{{route('sanpham',$km->id)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row">{{$sanpham_khuyenmai->links()}}</div>
			</div> <!-- .beta-products-list -->
		</div>
	</div>
</div>
<br>
@endsection