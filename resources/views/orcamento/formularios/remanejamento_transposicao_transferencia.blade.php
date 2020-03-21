<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/formularios_orcamento/remanejamento_transposicao_transferencia.js') }}"type="text/javascript"></script>
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
  border-radius: 3px;
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
					<div class="header">
						<div class="row">
							<div class="col-md-12">
								<h4 style=" text-align:center"><b>REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</b></h4>
								<div style="text-align:center">{{ Auth::user()->secretaria }}</div>
								<br>
							</div>
						</div>
					</div>
				</div>
				<div class="card" id="formulario_credito_adicional_suplementar" onmouseover="atualizarFormulario()" onwheel="atualizarFormulario()">
					<div class="content">
						<div class="row flex-nowrap">	
							<div class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
								<span>&nbsp</span>
								<span>&nbsp</span>
								<label style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">DATA DA SOLICITAÇÃO:</label>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<input type="date" name="data" value="{{$data}}" class="form-control" id="data" style="display: inline-block; width:auto"></input>
							</div>		
							<div align="center" class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
								<span>&nbsp</span>
								<span>&nbsp</span>
								<label align="center" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">INSTRUMENTO ADMINISTRATIVO:</label>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<select align="center" class="form-control" name="instrumento" id="instrumento" style="display: inline-block; width:auto">
									<option selected></option>
									<option value="PROCESSO" <?php if ($tipoInstrumento == 'PROCESSO') echo ' selected="selected"'; ?> >PROCESSO</option>
									<option value="MEMORANDO"<?php if ($tipoInstrumento == 'MEMORANDO') echo ' selected="selected"'; ?> >MEMORANDO</option>					
								</select>
							</div>
							
							<div class="col-md-4" align="right" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
								<label align="right" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block; width: auto; font-weight:normal">NÚMERO:</label>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<span>&nbsp</span>
								<input align="right" value="{{$numeroInstrumento[0]}}" type="number" id="numeroInstrumento" class="form-control" style="display: inline-block; width:150px;" ></input>
								/
								<select class="form-control" onkeyup="" onclick="" onmouseout=""  onmouseover="" name="anoInstrumento" id="anoInstrumento" style="display: inline-block; width:auto">
									
										
										
										<!--<option value="2019" <?php if ($numeroInstrumento[1] == '2019') echo ' selected="selected"'; ?> >2019</option>
										<option value="2018" <?php if ($numeroInstrumento[1] == '2018') echo ' selected="selected"'; ?> >2018</option>		
										<option value="2017" <?php if ($numeroInstrumento[1] == '2017') echo ' selected="selected"'; ?> >2017</option>-->
															
									</select>
								<span>&nbsp</span>
								<span>&nbsp</span>
							</div>
						
						</div>
						<br>
						<div class="row flex-nowrap">
							<div class="col-md-1">
							</div>
							<div class="col-md-10">
								<div class="col-lg-4" style="flex-wrap:nowrap; white-space: nowrap; display: flex; flex-wrap: wrap;">
									<label class="container">Remanejamento
										<input type="checkbox" onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Remanejamento" name="remanejamento" id="chk_remanejamento" type="checkbox" style="display: inline-block;width:auto"
										<?php if($remanejamento === true) echo 'checked="checked"';?> />
										<span class="checkmark"></span>
									</label>
								</div>
								
								<div class="col-lg-4"  style="flex-wrap:nowrap; white-space: nowrap; display: flex; flex-wrap: wrap;">
									<label class="container">Transposição
										<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Transposição" name="transposicao" id="chk_transposicao"  type="checkbox" style="display: inline-block;width:auto" 
										<?php if($transposicao === true) echo 'checked="checked"';?> />
										<span class="checkmark"></span>
									</label>
								</div>
							
								<div class="col-lg-4" style="flex-wrap:nowrap; white-space: nowrap; display: flex; flex-wrap: wrap; align-content: right;">
									<label class="container">Transferência
										<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="transferencia" name="transferencia" id="chk_transferencia"  type="checkbox" style="display: inline-block;width:auto" 
										<?php if($transferencia === true) echo 'checked="checked"';?> />
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="col-md-1">
							</div>
						</div>
						
						<br>
						
						<form method="get" action="{{route('orcamento_show')}}">
							
							<input name="data" class="form-control" id="sup_data2" type="hidden"></input>
							<input name="tipoInstrumento" class="form-control" id="sup_instrumento2" type="hidden"></input>
							<input name="numeroInstrumento"  class="form-control" id="sup_numeroInstrumento2" type="hidden"></input>
							<input name="tipo_remanejamento" class="form-control" id="sup_tipo_remanejamento" type="hidden"></input>
							<input name="tipo_transposicao" class="form-control" id="sup_tipo_transposicao" type="hidden"></input>
							<input name="tipo_transferencia" class="form-control" id="sup_tipo_transferencia" type="hidden"></input>
							<input name="formulario" class="form-control" value="remanejamento_transposicao_transferencia" type="hidden"></input>
							<input name="unidade_orcamentaria" value="{{ Auth::user()->secretaria }}" id="unidade_orcamentaria" type="hidden" ></input>

							<div class="card" id="cardSuplementacao" style="box-shadow: 2px 2px 5px #888888;">
								<div>
									<!--Transposição-->
									<table id="tabela_transposicao3">
										<tr style="height:auto;">
										</tr>
									</table>
									<!--Transferência-->
									<table id="tabela_transferencia3">
										<tr style="height:auto;">
										</tr>
									</table>
								</div>
								<div class="header">
									<h5 style="text-align:center" ><b>SUPLEMENTAÇÃO</b></h5>
								</div>
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input class="form-control" type="number" onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)" min="0" name="sup_codigo_dotacao[]" id="sup_codigo_dotacao" style="display: inline-block; width:80px;" ></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="sup_valor[]" style="display: inline-block; width:80px;"></input>
												<button value="suplementar" id="suplementar" align="center" name="acao" type="submit" class="btn btn-info btn-fill" disabled>+</button>
											</span>
										</div>
											
										<div class="content table-responsive table-full-width" style="font-size:12px; align:center">
											<table class="table table-hover table-striped" id="tabela_suplementar" name="tabela_suplementar" style="font-size:98%; table-layout: fixed;border-collapse: collapse;width: 100%;margin-left: auto;margin-right: auto;text-align: center;padding-top: 16px;padding-bottom: 16px;">
												<thead>
												<tr style="height:100px">
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_suplementacao))
													<?php $i = 0; ?>
													@foreach($dotacoes_suplementacao as $dotacao)
														
													<tr style="height:auto;">
														<td style="align:center;"><input name="sup_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="align:center;"><input name="sup_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="align:center;"><input name="sup_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="sup_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="align:center"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="sup_vinculo[{{$i}}]" onclick="sup_atualizar_vinculo(this, {{$i}})"  onmouseout="sup_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="sup_atualizar_vinculo(this, {{$i}})" id="vinculo_sup-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px; ">
																<option selected></option>	
																@foreach($dotacoes_suplementacao_vinculos as $j => $value)
																	@foreach($value as $vinculo)
																		@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																			<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																		@endif
																	@endforeach
																@endforeach
															</select>
														</td>
														<td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='sup_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="align:center;"><input name="sup_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="sup_atualizar_valor(this, {{$i}})" onkeydown="sup_atualizar_valor(this, {{$i}})" onkeyup="sup_atualizar_valor(this, {{$i}})" onclick="sup_atualizar_valor(this, {{$i}})" onmouseout="sup_atualizar_valor(this, {{$i}})"  onmouseover="sup_atualizar_valor(this, {{$i}})" id="valor_sup-{{$i}}" class="form-control"></input></td>
														<td style="align:center;"><textarea name='sup_justificativa[{{$i}}]' onkeyup="sup_atualizar_justificativa(this, {{$i}})"  onclick="sup_atualizar_justificativa(this, {{$i}})" onmouseout="sup_atualizar_justificativa(this, {{$i}})" onmouseover="sup_atualizar_justificativa(this, {{$i}})" class="form-control" id="justificativa_sup-{{$i}}" style="width:100%; height:40px; text-transform: uppercase;">{{$dotacao['justificativa']}}</textarea></td>
														<td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_suplementar" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input></td>
													</tr>
													<?php 
														$total_suplementar = $dotacao['dotacao'] + $total_suplementar;
														$i++;
													?>
													
													@endforeach
													<?php
														$total_suplementar = 'R$ '.number_format($total_suplementar, 2, ',', '.')
													?>
													@endif
													
													<tr style="display : table-row;" height="10">
														<td colspan="6"></td>
														<td colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<div class="footer">
											<hr>
                                    		<div class="legend">
												<div class="row">
													<div class="col-md-3">
                                        				<p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
													</div>
													<div class="col-md-6">
														<b><input id="valor_sup_total" class="form-control" style='font-size:12px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
													</div>
													<div class="col-md-3">
													</div>
												</div>
                                   			</div>
										</div>	
									</div>			
								</div>
							</div>
								
							<div class="card" id="cardRemanejamento" style="box-shadow: 2px 2px 5px #888888; display:none">
								
								<div class="header">
									<h5 style="text-align:center" ><b>REMANEJAMENTO</b></h5>
								</div>
								
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input class="form-control" type="number" onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)" min="0" name="rmj_codigo_dotacao[]" id="rmj_codigo_dotacao" style="display: inline-block; width:80px;"></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="rmj_valor[]" style="display: inline-block; width:80px;"></input>
												<button value="remanejar" id="remanejar" align="left" name="acao" type="submit" class="btn btn-info btn-fill" disabled>+</button>
											</span>
										</div>
											
										<div class="content table-responsive table-full-width" style="font-size:12px; align:center">
											<table class="table table-hover table-striped" id="tabela_remanejar" name="tabela_remanejar" style="font-size:98%; width:100%; display:block; overflow:auto;">
												<thead>
													<tr style="height:100px">
													<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_remanejamento))
													<?php $i = 0; ?>
													@foreach($dotacoes_remanejamento as $dotacao)
														
													<tr style="height:auto;">
														<td style="align:center;"><input name="rmj_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="align:center;"><input name="rmj_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="align:center;"><input name="rmj_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="rmj_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="align:center;"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="rmj_vinculo[{{$i}}]" onclick="rmj_atualizar_vinculo(this, {{$i}})"  onmouseout="rmj_atualizar_vinculo(this, {{$i}})" onmouseover="rmj_atualizar_vinculo(this, {{$i}})" onkeyup="rmj_atualizar_vinculo(this, {{$i}})" id="vinculo_rmj-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
																<option selected></option>	
																@foreach($dotacoes_remanejamento_vinculos as $j => $value)
																	@foreach($value as $vinculo)
																		@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																			<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																		@endif
																	@endforeach
																@endforeach
															</select>
														</td>
														<td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='rmj_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="align:center;"><input name="rmj_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="rmj_atualizar_valor(this, {{$i}})" onkeydown="rmj_atualizar_valor(this, {{$i}})" onkeyup="rmj_atualizar_valor(this, {{$i}})" onclick="rmj_atualizar_valor(this, {{$i}})" onmouseout="rmj_atualizar_valor(this, {{$i}})"  onmouseover="rmj_atualizar_valor(this, {{$i}})" id="valor_rmj-{{$i}}" class="form-control"></input></td>
														<td style="align:center;"><textarea name='rmj_recurso[{{$i}}]' onkeypress="rmj_atualizar_recurso(this, {{$i}})" onkeydown="rmj_atualizar_recurso(this, {{$i}})" onkeyup="rmj_atualizar_recurso(this, {{$i}})"  onclick="rmj_atualizar_recurso(this, {{$i}})" onmouseout="rmj_atualizar_recurso(this, {{$i}})" onmouseover="rmj_atualizar_recurso(this, {{$i}})" id="recurso_rmj-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
														<td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_remanejar" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='rmj_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
													</tr>
													<?php 
														//$total_remanejar = $dotacao['valor'] + $total_remanejar;
														$i++;
													?>
													
													@endforeach
													<?php
														//$total_remanejar = 'R$ '.number_format($total_remanejar, 2, ',', '.')
													?>
													@endif
													
													<tr style="display : table-row;" height="10">
														<td colspan="6"></td>
														<td colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<div class="footer">
											<hr>
                                    		<div class="legend">
												<div class="row">
													<div class="col-md-3">
                                        				<p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
													</div>
													<div class="col-md-6">
														<b><input id="valor_rmj_total" class="form-control" style='font-size:12px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
													</div>
													<div class="col-md-3">
													</div>
												</div>
                                   			</div>
										</div>	
									</div>
								</div>			
							</div>
							
							<div class="card" id="cardTransposicao" style="box-shadow: 2px 2px 5px #888888; display:none">
								
								<div class="header">
									<h5 style="text-align:center" ><b>TRANSPOSIÇÃO</b></h5>
								</div>
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input class="form-control" type="number" onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)" min="0" name="tnp_codigo_dotacao[]" id="tnp_codigo_dotacao" style="display: inline-block; width:80px;"></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="tnp_valor[]" style="display: inline-block; width:80px;"></input>
												<button  value="transpor" id="transpor" align="left" name="acao" type="submit" class="btn btn-info btn-fill" disabled>+</button>
											</span>
										</div>
																				
										<div class="content table-responsive table-full-width" style="font-size:12px; align:center">
											<table class="table table-hover table-striped" id="tabela_transpor" name="tabela_transpor" style="font-size:98%; table-layout: fixed;border-collapse: collapse;width: 100%;margin-left: auto;margin-right: auto;text-align: center;padding-top: 16px;padding-bottom: 16px;">
												<thead>
													<tr style="height:100px">
														<			<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_transposicao))
													<?php $i = 0; ?>
													@foreach($dotacoes_transposicao as $dotacao)
														
													<tr style="height:auto;">
														<td style="align:center;"><input name="tnp_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="align:center;"><input name="tnp_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="align:center;"><input name="tnp_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="tnp_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="align:center;"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="tnp_vinculo[{{$i}}]" onclick="tnp_atualizar_vinculo(this, {{$i}})"  onmouseout="tnp_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="tnp_atualizar_vinculo(this, {{$i}})" id="vinculo_tnp-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
																<option selected></option>	
																@foreach($dotacoes_transposicao_vinculos as $j => $value)
																	@foreach($value as $vinculo)
																		@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																			<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																		@endif
																	@endforeach
																@endforeach
															</select>
														</td>
														<td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='tnp_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="align:center;"><input name="tnp_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="tnp_atualizar_valor(this, {{$i}})" onkeydown="tnp_atualizar_valor(this, {{$i}})" onkeyup="tnp_atualizar_valor(this, {{$i}})" onclick="tnp_atualizar_valor(this, {{$i}})" onmouseout="tnp_atualizar_valor(this, {{$i}})"  onmouseover="tnp_atualizar_valor(this, {{$i}})" id="valor_tnp-{{$i}}" class="form-control"></input></td>
														<td style="align:center;"><textarea name='tnp_recurso[{{$i}}]' onkeypress="tnp_atualizar_recurso(this, {{$i}})" onkeydown="tnp_atualizar_recurso(this, {{$i}})" onkeyup="tnp_atualizar_recurso(this, {{$i}})"  onclick="tnp_atualizar_recurso(this, {{$i}})" onmouseout="tnp_atualizar_recurso(this, {{$i}})" onmouseover="tnp_atualizar_recurso(this, {{$i}})" id="recurso_tnp-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
														<td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_transpor" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='tnp_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
													</tr>
													<?php 
														//$total_anular = $dotacao['dotacao'] + $total_anular;
														$i++;
													?>
													
													@endforeach
													<?php
														//$total_anular = 'R$ '.number_format($total_anular, 2, ',', '.')
													?>
													@endif
													
													<tr style="display : table-row;" height="10">
														<td colspan="6"></td>
														<td colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<div class="footer">
											<hr>
                                    		<div class="legend">
												<div class="row">
													<div class="col-md-3">
                                        				<p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
													</div>
													<div class="col-md-6">
														<b><input id="valor_tnp_total" class="form-control" style='font-size:12px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
													</div>
													<div class="col-md-3">
													</div>
												</div>
                                   			</div>
										</div>	
									</div>
								</div>
							</div>
							
							<div class="card" id="cardTransferencia" style="box-shadow: 2px 2px 5px #888888; display:none">
								
								<div class="header">
									<h5 style="text-align:center" ><b>TRANSFERÊNCIA</b></h5>
								</div>
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-12" align="center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input  class="form-control" type="number" onclick="ativarBotao(id)" onkeydown="ativarBotao(id)" onkeyup="ativarBotao(id)" onkeypress="ativarBotao(id)" min="0" name="tnf_codigo_dotacao[]" id="tnf_codigo_dotacao" style="display: inline-block; width:80px;"></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="tnf_valor[]" style="display: inline-block; width:80px;"></input>
												<button value="transferir" id="transferir" align="left" name="acao" type="submit" class="btn btn-info btn-fill" disabled>+</button>
											</span>
										</div>
																				
										<div class="content table-responsive table-full-width" style="font-size:12px; align:center">
											<table class="table table-hover table-striped" id="tabela_transferir" name="tabela_transferir" style="font-size:98%; width:100%; display:block; overflow:auto;">
												<thead>
													<tr style="height:100px">
													<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_transferencia))
													<?php $i = 0; ?>
													@foreach($dotacoes_transferencia as $dotacao)
														
													<tr style="height:auto;">
														<td style="align:center;"><input name="tnf_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="align:center;"><input name="tnf_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="align:center;"><input name="tnf_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="tnf_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="align:center;"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="tnf_vinculo[{{$i}}]" onclick="tnf_atualizar_vinculo(this, {{$i}})"  onmouseout="tnf_atualizar_vinculo(this, {{$i}})" onmouseover="tnf_atualizar_vinculo(this, {{$i}})" onkeyup="tnf_atualizar_vinculo(this, {{$i}})" id="vinculo_tnf-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
																<option selected></option>	
																@foreach($dotacoes_transferencia_vinculos as $j => $value)
																	@foreach($value as $vinculo)
																		@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																			<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																		@endif
																	@endforeach
																@endforeach
															</select>
														</td>
														<td style="align:center;"><input value="{{$dotacao['codigo_dotacao']}}" name='tnf_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="align:center;"><input name="tnf_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="tnf_atualizar_valor(this, {{$i}})" onkeydown="tnf_atualizar_valor(this, {{$i}})"  id="valor_tnf-{{$i}}" class="form-control"></input></td>
														<td style="align:center;"><textarea name='tnf_recurso[{{$i}}]' onkeypress="tnf_atualizar_recurso(this, {{$i}})" onkeydown="tnf_atualizar_recurso(this, {{$i}})" onkeyup="tnf_atualizar_recurso(this, {{$i}})"  onclick="tnf_atualizar_recurso(this, {{$i}})" onmouseout="tnf_atualizar_recurso(this, {{$i}})" onmouseover="tnf_atualizar_recurso(this, {{$i}})" id="recurso_tnf-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
														<td style="align:center;"><button type="button" style="width:100%; color:#000" id="rem_transferir" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='tnf_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
													</tr>
													<?php 
														//$total_anular = $dotacao['dotacao'] + $total_anular;
														$i++;
													?>
													
													@endforeach
													@endif
													
													<tr style="display : table-row;" height="10">
														<td style="width:50px;" colspan="6"></td>
														<td style="width:100px;" colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<div class="footer">
											<hr>
                                    		<div class="legend">
												<div class="row">
													<div class="col-md-3">
                                        				<p style="margin:10px; font-size:12px; flex-wrap:nowrap"><b>TOTAL:</b></p> 
													</div>
													<div class="col-md-6">
														<b><input id="valor_tnf_total" class="form-control" style='font-size:12px; padding:0px; margin:0px; display:hidden; border:none; background:none; color:#000;'></input></b>
													</div>
													<div class="col-md-3">
													</div>
												</div>
                                   			</div>
										</div>	
									</div>
								</div>
							</div>
						
						@if($mensagem <> '')
						</form>
						<div class="row">
						
						<div class="col-md-4">
						<b>A Anular:</b>
						<input class="form-control" value="R$ 0,00" id="total_suplementar" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
						</div>
						<div class="col-md-4">
						<b>A Suplementar:</b>
						<input class="form-control" value="R$ 0,00"  id="total_anular" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
						</div>
						
						
						<div class="col-md-4">
							<form method="get" action="{{route('orcamento_criar_pdf')}}" target="_blank">
								@csrf
								@method('POST')	
								<input class="form-control" name="total" id="total_suplementar2" style="display: inline-block; width:auto; border:none; background:none; color:#000;" readonly type="hidden"></input>
								<!--Suplementação-->
								<?php $i=0; ?>
									@foreach($dotacoes_suplementacao as $dotacao)
										<tr style="height:auto;">
											<td style="width:100px"><input name="sup_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
											<td style="width:150px"><input name="sup_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
											<td style="width:110px"><input name="sup_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
											<td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" name='sup_codigo_dotacao[]' type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="sup_vinculo[{{$i}}]" id="sup_vinculo-[{{$i}}]" type="hidden"></input></td>
											<td style="width:200px"><input name="sup_justificativa[{{$i}}]" id='sup_justificativa-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td style="width:200px"><input name="sup_valor[{{$i}}]" id='sup_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
										</tr>
										<?php $i++; ?>
									@endforeach
									
								<!--Remanejamento-->
									<?php $i=0; ?>
									@foreach($dotacoes_remanejamento as $dotacao)
										<tr style="height:auto;">
											<td style="width:100px"><input class="form-control" name="rmj_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
											<td style="width:150px"><input class="form-control" name="rmj_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="rmj_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
											<td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='rmj_codigo_dotacao[]' type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="rmj_vinculo[{{$i}}]" id="rmj_vinculo-[{{$i}}]" type="hidden"></input></td>
											<td style="width:200"><input name="rmj_recurso[{{$i}}]" id='rmj_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td style="width:200"><input name="rmj_valor[{{$i}}]" id='rmj_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td hidden><input class="form-control" name='rmj_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
										</tr>
										<?php $i++; ?>
									@endforeach

									<!--Transposição-->
									<?php $i=0; ?>
									@foreach($dotacoes_remanejamento as $dotacao)
										<tr style="height:auto;">
											<td style="width:100px"><input class="form-control" name="tnp_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
											<td style="width:150px"><input class="form-control" name="tnp_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="tnp_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"  type="hidden"></input></td>
											<td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='tnp_codigo_dotacao[]' type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="tnp_vinculo[{{$i}}]" id="tnp_vinculo-[{{$i}}]" type="hidden"></input></td>
											<td style="width:200"><input name="tnp_recurso[{{$i}}]" id='tnp_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td style="width:200"><input name="tnp_valor[{{$i}}]" id='tnp_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td hidden><input class="form-control" name='tnp_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
										</tr>
										<?php $i++; ?>
									@endforeach

									<!--Transferência-->
									<?php $i=0; ?>
									@foreach($dotacoes_remanejamento as $dotacao)
										<tr style="height:auto;">
											<td style="width:100px"><input class="form-control" name="tnf_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
											<td style="width:150px"><input class="form-control" name="tnf_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="tnf_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"  type="hidden"></input></td>
											<td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='tnf_codigo_dotacao[]' type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="tnf_vinculo[{{$i}}]" id="tnf_vinculo-[{{$i}}]" type="hidden"></input></td>
											<td style="width:200"><input name="tnf_recurso[{{$i}}]" id='tnf_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td style="width:200"><input name="tnf_valor[{{$i}}]" id='tnf_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td hidden><input class="form-control" name='tnf_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
										</tr>
										<?php $i++; ?>
									@endforeach
								
								<div >
								

								<input name="secretaria" value="{{ Auth::user()->secretaria }}" class="form-control" id="secretaria" type="hidden"></input>						
								<input name="tipo_alteracao" type="hidden" value="REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA"></input>
								<input name="instrumento" class="form-control" id="instrumento2" type="hidden"></input>
								<input name="numeroInstrumento" class="form-control" id="numeroInstrumento2" type="hidden"></input>
								<input name="data" class="form-control" id="data2" type="hidden"></input>
								<input name="tipo_suplementacao1" class="form-control" id="tipo_suplementacao1" type="hidden"></input>
								<input name="tipo_suplementacao2" class="form-control" id="tipo_suplementacao2" type="hidden"></input>
								<input name="tipo_suplementacao3" class="form-control" id="tipo_suplementacao3" type="hidden"></input>
								<button type="submit" id="btnEnviar" style="display:none; background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-left"></button>	
								<button type="button" data-dismiss="modal" onclick="validarFormulario()" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Enviar</button>	
								<button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>								
							<form>	
						</div>
					</div>	
					@endif
				</div>
				
				@if ($mensagem_dotacao <> "")
				<script>
					$(document).ready(function()
					{
						$('#modalMensagemDotacao').modal({
							show: true,
						})
					});
				</script>
				@endif
							
							</div>
							
							
						</form>

					</div>
						
					</div>		
				</div>			
			</div>
		</div>
	</div>	
