@extends('templates.master')
 
@section('content')
<div class="container" id="cart_items">
	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Sản Phẩm</td>
					<td class="description"></td>
					<td class="price">Giá</td>
					<td class="quantity">Khuyến Mãi</td>
					<td class="total">Tình Trạng</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="cart_product">
						<a href="{{ url('product/'.$product->idDienThoai) }}"><img src="{{ asset($product->linkAnhDaiDien)}}" alt="{{$product->ten}}"></a>
					</td>
					<td class="cart_description">
						<h4><a href="{{ url('product/'.$product->idDienThoai) }}">{{$product->ten}}</a></h4><br/>
						<p>Số Điện Thoại: {{ $order->number }}</p>
						<p> Địa Chỉ Giao: {{$order->diachi }}</p>
					</td>
					<td class="cart_price">
						@if($product->giamGia > 0)
						<p class="cart_total_price">
							<span style="text-decoration: line-through;"> {{ $product->gia }}</span> </p>
						<p class="cart_total_price">
						{{ substr_replace(
							substr_replace( strval(intval($product->gia*1000000) - intval($product->gia*1000000)*$product->giamGia/100), '.', -3,0), '.', -7, 0) }}
						</p>
						@else
						<p class="cart_total_price">{{$product->gia}}</p>
						@endif
					</td>
					<td >
						<p>{{$product->khuyenMai}}</p>
					</td>
					<td>
						<p>Chưa Xác Nhận</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop