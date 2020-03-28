<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('layouts.app')

	@section('content')	
	<style>
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
  border-radius: 100%;
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
						<form method="get" action="{{ route('orcamento_leis_decretos') }}">
							<div class="header">
								<div class="row">
									<div class="col-md-4">
										<h4 class="title">Legislação</h4>	
										<br>
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-5" id="vazio">
											</div>
											<div class="col-md-3">
												<select class="form-control" id="pesquisa" name="pesquisa" onclick="ativarPesquisa()">
													<option value="" selected></option>					
													<option value="INSTRUMENTO">INSTRUMENTO</option>
													<option value="CLASSIFICACAO">CLASSIFICACAO</option>
													<option value="NUMERO/ANO">NUMERO/ANO</option>
													<option value="ESFERA">ESFERA</option>
												</select>
											</div>

											<div class="col-md-5" id="instrumento2" hidden>
												<select class="form-control" name="instrumento">
													<option selected></option>
													<option value="DECRETO">DECRETO</option>
													<option value="LEI">LEI</option>
												</select>
											</div>

											<div class="col-md-5" id="classificacao2" hidden>
												<select class="form-control" name="classificacao" >
													<option selected></option>
													<option value="PPA">PLANO PLURIANUAL</option>
													<option value="LEI">LEI DE DIRETRIZES ORÇAMENTÁRIAS</option>
													<option value="LOA">LEI ORÇAMENTÁRIA ANUAL</option>
													<option value="OUTROS">OUTROS</option>
												</select>
											</div>

											<div class="col-md-2" id="numero" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value=""  name="numero">
												</div>
											</div>
											<div class="col-md-1" id="/" hidden>
												<input type="text" class="form-control" value="/" style="background:none; border:none;" readonly></input>
											</div>
											<div class="col-md-2" id="ano" hidden>
												<div class="form-group">
													<input type="number" min="0" class="form-control" value=""  name="ano" >
												</div>
											</div>
											<div class="col-md-5" id="esfera2" hidden>
												<select class="form-control" name="esfera">
													<option selected></option>
													<option value="MUNICIPAL">MUNICIPAL</option>
													<option value="ESTADUAL">ESTADUAL</option>
													<option value="FEDERAL">FEDERAL</option>
												</select>
											</div>
											<div class="col-md-2">
												<input name="filtro" value="" id="filtro">	
												<input name="acao" value="pesquisar" hidden />
												<button type="submit" id="btnPesquisar" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;" data-toggle="modal" data-target="#complementarPesquisa" disabled>Pesquisar</button>
											</div>	
											<div class="col-md-2">
											@if(auth()->user()->isAdmin == 1)
												<a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#cadastrarLeiDecreto">
													Novo
												</a>
											@endif
											</div>
										</div>	
									</div>
								</div>
							</form>
							</div>
						</div>
						@if($pesquisaFeita == "ok")
						<div class="card">
							<div class="content">
								<div style="font-size:16px;  text-align: justify;text-justify: inter-word;">
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nesta seção você encontra as Leis e Decretos, documento que serve como guia de instrução e padronização à gestão do Orçamento do Poder Público Municipal e suas unidades subordinadas.<h6>
								</div>
								<br>
								<ul>
									<li style="font-size:16px"><a href="{{url('exported_files/manual_2019.pdf')}}" target="_blank">Manual de Alterações Orçamentárias - 2019</a></li>
								</ul>
								<br>
							</div>
							<div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
										<th>Instrumento</th>
										<th>Classificação</th>
										<th>Numero</th>
										<th>Ano</th>
										<th>Esfera</th>
										<th>Observação</th>
										<th>Link</th>

                               		</tr>
								</thead>
                                <tbody>
								@foreach($legislacoes as $j => $value)
									@foreach($value as $legislacao)
								
                                    <tr>
                                       	<td>{{$legislacao['instrumento']}}</td>
                                       	<td>{{$legislacao['classificacao']}}</td>
                                       	<td>{{$legislacao['numero']}}</td>
                                       	<td>{{$legislacao['ano']}}</td>
                                       	<td>{{$legislacao['esfera']}}</td>
										<td>{{$legislacao['observacao']}}</td>
										<td>{{$legislacao['link']}}</td>
										
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




	@endsection		
	<script>

