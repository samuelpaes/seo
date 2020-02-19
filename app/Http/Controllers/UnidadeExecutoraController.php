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

class UnidadeExecutoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
		$unidadeExecutoraJaExiste='';
		$unidade = "executora";
		$mensagem='';
		
		$encoding = 'UTF-8';
		$data['unidade'] = mb_convert_case($data['unidade'], MB_CASE_UPPER, $encoding);
		$data['unidade_orcamentaria'] = mb_convert_case($data['unidade_orcamentaria'], MB_CASE_UPPER, $encoding);
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
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
				$keys[array_search($keys[2], $keys)] = 'unidade_orcamentaria';
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
				if (DB::table('unidade_executoras')->where('codigo', $colecao['codigo'])->count() == 0 AND $colecao['codigo'] <> "") 
				{
					$colecao['unidade'] = strtoupper($colecao['unidade']);
					$colecao['unidade_orcamentaria'] = strtoupper($colecao['unidade_orcamentaria']);
					UnidadeExecutora::create([
						'codigo' => $colecao['codigo'],
						'unidade' => $colecao['unidade'],
						'unidade_orcamentaria' => $colecao['unidade_orcamentaria'],
					]);		

					$mensagem='Unidade Cadastrada com Sucesso!';
				}
				//Caso exista grava o código da unidade Orçamentária
				else
				{
					$unidadeOrcamentariaJaExiste=$unidadeExecutoraJaExiste.' - '.$colecao['codigo'];
					
					$unidadeExecutoraJaExiste=$unidadeExecutoraJaExiste.' - '.$colecao['codigo'];
						if( $unidadeExecutoraJaExiste <> ' - ')
						{
							$mensagem='As Unidades Executoras' .$unidadeExecutoraJaExiste. ' já existem!';;
						}
						else{
						};
				};
			};
			//return($colecoes);
			return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('unidade', $unidade)->with('mensagem', $mensagem)->with('unidadesOrcamentarias', $unidadesOrcamentarias);
		}
		else
		{
		
			if (DB::table('unidade_executoras')->where('codigo', $data['codigo'])->count() == "0") 
			{
				$condition1=true;
			}
			else
			{
				$condition1=false;
			}
			
			if (DB::table('unidade_executoras')->where('unidade', $data['unidade'])->count() == "0") 
			{
				$condition2=true;
			}
			else
			{
				$condition2=false;
			}
		
			if ($condition1 == true and $condition2 == true) 
			{
				UnidadeExecutora::create([
					'codigo' => $data['codigo'],
					'unidade' => $data['unidade'],
					'unidade_orcamentaria' => $data['unidade_orcamentaria'],
				]);
				
				$mensagem='Unidade Cadastrada com Sucesso!';
			}
			else
			{
				$unidadeExecutoraJaExiste=$unidadeExecutoraJaExiste.$data['codigo'].'.';
				$mensagem='A Unidade Executora ' .$unidadeExecutoraJaExiste. ' j? existe!';
			}
			return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('unidade', $unidade)->with('mensagem', $mensagem)->with('unidadesOrcamentarias', $unidadesOrcamentarias);
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
     * @param  \SEO\UnidadeExecutora  $unidadeExecutora
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadeExecutora $unidadeExecutora)
    {
		$pesquisaFeita="ok";
		$mostrar='ok';
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
		$unidadesExecutoras= UnidadeExecutora::all();
        return view('unidade-orcamentaria/index')->with('mostrar', $mostrar)->with('pesquisaFeita', $pesquisaFeita)->with('unidadesOrcamentarias',$unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\UnidadeExecutora  $unidadeExecutora
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadeExecutora $unidadeExecutora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\UnidadeExecutora  $unidadeExecutora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadeExecutora $unidadeExecutora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\UnidadeExecutora  $unidadeExecutora
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadeExecutora $unidadeExecutora)
    {
        //
    }
	
	 public function cadastrar()
    {
		
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
		$pesquisaFeita="";
		$unidadeExecutoraJaExiste='';
		$mensagem='';
		$unidade='executora';
		
		return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeExecutoraJaExiste)->with('mensagem', $mensagem)->with('unidade', $unidade)->with('unidadesOrcamentarias', $unidadesOrcamentarias);
			
	//return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeExecutoraJaExiste)->with('mensagem', $mensagem);*/
	}
	
	public function importar(Request $request)
    {
	$unidadeExecutoraJaExiste='';
	$arquivo = $request->file('arquivo');
	$nome = $arquivo->getClientOriginalName();
	$unidade = 'executora';
	$unidadesOrcamentarias = UnidadeOrcamentaria::all();

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
				$keys[array_search($keys[2], $keys)] = 'unidade_orcamentaria';
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
	
		//return($colecoes);
		return view('unidade-orcamentaria/cadastrar', compact('colecoes'))->with('mensagem', $mensagem)->with('nome', $nome)->with('naturezaDeDespesasJaExiste', $unidadeExecutoraJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('unidade', $unidade)->with('unidadesOrcamentarias', $unidadesOrcamentarias);

	}
}
