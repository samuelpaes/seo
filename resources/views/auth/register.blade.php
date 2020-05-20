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
</style>
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
								<!--<div class="col-lg-5" >
									<div class="form-group" style=" white-space: nowrap;">
										<label>Secretaria</label>
										<select class="form-control" id="secretaria">
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
								<div class="col-md-1">
									<div class="form-group" style=" white-space: nowrap;">
										<label><input style="border:none; background-color: transparent;" hidden></input></label>
										<button type="button" class="btn btn-info btn-fill pull-right" style="position:relative;top:-5px;" onclick="vincularSecretaria()">Incluir</button>
									</div>
								</div>-->
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
										<option value="0">ADMINISTRADOR</option>
										<option value="1">SECRETARIO</option>
										<option value="2">GESTOR</option>
										<option value="3">COMUM</option>
									</select>
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

							
							<!--<div class="row">
								<div class="col-md-12">
									<input class="form-control" style="border:none; background-color: transparent;" name="secretaria[]" id="secretaria2"></input>
								</div>
							</div>-->

							<div class="row">
                            
								<div  class="col-md-12">
									<label for="email" >Email Institucional</label>
									<input id="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>
											
									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
									
								</div>
							
								
							</div>

							<br>
							<hr>
							<br>
							
							<div class="row">
								<div class="col-md-8">
									<h4 class="title">Vincular Secretaria</h4>
								</div>
								<div class="col-md-4">
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-5">
									<div class="form-group" style=" white-space: nowrap;">
										<label>Secretaria</label>
										<select class="form-control" id="secretaria">
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
								<div class="col-md-1">
									<div class="form-group" style=" white-space: nowrap;">
										<label><input style="border:none; background-color: transparent;" hidden></input></label>
										<button type="button" class="btn btn-info btn-fill pull-right" style="position:relative;top:-5px;" onclick="vincularSecretaria()">+</button>
									</div>
								</div>
								<div class="col-md-3">
								</div>
							</div>
							<div class="row">
								<table id="tabela_secretarias"  align="center" face="arial" style="width:800px" >
									<tbody>
										
									</tbody>
								</table>
							</div>

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


	function vincularSecretaria()
	{

		var e = document.getElementById("secretaria");
		var opcao = e.options[e.selectedIndex].value;
		//document.getElementById('secretaria2').value = opcao;

		
		var local=document.getElementById('tabela_secretarias');
		tblBody = local.tBodies[0];
		var newRow1 = tblBody.insertRow(-1);
		var newCell0 = newRow1.insertCell(0);
		newCell0.innerHTML = '<td width= "30px" align="center"><button type="button" onclick="removerLinha(this)"><div><i style="color:red;font-weight:bold; font-size:18px;" class="pe-7s-close"></i></div></button></td>';
		var newCell1 = newRow1.insertCell(1);
		newCell1.innerHTML = '<td width= "300px"  align="right"><input style="border:none" name="secretaria[]" class="form-control" value="'+opcao+'"></input></td>';
		

	}

	function removerLinha(obj){
 
	// Capturamos a referência da TR (linha) pai do objeto
	var objTR = obj.parentNode.parentNode;
	// Capturamos a referência da TABLE (tabela) pai da linha
	var objTable = objTR.parentNode;
	// Capturamos o índice da linha
	var indexTR = objTR.rowIndex;
	// Chamamos o método de remoção de linha nativo do JavaScript, passando como parâmetro o índice da linha  
	objTable.deleteRow(indexTR);

	} 
	</script>
@endsection

