<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

   
    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
	<link href="{{ asset('css/seo-style.css') }}" rel="stylesheet">
	
	<!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=1.4.0') }}"rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset ('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
	
	<style>
	
	.login{
		
		opacity:1;
		animation: show 2s linear ;
	
	}
	@keyframes show {
	0% 
	{
		opacity:0;

	}
	50% 
	{
		
		opacity:0;
		
	}
	90% 
	{
	
		opacity:0;
	
	}
	100%
	{
	
		opacity:1;
		
	}
	}
	
	.logotipo
	{
		
		max-width: 700px; 
		height: 300px;  
		display: block;
		margin-left: auto;
		margin-right: auto;
		position:relative;
		top:10px;
		animation: zoom 2s linear ;
		transform: scale(1.0);
		z-index:2;
	}

	@keyframes zoom {
	0% 
	{
		opacity:0;
		transform: scale(4.5);
	}
	50% 
	{
		top:200px;
		opacity:1;
		transform: scale(1.0);
	}
	60% 
	{
		top:200px;
		opacity:1;
		transform: scale(1.0);
	}
	100%
	{
		top:10px;
		opacity:1;
		transform: scale(1.0);
	}
	}

	</style>

</head>
<body>
	<div class="container" style=" width: 100vw; height: 100vh; background: none; display: flex; flex-direction: row;justify-content: center; align-items: center">
		<div class="box" style="width: 30%; background: none">
			<form method="POST" action="{{ route('login') }}">
				<div class="content" style="">
					<div class="container-fluid" >
						 <img class="logotipo" src="{{url('img/logo.png ')}}" style="max-width: 700px; height: 130px;  display: block;margin-left: auto;margin-right: auto;">
					<div>
				</div>
			@csrf
				<br>
				<div class="login">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="card">
								<div class="header">
									
									<h4 class="title">Login</h4>
									
								</div>
								<div class="content">
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

												@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
												@endif
											</div>
										</div>
									</div>
											
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
														
												@if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
												@endif
											</div>
										</div>	
									</div>
											
									<div class="form-group row">
										<div class="col-md-6 offset-md-4">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
													{{ __('Lembrar') }}
												</label>
											</div>
										</div>
									</div>
											
									<button type="submit" class="btn btn-info btn-fill pull-right" value="entrar" style="background-color:#2e4b86; border-color:#21345b">Logar</button>
											
									@if (Route::has('password.request'))
									<a class="btn btn-default btn-block" style="width: 40%;" href="{{ route('password.request') }}">
										{{ __('Esqueceu a Senha?') }}
									</a>
									@endif
									
									<div class="clearfix"></div>
										
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
</body>

 <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}" ></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('js/demo.js') }}"></script>
</html>