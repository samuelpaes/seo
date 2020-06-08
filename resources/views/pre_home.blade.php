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

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard-home.css?v=1.4.0') }}"rel="stylesheet"/>

	<!--   Core JS Files   -->

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"type="text/javascript"></script>
	
</head>
	<body style="background:#25385b">
			
	
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


</script>
   
</body>





</html>	
