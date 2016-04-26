@extends('templates.master')
 
@section('content')

		<div class="container" id="form">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
                        <h2>Chưa Có Tài Khoản ?</h2>
                        <div class="register-login-box-body">
                            <a class="btn btn-blue btn-block btn-proceed-new-customer" title="I am a new customer" href="{{ url('/login') }}"><p>ĐĂNG NHẬP</p></a>
                        </div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Kí Tài Khoản Mới!</h2>
						<form role="form" method="POST" action="{{ url('/register') }}">
							{!! csrf_field() !!}
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" name="name" placeholder="Tên" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                       	 	</div>
                       	 	<!--Email-->
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

	                                @if ($errors->has('email') && Request::segment(1)=='register')
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                        </div>

	                        <!--Password-->
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                                <input type="password" placeholder="Mật Khẩu" name="password">

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                        </div>
	                        <!--Comfirm Password-->
	                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                                <input type="password" placeholder="Nhập Lại Mật Khẩu" name="password_confirmation">

	                                @if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                @endif
	                        </div>

							<button type="submit" class="btn btn-default">Đăng Kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
@stop