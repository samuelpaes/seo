@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						<div class="row">
							<div class="col-md-8">
								<h4 class="title">Cadastrar Usuário</h4>
							</div>
							<div class="col-md-4">
							</div>
						</div>
                    </div>
                    <div class="content">
						<form method="POST" action="{{ route('register') }}">
                            @csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Nome</label>
										<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
										<input type="text" class="form-control" value="" name="sobrenome">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Secretaria</label>
										<select class="form-control" name="secretaria" id="secretaria">
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
										<input type="text" name="registro" id="registro" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}" required autofocus>
										
										@if ($errors->has('registro'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('registro') }}</strong>
											</span>
										@endif
										
									</div>
								</div>
										
										
								
								<div class="col-md-3">
									<label>Nível de Acesso</label>
									<select class="form-control" name="isAdmin">
										<option selected></option>
										<option value="0">Gestor</option>
										<option value="1">Administrador</option>
									</select>
								</div>	
							</div>

							<div class="row">
                            
								<div  class="col-md-6">
									<label for="email" >Email Institucional</label>
									<input id="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>
											
									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
									
								</div>
							
								<div class="col-md-3">
									<label for="password">Senha</label>
									
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								
								</div>

								<div class="col-md-3">
									<label for="password-confirm">Confirmar Senha</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								</div>  
							</div>
							<br>
							<button type="submit" class="btn btn-info btn-fill pull-right" style="background:#ffbc67; border-color:#ffbc67">Cadastrar</button>
							<div class="clearfix"></div>
						</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection

