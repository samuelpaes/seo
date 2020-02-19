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
								<h4 class="title">Natureza de Despesa</h4>
								<br>
							</div>	
						</div>
						<div class="card">
							<div class="header">
								<h5 class="title">Cadastrar Natureza de Despesa</h4>
							</div>	
							<div class="content">
								<form method="POST" action="{{route ('inserirNaturezaDeDespesa') }}">	
									@csrf
									@method('POST')								
									<div class="row">
								
										<div class="col-md-3">
											<div class="form-group">
												<label>Código</label>
												<input type="text" name="codigo" id="codigo" maxlength="12"  onkeyup="mascaraCodigoDespesa( this, cDespesa );" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}" required autofocus>																		
											</div>
										</div>
								
										<div class="col-md-5">
											<div class="form-group">
												<label for="especificacao">Especificação</label>
												<input type="text" class="form-control"  name="especificacao"  style="text-transform: uppercase" required>
											</div>
										</div>
								
										<div class="col-md-4">
											<div class="form-group">
												<label for="tipo">Tipo</label>
												<select class="form-control" name="tipo" required>
													<option selected></option>
													<option value="Despesas de Capital">Despesas de Capital</option>
													<option value="Despesas Correntes">Despesas Correntes</option>
													<option value="Reserva de Contigência">Reserva de Contigência</option>
												</select>	
											</div>	
										</div>	
									
									</div>
										
									<div class="row">
										<div class="col-md-9" >
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-info btn-fill pull-left" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button>
										</div>	
										<div class="col-md-1">
											<button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#importarArquivo">Importar</button>
										</div>
										
									</div>
									
									<div class="clearfix"></div>
								</form>
							</div>
						</div>		
						
						<div class="card">
							<form method="POST" action="{{route ('inserirNaturezaDeDespesa') }}">	
								@csrf
								@method('POST')	
								@if ($pesquisaFeita=='ok') 
									<div class="header">
										<h4 class="title">Dados a serem importados</h4>
										<p class="category">Arquivo origem: <b><input name="nomeDoArquivo" style="border:none; background:none;" value="{{$nome}}" readonly="readonly"></b></p>
									</div>
									<div class="content table-responsive table-full-width">
										<table class="table table-hover table-striped" >
											<thead>
												<tr>
													<th>Código</th>
													<th>Especificacão</th>
													<th>Tipo</th>
													<!--<th><div align="right">Editar</div></th>-->
												</tr>
											</thead>
											<thead>
												@foreach( $colecoes as $colecao )
												<tr>
													<td>{{$colecao['codigo']}}</td>
													<td name="especificacao">{{$colecao['especificacao']}}</td>
													<td name="tipo">{{$colecao['tipo']}}</td>
													<!--<td><button class="btn btn-info btn-fill pull-right"><i class="pe-7s-pen"></button></b></td>-->
												</tr>
												@endforeach		
												<tr>
													<td colspan="3"><button type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button></td>
												</tr>
											</thead>
										</table>
									</div>
							</form>
						</div>
						@else
						@endif
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
/* Máscaras Código da Natureza de Despesa */
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
</script>





<!-- Modal Importar Natureza de Despesa de Arquivo-->
<div id="importarArquivo" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo', 'tipo' e 'especificacao' RESPECTIVAMENTE na primeira linha tabela." data-balloon-pos="down" class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo</h5>
			</div>
			<form action="{{ route('importarNaturezaDeDespesa') }}" method="post" enctype="multipart/form-data"  files="true">
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
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Atenção! - </b>{{$mensagem}}. </span>
		</div>
	</div>
</div>

		


