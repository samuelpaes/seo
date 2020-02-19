<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('layouts.app')

@section('content')	


<style>


  /*
  .btn:link,
  .btn:visited{
	text-decoration: none;
	text-transform:uppercase;
	position:relative;
	top:0;
	left:0;
	padding:20px 40px;
	border-radius:100px;
	display:inline-block;
	transition: all .5s;
	
  }
  
  .btn-white{
	background:#fff;
	color:#000;
	border-color:#1f67b2;
  }
  
  .btn:hover{
	 box-shadow:0px 10px 10px rgba(0,0,0,0.2);
	 transform : translateY(-3px);
	 color:#000;
	 font-weight:bold;
	 border-color:#1f67b2;
  }
  
  .btn:active{
	box-shadow:0px 5px 10px rgba(0,0,0,0.2)
	transform:translateY(-1px);
  }
  
  .btn-bottom-animation-1{
	animation:comeFromBottom 1s ease-out .8s;
  }
  
  .btn::after{
	content:"";
	text-decoration: none;
	text-transform:uppercase;
	position:relative;
	width:100%;
	height:100%;
	top:0;
	left:0;
	border-radius:10px;
	display:inline-block;
	z-index:-1;
	transition: all .5s;
  }
  
  .btn-white::after {
	  background: #fff;
  }
  
  .btn-animation-1:hover::after {
	  transform: scaleX(1.4) scaleY(1.6);
	  opacity: 0;
  }
  
  @keyframes comeFromBottom{
	0%{
	  opacity:0;
	  transform:translateY(40px);
	} 
	100%{
	  opacity:1;
	  transform:translateY(0);
	}
  }

<!-- -->
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
	}*/

