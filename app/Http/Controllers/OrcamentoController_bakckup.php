<?php

namespace SEO\Http\Controllers;

use DB;
use SEO\UnidadeOrcamentaria;
use Illuminate\Http\Request;
use SEO\SaldoDeDotacao2019;
use SEO\UnidadeExecutora;
use SEO\ClassificacaoFuncionalProgramatica;
use SEO\NaturezaDeDespesa;

use Dompdf\Dompdf;


class OrcamentoController extends Controller
{
     public function formularios()
    {
		$total_suplementar=0;
		$total_anular=0;
		$mensagem = "";
		$mensagem_dotacao = "";
		$acao = "";
		
		$data = "";
		$tipoInstrumento="";
		$numeroInstrumento=array("","");
		
		$dotacoes_suplementacao= array();
		$dotacoes_anulacao= array();
		$anulacao = false;
		$superavit = false;
		$excesso = false;
		
		$superavit_valor_recurso = array();
		$excesso_valor_recurso = array();
		
		return view ('orcamento/formularios')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
	}
	
	 public function manual()
    {
	
		return view ('orcamento/manual');
	}
	
	public function leis_decretos()
    {
	
		return view ('orcamento/leis_decretos');
	}
	
	public function agenda_orcamentaria()
    {
	
		return view ('orcamento/agenda_orcamentaria');
	}
	
	public function show(Request $request)
    {
		
		$anulacao = false;
		$superavit = false;
		$excesso = false;
		$data = "";
		$tipoInstrumento="";
		$numeroInstrumento=array("","");
		$total_suplementar=0;
		$total_anular=0;
		$dotacoes_suplementacao = array();
		$dotacoes_anulacao = array();
		$dotacoes_suplementacao_vinculos = array();
		$dotacoes_anulacao_vinculos = array();
		$acao = $request->acao;
	    $superavit_valor_recurso = array();
		$excesso_valor_recurso = array();
		$mensagem = "";
		$mensagem_dotacao = "";
		$unidade_orcamentaria = "";
		
		$sup_valor = array();
		$sup_justificativa = array();
		$sup_vinculo = array();
	
		$anl_valor = array();
		$anl_recurso = array();
		$anl_vinculo= array();
			
		
		
			//Verifica a unidade Orçamentária do Gestor
			$unidade_orcamentaria = $request->unidade_orcamentaria;
			$unidade_orcamentaria = DB::table('unidade_orcamentarias')->where('unidade', $request->unidade_orcamentaria)->value('codigo');
			
		
		
			if(!empty($request->spt_valor))
			{
				$superavit_valor_recurso['valor'] = $request->spt_valor;
				$superavit_valor_recurso['recurso'] = $request->spt_recurso;
			}
			
			if(!empty($request->exc_valor))
			{
				$excesso_valor_recurso['valor'] = $request->exc_valor;
				$excesso_valor_recurso['recurso'] = $request->exc_recurso;
			}
			
			if($request->tipo_anulacao == "ok")
			{
				$anulacao = true;
			}
			
			if($request->tipo_superavit == "ok")
			{
				$superavit = true;
			}
			
			if($request->tipo_excesso == "ok")
			{
				$excesso = true;
			}
			
			if($request->data <> "")
			{
				$data= $request->data;
			}
			
			if($request->tipoInstrumento <> "")
			{
				$tipoInstrumento= $request->tipoInstrumento;
			}
			
			if($request->numeroInstrumento <> "")
			{
				$numeroInstrumento= $request->numeroInstrumento;
				$numeroInstrumento = explode('/', $numeroInstrumento, 2);
			}

		
		
			foreach ($request->sup_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao2019::whereRaw("codigo_dotacao = '$dotacao'")->first();
						if($consulta<>null and $consulta['unidade_orcamentaria'] == $unidade_orcamentaria)
						{
							$dotacoes_suplementacao[] = SaldoDeDotacao2019::whereRaw("codigo_dotacao = '$dotacao'")->first();
						}
						else{
							$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações';
						}
				}
				else
				{
				}
				
			}
						
