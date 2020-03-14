@extends('layouts.app')
	@section('content')	
<style>
.expanded{
   
}

.executora{
   
	animation-name: openingBox;
	animation-duration: 0.5s;
	opacity: 1;
	transform: translate(0, 0px);
}

@keyframes openingBox {
  0% {
    transform: translate(0px, -50px);
    opacity: 0.1;
  }

  90% {
	transform: translate(0, -1px);
    opacity: 0.9;
  }


  100% {
	transform: translate(0px, 0px);
    opacity: 1;
    
  }
}
	

</style>

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('showUnidadeOrcamentaria') }}">
									<div class="row">
										<div class="col-md-6">
											<h4 class="title">Unidade Orçamentária/Executora</h4>	
										</div>
										<div class="col-md-6" >
											<div class="row">
												<div class="col-md-5" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="" selected></option>
														<option value="ORCAMENTARIA">Unidade Orçamentária</option>
														<option value="EXECUTORA">Unidade Executora</option>
													</select>
												</div>
												<div class="col-md-3" style="margin-right:-4px;">
													<input class="form-control" name="codigo" id="codigo" maxlength="8"  onkeyup="mascaraCodigoDespesa( this, cDespesa );" placeholder="Código"  autofocus disabled>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" >
												</div>	
												<div class="col-md-2">
													<a data-toggle="modal" data-target="#cadastrarUnidade" class="btn btn-info btn-fill pull-left">
														Nova
													</a>
												</div>								
											</div>	
										</div>
									</div>
									<br>									
								</form>
							</div>
						</div>			
						
						<div class="card">
						@if ($pesquisaFeita=='ok') 
                            <div class="header">
                                <h4 class="title">Resultado da pesquisa</h4>
                                <p class="category">Pesquisa realizada pelo filtro <b></b></p>
                            </div>
                            <div class="content table-responsive table-full-width">
								<table id="tree" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
										
											<th>Código</th>
											<th></th>
											<th>Unidade Orçamentária</th>
											<th></th>
										</tr>
									</thead>
                                    <tbody>
									<form method="get"  action="{{route('showUnidadeExecutora')}}">
											<?php 
												$indiceA=0;
												$indiceB=0;
											?>
											@foreach( $unidadesOrcamentarias as $unidadeOrcamentaria )
											<?php $indiceA=$indiceA+1; ?>
												
												
												<tr class='treegrid-{{$indiceA}}'>
													<td>{{ $unidadeOrcamentaria->codigo }}</td>	
													<td></td>
													<td>{{ $unidadeOrcamentaria->unidade }}</td>
													<td></td>
												</tr>
												<?php $indiceB = $indiceA;?>
												@foreach($unidadesExecutoras as $unidadeExecutora)
												@if($unidadeOrcamentaria->unidade == $unidadeExecutora->unidade_orcamentaria)
												<?php $indiceA=$indiceA+1; ?>
												<tr style="background:none; border-width:0px; border: none !important;pointer-events: none;" class='treegrid-{{$indiceA}} treegrid-parent-{{$indiceB}}' >
													<td style="border-top: none !important; font-size:15px"><div class='executora' >{{ $unidadeExecutora->codigo }}</div></td>
													<td style="border-top: none !important; font-size:15px"></td>
													<td style="border-top: none !important; font-size:15px"><div class='executora' >{{ $unidadeExecutora->unidade }}</div></td>
													<td style="border-top: none !important; font-size:15px"></td>
												</tr>
												@endif
													
												@endforeach
											@endforeach
									</form>
									</tbody>
                                </table>
							</div>
						@endif
                        </div>
					
				
						
					</div>
				</div>
			</div>	
		</div>
			
		<!--  Verifica se a unidade não foi localizada na base de dados e chama o modal -->
		@if ( $unidade_naoLocalizada == "ok" )
			<script>
				$(document).ready(function()
				{
					$('#modalUnidadeNaoLocalizada').modal({
						show: true,
					})
				});
			</script>
		@endif	
		
		<script>
		$(document).ready(function() {
		
			$('#tree').treegrid({
				enableMove: true,
				onMoveOver: function(item, helper, target, position) {
					if (target.hasClass('treegrid-8')) 
						return false;
						return true;
				}
			});
		});
		</script>
		
			
	@endsection		
	


<script>

// função para ativar os campos do filtro
function ativarCamposParaFiltro() 
	{
		if (document.getElementById('filtro').value == "")
		{
			document.getElementById('codigo').disabled = true;
		}
		else{
			document.getElementById('codigo').disabled=false;
			document.getElementById('codigo').required=true;
		}
	}

function submitForm(sub) {
document.forms[sub].submit();
}

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

</script>

<!-- Modal Escolher Tipo de Unidade-->
<div id="cadastrarUnidade" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Cadastrar Unidade</h5>
			</div>
						
				<div class="modal-body">
					
						<div class="row">
							<div class="col-md-6 text-right">
							<form method="get"  action="{{route ('cadastrarUnidadeOrcamentaria') }}">
								<button name="unidade" type="submit" class="btn btn-white btn-animation-1" style="width:200px" value="orcamentaria">Unidade Orçamentária</button><br>
							</div>
							</form>
							<div class="col-md-6 text-left">
							<form method="get"  action="{{route ('cadastrarUnidadeExecutora') }}">
								<button name="unidade" type="submit" class="btn btn-white btn-animation-1" style="width:200px" value="executora">Unidade Executora</button><br>
							</form>
							</div>
						</div>
					</form>		
				</div>
					
			<div class="modal-footer">		
			</div>
		
		</div>
		
	</div>
</div>


<!-- Modal Unidade não Localizada-->
<div class="modal"  id="modalUnidadeNaoLocalizada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Erro! - </b> Unidade Não Localizada </span>
		</div>
	</div>
</div>


