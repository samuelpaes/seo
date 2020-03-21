@extends('layouts.app')
@section('content')
<script>
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
</script>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<form method="GET" action="{{ route('show') }}">
									<div class="row" >
										<div class="col-md-4">
											<h4 class="title">Alterar Usuário</h4>
										</div>
										<div class="col-md-8">
											<div class="row" >
												<div class="col-md-3" >
													<select class="form-control" id="tipoPesquisa" onclick="filtroPesquisa()">
														<option value="REGISTRO" selected>REGISTRO</OPTION>
														<option value="NOME">NOME</OPTION>
														<option value="SECRETARIA">SECRETARIA</OPTION>
														<option value="ESTADO">ESTADO</OPTION>
														<option value="TIPO DE USUÁRIO">TIPO DE USUÁRIO</OPTION>
													</select>
												</div>
												<div class="col-md-7" id="registro">
													<input onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="form-control" name="pre_registro" autofocus>
												</div>
												<div class="col-md-7" id="nome" hidden>
													<input class="form-control" name="nome" onclick="ativarPesquisar()">
												</div>
												<div class="col-md-7" id="secretaria" hidden>
													<select class="form-control" name="secretaria" onclick="ativarPesquisar()">
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
												<div class="col-md-7" id="estado" hidden>
													<select class="form-control" name="estado" onclick="ativarPesquisar()">
														<option selected></option>
														<option value="1">ATIVO</option>
														<option value="0">INATIVO</option>
													</select>
												</div>
												<div class="col-md-7" id="tipoUsuario" hidden>
													<select class="form-control" name="tipoUsuario" onclick="ativarPesquisar()">
														<option selected></option>
														<option value="1">ADMINISTRADOR</option>
														<option value="0">COMUM</option>
													</select>
												</div>
												<div class="col-md-2">
													<input name="filtro" id="filtro" hidden onclick="ativarPesquisar()"></input>
													<button type="submit" class="btn btn-info btn-fill pull-right" id="btnPesquisar" >Pesquisar</button>
												</div>	
											</div>
											<br>
										</div>	
									</div>
								</form>
							</div>
						</div>	
						@if($pesquisaFeita == "ok")		
						<div class="card">
                        <!--<div class="header">
                             <h4 class="title">Striped Table with Hover</h4>
                             <p class="category">Here is a subtitle for this table</p>
                        </div>-->
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
										<th></th>
										<th>Secretaria</th>
										<th>Nome</th>
										<th>Registro</th>
										<th>Email</th>
										<th>Tipo de Usuário</th>
										<th>Estado</th>
                               		</tr>
								</thead>
                                <tbody>
								@foreach($usuarios as $j => $value)
									@foreach($value as $usuario)
									<tr>
										<td>
											<button class='btnEdicao' type='button' data-hover='Cancelar' id="cancelar-{{$usuario['registro']}}" style='margin-right:-5px;left:0px; display: none;' onclick='cancelar()'><div><i class='fa fa-times'></i></div></button>
											<button class='btnEdicao' type='button' data-hover='Salvar'  id="salvar-{{$usuario['registro']}}" style='margin:-5px;left:2px; display: none;' onclick='salvar()'><div><i class='fa fa-check'></i></div></button> 
											<button class='btnEdicao' type='button' data-hover='Alterar' id="alterar-{{$usuario['registro']}}" style='margin-left:-5px; left:4px;' onclick='alterar()'><div><i class='fa fa-pencil'></i></div></button>
										</td>
										<td style="width: 35%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="secretaria-{{$usuario['registro']}}" name='secretaria' value="{{$usuario['secretaria']}}" disabled></td>
										<td style="width: 25%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="nome-{{$usuario['registro']}}" name='nome' value="{{$usuario['name']}} {{$usuario['sobrenome']}}" disabled></td>
										<td style="width: 8%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="registro-{{$usuario['registro']}}" name='registro' value="{{$usuario['registro']}}" disabled></td>
										<td style="width: 25%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="email-{{$usuario['registro']}}" name='email' value="{{$usuario['email']}}" disabled></td>
										<td style="width: 8%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="isAdmin-{{$usuario['registro']}}" name='isAdmin' value="{{$usuario['isAdmin']}}" disabled></td>
										<td style="width: 8%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;' id="estado-{{$usuario['registro']}}" name='isAdmin' value="{{$usuario['estado']}}" disabled></td>
										
										<!--<td>{{$usuario['secretaria']}}</td>
										<td>{{$usuario['name']}} {{$usuario['sobrenome']}}</td>
										<td>{{$usuario['registro']}}</td>
                                       	<td>{{$usuario['email']}}</td>
                                       	<td>{{$usuario['isAdmin']}}</td>
										<td>{{$usuario['estado']}}</td>-->
                                    </tr>
									@endforeach
								@endforeach
                                </tbody>
							</table>
							
    						
                        </div>
						@endif 
					</div>
					</div>	
				</div>
			</div>	
		</div>
		
		<script>
		$('#atualizar, #alterar').click(function () {
		   if (this.id == 'alterar') {
			//alert('Submit 1 clicked');
			  $("#atualizar").attr({
			"style" : "background:#ffbc67; border-color:#ffbc67",
			});
			$("#alterar").attr({
			"style" : "display: none;",
			});
		   }
		   else if (this.id == 'alterar') {
			  alert('Submit 2 clicked');
		   }
		});
		</script>
			
		<script>
		$(document).ready(function () {
			$('pre code').each(function (i, block) {
				hljs.highlightBlock(block);
			});

			$('#email').autoEmail(
				[
					'bertioga.sp.gov.br'
				],
				'bertioga.sp.gov.br'
			)
		});
		</script>
	

		<!--  Verifica se o usuário foi cadastrado com suceso e chama o modal -->
		@if ( $usuario_cadastrado == "ok" )
			<script>
				$(document).ready(function()
				{
					$('#modalCadastroComSucesso').modal({
						show: true,
					})
				});
			</script>
		@endif	

		<!--  Verifica se o usuário não foi localizado na base de dados e chama o modal -->
		@if ( $usuario_naoLocalizado == "ok" )
			<script>
				$(document).ready(function()
				{
					$('#modalUsuarioNaoLocalizado').modal({
						show: true,
					})
				});
			</script>
		@endif	
	
