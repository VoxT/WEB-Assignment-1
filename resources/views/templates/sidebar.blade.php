

		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Điện Thoại Di Động</h2>
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
				
				@foreach($category as $cate)
					@if($cate->idDanhMucCha == '' && !is_null($cate->getSubCategory->first()))
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#{{$cate->idDanhMuc}}">
										<span class="badges pull-right"><i class="fa fa-plus"></i></span>
										{{$cate->tenLoaiDienThoai}}
									</a>
								</h4>
							</div>
							<div id="{{$cate->idDanhMuc}}" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
									@foreach($cate->getSubCategory as $sub)
										<li><a href="{{ url('product-'.$sub->idDanhMuc) }}">{{ $sub->tenLoaiDienThoai }}</a></li>
									@endforeach
									</ul>
								</div>
							</div>
						</div>
					@else 
						@if($cate->idDanhMucCha == '')
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{ url('product-'.$cate->idDanhMuc) }}">{{$cate->tenLoaiDienThoai}}</a></h4>
							</div>
						</div>
						@endif
					@endif
				@endforeach

				</div><!--/category-products-->
			
				<div class="brands_products"><!--brands_products-->
					<h2>Thương hiệu</h2>
					<div class="brands-name">
						<ul class="nav nav-pills nav-stacked">
						@foreach($category as $cate)
							@if($cate->idDanhMucCha == '')
							<li><a href="{{ url('product\band='.$cate->idDanhMuc) }}"> <span class="pull-right">
							<?php 
								$count = 0; 
								foreach ($cate->getSubCategory as $sub) {
									$count += $sub->getProducts->count();
								}
								echo $count;
							?>
							
							</span>{{$cate->tenLoaiDienThoai}}</a></li>
							@endif
						@endforeach
						</ul>
					</div>
				</div><!--/brands_products-->
				
				<div class="price-range"><!--price-range-->
					<h2>Giá bán</h2>
					<div class="well text-center">
						 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
						 <b class="pull-left">1 tr</b> <b class="pull-right">30 tr</b>
					</div>
				</div><!--/price-range-->
				
				<div class=" text-center"><!--shipping-->
					<img src="{{ asset('public/images/adv.jpeg') }}" alt="" />
				</div><!--/shipping-->
			
			</div>
		</div>
		
