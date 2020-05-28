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

   
</head>
	<body onmouseover="checaResolucao()" onmousemove="checaResolucao()" onwheel="checaResolucao()" style="background:#25385b">
			
	
<!-- Modal Alterar Secretaria-->
<div id="definir-secretaria" class="modal fade" tabindex="-1" role="dialog" style=" position: absolute;left: 0%;top: 50%; margin-top: -150px;  backdrop:static">
	<div class="modal-dialog" role="document">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
				<!--<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo_dotacao', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'vinculo', 'dotacao', 'empenhado', 'saldo' e 'reserva'  na primeira linha tabela." data-balloon-pos="down" data-balloon-length='xlarge' class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;word-wrap:break-word"></i></button>-->
		
	
		
				<h5 class="modal-title" style="text-align:center">UNIDADE ORÇAMENTÁRIA</h5>
			</div>
			<form action="{{ route('home') }}" method="post" enctype="multipart/form-data"  files="true">
			{{ csrf_field() }}
			<input id="exercicio2" name="exercicio" hidden/>
				<div class="modal-body">
          <select class="form-control" name="secretaria" align='right' class='form-control'  name='secretaria'>
            <option selected></option>
              @foreach($secretarias as $secretaria)
                @if($secretaria != "")
                  <option value="{{$secretaria}}">{{$secretaria}}</option>
                @endif
              @endforeach
						</select>
				</div>
				<div class="modal-footer">	
					<input name="registro_alterarSecretaria" id="registro_alterarSecretaria" hidden></input>
					<button type="submit" id="btnSalvar" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right" >Entrar</button>	
				</div>
			</form>		
		</div>
		
	</div>
</div>
			
		
		
	<script>

$(document).ready(function()
				{
					$('#definir-secretaria').modal({
						show: true,
						backdrop:'static', 
						keyboard: false,
					})
				});

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
   
</body>





</html>	
