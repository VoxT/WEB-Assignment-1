@extends('templates.master')
 
@section('content')

	<div class="container" id="cart_items">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{url('/home')}}">Home</a></li>
			  <li class="active">Thông Tin Cá Nhân</li>
			</ol>
		</div>
	<div class="row">

		<div class="col-md-4 col-sm-12 col-md-offset-2">
			<div class="review-payment">
				<h2>Thông Tin Tài Khoản</h2>
				@if ($errors->has('update_success'))
                    <span class="help-block">
                        <strong style="color: blue">{{ $errors->first('update_success') }}</strong>
                    </span>
                @endif
			</div>
			<div class="shopper-info">
				<form role="form" method="POST" action="{{ url('/userinfo') }}">
					{!! csrf_field() !!}
	                    <input type="text" name="name" placeholder="Tên" value="{{ $user->name }}" required="">
	                    @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
	           	 	<!--Email-->
	                    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required="" disabled>

	                <!--Password-->
	                    <input type="text" placeholder="Số Điện Thoại" name="number" value="{{ $user->sodienthoai}}">
	                    @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
	                <!--Comfirm Password-->
	                    <input type="text" placeholder="Địa Chỉ" name="diachi" value="{{ $user->diachi}}">
	                    @if ($errors->has('diachi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('diachi') }}</strong>
                            </span>
                        @endif
					<div class="info-form">
						<button type="submit" class="btn btn-default">Cập Nhật</button>
					</div>

				</form>
			</div>
		</div>	

		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>

		<div class="col-md-4 col-sm-12">
			<div class="review-payment">
				<h2>Thay Đổi Mật Khẩu</h2>
				@if ($errors->has('success'))
                    <span class="help-block">
                        <strong style="color: blue">{{ $errors->first('success') }}</strong>
                    </span>
                @endif
			</div>
			<div class="shopper-info">
				<form role="form" method="POST" action="{{ url('/userinfo/password') }}">
					{!! csrf_field() !!}
			            <input type="password" placeholder="Mật Khẩu Cũ" name="old_password" required="">
						@if ($errors->has('old_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
			            <input type="password" placeholder="Mật Khẩu Mới" name="newPassword" required="">
						@if ($errors->has('newPassword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('newPassword') }}</strong>
                            </span>
                        @endif
			            <input type="password" placeholder="Nhập Lại Mật Khẩu" name="password_confirmation" required="">
			            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
					<div class="info-form">
						<button type="submit" class="btn btn-default">Thay Đổi</button>
					</div>
		        </form>	
		    </div>
		</div>

	</div>

	<div class="review-payment">
		<h2>Thông Tin Đơn Đặt Hàng</h2>
	</div>

	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Sản Phẩm</td>
					<td class="description"></td>
					<td class="price">GIÁ</td>
					<td class="quantity" style="width: 200px;">Khuyến Mãi</td>
					<td class="total">Tình Trạng</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
			@foreach($orders as $order)
				<tr>
					<td class="cart_product">
						<a href="{{ url('product/'.$order->getProduct->idDienThoai) }}"><img src="{{ asset($order->getProduct->linkAnhDaiDien)}}" alt="{{$order->getProduct->ten}}"></a>
					</td>
					<td class="cart_description">
						<h4><a href="{{ url('product/'.$order->getProduct->idDienThoai) }}">{{$order->getProduct->ten}}</a></h4><br/>
						<p>Số Điện Thoại: {{ $order->number }}</p>
						<p> Địa Chỉ Giao: {{ $order->diachi }}</p>
					</td>
					<td class="cart_price">
						@if($order->getProduct->giamGia > 0)
						<p class="cart_total_price">
							<span style="text-decoration: line-through;"> {{ $order->getProduct->gia }}</span> </p>
						<p class="cart_total_price">
						{{ substr_replace(
							substr_replace( strval(intval($order->getProduct->gia*1000000) - intval($order->getProduct->gia*1000000)*$order->getProduct->giamGia/100), '.', -3,0), '.', -7, 0) }}
						</p>
						@else
						<p class="cart_total_price">{{$order->getProduct->gia}}</p>
						@endif
					</td>
					<td >
						<p>{{$order->getProduct->khuyenMai}}</p>
					</td>
					<td>
						@if($order->trangThaiThanhToan == 0)
							<p>Chưa Xác Nhận</p>
						@else @if($order->trangThaiThanhToan == 1) <p>Đang Giao Hàng</p>
								@else <p>Đã Giao Hàng</p>
						@endif
						@endif

					</td>
					@if($order->trangThaiThanhToan == 0)
					<td class="cart_del ete">
						<form id="deleteOrder" action="{{ url('userinfo/deleteOrder') }}" method="post">
							{!! csrf_field() !!}
							<input type="hidden" value="{{$order->idGiaoDich}}" name="id"></input>
							<a onclick="this.parentNode.submit(); return false;" class="cart_quantity_delete" href="" title="Huỷ Đơn Đặt"><i class="fa fa-times"></i></a>
						</form>
					</td>
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop