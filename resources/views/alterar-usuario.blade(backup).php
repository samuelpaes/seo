@extends('layouts.app')
@section('content')
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
													<input onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="form-control" name="pre_registro"  required autofocus>
												</div>
												<div class="col-md-7" id="nome" hidden>
													<input id="nome" class="form-control" name="nome" >
												</div>
												<div class="col-md-7" id="secretaria" hidden>
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
												<div class="col-md-7" id="estado" hidden>
													<select class="form-control" name="estado">
														<option selected></option>
														<option value="1">ATIVO</option>
														<option value="0">INATIVO</option>
													</select>
												</div>
												<div class="col-md-7" id="tipoUsuario" hidden>
													<select class="form-control" name="tipoUsuário">
														<option selected></option>
														<option value="1">ADMINISTRADOR</option>
														<option value="0">COMUM</option>
													</select>
												</div>
												<div class="col-md-2">
													<button type="submit" class="btn btn-info btn-fill pull-right">Buscar</button>
												</div>	
											</div>
											<br>
										</div>	
									</div>
								</form>
							</div>
						</div>			
						
						<div class="card">
							@foreach($usuario as $usuario)
							@if($usuario['registro']   <> null)
							
							<div class="content">
								<form method="POST"  action="{{ route('update', $idRegistro=$usuario['registro'] )}}"  >
									@csrf
									@method('PUT')

									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="Estado">Estado:</label>
											<!--<input type="text" class="form-control" value="{{{ $usuario['estado'] }}}" id="situacao" name="situacao" disabled>-->
											<select class="form-control" name="estado" id="estado" disabled>
												<option value="1" selected>Ativo</option>
												<option value="0">Inativo</option>
											</select>
										</div>
									</div>
																		
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="name">Nome</label>
												<input id="name" type="text" class="form-control" name="name" value= "{{{ $usuario['name'] }}}"  autofocus disabled>

												@if ($errors->has('name'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('name') }}</strong>
													</span>
												@endif
												
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group">
												<label for="sobrenome">Sobrenome</label>
												<input type="text" class="form-control" value="{{{ $usuario['sobrenome'] }}}" id="sobrenome" name="sobrenome" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Secretaria</label>
												<select class="form-control" name="secretaria" id="secretaria" disabled>
													<option selected></option>
													<option value="Secretaria de Governo e Gestão">Secretaria de Governo e Gestão</option>
													<option value="Secretaria de Administração e Finanças">Secretaria de Administração e Finanças</option>
													<option value="Secretaria de Serviços Urbanos">Secretaria de Serviços Urbanos</option>
													<option value="Secretaria de Educação">Secretaria de Educação</option>
													<option value="Secretaria de Desenvolvimento Social">Secretaria de Desenvolvimento Social</option>
													<option value="Secretaria de Meio Ambiente">Secretaria de Meio Ambiente</option>
													<option value="Secretaria de Planejamento Urbano">Secretaria de Planejamento Urbano</option>
													<option value="Secretaria de Segurança e Cidadania">Secretaria de Segurança e Cidadania</option>
													<option value="Secretaria de Turismo, Esporte e Cultura">Secretaria de Turismo, Esporte e Cultura</option>
													<option value="Secretaria de Saúde">Secretaria de Saúde</option>
													<option value="Secretaria de Obras e Habitação">Secretaria de Obras e Habitação</option>
													<option value="Procuradoria Geral do Município">Procuradoria Geral do Município</option>
												</select>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Registro</label>
												<input type="text" name="registro" id="registro" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}"  value="{{{ $usuario['registro'] }}}" required disabled>
											</div>
										</div>
										
										<div class="col-md-3">
											<label>Nível de Acesso</label>
											<select class="form-control" name="isAdmin" id ="isAdmin" disabled>
												<option selected></option>
												<option value="0">Gestor</option>
												<option value="1">Administrador</option>
											</select>
										</div>	
									</div>

									<div class="row">
									
										<div  class="col-md-6">
											<label for="email" >Email Institucional</label>
											<input id="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{{ $usuario['email'] }}}" disabled>
											
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
									
										</div>
									
										<div class="col-md-3">
											<label for="password">Senha</label>
											
											<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" disabled>

											@if ($errors->has('password'))
												
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										
										</div>

										<div class="col-md-3">
											<label for="password-confirm">Confirmar Senha</label>
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" disabled>
										</div>  
									</div>
								<br>
								<input type="button" name="alterar" id="alterar" value="Alterar" class="btn btn-info btn-fill pull-right" onclick="ativarCamposParaEdicao()" style="background:#a1e82c; border-color:#a1e82c" >
								<div class="clearfix"></div>
								<button type="submit" name="atualizar" id="atualizar" value="Atualizar" class="btn btn-info btn-fill pull-right" style="display: none;" onclick="ativarCamposParaEdicao2()">Atualizar</button>
								<div class="clearfix"></div>	
								</form>
										
							</div>
							
						
							<!--  Verifica a qual secretaria o usuário pertence e alimenta o select -->
							@if ($usuario['secretaria']  == 'Secretaria de Governo e Gestão')
								<script>
									document.getElementById('secretaria').value='Secretaria de Governo e Gestão';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Administração e Finanças')
								<script>
									document.getElementById('secretaria').value='Secretaria de Administração e Finanças';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Serviços Urbanos')
								<script>
									document.getElementById('secretaria').value='Secretaria de Serviços Urbanos';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Educação')
								<script>
									document.getElementById('secretaria').value='Secretaria de Educação';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Desenvolvimento Social e Renda')
								<script>
									document.getElementById('secretaria').value='Secretaria de Desenvolvimento Social e Renda';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Meio Ambiente')
								<script>
									document.getElementById('secretaria').value='Secretaria de Meio Ambiente';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Planejamento Urbano')
								<script>
									document.getElementById('secretaria').value='Secretaria de Planejamento Urbano';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Segurança e Cidadania')
								<script>
									document.getElementById('secretaria').value='Secretaria de Segurança e Cidadania';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Turismo, Cultura e Esporte')
								<script>
									document.getElementById('secretaria').value='Secretaria de Turismo, Cultura e Esporte';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Saude')
								<script>
									document.getElementById('secretaria').value='Secretaria de Saude';
								</script>
							@elseif ($usuario['secretaria']  == 'Secretaria de Obras e Habitação')
								<script>
									document.getElementById('secretaria').value='Secretaria de Obras e Habitação';
								</script>
							@elseif ($usuario['secretaria']  == 'Procuradoria Geral')
								<script>
									document.getElementById('secretaria').value='Procuradoria Geral';
								</script>
							@else
							@endif	
					
						
						<!--  Verifica se o usuário é administrador e alimenta o select -->
							@if ($usuario['isAdmin']  == '0')
								<script>
									document.getElementById('isAdmin').value = '0'
								</script>
							@elseif ($usuario['isAdmin']  == '1')
								<script>
									document.getElementById('isAdmin').value = '1'
								</script>
							@else
							@endif	
							
							
							
							
							<!--Verifica se o usuário esta ativo ou inativo e manda a formatação para o select-->
							@if ($usuario['estado']  == '0')
								<script>
									document.getElementById('estado').value = '0';
									ALERT('INATIVO');
								</script>
							@elseif ($usuario['estado']  == '1')
								<script>
									document.getElementById('estado').value = '1';
									ALERT('ATIVO');
								</script>
							@else
							@endif
	
								@endif
							@endforeach	
						</div>
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
	}
	else if(opcao == "NOME"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = false;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

	}
	else if(opcao == "SECRETARIA"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = false;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;

	}
	else if(opcao == "ESTADO"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = false;
		document.getElementById('tipoUsuario').hidden = true;

	}
	else if(opcao == "TIPO DE USUÁRIO"){
		document.getElementById('registro').hidden = true;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = false;

	}
	else{
		document.getElementById('registro').hidden = false;
		document.getElementById('nome').hidden = true;
		document.getElementById('secretaria').hidden = true;
		document.getElementById('estado').hidden = true;
		document.getElementById('tipoUsuario').hidden = true;
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
</script>