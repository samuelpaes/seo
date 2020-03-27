<style>

</style>

@extends('layouts.app')
	@section('content')
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h4 class="title">Informacao</h4>
								<br>
							</div>	
						</div>
						
					<!--Cadastrar Vínculo -->
						
							<div class="card">
								<div class="header">
									<h5 class="title">Cadastrar Informação</h5>
									<br>
								</div>	
								<div class="content">
                                    <form method="get" action="{{ route('criarInformacao') }}">
										@csrf
										@method('POST')								
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Título</label>
													<input type="text"  class="form-control" name="titulo" id="codigo" required autofocus>																		
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Descrição</label>
													<input type="text" class="form-control" name="descricao"  style="text-transform: uppercase" required>
												</div>
											</div>
											<div class="col-md-2">
												<label><input style="border:none; background-color: transparent;" disabled></input></label>
												<button type="submit" class="btn btn-info btn-fill pull-right" style="background:#a1e82c; border-color:#a1e82c; margin-left:70px">Cadastrar</button>
											</div>		
										</div>
										<div class="clearfix"></div>
									</form>
									
								</div>
							</div>
										
                    </div>
				</div>
			</div>	
		</div>
				
			
	@endsection	
		
		


<script>
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
		if (document.getElementById('unidade_orcamentaria').value == "")
		{
			document.getElementById('codigo').disabled = true;
			document.getElementById('unidade').disabled = true;
			document.getElementById('btnImportar').disabled = true;
			document.getElementById('btnCadastrar').disabled = true;
		}
		else{
			document.getElementById('codigo').disabled=false;
			document.getElementById('codigo').required=true;
			document.getElementById('unidade').disabled=false;
			document.getElementById('unidade').required=true;
			document.getElementById('btnImportar').disabled=false;
			document.getElementById('btnImportar').required=true;
			document.getElementById('btnCadastrar').disabled=false;
			document.getElementById('btnCadastrar').required=true;
		}
	}		
</script>





<!-- Modal Importar Unidade Orcamentaria Arquivo-->
<div id="importarArquivo" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button data-balloon="O arquivo a ser importado precisa ser um arquivo 'xlsx' contendo as colunas com os indices 'codigo' e 'unidade' na primeira linha tabela." data-balloon-pos="down" class="close"><i class="pe-7s-help1" style="font-size: 20px; font-weight: bold;"></i></button>
		
	
		
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


