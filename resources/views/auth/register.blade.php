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
										<input id="name" style="text-transform: uppercase;" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
										<input type="text" class="form-control" value="" style="text-transform: uppercase;" name="sobrenome">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Secretaria</label>
										<select class="form-control" name="secretaria" id="secretaria">
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
										<option value="0">GESTOR</option>
										<option value="1">ADMINISTRADOR</option>
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

