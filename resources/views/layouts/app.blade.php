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

	 <!--  Chat CSS    -->
	<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/chatStyle.css') }}" />

	<!-- Bootstrap Notify CSS     -->
	<!--<link href="{{ asset('css/bootstrap-notify.min.css') }}" rel="stylesheet" />-->
	<link href="{{ asset('css/bootstrap-notifications.css') }}" rel="stylesheet" />
	

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

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
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
	
	<!--Chat -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <script>
        var base_url = '{{ url("/") }}';
    </script>
    
	<!--Pusher -->
	<script src="{{ asset('js/pusher.min.js') }}"type="text/javascript"></script>

	<!--Ajax-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

	<!-- Chat scripts -->
    <script src="{{ asset('js/chatStyle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/chat.js') }}"type="text/javascript"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

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
@if (Auth::check())
<body style="overflow-x:scroll; overflow-y:scroll;" data-user-id="{{ Auth::user()->id }}">
@else
<body style="overflow-x:scroll; overflow-y:scroll;">
@endif
    <div id="app" style="height:100%">
		<div class="wrapper" style="position:relative; z-index:1;">
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
								<p style="position:relative; top:2px;"><a href="{{ route('home') }}" style="font:inherit; color: inherit; text-decoration: inherit;">PORTAL</a></p>
							</label>
						</li>
					
						<li>
							<input id="check02" type="checkbox" name="menu"/>
							<div class="arrow-down" onclick="this.classList.toggle('active')">
								<label for="check02">
									<i class="pe-7s-graph2" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:2px;">ORÇAMENTO</p>
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
						<!--
						<li>
							<input id="check03" type="checkbox" name="menu"/>
							<div class="arrow-down" onclick="this.classList.toggle('active')">
								<label for="check03">
									<i class="pe-7s-calculator" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:2px;">CONTABILIDADE</p>
								</label>
							</div>
							<ul class="submenu">
								<li><a href="{{ route('contabilidade_formularios') }}">Formulários</a></li>
								<li><a href="{{ route('contabilidade_leis_decretos') }}">Leis e Decretos</a></li>
							</ul>
						</li>
						-->
						<li>
							<input id="check04" type="checkbox" name="menu"/>
							<label for="check04">
								<i class="pe-7s-study" style="position:relative; top:6px;"></i>
								<p style="position:relative; top:2px;">CAPACITAÇÕES</p>
							</label>
						</li>
						
						<li>
							
								<input id="check05" type="checkbox" name="menu"/>
								<label for="check05">
									<i class="pe-7s-network" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:2px;"><a href="{{ route('comite_gestor') }}" style="font:inherit; color: inherit; text-decoration: inherit;">COMITÊ GESTOR</a></p>
								</label>
							
						</li>
						
						<li>
							<input id="check06" type="checkbox" name="menu"/>
							<label for="check06">
								<i class="pe-7s-help1" style="position:relative; top:6px;"></i>
								<p style="position:relative; top:2px;">PODEMOS AJUDAR?</p>
							</label>
						</li>

						@if(auth()->user()->isAdmin == 0)
							
						
						<li>
							<input id="check07" type="checkbox" name="menu"/>
							<div class="arrow-down" onclick="this.classList.toggle('active')">
								<label for="check07">
									<i class="pe-7s-users" style="position:relative; top:6px;"></i>
									<p style="position:relative; top:2px;">USUÁRIOS</p>
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
									<p style="position:relative; top:2px;">CONFIGURAÇÕES</p>
								</label>
							</div>
							<ul class="submenu">
								<li><a href="{{ url('unidade-orcamentaria/index') }}">Unidade Orçamentária</a></li>
								<li><a href="{{ url('classificacao-funcional-programatica/index') }}">Classificação Funcional Programática</a></li>
								<li><a href="{{ url('natureza-de-despesa/index') }}">Natureza de Despesa</a></li>
								<li><a href="{{ url('vinculos/index') }}">Vínculos</a></li>
								<li><a href="{{ url('dotacao-orcamentaria/index') }}">Dotação Orçamentária</a></li>  
								<li><a href="{{ url('informacao/index') }}">Informações</a></li> 
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
							<!--<ul class="nav navbar-nav navbar-left">
								<div class="arrow left" onclick="goBack()"></div>
								<div class="arrow right" onclick="goForward()"></div>
								
								   <a href="">
										<i class="fa fa-search"></i>
										<p class="hidden-lg hidden-md">Search</p>
									</a>
								</li>
							</ul>-->

							<ul class="nav navbar-nav navbar-right">
								<!-- teste-->
								<li>
									<a href="{{ url('pre_home') }}">
										<i class="pe-7s-repeat" style="position:relative;font-weight: bolder; font-size:20px; top:0px;"></i>
									</a>
								</li>
								<li class="dropdown" style="position:relative; top:0px;">
									<a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-globe" data-count="0"></i>
										<b class="caret hidden-lg hidden-md"></b>
										<p class="hidden-lg hidden-md">
											<b class="caret"></b>
										</p>
										<span class="notif-count">0</span>
									</a>
									<ul class="dropdown-menu" id="notificacoes">
										@foreach ($notificacoes_naoLidas as $notificacao)
											<li style="width:1050px;"><a href="#" >{{$notificacao['data']}}<button type="button" class="remover" id="{{$notificacao['id']}}" style="float: right;"><i style="position:relative; top:4px; color:red;font-weight:bold; font-size:18px; " class="pe-7s-close"></i></button></a></li>
										@endforeach
										
										<li><a href="#" style="background:#25385b; color:#fff; letter-spacing: 3px; text-align:center; font-size:12px" class="limpaNotificacoes"><b>LIMPAR<i class="pe-7s-trash"></i></b></a></li>
										
									</ul>
								</li>
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
				
			
				<main class="py-4" style="z-index:0;">
					<br>
					@if(auth()->user()->isAdmin == 0 || auth()->user()->isAdmin == 1 || auth()->user()->isAdmin == 2 || auth()->user()->isAdmin == 3)
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
					
					<div class="content">
						<div class="container-fluid">
							<?php 
								$usuario_existente = array('usuario'=>array(),'contador'=>array()); 
								$contador_totalMNLidas=0;
								foreach($users as $user)
								{
									foreach($messages_read as $message)
									{
										if($user->id == $message['from_user'])
										{
											if(!in_array($message['from_user'], $usuario_existente))
											{
												$contador_totalMNLidas = $contador_totalMNLidas + 1;
											}
										}
									}
								}
								//echo $contador_totalMNLidas;
							?>
							<span class="dot" style="position:fixed; bottom:0px; right:10px;  z-index:4; " data-toggle="collapse" data-target="#chatbox" >
									<span style="position:relative;right:-60px;top:20px; background:red; color:#fff; z-index:5; visibility:hidden" class="badge" id="contadorTotal">
										{{$contador_totalMNLidas}}
									</span>
								<img class="chat-ico" src="{{url('img/chat-ico.svg')}}" >
							</span>
							<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
							<div id="chatbox"  hidden>
								<div id="friendslist">
									<!--<div id="topmenu" style="height:35px;">
									<button class="btnFechar" data-toggle="collapse" data-target="#chatbox"></button>
									</div>-->
									<div id="topmenu" >
										<span class="friends" onclick="change('friends')"></span>
										<span class="chats" onclick="change('chats')"></span>
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
												<span style="font-size:12px;">{{ $user->sobrenome }}</span>
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
									<!--<div id="search">
										<input type="text" class="form-control" id="searchfield" style="position:relative; top:10px;"  value="Procurar contatos..." />
										</div>   -->
									</div>
									<div id="chats" style="height:100px;" hidden>
										<?php $usuario_existente = array(); ?>
										@foreach($users as $user)
											@foreach($messages_read as $message)
												@if($user->id == $message['from_user'])
													@if(!in_array($message['from_user'], $usuario_existente))
														<a href="javascript:void(0);" style="text-decoration: none" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}" id="mensagem-{{$user->id}}" onclick="atualizacaMensagensNL({{$user->mensagensNaoLidas}}, {{$user->id}})">
															<div class="friend" id="{{ $user->id }}">
																<img src="https://cdn.ppconcursos.com.br/uploads/depoimentos/padrao.png" />
																<p>
																	<strong>{{ $user->name }}</strong>
																	<br>
																	<span style="font-size:12px;">{{ $user->sobrenome }}</span>
																</p>
																<span style="position:relative;right:0px;top:30%; background:red; color:#fff" class="badge" id="contador-{{ $user->id }}">{{ $user->mensagensNaoLidas }}</span><br>
															</div>
														</a>
														<?php $usuario_existente[] = $user->id;?>
													@else
													@endif
												@endif
											@endforeach
										@endforeach
										<!--<div id="search">
											<input type="text" class="form-control" id="searchfield" style="position:relative; top:10px;"  value="Procurar contatos..." />
											</div>   -->
									</div>
								</div>
								<div id="chatview" class="p1" >
									<div id="profile">
										<p></p>
										<span></span>
									</div>
									<div id="chat-messages">
										<div id="chat-overlay" class="row" style="z-index:1000"></div>
										<div id="sendmessage"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
						<!--APAGAR!?
						</div>
						</div>	
						</div>
						</div>-->
						
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
				<!--Apagar!?
				
				</div>-->
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

