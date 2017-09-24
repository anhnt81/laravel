@extends('master')
@section('content')
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
                    <div class="space60">&nbsp;</div>
						<div class="beta-products-list">
							<h5>Sản Phẩm Mới</h5>
							<div class="row" id="content">
							   @include('paginate.product')
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div>
			</div>
			<br>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page =($(this).attr('href').split('page=')[1]);
	        getProducts(page);
        });
    });
    function getProducts(page) {
        $.ajax({
            url : 'san-pham-moi?page='+ page,
        }).done(function (data) {
            console.log(data)
            $('#content').empty().html(data);
           location.hash = page;
        }).fail(function () {
            alert('Fail');
        });
    }

    </script>
@endsection