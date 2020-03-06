@extends('layouts.app')
	@section('content')

	<style>
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





</style>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<div class="row">
								<div class="col-md-11">
									<h4 class="title">Dotação Orçamentária</h4>
								</div>
								<div class="col-md-1">
									<h4 class="title">{{$exercicio}}</h4>
								</div>
							</div>
							<br>
						</div>	
					</div>
						
					
					@csrf
					@method('POST')	
					<div class="card">
						<div class="header">
							<div class="row">
								<div class="col-md-12">
									<input id="unidadeOrcamentaria" value="{{$unidadeOrcamentaria[0]->codigo}}" type="hidden"></input>
									<h5 class="title">IMPLEMENTAR SALDO DE DOTAÇÕES DA {{ $unidadeOrcamentaria[0]->unidade }}</h5>
									<br>
								</div>
							</div>	
						</div>	
							
						<div class="content">
						@if ($pesquisaFeita=='ok') 
							<div class="row">
								<div class="col-md-4">
									<label>Unidade Executora</label> 
									<select class="form-control" name="unidadeExecutora" id="unidadeExecutora" >
										<option value="" selected></option>
										@foreach($unidadesExecutoras as $unidadeExecutora)
										@if($unidadeOrcamentaria[0]->unidade == $unidadeExecutora->unidade_orcamentaria)
										<option style="font-size:12px" value="{{{$unidadeExecutora['codigo']}}} - {{{$unidadeExecutora['unidade']}}}" >{{{$unidadeExecutora['codigo']}}} - {{{$unidadeExecutora['unidade']}}}</option> 
										@endif
										@endforeach
									</select>
								</div>
								<div class="col-md-4">
									<label>Classificação Funcional Programática</label>
									<select class="form-control" name="classificacaoFuncional" id="classificacaoFuncional" >
										<option value="" selected></option>
										@foreach ($classificacoesFuncionaisProgramaticas as $classificacaoFuncionalProgramatica)
										<option  style="font-size:12px" value="{{{$classificacaoFuncionalProgramatica['codigo']}}} - {{{$classificacaoFuncionalProgramatica['especificacao']}}}" >{{{$classificacaoFuncionalProgramatica['codigo']}}} - {{{$classificacaoFuncionalProgramatica['especificacao']}}}</option> 
										@endforeach
									</select>
								</div>
								<div class="col-md-4">
									<label>Natueza De Despesa</label>
									<select class="form-control" name="naturezaDeDespesa" id="naturezaDeDespesa" >
										<option value="" selected></option>
										@foreach ($naturezasDeDespesas as $naturezaDeDespesa)
										<option  style="font-size:12px" value="{{{$naturezaDeDespesa['codigo']}}} - {{{$naturezaDeDespesa['especificacao']}}}"  >{{{$naturezaDeDespesa['codigo']}}} - {{{$naturezaDeDespesa['especificacao']}}}</option> 
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Código da Dotação</label>
									<input type="number" name="codigo_dotacao" id="codigo_dotacao" class="form-control" ></input>
								</div>
								<div class="col-md-2">
									<label>Vínculo</label>
									<select  class="form-control" name="vinculo" id="vinculo"  >
										<option value="" selected></option>
										@foreach ($vinculos as $vinculo)
										<option  style="font-size:12px" value="{{{$vinculo['codigo']}}} - {{{$vinculo['descricao']}}}" >{{{$vinculo['codigo']}}} - {{{$vinculo['descricao']}}}</option> 
										@endforeach
									</select>
								</div>
								<div class="col-md-2">
									<label>Dotação</label>
									<input type="text" name="dotacao" id="dotacao" placeholder="R$ 0,00"  class="form-control" onKeyUp="formatarMoeda(this)" ></input>
								</div>
								<div class="col-md-2">
									<label>Empenhado</label>
									<input type="text" name="empenhado" id="empenhado"  placeholder="R$ 0,00" class="form-control" onKeyUp="formatarMoeda(this)" ></input>
								</div>
								<div class="col-md-2">
									<label>Saldo</label>
									<input type="text" name="saldo" id="saldo"  placeholder="R$ 0,00" class="form-control" onKeyUp="formatarMoeda(this)" ></input>
								</div>
								<div class="col-md-2">
									<label>Reserva</label>
									<input type="text" name="reserva" id="reserva"  placeholder="R$ 0,00" id="reserva" class="form-control" onKeyUp="formatarMoeda(this)" ></input>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-info btn-fill pull-right" onclick="addItemDotacao()"  style="background:#a1e82c; border-color:#a1e82c;">Inserir</button>
								</div>	
							</div>
							@endif	
						</div>
                    </div>
					
					<div class="card">
						<div class="content">
							<form method="POST" action="{{route ('inserirDotacaoOrcamentaria') }}">
								@csrf
								@method('POST')	
								<input type="hidden" name="unidadeOrcamentaria" value="{{$unidadeOrcamentaria[0]->codigo}}"></input>
								<input id="exercicio" name="exercicio" value="{{$exercicio}}" type="hidden"></input>
								<div class="content table-responsive table-full-width">
									<table class="table table-hover table-striped" id="exercicioDotacao" name="exercicioDotacao" style='font-size:98%'>
										<thead>
											<tr>
												<th>Cód. Dotação</th>
												<th>Unidade Executora</th>
												<th>Classificação Funcional Programática</th>
												<th>Natureza De Despesa</th>
												<th>Vínculo</th>
												<th>Dotação</th>
												<th>Empenhado</th>
												<th>Saldo</th>
												<th>Reserva</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>  
								</div>
								<hr>
								<div class="row">
									<div class="col-md-9">
									</div>
									<div class="col-md-2">
										<input type="button" onclick="location.reload()" value="Cancelar" class="btn btn-info btn-fill pull-left"   style="background:#de3f3f; border-color:#de3f3f;"></button>
									</div>
									<div class="col-md-1">
										<button class="btn btn-info btn-fill pull-right"   style="background:#a1e82c; border-color:#a1e82c;">Implementar</button>
									</div>
							</form>
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
		
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

