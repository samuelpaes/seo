<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('layouts.app')

	@section('content')	
	<style>
	@media (min-width: 992px) {
	.col-md-center {
		margin-left: auto;
		margin-right: auto;
	}
	}

	.outer {
	position: relative;
	margin: auto;
	width: 15px;
	margin-top: 0px;
	cursor: pointer;

	}

	.inner {
	width: inherit;
	text-align: center;
	}

	.label_remove { 
	font-size: .7em; 
	line-height: 3em;
	text-transform: uppercase;
	color: #000;
	transition: all .3s ease-in;
	opacity: 0;
	cursor: pointer;
	left:-42px;
	top:2px;
	}

	.inner:before, .inner:after {
	position: absolute;
	content: '';
	height: 1px;
	width: inherit;
	background: #000;
	left: 0;
	transition: all .3s ease-in;
	}

	.inner:before {
	top: 50%; 
	transform: rotate(45deg);  
	}

	.inner:after {  
	bottom: 50%;
	transform: rotate(-45deg);  
	}

	.outer:hover label {
	opacity: 1;
	}

	.outer:hover .inner:before,
	.outer:hover .inner:after {
	transform: rotate(0);
	}

	.outer:hover .inner:before {
	top: 0;
	}

	.outer:hover .inner:after {
	bottom: 0;
	}

/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width: auto; 
  height:15px;
  font-weight:normal;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  border-radius: 100%;
  position: absolute;
  top: 10;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #49cfed;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #49cfed;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 5px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


</style>
	
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<form method="get" action="{{ route('orcamento_contratos') }}">
							<div class="header">
								<div class="row">
									<div class="col-md-4">
										<h4 class="title">Contratos</h4>	
										<br>
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-5" id="vazio">
											</div>
											<div class="col-md-3">
												<select class="form-control" id="pesquisa" name="pesquisa" onclick="ativarPesquisa()">
													<option value="" selected></option>					
													<option value="CONTRATO/ANO">CONTRATO</option>
													<option value="PROCESSO/ANO">PROCESSO</option>
													<option value="TODOS">TODOS</option>
													@if(auth()->user()->isAdmin == 0)<option value="SECRETARIA">SECRETARIA</option>@endif
												</select>
											</div>

											
                                            <div class="col-md-2" id="contratoNumero" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value="" name="numero_contrato" id="contratoNumero2" onclick="ativarPesquisa()" onkeypress="ativarPesquisa()" onkeydown="ativarPesquisa()" onkeyup="ativarPesquisa()">
												</div>
											</div>
											<div class="col-md-2" id="processoNumero" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value="" name="numero_processo" id="processoNumero2" onclick="ativarPesquisa()" onkeypress="ativarPesquisa()" onkeydown="ativarPesquisa()" onkeyup="ativarPesquisa()">
												</div>
											</div>
											<div class="col-md-1" id="/" hidden>
												<input type="text" class="form-control" value="/" style="background:none; border:none; text-align:center" readonly></input>
											</div>
											<div class="col-md-2" id="processoAno" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value="" name="ano_processo" id="processoAno2" onclick="ativarPesquisa()" onkeypress="ativarPesquisa()" onkeydown="ativarPesquisa()" onkeyup="ativarPesquisa()">
												</div>
											</div>
                                            <div class="col-md-2" id="contratoAno" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value=""  name="ano_contrato" id="contratoAno2" onclick="ativarPesquisa()" onkeypress="ativarPesquisa()" onkeydown="ativarPesquisa()" onkeyup="ativarPesquisa()">
												</div>
											</div>

                                            <div class="col-md-5" id="secretaria2" hidden>
												<select class="form-control" id="secretaria3" name="secretaria" onclick="ativarPesquisa()"  onkeypress="ativarPesquisa()" onkeydown="ativarPesquisa()" onkeyup="ativarPesquisa()">
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
											<div class="col-md-2">
												<input name="filtro" value="" id="filtro">	
												<input name="acao" value="pesquisar" hidden />
												<button type="submit" id="btnPesquisar" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" data-toggle="modal" data-target="#complementarPesquisa" disabled>Pesquisar</button>
											</div>	
											<div class="col-md-2">
												<a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#cadastrarContrato">
													Novo
												</a>
											</div>
										</div>	
									</div>
								</div>
							</form>
							</div>
						</div>
						@if($pesquisaFeita == "ok")
						<div class="card">
							<div class="content">
							</div>
							<div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
										@if(auth()->user()->isAdmin == 0)<th>Secretaria</th>@endif
										<th>Numero do Processo</th>
										<th>Ano do Processo</th>
										<th>Numero do Contrato</th>
										<th>Ano Contrato</th>
										<th>Valor</th>
										<th>Objeto</th>
										<th>Observações</th>
                               		</tr>
								</thead>
                                <tbody>
								@foreach($contratos as $j => $value)
									@foreach($value as $contrato)
								
                                    <tr>
										@if(auth()->user()->isAdmin == 0)<td>{{$contrato['secretaria']}}</td>@endif
                                       	<td>{{$contrato['numero_processo']}}</td>
                                       	<td>{{$contrato['ano_processo']}}</td>
                                       	<td>{{$contrato['numero_contrato']}}</td>
                                       	<td>{{$contrato['ano_contrato']}}</td>
										<td><?php echo 'R$ '.number_format($contrato['valor'], 2, ',', '.');?></td>
										<td>{{$contrato['objeto']}}</td>
										<td>{{$contrato['observacao']}}</td>
										<!--<td align="center">
											<button type="button" value="" onclick="abrirLegislacaoPDF(this)"><i class="pe-7s-file" style="font-size:24px; text-align:center"></i></button>
										</td>-->
										<!--<td></td>-->
										
                                    </tr>
									@endforeach
								@endforeach
                                </tbody>
							</table>
							
    						
                        </div>
						@endif	
						</div>			
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

