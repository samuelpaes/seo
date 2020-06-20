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
									<div class="col-md-4">
										<select class="form-control" id="exercicio" name="exercicio">
										</select>
									</div>
									<div class="col-md-4">
										<select class="form-control" id="pesquisa" name="pesquisa" onclick="ativarPesquisa()">
											<option value="" selected></option>					
											@if(auth()->user()->isAdmin == 0)(<option value="SECRETARIA">SECRETARIA</option>@endif
											<option value="TIPO DE FORMULARIO">TIPO DE FORMULÁRIO</option>
											<option value="TIPO DE INSTRUMENTO">TIPO DE INSTRUMENTO</option>
											<option value="DATA">DATA</option>
										</select>
									</div>
									<div class="col-md-2">
										<!--<input name="acao" value="pesquisar" hidden />
										<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">-->
										<button type="button" id="btnPesquisar" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" data-toggle="modal" data-target="#complementarPesquisa" disabled>Pesquisar</button>
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
                        <!--<div class="header">
                             <h4 class="title">Striped Table with Hover</h4>
                             <p class="category">Here is a subtitle for this table</p>
                        </div>-->
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
										<th>Status</th>
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
										<td align="center">
											<button type="button" value="{{$formulario['codigo_formulario']}}" onclick="abrirFormularioPDF(this)"><i class="pe-7s-file" style="font-size:24px; text-align:center"></i></button>
										</td>
										<td align="center">
											@if($formulario['status'] == "Aprovado")
												<img src="{{url('img/status/formulario_aprovado.png ')}}" style="max-width: 30px; height: 20px;">
											@elseif($formulario['status'] == "Reprovado")
												<img src="{{url('img/status/formulario_reprovado.png ')}}" style="max-width: 30px; height: 20px;">
											@else
												<img src="{{url('img/status/formulario_emAnalise.png ')}}" style="max-width: 30px; height: 20px;">
											@endif
										</td>
                                    </tr>
									@endforeach
								@endforeach
                                </tbody>
							</table>
							
    						
                        </div>
					</div>

				@endif	
				<!--  Verifica se há alguma mensagem -->
				@if ( $mensagem != "" )
					<script>
						$(document).ready(function()
						{
							
							$('#modalMensagem').modal({
								show: true,
							})
						});
					</script>
				@endif	
				
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

		var i = 0;
		var j = 0;
		for (i = exercicio+1; i > (exercicio-4); i--) 
		{
			var select = document.getElementById("anoInstrumento");
			var option = document.createElement("option");
			j = j+1;
			option.text = i;
			option.value = i;
			select.add(option, select[j]);
			select.selectedIndex = "1";
		}
	}, false);


function ativarPesquisa()
{
	
	var e = document.getElementById("pesquisa");
	var opcao = e.options[e.selectedIndex].value;
	//
	if(opcao == "SECRETARIA")
	{
		document.getElementById("secretaria").hidden = false;
		document.getElementById("tipoFormulario").hidden = true;
		document.getElementById("tipoInstrumento").hidden = true;
		document.getElementById("data").hidden = true;
		document.getElementById("texto").hidden = true;

		document.getElementById('filtro').value = "secretaria";
		document.getElementById('btnPesquisar').disabled = false;
	}
	else if(opcao == "TIPO DE FORMULARIO")
	{
		document.getElementById("secretaria").hidden = true;
		document.getElementById("tipoFormulario").hidden = false;
		document.getElementById("tipoInstrumento").hidden = true;
		document.getElementById("data").hidden = true;
		document.getElementById("texto").hidden = true;

		document.getElementById('filtro').value = "formulario";
		document.getElementById('btnPesquisar').disabled = false;
		//document.getElementById('btnPesquisar2').disabled = false;
	}
	else if(opcao == "TIPO DE INSTRUMENTO")
	{
		document.getElementById("secretaria").hidden = true;
		document.getElementById("tipoInstrumento").hidden = false;
		document.getElementById("tipoFormulario").hidden = true;
		document.getElementById("data").hidden = true;
		document.getElementById("texto").hidden = false;

		document.getElementById('filtro').value = "instrumento";
		document.getElementById('btnPesquisar').disabled = false;

	}
	else if(opcao == "DATA")
	{
		document.getElementById("secretaria").hidden = true;
		document.getElementById("data").hidden = false;
		document.getElementById("texto").hidden = true;
		document.getElementById("tipoFormulario").hidden = true;
		document.getElementById("tipoInstrumento").hidden = true;

		document.getElementById('date').valueAsDate = new Date();

		document.getElementById('filtro').value = "data";
		document.getElementById('btnPesquisar').disabled = false;
		//document.getElementById('btnPesquisar2').disabled = false;

	}
	else{
		//document.getElementById('btnPesquisar2').disabled = true;
		document.getElementById('btnPesquisar').disabled = true;
		document.getElementById('filtro').value = "";

	}

	if(document.getElementById("numeroInstrumento").value != "")
	{
		//document.getElementById('btnPesquisar2').disabled = false;
	}
	else
	{
		//document.getElementById('btnPesquisar2').disabled = true;
	}
}
	
function definirFiltro()
{
	
	var e = document.getElementById("tipoFormulario");
	var opcaoFormulario = e.options[e.selectedIndex].value;
	alert(opcaoFormulario);
	document.getElementById('filtro').value = opcaoFormulario;
}

