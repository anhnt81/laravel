@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$loai->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" style="font-weight:bold">
					<a href="{{route('trang-chu')}}">Home</a>/<span>{{$loai->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>  
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($loai_sp as $loai)
							<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($sp_theoloai)}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_theoloai as $loai_sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($loai_sp->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('sanpham',$loai_sp->id)}}"><img src="{{$loai_sp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="font-size:13px;font-weight:bold" >{{$loai_sp->name}}</p>
											<p class="single-item-price" style="font-size:16px">
												@if($loai_sp->promotion_price==0)
												<span class="flash-sale">{{number_format($loai_sp->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($loai_sp->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($loai_sp->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$loai_sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có Tất Cả {{count($sanpham_khac)}} Sản Phẩm Khác </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sanpham_khac as $sp_khac)
								<div class="col-sm-4">
									<div class="single-item">
									@if($sp_khac->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('sanpham',$sp_khac->id)}}"><img src="{{$sp_khac->image}}" alt="" height="250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="font-size:13px;font-weight:bold">{{$sp_khac->name}}</p>
											<p class="single-item-price" style="font-size:16px">
												@if($sp_khac->promotion_price==0)
												<span class="flash-sale">{{number_format($sp_khac->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($sp_khac->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sp_khac->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$sp_khac->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sanpham_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection