@extends('layouts.app')
	@section('content')	
<style>
.btnEdicao:hover{cursor: pointer}
.btnEdicao{
	display: inline-block;
    background: transparent; outline: none;
    position: relative;
    border: 0px solid #111;
    overflow: hidden;
	height:20px;
}
.btnEdicao:hover:before{
	opacity: 1; 
	transform: 
	translate(0,0);
	width:20px;
}
.btnEdicao:hover{
	opacity: 1; 
	transform: 
	translate(0,0);
	width:65px;
}
.btnEdicao:before{
    content: attr(data-hover);
    position: absolute;
    left: 0;
	top:2.5px;
    text-transform: uppercase;
	width:10%;
    font-weight: 600;
    font-size: 12px;
    opacity: 0;
    transform: translate(-100%,0);
    transition: all .6s ease-in-out;
}
/*button div (button text before hover)*/
.btnEdicao:hover div{opacity: 0; transform: translate(100%,0); width:10%;}
.btnEdicao div{
    text-transform: uppercase;
    font-weight: 600;
    font-size: 16px;
    transition: all .6s ease-in-out;
}
.btnEdicao:active div {
	font-size: 6px;
}
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
/*removi o estilo da checkbox e inclui no css seo.css*/		
</style>

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('showDotacaoOrcamentaria') }}">
									<div class="row">
										<div class="col-md-5">
											<h4 class="title">Dotação Orçamentária</h4>	
										</div>
										<div class="col-md-7" >
											<div class="row">
												<div class="col-md-2">
													<select class="form-control" id="exercicio" name="exercicio" onclick="informaExercicioSelecionado()" onmousemove="informaExercicioSelecionado()"  >
													</select>
												</div>
												<div class="col-md-4" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="TODAS" selected>Todas</option>
														<option value="ORCAMENTARIA">Unidade Orçamentária</option>
														<option value="EXECUTORA">Unidade Executora</option>
														<option value="DOTACAO">Dotação</option>
													</select>
												</div>
												<div class="col-md-2" style="margin-right:-4px;">
													<input class="form-control" name="codigo" id="codigo" maxlength="8"  onkeyup="mascaraCodigo( this, c );" placeholder="Código"  autofocus disabled>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
												</div>	
												<div class="col-md-2">
													<!--<a href="{{ url('dotacao-orcamentaria/cadastrar') }}" class="btn btn-info btn-fill pull-left">
														Nova
													</a>-->		
													@if(count($exercicios) > 0)
														<button type="button" id="btnImportar" class="btn btn-info btn-fill pull-left" data-toggle="modal" data-target="#modalAtencaoExercicio" >Nova</button>
													@else
													<a href="{{ url('dotacao-orcamentaria/cadastrar') }}" class="btn btn-info btn-fill pull-left">
														Nova
													</a>
													@endif
														
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
						<form method="post" action="{{ route('alterarDotacaoOrcamentaria') }}">
							@csrf
							@method('POST')	
									<?php
										//Unidade Orcamentaria
										$indiceA = 0;
										$indiceB = 0;
										$indiceC = 0;
										$indiceD = 0;
										$indiceE = 0;
										$total = 0;
										
										echo "
												<div class='row' style='line-height:1px'>
													<div class='col-md-9'>
													</div>
													<div class='col-md-3'>
														<h4><b>EXERCICIO DE $exercicio</b>
													</div>
												</div>
									
											";
									
										foreach($unidadesOrcamentarias as $orcamentaria)
										{	
											echo "<div class='card'>
														<table id='tree-{$indiceA}' class='table table-hover table-striped'>
															<tbody>";
										
											$orcamentaria['dotacao'] = 'R$ '.number_format($orcamentaria['dotacao'], 2, ',', '.');
											$orcamentaria['empenhado'] = 'R$ '.number_format($orcamentaria['empenhado'], 2, ',', '.');
											$orcamentaria['saldo'] = 'R$ '.number_format($orcamentaria['saldo'], 2, ',', '.');
											$orcamentaria['reserva'] = 'R$ '.number_format($orcamentaria['reserva'], 2, ',', '.');
											$indiceA=$indiceA+1;
											echo 	"
													<tr style='background:none; '>
														<td height='5' colspan='3'  style='border:0px; '><b>{$orcamentaria['unidade_orcamentaria']}</b></td>	
														<td height='5' align='center' style='border:0px; '><b>CÓDIGO</b></td>
														<td height='5' align='right' style='border:0px; '><b>DOTAÇÃO</b></td>
														<td height='5' align='right' style='border:0px; '><b>EMPENHADO</b></td>
														<td height='5' align='right' style='border:0px; '><b>RESERVA</b></td>
														<td height='5' align='right' style='border:0px; '><b>SALDO</b></td>
														
													<tr>
													<tr class='treegrid-{$indiceA}'>
														<td colspan='3'>{$orcamentaria['codigo_orcamentaria']} - {$orcamentaria['unidade_orcamentaria']} </td>	
														<td width='10%' align='right'></td>
														<td width='10%' align='right' style='white-space: nowrap;'>{$orcamentaria['dotacao']}</td>
														<td width='10%' align='right' style='white-space: nowrap;'>{$orcamentaria['empenhado']}</td>
														<td width='10%' align='right' style='white-space: nowrap;'>{$orcamentaria['reserva']}</td>
														<td width='10%' align='right' style='white-space: nowrap;'>{$orcamentaria['saldo']}</td>
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
																<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$executora['dotacao']} </td>
																<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$executora['empenhado']} </td>
																<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$executora['reserva']} </td>
																<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$executora['saldo']} </td>
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
																		<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$classificacaoFuncional['dotacao']}</td>
																		<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$classificacaoFuncional['empenhado']}</td>
																		<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$classificacaoFuncional['reserva']}</td>
																		<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$classificacaoFuncional['saldo']}</td>
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
																				<td width='10%' style='border:0px;white-space:nowrap;' align='center'><b><!--<ul><sub>COD. DOTAÇÃO</sup></ul><ul><sub>-->{$natureza_dotacao_total['codigo_dotacao']}</ul></sub></b></td>
																				<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$natureza_dotacao_total['dotacao']}</td>
																				<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$natureza_dotacao_total['empenhado']}</td>
																				<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$natureza_dotacao_total['reserva']}</td>
																				<td width='10%' style='border:0px' align='right' style='white-space: nowrap;'>{$natureza_dotacao_total['saldo']}</td>
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
																							<button class='btnEdicao' type='button' data-hover='Cancelar' id='cancelar-{$indiceA}' style='margin-right:-5px;left:0px; display: none;' onclick='cancelar({$indiceA})'><div><i class='fa fa-times'></i></div></button>
																							<button class='btnEdicao' type='button' data-hover='Salvar'  id='salvar-{$indiceA}' style='margin:-5px;left:2px; display: none;' onclick='salvar({$indiceA})'><div><i class='fa fa-check'></i></div></button> 
																							<button class='btnEdicao' type='button' data-hover='Alterar' id='alterar-{$indiceA}' style='margin-left:-5px; left:4px;' onclick='alterar({$indiceA})'><div><i class='fa fa-pencil'></i></div></button>
																							<input value='{$vinculo_valor['codigo_vinculo']}' id='codigo_vinculo-{$indiceA}' style='display:hidden' name='codigo_vinculo' disabled></input>
																							<input value='{$vinculo_valor['codigo_dotacao']}' id='codigo_dotacao-{$indiceA}' style='display:hidden' name='codigo_dotacao' disabled></input>
																							{$vinculo_valor['codigo_vinculo']} - {$vinculo_valor['descricao_vinculo']}
																						</td>
																						<td style='border:0px'></td>
																						<td style='border:0px'></td>
																						<td width='10%' style='border:0px' align='center'><p style='position:relative; left:00px;'>{$vinculo_valor['codigo_dotacao']}</p></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='dotacao-{$indiceA}' name='dotacao' value='{$vinculo_valor['dotacao']}'  readonly></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='empenhado-{$indiceA}'name='empenhado' value='{$vinculo_valor['empenhado']}'  readonly></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='reserva-{$indiceA}' name='reserva' value='{$vinculo_valor['reserva']}'  readonly></td>
																						<td width='10%' style='border:0px' align='right'><input onKeyUp='formatarMoedaeAtualizarSaldo(this,{$indiceA})' align='right' class='form-control' style=' width: 100%; padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333; text-align:right;' id='saldo-{$indiceA}' name='saldo' value='{$vinculo_valor['saldo']}'  readonly></td>
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
										echo 	"<tr style='background:none;'>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><input value='Atualizar' id='atualizar' type='submit' class='btn btn-info btn-fill pull-right' style='position:relative; margin-bottom:-25px;  background:#a1e82c; border-color:#a1e82c;display:none'></td>
												</tr>
												
													</tbody>	
											</table>						
											</div>
											<hr>
												";
									?>
								</form>	
						@endif
                        </div>
				
	
						
							
						
					
						
						
						
						
					</div>
				</div>
			</div>	
		</div>
		
		
		
		
		
		
		
			
		<!--  Verifica se a unidade não foi localizada na base de dados e chama o modal -->
		@if ( $unidade_naoLocalizada == "ok" )
			<script>
				$(document).ready(function()
				{
					$('#modalUnidadeNaoLocalizada').modal({
						show: true,
					})
				});
			</script>
		@endif	
		
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

		<script>
		$(document).ready(function() {
			var totalUnidades = "<?php print $indiceA; ?>";
			for (var i = 0; i <= totalUnidades; i++)
			{
				$('#tree-'+i).treegrid({
					enableMove: true,
					onMoveOver: function(item, helper, target, position) {
						if (target.hasClass('treegrid-8')) return false;
							return true;
					}
				});
			}
		});
 
		
	
 
		</script>
		
		<script type="text/javascript">
			com_github_culmat_jsTreeTable.register(this)
		</script>
		
		
	
		
		<script>
		function estilo(x)
		{	
	
			if(x.hasAttribute("style"))
			{
				x.removeAttribute("style");
			}
			else
			{
				var unidadeOrcamentaria = x.className;
				unidadeOrcamentaria = '.'+unidadeOrcamentaria;
				$(unidadeOrcamentaria).treegrid('getBranch').css('backgroundColor', '#4082c7');
				$(unidadeOrcamentaria).treegrid('getBranch').css('color', '#fff');
				$(unidadeOrcamentaria).treegrid('getBranch').css('fontSize', 'large'); 	
			}
		}
		</script>
		
		<script>
		
			$(document).on("keypress", 'form', function (e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					e.preventDefault();
					return false;
				}
			});
		
		</script>
		
		<script type="text/javascript">
		com_github_culmat_jsTreeTable.register(this)
		treeTable($('#table'))
		</script>
			
	@endsection		
	


<script>
	
function formatarMoedaeAtualizarSaldo(x, y) 
{
	//formata os valores para unidade de moeda Real
	$(x).keyup(function(){
		var v = $(this).val();
		v=v.replace(/\D/g,'');
		v=v.replace(/(\d{1,2})$/, ',$1');  
		v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
		v = v != ''?'R$ '+v:'';
		$(this).val(v);
	
	//calcula o valor saldo
	dotacao = document.getElementById('dotacao-'+y).value;
	dotacao = dotacao.replace("R$", "");
	dotacao = dotacao.replace(".", "");
	dotacao = dotacao.replace(',', '.');
	dotacao = parseFloat(dotacao);
	empenhado = document.getElementById('empenhado-'+y).value;
	empenhado = empenhado.replace("R$", "");
	empenhado = empenhado.replace(".", "");
	empenhado = empenhado.replace(',', '.');
	empenhado = parseFloat(empenhado);
	reserva = document.getElementById('reserva-'+y).value;
	reserva = reserva.replace("R$", "");
	reserva = reserva.replace(".", "");
	reserva = reserva.replace(',', '.');
	reserva = parseFloat(reserva);
		
	saldo = dotacao - ( empenhado +  reserva);
	saldo=saldo.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('saldo-'+y).value = saldo;
	});
	
	
	
}
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
/*Pode exluir?
function submitForm(sub) {
document.forms[sub].submit();
}*/
/* Máscaras Código da Unidade Orcamentaria */
	
function mascaraCodigo(o,f){
	if (document.getElementById('filtro').value == "ORCAMENTARIA" || document.getElementById('filtro').value == "EXECUTORA" )
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
			
	//Remove tudo o que não é dígito
	v=v.replace(/\D/g,"");            
						
	//Coloca um ponto entre o terceiro e o quinto
	v=v.replace(/(\d{2})(\d)/,"$1.$2")
	//Coloca um ponto entre o quinto e o sétimo 
	v=v.replace(/(\d{2})(\d)/,"$1.$2")
	return v;
}
function informaExercicioSelecionado()
{
	document.getElementById('exercicio2').value = document.getElementById('exercicio').value;
	
}
	
	
document.addEventListener('DOMContentLoaded', function() 
	{
		//var exercicio = new Date().getFullYear()
		//$("#exercicio").attr("placeholder", exercicio);
		
		exercicio = "<?php echo $exercicio ?>";
		exercicio = parseInt(exercicio);
	
		document.getElementById('exercicio2').value = exercicio;
		
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
function ativarContinuar()
{
	if ($('#chk_aceito').is(':checked')) {
		document.getElementById("btnContinuar").disabled = false;
	}
	else{
		document.getElementById("btnContinuar").disabled = true;
	}
}
</script>

<!-- Modal Importar Dotação Atualizada-->
<div id="atualizarDotacoes" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo_dotacao', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'vinculo', 'dotacao', 'empenhado', 'saldo' e 'reserva'  na primeira linha tabela." data-balloon-pos="down" data-balloon-length='xlarge' class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;word-wrap:break-word"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo de Atualização</h5>
			</div>
			<form action="{{ route('importarAtualizarDotacaoOrcamentaria') }}" method="post" enctype="multipart/form-data"  files="true">
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



<!-- Modal Unidade não Localizada-->
<div class="modal"  id="modalUnidadeNaoLocalizada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Erro! - </b> Unidade Não Localizada </span>
		</div>
	</div>
</div>

<!-- Modal Saldo Negativo-->
<div class="modal"  id="modalSaldoNegativo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-danger" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Atenção! - </b> Empenho e/ou Reserva é/são maiores que a Dotação prevista. </span>
		</div>
	</div>
</div>

<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($verificacao == 'Sucesso')
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b>{{$mensagem}}. </span>
		</div>
		@else
		<div class="alert alert-warning" style="border-radius: 5px">
            <button type="button" aria-hidden="true" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem}}</span>
         </div>
		@endif
	</div>
