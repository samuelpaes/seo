@extends('layouts.app')
	@section('content')	
	
	<script>
	
	
	table.treetable span.indenter {
  display: inline-block;
  margin: 0;
  padding: 0;
  text-align: right;

  /* Disable text selection of nodes (for better D&D UX) */
  user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -o-user-select: none;
  -webkit-user-select: none;

  /* Force content-box box model for indenter (Bootstrap compatibility) */
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;

  width: 19px;
}

table.treetable span.indenter a {
  background-position: left center;
  background-repeat: no-repeat;
  display: inline-block;
  text-decoration: none;
  width: 19px;
}

</script>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('showNaturezaDeDespesa') }}">
									<div class="row">
										<div class="col-md-6">
											<h4 class="title">Natureza de Despesa</h4>	
										</div>
										<div class="col-md-6" >
											<div class="row">
												<div class="col-md-4" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="TODAS" selected>Todas</option>
														<option value="CODIGO">Código</option>
														<option value="ESPECIFICACAO">Especificação</option>
														<option value="TIPO">Tipo</option>
													</select>
												</div>
												<div class="col-md-4" style="margin-right:-4px;">
													<input id="valor"  class="form-control" name="valor"  style="text-transform: uppercase" autofocus >
													<select class="form-control" id="espe" name="valor2" style="display:none">
														<option value="TODAS" selected>Todas</option>
														<option value="DESPESAS CORRENTES">DESPESAS CORRENTES</option>
														<option value="DESPESAS DE CAPITAL">DESPESAS DE CAPITAL</option>
														<option value="RESERVA DE CONTINGENCIA">RESERVA DE CONTINGÊNCIA</option>
													</select>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
												</div>	
												
												<div class="col-md-2">
													<a href="{{ url('natureza-de-despesa/cadastrar') }}" class="btn btn-info btn-fill pull-left">
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
											<th>Tipo</th>
											<!--<th><div align="right">Editar</div></th>-->
										</tr>
									</thead>
                                    <tbody>
										@foreach( $naturezasDeDespesas as $naturezaDeDespesa )
                                        <tr style="display : table-row;">
                                        	<td>{{ $naturezaDeDespesa->codigo }}</td>
											<td>{{ $naturezaDeDespesa->especificacao }}</td>
											<td>{{ $naturezaDeDespesa->tipo }}</td>
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
		   
				
			//Coloca um ponto entre o primeiro e o segundo
			v=v.replace(/(\d{1})(\d)/,"$1.$2")
			
			//Coloca um ponto entre o segundo e o terceiro 
			v=v.replace(/(\d{1})(\d)/,"$1.$2")
			
			//Coloca um ponto entre o terceiro e o quinto
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

			//Coloca um ponto entre o quinto e o sétimo 
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

			//Coloca um ponto entre o oitavo e décimo
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

			return v;
		}	


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
			document.getElementById('valor').maxLength = "12";
			document.getElementById('espe').style.display = "none";
			document.getElementById('valor').style.display = "";
			document.getElementById('valor').setAttribute('onkeyup', 'mascaraCodigoDespesa( this, cDespesa )');
	

		}
		else if (document.getElementById('filtro').value == "ESPECIFICACAO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
			document.getElementById('valor').style.display = "";
			document.getElementById('espe').style.display = "none";
			document.getElementById('valor').setAttribute('onkeyup', '');
		}
		else if (document.getElementById('filtro').value == "TIPO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=false;
			document.getElementById('valor').style.display = "none";
			document.getElementById('espe').style.display = "";
			document.getElementById('valor').setAttribute('onkeyup', '');
		}
	}
	
</script>


<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Natureza De Despesa Cadastrada Com Sucesso!' or $mensagem == 'Naturezas De Despesas Cadastradas Com Sucesso!')
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