@endsection	





<!--  Modal Usuário Sem Acesso -->
<div class="modal"  id="modalUsuarioSemAcesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Atenção! - </b> Usuário sem permissão de acesso. Contate o administrador do sistema. </span>
		</div>
	</div>
</div>


<!-- Modal Cadastrado com Sucesso -->
<div class="modal"  id="modalCadastroComSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b> Cadastro de usuário concluído com sucesso. </span>
		</div>
	</div>
</div>

<!-- Modal Usuário não Localizado-->
<div class="modal"  id="modalUsuarioNaoLocalizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Erro! - </b> Usuário não Localizado. </span>
		</div>
	</div>
</div>



<!--Habilita campos 'Input' para alteração -->
<script>

/*function ativarPesquisar()
{

	if(document.getElementById="")

}*/

function filtroPesquisa()
{
	var e = document.getElementById("tipoPesquisa");
	var opcao = e.options[e.selectedIndex].value;
	
	if(opcao == "REGISTRO"){

		document.getElementById('registro').hidden = false;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "REGISTRO";
	}
	else if(opcao == "NOME"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = false;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "NOME";

	}
	else if(opcao == "SECRETARIA"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = false;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "SECRETARIA";

	}
	else if(opcao == "ESTADO"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = false;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "ESTADO";

	}
	else if(opcao == "TIPO DE USUÁRIO"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = false;

		document.getElementById('filtro').value = "TIPO_USUARIO";

	}
	else{
		document.getElementById('registro').hidden = false;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "TODOS";
	}

}

