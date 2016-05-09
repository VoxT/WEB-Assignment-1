<header>
        <div id="header_middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="logo_company"><a href="{{ url('home') }}"><img class="img-responsive" src="{{ asset('public/images/logo.png') }}" alt="logo"></a></div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#tel">
                                        <img class="icon-img" src="{{ asset('public/images/tel-icon.png') }}" alt="none">
                                        <div class="caption">Hot Line</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#gift"><img class="icon-img" src="{{ asset('public/images/gift-icon.png') }}" alt="none">
                                    <div class="caption">Quà Tặng</div></a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail">
                                    <a href="#location"><img class="icon-img" src="{{ asset('public/images/location-icon.png') }}" alt="none">
                                    <div class="caption">Địa Điểm</div></a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="thumbnail"> 
                                    <a href="#cart"><img class="icon-img" src="{{ asset('public/images/shopping-icon.png') }}" alt="none">
                                    <div class="caption">Mua Sắm</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="search_box">
                        <form action="{{url('search')}}">
                            <input type="text" placeholder="Tìm Kiếm" name="keyword">
                        </form>
                        </div>
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}"><i class="fa fa-lock"> </i> Đăng Nhập</a>
                    @else  
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }} @if(Auth::user()->isAdmin()) ( admin ) @endif<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-link" href="{{ url('/userinfo') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin cá nhân</a></li>
                                @if(Auth::user()->isAdmin())
                                <li><a class="dropdown-link" href="{{ url('/manager') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Quản Trị Trang</a></li>
                                @endif
                                <li><a class="dropdown-link" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
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
                        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{ url('home') }}">Trang Chủ</a></li>
                        <li class="{{ Request::segment(1) === 'hotProducts' ? 'active' : null }}"><a href="{{ url('hotproduct') }}">Sản Phẩm Hot</a></li>
                        <li class="{{ Request::segment(1) === 'khuyenmai' ? 'active' : null }}"><a href="#follow">Khuyến Mãi</a></li>
                        <li class="{{ Request::segment(1) === 'tragop' ? 'active' : null }}"><a href="{{ url('tragop') }}">Trả Góp</a></li>
                        <li class="{{ Request::segment(1) === 'service' ? 'active' : null }}"><a href="#contact">Dịch Vụ</a></li>
                        <li class="{{ Request::segment(1) === 'news' ? 'active' : null }}"><a href="#contact">Tin Tức</a></li>
                        <li class="{{ Request::segment(1) === 'humanresource' ? 'active' : null }}"><a href="#contact">Tuyển Dụng</a></li>
                        <li class="{{ Request::segment(1) === 'help' ? 'active' : null }}"><a href="#hotro">Hỗ Trợ</a></li>
                    </ul>
                 </div>
            </div>
        </div>
    </header>