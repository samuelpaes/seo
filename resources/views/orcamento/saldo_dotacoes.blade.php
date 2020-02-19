@extends('layouts.app')

	@section('content')	

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('orcamento_saldo_dotacoes') }}">
									<div class="row">
										<div class="col-md-5">
											<h4 class="title">Saldo de Dotações</h4>	
											<br>
										</div>
										<div class="col-md-7" style="margin-right:-4px;">
											<div class="col-md-6">
												<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
													<option value="TODAS" selected>Todas</option>
													<option value="EXECUTORA">Unidade Executora</option>
													<option value="CLASSIFICACAO_FUNCIONAL_PROGRAMATICA">Classificação Funcional Programática</option>
													<option value="NATUREZA_DE_DESPESA">Natureza De Despesa</option>
													<option value="DOTACAO">Dotação</option>
												</select>
											</div>	
											<div class="col-md-3" style="margin-right:-4px;">
												<input class="form-control" name="codigo" id="codigo"  onkeyup="mascaraCodigo( this, c );" placeholder="Código"  autofocus disabled>
											</div>
											<div class="col-md-3">
												<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
											
						<div class="card">
									<?php
										//Unidade Orcamentaria
										$indiceA = 0;
										$indiceB = 0;
										$indiceC = 0;
										$indiceD = 0;
										$indiceE = 0;
										$total = 0;
										foreach($unidadesOrcamentarias as $orcamentaria)
										{	
											echo "<div class='content table-responsive table-full-width'>
														<table id='tree' class='table table-hover table-striped'>
															<tbody>";
										
											$orcamentaria['dotacao'] = 'R$ '.number_format($orcamentaria['dotacao'], 2, ',', '.');
											$orcamentaria['empenhado'] = 'R$ '.number_format($orcamentaria['empenhado'], 2, ',', '.');
											$orcamentaria['saldo'] = 'R$ '.number_format($orcamentaria['saldo'], 2, ',', '.');
											$orcamentaria['reserva'] = 'R$ '.number_format($orcamentaria['reserva'], 2, ',', '.');
											$indiceA=$indiceA+1;
											echo 	"
													<tr style='background:none; '>
														<td height='5' colspan='3'  style='border:0px; '><b>{$orcamentaria['unidade_orcamentaria']}</b></td>	
														<td height='5' align='right' style='border:0px; '><b></b></td>
														<td height='5' align='right' style='border:0px; '><b>DOTAÇÃO</b></td>
														<td height='5' align='right' style='border:0px; '><b>EMPENHADO</b></td>
														<td height='5' align='right' style='border:0px; '><b>RESERVA</b></td>
														<td height='5' align='right' style='border:0px; '><b>SALDO</b></td>
														
													<tr>
													<tr class='treegrid-{$indiceA}'>
														<td colspan='3'>{$orcamentaria['codigo_orcamentaria']} - {$orcamentaria['unidade_orcamentaria']} </td>	
														<td width='10%' align='right'></td>
														<td width='10%' align='right'>{$orcamentaria['dotacao']}</td>
														<td width='10%' align='right'>{$orcamentaria['empenhado']}</td>
														<td width='10%' align='right'>{$orcamentaria['reserva']}</td>
														<td width='10%' align='right'>{$orcamentaria['saldo']}</td>
														
													</tr>
													";
											$indiceB = $indiceA;		
											
											foreach($unidadesExecutoras as $executora)
											{
												$executora['dotacao'] = 'R$ '.number_format($executora['dotacao'], 2, ',', '.');				
												$executora['empenhado'] = 'R$ '.number_format($executora['empenhado'], 2, ',', '.');				
												$executora['saldo'] = 'R$ '.number_format($executora['saldo'], 2, ',', '.');
												$executora['reserva'] = 'R$ '.number_format($executora['reserva'], 2, ',', '.');												
												if($orcamentaria['codigo_orcamentaria'] == $executora['codigo_orcamentaria'])
												{
													$indiceA=$indiceA+1;
													echo 	"
															
															<tr class='treegrid-{$indiceA} treegrid-parent-{$indiceB}'>
																<td style='border:0px'>{$executora['codigo_executora']} - {$executora['unidade_executora']}</td>
																<td style='border:0px'></td>
																<td style='border:0px'></td>
																<td width='10%' style='border:0px'></td>
																<td width='10%' style='border:0px' align='right'>{$executora['dotacao']} </td>
																<td width='10%' style='border:0px' align='right'>{$executora['empenhado']} </td>
																<td width='10%' style='border:0px' align='right'>{$executora['reserva']} </td>
																<td width='10%' style='border:0px' align='right'>{$executora['saldo']} </td>
															</tr>
															";
													$indiceC = $indiceA;	
														
													foreach($classificacoesFuncionais as $classificacaoFuncional)
													{
														$classificacaoFuncional['dotacao'] = 'R$ '.number_format($classificacaoFuncional['dotacao'], 2, ',', '.');	
														$classificacaoFuncional['empenhado'] = 'R$ '.number_format($classificacaoFuncional['empenhado'], 2, ',', '.');
														$classificacaoFuncional['saldo'] = 'R$ '.number_format($classificacaoFuncional['saldo'], 2, ',', '.');	
														$classificacaoFuncional['reserva'] = 'R$ '.number_format($classificacaoFuncional['reserva'], 2, ',', '.');															
														if($executora['codigo_executora'] == $classificacaoFuncional['codigo_executora'])
														{
															$indiceA=$indiceA+1;
															echo 	"<tr class='treegrid-{$indiceA} treegrid-parent-{$indiceC}'>
																		<td style='border:0px'>{$classificacaoFuncional['codigo_classificacaoFuncionalProgramatica']} - {$classificacaoFuncional['especificacao_classificacaoFuncionalProgramatica']} </td>
																		<td style='border:0px'></td>
																		<td style='border:0px'></td>
																		<td width='10%' style='border:0px'></td>
																		<td width='10%' style='border:0px' align='right'>{$classificacaoFuncional['dotacao']}</td>
																		<td width='10%' style='border:0px' align='right'>{$classificacaoFuncional['empenhado']}</td>
																		<td width='10%' style='border:0px' align='right'>{$classificacaoFuncional['reserva']}</td>
																		<td width='10%' style='border:0px' align='right'>{$classificacaoFuncional['saldo']}</td>
																	</tr>";	
															$indiceD = $indiceA;		
																	
														foreach($naturezas_dotacoes_total as $natureza_dotacao_total)
															{
																$natureza_dotacao_total['dotacao'] = 'R$ '.number_format($natureza_dotacao_total['dotacao'], 2, ',', '.');
																$natureza_dotacao_total['empenhado'] = 'R$ '.number_format($natureza_dotacao_total['empenhado'], 2, ',', '.');
																$natureza_dotacao_total['saldo'] = 'R$ '.number_format($natureza_dotacao_total['saldo'], 2, ',', '.');
																$natureza_dotacao_total['reserva'] = 'R$ '.number_format($natureza_dotacao_total['reserva'], 2, ',', '.');
																if( $natureza_dotacao_total['codigo_classificacaoFuncionalProgramatica'] == $classificacaoFuncional['codigo_classificacaoFuncionalProgramatica'] and $natureza_dotacao_total['codigo_executora'] == $executora['codigo_executora'] and $natureza_dotacao_total['codigo_orcamentaria'] == $orcamentaria['codigo_orcamentaria'])
																{	
																	$indiceA=$indiceA+1;
																	
																	echo 	"
																			<tr class='treegrid-{$indiceA} treegrid-parent-{$indiceD}'>
																				<td style='border:0px'>{$natureza_dotacao_total['codigo_natureza']} - {$natureza_dotacao_total['especificacao_natureza']} </td>
																				<td style='border:0px'></td>
																				<td style='border:0px'></td>
																				<td width='10%' style='border:0px;white-space:nowrap;' align='center'><b><ul><sub>COD. DOTAÇÃO</sup></ul><ul><sub>{$natureza_dotacao_total['codigo_dotacao']}</ul></sub></b></td>
																				<td width='10%' style='border:0px' align='right'>{$natureza_dotacao_total['dotacao']}</td>
																				<td width='10%' style='border:0px' align='right'>{$natureza_dotacao_total['empenhado']}</td>
																				<td width='10%' style='border:0px' align='right'>{$natureza_dotacao_total['reserva']}</td>
																				<td width='10%' style='border:0px' align='right'>{$natureza_dotacao_total['saldo']}</td>
																			</tr>";	
																	$indiceE = $indiceA;	
																	
																	foreach($vinculos_valores as $vinculo_valor)
																	{
																		
																		if( $vinculo_valor['codigo_natureza'] == $natureza_dotacao_total['codigo_natureza'] and $vinculo_valor['codigo_classificacaoFuncionalProgramatica'] == $natureza_dotacao_total['codigo_classificacaoFuncionalProgramatica'] and  $vinculo_valor['codigo_orcamentaria'] == $orcamentaria['codigo_orcamentaria'] and $vinculo_valor['codigo_executora'] == $executora['codigo_executora'] and $vinculo_valor['codigo_dotacao'] == $natureza_dotacao_total['codigo_dotacao'])
																		{
																			
																			$vinculo_valor['dotacao'] = 'R$ '.number_format($vinculo_valor['dotacao'], 2, ',', '.');
																			$vinculo_valor['empenhado'] = 'R$ '.number_format($vinculo_valor['empenhado'], 2, ',', '.');
																			$vinculo_valor['saldo'] = 'R$ '.number_format($vinculo_valor['saldo'], 2, ',', '.');
																			$vinculo_valor['reserva'] = 'R$ '.number_format($vinculo_valor['reserva'], 2, ',', '.');
																			$indiceA=$indiceA+1;
																			echo 	"<tr class='treegrid-{$indiceA} treegrid-parent-{$indiceE}'>
																						<td style='border:0px' align='left' >
																							<input value='{$vinculo_valor['codigo_vinculo']}' id='codigo_vinculo-{$indiceA}' style='display:hidden' name='codigo_vinculo' disabled></input>
																							<input value='{$vinculo_valor['codigo_dotacao']}' id='codigo_dotacao-{$indiceA}' style='display:hidden' name='codigo_dotacao' disabled></input>
																							{$vinculo_valor['codigo_vinculo']} - {$vinculo_valor['descricao_vinculo']}
																						</td>
																						<td style='border:0px'></td>
																						<td style='border:0px'></td>
																						<td width='10%' style='border:0px' align='center'><p style='position:relative; left:20px;'>{$vinculo_valor['codigo_dotacao']}</p></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='dotacao-{$indiceA}' name='dotacao' value='{$vinculo_valor['dotacao']}' disabled></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='empenhado-{$indiceA}'name='empenhado' value='{$vinculo_valor['empenhado']}' disabled></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='reserva-{$indiceA}' name='reserva' value='{$vinculo_valor['reserva']}' disabled></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='saldo-{$indiceA}' name='saldo' value='{$vinculo_valor['saldo']}' disabled></td>
																					</tr>
																					";			
																		}																													
																	}			
																	
																}
															}
														}
													}
												}
											}
										}
										echo 	"												
													</tbody>	
												</table>						
											</div>
												";
									?>
								</form>	
					
												
						
					</div>
				</div>
			</div>	
		</div>

