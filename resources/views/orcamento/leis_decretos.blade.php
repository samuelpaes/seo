<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/formularios_orcamento/credito_adicional_suplementar.js') }}"type="text/javascript"></script>
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
							<div class="header">
								<div class="row">
									<div class="col-md-6">
										<h4 class="title">Leis e Decretos</h4>	
										<br>
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-2">
										<a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#cadastrarLeiDecreto">
											Nova
										</a>
									</div>
								</div>
							</div>
						</div>
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
							
						</div>			
					
												
						
					</div>
				</div>
			</div>	
		</div>

	@endsection		
	


<!-- Modal Cadastrar Nova Lei/Decreto-->
<div id="cadastrarLeiDecreto" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Incluir Lei/Decreto</h5>
			</div>
						
				<div class="modal-body">
					
						<div class="row">
						
									<input type="radio" value="Lei"/>Lei
								

						
									<input type="radio" value="Decreto" />Decreto
								
						</div>
					</form>		
				</div>
					
			<div class="modal-footer">		
			</div>
		
		</div>
		
	</div>
</div>