			foreach ($request->anl_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao2019::whereRaw("codigo_dotacao = '$dotacao'")->first();
						if($consulta<>null and $consulta['unidade_orcamentaria'] == $unidade_orcamentaria)
						{
							$dotacoes_anulacao[] = SaldoDeDotacao2019::whereRaw("codigo_dotacao = '$dotacao'")->first();
						}
						else{
							$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações';
						}
				}
				else
				{
				}
				
			}
			
			$sup_valor = $request->sup_valor;
			if(!empty($sup_valor))
			{
				array_splice($sup_valor, 0, 0, "R$ 0,00");
			}
			
			$sup_justificativa = $request->sup_justificativa;
			if(!empty($sup_justificativa))
			{
				array_splice($sup_justificativa, 0, 0, "");
			}
			
			$sup_vinculo = $request->sup_vinculo;
			if(!empty($sup_vinculo))
			{
				array_splice($sup_vinculo, 0, 0, "");
			}
			$a=0;
			foreach($dotacoes_suplementacao as $dotacao){
				foreach($request->sup_codigo_dotacao as $codigo)
				{
					if($codigo == $dotacao['codigo_dotacao'])
					{
						$dotacao['valor']=$sup_valor[$a];
						$dotacao['justificativa']=$sup_justificativa[$a];
						$dotacao['vinculo']=$sup_vinculo[$a];
					}
				}
				$a++;
			}
			
			
			$anl_valor = $request->anl_valor;
			if(!empty($anl_valor))
			{
				array_splice($anl_valor, 0, 0, "R$ 0,00");
			}
			
			$anl_recurso = $request->anl_recurso;
			if(!empty($anl_recurso))
			{
				array_splice($anl_recurso, 0, 0, "");
			}
			
			$anl_vinculo = $request->anl_vinculo;
			if(!empty($anl_vinculo))
			{
				array_splice($anl_vinculo, 0, 0, "");
			}
		
			$a=0;
			foreach($dotacoes_anulacao as $dotacao){
				foreach($request->anl_codigo_dotacao as $codigo)
				{
					if($codigo == $dotacao['codigo_dotacao'])
					{
						$dotacao['valor']=$anl_valor[$a];
						$dotacao['justificativa']=$anl_recurso[$a];
						$dotacao['vinculo']=$anl_vinculo[$a];
					}
				}
				$a++;
			}
				
		
			if(!empty($dotacoes_suplementacao))
			{
				foreach($dotacoes_suplementacao as $dotacao)
				{
					$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao2019::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_suplementacao_vinculos= array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
			}
			else{
			}
			
			if(!empty($dotacoes_anulacao))
			{
				foreach($dotacoes_anulacao as $dotacao)
				{
				$dotacoes_anulacao_vinculos[] = SaldoDeDotacao2019::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_anulacao_vinculos= array_unique($dotacoes_anulacao_vinculos, SORT_REGULAR);
			}
			else{
			}
			
		
		$mensagem = "ok";
		
		//return ($request);
		return view ('orcamento/formularios')->with('dotacoes_suplementacao', $dotacoes_suplementacao)->with('dotacoes_suplementacao_vinculos', $dotacoes_suplementacao_vinculos)->with('dotacoes_anulacao', $dotacoes_anulacao)->with('dotacoes_anulacao_vinculos', $dotacoes_anulacao_vinculos)->with("mensagem", $mensagem)->with("acao", $acao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
	}
	public function saldo_dotacoes(Request $request)
    {
		
		$saldoDeDotacoes = array();
		$secretaria['unidade'] = auth()->user()->secretaria;
		$secretaria['codigo'] = DB::select("select codigo from unidade_orcamentarias where unidade='".$secretaria['unidade']."'");
		$secretaria['codigo'] = '01.16.00';
		$mensagem = '';
		$verificacao='';
		//return ($request);
		if ($request->filtro =='TODAS')
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::where('unidade_orcamentaria', 'LIKE', '%'.$secretaria['codigo'].'%')->get();		}
		else if ($request->filtro =='DOTACAO')
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::whereRaw('codigo_dotacao= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria['codigo'].'"')->get();
		}
		else if ($request->filtro =='EXECUTORA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::whereRaw('unidade_executora= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria['codigo'].'"')->get();
		}
		else if ($request->filtro =='CLASSIFICACAO_FUNCIONAL_PROGRAMATICA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::whereRaw('classificacao_funcional_programatica= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria['codigo'].'"')->get();
		}
		else if ($request->filtro =='NATUREZA_DE_DESPESA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::whereRaw('natureza_de_despesa= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria['codigo'].'"')->get();
		}
		else
		{
			$saldoDeDotacoes =  SaldoDeDotacao2019::where('unidade_orcamentaria', 'LIKE', '%'.$secretaria['codigo'].'%')->get();
		}
	
		if (count($saldoDeDotacoes) > 0)
		{
			// filtrando as Unidades Orçamentárias
			$i=0;
			foreach($saldoDeDotacoes as $saldo)
			{
				
				$unidadesOrcamentarias[$i]['codigo_orcamentaria'] = $saldo['unidade_orcamentaria'];
				$unidadesOrcamentarias[$i]['unidade_orcamentaria'] = DB::table('unidade_orcamentarias')->where('codigo', $unidadesOrcamentarias[$i]['codigo_orcamentaria'])->value('unidade');
				$i = $i+1;
			}
			for($j = 0; $j<sizeof($unidadesOrcamentarias); $j++)
				{	
					$unidadesOrcamentarias[$j]['dotacao'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->sum('dotacao');		
					
					$unidadesOrcamentarias[$j]['empenhado'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->sum('empenhado');	
					
					$unidadesOrcamentarias[$j]['saldo'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->sum('saldo');	
					
					$unidadesOrcamentarias[$j]['reserva'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->sum('reserva');	
					
				}
			
			$unidadesOrcamentarias = array_unique($unidadesOrcamentarias, SORT_REGULAR);
			
			//---------------------------------------------------------------------------------------------
			
			// filtrando as Unidades Executoras
			$i=0;
			foreach($saldoDeDotacoes as $saldo)
				{	
					$unidadesExecutoras[$i]['codigo_executora'] = $saldo['unidade_executora'];
					$unidadesExecutoras[$i]['codigo_orcamentaria'] = $saldo['unidade_orcamentaria'];
					$unidadesExecutoras[$i]['unidade_executora'] = DB::table('unidade_executoras')->where('codigo', $unidadesExecutoras[$i]['codigo_executora'])->value('unidade');
					$i = $i+1;
				}
			for($j = 0; $j<sizeof($unidadesExecutoras); $j++)
				{	
					$unidadesExecutoras[$j]['dotacao'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->sum('dotacao');		
					
					$unidadesExecutoras[$j]['empenhado'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->sum('empenhado');	
					
					$unidadesExecutoras[$j]['saldo'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->sum('saldo');	
					
					$unidadesExecutoras[$j]['reserva'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->sum('reserva');	
				}
			$unidadesExecutoras = array_unique($unidadesExecutoras, SORT_REGULAR);
			
			
			//---------------------------------------------------------------------------------------------
			
			//filtrando as Dotações e as Classificações Funcionais Programáticas e Valores
			$i=0;
			foreach($saldoDeDotacoes as $saldo)
				{
				$classificacoesFuncionais[$i]['codigo_classificacaoFuncionalProgramatica'] = $saldo['classificacao_funcional_programatica'];
				$classificacoesFuncionais[$i]['especificacao_classificacaoFuncionalProgramatica'] = DB::table('classificacao_funcional_programaticas')->where('codigo', $classificacoesFuncionais[$i]['codigo_classificacaoFuncionalProgramatica'])->value('especificacao');
				$classificacoesFuncionais[$i]['codigo_executora'] = $saldo['unidade_executora'];
				$classificacoesFuncionais[$i]['codigo_orcamentaria'] = $saldo['unidade_orcamentaria'];
				$classificacoesFuncionais[$i]['dotacao'] =  0;
				$i = $i+1;
				}
			for($j = 0; $j<sizeof($classificacoesFuncionais); $j++)
				{	
					$classificacoesFuncionais[$j]['dotacao'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->sum('dotacao');		
					
					$classificacoesFuncionais[$j]['empenhado'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->sum('empenhado');
					
					$classificacoesFuncionais[$j]['saldo'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->sum('saldo');
					
					$classificacoesFuncionais[$j]['reserva'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->sum('reserva');
				}
			$classificacoesFuncionais = array_unique($classificacoesFuncionais, SORT_REGULAR);		

			//---------------------------------------------------------------------------------------------

			//filtrando as Naturezas de Despesas, Dotacoes e Valores
			$i=0;
			foreach($saldoDeDotacoes as $saldo)
				{
				
					$naturezas_dotacoes_total[$i]['codigo_natureza'] = $saldo['natureza_de_despesa'];
					$naturezas_dotacoes_total[$i]['codigo_dotacao'] = $saldo['codigo_dotacao'];
					$naturezas_dotacoes_total[$i]['codigo_classificacaoFuncionalProgramatica'] = $saldo['classificacao_funcional_programatica'];
					$naturezas_dotacoes_total[$i]['especificacao_natureza'] = DB::table('natureza_de_despesas')->where('codigo', $naturezas_dotacoes_total[$i]['codigo_natureza'])->value('especificacao');
					$naturezas_dotacoes_total[$i]['codigo_executora'] = $saldo['unidade_executora'];
					$naturezas_dotacoes_total[$i]['codigo_orcamentaria'] = $saldo['unidade_orcamentaria'];
					$naturezas_dotacoes_total[$i]['dotacao'] =  0;
					
					$i = $i+1;
				}
			for($j = 0; $j<sizeof($naturezas_dotacoes_total); $j++)
				{	
					$naturezas_dotacoes_total[$j]['dotacao'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->sum('dotacao');		
					
					$naturezas_dotacoes_total[$j]['empenhado'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->sum('empenhado');	
					
					$naturezas_dotacoes_total[$j]['saldo'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->sum('saldo');	
					
					$naturezas_dotacoes_total[$j]['reserva'] = DB::table("saldo_de_dotacao2019s")
					->where('saldo_de_dotacao2019s.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacao2019s.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacao2019s.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->sum('reserva');	
				}
			$naturezas_dotacoes_total = array_unique($naturezas_dotacoes_total, SORT_REGULAR);


			//filtrando os Vinculos, Código de Dotações, Dotações, Empenhado e Saldo
			$i=0;
			foreach($saldoDeDotacoes as $saldo)
			{
				
				$vinculos_valores[$i]['codigo_vinculo'] = $saldo['vinculo'];
				$vinculos_valores[$i]['descricao_vinculo'] = DB::table('vinculos')->where('codigo', $vinculos_valores[$i]['codigo_vinculo'])->value('descricao');
				$vinculos_valores[$i]['codigo_dotacao'] = $saldo['codigo_dotacao'];
				$vinculos_valores[$i]['dotacao'] = $saldo['dotacao'];
				$vinculos_valores[$i]['empenhado'] = $saldo['empenhado'];
				$vinculos_valores[$i]['saldo'] = $saldo['saldo'];
				$vinculos_valores[$i]['reserva'] = $saldo['saldo'];
				
				$vinculos_valores[$i]['codigo_natureza'] = $saldo['natureza_de_despesa'];
				$vinculos_valores[$i]['codigo_classificacaoFuncionalProgramatica'] = $saldo['classificacao_funcional_programatica'];
				$vinculos_valores[$i]['codigo_executora'] = $saldo['unidade_executora'];
				$vinculos_valores[$i]['codigo_orcamentaria'] = $saldo['unidade_orcamentaria'];
						
				$i = $i+1;
			}
			
			$vinculos_valores = array_unique($vinculos_valores, SORT_REGULAR);
		}
		else
		{
			$verificacao = "ok";
			$mensagem = "Valor de pesquisa inválido, Dotação não encontrada!";
		}
	
		
		//return($saldoDeDotacoes );
		return view ('orcamento/saldo_dotacoes')->with('saldoDeDotacoes', $saldoDeDotacoes)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionais', $classificacoesFuncionais)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('vinculos_valores',$vinculos_valores)->with('mensagem',$mensagem)->with('verificacao',$verificacao);
	}
	
	public function criar_pdf(Request $request)
    {
		
		
		//return($request);
		$mpdf = new \Mpdf\Mpdf();
		$total = number_format($request->total,2,",",".");
		$html = '
				<html>
				<head>
				<style>
					
					
					
					
					@page{
					margin-right: 0.75cm;
					margin-left: 0.75cm;
					margin-top: 0.75cm;
					margin-bottom: 1cm;
					width: 21cm;
					
				
					}
				</style>
				</head>

				<body class="page">
					<div style="border:solid; border-width: 2px; height: 100%" >
									<div>
										<div>
											<div style="display:table-cell; vertical-align:middle; text-align:center; padding:10px">
												<br>
												<img src="img/logo_bertioga.jpg" style=" margin-left: auto;margin-right: auto; display: block; width:25%">
												<br>
												<h3 class="title" style="text-align: center; font-family: Arial;"><b>CRÉDITO ADICIONAL SUPLEMENTAR</b></h3>
												<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao1.'</h6>
												<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao2.'</h6>
												<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao3.'</h6>
												<p style="text-align:right; font-size:10px;  font-family: Arial;"> Lei Municipal nº1331/2018, Artº4</p>									
											</div>
											<div>
												<table width="100%" style="border-bottom:solid;border-top:solid;border-width: 1px; font-family: Arial; font-size:12px;">
													<tr>
														<td style="text-align:right">
														<b>DATA DA SOLICITAÇÃO:</b>
														</td>
														<td >
														'.$request->data.'
														</td>
														<td style="text-align:right">
														<b>INSTRUMENTO ADMINISTRATIVO: </b>
														</td>
														<td>
														'.$request->instrumento.' '.$request->numeroInstrumento.'
														</td>
													</tr>	
												</table>
												<h4 class="title" style="text-align: center; font-family: Arial;"><b>SUPLEMENTAÇÃO</b></h4>
												<table style="border-top:solid; border-bottom:solid; border-width: 1px; border-collapse: collapse;">
													<thead>
														<tr style="height:100px;  background-color:#E9EEF3; border-color:#000">
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000"><b>Dotação</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></p></th>
															<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></p></th>
														</tr>
													</thead>
													<tbody>';
													
													if(count($request->sup_codigo_dotacao) > 0)
													{
														
														for($i=0; $i < count($request->sup_codigo_dotacao); $i++)
															{
															if($request->sup_vinculo[$i] !=null)
															{
																
																$html .= '<tr style="height:100px;">
																		<td style="border-right:dotted; border-top:dotted;border-width:1px; width:100px;text-align: center;"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_unidade_executora[$i].'</div></td>
																		<td style="border-right:dotted;border-top:dotted;border-width:1px; width:150px;text-align: center;"><div class="form-control" style=" flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_classificacao_funcional[$i].'</div></td>
																		<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_natureza_despesa[$i].'</div></td>
																		<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_vinculo[$i].'</div></td>
																		<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_codigo_dotacao[$i].'</div></td>
																		<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center; font-family:arial">'.$request->sup_valor[$i].'</div></td>
																		<td style="border-top:dotted;border-width:1px; width:200;text-align: center;"><div class="form-control" style="width:100%; height:40px; font-family:arial">'.strtoupper($request->sup_justificativa[$i]).'</div></td>
																		<td style="border-top:dotted;border-width:1px;"></td>
																		</tr>';
															}
														};
														
													}
													else
													{
													
													};
													
					
													
												$html .='</tbody>
												</table>';
												
												if(!empty($request->anl_codigo_dotacao))
												{
			
													$html .='<h4 class="title" style="text-align: center; font-family: Arial;"><b>ANULAÇÃO</b></h4>
													<table style="border-top:solid; border-bottom:solid; border-width: 1px; border-collapse: collapse;">
														<thead>
															<tr style="height:100px;  background-color:#F5E3E3; border-color:#000">
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Unidade Executora</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 150px; line-height: 1.5; text-align:center; color:#000"><b>Classificação Funcional Programática</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 110px; line-height: 1.5; text-align:center; color:#000"><b>Natureza De Despesa</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Vínculo</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 50px; line-height: 1.5; text-align:center; color:#000"><b>Dotação</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000"><b>Justificativa</b></p></th>
																<th><p style="text-transform: uppercase;font-family:arial; font-size:12px; flex-wrap:nowrap; display: inline-block; width: 20px; line-height: 1.5; text-align:center; color:#000"><b></b></p></th>
															</tr>
														</thead>
														<tbody>';
													
														if(count($request->anl_codigo_dotacao) > 0)
														{
															
															for($i=0; $i < count($request->anl_codigo_dotacao); $i++)
																{
																if($request->anl_vinculo[$i] !=null)
																{
																	$html .= '<tr style="height:100px;">
																			<td style="border-right:dotted; border-top:dotted;border-width:1px; width:100px;text-align: center;"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->anl_unidade_executora[$i].'</div></td>
																			<td style="border-right:dotted;border-top:dotted;border-width:1px; width:150px;text-align: center;"><div class="form-control" style=" flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'.$request->anl_classificacao_funcional[$i].'</div></td>
																			<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->anl_natureza_despesa[$i].'</div></td>
																			<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->anl_vinculo[$i].'</div></td>
																			<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->anl_codigo_dotacao[$i].'</div></td>
																			<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->anl_valor[$i].'</div></td>
																			<td style="border-top:dotted;border-width:1px; width:200;text-align: center;"><div class="form-control" style="width:100%; height:40px;font-family:arial">'.strtoupper($request->anl_recurso[$i]).'</div></td>
																			<td style="border-top:dotted;border-width:1px;"></td>
																			</tr>';
																}
															};
															
														}
														else
														{
														
														};
														
						
														
													$html .='</tbody>
													
												
													
												</table>';
												};
												
												if(!empty($request->spt_valor))
												{
												
												$html .= '
												<h4 class="title" style="text-align: center; font-family: Arial;"><b>SUPERÁVIT FINANCEIRO</b></h4>
													<table style="border-top:solid; border-bottom:solid; border-width: 1px; border-collapse: collapse;">
														<thead>
															<tr style="height:100px;  background-color:#F5E3E3; border-color:#000">
																<th style="width:200px"><p style="text-transform: uppercase;font-family:arial; font-size:14px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></p></th>
																<th style="width:550px"><p style="text-transform: uppercase;font-family:arial; font-size:14px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></p></th>
															</tr>
														</thead>
														<tbody>';
														
														
														if(count($request->spt_valor) > 0)
														{
															
															for($i=0; $i < count($request->spt_valor); $i++)
																{
																if($request->spt_valor[$i] !=null)
																{
																	$html .= 	'<tr style="height:100px; ">
																					<td style="border-right:dotted;border-top:dotted;border-width:1px; width:500px;text-align: center;"><p style="text-transform: uppercase;font-family:arial; font-size:17px; flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000">'.$request->spt_valor[$i].'</p></td>
																					<td style="border-top:dotted;border-width:1px; width:500px;text-align: center;"><p style="text-transform: uppercase;font-family:arial; font-size:17px; flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 1.5; text-align:center; color:#000">'.$request->spt_recurso[$i].'</p></td>
																				</tr>';
																}
															};
															
														}
														else
														{
														
														};
														
														
															
													$html .='</tbody>
													</table>';
												};
												
												if(!empty($request->exc_valor))
												{
												
												$html .= '
												<h4 class="title" style="text-align: center; font-family: Arial;"><b>EXCESSO DE ARRECADAÇÃO</b></h4>
													<table style="border-top:solid; border-bottom:solid; border-width: 1px; border-collapse: collapse;">
														<thead>
															<tr style="height:100px;  background-color:#F5E3E3; border-color:#000">
																<th style="width:200px"><p style="text-transform: uppercase;font-family:arial; font-size:14px; flex-wrap:nowrap; display: inline-block; width: 100px; line-height: 1.5; text-align:center; color:#000"><b>Valor</b></p></th>
																<th style="width:550px"><p style="text-transform: uppercase;font-family:arial; font-size:14px; flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 1.5; text-align:center; color:#000"><b>Recurso</b></p></th>
															</tr>
														</thead>
														<tbody>';
														
														
														if(count($request->exc_valor) > 0)
														{
															
															for($i=0; $i < count($request->exc_valor); $i++)
																{
																if($request->exc_valor[$i] !=null)
																{
																	$html .= 	'<tr style="height:100px; ">
																					<td style="border-right:dotted;border-top:dotted;border-width:1px; width:500px;text-align: center;"><p style="text-transform: uppercase;font-family:arial; font-size:17px; flex-wrap:nowrap; display: inline-block; width: 200px; line-height: 1.5; text-align:center; color:#000">'.$request->exc_valor[$i].'</p></td>
																					<td style="border-top:dotted;border-width:1px; width:500px;text-align: center;"><p style="text-transform: uppercase;font-family:arial; font-size:17px; flex-wrap:nowrap; display: inline-block; width: 450px; line-height: 1.5; text-align:center; color:#000">'.$request->exc_recurso[$i].'</p></td>
																				</tr>';
																}
															};
															
														}
														else
														{
														
														};
														
														
															
													$html .='</tbody>
													</table>';
												};
													
												
												$html .= '
												<br>
												<table width="100%" style="border-bottom:solid;border-top:solid;border-width: 1px; font-family: Arial; font-size:14px;">
													<tr>
														<td style="text-align:right">
														<b>TOTAL DA ALTERAÇÃO ORÇAMENTÁRIA:</b>
														</td>
														<td >
														R$ '.$total.'
														</td>
														
													</tr>	
												</table>
												<table width="100%">
													<tr >
														<td style="text-align:right">
															<br>
															<br>
															<br>
															<br>
														</td>
													</tr>	
												</table>
												<br>
												<table align="center" width="50%" style="">											
													<tr style="text-align:center">
														<td style="width:300px; text-align:center; border-top:solid; border-width: 0.5px; font-size:10px;">
														NOME<br>
														GESTOR(A) ORÇAMENTÁRIO(A)
														</td>
														<td style="width:50px">
														</td>
														<td style="width:300px; text-align:center; border-top:solid; border-width: 0.5px; font-size:10px;">
														NOME<br>
														GESTOR(A) ORÇAMENTÁRIO(A)
														</td>
														
													</tr>
												</table>
												<br>
												<br>
												<br>
												<table align="center" width="50%" style="border-top:solid; border-width: 0.5px; font-size:10px;">											
													<tr style="text-align:center">
														<td style="text-align:center">
														SECRETARIO(A) <br>
														Data______/______/_______
														</td>
													</tr>
												</table>
											</div>
											<br>
											<br>
										</div>
									</div>
								</div>

				</body>
				</html>';
		
		
		$mpdf->WriteHTML($html);
		$mpdf->Output();
		
		return($request);
	}
	
	public function modalFormulario_credito_adicional_suplementar()
	{
		$total_suplementar=0;
		$total_anular=0;
		$mensagem = "";
		$mensagem_dotacao = "";
		$acao = "";
		
		$data = "";
		$tipoInstrumento="";
		$numeroInstrumento=array("","");
		
		$dotacoes_suplementacao= array();
		$dotacoes_anulacao= array();
		$anulacao = false;
		$superavit = false;
		$excesso = false;
		
		$superavit_valor_recurso = array();
		$excesso_valor_recurso = array();
		
		return view ("orcamento/modals/credito_adicional_suplementar")->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
		//return view("orcamento/modals/credito_adicional_suplementar");
	}
	
}