<script>
$(document).ready(function() {	
	$('#tree').treegrid({
		enableMove: true,
		onMoveOver: function(item, helper, target, position) {
		if (target.hasClass('treegrid-8')) return false;
			return true;
		}
	});
			
});

// função para ativar os campos do filtro
function ativarCamposParaFiltro() 
	{
		if (document.getElementById('filtro').value == "TODAS")
		{
			document.getElementById('codigo').disabled = true;
		}
		else{
			document.getElementById('codigo').disabled=false;
			document.getElementById('codigo').required=true;
		}
	}

/* Máscaras Código da Unidade Orcamentaria */
function mascaraCodigo(o,f){
	if (document.getElementById('filtro').value == "EXECUTORA" || document.getElementById('filtro').value == "CLASSIFICACAO_FUNCIONAL_PROGRAMATICA")
	{
		v_obj=o
		v_fun=f
		setTimeout("execmascara()",1)
	}
	else{
		
	}
}
		
function execmascara()
{
	v_obj.value=v_fun(v_obj.value)
}

function c(v)
{
	if (document.getElementById('filtro').value == "EXECUTORA")	
	{
		document.getElementById('codigo').maxLength = '8';
		//Remove tudo o que não é dígito
		v=v.replace(/\D/g,"");            
							
		//Coloca um ponto entre o terceiro e o quinto
		v=v.replace(/(\d{2})(\d)/,"$1.$2")

		//Coloca um ponto entre o quinto e o sétimo 
		v=v.replace(/(\d{2})(\d)/,"$1.$2")
	
		return v;
	}	
	else if (document.getElementById('filtro').value == "CLASSIFICACAO_FUNCIONAL_PROGRAMATICA")
	{	

		document.getElementById('codigo').maxLength = '15';
		//Remove tudo o que não é dígito
		v=v.replace(/\D/g,"");            
			   
					
		//Coloca um ponto entre o primeiro e o segundo
		v=v.replace(/(\d{1})(\d)/,"$1.$2")
				
		v=v.replace(/(\d{1})(\d)/,"$1.$2")
				
		v=v.replace(/(\d{2})(\d)/,"$1.$2")
				
		v=v.replace(/(\d)(\d{2})$/,"$1.$2");
		
		return v;
	}
	else if (document.getElementById('filtro').value == "NATUREZA_DE_DESPESA")
	{
	
		document.getElementById('codigo').maxLength = '12';
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
	else
	{
	}
}
</script>

@endsection		

<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($verificacao == 'Sucesso')
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
	