function formatarMoeda(x) {
	$(x).keyup(function(){
			var v = $(this).val();
			v=v.replace(/\D/g,'');
			v=v.replace(/(\d{1,2})$/, ',$1');  
			v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
			v = v != ''?'R$ '+v:'';
			$(this).val(v);
		});

		
		
		

			document.getElementById('valor').value = x.value;
	
			
}

function ativarPesquisa()
{
    
	var e = document.getElementById("pesquisa");
	var opcao = e.options[e.selectedIndex].value;

	if(opcao == "PROCESSO/ANO")
	{
	
		document.getElementById("processoNumero").hidden = false;
        document.getElementById("processoAno").hidden = false;
		document.getElementById("/").hidden = false;
		document.getElementById("contratoNumero").hidden = true;
        document.getElementById("contratoAno").hidden = true;
		document.getElementById("secretaria2").hidden = true;

		document.getElementById('filtro').value = "contrato";
		document.getElementById("vazio").hidden = true;
		
			
		if(document.getElementById("processoNumero2").value != "" && document.getElementById("processoAno2").value != "")
		{
			document.getElementById('btnPesquisar').disabled = false;
		}
		else
		{
			document.getElementById('btnPesquisar').disabled = true;
		}
	
	}
	else if(opcao == "CONTRATO/ANO")
	{
        document.getElementById("processoNumero").hidden = true;
        document.getElementById("processoAno").hidden = true;
		document.getElementById("/").hidden = false;
		document.getElementById("contratoNumero").hidden = false;
        document.getElementById("contratoAno").hidden = false;
		document.getElementById("secretaria2").hidden = true;

		document.getElementById('filtro').value = "contrato";
		document.getElementById("vazio").hidden = true;

		if(document.getElementById("contratoNumero2").value != "" && document.getElementById("contratoAno2").value != "")
		{
			document.getElementById('btnPesquisar').disabled = false;
		}
		else
		{
			document.getElementById('btnPesquisar').disabled = true;
		}

	}
	else if(opcao == "SECRETARIA")
	{
        document.getElementById("processoNumero").hidden = true;
        document.getElementById("processoAno").hidden = true;
		document.getElementById("/").hidden = true;
		document.getElementById("contratoNumero").hidden = true;
        document.getElementById("contratoAno").hidden = true;
		document.getElementById("secretaria2").hidden = false;

		document.getElementById('filtro').value = "contrato";
		document.getElementById("vazio").hidden = true;

		if(document.getElementById("secretaria3").value != "")
		{
			document.getElementById('btnPesquisar').disabled = false;
		}
		else
		{
			document.getElementById('btnPesquisar').disabled = true;
		}


	}
	else if(opcao == "TODOS")
	{
		document.getElementById("processoNumero").hidden = true;
        document.getElementById("processoAno").hidden = true;
		document.getElementById("/").hidden = true;
		document.getElementById("contratoNumero").hidden = true;
        document.getElementById("contratoAno").hidden = true;
		document.getElementById("secretaria2").hidden = true;

		document.getElementById('btnPesquisar').disabled = false;
		document.getElementById('filtro').value = "todos";
		document.getElementById("vazio").hidden = false;
	}
	else{
        document.getElementById("processoNumero").hidden = true;
        document.getElementById("processoAno").hidden = true;
		document.getElementById("/").hidden = true;
		document.getElementById("contratoNumero").hidden = true;
        document.getElementById("contratoAno").hidden = true;
		document.getElementById("secretaria2").hidden = true;

		document.getElementById('btnPesquisar').disabled = true;
		document.getElementById('filtro').value = "";
		document.getElementById("vazio").hidden = false;

	}

	
}

