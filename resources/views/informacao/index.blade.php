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
								
							<form method="get" action="{{ route('showInformacao') }}">	
									<div class="row">
										<div class="col-md-6">
											<h4 class="title">Informações</h4>	
										</div>
										<div class="col-md-6" >
											<div class="row">
												<div class="col-md-4" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="TODAS" selected>TODAS</option>
														<option value="TITULO">TÍTULO</option>
														<option value="DESCRICAO">DESCRIÇÃO</option>
													</select>
												</div>
												<div class="col-md-4" style="margin-right:-4px;">
													<input id="valor" class="form-control" name="valor"  style="text-transform: uppercase" autofocus disabled>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
												</div>	
												
												<div class="col-md-2">
													<a href="{{ url('informacao/cadastrar') }}" class="btn btn-info btn-fill pull-left">
														Nova
													</a>
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
                            <div class="header">
                                <h4 class="title">Resultado da pesquisa</h4>
                                <p class="category">Pesquisa realizada pelo filtro <b>{{$filtro}}</b></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
											<th>Título</th>
											<th>Descrição</th>
											<th style="width:8%"><div></div></th>
										</tr>
									</thead>
                                    <tbody >
									  @foreach($informacoes as $informacao)
										<tr style="display : table-row;">
                                        	<td>{{$informacao->titulo}}</td>
											<td>{{$informacao->descricao}}</td>
											<form method="post" action="{{ route('removerInformacao') }}">
												@csrf
												@method('POST')	
												<td style="width:8%">
													<input name="id" value="{{$informacao->id}}"><input>
													<button class='btnEdicao' type='submit' data-hover='Remover' style='margin-right:-5px;left:0px;'><div><i class='fa fa-times'></i></div></button>
												</td>
											</form>
										</tr>
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
	@endsection		

	
	
	


<script>

var icon = document.getElementById("icon");

icon.onclick = function() {
  if (this.className === "Icon") {
    this.className = "Icon open"; 
  } else {
    this.className = "Icon";
  }
};

function ativarCamposParaFiltro() 
	{
		if (document.getElementById('filtro').value == "TODAS")
		{
			document.getElementById('valor').disabled = true;
		}
		else if (document.getElementById('filtro').value == "TITULO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
		
		}
		else if (document.getElementById('filtro').value == "DESCRICAO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
		}
	}
	
</script>


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