</form>
</html>
<script>
function goBack() {
  window.history.back();
}

function goForward() {
  window.history.forward();
}

// Remove notificação
$(document).on("click", ".limpaNotificacoes" , function() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	
	var user_registro = String(<?php echo auth()->user()->registro ?>);
	const notificacoes = Array.from(document.querySelectorAll('#notificacoes>li>a>button'));

	for (var i = 0; i < (notificacoes.length / 2); i++) 
	{
		var notificacao_id =notificacoes[i].id;
		
		if(notificacao_id != '' && user_registro != ''){
			$.ajax({
				type: 'POST',
				url: '{{ route("removerNotificacao") }}',
				dataType: 'json',
				data: {_token: CSRF_TOKEN, _method: 'POST', 'id_notificacao': notificacao_id, 'registro_user': user_registro},
				success: function(response){
					//alert(response);
			}
		});
			$(notificacoes[i]).closest('li').remove();
			
			notificationsCount -= 1	;
			notificationsCountElem.attr('data-count', notificationsCount);
			notificationsWrapper.find('.notif-count').text(notificationsCount);
			notificationsWrapper.show();
		}
		else{
			alert('Fill all fields');
		}
    	
  	}
});

$(document).ready(function() {
	var notificationsCount = (document.querySelectorAll("#notificacoes li").length)-1;
	//alert(notificationsCount);
	var notificationsWrapper   = $('.dropdown');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notifications          = notificationsWrapper.find('ul.dropdown-menu');
	notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
});