function abrirLegislacaoPDF(link)
{
	alert(link.value);
	var sub = link.value;
	var object = "<object data=\"{FileName}\" type=\"application/pdf\"  style=\"width: 100%; margin: 0 auto;\" height=\"1000px\">";

	object += "Exibição indisponível!";
  
    object += "</object>";
					
    object = object.replace(/{FileName}/g, sub);
					
    $("#body").html(object);
	$('#abrirLegislacaoPDF').modal('show'); 
	//alert(valor);
}

function habilitarBtnCadastrar()
{
    if(document.getElementById('secretaria').value != ""  && document.getElementById('numero_processo').value != "" && document.getElementById('ano_processo').value != "" && document.getElementById('ano_contrato').value != "" && document.getElementById('ano_contrato').value != "" && document.getElementById('valor').value != "" && document.getElementById('objeto').value != "" && document.getElementById('observacao').value != "")
    {
        document.getElementById('btnCadastrar').disabled = false;
    }
    else{
        document.getElementById('btnCadastrar').disabled = true;
    }


}

document.addEventListener('DOMContentLoaded', function() 
    {
        var exercicio = new Date().getFullYear()
        
        
        var i;
        var j = 0;
        for (i = exercicio+1; i > (exercicio-10); i--) 
        {
            var select = document.getElementById("ano_processo");
            var option = document.createElement("option");
            j = j+1;
            option.text = i;
            option.value = i;
            select.add(option, select[j]);
            select.selectedIndex = "1";
        }

        var i;
        var j = 0;
        for (i = exercicio+1; i > (exercicio-10); i--) 
        {
            var select = document.getElementById("ano_contrato");
            var option = document.createElement("option");
            j = j+1;
            option.text = i;
            option.value = i;
            select.add(option, select[j]);
            select.selectedIndex = "1";
        }
    }, false);
</script>

<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
	@if($sucesso == "")
		<div class="alert alert-warning" style="border-radius: 5px; width:115%; white-space: nowrap;">
            <button type="button" aria-hidden="true" style="position:relative; left:5px; top:20px;" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b><input class="form-control" value="{{$mensagem}}" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
	@elseif($sucesso = "ok")
		<div class="alert alert-success" style="border-radius: 5px; width:115%; white-space: nowrap;">
            <button type="button" aria-hidden="true" style="position:relative; left:5px; top:20px;" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span><input class="form-control" value="{{$mensagem}}" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
	@endif
	</div>
</div>


<!-- Modal Cadastrar Novo Contrato-->
<div id="cadastrarContrato" class="modal fade" role="dialog" onmousemove="habilitarBtnCadastrar()">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Incluir Contrato</h5>
			</div>
			<form method="post" action="{{ route('orcamento_contratos') }}">	
			@csrf
			@method('POST')			
				<div class="modal-body">	
						<div class="content">
                            <div class="row">
                                <div class="col-md-12" >
                                    <label>Secretaria</label>
									<select class="form-control" id="secretaria" name="secretaria">
                                        @if(auth()->user()->isAdmin == 0)
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
                                        @else
                                        <option <?php if (Auth::user()->secretaria <> '') echo ' selected="selected"'; ?>>{{Auth::user()->secretaria}}</option>
                                        @endif
									</select>
								</div>
                            </div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Processo</label>
										<input type="number" min="0" class="form-control" value=""  id="numero_processo" name="numero_processo" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()">
									</div>
								</div>
								<div class="col-md-2">
									<label></label>
									<input type="text" class="form-control" value="/" style="background:none; border:none; text-align:center" readonly></input>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>Ano</label>
                                        <select class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="ano_processo" id="ano_processo" style="display: inline-block; width:100%" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()"></select>
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-md-5">
									<div class="form-group">
										<label>Contrato</label>
										<input type="number" min="0" class="form-control" value="" id="numero_contrato" name="numero_contrato" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()">
									</div>
								</div>
								<div class="col-md-2">
									<label></label>
									<input type="text" class="form-control" value="/" style="background:none; border:none; text-align:center" readonly></input>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>Ano</label>
                                        <select class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="ano_contrato" id="ano_contrato" style="display: inline-block; width:100%" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()"></select>
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-md-3">
									<div class="form-group">
										<label>Valor</label>
										<input type="text" class="form-control" value="" id="valor" name="valor" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()" onkeydown="formatarMoeda(this)">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label>Objeto</label>
										<input class="form-control" value="" id="objeto" name="objeto" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()">
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
									<div class="form-group">
										<label>Observação</label>
										<input class="form-control" value=""  id="observacao" name="observacao" onkeypress="habilitarBtnCadastrar()" onclick="habilitarBtnCadastrar()">
									</div>
								</div>
                            </div>
						</div>		
				    </div>
					
			<div class="modal-footer">		
			<input name="acao" class="form control" value="cadastrar"></input>
			<input value="Cadastrar" id="btnCadastrar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" disabled>
			</div>
		</form>	
		</div>
		
	</div>
</div>


<!--abre Legislação em PDF -->
<div class="modal" id="abrirLegislacaoPDF" trole="dialog">
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



