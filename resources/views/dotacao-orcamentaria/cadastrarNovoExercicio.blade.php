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
									<div class="row">
										<div class="col-md-2">
											<label><input style="border:none;  background-color: transparent;" disabled>Exercício</input></label>
											<input onkeyup="ativarCamposParaFiltro()" type="text" maxlength="4" pattern="([0-9]{4})" name="exercicio" id="exercicio"  placeholder="" class="form-control"></input>
										</div>
										<div class="col-md-2">
										</div>
										<form method="POST" action="{{route ('cadastrarNovoExercicioDotacaoOrcamentaria') }}">	
										<div class="col-md-4">
											<label for="UnidadeOrcamentaria">Unidade Orçamentária:</label>
											<select class="form-control" name="unidade_orcamentaria" id="unidade_orcamentaria" onchange="ativarCamposParaFiltro()" disabled>
												<option value="" selected></option>
												@foreach ($unidadesOrcamentarias as $unidadeOrcamentaria)
												<option  value="{{{$unidadeOrcamentaria['codigo']}}}" >{{{$unidadeOrcamentaria['codigo']}}} - {{{$unidadeOrcamentaria['unidade']}}}</option> 
												@endforeach
											</select>
										</div>
										
										<div class="col-md-2">
											
												@csrf
												@method('POST')	
												<input id="acao" name="acao" value="implementar" hidden />
												<input id="implementarExercicio" name="exercicio" hidden />
												<label><input style="border:none;  background-color: transparent;" disabled></input></label>
												<button type="submit" id="btnImplementar" class="btn btn-info btn-fill pull-left" disabled>Implementar</button>
											
										</div>
										</form>
										<div class="col-md-2">
											<label><input style="border:none;  background-color: transparent;" disabled></input></label>
											<button type="button" id="btnImportar" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#importarArquivo" disabled>Importar</button>
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
		
		<script>

			$(document).ready(function() {
				$("#exercicio").keyup(function() {
					$("#exercicio").val(this.value.match(/[0-9]*/));
				});
				
			});
		</script>

		
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

document.addEventListener('DOMContentLoaded', function() 
	{
		var exercicio = new Date().getFullYear()
		$("#exercicio").attr("placeholder", exercicio);
		
		for(var i = exercicio; i < (exercicio - 50); i--)
		{
		}
		alert(exercicio-50);
		/*
		option.text = "01.000.0000";
		option.value = "01.000.0000";
		select.add(option, select[1]);*/
	}, false);
	
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


function ativarCamposParaFiltro() 
	{
		var exercicio = document.getElementById("exercicio").value;
		if (exercicio.length == 4 && exercicio > 2015 && exercicio < 2999)
		{
			document.getElementById('btnImplementar').disabled=false;
			document.getElementById('btnImportar').disabled=false;
			document.getElementById('unidade_orcamentaria').disabled=false;
			document.getElementById('exercicio2').value=exercicio;
			document.getElementById('implementarExercicio').value=exercicio;
			document.getElementById('importarExercicio').value=exercicio;
		
		}
		else{
			document.getElementById('btnImplementar').disabled=true;
			document.getElementById('btnImportar').disabled=true;
			document.getElementById('unidade_orcamentaria').disabled=true;
		}
	}		
</script>






<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Unidade Orçamentária Cadastrada com Sucesso!')
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b>{{$mensagem}}. </span>
		</div>
		@else
		<div class="alert alert-danger" style="border-radius: 5px">
            <button type="button" aria-hidden="true" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem}}</span>
         </div>
		@endif
	</div>
</div>
