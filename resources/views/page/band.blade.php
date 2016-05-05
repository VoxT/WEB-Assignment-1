@extends('templates.master')
 
@section('content')

	<div class="container">
		<div class="row">
			@include('templates.sidebar')
			
			<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{ $title }}</h2>

						@foreach($band as $sub)
						@foreach($sub->getProducts as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset( $product->linkAnhDaiDien )}}" alt="{{ $product->ten }}" />
											<h2>{{ $product->gia }}</h2>
											<p>{{ $product->ten }}</p>
											<a href="{{ url('product/p-'.$product->idDienThoai) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{ $product->gia }}</h2>
												<p>{{ $product->ten }}</p>
												<a href="{{ url('product/'.$product->idDienThoai) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
											</div>
										</div>
										@if($product->giamGia > 0)
										<img src="{{ asset('public/images/sale.png') }}" class="new" alt="">
										@else
										@if( (strtotime($product->ngayTao) - strtotime(time())) > strtotime('24 hours ago') )
										<img src="{{ asset('public/images/new.png') }}" class="new" alt="">
										@endif
										@endif
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						@endforeach
						
					</div><!--features_items-->
			</div>
		</div>
	</div>

@stop