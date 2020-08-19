<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SEO') }}</title>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

   
    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/seo-style.css') }}" rel="stylesheet">-->
	
	<!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	
	<link rel="stylesheet" media="screen" href="{{ asset('css/polygon/polygon_bg.css') }}">


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
	
	<!--   Core JS Files   -->
    <!--<script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"type="text/javascript"></script>-->

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <!-- <script src="{{ asset('js/bootstrap-notify.js') }}"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<!--<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}" ></script>-->

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<!--<script src="{{ asset('js/demo.js') }}"></script>-->
	
	<style>

@keyframes gradient {
    0% {background-position: 0%}
    100% {background-position: 100%}
}
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

	img{
  max-width:100%;
  height:auto;
  display:none;
}





@media screen and (max-width: 700px) {
  .column {
    width: 100%;
  }
  img{
    display:block;
  }
  .left {
  background:none;

  }

  #gradient {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: #836997;
}

#note {
  position: absolute;
  left: 20px;
  top: 20px;
}

#note a {
  display: block;
  padding: 4px 5px;
  background: #fff;
  color: #000;
  font: 12px/1 sans-serif;
  text-decoration: none;
}

#note a:hover {
  background: #ccc;
}

}

html, body {
        height: 100%;
        width: 100%;
        margin: 0;
    }
    #site-landing {
        position:relative;
        height: 100%;
        width: 100%;
		
        background-color:#fff;
	}
	
	
	
	</style>

</head>
<body>
	<!-- polygon_bg -->

	<!-- count particles -->
	<div class="count-particles" hidden>
	<span class="js-count-particles" hidden>--</span> particles
	</div>

	<!-- particles.js container -->
	<div id="particles-js" style="position:relative; z-index:1;"></div>
	<!-- scripts -->

	<script src="{{ asset('js/polygon/particles.js') }}"></script>
	<script src="{{ asset('js/polygon/polygon_bg.js') }}"></script>
	<script src="{{ asset('js/polygon/lib/stats.js') }}"></script>
	<script>
	var count_particles, stats, update;
	stats = new Stats;
	stats.setMode(0);
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.left = '0px';
	stats.domElement.style.top = '0px';
	document.body.appendChild(stats.domElement);
	count_particles = document.querySelector('.js-count-particles');
	update = function() {
		stats.begin();
		stats.end();
		if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
		count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
		}
		requestAnimationFrame(update);
	};
	requestAnimationFrame(update);
	</script>
	
	<!--end bg polygon -->


	<div class="container" style="position:absolute;width: 100vw; height: 100vh; background: none; display: flex; flex-direction: row;justify-content: center; align-items: center; z-index:1;position: absolute;top: 0;left: 0;">
	
	<div class="box" style="width: 30%; background: none; ">
			<form method="POST" action="{{ route('login') }}">
				<div class="content" style="">
					<div class="container-fluid" >
					<div class="row">
  						<img class="logotipo" src="{{url('img/logo.png ')}}" style=" max-width: 700px; height: 140px;  display: block;margin-left: auto;margin-right: auto; ">
					<div>
				</div>
			@csrf
				<br>
				<div class="login" style="min-width:300px;">
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
										
									<!--
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
									-->
									
									<button type="submit" class="btn btn-info btn-fill pull-right" value="entrar" style="background-color:#2e4b86; border-color:#21345b;z-index:3">Logar</button>
											
									@if (Route::has('password.request'))
									<!--<a class="btn btn-default btn-block" style="width: 40%;" href="{{ route('password.request') }}">
										{{ ('Esqueceu a Senha?') }}
									</a>-->
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

 
</html>