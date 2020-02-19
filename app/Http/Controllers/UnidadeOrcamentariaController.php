<?php

namespace SEO\Http\Controllers;

use SEO\UnidadeOrcamentaria;
use SEO\UnidadeExecutora;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use SEO\Http\Controllers\mysqli;
use Rap2hpoutre\FastExcel\FastExcel;


class UnidadeOrcamentariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$unidade_naoLocalizada = "";
		$mostrar ='';
		$pesquisaFeita = '';
        return view('unidade-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
		$unidade_naoLocalizada = "";
		$mostrar ='';
		$pesquisaFeita = '';
		$unidadeOrcamentariaJaExiste='';
		$unidade = "orcamentaria";
		$mensagem='';
		$data['unidade'] = strtoupper($data['unidade']);
		
		// Verifica se esta sendo importado um arquivo
		if ($data->nomeDoArquivo <> null)
		{
			$colecoes = (new FastExcel)->import('imported_files/'.$data->nomeDoArquivo);	
			
			// Remove linhas em branco da planilha
			for($i=0; $i <sizeof($colecoes); $i++)
			{	
			
				$keys = array_keys($colecoes[$i]);
				$keys[array_search($keys[0], $keys)] = 'codigo';
				$keys[array_search($keys[1], $keys)] = 'unidade';
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
				//Verifica se existe unidade orçamentária já cadastrada
				if (DB::table('unidade_orcamentarias')->where('codigo', $colecao['codigo'])->count() == 0 AND $colecao['codigo'] <> "") 
				{
					$colecao['codigo'] = strtoupper($colecao['codigo']);
					$colecao['unidade'] = strtoupper($colecao['unidade']);
					UnidadeOrcamentaria::create([
						'codigo' => $colecao['codigo'],
						'unidade' => $colecao['unidade'],
					]);		

					$mensagem='Unidade Cadastrada com Sucesso!';
				}
				//Caso exista grava o código da unidade Orçamentária
				else
				{
					$unidadeOrcamentariaJaExiste=$unidadeOrcamentariaJaExiste.' - '.$colecao['codigo'];
					
					$unidadeOrcamentariaJaExiste=$unidadeOrcamentariaJaExiste.' - '.$colecao['codigo'];
						if( $unidadeOrcamentariaJaExiste <> ' - ')
						{
							$mensagem='As Unidades Orçamentárias' .$unidadeOrcamentariaJaExiste. ' já existem!';;
						}
						else{
						};
				};
			};
			//return('ta sendo importado');
			return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('unidade', $unidade)->with('mensagem', $mensagem);
		}
		
		// Caso contrario cria um registro novo
		else
		{
			if (DB::table('unidade_orcamentarias')->where('codigo', $data['codigo'])->count() == "0") 
			{
					UnidadeOrcamentaria::create([
						'codigo' => $data['codigo'],
						'unidade' => $data['unidade'],
					]);
					
					$mensagem='Unidade Cadastrada com Sucesso!';
			}
			else
			{
					$unidadeOrcamentariaJaExiste=$unidadeOrcamentariaJaExiste.$data['codigo'].'.';
					$mensagem='A Unidade Orçamentária ' .$unidadeOrcamentariaJaExiste. ' já existe!';
			}
			//return($data);
			return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('unidade', $unidade)->with('mensagem', $mensagem);
		}
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
     * @param  \SEO\UnidadeOrcamentaria  $unidadeOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
		// carrega as variáveis de controle
		$mostrar ='';
		$pesquisaFeita = 'ok';
		
		// carrega o tipo de pesquisa
		$unidade = $request['filtro'];
		$codigo = $request['codigo'];
	
		// verifica o tipo de pesquisa
		if ($unidade == "ORCAMENTARIA") //caso pesquisa através da unidade orcamentaria
		{	
			if ($codigo == '') //caso pesquisa SEM código retorna todas as unidades orçamentarias com suas respectivas unidades executoras
			{ 
				$unidadesOrcamentarias =  UnidadeOrcamentaria::all();
			
			}
			else //caso pesquisa COM código retornaa unidade orçamentaria pesquisada com suas respectivas unidades executoras
			{ 
				$unidadesOrcamentarias = DB::select("select * from unidade_orcamentarias where codigo='$codigo'");
				
				if ($unidadesOrcamentarias <> null)
				{		
					$unidade_naoLocalizada = "";
				}
				else
				{
					$unidade_naoLocalizada = "ok";
					$pesquisaFeita = '';
				}
			}
			$unidadesExecutoras= UnidadeExecutora::all();
			
			
			
		}
		
		else if ($unidade == "EXECUTORA") //caso pesquisa através da unidade executora
		{
			if ($codigo == '') //caso pesquisa SEM código retorna todas as unidades executoras com suas respectivas unidades orçamentarias
			{ 
				$unidadesOrcamentarias =  UnidadeOrcamentaria::all();
				$unidadesExecutoras= UnidadeExecutora::all();
				$unidade_naoLocalizada = "";
			}
			else //caso pesquisa COM código retorna a unidade executora pesquisada com sua respectiva unidade orcamentaria
			{
				$unidadeOrcamentaria = DB::select("select unidade_orcamentaria from unidade_executoras where codigo='$codigo'");
								
				if ($unidadeOrcamentaria <> null)
				{		
					$unidade_naoLocalizada = "";
					$unidadeOrcamentaria = $unidadeOrcamentaria[0]->unidade_orcamentaria;
					$unidadesOrcamentarias = DB::select("select * from unidade_orcamentarias where unidade='$unidadeOrcamentaria'");
					$unidadesExecutoras  = DB::select("select * from unidade_executoras where codigo='$codigo'");
				}
				else
				{
					$unidade_naoLocalizada = "ok";
					$unidadesOrcamentarias =  null;
					$unidadesExecutoras= null;
					$pesquisaFeita = '';
				}
			}
			
		}
		else
		{
				$unidadesOrcamentarias =  UnidadeOrcamentaria::all();
				$unidadesExecutoras= UnidadeExecutora::all();
				$unidade_naoLocalizada = "";
		}
      
	  return view('unidade-orcamentaria/index', compact('unidadesOrcamentarias'))->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidadesExecutoras', $unidadesExecutoras)->with('unidade_naoLocalizada', $unidade_naoLocalizada);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\UnidadeOrcamentaria  $unidadeOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadeOrcamentaria $unidadeOrcamentaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\UnidadeOrcamentaria  $unidadeOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadeOrcamentaria $unidadeOrcamentaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\UnidadeOrcamentaria  $unidadeOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadeOrcamentaria $unidadeOrcamentaria)
    {
        //
    }
	
	 public function cadastrar()
    {
		$pesquisaFeita="";
		$unidadeOrcamentariaJaExiste='';
		$mensagem='';
		$unidade='orcamentaria';
		
		return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidade', $unidade);
			
	//return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem);*/
	}
	
	public function importar(Request $request)
    {
		$unidadeOrcamentariaJaExiste='';
		$arquivo = $request->file('arquivo');
		$nome = $arquivo->getClientOriginalName();
		$unidade = 'orcamentaria';
		if($arquivo->getClientOriginalExtension() == "xlsx")
		{
			$mensagem = '';
			$caminho = $arquivo->getRealPath();
			$caminhoDestino = 'C:/xampp/htdocs/seo/public/imported_files/';
			$arquivo->move($caminhoDestino,$arquivo->getClientOriginalName());
			$colecoes = (new FastExcel)->import('imported_files/'.$nome);
			$pesquisaFeita='';
			
			
			//verifica se há a quantidade de indices exigida para upload do arquivo
			if(count($colecoes[0]) > 2)
			{
				for($i=0; $i <sizeof($colecoes); $i++)
				{
					/*$oldkey="";
					$colecoes[$i] = array_change_key_case($colecoes[$i], CASE_LOWER);*/
					
					$keys = array_keys($colecoes[$i]);
					$keys[array_search($keys[0], $keys)] = 'codigo';
					$keys[array_search($keys[1], $keys)] = 'unidade';
					$colecoes[$i] = array_combine($keys, $colecoes[$i]);
				}
			
			
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
				$mensagem="Arquivo fora do formato exigido para importação. Verificar índices!";
			}
		
		}
		else
		{
			$mensagem="Tipo de arquivo não permitido!";
		}
		
		//return ($colecoes);
		return view('unidade-orcamentaria/cadastrar', compact('colecoes'))->with('mensagem', $mensagem)->with('nome', $nome)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('unidade', $unidade);

	}
}
