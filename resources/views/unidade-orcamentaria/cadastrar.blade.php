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
								<h4 class="title">Unidade Orçamentária/Executora</h4>
								<br>
							</div>	
						</div>
						
					<!--Cadastrar Unidade Orçamentaria -->
						@if ($unidade == 'orcamentaria')
							<div class="card">
								<div class="header">
									<h5 class="title">Cadastrar Unidade Orçamentária</h5>
									<br>
								</div>	
								<div class="content">
									<form method="POST" action="{{route ('inserirUnidadeOrcamentaria') }}">	
										@csrf
										@method('POST')								
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Código</label>
													<input type="text" name="codigo" id="codigo" maxlength="8"  onkeyup="mascaraCodigoDespesa( this, cDespesa );" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}" required autofocus>																		
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label for="unidade-orcamentaria">Unidade Orçamentária</label>
													<input type="text" class="form-control"  name="unidade"  style="text-transform: uppercase" required>
												</div>
											</div>
											<div class="col-md-2">
												<label><input style="border:none; background-color: transparent;" disabled></input></label>
												<button type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button>
											</div>	
											<div class="col-md-1">
											</div>
											<div class="col-md-1">
												<label><input style="border:none;  background-color: transparent;" disabled></input></label>
												<button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#importarArquivoOrcamentaria">Importar</button>
											</div>
										</div>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
					
					<!--Cadastrar Unidade Executora -->					
						@elseif ($unidade == 'executora')
						<form method="POST" action="{{route ('inserirUnidadeExecutora') }}">	
							<div class="card">
								<div class="header">
									<div class="row">
										<div class="col-md-4">
										<h5 class="title">Cadastrar Unidade Executora</h5>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-5" style="word-wrap: nowrap;">
													<label for="UnidadeOrcamentaria" >Unidade Orçamentária:</label>
												</div>
												<div class="col-md-5">
													<select class="form-control" name="unidade_orcamentaria" id="unidade_orcamentaria" onchange="ativarCamposParaFiltro()">
														<option value="" selected></option>
														@foreach ($unidadesOrcamentarias as $unidadeOrcamentaria)
														<option  value="{{{$unidadeOrcamentaria['unidade']}}}" >{{{$unidadeOrcamentaria['unidade']}}}</option> 
														@endforeach
													</select>
												</div>
												<div class="col-md-2">
													<button type="button" id="btnImportar2" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#importarArquivoExecutora">Importar</button>
												</div>
											</div>
										</div>	
										<br>
									</div>	
								</div>	
								<div class="content">
										@csrf
										@method('POST')								
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Código</label>
													<input id="codigo" type="text" name="codigo" id="codigo" maxlength="8"  onkeyup="mascaraCodigoDespesa( this, cDespesa );" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}" required autofocus disabled>																		
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label for="unidade-executora">Unidade Executora</label>
													<input id="unidade" type="text" class="form-control"  name="unidade"  style="text-transform: uppercase" required disabled>
												</div>
											</div>
											<div class="col-md-2">
												<label><input style="border:none; background-color: transparent;" disabled></input></label>
												<button id="btnCadastrar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px" disabled>Cadastrar</button>
											</div>	
											
										</div>
										<div class="clearfix"></div>
								</div>
							</div>
						</form>
						@endif
							
						
						
						
						<div class="card">
							
								
								@if ($pesquisaFeita=='ok') 
									<div class="header">
										<h4 class="title">Dados a serem importados</h4>
									</div>
									
									<div class="content table-responsive table-full-width">
										<table class="table table-hover table-striped" >
											@If($unidade == 'executora')
											<form method="POST" action="{{route ('inserirUnidadeExecutora') }}">	
											@csrf
											@method('POST')	
											<p class="category">Arquivo origem: <b><input name="nomeDoArquivo" style="border:none; background:none;" value="{{$nome}}" readonly="readonly"></b></p>
											<thead>
												<tr>
													<th>Código</th>
													<th>Especificacão</th>
													<th>Tipo</th>
													<!--<th><div align="right">Editar</div></th>-->
												</tr>
											</thead>
											<tbody>
												@foreach( $colecoes as $colecao )
												<tr>
													<td name="codigo_executora">{{$colecao['codigo']}}</td>
													<td name="unidade">{{$colecao['unidade']}}</td>
													<td name="unidade_orcamentaria">{{$colecao['unidade_orcamentaria']}}</td>
													<!--<td><button class="btn btn-info btn-fill pull-right"><i class="pe-7s-pen"></button></b></td>-->
												</tr>
												@endforeach		
												<tr>
													<td colspan="3"><button type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button></td>
												</tr>
											</tbody>
											</form>
											@else($unidade == 'orcamentaria')
											<form method="POST" action="{{route ('inserirUnidadeOrcamentaria') }}">
											<p class="category">Arquivo origem: <b><input name="nomeDoArquivo" style="border:none; background:none;" value="{{$nome}}" readonly="readonly"></b></p>
											@csrf
											@method('POST')	
											<thead>
												<tr>
													<th>Código</th>
													<th>Unidade</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $colecoes as $colecao )
												<tr>
													<td name="codigo_orcamentaria">{{$colecao['codigo']}}</td>
													<td name="unidade">{{$colecao['unidade']}}</td>
												</tr>
												@endforeach		
												<tr>
													<td colspan="3"><button type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button></td>
												</tr>
											</tbody>
											</form>
											@endif
										</table>
									</div>
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
		if (document.getElementById('unidade_orcamentaria').value == "")
		{
			document.getElementById('codigo').disabled = true;
			document.getElementById('unidade').disabled = true;
			document.getElementById('btnImportar').disabled = true;
			document.getElementById('btnCadastrar').disabled = true;
		}
		else{
			document.getElementById('codigo').disabled=false;
			document.getElementById('codigo').required=true;
			document.getElementById('unidade').disabled=false;
			document.getElementById('unidade').required=true;
			document.getElementById('btnImportar').disabled=false;
			document.getElementById('btnImportar').required=true;
			document.getElementById('btnCadastrar').disabled=false;
			document.getElementById('btnCadastrar').required=true;
		}
	}		
</script>





<!-- Modal Importar Unidade Orcamentaria Arquivo-->
<div id="importarArquivoOrcamentaria" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo' e 'unidade' na primeira linha tabela." data-balloon-pos="down" class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo</h5>
			</div>
			<form action="{{ route('importarUnidadeOrcamentaria') }}" method="post" enctype="multipart/form-data"  files="true">
			{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-9">
							<input type="file" name="arquivo"  accept=".xlsx"></input>
						</div>

					</div>
				</div>
				<div class="modal-footer">	
					<button type="submit" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Enviar</button>	
					<button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>								
				</div>
			</form>		
		</div>
		
	</div>
</div>

<!-- Modal Importar Unidade Executora Arquivo-->
<div id="importarArquivoExecutora" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo' e 'unidade' na primeira linha tabela." data-balloon-pos="down" class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo</h5>
			</div>
			<form action="{{ route('importarUnidadeExecutora') }}" method="post" enctype="multipart/form-data"  files="true">
			{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-9">
							<input type="file" name="arquivo"  accept=".xlsx"></input>
						</div>

					</div>
				</div>
				<div class="modal-footer">	
					<button type="submit" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Enviar</button>	
					<button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>								
				</div>
			</form>		
		</div>
		
	</div>
</div>


<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Unidade Cadastrada com Sucesso!')
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
