<header>
        <div id="header_middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="logo_company"><img class="img-responsive" src="public/images/logo.png" alt="logo"></div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#tel">
                                        <img class="icon-img" src="public/images/tel-icon.png" alt="none">
                                        <div class="caption">Hot Line</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#gift"><img class="icon-img" src="public/images/gift-icon.png" alt="none">
                                    <div class="caption">Quà Tặng</div></a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#location"><img class="icon-img" src="public/images/location-icon.png" alt="none">
                                    <div class="caption">Địa Điểm</div></a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail"> 
                                    <a href="#cart"><img class="icon-img" src="public/images/shopping-icon.png" alt="none">
                                    <div class="caption">Mua Sắm</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="search_box">
                            <input type="text" placeholder="Tìm Kiếm">
                        </div>
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}"><i class="fa fa-lock"> </i> Đăng Nhập</a>
                    @else  
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-link" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                                <li><a class="dropdown-link" href="{{ url('/userinfo') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin cá nhân</a></li>
                            </ul>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        

        <div class="navbar-inverse header-bottom" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Trang Chủ</a></li>
                        <li><a href="#follow">Sản Phẩm Hot</a></li>
                        <li><a href="#contact">Trả Góp</a></li>
                        <li><a href="#follow">Khuyến Mãi</a></li>
                        <li><a href="#contact">Dịch Vụ</a></li>
                        <li><a href="#contact">Tin Tức</a></li>
                        <li><a href="#contact">Tuyển Dụng</a></li>
                        <li><a href="hotro.html">Hỗ Trợ</a></li>
                    </ul>
                 </div>
            </div>
        </div>
    </header>