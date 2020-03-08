<style>

</style>

@extends('layouts.app')
	@section('content')
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h4 class="title">Dotação Orçamentária</h4>
								<br>
							</div>	
						</div>
						
						<form method="POST" action="{{route ('implementarDotacaoOrcamentaria') }}">	
							<div class="card">
								<div class="header">
									<div class="row">
										<div class="col-md-12">
										<h5 class="title">Cadastrar Dotação Orçamentária</h5>
										</div>
									</div>	
								</div>
							<div class="content">
								<div class="header">
									@csrf
									@method('POST')								
									<div class="row">
										<div class="col-md-4">
											<label for="UnidadeOrcamentaria">Unidade Orçamentária:</label>
											<select class="form-control" name="unidade_orcamentaria" id="unidade_orcamentaria" onchange="ativarCamposParaFiltro()">
												<option value="" selected></option>
												@foreach ($unidadesOrcamentarias as $unidadeOrcamentaria)
												<option  value="{{{$unidadeOrcamentaria['codigo']}}}" >{{{$unidadeOrcamentaria['codigo']}}} - {{{$unidadeOrcamentaria['unidade']}}}</option> 
												@endforeach
											</select>
										</div>
										<div class="col-md-2">
											<label for="Exercicio">Exercício</label>
												<select class="form-control" name="exercicio" id="exercicio" onchange="ativarCamposParaFiltro()">
												
											</select>
										</div>
										<div class="col-md-2">
										</div>
										
										<div class="col-md-2">
											<label><input style="border:none;  background-color: transparent;" disabled></input></label>
											<button type="submit" id="btnImplementar" class="btn btn-info btn-fill pull-right" disabled>Implementar</button>
										</div>
										<div class="col-md-2">
											<label><input style="border:none;  background-color: transparent;"></input></label>
											<button type="button" id="btnImportar" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#importarArquivo" >Importar</button>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</form>
					<br>
											
						
						
                    </div>
				</div>
			</div>	
		</div>
		
		
		@if ($mensagem <> "")
			<script>
				$(document).ready(function()
				{
					$('#modalMensagem').modal({
						show: true,
					})
				});
			</script>
		@endif
		
		
	
	@endsection	
		
		


<script>
/* Máscaras Código da Unidade Orcamentaria */
		function mascaraCodigoDespesa(o,f){
			v_obj=o
			v_fun=f
			setTimeout("execmascara()",1)
		}
		function execmascara(){
			v_obj.value=v_fun(v_obj.value)
		}
		function cDespesa(v){
			
			//Remove tudo o que não é dígito
			v=v.replace(/\D/g,"");            
		   
				
			
			
			//Coloca um ponto entre o terceiro e o quinto
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

			//Coloca um ponto entre o quinto e o sétimo 
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

		

			return v;
		}
function ativarEnviar()
	{
		if (document.getElementById('arquivo').value == "")
		{
			document.getElementById('btnEnviar').disabled = true;		
		}
		else{
			document.getElementById('btnEnviar').disabled=false;
		}
	}		

function ativarCamposParaFiltro() 
	{
		if ((document.getElementById('unidade_orcamentaria').value == "") || (document.getElementById('exercicio').value == ""))
		{
			document.getElementById('btnImplementar').disabled = true;
					
		}
		else{
			document.getElementById('btnImplementar').disabled=false;
		}
	}		
	
	document.addEventListener('DOMContentLoaded', function() 
	{
		var exercicio = new Date().getFullYear()
		document.getElementById('exercicio2').value = new Date().getFullYear();
		$("#exercicio").attr("placeholder", exercicio);
		
		
		var i;
		var j = 0;
		for (i = exercicio+1; i > (exercicio-4); i--) 
		{
			var select = document.getElementById("exercicio");
			var option = document.createElement("option");
			j = j+1;
			option.text = i;
			option.value = i;
			select.add(option, select[j]);
			select.selectedIndex = "1";
		}
		
		
		
	}, false);
</script>


<!-- Modal Importar Dotação Atualizada-->
<div id="importarArquivo" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo_dotacao', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'vinculo', 'dotacao', 'empenhado', 'saldo' e 'reserva'  na primeira linha tabela." data-balloon-pos="down" data-balloon-length='xlarge' class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;word-wrap:break-word"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo de Atualização</h5>
			</div>
			<form action="{{ route('importarAtualizarDotacaoOrcamentaria') }}" method="post" enctype="multipart/form-data"  files="true">
			{{ csrf_field() }}
				<input id="exercicio2" name="exercicio" hidden/>
				<div class="modal-body" onclick="ativarEnviar()" onmouseover="ativarEnviar()" onmousemove="ativarEnviar()">
					<div class="row">
						<div class="col-md-9">
							<input type="file" id="arquivo" name="arquivo"  accept=".xlsx" onclick="ativarEnviar()" onmouseover="ativarEnviar()"></input>
						</div>

					</div>
				</div>
				<div class="modal-footer">	
					<button type="submit" id="btnEnviar" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right" disabled>Enviar</button>	
					<button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>								
				</div>
			</form>		
		</div>
		
	</div>
</div>


<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Unidade Orçamentária Cadastrada com Sucesso!')
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b>{{$mensagem}}. </span>
		</div>
		@else
		<div class="alert alert-warning" style="border-radius: 5px">
            <button type="button" aria-hidden="true" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem}}</span>
         </div>
		@endif
	</div>
</div>
