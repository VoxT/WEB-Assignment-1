@extends('templates.master')
 
@section('content')

		<div class="container" id="order-form">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
                    <div class="product-information">
                        <a href="{{ url('product/'.$product->idDienThoai)}}">
	                        <img src="{{ asset($product->linkAnhDaiDien) }}" alt="{{$product->ten}}">
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
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Thông Tin Người Mua</h2>
						<form role="form" method="POST" action="{{ url('/order/pid='.$product->idDienThoai) }}">
							{!! csrf_field() !!}
							<div class="form-group">

							<input type="hidden" name="idDienThoai"value="{{ $product->idDienThoai }}">
							@if(!is_null($user))
                                <input type="hidden" name="idUser"value="{{ $user->id }}">
                                <input type="text" name="name" placeholder="Họ Tên" value="{{ $user->name }}" required="">
                            @else
                                <input type="hidden" name="idUser"value="">
                                <input type="text" name="name" placeholder="Họ Tên" required="">
                            @endif
                       	 	</div>
                       	 	<!--Email-->
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        	@if(!is_null($user))
	                                <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required="">
	                            @else
	                                <input type="email" name="email" placeholder="Email" required="">
	                            @endif
	                        </div>

	                        <!--Password-->
	                        <div class="form-group">
	                        	@if(!is_null($user))
	                                <input type="text" placeholder="Số điện thoại" name="number" required="Bắt buộc" value="{{ $user->sodienthoai}}">
	                            @else
	                                <input type="text" placeholder="Số điện thoại" name="number" required="Bắt buộc">
	                            @endif
	                        </div>
	                        <!--Comfirm Password-->
	                        <div class="form-group">
	                        	@if(!is_null($user))
	                                <input type="text" placeholder="Địa chỉ nhận hàng" name="diachi" required=""value="{{ $user->diachi}}"> 
	                            @else
	                                <input type="text" placeholder="Địa chỉ nhận hàng" name="diachi" required="">
	                            @endif
	                        </div>

							<button type="submit" class="btn btn-default">Đặt Hàng</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
@stop