// função para exibir as unidades executoras ocultas
$(function() {

  $(".firstlevel").click(function(event) {
    $(this).nextUntil(".divider").filter(".secondlevel").toggle("slow");

  });

  $(".secondlevel").click(function(event) {
    $(this).nextUntil(".secondlevel").toggle("slow");
  });


});

/* Máscaras Código da Unidade Orcamentaria */
		function mascaraCodigoDespesa(o,f){
			v_obj=o
			v_fun=f
			setTimeout("execmascara()",1)
		}
		function execmascara(){
			v_obj.value=v_fun(v_obj.value)
		}
		function cDespesa(v){
			
			//Remove tudo o que não é dígito
			v=v.replace(/\D/g,"");            
		   
				
			
			
			//Coloca um ponto entre o terceiro e o quinto
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

			//Coloca um ponto entre o quinto e o sétimo 
			v=v.replace(/(\d{2})(\d)/,"$1.$2")

		

			return v;
		}


function ativarCamposParaFiltro() 
	{
		if ((document.getElementById('unidade_orcamentaria').value == "") || (document.getElementById('exercicio').value == ""))
		{
			document.getElementById('btnImplementar').disabled = true;
		
		}
		else{
			document.getElementById('btnImplementar').disabled=false;
		}
	}		
	
	
function formatarMoeda(x) 
{
	$(x).keyup(function(){
    var v = $(this).val();
    v=v.replace(/\D/g,'');
    v=v.replace(/(\d{1,2})$/, ',$1');  
    v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');  
    v = v != ''?'R$ '+v:'';
    $(this).val(v);
});
}




function addItemDotacao(){
		
			
		var unidadeExecutora = document.getElementById('unidadeExecutora').value;
		var classificacaoFuncional = document.getElementById('classificacaoFuncional').value;
		var naturezaDeDespesa = document.getElementById('naturezaDeDespesa').value;
		var codigo_dotacao = document.getElementById('codigo_dotacao').value;
		var vinculo = document.getElementById('vinculo').value;
		var dotacao = document.getElementById('dotacao').value;
		var dotacao = dotacao.replace("R$ ", "");
		if (dotacao == '')
		{
			var dotacao ='0,00'
		}
		else{};
		var empenhado = document.getElementById('empenhado').value;
		var empenhado = empenhado.replace("R$ ", "");
		if (empenhado == '')
		{
			var empenhado ='0,00'
		}
		else{};
		var saldo = document.getElementById('saldo').value;
		var saldo = saldo.replace("R$ ", "");
		if (saldo == '')
		{
			var saldo ='0,00'
		}
		else{};
		var reserva = document.getElementById('reserva').value;	
		var reserva = reserva.replace("R$ ", "");
		if (reserva == '')
		{
			var reserva ='0,00'
		}
		else{};	
	
		var local=document.getElementById('exercicioDotacao');
		tblBody = local.tBodies[0];
		var newRow1 = tblBody.insertRow(-1);
		var newCell0 = newRow1.insertCell(0);
		newCell0.innerHTML = '<td width= "20px"><input type="hidden" name="codigo_dotacao['+newRow1.rowIndex+']" value='+codigo_dotacao+'>'+codigo_dotacao+'</input></td>';
		var newCell1 = newRow1.insertCell(1);
		newCell1.innerHTML = '<td width= "200px" align="center"><input type="hidden" name="unidadeExecutora['+newRow1.rowIndex+']" value='+unidadeExecutora+'>'+unidadeExecutora.replace(new RegExp("[0-9]", "g"), "").replace(/\./g, '').replace(/\-/g, '')+'</input></td>';
		var newCell2 = newRow1.insertCell(2);
		newCell2.innerHTML = '<td width= "200px" align="center"><input type="hidden" name="classificacaoFuncional['+newRow1.rowIndex+']" value='+classificacaoFuncional+'>'+classificacaoFuncional.replace(new RegExp("[0-9]", "g"), "").replace(/\./g, '').replace(/\-/g, '')+'</input></td>';
		var newCell3 = newRow1.insertCell(3);
		newCell3.innerHTML = '<td width= "200px" align="center"><input type="hidden" name="naturezaDeDespesa['+newRow1.rowIndex+']" value='+naturezaDeDespesa+'>'+naturezaDeDespesa.replace(new RegExp("[0-9]", "g"), "").replace(/\./g, '').replace(/\-/g, '')+'</input></td>';
		var newCell4 = newRow1.insertCell(4);
		newCell4.innerHTML = '<td width= "50px" align="center"><input type="hidden" name="vinculo['+newRow1.rowIndex+']" value='+vinculo+'>'+vinculo.replace(new RegExp("[0-9]", "g"), "").replace(/\./g, '').replace(/\-/g, '')+'</input></td>';			
		var newCell5 = newRow1.insertCell(5);
		newCell5.innerHTML = '<td width= "50px" align="center"><input type="hidden" name="dotacao['+newRow1.rowIndex+']" value='+dotacao+'>R$ '+dotacao+'</input></td>';	
		var newCell6 = newRow1.insertCell(6);
		newCell6.innerHTML = '<td width= "50px" align="center"><input type="hidden" name="empenhado['+newRow1.rowIndex+']" value='+empenhado+'>R$ '+empenhado+'</input></td>';	
		var newCell7 = newRow1.insertCell(7);
		newCell7.innerHTML = '<td width= "50px" align="center"><input type="hidden" name="saldo['+newRow1.rowIndex+']" value='+saldo+'>R$ '+saldo+'</input></td>';	
		var newCell8 = newRow1.insertCell(8);
		newCell8.innerHTML = '<td width= "50px" align="center"><input type="hidden" name="reserva['+newRow1.rowIndex+']" value='+reserva+'>R$ '+reserva+'</input></td>';	
		var newCell9 = newRow1.insertCell(9);
		newCell9.innerHTML = '<td width= "10px" align="center"><button type="button" onclick="removerLinha(this)"><div class="outer"><div class="inner"><label class="label_remove">Excluir</label></div></div></input></td>';	
		}

      function removerLinha(obj){
            // Capturamos a referência da TR (linha) pai do objeto
            var objTR = obj.parentNode.parentNode;	
            // Capturamos a referência da TABLE (exercicio) pai da linha
            var objTable = objTR.parentNode;
			// Capturamos o índice da linha
            var indexTR = objTR.rowIndex;
			// Chamamos o método de remoção de linha nativo do JavaScript, passando como parâmetro o índice da linha  
			document.getElementById("exercicioDotacao").deleteRow(indexTR)
        } 
