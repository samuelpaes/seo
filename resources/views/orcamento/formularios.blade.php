
@extends('layouts.app')

@section('content')	
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				<form method="get" action="{{ route('orcamento_formularios') }}">
					<div class="header">
						<div class="row">
							<div class="col-md-4">
								<h4 class="title">Formulários</h4>	
								<br>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-2">
										<select class="form-control" id="exercicio" name="exercicio">
										</select>
									</div>
									<div class="col-md-6" style="margin-right:-4px;">
										<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
											<option value="TODOS" selected>Todos</option>
											<option value="CREDITO_ADICIONAL_SUPLEMENTAR">Crédito Adicional Suplemenetar</option>
											<option value="REMANEJAMENTO_TRANSPOSICAO_TRANSFERENCIA">REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</option>
										</select>
									</div>
									<div class="col-md-2">
										<input name="acao" value="pesquisar" hidden />
										<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
									</div>	
									<div class="col-md-2">
										<button type="button" id="btnNovo" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#criarFormulario" >Novo</button>	
									</div>	
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
				@if($pesquisaFeita == 'ok')
                    <div class="card">
                        <div class="header">
                             <h4 class="title">Striped Table with Hover</h4>
                             <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
										<th>Tipo de Formulário</th>
										<th>Instrumento</th>
										<th>Número</th>
										<th>Exercicio</th>
										<th>Valor</th>
										<th>Data</th>
										<th>Secretaria</th>
										<th>Visualizar</th>

                               		</tr>
								</thead>
                                <tbody>
								@foreach($formularios as $j => $value)
									@foreach($value as $formulario)
								
                                    <tr>
                                       	<td>{{$formulario['tipo_formulario']}}</td>
                                       	<td>{{$formulario['tipo_instrumento']}}</td>
                                       	<td>{{$formulario['numero_instrumento']}}</td>
                                       	<td>{{$formulario['exercicio']}}</td>
                                       	<td><?php echo 'R$ '.number_format($formulario['valor'], 2, ',', '.') ?></td>
										<td><?php echo date("d/m/Y", strtotime($formulario['created_at'])) ?></td>
										<td>{{$formulario['secretaria']}}</td>
										<td align="center"><button type="button" value="{{$formulario['codigo_formulario']}}" onclick="abrirFormularioPDF(this)"><i class="pe-7s-file" style="font-size:24px; text-align:center"></i></button></td>
                                    </tr>
									@endforeach
								@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>  
				@endif	
				<!--<div class="card">
					<div class="content">
						<div style="font-size:16px;  text-align: justify;text-justify: inter-word;">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nesta seção você encontra os formulários para as solicitações de Crédito Adicional Suplementar e REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA. Os formulários deverão ser preenchidos e devidamente assinados pelos respectivos responsáveis bem como encaminhados posteriormente para a unidade encarregada pela gestão do orçamento público municipal,  conforme instituído pelo Manual de Alterações Orçamentárias 2019 – 1º Edição – Decreto nº 3.098/19.<h6>
						</div>
						<br>
						<br> 
                    </div>	
				</div>	-->
					
			</div>
		</div>
	</div>	
</div>

@endsection		
	
<script>

document.addEventListener('DOMContentLoaded', function() 
	{
		//var exercicio = new Date().getFullYear()
		//$("#exercicio").attr("placeholder", exercicio);
		

		exercicio = "<?php echo $exercicio ?>";
		exercicio = parseInt(exercicio);
	
		//document.getElementById('exercicio2').value = exercicio;
		
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


function abrirFormularioPDF(codigo_formulario)
{
	var codigo_formulario = codigo_formulario.value;
	var caminho = "files/formularios_alteracao_orcamentaria/"+codigo_formulario+".pdf";
	var valor = "url('"+caminho+"')";
	valor = "[["+valor+"]]";
	
	alert(valor);
	document.getElementById("pdf").setAttribute('data', valor);
	$('#abrirFormularioPDF').modal('show'); 
}
</script>



<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagemSemSucesso" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:auto; white-space: nowrap;">
            <button type="button" aria-hidden="true" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b><input class="form-control" value="" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
	
	</div>
</div>

<!-- Modal Escolher Tipo de Formulario-->
<div id="criarFormulario" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Criar Formulário</h5>
			</div>
						
				<div class="modal-body">
					
						<div class="row">
						<form method="get" action="{{route('orcamento_formularios')}}" style="align:center">
						<input name="acao" value="criar" hidden />
							<div class="row">
								<div class="col-md-12 text-center">
									<button name="formulario" class="btn btn-white btn-animation-1" style="width:500px" value="credito_adicional_suplementar">Crédito Adicional Suplementar</button>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12 text-center">
									<button name="formulario" class="btn btn-white btn-animation-1" style="width:500px" value="remanejamento_transposicao_transferencia">REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</button>
								</div>
							</div>	
						</form>
						</div>
					</form>		
				</div>
					
			<div class="modal-footer">		
			</div>
		
		</div>
		
	</div>
</div>

<!--abre Formulario em PDF -->
<div class="modal" id="abrirFormularioPDF" trole="dialog">
    <div class="modal-dialog" style="width:1250px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
			<div class="modal-body">
				<object id="pdf" data="{{url('files/formularios_alteracao_orcamentaria/cas_1.pdf')}}" type="application/pdf" scrolling="auto" height="1100" width="100%"> 
					<iframe src="https://docs.google.com/viewer?url=your_url_to_pdf&embedded=true" ></iframe>
				</object>
			</div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>