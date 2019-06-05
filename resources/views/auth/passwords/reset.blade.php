<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reestablecer contraseña</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css4/util.css">
	<link rel="stylesheet" type="text/css" href="/css4/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/images/bg-01.jpg');" {{ __('Reset Password') }}>
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
                    Reestablecer contraseña
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('password.update') }}">
                     <input type="hidden" name="token" value="{{ $token }}">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input id="email"  type="text"  class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Correo" required="" value="{{ old('email') }}" required autofocus>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						  @if ($errors->has('email'))
                		<span class="invalid-feedback" role="alert">
                   		 <strong>{{ $errors->first('email') }}</strong>
               			</span>
           			 	@endif
					</div>
	                	<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input   id="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Contraseña"  required="Este campo es obligatorio">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						   @if ($errors->has('password'))
                 			 <span class="invalid-feedback" role="alert">
                 				 <strong>{{ $errors->first('password') }}</strong>
                 			 </span>
            				@endif
					</div>
									<div class="wrap-input100 validate-input" data-validate="Enter password" {{ __('Confirm Password') }}>
												<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                                <input id="password-confirm" type="password" class="input100" name="password_confirmation"  placeholder="Confirmar contraseña" required>
                           
                        </div>


					<div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="btn btn-primary"{{ __('Reset Password') }}>Reestablecer contraseña</button>			
                        </div>
					

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/daterangepicker/moment.min.js"></script>
	<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/js/main3.js"></script>

</body>
</html>