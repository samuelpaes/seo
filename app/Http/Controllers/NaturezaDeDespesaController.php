<?php

namespace SEO\Http\Controllers;

use SEO\NaturezaDeDespesa;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use SEO\Http\Controllers\mysqli;
use Rap2hpoutre\FastExcel\FastExcel;

$mensagem = '';
class NaturezaDeDespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$naturezaDeDespesasJaExiste='';
		$pesquisaFeita ='';
		$mensagem ='';
		return view('natureza-de-despesa/index')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('mensagem',$mensagem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
		$pesquisaFeita = '';
		$mensagem = '';
		$naturezaDeDespesasJaExiste='';
		
		// Verifica se esta sendo importado um arquivo
		if ($data->nomeDoArquivo <> null)
		{
			$colecoes = (new FastExcel)->import('imported_files/'.$data->nomeDoArquivo);	
			
			// Remove linhas em branco da planilha e converte o indice para letra minúscula
			for($i=0; $i <sizeof($colecoes); $i++)
			{	
			
				$keys = array_keys($colecoes[$i]);
				$keys[array_search($keys[0], $keys)] = 'codigo';
				$keys[array_search($keys[1], $keys)] = 'tipo';
				$keys[array_search($keys[2], $keys)]= 'especificacao';
				$colecoes[$i] = array_combine($keys, $colecoes[$i]);
				
				if ($colecoes[$i]['codigo'] == "")
				{		
					unset($colecoes[$i]);
				}
				else
				{
				};		
			}
			
			foreach ($colecoes as $colecao)
			{	
				//Verifica se existe natureza ja cadastrada
				if (DB::table('natureza_de_despesas')->where('codigo', $colecao['codigo'])->count() == 0 AND $colecao['codigo'] <> "") 
				{
					$encoding = 'UTF-8';
					$colecao['especificacao'] = mb_convert_case($colecao['especificacao'], MB_CASE_UPPER, $encoding);
					$colecao['tipo'] = mb_convert_case($colecao['tipo'], MB_CASE_UPPER, $encoding);
					
					NaturezaDeDespesa::create([
						'codigo' => $colecao['codigo'],
						'especificacao' => $colecao['especificacao'],
						'tipo' => $colecao['tipo'],	
					]);		

					$mensagem='Naturezas De Despesas Cadastradas Com Sucesso!';
				}
				//Caso exista grava o código da natureza da despesa
				else
				{
					$naturezaDeDespesasJaExiste=$naturezaDeDespesasJaExiste.' - '.$colecao['codigo'];
					
					$naturezaDeDespesasJaExiste=$naturezaDeDespesasJaExiste.' - '.$colecao['codigo'];
						if( $naturezaDeDespesasJaExiste <> ' - ')
						{
							$mensagem='As Naturezas de Despesas' .$naturezaDeDespesasJaExiste. ' já existem!';;
						}
						else{
						};
				};
			};
		//return ($naturezaDeDespesasJaExiste);
		return view('natureza-de-despesa/index')->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('mensagem',$mensagem);				
		}
		
		// Caso contrario cria um registro novo
		else{
			//Verifica se existe natureza ja cadastrada
			if (DB::table('natureza_de_despesas')->where('codigo', $data['codigo'])->count() == "0") 
			{
				$encoding = 'UTF-8';
				$data['especificacao'] = mb_convert_case($data['especificacao'], MB_CASE_UPPER, $encoding);
				$data['tipo'] = mb_convert_case($data['tipo'], MB_CASE_UPPER, $encoding);
			
				NaturezaDeDespesa::create([
					'codigo' => $data['codigo'],
					'especificacao' => $data['especificacao'],
					'tipo' => $data['tipo'],	
				]);
				
				$mensagem='Natureza De Despesa Cadastrada Com Sucesso!';
			}
			else
			{
				$naturezaDeDespesasJaExiste=$naturezaDeDespesasJaExiste.$data['codigo'].'.';
				$mensagem='A Natureza de Despesa' .$naturezaDeDespesasJaExiste. ' já existe!';;
			}
			
		//return ($naturezaDeDespesasJaExiste);
		return view('natureza-de-despesa/index')->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('mensagem',$mensagem);	
		};
		
		
			
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \SEO\NaturezaDeDespesa  $naturezaDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $data)
    {
		$mensagem = '';
		$naturezaDeDespesasJaExiste='';
		$filtro = $data->filtro;
		strtoupper($data);
		if ($filtro == 'TODAS'){
			$naturezasDeDespesas = NaturezaDeDespesa::all();
		}
		elseif($filtro == 'CODIGO'){
			//$naturezasDeDespesas = DB::select("select * from natureza_de_despesas where codigo='$data->valor'");
			$naturezasDeDespesas =  NaturezaDeDespesa::where('codigo', 'LIKE', '%'.$data->valor.'%')->get();
			$filtro = "CÓDIGO";
		}
		elseif($filtro == 'ESPECIFICACAO'){
			//$naturezasDeDespesas = DB::select("select * from natureza_de_despesas where especificacao='$data->valor'");
			$naturezasDeDespesas =  NaturezaDeDespesa::where('especificacao', 'LIKE', '%'.$data->valor.'%')->get();
			$filtro = "ESPECIFICAÇÃO";
		}
		elseif($filtro == 'TIPO'){
			//$naturezasDeDespesas = DB::select("select * from natureza_de_despesas where tipo='$data->valor'");
			$naturezasDeDespesas =  NaturezaDeDespesa::where('tipo', 'LIKE', '%'.$data->valor2.'%')->get();
		};
		$pesquisaFeita="ok";
		
		return view('natureza-de-despesa/index', compact('naturezasDeDespesas'))->with('pesquisaFeita', $pesquisaFeita)->with('filtro', $filtro)->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('mensagem',$mensagem);
		//return ($data->valor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\NaturezaDeDespesa  $naturezaDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function edit(NaturezaDeDespesa $naturezaDeDespesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\NaturezaDeDespesa  $naturezaDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NaturezaDeDespesa $naturezaDeDespesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\NaturezaDeDespesa  $naturezaDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(NaturezaDeDespesa $naturezaDeDespesa)
    {
        //
    }
	
	 public function cadastrar()
    {
        $pesquisaFeita="";
		$naturezaDeDespesasJaExiste='';
		$mensagem='';
		
		return view('natureza-de-despesa/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('mensagem', $mensagem);
    }
	
	public function importar(Request $request)
    {

	$naturezaDeDespesasJaExiste='';
	$arquivo = $request->file('arquivo');
	$nome = $arquivo->getClientOriginalName();
	$mensagem = '';
	if($arquivo->getClientOriginalExtension() == "xlsx")
	{
		
		$caminho = $arquivo->getRealPath();
		$caminhoDestino = 'C:/xampp/htdocs/seo/public/imported_files/';
		$arquivo->move($caminhoDestino,$arquivo->getClientOriginalName());
		$colecoes = (new FastExcel)->import('imported_files/'.$nome);

		$pesquisaFeita='';
		for($i=0; $i <sizeof($colecoes); $i++)
		{
			/*$oldkey="";
			$colecoes[$i] = array_change_key_case($colecoes[$i], CASE_LOWER);*/
			
			$keys = array_keys($colecoes[$i]);
			$keys[array_search($keys[0], $keys)] = 'codigo';
			$keys[array_search($keys[1], $keys)] = 'tipo';
			$keys[array_search($keys[2], $keys)]= 'especificacao';
			$colecoes[$i] = array_combine($keys, $colecoes[$i]);
		}
		
		
		
		if (array_key_exists("codigo", $colecoes[0])) 
		{
			$pesquisaFeita ='ok';
			// Remove linhas em branco da planilha
			$contador=0;
			foreach ($colecoes as $colecao)
			{
				$contador = $contador+1;
				if ($colecao['codigo'] == "")
				{
					unset($colecoes[$contador]);
				}
				else
				{
				}
			
			}
		}
		else
		{
			$mensagem="Arquivo fora do formato exigido para importação!";
		}
	
	}
	else
	{
		$mensagem="Tipo de arquivo não permitido!";
	}
	
		//return ($colecoes);
		return view('natureza-de-despesa/cadastrar', compact('colecoes'))->with('mensagem', $mensagem)->with('nome', $nome)->with('naturezaDeDespesasJaExiste', $naturezaDeDespesasJaExiste)->with('pesquisaFeita', $pesquisaFeita);

	}
	
}