</div>

@endsection		
	
	
	
	<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagemSemSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  class="modal fade">
	<div class="modal-dialog" role="document">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:auto; white-space: nowrap;">
            <button type="button" aria-hidden="true" data-toggle="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b><input class="form-control" value="" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
	
	</div>
</div>

<!-- Modal Mensagem Dotação-->
<div class="modal"  id="modalMensagemDotacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  class="modal fade" >
	<div class="modal-dialog" role="document"  class="modal fade">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:auto; ">
            <button type="button" aria-hidden="true" data-toggle="modal"  data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem_dotacao}} </span>
         </div>
	
	</div>
</div>

	

<script>
					$(document).ready(function()
					{
											
						var foco = <?php echo json_encode($acao);	?>;

						if(foco == 'suplementar'){
							//$("#sup_codigo_dotacao").focus();
							document.getElementById('cardSuplementacao').style.display = "";
							document.getElementById("sup_codigo_dotacao").focus({preventScroll:false});
						}
						else if(foco == 'remanejar')
						{
							//$("#anl_codigo_dotacao").focus();
							document.getElementById('cardRemanejamento').style.display = "";
							document.getElementById("rmj_codigo_dotacao").focus({preventScroll:false});
						}
						else if(foco == 'transpor')
						{
							//$("#anl_codigo_dotacao").focus();
							document.getElementById('cardTransposicao').style.display = "";
							document.getElementById("tnp_codigo_dotacao").focus({preventScroll:false});
						}
						else if(foco == 'transferir')
						{
							//$("#anl_codigo_dotacao").focus();
							document.getElementById('cardTransferencia').style.display = "";
							document.getElementById("tnf_codigo_dotacao").focus({preventScroll:false});
						}
						
					});

document.addEventListener('DOMContentLoaded', function() 
	{
		var exercicio = new Date().getFullYear()
		
		
		var i;
		var j = 0;
		for (i = exercicio+1; i > (exercicio-3); i--) 
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
				</script>