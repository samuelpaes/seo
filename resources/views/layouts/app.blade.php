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
	<link href="{{ asset('css/seo.css') }}" rel="stylesheet">
	
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

	<script src="{{ asset('js/charts/chart.bundle.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.bundle.min.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.js') }}"type="text/javascript"></script>
	<script src="{{ asset('js/charts/chart.min.js') }}"type="text/javascript"></script>

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
	

    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <script>
        var base_url = '{{ url("/") }}';
    </script>
	


	

<style>

.arrow 
{
	height: 1vw;
	width: 1vw;
	position:relative;
	border-style: solid;
	border-color: #9a9a9a;
	border-width: 0px 0.8px 0.8px 0px;
	transition: border-width 150ms ease-in-out;
}

.left
{
	top:65px;
	left:30px;
	transform: rotate(135deg);
}

.right
{
	
	top:91px;
	left:150px;
	transform: rotate(310deg);
	
}

.arrow:hover 
{
	border-bottom-width: 2px;
	border-right-width: 2px;
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
</style>

</head>
<body  style=" overflow-x:scroll; overflow-y: scroll;">
    <div id="app">
		<div class="wrapper" style="position:relative; z-index:1">
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
									<li><a href="{{ route('orcamento_contratos') }}">Contratos</a></li>
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
				
			
				<main class="py-4"  style="z-index:0">
					<br>
					@if(auth()->user()->isAdmin == 0 || auth()->user()->isAdmin == 1 || auth()->user()->isAdmin == 2)
						@yield('content')
					@else<!-- Se o usuário não tem acesso, chama o modal sem acesso -->	
					<script>
						$(document).ready(function() {
							$('#modalUsuarioSemAcesso').modal({
								show: true,
							})
						});
					</script>
					@endif
				</main>
			</div>
		</div>
	</div>	
</body>
<!--  Modal Usuário Sem Acesso -->
<div class="modal"  id="modalUsuarioSemAcesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-danger" style="border-radius: 5px">
            <button onclick="location.href='/seo/public/home'" type="button" aria-hidden="true" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> Usuário sem permissão de acesso. Contate o administrador do sistema.</span>
		</div>
	</div>
</div>
  
</html>
<script>
function goBack() {
  window.history.back();
}

function goForward() {
  window.history.forward();
}


</script>
