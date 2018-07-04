<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('layouts.admin.template.head')
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form method="post" action="{{ url('/login') }}">
					{{csrf_field()}}
					<span class="login100-form-title p-b-32">
						 Login
					</span>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" >
						<input class="input100" type="text" name="email" >
						
						<span class="focus-input100"></span>
						<span class="text-danger">
                			  {{$errors->first('email')}}
          				</span>
						
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" >
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
						<span class="text-danger">
                			  {{$errors->first('password')}}
          				</span>


					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" value="Login">Login</button> 
					</div>

				</form>
			</div>
		</div>
	</div>
	

</body>
@include('layouts.admin.template.script')
</html>