function ativarCamposParaEdicao() 
	{
		document.getElementById('name').disabled = false;
		document.getElementById('sobrenome').disabled = false;
		document.getElementById('secretaria').disabled = false;
		document.getElementById('password').disabled = false;
		document.getElementById('password-confirm').disabled = false;
		document.getElementById('estado').disabled = false;
		document.getElementById('isAdmin').disabled = false;
	}
	function ativarCamposParaEdicao2() 
	{	
		document.getElementById('email').disabled = false;
		document.getElementById('registro').disabled = false;
	}

	function alterar(x)
{
	return(x);
	dotacao_anterior = document.getElementById('dotacao-'+x).value;
	empenhado_anterior = document.getElementById('empenhado-'+x).value;
	reserva_anterior = document.getElementById('reserva-'+x).value;
	saldo_anterior = document.getElementById('saldo-'+x).value;

	/*document.getElementById('dotacao-'+x).disabled = false;
	document.getElementById('dotacao-'+x).style.background = "#fff";
	document.getElementById('dotacao-'+x).style.textAlign = "center";
	document.getElementById('dotacao-'+x).style.removeProperty('border');

	document.getElementById('empenhado-'+x).disabled = false;
	document.getElementById('empenhado-'+x).style.background = "#fff";
	document.getElementById('empenhado-'+x).style.textAlign = "center";
	document.getElementById('empenhado-'+x).style.removeProperty('border');
	
	document.getElementById('reserva-'+x).disabled = false;
	document.getElementById('reserva-'+x).style.background = "#fff";
	document.getElementById('reserva-'+x).style.textAlign = "center";
	document.getElementById('reserva-'+x).style.removeProperty('border');
	
	document.getElementById('codigo_vinculo-'+x).disabled = false;
	document.getElementById('codigo_dotacao-'+x).disabled = false;
	document.getElementById('salvar-'+x).style.removeProperty('display');
	document.getElementById('cancelar-'+x).style.removeProperty('display');
	document.getElementById('alterar-'+x).style.display = "none";*/
}

function cancelar(x)
{
	document.getElementById('dotacao-'+x).value = dotacao_anterior;
	document.getElementById('empenhado-'+x).value = empenhado_anterior;
	document.getElementById('reserva-'+x).value = reserva_anterior;
	document.getElementById('saldo-'+x).value = saldo_anterior;
	
	document.getElementById('dotacao-'+x).disabled = true;
	document.getElementById('dotacao-'+x).style.background = "none";
	document.getElementById('dotacao-'+x).style.textAlign = "right";
	document.getElementById('dotacao-'+x).style.border = "none";

	document.getElementById('empenhado-'+x).disabled = true;
	document.getElementById('empenhado-'+x).style.background = "none";
	document.getElementById('empenhado-'+x).style.textAlign = "right";
	document.getElementById('empenhado-'+x).style.border = "none";
	
	document.getElementById('reserva-'+x).disabled = true;
	document.getElementById('reserva-'+x).style.background = "none";
	document.getElementById('reserva-'+x).style.textAlign = "right";
	document.getElementById('reserva-'+x).style.border = "none";

	document.getElementById('saldo-'+x).disabled = true;
	document.getElementById('saldo-'+x).style.background = "none";
	document.getElementById('saldo-'+x).style.textAlign = "right";
	document.getElementById('saldo-'+x).style.border = "none";
	
	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');
}

function salvar(x)
{
	saldo = document.getElementById('saldo-'+x).value;
	saldo = saldo.replace("R$", "");
	
	if (saldo.includes("-") == true)
	{
		
		$("#modalSaldoNegativo").modal({
		show: true
		});
		
	}
	else
	{
	document.getElementById('dotacao-'+x).readOnly = true;
	document.getElementById('dotacao-'+x).style.background = "none";
	document.getElementById('dotacao-'+x).style.textAlign = "right";
	document.getElementById('dotacao-'+x).style.border = "none";


	document.getElementById('empenhado-'+x).readOnly = true;
	document.getElementById('empenhado-'+x).style.background = "none";
	document.getElementById('empenhado-'+x).style.textAlign = "right";
	document.getElementById('empenhado-'+x).style.border = "none";

	
	document.getElementById('reserva-'+x).readOnly = true;
	document.getElementById('reserva-'+x).style.background = "none";
	document.getElementById('reserva-'+x).style.textAlign = "right";
	document.getElementById('reserva-'+x).style.border = "none";


	document.getElementById('saldo-'+x).readOnly = true;
	document.getElementById('saldo-'+x).style.background = "none";
	document.getElementById('saldo-'+x).style.textAlign = "right";
	document.getElementById('saldo-'+x).style.border = "none";

	
	document.getElementById('dotacao-'+x).value = dotacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('empenhado-'+x).value = empenhado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('reserva-'+x).value = reserva.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	document.getElementById('saldo-'+x).value = saldo.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	
	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');
	
	document.getElementById('atualizar').style.display = '';
	
	}
}
</script>