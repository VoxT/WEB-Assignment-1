@extends('templates.master')
 
@section('content')

	<div class="container">
		
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div id="myCarousel"  class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					@foreach( preg_split("/((\r?\n)|(\r\n?))/", $product->listLinkAnhGioiThieu ) as $key => $line)
					 	<li data-target="#myCarousel" data-slide-to="{{$key + 1}}"></li>
					@endforeach
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					
						 <div class="item active">
							<img src="{{ asset( $product->linkAnhDaiDien )}}" alt="Gray01">
						 </div>
						@foreach( preg_split("/((\r?\n)|(\r\n?))/", $product->listLinkAnhGioiThieu ) as $line)
						 <div class="item">
							<img src="{{ asset($line) }}" alt="{{ $product->ten }}">
						 </div>
				  		@endforeach

					</div>
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					  <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					  <span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<h1>{{ $product->ten }}</h1>
						@if($product->giamGia > 0)
						<h3 style="color: red; display: inline;"> Giá: 
							<span style="color: blue; text-decoration: line-through;"> {{ $product->gia }}</span> <span> {{ substr_replace(
							substr_replace( strval(intval($product->gia*1000000) - intval($product->gia*1000000)*$product->giamGia/100), '.', -3,0), '.', -7, 0) }}</span></h3>
						@else
						<h3 style="color: red;">Giá: {{ $product->gia }}</h3>
						@endif
						<fieldset>
							<legend>Khuyến mãi</legend>
							<ul>
								<li> {{ $product->khuyenMai }}</li>
							</ul>
						</fieldset>
						<fieldset>
							<legend>Bao gồm</legend>
							<ul>
								<li>Bộ sản phẩm gồm: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng</li>
								<li>Bảo hành chính hãng: thân máy 12 tháng, pin 6 tháng, sạc 6 tháng </li>	
								<li>Giao hàng tận nơi miễn phí trong 30 phút</li>
							</ul>
						</fieldset>
					</div>
					<div class="col-sm-5">
						<a href="{{ url('order/pid='.$product->idDienThoai)}}" class="btn btn-blue btn-block btn-proceed-order" role="button" ><i class="fa fa-shopping-cart"></i>   MUA NGAY</a>
					</div>
					<div class="col-sm-5">
						<a href="{{ url('order/muatragop/pid='.$product->idDienThoai)}}" class="btn btn-blue btn-block btn-proceed-order tragop" role="button" ><i class="fa fa-shopping-cart"></i>   MUA TRẢ GÓP</a>
					</div>
				</div>
			</div>
		</div>
		
		<hr>
		{!! $product->thongSoKiThuat !!}

		<div class="col-md-8 col-sm-12">
			<div id="detail" class="carousel slide" data-ride="carousel">
				<h2>ĐẶC ĐIỂM NỔI BẬT</h2>
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  @foreach( preg_split("/((\r?\n)|(\r\n?))/", $product->linkListAnhMota ) as $key => $line)
					  @if($key == 0 )<li data-target="#detail" data-slide-to="0" class="active"></li>
					  @else <li data-target="#detail" data-slide-to="{{$key}}"></li>@endif
					@endforeach
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
				  	@foreach( preg_split("/((\r?\n)|(\r\n?))/", $product->linkListAnhMota ) as $key => $line)
					
					@if ($key == 0) 
					<div class="item active">
					@else 
					<div class="item">				
					@endif
						<img src="{{ asset($line) }}" alt="{{ $product->ten }}">
					 </div>
			  		@endforeach
			  
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#detail" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#detail" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<div class="col-md-8 col-sm-12">
			{!! $product->moTa !!}
		</div>

		<div style="clear: both;"></div>

		<div id="comment" >
			<div class="container">
				<div class="row">
					<div class="col-md-8  col-sm 12">
						<div class="response-area">
							<h2>Comments</h2>
							<div class="input-group"> 
			                    <input id="data" class="form-control comment-box" placeholder="Add a comment" type="text">
			                    <span class="input-group-addon">
			                        <button onclick="addComment()" class="btn-block"><i class="fa fa-edit"></i></button>  
									<input id="comment_id" type="hidden" value=""></input>
			                    </span>
			                </div>
							<ul class="media-list">
							@foreach($product->getComment as $data)
								@if(!isset($data->idBinhLuanCha))
								<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{ asset('public/images/user.jpg') }}" alt="">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i>{{ $data->getUser->name}}</li>
											<li><i class="fa fa-clock-o"></i>{{ date('H:m', strtotime($data->thoiGian))}}</li>
											<li><i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($data->thoiGian))}}</li>
										</ul>
										<p>{{$data->noiDung}}</p>
										<a class="btn btn-primary" href="" onclick="addComment()"><i class="fa fa-reply"></i>Replay</a>
										<input id="comment_idChild" type="hidden" value="{{$data->idBinhLuan}}"></input>
									</div>
								</li>
								@endif
								@if($data->getChildComment->count() > 0)
									@foreach($data->getChildComment as $data)
										<li class="media second-media">
											<a class="pull-left" href="#">
												<img class="media-object" src="{{ asset('public/images/user.jpg') }}" alt="">
											</a>
											<div class="media-body">
												<ul class="sinlge-post-meta">
													<li><i class="fa fa-user"></i>{{ $data->getUser->name}}</li>
													<li><i class="fa fa-clock-o"></i>{{ date('H:m', strtotime($data->thoiGian))}}</li>
													<li><i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($data->thoiGian))}}</li>
												</ul>
												<p>{{$data->noiDung}}</p>
												<a class="btn btn-primary" href="" onclick="addComment()"><i class="fa fa-reply"></i>Replay</a>
												<input id="comment_idChild" type="hidden" value="{{$data->idBinhLuan}}"></input>

											</div>
										</li>
									@endforeach
								@endif
							@endforeach
							</ul>					
						</div>
					</div>
					<div class="col-md-4 col-sm 12">
						
					</div>
				</div>
			</div>
		</div>
	</div>

@stop