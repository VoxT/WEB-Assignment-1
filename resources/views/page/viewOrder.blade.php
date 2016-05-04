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
						<p>{{$product->gia}}</p>
					</td>
					<td >
						<p>{{$product->khuyenMai}}</p>
					</td>
					<td>
						<p>Chưa Xác Nhận</p>
					</td>
					<td class="cart_del ete">
						<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop