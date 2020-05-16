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
	<link href="{{ asset('css/seo-home.css') }}" rel="stylesheet">

	<!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	

	
    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
	
	<link href="{{ asset('css/balloon.css') }}" rel="stylesheet"/>

	<link href="{{ asset('css/arrows.css') }}" rel="stylesheet">
	
	<link href="{{ asset('css/jquery.treegrid.css') }}" rel="stylesheet">
    
    <!--  Chat CSS    -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/chatStyle.css') }}" />
	
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard-home.css?v=1.4.0') }}"rel="stylesheet"/>

	
	<!--Calendar-->
	<link href="{{ asset('fullcalendar/packages/core/main.css') }}"rel="stylesheet"/>
	<link href="{{ asset('fullcalendar/packages/daygrid/main.css') }}"rel="stylesheet"/>
	

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset ('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

	<!--   Core JS Files   -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/jquery.email-autocomplete.min.js') }}"type="text/javascript"></script>
	
	
	<script src="{{ asset('js/jquery.treegrid.min.js') }}"type="text/javascript"></script>
	
	<script src="{{ asset('js/alterar-saldo-dotacao.js') }}"type="text/javascript"></script>
	
	

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"type="text/javascript"></script>

	<script src="{{ asset('js/charts/chart.bundle.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.bundle.min.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.min.js') }}"type="text/javascript"></script>

    <!--  Notifications Plugin    -->
	<script src="{{ asset('js/bootstrap-notify.js') }}"type="text/javascript"></script>

 
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}"type="text/javascript"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<!-- <script src="{{ asset('js/demo.js') }}"type="text/javascript"></script> -->
	<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->

	<!-- Calendar! -->

 	<script src="{{ asset('fullcalendar/packages/core/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/daygrid/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/google-calendar/main.js') }}"type="text/javascript"></script>
	<script src="{{ asset('fullcalendar/packages/core/locales/pt-br.js') }}"type="text/javascript"></script>

    <!-- Chat scripts -->
    <script src="{{ asset('js/chatStyle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/chat.js') }}"type="text/javascript"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <script>
        var base_url = '{{ url("/") }}';
    </script>


	<style>


/* ~~~~~~~ INIT. BTN ~~~~~~~ */

/* ~~~~~~~ INIT. BTN ~~~~~~~ */

.btn {		
	position: relative;	
	padding: 1.4rem 0.6rem;
	font-weight:bold;
	color:#40609d;
	transition: all 600ms cubic-bezier(0.77, 0, 0.175, 1);	
	cursor: pointer;
	user-select: none;
	border:none;
	height:60px;
	width:100%x;;
	top:-15px;
	
	
}

.btn:before, .btn:after {
	content: '';
	position: absolute;	
	transition: inherit;
	z-index: -1;
	
}

.btn:hover {
	color: #fff;
	transition-delay: .6s;
}

.btn:hover:before {
	transition-delay: 0s;
}

.btn:hover:after {
	background: #40609d;
	transition-delay: .4s;
}

/* From Top */

.from-top:before, 
.from-top:after {
	left: 0;
	height: 0;
	width: 100%;
}

.from-top:before {
	bottom: 0;	
	border: 1px solid #40609d;
	border-top: 0;
	border-bottom: 0;
}

.from-top:after {
	top: 0;
	height: 0;
}

.from-top:hover:before,
.from-top:hover:after {
	height: 100%;
}

.drop {
  overflow: hidden;
  list-style: none;
  position: relative;
  padding: 0px;
  text-align:center;
  top: 27px;
  left:-6px;
  margin: auto;
  

}

.drop div {
  -webkit-transform: translate(0, -100%);
  -moz-transform: translate(0, -100%);
  -ms-transform: translate(0, -100%);
  transform: translate(0, -100%);
  -webkit-transition: all 0.9s;
  -moz-transition: all 0.9s;
  -ms-transition: all 0.9s;
  transition: all 0.9s;
  position: relative;
  background:#a4b7da;
   color:#fff;
  
}

.drop li:hover {

  padding: 0;
  width: 100%;
  background: #edf1f8	 !important;
  opacity:0.8;
  color:#40609d;
}

#marker {
  height: 6px;
  background: #edf1f8	 !important;
  position: relative;
  bottom: 0;
 
  z-index: 2;
  -webkit-transition: all 0.35s;
  -moz-transition: all 0.35s;
  -ms-transition: all 0.35s;
  transition: all 0.35s;
}

#main li:nth-child(1):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(1):hover ~ #marker {
  -webkit-transform: translate(0px, 0);
  -moz-transform: translate(0px, 0);
  -ms-transform: translate(0px, 0);
  transform: translate(0px, 0);
}

#main li:nth-child(2):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(2):hover ~ #marker {
  -webkit-transform: translate(120px, 0);
  -moz-transform: translate(120px, 0);
  -ms-transform: translate(120px, 0);
  transform: translate(120px, 0);
}

#main li:nth-child(3):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(3):hover ~ #marker {
  -webkit-transform: translate(240px, 0);
  -moz-transform: translate(240px, 0);
  -ms-transform: translate(240px, 0);
  transform: translate(240px, 0);
}

#main li:nth-child(4):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(4):hover ~ #marker {
  -webkit-transform: translate(360px, 0);
  -moz-transform: translate(360px, 0);
  -ms-transform: translate(360px, 0);
  transform: translate(360px, 0);
}

#main li:nth-child(5):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(5):hover ~ #marker {
  -webkit-transform: translate(360px, 0);
  -moz-transform: translate(360px, 0);
  -ms-transform: translate(360px, 0);
  transform: translate(360px, 0);
}

#main li:nth-child(6):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(6):hover ~ #marker {
  -webkit-transform: translate(360px, 0);
  -moz-transform: translate(360px, 0);
  -ms-transform: translate(360px, 0);
  transform: translate(360px, 0);
}

#main li:nth-child(7):hover ul div {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
}
#main li:nth-child(7):hover ~ #marker {
  -webkit-transform: translate(360px, 0);
  -moz-transform: translate(360px, 0);
  -ms-transform: translate(360px, 0);
  transform: translate(360px, 0);
}




/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 1px grey; 
  border-radius: 1.3px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
background: rgba(255, 255, 255, 0.4);
  border-radius: 5px;
  opacity:0.5;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
 background: rgba(255, 255, 255, 0.9);
}

/*Botão Fechar */

.btnFechar {
  background: none;
  border: 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: 'Josefin Sans', sans-serif;
  font-size: 18px;
  height: 15px;
  letter-spacing:5px;
  left: 47.5%;
  outline: none;
  overflow: hidden;
  padding: 10px 0 0;
  position: relative;
  text-transform: uppercase;
  top: 50%;
  transform: translate(-50%, -50%);
  transition: all 0.2s ease-in;
  width: 100%;
}

.btnFechar::before,
.btnFechar::after {
  background-color: #ff4d4d;
  content: '';
  color: white;
  display: block;
  height: 1px;
  left: 0;
  position: absolute;
  transform-origin: center;
  transition: all 0.2s ease-in;
  width:100%;
  z-index: -1;
}

.btnFechar::before {
  top: 0;
  transform: rotate(45deg);
}

.btnFechar::after {
  bottom: 0;
  transform: rotate(-45deg);
  
}

.btnFechar:hover {
  height: 20px;
  margin: auto;
  width: 50%;
}

.btnFechar:hover::before{
	
	transform: rotate(45deg);
	
	
}
.btnFechar:hover::after {

  transform: rotate(-45deg);

  
}


</style>


</head>
	<body onmouseover="checaResolucao()" onmousemove="checaResolucao()" onwheel="checaResolucao()" style="background:#25385b">
			<nav class="navbar navbar-default navbar-fixed" style="height:60px; z-index:10;text-overflow: ellipsis;" id="barraOficial">
					<div class="container-fluid"  style="height:60px;">
						<div class="navbar-header"  style="height:60px;">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
							<ul class="nav navbar-nav navbar-left" style="position:relative;  display: inline; height:60px;">
								<img src="{{url('img/logo.png ')}}" style="max-width: 200px; height: 35px; color:#000; position:absolute; top:10px;">
							</ul>
							<ul class="nav navbar-nav navbar-right" style="position:relative;height:60px; text-overflow: ellipsis;white-space: nowrap;" id="main">
								
								<li>
									<div class="btn from-top">
										<div style="position:relative; top:5px;font-size:14px"><i class="pe-7s-graph2" style="position:relative;font-weight:bold; top:1.5px"></i></b> ORÇAMENTO</div>
										<ul class="drop" style="width:108.5%;">
											<div>
												<li><a href="{{ route('orcamento_saldo_dotacoes') }}" style="all: unset;">Saldo de Dotações</a></li>
												<li><a href="{{ route('orcamento_contratos') }}" style="all: unset;">Contratos</a></li>
												<li><a href="{{ route('orcamento_agenda_orcamentaria') }}" style="all: unset;">Agenda Orçamentária</a></li>
												<li><a href="{{ route('orcamento_formularios') }}" style="all: unset;">Formulários</a></li>
												<li><a href="{{ route('orcamento_manual') }}" style="all: unset;">Manual de Alterações</a></li>
												<li><a href="{{ route('orcamento_leis_decretos') }}" style="all: unset;">Leis e Decretos</a></li>
											</div>
										</ul>
									</div>
								</li>
								
								<li>
									<div class="btn from-top" >
										<div style="position:relative; top:5px;font-size:14px"><i class="pe-7s-calculator" style="position:relative;font-weight:bold; top:1.5px"></i></b> CONTABILIDADE</div>
										<ul class="drop" style="width:110%;">
											<div>
												<li><a href="{{ route('orcamento_saldo_dotacoes') }}" style="all: unset;">Formulários</a></li>
												<li><a href="#" style="all: unset;">Leis e Decretos</a></li>
											</div>
										</ul>
									</div>
								</li>
								
								<li>
								
									<div class="btn from-top" >
										<div style="position:relative; top:5px;font-size:14px"><i class="pe-7s-study" style="position:relative;font-weight:bold; top:1.5px"></i></b> CAPACITAÇÕES</div>	
									</div>
								</li>
								<li>
									<div class="btn from-top" >
										<div style="position:relative; top:5px;font-size:14px"><i class="pe-7s-network" style="position:relative;font-weight:bold; top:1.5px"></i></b> COMITÊ GESTOR</div>	
									</div>
								</li>
								<li>
									<div class="btn from-top" >
										<div style="position:relative; top:5px; font-size:14px"><i class="pe-7s-help1" style="position:relative;font-weight:bold; top:1.5px"></i></b> AJUDA</div>	
									</div>
								</li>
								@if(auth()->user()->isAdmin == 0)
								<li>
									<div class="btn from-top">
										<div style="position:relative; top:5px; font-size:14px"><i class="pe-7s-users" style="position:relative;font-weight:bold; top:1.5px"></i></b> USUÁRIOS</div>
										<ul class="drop" style="width:110.5%;">
											<div>
												<li><a href="{{ route('register') }}" style="all: unset;">Cadastrar Usuário</a></li>
												<li><a href="{{ url('/alterar-usuario') }}" style="all: unset;">Alterar Usuário</a></li>
											</div>
										</ul>
									</div>
								</li>

								<li>
									<div class="btn from-top">
										<div style="position:relative;top:5px;font-size:14px"><i class="pe-7s-config" style="position:relative;font-weight:bold; top:1.5px"></i> CONFIGURAÇÕES</b></div>
										<ul class="drop" style="width:108%;">
											<div>
												<li><a href="{{ url('unidade-orcamentaria/index') }}" style="all: unset;">Unidade Orçamentária</a></li>
												<li><a href="{{ url('classificacao-funcional-programatica/index') }}" style="all: unset;">Classificação <br>Funcional Programática</a></li>
												<li><a href="{{ url('natureza-de-despesa/index') }}" style="all: unset;">Natureza de Despesa</a></li>
												<li><a href="{{ url('vinculos/index') }}" style="all: unset;">Vínculos</a></li>
												<li><a href="{{ url('dotacao-orcamentaria/index') }}" style="all: unset;">Dotação Orçamentária</a></li>  
												<li><a href="{{ url('informacao/index') }}" style="all: unset;">Informações</a></li>  
											</div>
										</ul>
									</div>
								</li>
								@endif
								<li>
								   <a href="">
									   {{ Auth::user()->name }}
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
							</ul>
					
						
					</div>
				</nav>
		
			<!-- estilo alternativo para página responsiva -->
			<div class="wrapper" style="position:relative; z-index:1;" id="barraAlternativa" hidden>
				<div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar-1.jpg') }}" >

				<!--

					Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
					Tip 2: you can also add an image using data-image tag

				-->

					<div class="sidebar-wrapper" style=" overflow-x:hidden; overflow-y: scroll;">
						<div class="logo">
							<a href="{{ route('home') }}" class="simple-text">
								<img src="{{url('img/logo_white.png ')}}" style="max-width: 500px; height: 80px;">
							</a>
						</div>

						<ul class="nav">
							
							<li>
								<input id="check01" type="checkbox" name="menu"/>
								<label for="check01">
									<i class="pe-7s-news-paper" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:6px;"><a href="{{ route('home') }}" style="font:inherit; color: inherit; text-decoration: inherit;">PORTAL</a></p>
								</label>
							</li>
						
							<li>
								<input id="check02" type="checkbox" name="menu"/>
								<div class="arrow-down" onclick="this.classList.toggle('active')">
									<label for="check02">
										<i class="pe-7s-graph2" style="position:relative; top:6px;"></i>
										<p style="position:relative; top:6px;">ORÇAMENTO</p>
									</label>
								</div>
								<ul class="submenu">
										<li><a href="{{ route('orcamento_saldo_dotacoes') }}">Saldo de Dotações</a></li>
										<li><a href="#">Contratos</a></li>
										<li><a href="{{ route('orcamento_agenda_orcamentaria') }}">Agenda Orçamentária</a></li>
										<li><a href="{{ route('orcamento_formularios') }}">Formulários</a></li>
										<li><a href="{{ route('orcamento_manual') }}">Manual de Alterações</a></li>
										<li><a href="{{ route('orcamento_leis_decretos') }}">Leis e Decretos</a></li>
								</ul>
							</li>

							<li>
								<input id="check03" type="checkbox" name="menu"/>
								<div class="arrow-down" onclick="this.classList.toggle('active')">
									<label for="check03">
										<i class="pe-7s-calculator" style="position:relative; top:6px;"></i>
										<p style="position:relative; top:6px;">CONTABILIDADE</p>
									</label>
								</div>
								<ul class="submenu">
									<li><a href="{{ route('contabilidade_formularios') }}">Formulários</a></li>
									<li><a href="{{ route('contabilidade_leis_decretos') }}">Leis e Decretos</a></li>
								</ul>
							</li>
							
							<li>
								<input id="check04" type="checkbox" name="menu"/>
								<label for="check04">
									<i class="pe-7s-study" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:6px;">CAPACITAÇÕES</p>
								</label>
							</li>
							
							<li>
								
									<input id="check05" type="checkbox" name="menu"/>
									<label for="check05">
										<i class="pe-7s-network" style="position:relative; top:6px;"></i>
										<p style="position:relative; top:6px;"><a href="{{ route('comite_gestor') }}" style="font:inherit; color: inherit; text-decoration: inherit;">COMITÊ GESTOR</a></p>
									</label>
								
							</li>
							
							<li>
								<input id="check06" type="checkbox" name="menu"/>
								<label for="check06">
									<i class="pe-7s-help1" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:6px;">PODEMOS AJUDAR?</p>
								</label>
							</li>

							@if(auth()->user()->isAdmin == 0)
								
							
							<li>
								<input id="check07" type="checkbox" name="menu"/>
								<div class="arrow-down" onclick="this.classList.toggle('active')">
									<label for="check07">
										<i class="pe-7s-users" style="position:relative; top:6px;"></i>
										<p style="position:relative; top:6px;">USUÁRIOS</p>
									</label>
								</div>
								<ul class="submenu">
									<li><a href="{{ route('register') }}">Cadastrar Usuário</a></li>
									<li><a href="{{ url('/alterar-usuario') }}">Alterar Usuário</a></li>
								</ul>
							</li>
							
							<li>
								<input id="check08" type="checkbox" name="menu"/>
								<div class="arrow-down" onclick="this.classList.toggle('active')">
									<label for="check08">
										<i class="pe-7s-config" style="position:relative; top:6px;"></i>
										<p style="position:relative; top:6px;">CONFIGURAÇÕES</p>
									</label>
								</div>
								<ul class="submenu">
									<li><a href="{{ url('unidade-orcamentaria/index') }}">Unidade Orçamentária</a></li>
									<li><a href="{{ url('classificacao-funcional-programatica/index') }}">Classificação Funcional Programática</a></li>
									<li><a href="{{ url('natureza-de-despesa/index') }}">Natureza de Despesa</a></li>
									<li><a href="{{ url('vinculos/index') }}">Vínculos</a></li>
									<li><a href="{{ url('dotacao-orcamentaria/index') }}">Dotação Orçamentária</a></li>  
									<li><a href="{{ url('dotacao-orcamentaria/index') }}">Informações</a></li>  
								</ul>
							</li>
							
							@endif
						</ul>
					</div>
				</div>
				<div class="main-panel">
					<nav class="navbar navbar-default navbar-fixed"  style="position:relative; ">
						<div class="container-fluid" >
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-left">
									<div class="arrow left" onclick="goBack()"></div>
									<div class="arrow right" onclick="goForward()"></div>
								
									<!--<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="fa fa-globe"></i>
												<b class="caret hidden-sm hidden-xs"></b>
												<span class="notification hidden-sm hidden-xs">5</span>
												<p class="hidden-lg hidden-md">
													5 Notifications
													<b class="caret"></b>
												</p>
										</a>
										<ul class="dropdown-menu">
											<li><a href="#">Notification 1</a></li>
											<li><a href="#">Notification 2</a></li>
											<li><a href="#">Notification 3</a></li>
											<li><a href="#">Notification 4</a></li>
											<li><a href="#">Another notification</a></li>
										</ul>
									</li>
									<li>
									<a href="">
											<i class="fa fa-search"></i>
											<p class="hidden-lg hidden-md">Search</p>
										</a>
									</li>-->
								</ul>

								<ul class="nav navbar-nav navbar-right">
									<li>
										<a href="">
											{{ Auth::user()->name }}
										</a>
									</li>
									
									<!--<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<p>
													Dropdown
													<b class="caret"></b>
												</p>

										</a>
										<ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										</ul>
									</li>
									
									<a href="">
										<i class="fa fa-search"></i>
										<p class="hidden-lg hidden-md">Search</p>
									</a>-->
									
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
					
				</div>
			</div>
		

			<div class="content">
				<div class="container-fluid">
					<div class="row" >
						<div class="col-md-6" >
							<div class="card" style="height:430px">
								<div class="header">
									<h4 class="title" style="text-align:center"><?php echo Auth::user()->secretaria; ?></h4>
									<p class="category" style="text-align:center">Saldo de Dotações</p>
								</div>
								<div class="content" >
								<canvas id="myChart" width="400" height="330"></canvas>
									<script>
										var ctx = document.getElementById('myChart').getContext('2d');
										var myChart = new Chart(ctx, {
											type: 'bar',
											data: {
												labels: ['DOTAÇÃO', 'EMPENHADO', 'RESERVA', 'SALDO'],
												datasets: [{
													label: "2020",
													data: [{{$dotacao}}, {{$empenhado}}, {{$reserva}}, {{$saldo}}],
													backgroundColor: [
														'rgba(255, 99, 132, 0.2)',
														'rgba(54, 162, 235, 0.2)',
														'rgba(255, 206, 86, 0.2)',
														'rgba(75, 192, 192, 0.2)',
													],
													borderColor: [
														'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
													],
													borderWidth: 2
												}]
											},
											options: {
												responsive: true,
            									maintainAspectRatio: false,
												tooltips: {
													callbacks: {
														label: function(t, d) {
														var yLabel = t.yLabel.toLocaleString("pt-BR",{style:"currency", currency:"BRL"});
														return yLabel;
														}
													}
												},
												scales: {
													yAxes: [{
														ticks: {
														callback: function(value, index, values) {
															if (parseInt(value) >= 1000) {
																return 'R$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
															} else {
																return 'R$' + value;
															}
														}
														}
													}]
												}
											}
										});
									</script>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card" style="height:430px">
								<div class="header">
								<h4 class="title" style="text-align:center">PAINEL DE INFORMAÇÕES</h4>
									<p class="category"></p>
								</div>
								<div class="content">
									<div class="table-full-width">
										<table class="table">
											<tbody>
											@foreach($informacoes as $informacao)
												<tr>
													<td><h6><?php echo $informacao->titulo ?></h6></td>
													<td class="td-actions text-left">
														<?php echo $informacao->descricao ?>
													</td>
												</tr>
											@endforeach   
											</tbody>
										</table>
									</div>

									<div class="footer">
										<hr>
										<div class="stats">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
				
			
		
		
		<script>

