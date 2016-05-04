@extends('templates.master')
 
@section('content')

	<div class="container" id="cart_items">

	

	<div class="review-payment">
		<h2>Review &amp; Payment</h2>
	</div>

	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Sản Phẩm</td>
					<td class="description"></td>
					<td class="price">GIÁ</td>
					<td class="quantity">Khuyến Mãi</td>
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
						<p class="cart_total_price">{{$order->getProduct->gia}}</p>
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
						<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
					</td>
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop