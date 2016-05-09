@extends('templates.master')
 
@section('content')
	<div class="container">
		@if(Request::segment(1) != 'home')
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{url('/home')}}">Home</a></li>
			  <li class="active">{{$title}}</li>
			</ol>
		</div>
		@endif
		<div class="row">
			@if(isset($category))
				@include('templates.sidebar')
				<div class="col-sm-9 padding-right">
			@else
				<div class="col-sm-12">
			@endif		
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{ $title }}</h2>

					@if($products->count() > 0)
						@foreach($products as $product)
							@if(isset($category))
								<div class="col-sm-4">
							@else
								<div class="col-sm-3">
							@endif	
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset( $product->linkAnhDaiDien )}}" alt="{{ $product->ten }}" />
											@if($product->giamGia > 0)
											<p style="margin-bottom: -20px; text-decoration: line-through;">{{ $product->gia }}</p>
											<h2>{{ substr_replace(
												substr_replace( strval(intval($product->gia*1000000) - intval($product->gia*1000000)*$product->giamGia/100), '.', -3,0), '.', -7, 0) }}</h2>
											@else
											<h2>{{ $product->gia }}</h2>
											@endif
											<p>{{ $product->ten }}</p>
											<a href="{{ url('product/p-'.$product->idDienThoai) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												@if($product->giamGia > 0)
												<p style="margin-bottom: -20px; text-decoration: line-through;">{{ $product->gia }}</p>
												<h2>{{ substr_replace(
												substr_replace( strval(intval($product->gia*1000000) - intval($product->gia*1000000)*$product->giamGia/100), '.', -3,0), '.', -7, 0) }}</h2>
												@else
												<h2>{{ $product->gia }}</h2>
												@endif
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
										<li><a href="{{ url('product/'.$product->idDienThoai) }}">
												<i class="fa fa-cart-plus" aria-hidden="true"></i>{{$product->getOrder->count()}} Đã Mua</a></li>
										<li><a href="{{ url('product/'.$product->idDienThoai) }}">
												<i class="fa fa-mobile" aria-hidden="true"></i> {{$product->soLuong - $product->getOrder->count()}} Còn Lại</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					@else
						<div class="single-products text-center">
							<img src="{{ asset('public/images/empty.jpg') }}">
						</div>
					@endif
					</div><!--features_items-->
					
					
			</div>

		</div>
	</div>

@stop