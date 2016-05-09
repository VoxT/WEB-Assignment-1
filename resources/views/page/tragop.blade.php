@extends('templates.master')
 
@section('content')

		<div class="container" id="order-form">
			<div class="col-md-12">
				@if(isset($product))
				<img class="img-responsive" style="margin-bottom: 20px;" src="{{ asset('public/images/muatragop.jpg')}}" alt="muatragop">
				@else 
				<img class="img-responsive" style="margin-bottom: 20px; width: 100%;" src="{{ asset('public/images/dienthoaitragop.jpg')}}" alt="muatragop">
				@endif
			</div>
			<div class="row">
				@if(isset($product))
				<div class="col-sm-4">
					<div class="review-payment">
						<h2>Thông Tin Sản Phẩm</h2>
					</div>
                    <div class="product-information">
                        <a href="{{ url('product/'.$product->idDienThoai)}}">
	                        <img src="{{ asset($product->linkAnhDaiDien) }}" style="margin-left: 5px;" alt="{{$product->ten}}">
	                        <h2>{{$product->ten}}</h2>
	                    </a>
                        @if($product->giamGia > 0)
						<h4 style="color: red; display: inline;"> Giá: 
							<span style="color: blue; text-decoration: line-through;"> {{ $product->gia }}</span> <span> {{ substr_replace(
							substr_replace( strval(intval($product->gia*1000000) - intval($product->gia*1000000)*$product->giamGia/100), '.', -3,0), '.', -7, 0) }}</span></h4>
						@else
						<h4 style="color: red;">Giá: {{ $product->gia }}</h4>
						@endif
                        <h5>Quà Khuyến Mãi:</h5>
                        <p>{{$product->khuyenMai}}</p>
                    </div>
				</div>
				<div class="col-sm-8">
				@else 
				<div class="col-md-10 col-sm-12 col-md-offset-1">
				@endif
					<div class="review-payment">
						<h2>Hướng dẫn Mua Trả Góp</h2>
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop1.png')}}" alt="xida" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop1.png')}}" alt="xida" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop1.png')}}" alt="xida" class="img-responsive">
					</div>
					<div  style="text-align: center;">
						<button style="margin-top: 20px;  margin-bottom: 50px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tìm Hiểu Thêm</button>

						<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						        <div class="modal-body" >
						            <img src="{{ asset('public/images/huongdan.jpg') }}" class="img-responsive">
						        </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
@stop