</div>

<!-- Modal Atenção Risco de Exclusão de Exercicio-->
<div class="modal"  id="modalAtencaoExercicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-danger" style="border-radius: 5px">
			<br>
            <p style="text-align: center;" ><b> Atenção! - </b> 
				Ao iniciar a implementação do saldo de dotações do exercício de 
				<input id="exercicio2" class="form-control" style="all: unset; width:36px;" /> 
				você estará removendo da base de dados todo o saldo de dotações do exercício de 
				<?php 
					if(count($exercicios)>0){
						echo min($exercicios);
					} 
				?>
				!
			</p> 
			<br>
			<br> 
			<p style="text-align: center;">Tem certeza que deseja continuar?</p>
			<br>
			<br>
			<label class="container"  style="text-align: center; line-height: normal; background:none;left:0px;">
				COOMPREENDO OS RISCOS DESTA AÇÃO!
				<input type="checkbox" value="" name="" id="chk_aceito" onclick="ativarContinuar()"/>
					<span class="checkmark" style="left:140px; top:-0.5px;" ></span>
			</label>
			<br>
			<br>
			<form method="get" action="{{ route('cadastrarDotacaoOrcamentaria') }}" >
			<div class="row">
				<div class="col-md-2">
				</div>
				
				<div class="col-md-4">
					<button type="submit" id="btnContinuar" class="btn btn-info btn-fill pull-right" disabled>
						Continuar
					</button>
				</div>
		
				<div class="col-md-4">
					<button type="button" aria-hidden="true" data-dismiss="modal" class="btn btn-info btn-fill pull-left" style="background:#fc363d; border-color:#fc363d">Cancelar</button>
				</div>
				<div class="col-md-2">
				</div>
			</div>
			</form>
         </div>
		
	</div>
</div>
