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
								<form method="GET" action="{{ route('show') }}">
									<div class="row" >
										<div class="col-md-4">
											<h4 class="title">Alterar Usuário</h4>
										</div>
										<div class="col-md-8">
											<div class="row" >
												<div class="col-md-3" >
													<select class="form-control" id="tipoPesquisa" onclick="filtroPesquisa()">
														<option value="" <?php if ($filtro == '' ) echo ' selected="selected"'?>></OPTION>
														<option value="REGISTRO" <?php if ($filtro == 'REGISTRO') echo ' selected="selected"'?>>REGISTRO</OPTION>
														<option value="NOME" <?php if ($filtro == 'NOME') echo ' selected="selected"'?>>NOME</OPTION>
														<option value="SECRETARIA" <?php if ($filtro == 'SECRETARIA') echo ' selected="selected"'?>>SECRETARIA</OPTION>
														<option value="STATUS" <?php if ($filtro == 'STATUS') echo ' selected="selected"'?> >STATUS</OPTION>
														<option value="TIPO DE USUÁRIO" <?php if ($filtro == 'TIPO_USUARIO') echo ' selected="selected"'?>>TIPO DE USUÁRIO</OPTION>
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
												<div class="col-md-7" id="status" hidden>
													<select class="form-control" name="status" onclick="ativarPesquisar()">
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
										<th>Sobrenome</th>
										<th>Registro</th>
										<th>Email</th>
										<th>Tipo de Usuário</th>
										<th>Status</th>
                               		</tr>
								</thead>
								<form method="post" action="{{ route('atualizarUsuario') }}">
								@csrf
								@method('POST')	
                                <tbody>
								
								@foreach($usuarios as $usuario)
									<tr>
										<td style="width:3%">
											<button class='btnEdicao' type='button' data-hover='Cancelar' id="cancelar-{{$usuario['registro']}}" style='margin-right:-5px;left:0px; display: none;' onclick="cancelarUsuario({{$usuario['registro']}})"><div><i class='fa fa-times'></i></div></button>
											<button class='btnEdicao' type='button' data-hover='Salvar'  id="salvar-{{$usuario['registro']}}" style='margin:-5px;left:5px; display: none;' onclick="salvarUsuario({{$usuario['registro']}})"><div><i class='fa fa-check'></i></div></button> 
											<button class='btnEdicao' type='button' data-hover='Alterar' id="alterar-{{$usuario['registro']}}" style='margin-left:-5px; left:4px;' onclick="alterarUsuario({{$usuario['registro']}})"><div><i class='fa fa-pencil'></i></div></button>
										</td>
										<td style="width: 30%">
											<select class="form-control" name="secretaria[]" align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;-moz-appearance: none;-webkit-appearance: none;' id="secretaria-{{$usuario['registro']}}" name='secretaria'  readonly>
												<option <?php if ($usuario['secretaria'] == '') echo ' selected="selected"'; ?>></option>
												<option value="SECRETARIA DE GOVERNO E GESTÃO" <?php if ($usuario['secretaria'] == 'SECRETARIA DE GOVERNO E GESTÃO') echo ' selected="selected"'?>>SECRETARIA DE GOVERNO E GESTÃO</option>
												<option value="SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS" <?php if ($usuario['secretaria'] == 'SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS') echo ' selected="selected"'?>>SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS</option>
												<option value="SECRETARIA DE SERVIÇOS URBANOS" <?php if ($usuario['secretaria'] == 'SECRETARIA DE SERVIÇOS URBANOS') echo ' selected="selected"'?>>SECRETARIA DE SERVIÇOS URBANOS</option>
												<option value="SECRETARIA DE EDUCAÇÃO" <?php if ($usuario['secretaria'] == 'SECRETARIA DE EDUCAÇÃO') echo ' selected="selected"'?>>SECRETARIA DE EDUCAÇÃO</option>
												<option value="SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA" <?php if ($usuario['secretaria'] == 'SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA') echo ' selected="selected"'?>>SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA</option>
												<option value="SECRETARIA DE MEIO AMBIENTE" <?php if ($usuario['secretaria'] == 'SECRETARIA DE MEIO AMBIENTE') echo ' selected="selected"'?>>SECRETARIA DE MEIO AMBIENTE</option>
												<option value="SECRETARIA DE PLANEJAMENTO URBANO" <?php if ($usuario['secretaria'] == 'SECRETARIA DE PLANEJAMENTO URBANO') echo ' selected="selected"'?>>SECRETARIA DE PLANEJAMENTO URBANO</option>
												<option value="SECRETARIA DE SEGURANÇA E CIDADANIA" <?php if ($usuario['secretaria'] == 'SECRETARIA DE SEGURANÇA E CIDADANIA') echo ' selected="selected"'?>>SECRETARIA DE SEGURANÇA E CIDADANIA</option>
												<option value="SECRETARIA DE TURISMO, ESPORTE E CULTURA" <?php if ($usuario['secretaria'] == 'SECRETARIA DE TURISMO, ESPORTE E CULTURA') echo ' selected="selected"'?>>SECRETARIA DE TURISMO, ESPORTE E CULTURA</option>
												<option value="SECRETARIA DE SAÚDE" <?php if ($usuario['secretaria'] == 'SECRETARIA DE SAÚDE') echo ' selected="selected"'?>>SECRETARIA DE SAÚDE</option>
												<option value="SECRETARIA DE OBRAS E HABITAÇÃO" <?php if ($usuario['secretaria'] == 'SECRETARIA DE OBRAS E HABITAÇÃO') echo ' selected="selected"'?>>SECRETARIA DE OBRAS E HABITAÇÃO</option>
												<option value="PROCURADORIA GERAL DO MUNICÍPIO" <?php if ($usuario['secretaria'] == 'PROCURADORIA GERAL DO MUNICÍPIO') echo ' selected="selected"'?>>PROCURADORIA GERAL DO MUNICÍPIO</option>
											</select>
										</td>
										<td style="width: 10%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;text-transform: uppercase;' id="nome-{{$usuario['registro']}}" name='nome[]' value="{{$usuario['name']}}" readonly></td>
										<td style="width: 20%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;text-transform: uppercase;' id="sobrenome-{{$usuario['registro']}}" name='sobrenome[]' value="{{$usuario['sobrenome']}}" readonly></td>
										<td style="width: 8%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;text-transform: uppercase;' id="registro-{{$usuario['registro']}}" name='registro[]' value="{{$usuario['registro']}}" readonly></td>
										<td style="width: 25%"><input align='right' class='form-control' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;text-transform: uppercase;' id="email-{{$usuario['registro']}}" name='email[]' value="{{$usuario['email']}}" readonly></td>
										<td style="width: 8%">
											<select class="form-control" name="isAdmin[]"  id="isAdmin-{{$usuario['registro']}}" name='isAdmin[]' style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;-moz-appearance: none;-webkit-appearance: none;' id="status-{{$usuario['registro']}}" onclick="ativarPesquisar()" readonly>
												<option <?php if($usuario['status'] == '') echo 'selected="selected"' ?>></option>
												<option value="1" <?php if($usuario['isAdmin'] == 1) echo 'selected="selected"' ?>>ADMINISTRADOR</option>
												<option value="0" <?php if($usuario['isAdmin'] == 0) echo 'selected="selected"' ?>>GESTOR</option>
											</select>
										</td>
										<td style="width: 8%">
											<select class="form-control" name="status[]" style='padding: 0px; margin: 0px; background: none; border:none; font-size:16px; color:#333333;-moz-appearance: none;-webkit-appearance: none;' id="status-{{$usuario['registro']}}" onclick="ativarPesquisar()" readonly>
												<option <?php if($usuario['status'] == '') echo 'selected="selected"' ?>></option>
												<option value="1" <?php if($usuario['status'] == 0) echo 'selected="selected"' ?>>ATIVO</option>
												<option value="0" <?php if($usuario['status'] == 1) echo 'selected="selected"' ?>>INATIVO</option>
											</select>
										</td>	
                                    </tr>
								
									@endforeach
									<tr style='background:none;'>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><input value='Atualizar' id='btnAtualizar' type='submit' class='btn btn-info btn-fill pull-right' style='position:relative; margin-bottom:-25px;  background:#a1e82c; border-color:#a1e82c; display:none'></td>
									</tr>
                                </tbody>
								</form>
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
		@if ( $usuario_atualizado == "ok" )
			<script>
				$(document).ready(function()
				{
					$('#modalAtualizadoComSucesso').modal({
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
		<div class="alert alert-warning" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Atenção! - </b> Usuário sem permissão de acesso. Contate o administrador do sistema. </span>
		</div>
	</div>
</div>


<!-- Modal Cadastrado com Sucesso -->
<div class="modal"  id="modalAtualizadoComSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b> Usuário atualizado concluído com sucesso. </span>
		</div>
	</div>
</div>

<!-- Modal Usuário não Localizado-->
<div class="modal"  id="modalUsuarioNaoLocalizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		<div class="alert alert-warning" style="border-radius: 5px">
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
		document.getElementById('status').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "REGISTRO";
	}
	else if(opcao == "NOME"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = false;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('status').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "NOME";

	}
	else if(opcao == "SECRETARIA"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = false;
		document.getElementById('status').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "SECRETARIA";

	}
	else if(opcao == "STATUS"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('status').hidden = false;
		document.getElementById('tipoUsuario').hidden = true;

		document.getElementById('filtro').value = "STATUS";

	}
	else if(opcao == "TIPO DE USUÁRIO"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('status').hidden = true;
		document.getElementById('tipoUsuario').hidden = false;

		document.getElementById('filtro').value = "TIPO_USUARIO";

	}
	else{
		document.getElementById('registro').hidden = false;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('status').hidden = true;
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
		document.getElementById('status').disabled = false;
		document.getElementById('isAdmin').disabled = false;
	}
	function ativarCamposParaEdicao2() 
	{	
		document.getElementById('email').disabled = false;
		document.getElementById('registro').disabled = false;
	}

function alterarUsuario(x)
{
	
	secretaria_anterior = document.getElementById('secretaria-'+x).value;
	nome_anterior = document.getElementById('nome-'+x).value;
	sobrenome_anterior = document.getElementById('sobrenome-'+x).value;
	registro_anterior = document.getElementById('registro-'+x).value;
	email_anterior = document.getElementById('email-'+x).value;
	isAdmin_anterior = document.getElementById('isAdmin-'+x).value;
	estado_anterior = document.getElementById('status-'+x).value;

	document.getElementById('secretaria-'+x).readOnly = false;
	document.getElementById('secretaria-'+x).style.background = "#fff";
	document.getElementById('secretaria-'+x).style.textAlign = "center";
	document.getElementById('secretaria-'+x).style.removeProperty('border');
	document.getElementById('secretaria-'+x).style.MozAppearance = "";
	document.getElementById('secretaria-'+x).style.webkitAppearance = "";

	document.getElementById('nome-'+x).readOnly = false;
	document.getElementById('nome-'+x).style.background = "#fff";
	document.getElementById('nome-'+x).style.textAlign = "center";
	document.getElementById('nome-'+x).style.removeProperty('border');
	
	document.getElementById('sobrenome-'+x).readOnly = false;
	document.getElementById('sobrenome-'+x).style.background = "#fff";
	document.getElementById('sobrenome-'+x).style.textAlign = "center";
	document.getElementById('sobrenome-'+x).style.removeProperty('border');
	
	document.getElementById('registro-'+x).readOnly = false;
	document.getElementById('registro-'+x).style.background = "#fff";
	document.getElementById('registro-'+x).style.textAlign = "center";
	document.getElementById('registro-'+x).style.removeProperty('border');
	
	document.getElementById('email-'+x).readOnly = false;
	document.getElementById('email-'+x).style.background = "#fff";
	document.getElementById('email-'+x).style.textAlign = "center";
	document.getElementById('email-'+x).style.removeProperty('border');
	
	document.getElementById('isAdmin-'+x).readOnly = false;
	document.getElementById('isAdmin-'+x).style.background = "#fff";
	document.getElementById('isAdmin-'+x).style.textAlign = "center";
	document.getElementById('isAdmin-'+x).style.removeProperty('border');
	document.getElementById('isAdmin-'+x).style.MozAppearance = "";
	document.getElementById('isAdmin-'+x).style.webkitAppearance = "";
	
	document.getElementById('status-'+x).readOnly = false;
	document.getElementById('status-'+x).style.background = "#fff";
	document.getElementById('status-'+x).style.textAlign = "center";
	document.getElementById('status-'+x).style.removeProperty('border');
	document.getElementById('status-'+x).style.MozAppearance = "";
	document.getElementById('status-'+x).style.webkitAppearance = "";
	
	document.getElementById('salvar-'+x).style.removeProperty('display');
	document.getElementById('cancelar-'+x).style.removeProperty('display');
	document.getElementById('alterar-'+x).style.display = "none";
}

function cancelarUsuario(x)
{
	document.getElementById('secretaria-'+x).value = secretaria_anterior ;
	document.getElementById('nome-'+x).value = nome_anterior;
	document.getElementById('sobrenome-'+x).value = sobrenome_anterior;
	document.getElementById('registro-'+x).value = registro_anterior;
	document.getElementById('email-'+x).value = email_anterior;
	document.getElementById('isAdmin-'+x).value = isAdmin_anterior;
	document.getElementById('status-'+x).value = estado_anterior;
	
	document.getElementById('secretaria-'+x).readOnly = true;
	document.getElementById('secretaria-'+x).style.background = "none";
	document.getElementById('secretaria-'+x).style.textAlign = "right";
	document.getElementById('secretaria-'+x).style.border = "none";
	document.getElementById('secretaria-'+x).style.MozAppearance = "none";
	document.getElementById('secretaria-'+x).style.webkitAppearance = "none";

	document.getElementById('nome-'+x).readOnly = true;
	document.getElementById('nome-'+x).style.background = "none";
	document.getElementById('nome-'+x).style.textAlign = "right";
	document.getElementById('nome-'+x).style.border = "none";
	document.getElementById('nome-'+x).style.textAlign = "left";
	
	document.getElementById('sobrenome-'+x).readOnly = true;
	document.getElementById('sobrenome-'+x).style.background = "none";
	document.getElementById('sobrenome-'+x).style.textAlign = "right";
	document.getElementById('sobrenome-'+x).style.border = "none";
	document.getElementById('sobrenome-'+x).style.textAlign = "left";
	
	document.getElementById('registro-'+x).readOnly = true;
	document.getElementById('registro-'+x).style.background = "none";
	document.getElementById('registro-'+x).style.textAlign = "right";
	document.getElementById('registro-'+x).style.border = "none";
	document.getElementById('registro-'+x).style.textAlign = "left";
	
	document.getElementById('email-'+x).readOnly = true;
	document.getElementById('email-'+x).style.background = "none";
	document.getElementById('email-'+x).style.textAlign = "right";
	document.getElementById('email-'+x).style.border = "none";
	document.getElementById('email-'+x).style.textAlign = "left";
	
	document.getElementById('isAdmin-'+x).readOnly = true;
	document.getElementById('isAdmin-'+x).style.background = "none";
	document.getElementById('isAdmin-'+x).style.textAlign = "right";
	document.getElementById('isAdmin-'+x).style.border = "none";
	document.getElementById('isAdmin-'+x).style.MozAppearance = "none";
	document.getElementById('isAdmin-'+x).style.webkitAppearance = "none";
	
	document.getElementById('status-'+x).readOnly = true;
	document.getElementById('status-'+x).style.background = "none";
	document.getElementById('status-'+x).style.textAlign = "right";
	document.getElementById('status-'+x).style.border = "none";
	document.getElementById('status-'+x).style.MozAppearance = "none";
	document.getElementById('status-'+x).style.webkitAppearance = "none";

	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');
}

function salvarUsuario(x)
{
	secretaria = document.getElementById('secretaria-'+x).value;
	nome = document.getElementById('nome-'+x).value;
	sobrenome = document.getElementById('sobrenome-'+x).value;
	registro = document.getElementById('registro-'+x).value;
	email = document.getElementById('email-'+x).value;
	isAdmin = document.getElementById('isAdmin-'+x).value;
	estado = document.getElementById('status-'+x).value;
	
	document.getElementById('secretaria-'+x).readOnly = true;
	document.getElementById('secretaria-'+x).style.background = "none";
	document.getElementById('secretaria-'+x).style.textAlign = "right";
	document.getElementById('secretaria-'+x).style.border = "none";
	document.getElementById('secretaria-'+x).style.MozAppearance = "none";
	document.getElementById('secretaria-'+x).style.webkitAppearance = "none";

	document.getElementById('nome-'+x).readOnly = true;
	document.getElementById('nome-'+x).style.background = "none";
	document.getElementById('nome-'+x).style.textAlign = "right";
	document.getElementById('nome-'+x).style.border = "none";
	document.getElementById('nome-'+x).style.textAlign = "left";
	
	document.getElementById('sobrenome-'+x).readOnly = true;
	document.getElementById('sobrenome-'+x).style.background = "none";
	document.getElementById('sobrenome-'+x).style.textAlign = "right";
	document.getElementById('sobrenome-'+x).style.border = "none";
	document.getElementById('sobrenome-'+x).style.textAlign = "left";
	
	document.getElementById('registro-'+x).readOnly = true;
	document.getElementById('registro-'+x).style.background = "none";
	document.getElementById('registro-'+x).style.textAlign = "right";
	document.getElementById('registro-'+x).style.border = "none";
	document.getElementById('registro-'+x).style.textAlign = "left";
	
	document.getElementById('email-'+x).readOnly = true;
	document.getElementById('email-'+x).style.background = "none";
	document.getElementById('email-'+x).style.textAlign = "right";
	document.getElementById('email-'+x).style.border = "none";
	document.getElementById('email-'+x).style.textAlign = "left";
	
	document.getElementById('isAdmin-'+x).readOnly = true;
	document.getElementById('isAdmin-'+x).style.background = "none";
	document.getElementById('isAdmin-'+x).style.textAlign = "right";
	document.getElementById('isAdmin-'+x).style.border = "none";
	document.getElementById('isAdmin-'+x).style.MozAppearance = "none";
	document.getElementById('isAdmin-'+x).style.webkitAppearance = "none";
	
	document.getElementById('status-'+x).readOnly = true;
	document.getElementById('status-'+x).style.background = "none";
	document.getElementById('status-'+x).style.textAlign = "right";
	document.getElementById('status-'+x).style.border = "none";
	document.getElementById('status-'+x).style.MozAppearance = "none";
	document.getElementById('status-'+x).style.webkitAppearance = "none";

	document.getElementById('salvar-'+x).style.display = "none";
	document.getElementById('cancelar-'+x).style.display = "none";
	document.getElementById('alterar-'+x).style.removeProperty('display');

	document.getElementById('btnAtualizar').style.removeProperty('display');
}
</script>