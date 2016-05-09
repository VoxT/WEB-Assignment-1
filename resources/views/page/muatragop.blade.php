@extends('templates.master')
 
@section('content')

		<div class="container" id="order-form">
			<div class="col-md-12">
				<img class="img-responsive" style="margin-bottom: 20px; width: 100%;" src="{{ asset('public/images/dienthoaitragop.jpg')}}" alt="muatragop">
			</div>
			<div class="row">
				<div class="col-md-10 col-sm-12 col-md-offset-1">
					<div class="review-payment">
						<h2>Hướng dẫn Mua Trả Góp</h2>
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop1.png')}}" alt="xida" class="img-responsive" style=" width: 100%">
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop2.png')}}" alt="xida" class="img-responsive" style=" width: 100%">
					</div>
					<div class="col-md-4">
						<img src="{{asset('public/images/thongtintragop3.png')}}" alt="xida" class="img-responsive" style=" width: 100%">
					</div>
					<div  style="text-align: center;">
						<button style="margin-top: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tìm Hiểu Thêm</button>

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
				<div class="col-sm-12">
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản Phẩm Trả Góp</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width: 183px; height: 161px;" src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div><div class="item ">	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width: 183px; height: 161px;" src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div><div class="item ">	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width: 183px; height: 161px;" src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div><div class="item ">	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width: 183px; height: 161px;" src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
@stop