</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="title">Formulários</h4>	
								<br>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="content">
						<div style="font-size:16px;  text-align: justify;text-justify: inter-word;">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nesta seção você encontra os formulários para as solicitações de Crédito Adicional Suplementar e Remanejamento, Transposição e Transferência. Os formulários deverão ser preenchidos e devidamente assinados pelos respectivos responsáveis bem como encaminhados posteriormente para a unidade encarregada pela gestão do orçamento público municipal,  conforme instituído pelo Manual de Alterações Orçamentárias 2019 – 1º Edição – Decreto nº 3.098/19.<h6>
						</div>
						<br>
						<form method="get" action="{{route('orcamento_formularios')}}" style="align:center">
							<div class="row">
								<div class="col-md-6 text-center">
									<button name="formulario" class="btn btn-white btn-animation-1" style="width:500px" value="credito_adicional_suplementar">Crédito Adicional Suplementar</button>
								</div>
								<div class="col-md-6 text-center">
									<button name="formulario" class="btn btn-white btn-animation-1" style="width:500px" value="remanejamento_transposicao_transferencia">Remanejamento, Transposição e Transferência</button>
								</div>
							</div>	
						</form>
						<br>

						
                        
                    </div>
							
				</div>			
				@if ($mensagem <> "")
					<script>
						$(document).ready(function()
						{
							$('#formulario_credito_adicional_suplementar').modal({
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
	
<!-- Modal Formulário Crédito Adicional Suplementar-->
<div id="formulario_credito_adicional_suplementar" onmouseover="atualizarFormulario()" onwheel="atualizarFormulario()" class="modal fade" role="dialog">
	<script src="{{ asset('js/formularios_orcamento/credito_adicional_suplementar.js') }}"type="text/javascript"></script>
	<div class="modal-dialog" style="width: 90%">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style=" text-align:center"><b>CRÉDITO ADICIONAL SUPLEMENTAR</b></h4>
				<div style="text-align:center">{{ Auth::user()->secretaria }}</div>
				<br>
			</div>
			<div class="modal-body">		
				<div class="row flex-nowrap">	
					<div class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
						<span>&nbsp</span>
						<span>&nbsp</span>
						<label style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">DATA DA SOLICITAÇÃO:</label>
						<span>&nbsp</span>
						<span>&nbsp</span>
						<span>&nbsp</span>
						<input type="date" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="data" value="{{$data}}" class="form-control" id="data" style="display: inline-block; width:auto"></input>
					</div>		
					<div align="center" class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
						<span>&nbsp</span>
						<span>&nbsp</span>
						<label align="center" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">INSTRUMENTO ADMINISTRATIVO:</label>
						<span>&nbsp</span>
						<span>&nbsp</span>
						<span>&nbsp</span>
						<select align="center" class="form-control" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="instrumento" id="instrumento" style="display: inline-block; width:auto">
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
								<select align="center" class="form-control" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="anoInstrumento" id="anoInstrumento" style="display: inline-block; width:auto">
									<option selected></option>
									<option value="2019" <?php if ($numeroInstrumento[1] == '2019') echo ' selected="selected"'; ?> >2019</option>
									<option value="2018" <?php if ($numeroInstrumento[1] == '2018') echo ' selected="selected"'; ?> >2018</option>		
									<option value="2017" <?php if ($numeroInstrumento[1] == '2017') echo ' selected="selected"'; ?> >2017</option>					
								</select>
								<span>&nbsp</span>
								<span>&nbsp</span>
							</div>
						
						</div>
						<br>
						<div class="row flex-nowrap">
						
							<div class="col-sm-3 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
							</div>
						
							<div class="col-sm-2" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
								<label for="anulacao" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Anulação</label>
								<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Anulação" name="anulacao" id="chk_anulacao" type="checkbox" style="display: inline-block;width:auto"
									<?php if($anulacao === true) echo 'checked="checked"';?> />
							</div>
							
							<div class="col-sm-2" align="left" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
								<label for="superavit" align="left" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Superávit Financeiro</label>
								<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Superávit Financeiro" name="superavit" id="chk_superavit" align="left" type="checkbox" style="display: inline-block;width:auto" 
									<?php if($superavit === true) echo 'checked="checked"';?> />
							</div>
						
							<div class="col-sm-2" align="right">
								<label for="excesso" align="right" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Excesso de Arrecadação</label>
								<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Excesso de Arrecadação" name="excesso" id="chk_excesso" align="right" type="checkbox" style="display: inline-block;width:auto" 
									<?php if($excesso === true) echo 'checked="checked"';?> />
							</div>
						
							<div class="col-sm-3 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
							</div>
						
						</div>
						
						<br>
						
						<form method="get" action="{{route('orcamento_show')}}">
							<div class="card" style="box-shadow: 2px 2px 5px #888888;">
								<div style="display:none">
									<!--Superávit-->
									<table id="tabela_superavit3">
										<tr style="height:auto;">
										
										</tr>
									</table>
								
								
									<!--Excesso-->
									<table id="tabela_excesso3">
										<tr style="height:auto;">
										
										</tr>
									</table>
								</div>
								
								<input name="data" class="form-control" id="sup_data2" type="hidden"></input>
								<input name="tipoInstrumento" class="form-control" id="sup_instrumento2" type="hidden"></input>
								<input name="numeroInstrumento" class="form-control" id="sup_numeroInstrumento2" type="hidden"></input>
								<input name="tipo_anulacao" class="form-control" id="sup_tipo_anulacao" type="hidden"></input>
								<input name="tipo_superavit" class="form-control" id="sup_tipo_superavit" type="hidden"></input>
								<input name="tipo_excesso" class="form-control" id="sup_tipo_excesso" type="hidden"></input>
								
								<input name="unidade_orcamentaria" value="{{ Auth::user()->secretaria }}" id="unidade_orcamentaria" type="hidden"></input>
								
								
								<div class="header">
									<h5 style="text-align:center" ><b>SUPLEMENTAÇÃO</b></h5>
								</div>
								
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-5">
										</div>
										<div class="col-md-2 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input class="form-control" type="number" name="sup_codigo_dotacao[]" id="sup_codigo_dotacao" style="display: inline-block; width:80px;"></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="sup_valor[]" style="display: inline-block; width:80px;"></input>
												<button value="suplementar" id="suplementar" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
											</span>
										</div>
										<div class="col-md-5">
										</div>
											
										<div class="content table-responsive table-full-width" style=" font-size:12px;" >
											<table class="table table-hover table-striped" id="tabela_suplementar" name="tabela_suplementar" style='font-size:98%'>
												<thead>
													<tr style="height:100px">
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_suplementacao))
													<?php $i = 0; ?>
													@foreach($dotacoes_suplementacao as $dotacao)
														
													<tr style="height:auto;">
														<td style="width:100px"><input name="sup_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="width:150px"><input name="sup_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="width:110px"><input name="sup_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="sup_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="width:100px"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="sup_vinculo[{{$i}}]" onclick="sup_atualizar_vinculo(this, {{$i}})"  onmouseout="sup_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="sup_atualizar_vinculo(this, {{$i}})" id="vinculo_sup-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
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
														<td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" name='sup_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="width:100"><input name="sup_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="sup_atualizar_valor(this, {{$i}})" onkeydown="sup_atualizar_valor(this, {{$i}})" onkeyup="sup_atualizar_valor(this, {{$i}})" onclick="sup_atualizar_valor(this, {{$i}})" onmouseout="sup_atualizar_valor(this, {{$i}})"  onmouseover="sup_atualizar_valor(this, {{$i}})" id="valor_sup-{{$i}}" class="form-control"></input></td>
														<td style="width:200"><textarea name='sup_justificativa[{{$i}}]' onkeyup="sup_atualizar_justificativa(this, {{$i}})"  onclick="sup_atualizar_justificativa(this, {{$i}})" onmouseout="sup_atualizar_justificativa(this, {{$i}})" onmouseover="sup_atualizar_justificativa(this, {{$i}})" class="form-control" id="justificativa_sup-{{$i}}" style="width:100%; height:40px; text-transform: uppercase;">{{$dotacao['justificativa']}}</textarea></td>
														<td style="width:20px"><button type="button" style="width:100%; color:#000" id="suplementar" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
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
														<td style="width:50px;" colspan="6"></td>
														<td style="width:100px;" colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<br>
										<br>
										<br>
									</div>
								</div>			
							</div>
								
							<div class="card" id="cardAnulacao" style="box-shadow: 2px 2px 5px #888888; display:none">
								
								
								<input name="data" class="form-control" id="anl_data2" type="hidden"></input>
								<input name="tipoInstrumento" class="form-control" id="anl_instrumento2" type="hidden"></input>
								<input name="numeroInstrumento" class="form-control" id="anl_numeroInstrumento2" type="hidden"></input>
								
								<input name="tipo_anulacao" class="form-control" id="anl_tipo_anulacao" type="hidden"></input>
								<input name="tipo_superavit" class="form-control" id="anl_tipo_superavit" type="hidden"></input>
								<input name="tipo_excesso" class="form-control" id="anl_tipo_excesso" type="hidden"></input>
								
								
								
								<div class="header">
									<h5 style="text-align:center" ><b>ANULAÇÃO</b></h5>
								</div>
								
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-5">
										</div>
										<div class="col-md-2 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
												<input class="form-control" type="number" name="anl_codigo_dotacao[]" id="anl_codigo_dotacao" style="display: inline-block; width:80px;"></input>
												<input class="form-control" type="hidden" placeholder="R$ 0,00" name="anl_valor[]" style="display: inline-block; width:80px;"></input>
												<button value="anular" id="anular" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
											</span>
										</div>
										<div class="col-md-5">
										</div>
											
										<div class="content table-responsive table-full-width" style=" font-size:12px;" >
											<table class="table table-hover table-striped" id="tabela_anular" name="tabela_anular" style='font-size:98%'>
												<thead>
													<tr style="height:100px">
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
														<th><label style="flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
													</tr>
												</thead>
												<tbody>
													@if ($mensagem <> "" and !empty($dotacoes_anulacao))
													<?php $i = 0; ?>
													@foreach($dotacoes_anulacao as $dotacao)
														
													<tr style="height:auto;">
														<td style="width:100px"><input name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
														<td style="width:150px"><input name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
														<td style="width:110px"><input name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
														<input type="hidden" value="{{$i}}" name="anl_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
														<td style="width:100px"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
															<select class="form-control" name="anl_vinculo[{{$i}}]" onclick="anl_atualizar_vinculo(this, {{$i}})"  onmouseout="anl_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="anl_atualizar_vinculo(this, {{$i}})" id="vinculo_anl-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
																<option selected></option>	
																@foreach($dotacoes_anulacao_vinculos as $j => $value)
																	@foreach($value as $vinculo)
																		@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																			<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																		@endif
																	@endforeach
																@endforeach
															</select>
														</td>
														<td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
														<td style="width:100"><input name="anl_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_anl-{{$i}}" class="form-control"></input></td>
														<td style="width:200"><textarea name='anl_recurso[{{$i}}]' onkeypress="anl_atualizar_recurso(this, {{$i}})" onkeydown="anl_atualizar_recurso(this, {{$i}})" onkeyup="anl_atualizar_recurso(this, {{$i}})"  onclick="anl_atualizar_recurso(this, {{$i}})" onmouseout="anl_atualizar_recurso(this, {{$i}})" onmouseover="anl_atualizar_recurso(this, {{$i}})" id="recurso_anl-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
														<td style="width:20px"><button type="button" style="width:100%; color:#000" id="anular" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
														<td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
													</tr>
													<?php 
														$total_anular = $dotacao['dotacao'] + $total_anular;
														$i++;
													?>
													
													@endforeach
													<?php
														$total_anular = 'R$ '.number_format($total_anular, 2, ',', '.')
													?>
													@endif
													
													<tr style="display : table-row;" height="10">
														<td style="width:50px;" colspan="6"></td>
														<td style="width:100px;" colspan="2"></td>
													</tr>	
												</tbody>
											</table>  
										</div>
										<br>
										<br>
										<br>
									</div>
								</div>			
							</div>
							
							<div class="card" id="cardSuperavit" style="box-shadow: 2px 2px 5px #888888; display:none">
								
								<div class="header">
									<h5 style="text-align:center" ><b>SUPERÁVIT FINANCEIRO</b></h5>
								</div>
								<?php $i=0; ?>
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-2">
										</div>
										<div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
												<input class="form-control"  placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_spt" style="display: inline-block; width:150px;"></input>
												<label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
												<input class="form-control" style="display: inline-block; width:520px; text-transform: uppercase;" id="recurso_spt" ></input>
												<button value="superavit" type="button" onclick="addItemSuperavit()" id="superavit" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
											</span>
										</div>
										<div class="col-md-2">
										</div>
									</div>
								</div>
								<?php $i++; ?>
								
								<div class="content table-responsive table-full-width" style=" font-size:12px;" >
									<table class="table table-hover table-striped" id="tabela_superavit" name="tabela_superavit" style='font-size:98%'>
										<thead>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
												<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										
										@if(!empty($superavit_valor_recurso))
											<?php $i=0;?>
											@for($a = 0; $a < count($superavit_valor_recurso['valor']); $a++)										
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td style="width:100px"><input value="{{$superavit_valor_recurso['valor'][$a]}}" id="valor_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['valor'][$a]}}</div></input></td>
												<td style="width:450px"><input value="{{$superavit_valor_recurso['recurso'][$a]}}" id="recurso_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['recurso'][$a]}}</div></input></td>
												<td style="width:20px"><button type="button" style="width:100%; color:#000" id="superavit" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
												<td></td>
												<td></td>
											</tr>
											<?php $i++;?>
												
											@endfor
										@endif	
										</tbody>
									</table>  
								</div>
								
							</div>
							
							<div class="card" id="cardExcessoArrecadacao" style="box-shadow: 2px 2px 5px #888888; display:none">
								
							<div class="header">
									<h5 style="text-align:center" ><b>EXCESSO DE ARRECADAÇÃO</b></h5>
								</div>
								<?php $i=0; ?>
								<div class="content">
									<div class="row flex-nowrap">
										<div class="col-md-2">
										</div>
										<div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
											<span class="pull-center">
												<label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
												<input class="form-control"  placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_exc" style="display: inline-block; width:150px;"></input>
												<label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
												<input class="form-control" style="display: inline-block; width:520px; text-transform: uppercase;" id="recurso_exc" ></input>
												<button value="excesso" type="button" onclick="addItemExcesso()" id="excesso" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
											</span>
										</div>
										<div class="col-md-2">
										</div>
									</div>
								</div>
								<?php $i++; ?>
								
								<div class="content table-responsive table-full-width" style=" font-size:12px;" >
									<table class="table table-hover table-striped" id="tabela_excesso" name="tabela_excesso" style='font-size:98%'>
										<thead>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
												<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@if(!empty($excesso_valor_recurso))
											<?php $i=0;?>
											@for($a = 0; $a < count($excesso_valor_recurso['valor']); $a++)	
						
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td style="width:100px"><input value="{{$excesso_valor_recurso['valor'][$a]}}" id="valor_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['valor'][$a]}}</div></input></td>
												<td style="width:450px"><input value="{{$excesso_valor_recurso['recurso'][$a]}}" id="recurso_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['recurso'][$a]}}</div></input></td>
												<td style="width:20px"><button type="button" style="width:100%; color:#000" id="excesso" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
												<td></td>
												<td></td>
											</tr>
											<?php $i++;?>
												
											@endfor
										@endif			
										</tbody>
									</table>  
								</div>
								
							</div>
							
							
						</form>
					</div>
					<div class="modal-footer">	
					@if($mensagem <> '')
					<div class="row">
						<div class="col-md-3">
						<b>A Anular:</b>
						<input class="form-control" value="R$ 0,00" id="total_suplementar" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
						</div>
						<div class="col-md-3">
						<b>A Suplementar:</b>
						<input class="form-control" value="R$ 0,00"  id="total_anular" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
						</div>

						<div class="col-md-6">
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
									
								<!--Anulação-->
									<?php $i=0; ?>
									@foreach($dotacoes_anulacao as $dotacao)
										<tr style="height:auto;">
											<td style="width:100px"><input class="form-control" name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
											<td style="width:150px"><input class="form-control" name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
											<td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' type="hidden"></input></td>
											<td style="width:110px"><input class="form-control" name="anl_vinculo[{{$i}}]" id="anl_vinculo-[{{$i}}]" type="hidden"></input></td>
											<td style="width:200"><input name="anl_recurso[{{$i}}]" id='anl_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td style="width:200"><input name="anl_valor[{{$i}}]" id='anl_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
											<td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
										</tr>
										<?php $i++; ?>
									@endforeach
								
								<div style="display:none">
								<!--Superávit-->
									<table id="tabela_superavit2">
										<tr style="height:auto;">
									
										</tr>
									</table>
									
								<!--Excesso-->
									<table id="tabela_excesso2">
										<tr style="height:auto;">
									
										</tr>
									</table>
								</div>							
								
								<input name="instrumento" class="form-control" id="instrumento2" type="hidden"></input>
								<input name="numeroInstrumento" class="form-control" id="numeroInstrumento2" type="hidden"></input>
								<input name="data" class="form-control" id="data2" type="hidden"></input>
								<input name="tipo_suplementacao1" class="form-control" id="tipo_suplementacao1" type="hidden"></input>
								<input name="tipo_suplementacao2" class="form-control" id="tipo_suplementacao2" type="hidden"></input>
								<input name="tipo_suplementacao3" class="form-control" id="tipo_suplementacao3" type="hidden"></input>
								<button type="submit" id="btnEnviar" style="display:none; background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right"></button>	
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
		</div>
	</div>
</div>

<!-- Modal Remanejamento, Transposição e Transferência-->
<div id="formulario_remanejamento_transposicao_transferencia" onmouseover="atualizarFormulario_remanejamento_transposicao_transferencia()" onwheel="atualizarFormulario_remanejamento_transposicao_transferencia()" class="modal fade" role="dialog">

	<div class="modal-dialog" style="width: 90%">
    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style=" text-align:center"><b>REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</b></h4>
				<div style="text-align:center">{{ Auth::user()->secretaria }}</div>
				<br>
			</div>
			
			<div class="modal-body">
				
				<div class="row flex-nowrap">
				
						<div class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
							<span>&nbsp</span>
							<span>&nbsp</span>
							<label style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">DATA DA SOLICITAÇÃO:</label>
							<span>&nbsp</span>
							<span>&nbsp</span>
							<span>&nbsp</span>
							<input type="date" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="data" value="{{$data}}" class="form-control" id="data" style="display: inline-block; width:auto"></input>
						</div>
						
						<div align="center" class="col-md-4" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
							<span>&nbsp</span>
							<span>&nbsp</span>
							<label align="center" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; font-weight:normal">INSTRUMENTO ADMINISTRATIVO:</label>
							<span>&nbsp</span>
							<span>&nbsp</span>
							<span>&nbsp</span>
							<select align="center" class="form-control" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="instrumento" id="instrumento" style="display: inline-block; width:auto">
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
							<select align="center" class="form-control" onkeyup="handleSubmit()" onclick="handleSubmit()" onmouseout="handleSubmit()"  onmouseover="handleSubmit()" name="anoInstrumento" id="anoInstrumento" style="display: inline-block; width:auto">
								<option selected></option>
								<option value="2019" <?php if ($numeroInstrumento[1] == '2019') echo ' selected="selected"'; ?> >2019</option>
								<option value="2018" <?php if ($numeroInstrumento[1] == '2018') echo ' selected="selected"'; ?> >2018</option>		
								<option value="2017" <?php if ($numeroInstrumento[1] == '2017') echo ' selected="selected"'; ?> >2017</option>					
							</select>
							<span>&nbsp</span>
							<span>&nbsp</span>
						</div>
					
					</div>
					<br>
					<div class="row flex-nowrap">
					
						<div class="col-sm-3 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
						</div>
					
						<div class="col-sm-2" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
							<label for="remanejamento" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Remanejamento</label>
							<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Remanejamento" name="remanejamento" id="chk_remanejamento" type="checkbox" style="display: inline-block;width:auto"
								<?php // if($remanejamento === true) echo 'checked="checked"';?> />
						</div>
						
						<div class="col-sm-2" align="left" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap">
							<label for="transposicao" align="left" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Transposição</label>
							<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Transposição" name="transposicao" id="chk_transposicao" align="left" type="checkbox" style="display: inline-block;width:auto" 
								<?php //if($transposicao === true) echo 'checked="checked"';?> />
						</div>
					
						<div class="col-sm-2" align="right">
							<label for="transferencia" align="right" style="flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto; top:-17px; font-weight:normal">Transferência</label>
							<input onkeyup="ativarTipoCard()" onclick="ativarTipoCard()" onmouseout="ativarTipoCard()" onmouseover="ativarTipoCard()" class="form-control" value="Transferência" name="transferencia" id="chk_transferencia" align="right" type="checkbox" style="display: inline-block;width:auto" 
								<?php //if($transferencia === true) echo 'checked="checked"';?> />
						</div>

						
					
						<div class="col-sm-3 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
						</div>
					
					</div>
					
					<br>
					
					<form method="get" action="{{route('orcamento_show')}}">
						<div class="card" style="box-shadow: 2px 2px 5px #888888;">
							<div style="display:none">
								<!--Superávit-->
								<table id="tabela_superavit3">
									<tr style="height:auto;">
									
									</tr>
								</table>
							
							
								<!--Excesso-->
								<table id="tabela_excesso3">
									<tr style="height:auto;">
									
									</tr>
								</table>
							</div>
							
							<input name="data" class="form-control" id="sup_data2" type="hidden"></input>
							<input name="tipoInstrumento" class="form-control" id="sup_instrumento2" type="hidden"></input>
							<input name="numeroInstrumento" class="form-control" id="sup_numeroInstrumento2" type="hidden"></input>
							<input name="tipo_remanejamento" class="form-control" id="sup_tipo_remanejamento" type="hidden"></input>
							<input name="tipo_transposicao" class="form-control" id="sup_tipo_transposicao" type="hidden"></input>
							<input name="tipo_transferencia" class="form-control" id="sup_tipo_transferencia" type="hidden"></input>
							
							<input name="unidade_orcamentaria" value="{{ Auth::user()->secretaria }}" id="unidade_orcamentaria" type="hidden"></input>
							
							
							<div class="header">
								<h5 style="text-align:center" ><b>SUPLEMENTAÇÃO</b></h5>
							</div>
							
							<div class="content">
								<div class="row flex-nowrap">
									<div class="col-md-5">
									</div>
									<div class="col-md-2 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
										<span class="pull-center">
											<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
											<input class="form-control" type="number" name="sup_codigo_dotacao[]" id="sup_codigo_dotacao" style="display: inline-block; width:80px;"></input>
											<input class="form-control" type="hidden" placeholder="R$ 0,00" name="sup_valor[]" style="display: inline-block; width:80px;"></input>
											<button value="suplementar" id="suplementar" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
										</span>
									</div>
									<div class="col-md-5">
									</div>
										
									<div class="content table-responsive table-full-width" style=" font-size:12px;" >
										<table class="table table-hover table-striped" id="tabela_suplementar" name="tabela_suplementar" style='font-size:98%'>
											<thead>
												<tr style="height:100px">
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
												</tr>
											</thead>
											<tbody>
												@if ($mensagem <> "" and !empty($dotacoes_suplementacao))
												<?php $i = 0; ?>
												@foreach($dotacoes_suplementacao as $dotacao)
													
												<tr style="height:auto;">
													<td style="width:100px"><input name="sup_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
													<td style="width:150px"><input name="sup_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
													<td style="width:110px"><input name="sup_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
													<input type="hidden" value="{{$i}}" name="sup_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
													<td style="width:100px"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
														<select class="form-control" name="sup_vinculo[{{$i}}]" onclick="sup_atualizar_vinculo(this, {{$i}})"  onmouseout="sup_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="sup_atualizar_vinculo(this, {{$i}})" id="vinculo_sup-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
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
													<td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" name='sup_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
													<td style="width:100"><input name="sup_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="sup_atualizar_valor(this, {{$i}})" onkeydown="sup_atualizar_valor(this, {{$i}})" onkeyup="sup_atualizar_valor(this, {{$i}})" onclick="sup_atualizar_valor(this, {{$i}})" onmouseout="sup_atualizar_valor(this, {{$i}})"  onmouseover="sup_atualizar_valor(this, {{$i}})" id="valor_sup-{{$i}}" class="form-control"></input></td>
													<td style="width:200"><textarea name='sup_justificativa[{{$i}}]' onkeyup="sup_atualizar_justificativa(this, {{$i}})"  onclick="sup_atualizar_justificativa(this, {{$i}})" onmouseout="sup_atualizar_justificativa(this, {{$i}})" onmouseover="sup_atualizar_justificativa(this, {{$i}})" class="form-control" id="justificativa_sup-{{$i}}" style="width:100%; height:40px; text-transform: uppercase;">{{$dotacao['justificativa']}}</textarea></td>
													<td style="width:20px"><button type="button" style="width:100%; color:#000" id="suplementar" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
													<td hidden><input class="form-control" name='sup_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
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
													<td style="width:50px;" colspan="6"></td>
													<td style="width:100px;" colspan="2"></td>
												</tr>	
											</tbody>
										</table>  
									</div>
									<br>
									<br>
									<br>
								</div>
							</div>			
						</div>
							
						<div class="card" id="cardAnulacao" style="box-shadow: 2px 2px 5px #888888; display:none">
							
							
							<input name="data" class="form-control" id="anl_data2" type="hidden"></input>
							<input name="tipoInstrumento" class="form-control" id="anl_instrumento2" type="hidden"></input>
							<input name="numeroInstrumento" class="form-control" id="anl_numeroInstrumento2" type="hidden"></input>
							
							<input name="tipo_anulacao" class="form-control" id="anl_tipo_anulacao" type="hidden"></input>
							<input name="tipo_superavit" class="form-control" id="anl_tipo_superavit" type="hidden"></input>
							<input name="tipo_excesso" class="form-control" id="anl_tipo_excesso" type="hidden"></input>
							
							
							
							<div class="header">
								<h5 style="text-align:center" ><b>ANULAÇÃO</b></h5>
							</div>
							
							<div class="content">
								<div class="row flex-nowrap">
									<div class="col-md-5">
									</div>
									<div class="col-md-2 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
										<span class="pull-center">
											<label for="dotacao" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Dotação</label>
											<input class="form-control" type="number" name="anl_codigo_dotacao[]" id="anl_codigo_dotacao" style="display: inline-block; width:80px;"></input>
											<input class="form-control" type="hidden" placeholder="R$ 0,00" name="anl_valor[]" style="display: inline-block; width:80px;"></input>
											<button value="anular" id="anular" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
										</span>
									</div>
									<div class="col-md-5">
									</div>
										
									<div class="content table-responsive table-full-width" style=" font-size:12px;" >
										<table class="table table-hover table-striped" id="tabela_anular" name="tabela_anular" style='font-size:98%'>
											<thead>
												<tr style="height:100px">
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000 "><b>Dotação</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></label></th>
													<th><label style="flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></label></th>
												</tr>
											</thead>
											<tbody>
												@if ($mensagem <> "" and !empty($dotacoes_anulacao))
												<?php $i = 0; ?>
												@foreach($dotacoes_anulacao as $dotacao)
													
												<tr style="height:auto;">
													<td style="width:100px"><input name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}"><div class="form-control" style='flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['unidade_executora']}}</div></input></td>
													<td style="width:150px"><input name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}"><div class="form-control" style=' flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['classificacao_funcional_programatica']}}</div></input></td>
													<td style="width:110px"><input name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;'>{{$dotacao['natureza_de_despesa']}}</div></input></td>
													<input type="hidden" value="{{$i}}" name="anl_id[{{$i}}]" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'></input>
													<td style="width:100px"><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>	
														<select class="form-control" name="anl_vinculo[{{$i}}]" onclick="anl_atualizar_vinculo(this, {{$i}})"  onmouseout="anl_atualizar_vinculo(this, {{$i}})" onmouseover="sup_atualizar_vinculo(this, {{$i}})" onkeyup="anl_atualizar_vinculo(this, {{$i}})" id="vinculo_anl-{{$i}}" style="width:auto; height:auto;position:relative; top:-5px;">
															<option selected></option>	
															@foreach($dotacoes_anulacao_vinculos as $j => $value)
																@foreach($value as $vinculo)
																	@if($vinculo['codigo_dotacao'] == $dotacao['codigo_dotacao'])
																		<option value="{{$vinculo['vinculo']}}" <?php if ($dotacao['vinculo'] == $vinculo['vinculo']) echo ' selected="selected"'; ?>>{{$vinculo['vinculo']}}</option>
																	@endif
																@endforeach
															@endforeach
														</select>
													</td>
													<td style="width:50px"><input value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' hidden></input><div class="form-control" style='display:hidden; border:none; background:none; color:#000; font-weight:normal; width:auto; text-align:center;'>{{$dotacao['codigo_dotacao']}}</div></td>
													<td style="width:100"><input name="anl_valor[{{$i}}]" value="{{$dotacao['valor']}}" placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_anl-{{$i}}" class="form-control"></input></td>
													<td style="width:200"><textarea name='anl_recurso[{{$i}}]' onkeypress="anl_atualizar_recurso(this, {{$i}})" onkeydown="anl_atualizar_recurso(this, {{$i}})" onkeyup="anl_atualizar_recurso(this, {{$i}})"  onclick="anl_atualizar_recurso(this, {{$i}})" onmouseout="anl_atualizar_recurso(this, {{$i}})" onmouseover="anl_atualizar_recurso(this, {{$i}})" id="recurso_anl-{{$i}}" class="form-control" style="width:100%; height:40px;  text-transform: uppercase;">{{$dotacao['recurso']}}</textarea></td>
													<td style="width:20px"><button type="button" style="width:100%; color:#000" id="anular" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
													<td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;'></input></td>
												</tr>
												<?php 
													$total_anular = $dotacao['dotacao'] + $total_anular;
													$i++;
												?>
												
												@endforeach
												<?php
													$total_anular = 'R$ '.number_format($total_anular, 2, ',', '.')
												?>
												@endif
												
												<tr style="display : table-row;" height="10">
													<td style="width:50px;" colspan="6"></td>
													<td style="width:100px;" colspan="2"></td>
												</tr>	
											</tbody>
										</table>  
									</div>
									<br>
									<br>
									<br>
								</div>
							</div>			
						</div>
						
						<div class="card" id="cardSuperavit" style="box-shadow: 2px 2px 5px #888888; display:none">
							
							<div class="header">
								<h5 style="text-align:center" ><b>SUPERÁVIT FINANCEIRO</b></h5>
							</div>
							<?php $i=0; ?>
							<div class="content">
								<div class="row flex-nowrap">
									<div class="col-md-2">
									</div>
									<div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
										<span class="pull-center">
											<label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
											<input class="form-control"  placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_spt" style="display: inline-block; width:150px;"></input>
											<label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
											<input class="form-control" style="display: inline-block; width:520px; text-transform: uppercase;" id="recurso_spt" ></input>
											<button value="superavit" type="button" onclick="addItemSuperavit()" id="superavit" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
										</span>
									</div>
									<div class="col-md-2">
									</div>
								</div>
							</div>
							<?php $i++; ?>
							
							<div class="content table-responsive table-full-width" style=" font-size:12px;" >
								<table class="table table-hover table-striped" id="tabela_superavit" name="tabela_superavit" style='font-size:98%'>
									<thead>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
											<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									
									@if(!empty($superavit_valor_recurso))
										<?php $i=0;?>
										@for($a = 0; $a < count($superavit_valor_recurso['valor']); $a++)										
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td style="width:100px"><input value="{{$superavit_valor_recurso['valor'][$a]}}" id="valor_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['valor'][$a]}}</div></input></td>
											<td style="width:450px"><input value="{{$superavit_valor_recurso['recurso'][$a]}}" id="recurso_spt-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$superavit_valor_recurso['recurso'][$a]}}</div></input></td>
											<td style="width:20px"><button type="button" style="width:100%; color:#000" id="superavit" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
											<td></td>
											<td></td>
										</tr>
										<?php $i++;?>
											
										@endfor
									@endif	
									</tbody>
								</table>  
							</div>
							
						</div>
						
						<div class="card" id="cardExcessoArrecadacao" style="box-shadow: 2px 2px 5px #888888; display:none">
							
						<div class="header">
								<h5 style="text-align:center" ><b>EXCESSO DE ARRECADAÇÃO</b></h5>
							</div>
							<?php $i=0; ?>
							<div class="content">
								<div class="row flex-nowrap">
									<div class="col-md-2">
									</div>
									<div class="col-md-8 col-md-center" style="flex-wrap:nowrap; display: inline-block; white-space: nowrap;">
										<span class="pull-center">
											<label for="valor" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Valor</label>
											<input class="form-control"  placeholder="R$ 0,00" onkeypress="anl_atualizar_valor(this, {{$i}})" onkeydown="anl_atualizar_valor(this, {{$i}})" onkeyup="anl_atualizar_valor(this, {{$i}})" onclick="anl_atualizar_valor(this, {{$i}})" onmouseout="anl_atualizar_valor(this, {{$i}})"  onmouseover="anl_atualizar_valor(this, {{$i}})" id="valor_exc" style="display: inline-block; width:150px;"></input>
											<label for="recurso" style="color:#000; flex-wrap:nowrap; padding:0px; margin:0px; display: inline-block;width: auto;  text-transform: capitalize">Recurso</label>
											<input class="form-control" style="display: inline-block; width:520px; text-transform: uppercase;" id="recurso_exc" ></input>
											<button value="excesso" type="button" onclick="addItemExcesso()" id="excesso" align="left" name="acao" type="submit" class="btn btn-info btn-fill pull-right">+</button>
										</span>
									</div>
									<div class="col-md-2">
									</div>
								</div>
							</div>
							<?php $i++; ?>
							
							<div class="content table-responsive table-full-width" style=" font-size:12px;" >
								<table class="table table-hover table-striped" id="tabela_excesso" name="tabela_excesso" style='font-size:98%'>
									<thead>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 0.5; text-align:center; color:#000"><b>Valor</b></label></th>
											<th style="text-align:center;"><label style="flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 0.5; text-align:center; color:#000"><b>Recurso</b></label></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($excesso_valor_recurso))
										<?php $i=0;?>
										@for($a = 0; $a < count($excesso_valor_recurso['valor']); $a++)	
					
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td style="width:100px"><input value="{{$excesso_valor_recurso['valor'][$a]}}" id="valor_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['valor'][$a]}}</div></input></td>
											<td style="width:450px"><input value="{{$excesso_valor_recurso['recurso'][$a]}}" id="recurso_exc-{{$i}}"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">{{$excesso_valor_recurso['recurso'][$a]}}</div></input></td>
											<td style="width:20px"><button type="button" style="width:100%; color:#000" id="excesso" onclick="removerLinha(this, this.id)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>
											<td></td>
											<td></td>
										</tr>
										<?php $i++;?>
											
										@endfor
									@endif			
									</tbody>
								</table>  
							</div>
							
						</div>
						
						
					</form>
				</div>
				<div class="modal-footer">	
				@if($mensagem <> '')
				<div class="row">
					<div class="col-md-3">
					<b>A Anular:</b>
					<input class="form-control" value="R$ 0,00" id="total_suplementar" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
					</div>
					<div class="col-md-3">
					<b>A Suplementar:</b>
					<input class="form-control" value="R$ 0,00"  id="total_anular" style="display: inline-block; width:auto; border:none; background:none; color:#000" readonly></input>
					</div>

					<div class="col-md-6">
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
								
							<!--Anulação-->
								<?php $i=0; ?>
								@foreach($dotacoes_anulacao as $dotacao)
									<tr style="height:auto;">
										<td style="width:100px"><input class="form-control" name="anl_unidade_executora[{{$i}}]" value="{{$dotacao['unidade_executora']}}" type="hidden"></input></td>
										<td style="width:150px"><input class="form-control" name="anl_classificacao_funcional[{{$i}}]" value="{{$dotacao['classificacao_funcional_programatica']}}" type="hidden"></input></td>
										<td style="width:110px"><input class="form-control" name="anl_natureza_despesa[{{$i}}]" value="{{$dotacao['natureza_de_despesa']}}" type="hidden"></input></td>
										<td style="width:50px"><input class="form-control" value="{{$dotacao['codigo_dotacao']}}" name='anl_codigo_dotacao[]' type="hidden"></input></td>
										<td style="width:110px"><input class="form-control" name="anl_vinculo[{{$i}}]" id="anl_vinculo-[{{$i}}]" type="hidden"></input></td>
										<td style="width:200"><input name="anl_recurso[{{$i}}]" id='anl_recurso-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
										<td style="width:200"><input name="anl_valor[{{$i}}]" id='anl_valor-[{{$i}}]' class="form-control" style="width:100%; height:40px" type="hidden"></input></td>
										<td hidden><input class="form-control" name='anl_dotacao[{{$i}}]' value="{{'R$ '.number_format($dotacao['dotacao'], 2, ',', '.')}}" style='display:hidden; border:none; background:none; color:#000; font-weight:normal;width:auto; text-align:center;' type="hidden"></input></td>
									</tr>
									<?php $i++; ?>
								@endforeach
							
							<div style="display:none">
							<!--Superávit-->
								<table id="tabela_superavit2">
									<tr style="height:auto;">
								
									</tr>
								</table>
								
							<!--Excesso-->
								<table id="tabela_excesso2">
									<tr style="height:auto;">
								
									</tr>
								</table>
							</div>							
							
							<input name="instrumento" class="form-control" id="instrumento2" type="hidden"></input>
							<input name="numeroInstrumento" class="form-control" id="numeroInstrumento2" type="hidden"></input>
							<input name="data" class="form-control" id="data2" type="hidden"></input>
							<input name="tipo_suplementacao1" class="form-control" id="tipo_suplementacao1" type="hidden"></input>
							<input name="tipo_suplementacao2" class="form-control" id="tipo_suplementacao2" type="hidden"></input>
							<input name="tipo_suplementacao3" class="form-control" id="tipo_suplementacao3" type="hidden"></input>
							<button type="submit" id="btnEnviar" style="display:none; background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right"></button>	
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
		</div>
	</div>

</div>



<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagemSemSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:auto; white-space: nowrap;">
            <button type="button" aria-hidden="true" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b><input class="form-control" value="" id="mensagem" style=" white-space: nowrap; display: inline-block; width:100%; border:none; background:none; color:#fff" readonly></input></span>
         </div>
	
	</div>
</div>

<!-- Modal Mensagem Dotação-->
<div class="modal"  id="modalMensagemDotacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		
		<div class="alert alert-danger" style="border-radius: 5px; width:auto; white-space: nowrap;">
            <button type="button" aria-hidden="true" data-toggle="modal" data-target="#formulario_credito_adicional_suplementar" data-dismiss="modal" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem_dotacao}} </span>
         </div>
	
	</div>
</div>




