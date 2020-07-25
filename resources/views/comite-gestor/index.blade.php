@extends('layouts.app')
	@section('content')	
	<style>
	
	.organigrama * {
  margin: 0px;
  padding: 0px;
}

.organigrama ul {
	padding-top: 20px;
  position: relative;
}

.organigrama li {
	float: left;
  text-align: center;
	list-style-type: none;
	padding: 20px 5px 0px 5px;
  position: relative;
}

.organigrama li::before, .organigrama li::after {
	content: '';
	position: absolute;
  top: 0px;
  right: 50%;
	border-top: 2px solid #3788d8;
	width: 50%;
  height: 20px;
}

.organigrama li::after{
	right: auto;
  left: 50%;
	border-left: 2px solid #3788d8;
}

.organigrama li:only-child::before, .organigrama li:only-child::after {
	display: none;
}

.organigrama li:only-child {
  padding-top: 0;
}

.organigrama li:first-child::before, .organigrama li:last-child::after{
	border: 0 none;
}

.organigrama li:last-child::before{
	border-right: 2px solid #3788d8;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
	border-radius: 0 5px 0 0;
}

.organigrama li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

.organigrama ul ul::before {
	content: '';
	position: absolute;
  top: 0;
  left: 50%;
	border-left: 2px solid #3788d8;
	width: 0;
  height: 20px;
}

.organigrama li a {
	border: 2px solid #3788d8;
	padding: 1em 0.75em;
	text-decoration: none;
	color: #333;
  background-color: rgba(255,255,255,0.5);
	font-family: arial, verdana, tahoma;
	font-size: 0.85em;
	display: inline-block;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
  -webkit-transition: all 500ms;
  -moz-transition: all 500ms;
  transition: all 500ms;
}

.organigrama li a:hover {
	border: 1px solid #fff;
	color: #fff;
  background-color: #3788d8;
	display: inline-block;
}

.organigrama > ul > li > a {
  font-size: 1em;
  font-weight: bold;
}

.organigrama > ul > li > ul > li > a {
  width: 8em;
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
										<h4 class="title">Comitê Gestor</h4>	
									</div>
								</div>
								<br>									
							</div>
						</div>			
					
												
						<div class="card">
							<div class="header">
								<div class="row" style="align-content: center;">
									
								</div>									
							</div>
							<div class="content" style="align-content: center;">
								
								<div class="row" style="align-content: center;">
									
									<div class="col-md-4" style="align-content: left;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto; font-size:16px;  font-family:Helvetica">Secretaria de Governo <br>e Gestão <br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE GOVERNO E GESTÃO")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE GOVERNO E GESTÃO")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo ucwords(strtolower($usuario->name)).' '.ucwords(strtolower($usuario->sobrenome)) ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Administração <br>e Finanças<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS")
																@if($usuario->isAdmin == 1)
																	<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: right;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Serviços <br>Urbanos<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE SERVIÇOS URBANOS")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE SERVIÇOS URBANOS")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

								</div>
								<div class="row" style="align-content: center;">
									<div class="col-md-4" style="align-content: left;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria <br>de Educação<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE EDUCAÇÃO")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE EDUCAÇÃO")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica" >Secretaria de Desenvolvimento <br>Social, Trabalho e Renda<br>
													@foreach($usuarios as $usuario)
													<!--Verifica se o usuário é da Secretaria em questão -->
														@if($usuario->secretaria == "SECRETARIA DE DESENVOLVIMENTO SOCIAL E RENDA")
															@if($usuario->isAdmin == 1)
															<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
															@endif	
														@endif
													@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE DESENVOLVIMENTO SOCIAL, TRABALHO E RENDA")
															<li>
															<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: right;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Meio <br>Ambiente<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE MEIO AMBIENTE")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE MEIO AMBIENTE")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

								</div>
								<div class="row" style="align-content: center;">
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Planejamento <br>Urbano<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE PLANEJAMENTO URBANO")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE PLANEJAMENTO URBANO")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Segurança <br>e Cidadania<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE SEGURANÇA E CIDADANIA")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE SEGURANÇA E CIDADANIA")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto; font-size:16px;  font-family:Helvetica">Secretaria de Turismo, <br>Esporte e Cultura<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE TURISMO, ESPORTE E CULTURA")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE TURISMO, ESPORTE E CULTURA")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>
								
								</div>
								<div class="row" style="align-content: center;">

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Secretaria de Saúde<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE SAÚDE")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE SAÚDE")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto; font-size:16px;  font-family:Helvetica">Secretaria de Obras <br>e Habitação<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "SECRETARIA DE OBRAS E HABITAÇÃO")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "SECRETARIA DE OBRAS E HABITAÇÃO")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#" style="width:300px; margin: auto;  font-size:16px;  font-family:Helvetica">Procuradoria Geral do Município<br>
														@foreach($usuarios as $usuario)
														<!--Verifica se o usuário é da Secretaria em questão -->
															@if($usuario->secretaria == "PROCURADORIA GERAL DO MUNICÍPIO")
																@if($usuario->isAdmin == 1)
																<span style="font-weight:normal; font-size:14px;  font-family:Helvetica"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?></span>
																@endif	
															@endif
														@endforeach
													</a>
													<!--Verifica quais usuários estão ativos e se são gestores -->
													<ul>
													@foreach($usuarios as $usuario)
														@if($usuario->isAdmin == 2 and $usuario->estado == 1 and $usuario->secretaria == "PROCURADORIA GERAL DO MUNICÍPIO")
															<li>
																<a style="width:140px; height:100px; margin: auto; font-size:14px;  font-family:Helvetica" href="#"><?php echo mb_convert_case($usuario->name, MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($usuario->sobrenome, MB_CASE_TITLE, "UTF-8") ; ?> <br><?php echo $usuario->registro; ?></a>
															</li>
														@endif
													@endforeach
													</ul>
													
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
                        </div>
					
					</div>
				</div>
			</div>	
		</div>
		
		
		
	@endsection		
	