// Remove notificação
$(document).on("click", ".remover" , function() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	
	var notificacao_id = String($(this).attr('id'));
 	var user_registro = String(<?php echo auth()->user()->registro ?>);

	
  if(notificacao_id != '' && user_registro != ''){
	$.ajax({
	  type: 'POST',
	  url: '{{ route("removerNotificacao") }}',
	  dataType: 'json',
      data: {_token: CSRF_TOKEN, _method: 'POST', 'id_notificacao': notificacao_id, 'registro_user': user_registro},
      success: function(response){
        //alert(response);
      }
    });
	$(this).closest('li').remove();
	
	notificationsCount -= 1	;
	notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
  }else{
    alert('Fill all fields');
  }
});

</script>

    <script type="text/javascript">
      var notificationsWrapper   = $('.dropdown');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      //var notificationsCount     = parseInt(notificationsCountElem.data('count'));
	  var notificationsCount = (document.querySelectorAll("#notificacoes li").length)-1;
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');
		
      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;
	 
      var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
        cluster: "{{env('PUSHER_APP_CLUSTER')}}",
        encrypted: true
	  });
	  
	  

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('notificar');
	 
      // Bind a function to a Event (the full Laravel class)
    channel.bind('SEO\\Events\\Notificacao', function(data) {
		
		//console.log(data);
		//alert(data.notification.id);
		var notificacao_id = data.notification_id;
		var notificacao_tipo = data.notification_type;
		var notificacao = data.message;
		
		if(notificacao_tipo[3] == <?php echo Auth::user()->id ?>)
		{
			var existingNotifications = notifications.html();
			//var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
			var newNotificationHtml = `
				<li><a href="#" style="width:1050px;">`+notificacao+`<button type="button" class="remover" id="`+notificacao_id+`" style="float: right;"><i style="color:red;font-weight:bold; font-size:18px;" class="pe-7s-close"></i></button></a></li>				
			`;
			notifications.html(newNotificationHtml + existingNotifications);

			notificationsCount += 1;
			notificationsCountElem.attr('data-count', notificationsCount);
			notificationsWrapper.find('.notif-count').text(notificationsCount);
			notificationsWrapper.show();
		
			//verifica para quem é a mensagem
			if(notificacao_tipo[0] == "Message")
			{
				var contadorTotal = document.getElementById("contadorTotal").textContent;
					
				if(document.getElementById('contador-'+notificacao_tipo[1]) != null)
				{
					var somaMNL = document.getElementById('contador-'+notificacao_tipo[1]).textContent;
					somaMNL = parseInt(somaMNL) + 1;
					document.getElementById('contador-'+notificacao_tipo[1]).textContent= somaMNL;
					document.getElementById("contadorTotal").textContent =  parseInt(contadorTotal) + 1;
				}
				else{					
					document.getElementById("contadorTotal").textContent =  parseInt(contadorTotal) + 1;
					$("#chats").append("<a href='javascript:void(0);' style='text-decoration: none' class='chat-toggle' data-id='"+notificacao_tipo[1]+"' data-user='"+notificacao_tipo[2]+"' id='mensagem-"+notificacao_tipo[1]+"' onclick='atualizacaMensagensNL(1, "+notificacao_tipo[1]+")'><div class='friend' id='"+notificacao_tipo[1]+"'><img src='https://cdn.ppconcursos.com.br/uploads/depoimentos/padrao.png'><p><strong>"+notificacao_tipo[2]+"</strong><br><span style='font-size:12px;'>"+notificacao_tipo[2]+"</span></p><span style='position:relative;right:0px;top:30%; background:red; color:#fff' class='badge' id='contador-'"+notificacao_tipo[1]+"'>1</span><br></div></a>");
				}
				
				//recarrega script para abrir a nova conversa recém criada
				var script = document.createElement("script");
				script.type = "text/javascript";
				script.src = "{{ asset('js/chatStyle.js') }}";
				document.getElementsByTagName("head")[0].appendChild(script);
				onclick="atualizacaMensagensNL({{$user->mensagensNaoLidas}}, {{$user->id}})"	

				$.notify({
				// options
				//icon: 'glyphicon glyphicon-warning-sign',
				title: 'AVISO',
				message: notificacao,
				//url: 'https://github.com/mouse0270/bootstrap-notify',
				//target: '_blank'
				},
				{
					// settings
					element: 'body',
					position: null,
					type: "info",
					allow_dismiss: true,
					newest_on_top: false,
					showProgressbar: false,
					placement: {
						from: "top",
						align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 1031,
					delay: 5000,
					timer: 1000,
					url_target: '_blank',
					mouse_over: null,
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
					onShow: null,
					onShown: null,
					onClose: null,
					onClosed: null,
					icon_type: 'class',
					template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
						'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
						'<span data-notify="icon"></span> ' +
						'<span data-notify="title">{1}</span> ' +
						'<span data-notify="message">{2}</span>' +
						'<div class="progress" data-notify="progressbar">' +
							'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
						'</div>' +
						'<a href="{3}" target="{4}" data-notify="url"></a>' +
					'</div>' 
				});
			}
		}
		else if(notificacao_tipo[0] != "Message" && <?php echo Auth::user()->isAdmin?> == notificacao_tipo[3])
		{
			$.notify({
				// options
				//icon: 'glyphicon glyphicon-warning-sign',
				title: 'AVISO',
				message: notificacao,
				//url: 'https://github.com/mouse0270/bootstrap-notify',
				//target: '_blank'
				},
				{
					// settings
					element: 'body',
					position: null,
					type: "info",
					allow_dismiss: true,
					newest_on_top: false,
					showProgressbar: false,
					placement: {
						from: "top",
						align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 1031,
					delay: 5000,
					timer: 1000,
					url_target: '_blank',
					mouse_over: null,
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
					onShow: null,
					onShown: null,
					onClose: null,
					onClosed: null,
					icon_type: 'class',
					template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
						'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
						'<span data-notify="icon"></span> ' +
						'<span data-notify="title">{1}</span> ' +
						'<span data-notify="message">{2}</span>' +
						'<div class="progress" data-notify="progressbar">' +
							'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
						'</div>' +
						'<a href="{3}" target="{4}" data-notify="url"></a>' +
					'</div>' 
			});

		}
	});
		
		
		  
	$('body').mousemove(function() {
		if(parseInt(document.getElementById("contadorTotal").textContent) > 0)
		{
			document.getElementById("contadorTotal").style.visibility = "";
		}
		else{
			document.getElementById("contadorTotal").style.visibility = "hidden";
		}
	});
</script>
