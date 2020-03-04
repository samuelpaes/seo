@extends('layouts.app')
	@section('content')	
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('showClassificacaoFuncionalProgramatica') }}">
									<div class="row">
										<div class="col-md-6">
											<h4 class="title">Classificação Funcional Programática</h4>	
										</div>
										<div class="col-md-6" >
											<div class="row">
												<div class="col-md-4" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="TODAS" selected>Todas</option>
														<option value="CODIGO">Código</option>
														<option value="ESPECIFICACAO">Especificação</option>
													</select>
												</div>
												<div class="col-md-4" style="margin-right:-4px;">
													<input id="valor"  class="form-control" name="valor"  style="text-transform: uppercase" autofocus disabled>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
												</div>	
												
												<div class="col-md-2">
													<a href="{{ url('classificacao-funcional-programatica/cadastrar') }}" class="btn btn-info btn-fill pull-left">
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
                                <p class="category">Pesquisa realizada pelo filtro <b>{{$filtro}}</b></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
											<th>Código</th>
											<th>Especificação</th>
											<!--<th><div align="right">Editar</div></th>-->
										</tr>
									</thead>
                                    <tbody>
										@foreach( $classificacoesFuncionaisProgramaticas as $classificacaoFuncionalProgramatica )
                                        <tr style="display : table-row;">
                                        	<td>{{ $classificacaoFuncionalProgramatica->codigo }}</td>
											<td>{{ $classificacaoFuncionalProgramatica->especificacao }}</td>
											<!--<td><button class="btn btn-info btn-fill pull-right"><i class="pe-7s-pen"></button></b></td>-->
                                        </tr>
										@endforeach
                                    </tbody>
                                </table>
                            </div>
						@else
						@endif
                        </div>
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

function ativarCamposParaFiltro() 
	{
		if (document.getElementById('filtro').value == "TODAS")
		{
			document.getElementById('valor').disabled = true;
		}
		else if (document.getElementById('filtro').value == "CODIGO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
			document.getElementById('valor').setAttribute("onkeyup", "mascaraCodigoDespesa( this, cDespesa );");
			document.getElementById('valor').setAttribute("maxlength", "17");
		}
		else
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
		}
	}
	
/* Máscaras Código da Natureza de Despesa */
function mascaraCodigoDespesa(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}
function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}
function cDespesa(v)
{
			
//Remove tudo o que não é dígito
	v=v.replace(/\D/g,"");            
		   
				
	//Coloca um ponto entre o primeiro e o segundo
	v=v.replace(/(\d{2})(\d)/,"$1.$2")
	
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	
	v=v.replace(/(\d{4})(\d)/,"$1.$2")
	
	v=v.replace(/(\d{1})(\d{2,3})$/, "$1.$2");
	
	return v;
}
	
</script>



<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Classificação Funcional Programática Cadastrada Com Sucesso!')
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