function checaResolucao()
{
	
		//ajuste de tela
		if($(window).width() < 1199)
		{
			document.getElementById('barraAlternativa').hidden=false;
			document.getElementById('barraOficial').hidden=true;
		}
		else{
			
			document.getElementById('barraAlternativa').hidden=true;
			document.getElementById('barraOficial').hidden=false;
		}
	}
</script>

            <div class="content">
                <div class="container-fluid">
                    <span class="dot" style="position:absolute; bottom:10px; right:10px;" data-toggle="collapse" data-target="#chatbox" >
                        <img class="chat-ico" src="{{url('img/chat-ico.svg')}}" >
                    </span>
                    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
                    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

                    <div id="chatbox" onclick="openChat()" hidden>
                        <div id="friendslist">
                            <!--<div id="topmenu" style="height:35px;">
                                <button class="btnFechar" data-toggle="collapse" data-target="#chatbox"></button>
                            </div>-->
                            <div id="topmenu" >
                                <span class="friends"></span>
                                <span class="chats"></span>
                                <span class="close" data-toggle="collapse" data-target="#chatbox"></span>
                            </div>
                            
                            <div id="friends" style="height:100px;">
                            @foreach($users as $user)
                                <a href="javascript:void(0);" style="text-decoration: none" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                    <div class="friend">
                                        <img src="https://cdn.ppconcursos.com.br/uploads/depoimentos/padrao.png" />
                                        <p>
                                            <strong>{{ $user->name }}</strong>
                                            <br>
                                            <span style="font-size:12px;">{{ $user->secretaria }}</span>
                                        </p>
										@if($user->isOnline())
                                       		<div class="status available"></div>
										@else
                                        	<!--<div class="status away"></div>-->
                                        	<div class="status inactive"></div>
										@endif
                                    </div>
                                </a>
                            @endforeach
                                <div id="search">
                                    <input type="text" class="form-control" id="searchfield" style="position:relative; top:10px;"  value="Procurar contatos..." />
                                </div>   
                            </div>                
                            
                        </div>	
                        
                        <div id="chatview" class="p1" >    	
                            <div id="profile">
                                <!--<div id="close">
									<div class="cy"></div>
                                   	<div class="cx"></div>	
                                </div>-->
                                <p></p>
                                <span></span>
                            </div>
                            <div id="chat-messages">
                                <div id="chat-overlay" class="row" style="z-index:1000">                                  
                            </div>
                            <div id="sendmessage">
                            </div>
    					</div>        
					</div>	
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                </div>
            </div>  
        </div>
    
       





	</div>
</div>	
    </div>
	</div>

	 <!-- Teste -->


    @include('chat-box')

    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />


@section('script')
   

@stop

<!--<div id="chat-overlay" class="row"></div>-->

    <audio id="chat-alert-sound" style="display: none">
        <source src="{{ asset('sound/facebook_chat.mp3') }}" />
    </audio>
<!-- Fim do teste -->


	</body>





</html>	