function abrirFormularioPDF(codigo_formulario)
{
	
	var codigo_formulario = codigo_formulario.value;
	var object = "<object data=\"{FileName}\" type=\"application/pdf\"  style=\"width: 100%; margin: 0 auto;\" height=\"1000px\">";

	var valor = "http://127.0.0.1/seo/public/files/formularios_alteracao_orcamentaria/"+codigo_formulario+".pdf";
	//alert(codigo_formulario)		;
	var sub = "{{url('files/formularios_alteracao_orcamentaria/arquivo.pdf')}}";
	sub = sub.replace("arquivo", codigo_formulario);
	//alert(sub);				
	object += "Exibição indisponível!";
   // object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
    object += "</object>";
					
    object = object.replace(/{FileName}/g, sub);
					
    $("#body").html(object);
					

	$('#abrirFormularioPDF').modal('show'); 
	//alert(valor);
}

   
</script>



<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:115%; height:auto;">
            <button type="button" aria-hidden="true" style="position:relative; left:5px; top:20px;" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span style="text-align: center;"><b> Atenção! </b></span><textarea class="form-control" id="mensagem" style="height:auto;resize: none;width:100%; border:none; background:none; color:#fff" readonly>{{$mensagem}}</textarea>
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
									<button name="formulario" class="btn btn-white btn-animation-1" style="width:500px" value="credito_adicional_suplementar">CRÉDITO ADICIONAL SUPLEMENTAR</button>
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

<!-- Modal Complementar Pesquisa-->
<div id="complementarPesquisa" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
		<form method="get" action="{{route('orcamento_formularios')}}" style="align:center">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Complementar Pesquisa</h5>
			</div>
						
				<div class="modal-body">
						<div class="row">
							<div class="col-md-12" style="margin-right:-4px;"  id="secretaria"   hidden>
								<select class="form-control" name="secretaria">
									<option selected></option>
									<option value="SECRETARIA DE GOVERNO E GESTÃO">SECRETARIA DE GOVERNO E GESTÃO</option>
									<option value="SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS">SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS</option>
									<option value="SECRETARIA DE SERVIÇOS URBANOS">SECRETARIA DE SERVIÇOS URBANOS</option>
									<option value="SECRETARIA DE EDUCAÇÃO">SECRETARIA DE EDUCAÇÃO</option>
									<option value="SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA">SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA</option>
									<option value="SECRETARIA DE MEIO AMBIENTE">SECRETARIA DE MEIO AMBIENTE</option>
									<option value="SECRETARIA DE PLANEJAMENTO URBANO">SECRETARIA DE PLANEJAMENTO URBANO</option>
									<option value="SECRETARIA DE SEGURANÇA E CIDADANIA">SECRETARIA DE SEGURANÇA E CIDADANIA</option>
									<option value="SECRETARIA DE TURISMO, ESPORTE E CULTURA">SECRETARIA DE TURISMO, ESPORTE E CULTURA</option>
									<option value="SECRETARIA DE SAÚDE">SECRETARIA DE SAÚDE</option>
									<option value="SECRETARIA DE OBRAS E HABITAÇÃO">SECRETARIA DE OBRAS E HABITAÇÃO</option>
									<option value="PROCURADORIA GERAL DO MUNICÍPIO">PROCURADORIA GERAL DO MUNICÍPIO</option>
								</select>
							</div>
							<div class="col-md-12" style="margin-right:-4px;"  id="tipoFormulario"   hidden>
								<select class="form-control" name="tipoFormulario">
									<option value="TODOS" selected>TODOS</option>
									<option value="CRÉDITO ADICIONAL SUPLEMENTAR">CRÉDITO ADICIONAL SUPLEMENTAR</option>
									<option value="REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA">REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</option>
								</select>
							</div>
						
							<div class="col-md-12" style="margin-right:-4px;"  id="tipoInstrumento" onclick="ativarInstrumento()"  hidden>
								<select class="form-control" name="tipoInstrumento">
									<option value="TODOS" selected>TODOS</option>
									<option value="PROCESSO">PROCESSO</option>
									<option value="MEMORANDO">MEMORANDO</option>
								</select>
							</div>
							<div  class="col-md-12" style="margin-right:-4px;"  id="data"  hidden>
								<input id="date" type="date"  name="data" class="form-control"></input>
							</div>
						</div>
						<div class="row">	
						<br>

							<div  class="col-md-12" style="margin-right:-4px; white-space: nowrap;" id="texto" hidden >
								<label style=" padding:0px; margin:0px; display: inline-block; width: auto; font-weight:normal">NÚMERO:</label>
								<input type="number" onclick="ativarPesquisa()" onkeypress="ativarPesquisa()" name="numeroInstrumento" id="numeroInstrumento" class="form-control" style="display: inline-block; width:410px"></input>
								/
								<select class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="anoInstrumento" id="anoInstrumento" style="display: inline-block; width:auto">
								</select>
							</div>
						</div>
						
				</div>
					
			<div class="modal-footer">	
				<input name="filtro" value="" id="filtro">	
				<input name="acao" value="pesquisar" hidden />
				<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" id="btnPesquisar2">
			</div>
		</form>	
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
			<div class="modal-body" id="body" style="align:center; text-align: center;">
				
	
			</div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>