</script>





<!-- Modal Importar Unidade Orcamentaria Arquivo-->
<div id="importarArquivo" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo' e 'unidade' na primeira linha exercicio." data-balloon-pos="down" class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;"></i></button>
		
	
		
				<h5 class="modal-title">Importar Arquivo</h5>
			</div>
			<form action="{{ route('importarUnidadeOrcamentaria') }}" method="post" enctype="multipart/form-data"  files="true">
			{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-9">
							<input type="file" name="arquivo"  accept=".xlsx"></input>
						</div>

					</div>
				</div>
				<div class="modal-footer">	
					<button type="submit" style="background:#a1e82c; border-color:#a1e82c; margin-left:10px" class="btn btn-info btn-fill pull-right">Enviar</button>	
					<button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal" style="background:#ffbc67; border-color:#ffbc67">Cancelar</button>								
				</div>
			</form>		
		</div>
		
	</div>
</div>


<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Unidade Orçamentária Cadastrada com Sucesso!')
		<div class="alert alert-success" style="border-radius: 5px">
			<button type="button" aria-hidden="true" class="close" data-dismiss="modal">×</button>
			<span><b> Sucesso! - </b>{{$mensagem}}. </span>
		</div>
		@else
		<div class="alert alert-danger" style="border-radius: 5px">
            <button type="button" aria-hidden="true" data-dismiss="modal" class="close">×</button>
            <span><b> Atenção! - </b> {{$mensagem}}</span>
         </div>
		@endif
	</div>
</div>


<!-- Modal Inserir Classificação Funcional Programática-->
<div id="inserirClassificacaoFuncionalProgramatica" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Classificação Funcional Programática</h5>
			</div>
						
				<div class="modal-body">
					
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="classificacaoFuncionalProgramatica" id="classificacaoFuncionalProgramatica" onchange="ativarCamposParaFiltro()">
									<option value="" selected></option>
									@foreach ($classificacoesFuncionaisProgramaticas as $classificacaoFuncionalProgramatica)
									<option  value="{{{$classificacaoFuncionalProgramatica['codigo']}}}" >{{{$classificacaoFuncionalProgramatica['codigo']}}} - {{{$classificacaoFuncionalProgramatica['especificacao']}}}</option> 
									@endforeach
								</select>
							</div>
							<div class="col-md-2">
							
								<button name="unidade" type="submit" class="btn btn-info btn-fill pull-left" value="inserir" onclick="addClassificacaoFuncionalProgramatica(this)">Inserir<br>
							</form>
							<form method="get"  action="{{route ('cadastrarUnidadeExecutora') }}">
							
							</div>
						</div>
					</form>		
				</div>
					
			<div class="modal-footer">		
			</div>
		
		</div>
		
	</div>
</div>
