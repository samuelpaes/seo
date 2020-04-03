<?php

namespace SEO\Http\Controllers;

use DB;
use SEO\UnidadeOrcamentaria;
use Illuminate\Http\Request;
use SEO\SaldoDeDotacao;
use SEO\UnidadeExecutora;
use SEO\ClassificacaoFuncionalProgramatica;
use SEO\NaturezaDeDespesa;
use SEO\FormularioAlteracaoOrcamentaria;
use SEO\Legislacao;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;


class OrcamentoController extends Controller
{
     public function formularios(Request $request)
    {
		//return($request);
		$total_suplementar=0;
		$total_anular=0;
		$mensagem = "";
		$mensagem_dotacao = "";
		$acao = "";
		$pesquisaFeita = "";
		
		$data = "";
		$tipoInstrumento="";
		$numeroInstrumento=array("","");
		
		$dotacoes_suplementacao= array();
		$dotacoes_anulacao= array();
		
		$superavit_valor_recurso = array();
		$excesso_valor_recurso = array();
		$formulario = "";
		$exercicio = date("Y");
		
		
		if($request->formulario <> null)
		{
			$formulario = $request->formulario;
		}

		if($request->acao <> null)
		{
			$acao = $request->acao;
		}
	
		if($acao == 'criar')
		{
			if($formulario == "credito_adicional_suplementar")
			{
				$anulacao = false;
				$superavit = false;
				$excesso = false;
				return view ('orcamento/formularios/credito_adicional_suplementar')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
			}
			else if ($formulario == "remanejamento_transposicao_transferencia")
			{
				$remanejamento = false;
				$transposicao = false;
				$transferencia = false;
				return view ('orcamento/formularios/remanejamento_transposicao_transferencia')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("remanejamento", $remanejamento)->with("transposicao", $transposicao)->with("transferencia", $transferencia)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao)->with("pesquisaFeita", $pesquisaFeita);
			}
		}
		else if($acao == 'pesquisar')
		{	$secretaria = Auth::user()->secretaria;
			
			if($request->filtro == "secretaria")
			{
				if($request->tipoFormulario <> "TODOS")
				{
					$formularios[] =  Informacao::all();		
				}
				else{
					$formularios[] = FormularioAlteracaoOrcamentaria::whereRaw("secretaria = '$request->secretaria'")->get();
				}
			}
			else if($request->filtro == "formulario")
			{
			
				if($request->tipoFormulario <> "TODOS")
				{
					
					$formularios[] =  FormularioAlteracaoOrcamentaria::where('secretaria', '=', $secretaria)->where('tipo_formulario', '=', $request->tipoFormulario)->get();		
					//return($formularios);
				}
				else{
					$formularios[] = FormularioAlteracaoOrcamentaria::whereRaw("secretaria = '$secretaria'")->get();
				}
			}
			else if($request->filtro == "instrumento")
			{
				if($request->tipoInstrumento == "PROCESSO")
				{
					$instrumento = $request->numeroInstrumento."/".$request->anoInstrumento;
					$formularios[] =  FormularioAlteracaoOrcamentaria::where('secretaria', '=', $secretaria)->where('tipo_instrumento', '=', $request->tipoInstrumento)->where('numero_instrumento', '=', $instrumento)->get();
				}
				else if($request->tipoInstrumento == "MEMORANDO")
				{
					$instrumento = $request->numeroInstrumento."/".$request->anoInstrumento;
					$formularios[] =  FormularioAlteracaoOrcamentaria::where('secretaria', '=', $secretaria)->where('tipo_instrumento', '=', $request->tipoInstrumento)->where('numero_instrumento', '=', $instrumento)->get();		
				}
				
				else{
					$instrumento = $request->numeroInstrumento."/".$request->anoInstrumento;
					$formularios[] = FormularioAlteracaoOrcamentaria::whereRaw("secretaria = '$secretaria'")->where('numero_instrumento', '=', $instrumento)->get();
				}
			}
			else if($request->filtro == "data")
			{	
				$formularios[] = FormularioAlteracaoOrcamentaria::whereDate('created_at', '=', $request->data)->get();
				//return($formularios);	
			}
			else{
				$formularios[] = FormularioAlteracaoOrcamentaria::whereRaw("secretaria = '$secretaria'")->get();
				
			}
			
			
			$pesquisaFeita = 'ok';
		
			
			return view ('orcamento/formularios')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao)->with("exercicio", $exercicio)->with("pesquisaFeita", $pesquisaFeita)->with("formularios", $formularios);

		}
		
		return view ('orcamento/formularios')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with("anulacao", $dotacoes_anulacao)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao)->with("exercicio", $exercicio)->with("pesquisaFeita", $pesquisaFeita);
		
	}
	
	 public function manual()
    {
	
		return view ('orcamento/manual');
	}
	
	public function leis_decretos(Request $request)
    {
	
		$pesquisaFeita="";
		$mensagem="";
		if($request->acao == "cadastrar")
		{
			
			if (Legislacao::whereRaw('instrumento = "'.$request->instrumento.'" and numero ="'.$request->numero.'" and esfera = "'.$request->esfera.'"')->count() == 0)
			{
				Legislacao::create([
					'instrumento' => $request->instrumento,
					'classificacao' => $request->classificacao,
					'numero' => $request->numero,
					'ano' => $request->ano,	
					'esfera' => $request->esfera,
					'observacao' => $request->observacao,
					'link' => $request->link,
				]);		
				
				$mensagem="Legislação ".$request->instrumento."/".$request->numero." cadastrada!";
				return view ('orcamento/leis_decretos')->with("legislacoes", $legislacoes)->with("pesquisaFeita", $pesquisaFeita)->with("mensagem", $mensagem);
			}
			else{
				$mensagem="Legislação ".$request->instrumento."/".$request->numero." já esta cadastrada!";
				return view ('orcamento/leis_decretos')->with("pesquisaFeita", $pesquisaFeita)->with("mensagem", $mensagem);
			}


		}
		else if($request->acao == "pesquisar")
		{
			//return($request);
			if($request->filtro == "instrumento")
			{
				$legislacoes[] = Legislacao::whereRaw("instrumento = '$request->instrumento'")->get();
			}
			else if($request->filtro == "classificacao")
			{
				$legislacoes[] = Legislacao::whereRaw("classificacao = '$request->classificacao'")->get();
			}
			else if($request->filtro == "numero/ano")
			{
				$legislacoes[] = Legislacao::where('numero', '=', $request->numero)->where('ano', '=', $request->ano)->get();
			}
			else if($request->filtro == "esfera")
			{
				$legislacoes[] = Legislacao::whereRaw("esfera = '$request->esfera'")->get();
			}
			$pesquisaFeita="ok";
			return view ('orcamento/leis_decretos')->with("legislacoes", $legislacoes)->with("pesquisaFeita", $pesquisaFeita);
		}	
		else
		{
			return view ('orcamento/leis_decretos')->with("pesquisaFeita", $pesquisaFeita);
		}
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

		$remanejamento = false;
		$transposicao = false;
		$transferencia = false;
		
		$data = "";
		$tipoInstrumento="";
		$numeroInstrumento=array("","");
		$total_suplementar=0;
		$total_anular=0;
		$dotacoes_suplementacao = array();
		$dotacoes_anulacao = array();
		$dotacoes_remanejamento = array();
		$dotacoes_transposicao = array();
		$dotacoes_transferencia = array();
		$dotacoes_suplementacao_vinculos = array();
		$dotacoes_anulacao_vinculos = array();
		$dotacoes_remanejamento_vinculos = array();
		$dotacoes_transposicao_vinculos = array();
		$dotacoes_transferencia_vinculos = array();
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
		
		//$formulario= "";
			
			
		//Verifica qual o tipo de formulario
				
		if($request->formulario == "credito_adicional_suplementar")
		{
		
			//Verifica a unidade Orçamentária do Gestor
			$unidade_orcamentaria = $request->unidade_orcamentaria;
			$unidade_orcamentaria = DB::table('unidade_orcamentarias')->where('unidade', $request->unidade_orcamentaria)->value('codigo');
			
		
			//return($request);
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
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						if($consulta == null)
						{
							$mensagem_dotacao='A dotação "'.$dotacao.'", não foi encontrada.';
						}	
						else if($consulta<>null and $consulta['unidade_orcamentaria'] == $unidade_orcamentaria)
						{
							$dotacoes_suplementacao[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						}
						else{
							$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações, pois trata-se de ficha associada a outra unidade orçamentária.';
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
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
					if($consulta == null)
					{
						$mensagem_dotacao='A dotação "'.$dotacao.'", não foi encontrada.';
					}	
					else if($consulta<>null and $consulta['unidade_orcamentaria'] == $unidade_orcamentaria)
					{
						$dotacoes_anulacao[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
					}
					else{
						$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações, pois trata-se de ficha associada a outra unidade orçamentária.';			
					}
				}
				else
				{
				}
				
			}
			
			if($request->acao == "suplementar")
			{
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
					array_splice($sup_vinculo, 0, 0, " ");
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
			
				$a=0;
				$anl_valor = $request->anl_valor;
				$anl_recurso = $request->anl_recurso;
				$anl_vinculo = $request->anl_vinculo;
				foreach($dotacoes_anulacao as $dotacao){
					foreach($request->anl_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$anl_valor[$a];
							$dotacao['recurso']=$anl_recurso[$a];
							$dotacao['vinculo']=$anl_vinculo[$a];
						}
					}
					$a++;
				}
			
			}
			else if($request->acao == "anular")
			{
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
							$dotacao['recurso']=$anl_recurso[$a];
							$dotacao['vinculo']=$anl_vinculo[$a];
						}
					}
					$a++;
				}
				
				$a=0;
				$sup_valor = $request->sup_valor;
				$sup_justificativa = $request->sup_justificativa;
				$sup_vinculo = $request->sup_vinculo;
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
			}
			
		
		
			if(!empty($dotacoes_suplementacao))
			{
				foreach($dotacoes_suplementacao as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_suplementacao_vinculos[] = $resultadoConsulta;
					
					/*$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						$dotacoes_suplementacao_vinculos[] = array_splice($dotacoes_suplementacao_vinculos, 3, 0, 'more');
						//array_push($dotacoes_suplementacao_vinculos, [['codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo]]);
					}*/
				}
				$dotacoes_suplementacao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_suplementacao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
		
			//
			if(!empty($dotacoes_anulacao))
			{
				foreach($dotacoes_anulacao as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_anulacao_vinculos[] = $resultadoConsulta;
					
					/*$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						$dotacoes_suplementacao_vinculos[] = array_splice($dotacoes_suplementacao_vinculos, 3, 0, 'more');
						//array_push($dotacoes_suplementacao_vinculos, [['codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo]]);
					}*/
				}
				$dotacoes_anulacao_vinculos = array_unique($dotacoes_anulacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_anulacao_vinculos = array_unique($dotacoes_anulacao_vinculos, SORT_REGULAR);




			//return($dotacoes_suplementacao);
			/*apagar
			if(!empty($dotacoes_anulacao))
			{
				foreach($dotacoes_anulacao as $dotacao)
				{
				$dotacoes_anulacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_anulacao_vinculos= array_unique($dotacoes_anulacao_vinculos, SORT_REGULAR);
			}
			else{
			}
			$dotacoes_anulacao_vinculos = array_unique($dotacoes_anulacao_vinculos, SORT_REGULAR);*/
			
			$mensagem = "ok";

			if($request->formulario <> null)
			{
				$formulario = $request->formulario;
			}
			
			//reordena as dotacoes
			asort($dotacoes_anulacao);
			asort($dotacoes_suplementacao);
			return view ('orcamento/formularios/credito_adicional_suplementar')->with('dotacoes_suplementacao', $dotacoes_suplementacao)->with('dotacoes_suplementacao_vinculos', $dotacoes_suplementacao_vinculos)->with('dotacoes_anulacao', $dotacoes_anulacao)->with('dotacoes_anulacao_vinculos', $dotacoes_anulacao_vinculos)->with("mensagem", $mensagem)->with("acao", $acao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
			
		}
		else if ($request->formulario =="remanejamento_transposicao_transferencia")
		{
	
			
			//Verifica a unidade Orçamentária do Gestor
			$unidade_orcamentaria = $request->unidade_orcamentaria;
			$unidade_orcamentaria = DB::table('unidade_orcamentarias')->where('unidade', $request->unidade_orcamentaria)->value('codigo');
			
			
			if($request->tipo_remanejamento == "ok")
			{
				$remanejamento = true;
			}
			
			if($request->tipo_transposicao == "ok")
			{
				$transposicao = true;
			}
			
			if($request->tipo_transferencia == "ok")
			{
				$transferencia = true;
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
			
			
			//Suplementar
			foreach ($request->sup_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
					if($consulta == null)
					{
						$mensagem_dotacao='A dotação "'.$dotacao.'", não foi encontrada.';
					}	
					else if($consulta<>null and $consulta['unidade_orcamentaria'] == $unidade_orcamentaria)
					{
						$dotacoes_suplementacao[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						$mensagem = "ok";
					}
					else{
						$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações, pois trata-se de ficha associada a outra unidade orçamentária.';
					}
				}
				else
				{
				}
				
			}


			if(!empty($dotacoes_suplementacao))
			{
				foreach($dotacoes_suplementacao as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_suplementacao_vinculos[] = $resultadoConsulta;
				}
				$dotacoes_suplementacao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_suplementacao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);

			/*
			if(!empty($dotacoes_suplementacao))
			{
				foreach($dotacoes_suplementacao as $dotacao)
				{
					$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_suplementacao_vinculos= array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
			}
			else{
			}
			$dotacoes_suplementacao_vinculos= array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);*/
			
			//Remanejar
			foreach ($request->rmj_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
					if($consulta == null)
					{
						$mensagem_dotacao='A dotação "'.$dotacao.'", não foi encontrada.';
					}		
					else if($consulta<>null)
					{
						$dotacoes_remanejamento[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						$mensagem = "ok";
					}
					else{
						$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações';
					}
				}
				else
				{
				}
				
			}
		
			if(!empty($dotacoes_remanejamento))
			{
				foreach($dotacoes_remanejamento as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_remanejamento_vinculos[] = $resultadoConsulta;
					
					/*$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						$dotacoes_suplementacao_vinculos[] = array_splice($dotacoes_suplementacao_vinculos, 3, 0, 'more');
						//array_push($dotacoes_suplementacao_vinculos, [['codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo]]);
					}*/
				}
				$dotacoes_remanejamento_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_remanejamento_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);

			/*if(!empty($dotacoes_remanejamento))
			{
				foreach($dotacoes_remanejamento as $dotacao)
				{
					$dotacoes_remanejamento_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_remanejamento_vinculos= array_unique($dotacoes_remanejamento_vinculos, SORT_REGULAR);
			}
			else{
			}*/
			
			//Transpor
			foreach ($request->tnp_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						if($consulta<>null)
						{
							$dotacoes_transposicao[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
							$mensagem = "ok";
						}
						else{
							$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações';
						}
				}
				else
				{
				}
				
			}
			
			if(!empty($dotacoes_transposicao))
			{
				foreach($dotacoes_transposicao as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_transposicao_vinculos[] = $resultadoConsulta;
					
					/*$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						$dotacoes_suplementacao_vinculos[] = array_splice($dotacoes_suplementacao_vinculos, 3, 0, 'more');
						//array_push($dotacoes_suplementacao_vinculos, [['codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo]]);
					}*/
				}
				$dotacoes_transposicao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_transposicao_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
			
			/*if(!empty($dotacoes_transposicao))
			{
				foreach($dotacoes_transposicao as $dotacao)
				{
					$dotacoes_transposicao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_transposicao_vinculos= array_unique($dotacoes_transposicao_vinculos, SORT_REGULAR);
			}
			else{
			}*/
			
			//Transferir
			foreach ($request->tnf_codigo_dotacao as $dotacao)
			{
				if($dotacao <> null)
				{
					$consulta = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
						if($consulta<>null)
						{
							$dotacoes_transferencia[] = SaldoDeDotacao::whereRaw("codigo_dotacao = '$dotacao'")->first();
							$mensagem = "ok";
						}
						else{
							$mensagem_dotacao='A dotação "'.$dotacao.'" não pode ser incluída para alterações';
						}
				}
				else
				{
				}
				
			}
			
			if(!empty($dotacoes_transferencia))
			{
				foreach($dotacoes_transferencia as $dotacao)
				{
					//resultado da consulta de vinculos no banco de dados
					$resultadoConsulta = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();;
					//verifica se o vinculo selecionado no formulário esta em branco e ignora se for o caso
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						//insere junto ao resultado da consulta de vinculos o vinculo selecionado no formulário
						$resultadoConsulta[] = array('codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo);
					}
					// converte o objeto em array
					$resultadoConsulta = json_decode(json_encode($resultadoConsulta), true);
					// remove os valore duplicados
					$resultadoConsulta = array_unique($resultadoConsulta, SORT_REGULAR);
					//copia o resultado para o objeto de vinculos
					$dotacoes_transferencia_vinculos[] = $resultadoConsulta;
					
					/*$dotacoes_suplementacao_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				
					if($dotacao->vinculo != " " && $dotacao->vinculo != null)
					{
						$dotacoes_suplementacao_vinculos[] = array_splice($dotacoes_suplementacao_vinculos, 3, 0, 'more');
						//array_push($dotacoes_suplementacao_vinculos, [['codigo_dotacao' => $dotacao->codigo_dotacao, 'vinculo' => $dotacao->vinculo]]);
					}*/
				}
				$dotacoes_transferencia_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);
				
			}
			else{
			}
			$dotacoes_transferencia_vinculos = array_unique($dotacoes_suplementacao_vinculos, SORT_REGULAR);

			/*if(!empty($dotacoes_transferencia))
			{
				foreach($dotacoes_transferencia as $dotacao)
				{
					$dotacoes_transferencia_vinculos[] = SaldoDeDotacao::select('codigo_dotacao','vinculo')->where('codigo_dotacao', $dotacao->codigo_dotacao)->get();
				}
				$dotacoes_transferencia_vinculos= array_unique($dotacoes_transferencia_vinculos, SORT_REGULAR);
			}
			else{
			}*/


			//////////////////////////////////////////////////////////////////////////////////////////////////

			if($request->acao == "suplementar")
			{
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
					array_splice($sup_vinculo, 0, 0, " ");
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
				
				$a=0;
				$rmj_valor = $request->rmj_valor;
				$rmj_recurso = $request->rmj_recurso;
				$rmj_vinculo = $request->rmj_vinculo;
				foreach($dotacoes_remanejamento as $dotacao){
					foreach($request->rmj_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$rmj_valor[$a];
							$dotacao['recurso']=$rmj_recurso[$a];
							$dotacao['vinculo']=$rmj_vinculo[$a];
						}
					}
					$a++;
				}

				$a=0;
				$tnp_valor = $request->tnp_valor;
				$tnp_recurso = $request->tnp_recurso;
				$tnp_vinculo = $request->tnp_vinculo;
				foreach($dotacoes_transposicao as $dotacao){
					foreach($request->tnp_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnp_valor[$a];
							$dotacao['recurso']=$tnp_recurso[$a];
							$dotacao['vinculo']=$tnp_vinculo[$a];
						}
					}
					$a++;
				}

				$a=0;
				$tnf_valor = $request->tnf_valor;
				$tnf_recurso = $request->tnf_recurso;
				$tnf_vinculo = $request->tnf_vinculo;
				foreach($dotacoes_transferencia as $dotacao){
					foreach($request->tnf_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnf_valor[$a];
							$dotacao['recurso']=$tnf_recurso[$a];
							$dotacao['vinculo']=$tnf_vinculo[$a];
						}
					}
					$a++;
				}
			
			}
			else if($request->acao == "remanejar")
			{
				$rmj_valor = $request->rmj_valor;
				if(!empty($rmj_valor))
				{
					array_splice($rmj_valor, 0, 0, "R$ 0,00");
				}
				
				$rmj_recurso = $request->rmj_recurso;
				if(!empty($rmj_recurso))
				{
					array_splice($rmj_recurso, 0, 0, "");
				}
				
				$rmj_vinculo = $request->rmj_vinculo;
				if(!empty($rmj_vinculo))
				{
					array_splice($rmj_vinculo, 0, 0, "");
				}
			
				$a=0;
				foreach($dotacoes_remanejamento as $dotacao){
					foreach($request->rmj_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$rmj_valor[$a];
							$dotacao['recurso']=$rmj_recurso[$a];
							$dotacao['vinculo']=$rmj_vinculo[$a];
						}
					}
					$a++;
				}
				
				$a=0;
				$sup_valor = $request->sup_valor;
				$sup_justificativa = $request->sup_justificativa;
				$sup_vinculo = $request->sup_vinculo;
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

				$a=0;
				$tnp_valor = $request->tnp_valor;
				$tnp_recurso = $request->tnp_recurso;
				$tnp_vinculo = $request->tnp_vinculo;
				foreach($dotacoes_transposicao as $dotacao){
					foreach($request->tnp_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnp_valor[$a];
							$dotacao['recurso']=$tnp_recurso[$a];
							$dotacao['vinculo']=$tnp_vinculo[$a];
						}
					}
					$a++;
				}

				$a=0;
				$tnf_valor = $request->tnf_valor;
				$tnf_recurso = $request->tnf_recurso;
				$tnf_vinculo = $request->tnf_vinculo;
				foreach($dotacoes_transferencia as $dotacao){
					foreach($request->tnf_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnf_valor[$a];
							$dotacao['recurso']=$tnf_recurso[$a];
							$dotacao['vinculo']=$tnf_vinculo[$a];
						}
					}
					$a++;
				}
			}
			else if($request->acao == "transpor")
			{
				$tnp_valor = $request->tnp_valor;
				if(!empty($tnp_valor))
				{
					array_splice($tnp_valor, 0, 0, "R$ 0,00");
				}
				
				$tnp_recurso = $request->tnp_recurso;
				if(!empty($tnp_recurso))
				{
					array_splice($tnp_recurso, 0, 0, "");
					
				}
				
				$tnp_vinculo = $request->tnp_vinculo;
				if(!empty($tnp_vinculo))
				{
					array_splice($tnp_vinculo, 0, 0, " ");
				}
				
				$a=0;
				foreach($dotacoes_transposicao as $dotacao){
					foreach($request->tnp_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnp_valor[$a];
							$dotacao['recurso']=$tnp_recurso[$a];
							$dotacao['vinculo']=$tnp_vinculo[$a];
						}
					}
					$a++;
				}
				
				$a=0;
				$sup_valor = $request->sup_valor;
				$sup_justificativa = $request->sup_justificativa;
				$sup_vinculo = $request->sup_vinculo;
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

				$a=0;
				$rmj_valor = $request->rmj_valor;
				$rmj_recurso = $request->rmj_recurso;
				$rmj_vinculo = $request->rmj_vinculo;
				foreach($dotacoes_remanejamento as $dotacao){
					foreach($request->rmj_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$rmj_valor[$a];
							$dotacao['recurso']=$rmj_recurso[$a];
							$dotacao['vinculo']=$rmj_vinculo[$a];
						}
					}
					$a++;
				}

				$a=0;
				$tnf_valor = $request->tnf_valor;
				$tnf_recurso = $request->tnf_recurso;
				$tnf_vinculo = $request->tnf_vinculo;
				foreach($dotacoes_transferencia as $dotacao){
					foreach($request->tnf_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnf_valor[$a];
							$dotacao['recurso']=$tnf_recurso[$a];
							$dotacao['vinculo']=$tnf_vinculo[$a];
						}
					}
					$a++;
				}
				
			}
			else if($request->acao == "transferir")
			{
				$tnf_valor = $request->tnf_valor;
				if(!empty($tnf_valor))
				{
					array_splice($tnf_valor, 0, 0, "R$ 0,00");
				}
				
				$tnf_recurso = $request->tnf_recurso;
				if(!empty($tnf_recurso))
				{
					array_splice($tnf_recurso, 0, 0, "");
					
				}
				
				$tnf_vinculo = $request->tnf_vinculo;
				if(!empty($tnf_vinculo))
				{
					array_splice($tnf_vinculo, 0, 0, " ");
				}
				
				$a=0;
				foreach($dotacoes_transferencia as $dotacao){
					foreach($request->tnf_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnf_valor[$a];
							$dotacao['recurso']=$tnf_recurso[$a];
							$dotacao['vinculo']=$tnf_vinculo[$a];
						}
					}
					$a++;
				}
				
				$a=0;
				$sup_valor = $request->sup_valor;
				$sup_justificativa = $request->sup_justificativa;
				$sup_vinculo = $request->sup_vinculo;
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

				$a=0;
				$rmj_valor = $request->rmj_valor;
				$rmj_recurso = $request->rmj_recurso;
				$rmj_vinculo = $request->rmj_vinculo;
				foreach($dotacoes_remanejamento as $dotacao){
					foreach($request->rmj_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$rmj_valor[$a];
							$dotacao['recurso']=$rmj_recurso[$a];
							$dotacao['vinculo']=$rmj_vinculo[$a];
						}
					}
					$a++;
				}
				
				$a=0;
				$tnp_valor = $request->tnp_valor;
				$tnp_recurso = $request->tnp_recurso;
				$tnp_vinculo = $request->tnp_vinculo;
				foreach($dotacoes_transposicao as $dotacao){
					foreach($request->tnp_codigo_dotacao as $codigo)
					{
						if($codigo == $dotacao['codigo_dotacao'])
						{
							$dotacao['valor']=$tnp_valor[$a];
							$dotacao['recurso']=$tnp_recurso[$a];
							$dotacao['vinculo']=$tnp_vinculo[$a];
						}
					}
					$a++;
				}
			}
			

			asort($dotacoes_suplementacao);
			asort($dotacoes_transferencia);
			asort($dotacoes_transposicao);
			asort($dotacoes_remanejamento);
			return view ('orcamento/formularios/remanejamento_transposicao_transferencia')->with("mensagem", $mensagem)->with("acao", $acao)->with("dotacoes_suplementacao", $dotacoes_suplementacao)->with('dotacoes_suplementacao_vinculos', $dotacoes_suplementacao_vinculos)->with("dotacoes_remanejamento", $dotacoes_remanejamento)->with('dotacoes_remanejamento_vinculos', $dotacoes_remanejamento_vinculos)->with("dotacoes_transposicao", $dotacoes_transposicao)->with('dotacoes_transposicao_vinculos', $dotacoes_transposicao_vinculos)->with("dotacoes_transferencia", $dotacoes_transferencia)->with('dotacoes_transferencia_vinculos', $dotacoes_transferencia_vinculos)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("remanejamento", $remanejamento)->with("transposicao", $transposicao)->with("transferencia", $transferencia)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
		}
		
		//return view ('orcamento/formularios')->with('dotacoes_suplementacao', $dotacoes_suplementacao)->with('dotacoes_suplementacao_vinculos', $dotacoes_suplementacao_vinculos)->with('dotacoes_anulacao', $dotacoes_anulacao)->with('dotacoes_anulacao_vinculos', $dotacoes_anulacao_vinculos)->with("mensagem", $mensagem)->with("acao", $acao)->with("total_suplementar", $total_suplementar)->with("total_anular", $total_anular)->with("anulacao", $anulacao)->with("superavit", $superavit)->with("excesso", $excesso)->with("data", $data)->with("tipoInstrumento", $tipoInstrumento)->with("numeroInstrumento", $numeroInstrumento)->with("superavit_valor_recurso", $superavit_valor_recurso)->with("excesso_valor_recurso", $excesso_valor_recurso)->with("mensagem_dotacao", $mensagem_dotacao);
	}
	public function saldo_dotacoes(Request $request)
    {
		
		$saldoDeDotacoes = array();
		$secretaria = auth()->user()->secretaria;
		//$teste = DB::select("select codigo from unidade_orcamentarias where unidade='".$secretaria."'");
		//$secretaria = DB::table('unidade_orcamentarias')->where('unidade', $secretaria)->first();
		$secretaria =  UnidadeOrcamentaria::where('unidade', '=', ''.$secretaria.'')->first('codigo');
		$secretaria_codigo = $secretaria['codigo'];

		
		//$secretaria_codigo = $secretaria['codigo'];
		$mensagem = '';
		$verificacao='';
		
		$exercicio = $request->exercicio;
	
		if ($request->filtro =='TODAS')
		{
			$saldoDeDotacoes =  SaldoDeDotacao::where('unidade_orcamentaria', 'LIKE', '%'.$secretaria_codigo.'%')->where('exercicio', '=', "$request->exercicio")->get();		
		}
		else if ($request->filtro =='DOTACAO')
		{
			$saldoDeDotacoes =  SaldoDeDotacao::where('codigo_dotacao', '=', '%'.$request->codigo.'%')->where('unidade_orcamentaria', '=', "$secretaria_codigo")->where('exercicio', '=', "$request->exercicio")->get();		
			//$saldoDeDotacoes =  SaldoDeDotacao::whereRaw('codigo_dotacao= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria['codigo'].'"')->get();
		}
		else if ($request->filtro =='EXECUTORA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao::whereRaw('unidade_executora= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria_codigo.'"')->get();
		}
		else if ($request->filtro =='CLASSIFICACAO_FUNCIONAL_PROGRAMATICA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao::whereRaw('classificacao_funcional_programatica= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria_codigo.'"')->get();
		}
		else if ($request->filtro =='NATUREZA_DE_DESPESA')
		{
			$saldoDeDotacoes =  SaldoDeDotacao::whereRaw('natureza_de_despesa= "'.$request->codigo.'" and unidade_orcamentaria ="'.$secretaria_codigo.'"')->get();
		}
		else
		{
			$exercicio = date("Y");
			$saldoDeDotacoes =  SaldoDeDotacao::where('unidade_orcamentaria', 'LIKE', '%'.$secretaria_codigo.'%')->where('exercicio', '=', "$exercicio")->get();
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
					$unidadesOrcamentarias[$j]['dotacao'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('dotacao');		
					
					$unidadesOrcamentarias[$j]['empenhado'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('empenhado');	
					
					$unidadesOrcamentarias[$j]['saldo'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('saldo');	
					
					$unidadesOrcamentarias[$j]['reserva'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=', $unidadesOrcamentarias[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
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
					$unidadesExecutoras[$j]['dotacao'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->where('exercicio', '=', $exercicio)
					->sum('dotacao');		
					
					$unidadesExecutoras[$j]['empenhado'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->where('exercicio', '=', $exercicio)
					->sum('empenhado');	
					
					$unidadesExecutoras[$j]['saldo'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->where('exercicio', '=', $exercicio)
					->sum('saldo');	
					
					$unidadesExecutoras[$j]['reserva'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.unidade_executora', '=', $unidadesExecutoras[$j]['codigo_executora'])
					->where('exercicio', '=', $exercicio)
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
					$classificacoesFuncionais[$j]['dotacao'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('dotacao');		
					
					$classificacoesFuncionais[$j]['empenhado'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('empenhado');
					
					$classificacoesFuncionais[$j]['saldo'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('saldo');
					
					$classificacoesFuncionais[$j]['reserva'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $classificacoesFuncionais[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $classificacoesFuncionais[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $classificacoesFuncionais[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
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
				//return($naturezas_dotacoes_total);
			for($j = 0; $j<sizeof($naturezas_dotacoes_total); $j++)
				{	
					$naturezas_dotacoes_total[$j]['dotacao'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $naturezas_dotacoes_total[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('dotacao');		
					
					$naturezas_dotacoes_total[$j]['empenhado'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=',  $naturezas_dotacoes_total[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('empenhado');	
					
					$naturezas_dotacoes_total[$j]['saldo'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $naturezas_dotacoes_total[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('saldo');	
					
					$naturezas_dotacoes_total[$j]['reserva'] = DB::table("saldo_de_dotacaos")
					->where('saldo_de_dotacaos.natureza_de_despesa', '=', $naturezas_dotacoes_total[$j]['codigo_natureza'])
					->where('saldo_de_dotacaos.classificacao_funcional_programatica', '=', $naturezas_dotacoes_total[$j]['codigo_classificacaoFuncionalProgramatica'])
					->where('saldo_de_dotacaos.unidade_executora', '=',  $naturezas_dotacoes_total[$j]['codigo_executora'])
					->where('saldo_de_dotacaos.unidade_orcamentaria', '=',  $naturezas_dotacoes_total[$j]['codigo_orcamentaria'])
					->where('exercicio', '=', $exercicio)
					->sum('reserva');	
				}
			$naturezas_dotacoes_total = array_unique($naturezas_dotacoes_total, SORT_REGULAR);
			//return($naturezas_dotacoes_total);

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
	
		
		
		return view ('orcamento/saldo_dotacoes')->with('saldoDeDotacoes', $saldoDeDotacoes)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionais', $classificacoesFuncionais)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('vinculos_valores',$vinculos_valores)->with('mensagem',$mensagem)->with('verificacao',$verificacao)->with('exercicio',$exercicio);
	}
	
	public function criar_pdf(Request $request)
    {
		
		$acao = "";
		$pesquisaFeita = "";
		$exercicio = date("Y"); 
		$mensagem="";
		$exercicioLei = $exercicio-1;
		
		$loa = Legislacao::whereRaw('classificacao = "LOA" and ano ="'.$exercicioLei.'" ')->firstOrFail("numero");
		$ldo = Legislacao::whereRaw('classificacao = "LDO" and ano ="'.$exercicioLei.'" ')->firstOrFail("numero");
		if($request->tipo_alteracao == "CREDITO ADICIONAL SUPLEMENTAR")
		{
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
			
			$total = number_format($request->total,2,",",".");

			$html = '
					<html>
					<head>
					<style>
				
					
						@page{
						margin-right: 0.60cm;
						margin-left: 0.60cm;
						margin-top: 1cm;
						margin-bottom: 1cm;
						
						overflow:auto;
				
						background:{{url("img/pdf_backgroundBorder.png ")}};
						background-repeat: no-repeat;
					
						
						}
					</style>
					</head>

								<body class="page">
									<div>
										<div>
											<div>
												<div style="display:table-cell; vertical-align:middle; text-align:center; padding:5px">
													<br>
													<img src="img/logo_bertioga.png" style=" margin-left: auto;margin-right: auto; display: block; width:80%">
													<h3 class="title" style="text-align: center; font-family: Arial; line-height: 0.4"><b>CRÉDITO ADICIONAL SUPLEMENTAR</b></h3>
													<h3 class="title" style="text-align: center; font-family: Arial; line-height: 0.4"><b>'.$request->secretaria.'</b></h3>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao1.'</h6>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao2.'</h6>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao3.'</h6>
													<p style="text-align:right; font-size:10px;  font-family: Arial;">Lei '.$loa->numero.'/'.$exercicioLei.'</p>									
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
													
												</div>
												<br>
												<br>
											</div>
										</div>
									</div>

					</body>
					</html>';
			
					
			$mpdf->WriteHTML($html);
			$mpdf->SetHTMLFooter('

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
		
			<br>');
					
			
			//verifica quantos formularios de Credito Adicional Complementar Existem
			$cas = DB::table('formulario_alteracao_orcamentarias')->where('tipo_formulario', $request->tipo_alteracao)->count();
			$cas = $cas+1;
			if (FormularioAlteracaoOrcamentaria::whereRaw('numero_instrumento = "'.$request->numeroInstrumento.'" and valor ="'.$request->total.'" and tipo_formulario = "'. $request->tipo_alteracao.'" and secretaria ="'.$request->secretaria.'"')->count() == 0)
			{
				FormularioAlteracaoOrcamentaria::create([
					'codigo_formulario' => "cas_".$cas,
					'tipo_instrumento' => $request->instrumento,
					'numero_instrumento' => $request->numeroInstrumento,
					'tipo_formulario' => $request->tipo_alteracao,	
					'exercicio' => date("Y"),
					'secretaria' => $request->secretaria,
					'valor' => $request->total,
					'usuario' => Auth::user()->registro,
					'path' => '123',
				]);		

				$mpdf->Output('files/formularios_alteracao_orcamentaria/cas_'.$cas.'.pdf');
				$mpdf->Output();


				$mensagem="Formulário para ".$request->tipo_alteracao." gerado";
			}
			else{
				
				$mensagem="Já Existe Formulário Gerado Para Esta Alteração Orçamentária - ".$request->instrumento." ".$request->numeroInstrumento;
			}
			
			
		}
		else if ($request->tipo_alteracao == "REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA")
		{
			//return($request);
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
			
			$total = number_format($request->total,2,",",".");

			$html = '
					<html>
					<head>
					<style>
				
					
						@page{
						margin-right: 0.60cm;
						margin-left: 0.60cm;
						margin-top: 1cm;
						margin-bottom: 1cm;
						
						overflow:auto;
				
						background:{{url("img/pdf_backgroundBorder.png ")}};
						background-repeat: no-repeat;
					
						
						}
					</style>
					</head>

								<body class="page">
									<div>
										<div>
											<div>
												<div style="display:table-cell; vertical-align:middle; text-align:center; padding:5px">
													<br>
													<img src="img/logo_bertioga.png" style=" margin-left: auto;margin-right: auto; display: block; width:80%">
													<h3 class="title" style="text-align: center; font-family: Arial; line-height: 0.4"><b>REMANEJAMENTO, TRANSPOSIÇÃO E TRANSFERÊNCIA</b></h3>
													<h3 class="title" style="text-align: center; font-family: Arial; line-height: 0.4"><b>'.$request->secretaria.'</b></h3>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao1.'</h6>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao2.'</h6>
													<h6 style="line-height: 0.05; font-family:arial">'.$request->tipo_suplementacao3.'</h6>
													<p style="text-align:right; font-size:10px;  font-family: Arial;">Lei '.$ldo->numero.'/'.$exercicioLei.'</p>									
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
													
													if(!empty($request->rmj_codigo_dotacao))
													{
														
														$html .='<h4 class="title" style="text-align: center; font-family: Arial;"><b>REMANEJAMENTO</b></h4>
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
														
															if(count($request->rmj_codigo_dotacao) > 0)
															{
																
															
																for($i=0; $i < count($request->rmj_codigo_dotacao); $i++)
																	{
																	if($request->rmj_vinculo[$i] !=null)
																	{
																		$html .= '<tr style="height:100px;">
																				<td style="border-right:dotted; border-top:dotted;border-width:1px; width:100px;text-align: center;"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->rmj_unidade_executora[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:150px;text-align: center;"><div class="form-control" style=" flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'.$request->rmj_classificacao_funcional[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->rmj_natureza_despesa[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->rmj_vinculo[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->rmj_codigo_dotacao[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->rmj_valor[$i].'</div></td>
																				<td style="border-top:dotted;border-width:1px; width:200;text-align: center;"><div class="form-control" style="width:100%; height:40px;font-family:arial">'.strtoupper($request->rmj_recurso[$i]).'</div></td>
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
													
													if(!empty($request->tnp_codigo_dotacao))
													{
				
														$html .='<h4 class="title" style="text-align: center; font-family: Arial;"><b>TRANSPOSIÇÃO</b></h4>
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
															
															if(count($request->tnp_codigo_dotacao) > 0)
															{
																
																for($i=0; $i < count($request->tnp_codigo_dotacao); $i++)
																	{
																	if($request->tnp_vinculo[$i] !=null)
																	{
																		$html .= '<tr style="height:100px;">
																				<td style="border-right:dotted; border-top:dotted;border-width:1px; width:100px;text-align: center;"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnp_unidade_executora[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:150px;text-align: center;"><div class="form-control" style=" flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'.$request->tnp_classificacao_funcional[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnp_natureza_despesa[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnp_vinculo[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnp_codigo_dotacao[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnp_valor[$i].'</div></td>
																				<td style="border-top:dotted;border-width:1px; width:200;text-align: center;"><div class="form-control" style="width:100%; height:40px;font-family:arial">'.strtoupper($request->tnp_recurso[$i]).'</div></td>
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
													
													if(!empty($request->tnf_codigo_dotacao))
													{
														
														$html .='<h4 class="title" style="text-align: center; font-family: Arial;"><b>TRANSFERÊNCIA</b></h4>
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
														
															if(count($request->tnf_codigo_dotacao) > 0)
															{
																
															
																for($i=0; $i < count($request->tnf_codigo_dotacao); $i++)
																	{
																	if($request->tnf_vinculo[$i] !=null)
																	{
																		$html .= '<tr style="height:100px;">
																				<td style="border-right:dotted; border-top:dotted;border-width:1px; width:100px;text-align: center;"><div class="form-control" style="flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnf_unidade_executora[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:150px;text-align: center;"><div class="form-control" style=" flex-wrap:nowrap; display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;">'.$request->tnf_classificacao_funcional[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnf_natureza_despesa[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnf_vinculo[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnf_codigo_dotacao[$i].'</div></td>
																				<td style="border-right:dotted;border-top:dotted;border-width:1px; width:110px;text-align: center;"><div class="form-control" style="display:hidden; border:none; background:none; color:#000; font-weight:normal; height:auto; width:auto; text-align:center;font-family:arial">'.$request->tnf_valor[$i].'</div></td>
																				<td style="border-top:dotted;border-width:1px; width:200;text-align: center;"><div class="form-control" style="width:100%; height:40px;font-family:arial">'.strtoupper($request->tnf_recurso[$i]).'</div></td>
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
													
												</div>
												<br>
												<br>
											</div>
										</div>
									</div>

					</body>
					</html>';
			
					
			$mpdf->WriteHTML($html);
			$mpdf->SetHTMLFooter('

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
		
			<br>');
			//verifica quantos formularios de Credito Adicional Complementar Existem
			$rtt = DB::table('formulario_alteracao_orcamentarias')->where('tipo_formulario', $request->tipo_alteracao)->count();
			$rtt = $rtt+1;
			if (FormularioAlteracaoOrcamentaria::whereRaw('numero_instrumento = "'.$request->numeroInstrumento.'" and valor ="'.$request->total.'" and tipo_formulario = "'. $request->tipo_alteracao.'" and secretaria ="'.$request->secretaria.'"')->count() == 0)
			{
				FormularioAlteracaoOrcamentaria::create([
					'codigo_formulario' => "rtt_".$rtt,
					'tipo_instrumento' => $request->instrumento,
					'numero_instrumento' => $request->numeroInstrumento,
					'tipo_formulario' => $request->tipo_alteracao,	
					'exercicio' => date("Y"),
					'secretaria' => $request->secretaria,
					'valor' => $request->total,
					'usuario' => Auth::user()->registro,
					'path' => '123',
				]);		

				
				$mpdf->Output('files/formularios_alteracao_orcamentaria/rtt_'.$rtt.'.pdf','F');
				$mpdf->Output();

				$mensagem="Formulário para ".$request->tipo_alteracao." gerado";
				

			}
			else{
				$mensagem="Já Existe Formulário Gerado Para Esta Alteração Orçamentária - ".$request->instrumento." ".$request->numeroInstrumento;

			}
		}
	
		return view ('orcamento/formularios')->with("mensagem", $mensagem)->with("acao", $acao)->with("pesquisaFeita", $pesquisaFeita)->with("exercicio", $exercicio);
	
	}
	
	
}
