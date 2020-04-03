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
									
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Governo <br>e Gestão</a>
													@foreach($usuarios as $usuario)
														@if($usuario->secretaria == "SECRETARIA DE GOVERNO E GESTÃO")
															@if($usuario->isAdmin == 1)
															<?php echo $usuario->name.' '.$usuario->sobrenome ; ?>
															@endif
													<ul>
														<li>
															<!--<a href="#">Paulo da Silva <br>Reg: x.xxx</a>-->
														</li>
														<li>
															<!--<a href="#">Juliana Carvalho <br> Reg: x.xxx</a>-->
														</li>
													</ul>
														@endif
													@endforeach
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Administração <br>e Finanças</a>
													<ul>
														<li>
															<a href="#">Patrícia Baisi <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Márcio Ricardo Alves <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Serviços <br>Urbanos</a>
													<ul>
														<li>
															<a href="#">Dimas Rossi <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Marco Sant'Anna <br> Reg: x.xxx</a>
														</li>

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
													<a href="#">Secretaria de Educação </a>
													<ul>
														<li>
															<a href="#">Daniele Jorgetti <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Cássio Abdallah <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Desenvolvimento <br>Social, Trabalho <br>e Renda</a>
													<ul>
														<li>
															<a href="#">Iza Maria Lartcha <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Tayná <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Meio <br>Ambiente</a>
													<ul>
														<li>
															<a href="#">Cátia <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Fernando Poyatos <br> Reg: x.xxx</a>
														</li>

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
													<a href="#">Secretaria de Planejamento <br>Urbano</a>
													<ul>
														<li>
															<a href="#">Renato Louzada <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Leonardo Ferrari <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Segurança <br>e Cidadania</a>
													<ul>
														<li>
															<a href="#">Alex Dias <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Roberto Teixeira <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Turismo, <br>Esporte e Cultura</a>
													<ul>
														<li>
															<a href="#">Adriana <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Danilo Lerne <br> Reg: x.xxx</a>
														</li>

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
													<a href="#">Secretaria de Saúde</a>
													<ul>
														<li>
															<a href="#">Rosimaire <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Milene Chaddad <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Secretaria de Obras <br>e Habitação</a>
													<ul>
														<li>
															<a href="#">Luizilda <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Ana Luchesi <br> Reg: x.xxx</a>
														</li>

													</ul>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="col-md-4" style="align-content: center;">
										 <div class="organigrama" style="align-content: center;">
											<ul>
												<li>
													<a href="#">Procuradoria Geral do Município</a>
													<ul>
														<li>
															<a href="#">Márcio Zitei <br>Reg: x.xxx</a>
														</li>
														<li>
															<a href="#">Camila Santos <br> Reg: x.xxx</a>
														</li>

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
	







