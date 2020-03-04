<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SEO - Sistema Eletrônico Orçamentário') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
 
    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
	<!--<link href="{{ asset('css/seo-home.css') }}" rel="stylesheet">-->
	
	<!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
	
	<link href="{{ asset('css/balloon.css') }}" rel="stylesheet"/>

	<link href="{{ asset('css/arrows.css') }}" rel="stylesheet">
	
	<link href="{{ asset('css/jquery.treegrid.css') }}" rel="stylesheet">
	

    <!--<link href="{{ asset('css/reveal-and-hide.css') }}" rel="stylesheet"/> -->
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=1.4.0') }}"rel="stylesheet"/>

	
	<!--Calendar-->
	<link href="{{ asset('fullcalendar/packages/core/main.css') }}"rel="stylesheet"/>
	<link href="{{ asset('fullcalendar/packages/daygrid/main.css') }}"rel="stylesheet"/>
	

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset ('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<!--   Core JS Files   -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/jquery.email-autocomplete.min.js') }}"type="text/javascript"></script>
	
	
	<script src="{{ asset('js/jquery.treegrid.min.js') }}"type="text/javascript"></script>
	
	<script src="{{ asset('js/alterar-saldo-dotacao.js') }}"type="text/javascript"></script>
	
	

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"type="text/javascript"></script>

    <!--  Notifications Plugin    -->
	<script src="{{ asset('js/bootstrap-notify.js') }}"type="text/javascript"></script>

 
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}"type="text/javascript"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('js/demo.js') }}"type="text/javascript"></script>
	
	<!-- Calendar! -->

 	<script src="{{ asset('fullcalendar/packages/core/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/daygrid/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/google-calendar/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/core/locales/pt-br.js') }}"type="text/javascript"></script>

	<style>

	/*Style for the first level menu bar*/



#menu{
  position:relative;
  width:100%;
  height:3em;
  margin:0px;
  padding:0 0px;
  box-shadow:0 -1px rgba(0,0,0,.5) inset;
}

#menu > li{
  float:left;
  list-style-type:none;
  position:relative;
}


label{
  height:3em;
  margin-left:0px;
  margin-right:0px;
  top:6px;
  position:relative;
  display:block;
  padding:0px 0px 0px 10px;
  line-height:2em;
  transition:background 0.5s;
}

label:after{
  content:"";
  position:relative;
  display:block;
  width:100%;
  height:0;
  transition:border-bottom .3s, border-top .3s .3s;
}

label:hover,
input:checked ~ label{},


input:checked ~ label:after{
  border-top:0 solid rgba(255,255,255,.5);
  border-bottom:4px solid rgba(255,255,255,.5);
  transition:border-top .1s, border-bottom .1s .1s;
  color: #fff;
}

input:checked ~ label:after{
  border-top:0 solid rgba(255,255,255,.5);
  border-bottom:4px solid rgba(255,255,255,.5);
  transition:border-top .1s, border-bottom .1s .1s;
  color: #fff;
}

/*hide the inputs*/
input{display:none;}

/*show the second levele menu of the selected voice*/
input:checked ~ ul.submenu{
  max-height:300px;
  transition:max-height 0.8s ease-in;
}

/*style for the second level menu*/
ul.submenu{
  margin-left:0px;
  margin-right:0px;
  max-height:0;
  padding:0;
  overflow:hidden;
  list-style-type:none;
  transition:max-height 0.8s ease-out;
  position:relative;
  top:7px;
  z-index:1;
  transition:border-bottom .1s, border-top .1s .1s;
  line-height:0.2em;
  background:#fff;
}

ul.submenu li a{
  display:block;
  padding:10px;
  color:#000;
  text-decoration:none;
  transition:background .3s;
  white-space:nowrap;
}

ul.submenu li a:hover{
	
	background:rgba(255,255,255,0);
}

@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
* {
  -moz-box-sizing: inherit;
       box-sizing: inherit;
  -webkit-transition-property: all;
          transition-property: all;
  -webkit-transition-duration: .6s;
          transition-duration: .6s;
  -webkit-transition-timing-function: ease;
          transition-timing-function: ease;
}

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%;
}

body {
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}

.buttons {
  display: table;
  height: 100%;
  width: 100%;
}

.container {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}

h1.heading {
  color: #fff;
  font-size: 1.25em;
  font-weight: 900;
  margin: 0 0 0.5em;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 1.75em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.25em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 4.25em;
    margin: 0 0 0.5em;
  }
}
 
.btnfos {
  color: grey;
  cursor: pointer;
  display: block;
  font-size: 16px;
  font-weight: 400;
  line-height: 45px;
  max-width: 160px;
  margin: 0 auto 1em;
  position: relative;
  text-transform: uppercase;
  vertical-align: middle;
  width: 100%;
}
@media (min-width: 400px) {
  .btnfos {
    display: inline-block;
    margin-right: 2em;
  }
  .btnfos:nth-of-type(even) {
    margin-right: 0;
  }
}
@media (min-width: 600px) {
  .btnfos:nth-of-type(even) {
    margin-right: 2em;
  }
  .btnfos:nth-of-type(5) {
    margin-right: 0;
  }
}

.btnfos-2 {
  letter-spacing: 0;
}

.btnfos-2:hover,
.btnfos-2:active {
  letter-spacing: 5px;
  color: #40609d;
  font-weight: bold;
}

.btnfos-2:after,
.btnfos-2:before {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  border: 1px solid rgba(255, 255, 255, 0);
  bottom: 0px;
  content: " ";
  display: block;
  margin: 0 auto;
  position: relative;
  -webkit-transition: all 280ms ease-in-out;
          transition: all 280ms ease-in-out;
  width: 0;
}

.btnfos-2:hover:after,
.btnfos-2:hover:before {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  border-color: #fff;
  -webkit-transition: width 350ms ease-in-out;
          transition: width 350ms ease-in-out;
  width: 70%;
}

.btnfos-2:hover:before {
  bottom: auto;
  top: 0;
  width: 100%;
}
	</style>