function ativarPesquisa()
{

	var e = document.getElementById("pesquisa");
	var opcao = e.options[e.selectedIndex].value;

	if(opcao == "INSTRUMENTO")
	{
		document.getElementById("instrumento2").hidden = false;
		document.getElementById("classificacao2").hidden = true;
		document.getElementById("numero/ano").hidden = true;
		document.getElementById("esfera2").hidden = true;

		document.getElementById('filtro').value = "instrumento";
		document.getElementById('btnPesquisar').disabled = false;
		document.getElementById("vazio").hidden = true;
	}
	else if(opcao == "CLASSIFICACAO")
	{
		document.getElementById("instrumento2").hidden = true;
		document.getElementById("classificacao2").hidden = false;
		document.getElementById("numero/ano").hidden = true;
		document.getElementById("esfera2").hidden = true;

		document.getElementById('filtro').value = "classificacao";
		document.getElementById('btnPesquisar').disabled = false;
		document.getElementById("vazio").hidden = true;

	}
	else if(opcao == "NUMERO/ANO")
	{
		document.getElementById("instrumento2").hidden = true;
		document.getElementById("classificacao2").hidden = true;
		document.getElementById("numero/ano").hidden = false;
		document.getElementById("esfera2").hidden = true;

		document.getElementById('filtro').value = "numero/ano";
		document.getElementById('btnPesquisar').disabled = false;
		document.getElementById("vazio").hidden = true;

	}
	else if(opcao == "ESFERA")
	{
		document.getElementById("instrumento2").hidden = true;
		document.getElementById("classificacao2").hidden = true;
		document.getElementById("numero/ano").hidden = true;
		document.getElementById("esfera2").hidden = false;

		document.getElementById('filtro').value = "esfera";
		document.getElementById('btnPesquisar').disabled = false;
		document.getElementById("vazio").hidden = true;


	}
	else{
		document.getElementById("instrumento2").hidden = true;
		document.getElementById("classificacao2").hidden = true;
		document.getElementById("numero/ano").hidden = true;
		document.getElementById("esfera2").hidden = true;

		document.getElementById('btnPesquisar').disabled = true;
		document.getElementById('filtro').value = "";
		document.getElementById("vazio").hidden = false;

	}
}
</script>


<!-- Modal Cadastrar Nova Lei/Decreto-->
<div id="cadastrarLeiDecreto" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Incluir Lei/Decreto</h5>
			</div>
			<form method="post" action="{{ route('orcamento_leis_decretos') }}">	
			@csrf
			@method('POST')			
				<div class="modal-body">	
						<div class="content">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Instrumento</label>
										<select class="form-control" name="instrumento" id="instrumento">
											<option selected></option>
											<option value="DECRETO">DECRETO</option>
											<option value="LEI">LEI</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Classificação</label>
										<select class="form-control" name="classificacao" id="classificacao">
											<option selected></option>
											<option value="PPA">PLANO PLURIANUAL</option>
											<option value="LDO">LEI DE DIRETRIZES ORÇAMENTÁRIAS</option>
											<option value="LOA">LEI ORÇAMENTÁRIA ANUAL</option>
											<option value="OUTROS">OUTROS</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Número</label>
										<input type="number" min="0" class="form-control" value=""  name="numero">
									</div>
								</div>
								<div class="col-md-2">
									<label></label>
									<input type="text" class="form-control" value="/" style="background:none; border:none;" readonly></input>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>Ano</label>
										<input type="number" min="0" class="form-control" value=""  name="ano">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Esfera</label>
										<select class="form-control" name="esfera" id="esfera">
											<option selected></option>
											<option value="MUNICIPAL">MUNICIPAL</option>
											<option value="ESTADUAL">ESTADUAL</option>
											<option value="FEDERAL">FEDERAL</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Observação</label>
										<input type="text" class="form-control" name="observacao"></input>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Link</label>
										<input type="text" class="form-control" name="link"></input>
									</div>
								</div>
							</div>
						</div>
						
						
						
				</div>
					
			<div class="modal-footer">		
			<input name="acao" class="form control" value="cadastrar"></input>
			<input value="Cadastrar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
			</div>
		</form>	
		</div>
		
	</div>
</div>






