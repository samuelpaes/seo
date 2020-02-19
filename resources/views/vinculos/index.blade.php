@extends('layouts.app')
	@section('content')	
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						
						<div class="card">
							<div class="header">
								<form method="get" action="{{ route('showVinculos') }}">
									
									<div class="row">
										<div class="col-md-6">
											<h4 class="title">Vínculos</h4>	
										</div>
										<div class="col-md-6" >
											<div class="row">
												<div class="col-md-4" style="margin-right:-4px;">
													<select class="form-control" id="filtro" name="filtro" onchange="ativarCamposParaFiltro()">
														<option value="TODAS" selected>Todas</option>
														<option value="CODIGO">Código</option>
														<option value="DESCRICAO">Descrição</option>
													</select>
												</div>
												<div class="col-md-4" style="margin-right:-4px;">
													<input id="valor" class="form-control" name="valor"  style="text-transform: uppercase" autofocus disabled>
												</div>
												<div class="col-md-2">
													<input value="Pesquisar" type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c;">
												</div>	
												
												<div class="col-md-2">
													<a href="{{ url('vinculos/cadastrar') }}" class="btn btn-info btn-fill pull-left">
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
											<th>Código</th>
											<th>Descrição</th>
											<!--<th><div align="right">Editar</div></th>-->
										</tr>
									</thead>
                                    <tbody >
									  @foreach($vinculos as $vinculo)
										<tr style="display : table-row;">
                                        	<td>{{$vinculo->codigo}}</td>
											<td>{{$vinculo->descricao}}</td>
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

/* Máscaras Código dos Vínculos */
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
			v=v.replace(/(\d{3})(\d)/,"$1.$2")

		

			return v;
		}

function ativarCamposParaFiltro() 
	{
		if (document.getElementById('filtro').value == "TODAS")
		{
			document.getElementById('valor').disabled = true;
		}
		else if (document.getElementById('filtro').value == "CODIGO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
			document.getElementById('valor').maxLength = "11";
			document.getElementById('valor').setAttribute('onkeyup', 'mascaraCodigoDespesa( this, cDespesa )');
		}
		else if (document.getElementById('filtro').value == "DESCRICAO")
		{
			document.getElementById('valor').disabled=false;
			document.getElementById('valor').required=true;
			document.getElementById('valor').setAttribute('onkeyup', '');
			document.getElementById('valor').maxLength = "1000";
		}
	}
	
</script>



<!-- Modal Mensagem-->
<div class="modal"  id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  >
	<div class="modal-dialog" role="document">
		@if($mensagem == 'Vínculo Cadastrado Com Sucesso!')
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





