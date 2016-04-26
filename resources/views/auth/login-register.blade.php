@extends('templates.master')
 
@section('content')

		<div class="container" id="form">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập Vào Tài Khoản</h2>
						<form action="{{ url('/login') }}" method="POST" role="form">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                            <input name="form_key" type="hidden" value="3iDjBLZ5bAa0OdC3" />

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class=" input-text required-entry validate-email" id="login-email" name="email" placeholder="Email" value="{{ old('email') }}" required />

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="input-text required-entry" id="login-password" name="password" placeholder="Mật Khẩu" required />

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <span class="help-block"><a href="https://www.aceandtate.com/customer/account/forgotpassword">Quên Mật Khẩu?</a></span>
                            </div>

							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi Nhớ Đăng Nhập
							</span>
							<button type="submit" name="send" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
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