</head>
	<body>
			
				<nav class="navbar navbar-default navbar-fixed" style="height:60px; z-index:10">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-left" style="position:relative;  display: inline;">
								<img src="{{url('img/logo.png ')}}" style="max-width: 200px; height: 35px; color:#000; position:absolute; top:10px;">
							</ul>
							<ul class="nav navbar-nav navbar-right" style="position:relative; display: inline;">
								<li>
								<input id="check00" type="checkbox" name="menu"/>
									<label for="check00" >
										<a class="btnfos btnfos-2" >Home</a> 
									</labe>
    							</li>
								<li class="menu">
									<input id="check01" type="checkbox" name="menu"/>
									<label for="check01" >
										<a class="btnfos btnfos-2" id="01" onmouseover="abrirMenu(id)" onmouseout="setTimeout(function fecharMenu(id),3000)">ORÇAMENTO</a></b>
									</label>
									<ul class="submenu" onmouseover="abrirMenu('01')" onmouseout="fecharMenu('01')">
										<li><a href="{{ route('orcamento_saldo_dotacoes') }}">Saldo de Dotações</a></li>
										<li><a href="#">Contratos</a></li>
										<li><a href="{{ route('orcamento_agenda_orcamentaria') }}">Agenda Orçamentária</a></li>
										<li><a href="{{ route('orcamento_formularios') }}">Formulários</a></li>
										<li><a href="{{ route('orcamento_manual') }}">Manual de Alterações</a></li>
										<li><a href="{{ route('orcamento_leis_decretos') }}">Leis e Decretos</a></li>
									</ul>
								</li>
								<li>
								<label for="check00" >
										<a class="btnfos btnfos-2" >CONTABILIDADE</a> 
									</labe>
								</li>
								<li>
								   <a href="">
									   <p style="color:#40609d">CAPACITAÇÕES</p>
									</a>
								</li>
								<li>
								   <a href="">
									   <p style="color:#40609d">COMITÊ GESTOR</p>
									</a>
								</li>
								<li>
								   <a href="">
									   <p style="color:#40609d">PODEMOS AJUDAR?</p>
									</a>
								</li>
								
								<li>
								   <a href="">
									   <p>{{ Auth::user()->name }}</p>
									</a>
								</li>
								<li>
									
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
									 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
								<li class="separator hidden-lg hidden-md"></li>
							</ul>
					
						</div>
					</div>
				</nav>
		
			
			
			<div class="content">
				<div class="container-fluid">
					<!--<div class="card">
						<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="logotipo" src="{{url('img/logo.png ')}}" style="max-width: 700px; height: 300px;  display: block;margin-left: auto;margin-right: auto;">
								</div>
		
								
							</div>
							<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Anterior</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Próximo</span>
							</a>
					</div>-->
				</div>	
			</div>
				
			
			
		<!--<div class="content">
			<div class="container-fluid">
				<div class="card" >
					<div class="row" style="z-index:0;   background: #40609d" >
					
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<a href="{{ url('/home') }}">
										<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
											<g id="icomoon-ignore"></g>
											<path d="M16 2.672l-5.331 5.331v-2.133h-4.265v6.398l-3.755 3.755 0.754 0.754 12.597-12.597 12.597 12.597 0.754-0.754-13.351-13.351zM7.47 6.937h2.132v2.132l-2.133 2.133v-4.265z" fill="#fff"></path>
											<path d="M6.404 16.533v12.795h7.464v-7.464h4.265v7.464h7.464v-12.795l-9.596-9.596-9.596 9.596zM24.53 28.262h-5.331v-7.464h-6.398v7.464h-5.331v-11.287l8.53-8.53 8.53 8.53v11.287z" fill="#fff"></path>
										</svg>
										<P style="display: block; margin-left: auto;margin-right: auto">
											HOME
										</p>
									</a>
								</div>
							</div>
							
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
										<g id="icomoon-ignore"></g>
										<path d="M16 3.205h-8.53c-2.551 0-4.265 1.714-4.265 4.265v17.733c0 0.842 0.314 3.592 4.357 3.592h21.233v-25.59h-12.795zM14.934 4.271v10.2l-2.611-2.378-2.899 2.44v-10.261h5.511zM7.47 4.271h0.887v12.552l3.938-3.313 3.706 3.374v-12.613h11.729v17.593h-20.259c-1.357 0-2.457 0.405-3.199 1.113v-15.508c0-1.943 1.256-3.199 3.199-3.199zM7.562 27.729c-2.444 0-3.151-1.109-3.269-2.17 0.002-1.646 1.189-2.628 3.177-2.628h20.259v4.798h-20.167z" fill="#fff"></path>
									</svg>
									<P style="display: block; margin-left: auto;margin-right: auto">
										ORÇAMENTO
									</p>
								</div>
							</div>
						
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
										<g id="icomoon-ignore"></g>
										<path d="M8.536 10.136h14.928v-4.265h-14.928v4.265zM9.602 6.937h12.795v2.132h-12.795v-2.133z" fill="#fff"></path>
										<path d="M23.464 3.205h-14.928c-1.178 0-2.133 0.955-2.133 2.133v21.325c0 1.178 0.955 2.133 2.133 2.133h14.928c1.178 0 2.133-0.955 2.133-2.133v-21.325c0-1.178-0.955-2.132-2.133-2.132zM24.53 26.663c0 0.588-0.478 1.066-1.066 1.066h-14.928c-0.588 0-1.066-0.478-1.066-1.066v-21.325c0-0.587 0.479-1.066 1.066-1.066h14.928c0.588 0 1.066 0.479 1.066 1.066v21.325z" fill="#fff"></path>
										<path d="M9.602 14.934v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M9.602 20.265v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M9.602 25.596v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M14.934 14.934v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M20.265 14.934v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M14.934 20.265v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M14.934 25.596v-3.199h-1.066v4.265h4.265v-1.066h-1.066z" fill="#fff"></path>
										<path d="M20.265 25.596v-8.53h-1.066v9.596h4.265v-1.066h-1.066z" fill="#fff"></path>
									</svg>
									<P style="display: block; margin-left: auto;margin-right: auto">
										CONTABILIDADE
									</p>
								</div>
							</div>
							
							
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
										<g id="icomoon-ignore"></g>
										<path d="M2.098 5.903c1.309-1.309 3.050-2.030 4.902-2.030v0c1.852 0 3.593 0.721 4.902 2.030l14.035 14.036c1.87 1.87 1.87 4.913 0 6.783-0.906 0.907-2.11 1.405-3.392 1.405s-2.486-0.499-3.392-1.405l-6.197-6.196 0.005-0.005-7.407-7.408c-0.503-0.502-0.78-1.171-0.78-1.881 0-0.711 0.277-1.379 0.78-1.882 0.502-0.502 1.17-0.78 1.881-0.78s1.379 0.278 1.881 0.78l11.871 11.87-0.742 0.742-11.871-11.87c-0.609-0.608-1.67-0.608-2.278 0-0.304 0.304-0.472 0.709-0.472 1.14s0.168 0.835 0.472 1.139l13.598 13.609c0.708 0.709 1.648 1.098 2.65 1.098s1.942-0.389 2.65-1.098c1.461-1.461 1.461-3.839 0-5.3l-14.035-14.036c-1.112-1.111-2.589-1.723-4.16-1.723s-3.049 0.612-4.16 1.723c-1.111 1.111-1.724 2.589-1.724 4.16s0.613 3.050 1.724 4.161l12.301 12.301-0.742 0.742-12.301-12.302c-1.31-1.31-2.031-3.051-2.031-4.903s0.721-3.593 2.031-4.902z" fill="#fff"></path>
									</svg>
									<P style="display: block; margin-left: auto;margin-right: auto">
										ANEXOS
									</p>
								</div>
							</div>
							
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
										<g id="icomoon-ignore"></g>
										<path d="M9.069 2.672v14.928h-6.397c0 0 0 6.589 0 8.718s1.983 3.010 3.452 3.010c1.469 0 16.26 0 20.006 0 1.616 0 3.199-1.572 3.199-3.199 0-1.175 0-23.457 0-23.457h-20.259zM6.124 28.262c-0.664 0-2.385-0.349-2.385-1.944v-7.652h5.331v7.192c0 0.714-0.933 2.404-2.404 2.404h-0.542zM28.262 26.129c0 1.036-1.096 2.133-2.133 2.133h-17.113c0.718-0.748 1.119-1.731 1.119-2.404v-22.12h18.126v22.391z" fill="#fff"></path>
										<path d="M12.268 5.871h13.861v1.066h-13.861v-1.066z" fill="#fff"></path>
										<path d="M12.268 20.265h13.861v1.066h-13.861v-1.066z" fill="#fff"></path>
										<path d="M12.268 23.997h13.861v1.066h-13.861v-1.066z" fill="#fff"></path>
										<path d="M26.129 9.602h-13.861v7.997h13.861v-7.997zM25.063 16.533h-11.729v-5.864h11.729v5.864z" fill="#fff"></path>
									</svg>
									<P style="display: block; margin-left: auto;margin-right: auto">
										INFORMAÇÕES
									</p>
								</div>
							</div>
							
							<div class="col-md-2" style="border:1px">
								<div class="tile" style="display: inline-block;">
									<a href="{{ url('/alterar-usuario') }}">
										<svg class="tile" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 32 32">
											<g id="icomoon-ignore"></g>
											<path d="M0 21.997c0 0.459 0 1.82 0 2.12s0.178 0.813 0.822 0.813c0.494 0 4.438 0 6.245 0 0.547 0 0.9 0 0.9 0h0.155c0 0 0.104 0 0.271 0 0 0.484 0 0.924 0 1.093 0 0.371 0.22 1.006 1.017 1.006 0.612 0 5.509 0 7.746 0 0.677 0 1.116 0 1.116 0h0.192c0 0 0.43 0 1.097 0 2.229 0 7.134 0 7.747 0 0.796 0 1.017-0.634 1.017-1.006s0-2.055 0-2.623-0.201-1.198-1.017-1.548c-1.032-0.452-3.799-1.452-5.537-1.965-0.134-0.043-0.157-0.050-0.157-0.646 0-0.642 0.074-1.097 0.23-1.431 0.215-0.456 0.469-1.224 0.559-1.912 0.256-0.296 0.603-0.88 0.826-1.993 0.197-0.981 0.105-1.338-0.025-1.673-0.014-0.035-0.029-0.070-0.039-0.11-0.048-0.225 0.018-1.42 0.188-2.348 0.116-0.636-0.030-1.988-0.906-3.108-0.553-0.707-1.612-1.576-3.513-1.695l-1.060-0.001c-1.933 0.121-2.991 0.989-3.544 1.696-0.876 1.119-1.021 2.472-0.905 3.108 0.168 0.927 0.236 2.122 0.186 2.352-0.010 0.035-0.025 0.070-0.038 0.105-0.13 0.335-0.221 0.692-0.026 1.673 0.223 1.113 0.571 1.697 0.826 1.993 0.091 0.688 0.345 1.456 0.559 1.912 0.198 0.42 0.4 0.916 0.4 1.409 0 0.597-0.023 0.604-0.166 0.649-0.358 0.105-0.763 0.232-1.189 0.368-1.004-0.373-2.267-0.809-3.183-1.080-0.109-0.034-0.127-0.040-0.127-0.522 0-0.519 0.060-0.887 0.186-1.157 0.174-0.369 0.379-0.989 0.453-1.546 0.206-0.239 0.487-0.711 0.667-1.611 0.159-0.793 0.084-1.081-0.021-1.352-0.011-0.029-0.023-0.057-0.031-0.089-0.039-0.182 0.014-1.148 0.15-1.898 0.093-0.514-0.023-1.607-0.731-2.513-0.447-0.571-1.303-1.273-2.838-1.371h-0.856c-1.562 0.097-2.417 0.8-2.864 1.371-0.708 0.906-0.826 1.999-0.731 2.513 0.135 0.75 0.191 1.716 0.151 1.902-0.008 0.028-0.021 0.056-0.031 0.085-0.106 0.271-0.179 0.559-0.021 1.352 0.18 0.9 0.461 1.372 0.667 1.611 0.074 0.557 0.279 1.176 0.452 1.546 0.16 0.34 0.324 0.741 0.324 1.139 0 0.483-0.018 0.488-0.134 0.525-1.358 0.401-3.553 1.163-4.482 1.552-0.66 0.283-0.976 0.845-0.976 1.304zM9.441 23.401c0-0.156 0.156-0.47 0.574-0.649 1.103-0.461 3.806-1.393 5.448-1.877 0.918-0.288 0.918-1.078 0.918-1.655 0-0.699-0.253-1.33-0.501-1.856-0.171-0.366-0.391-1.025-0.468-1.603l-0.041-0.31-0.205-0.237c-0.113-0.131-0.397-0.541-0.591-1.515-0.152-0.761-0.085-0.934-0.026-1.087l0.001-0.002 0.009-0.026c0.022-0.054 0.041-0.108 0.056-0.161l0.011-0.038 0.008-0.039c0.107-0.501-0.033-1.945-0.18-2.758-0.067-0.366 0.017-1.402 0.7-2.275 0.607-0.776 1.533-1.211 2.752-1.294l0.993 0.001c1.493 0.102 2.303 0.758 2.721 1.293 0.683 0.873 0.766 1.909 0.7 2.273-0.144 0.793-0.287 2.26-0.181 2.755l0.005 0.022 0.006 0.022c0.022 0.085 0.049 0.161 0.080 0.237 0.054 0.141 0.122 0.317-0.030 1.076-0.195 0.975-0.478 1.383-0.591 1.513l-0.206 0.238-0.040 0.312c-0.077 0.579-0.296 1.235-0.469 1.601-0.225 0.481-0.33 1.077-0.33 1.878 0 0.576 0 1.364 0.888 1.646 1.692 0.5 4.44 1.491 5.434 1.926 0.296 0.127 0.389 0.269 0.389 0.587v2.579h-17.828l-0.005-2.579zM1.049 21.997c0.002-0.041 0.067-0.222 0.341-0.34 0.899-0.377 3.066-1.126 4.365-1.51 0.886-0.282 0.886-1.064 0.886-1.531 0-0.603-0.214-1.14-0.424-1.586-0.136-0.291-0.304-0.811-0.361-1.237l-0.041-0.31-0.204-0.237c-0.064-0.073-0.281-0.372-0.433-1.133-0.112-0.557-0.067-0.673-0.031-0.766l0.006-0.014 0.004-0.014c0.022-0.054 0.036-0.097 0.048-0.14l0.012-0.039 0.008-0.039c0.103-0.484-0.045-1.763-0.144-2.309-0.046-0.257 0.022-1.034 0.527-1.68 0.453-0.578 1.149-0.904 2.071-0.968h0.788c1.127 0.080 1.734 0.569 2.046 0.968 0.504 0.645 0.573 1.424 0.527 1.68-0.106 0.577-0.244 1.841-0.146 2.304l0.005 0.022 0.005 0.022c0.020 0.074 0.043 0.14 0.069 0.207 0.036 0.092 0.081 0.21-0.030 0.766-0.153 0.762-0.37 1.059-0.433 1.132l-0.204 0.237-0.041 0.31c-0.057 0.428-0.225 0.947-0.363 1.238-0.195 0.417-0.286 0.926-0.286 1.603 0 0.468 0 1.251 0.859 1.523 0.543 0.161 1.219 0.383 1.887 0.616-1.103 0.378-2.155 0.761-2.763 1.015-0.818 0.351-1.209 1.045-1.209 1.613 0 0.118 0 0.287 0 0.481h-7.343v-1.884z" fill="#fff"></path>
										</svg>
										<P style="display: block; margin-left: auto;margin-right: auto">
											USUÁRIOS
										</p>
									</a>	
								</div>
							</div>
							
							
						</div>	
					</div>	
				</div>
			</div>	
		</div>-->	
		
		
	</body>

<script>

function abrirMenu(x){

	//alert(x);
	document.getElementById("check"+x).checked = true;
}

function fecharMenu(x){


document.getElementById("check"+x).checked = false;
}



</script>



</html>		
