<!DOCTYPE html>
<head>
	<title>Login</title>
	<!-- CSS Login -->
	<!-- style CSS Login -->
	<link rel="stylesheet" href="{{asset('assets/css/stylee.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>

<body>
	<div class="body-background">
		<div class="modal-container">
			<div class="mb-3 text-center">
				<img src="{{ asset('logo_dinamika.png') }}" height="50" class="brand" />
			</div>
			<div class="title-bar">
				Log In
			</div>
			<div class="input-section">
				<div id="success-tick">
					<div class="success-graphic"><svg version="1.1" id="success-icon" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px"
							viewBox="0 0 80 80" enable-background="new 0 0 80 80" xml:space="preserve">
							<g id="circle">
								<path fill="#79B77E" d="M40,2c20.953,0,38,17.047,38,38S60.953,78,40,78S2,60.953,2,40S19.047,2,40,2 M40,0C17.909,0,0,17.909,0,40
		s17.909,40,40,40s40-17.909,40-40S62.091,0,40,0L40,0z" />
							</g>
							<polyline id="tick" fill="none" stroke="#79B77E" stroke-width="9" stroke-linecap="round"
								stroke-linejoin="round" stroke-miterlimit="10" points="
	56,29.469 34.618,50.851 24,40.234 " />
						</svg></div>
					<span class="success-text">Logging In...</span>
				</div>
				<form method="POST" action="{{ route('login') }}">
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					{{ csrf_field() }}
					<div class="input-fields">
						<input type="text" class="login-field" name="email" placeholder="Your Username">
						<input type="password" class="login-field last-field" name="password"
							placeholder="Your Password">
					</div>
					<div class="submit-section">
						<div class="forgot-pw">Forgot password?</div>
						<button type="submit" class="submit-button correct">
							Log In
						</button>
				</form>
			</div>
		</div>
	</div>
	</div>

	<!-- JS Login -->
	<!-- custom js -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>
</body>

</html>