<?php

namespace SEO\Http\Controllers;

use SEO\ClassificacaoFuncionalProgramatica;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use SEO\Http\Controllers\mysqli;
use Rap2hpoutre\FastExcel\FastExcel;


class ClassificacaoFuncionalProgramaticaController extends Controller
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
		$mensagem='';
		return view('classificacao-funcional-programatica/index')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('mensagem', $mensagem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
	   $classificacaoFuncionalProgramáticaJaExiste='';
	   $mensagem='';
	   $pesquisaFeita="";
	   
	   
	   // Verifica se esta sendo importado um arquivo
		if ($data->nomeDoArquivo <> null)
		{
			$colecoes = (new FastExcel)->import('imported_files/'.$data->nomeDoArquivo);	
			
			// Remove linhas em branco da planilha e converte o indice para letra minúscula
			for($i=0; $i <sizeof($colecoes); $i++)
			{	
			
				$keys = array_keys($colecoes[$i]);
				$keys[array_search($keys[0], $keys)] = 'codigo';
				$keys[array_search($keys[1], $keys)]= 'especificacao';
				$keys[array_search($keys[2], $keys)] = 'tipo';
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
				if (DB::table('classificacao_funcional_programaticas')->where('codigo', $colecao['codigo'])->count() == 0 AND $colecao['codigo'] <> "") 
				{
					$condition1=true;
				}
				else
				{
					$condition1=false;
				}
					
				if (DB::table('classificacao_funcional_programaticas')->where('especificacao', $colecao['especificacao'])->count() == 0 AND $colecao['especificacao'] <> "") 
				{
					$condition2=true;
				}
				else
				{
					$condition2=false;
				}
				
				//Verifica se existe natureza ja cadastrada
				if ($condition1 == true and $condition2 == true) 
				{
					$encoding = 'UTF-8';
					$colecao['codigo'] = mb_convert_case($colecao['codigo'], MB_CASE_UPPER, $encoding);
					$colecao['especificacao'] = mb_convert_case($colecao['especificacao'], MB_CASE_UPPER, $encoding);
					ClassificacaoFuncionalProgramatica::create([
						'codigo' => $colecao['codigo'],
						'especificacao' => $colecao['especificacao'],
					
					]);		

					$mensagem='Classificação Funcional Programática Cadastrada Com Sucesso!';
				}
				//Caso exista grava o código da natureza da despesa
				else
				{
					$classificacaoFuncionalProgramáticaJaExiste=$classificacaoFuncionalProgramáticaJaExiste.' - '.$colecao['codigo'];
						if( $classificacaoFuncionalProgramáticaJaExiste <> ' - ')
						{
							$mensagem='A Classificação Funcional Programática ' .$classificacaoFuncionalProgramáticaJaExiste. ' já existe!';;
						}
						else{
						};
				
				};
			};
		//return ($naturezaDeDespesasJaExiste);
		return view('classificacao-funcional-programatica/index')->with('classificacaoFuncionalProgramáticaJaExiste', $classificacaoFuncionalProgramáticaJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('mensagem', $mensagem);				
		}
		
		// Caso contrario cria um registro novo
		else{
			$encoding = 'UTF-8';
			$data['especificacao'] = mb_convert_case($data['especificacao'] , MB_CASE_UPPER, $encoding);
			
			if (DB::table('classificacao_funcional_programaticas')->where('codigo', $data['codigo'])->count() == 0 AND $data['codigo'] <> "") 
				{
					$condition1=true;
				}
				else
				{
					$condition1=false;
				}
					
				if (DB::table('classificacao_funcional_programaticas')->where('especificacao', $data['especificacao'])->count() == 0 AND $data['especificacao'] <> "") 
				{
					$condition2=true;
				}
				else
				{
					$condition2=false;
				}
			
			if ($condition1 == true and $condition2 == true)  
				{
					$condition1=true;
				}
				else
				{
					$condition1=false;
				}
					
				if (DB::table('classificacao_funcional_programaticas')->where('especificacao', $data['especificacao'])->count() == 0 AND $colecao['especificacao'] <> "") 
				{
					$condition2=true;
				}
				else
				{
					$condition2=false;
				}
			
			
			//Verifica se existe natureza ja cadastrada
			if (DB::table('classificacao_funcional_programaticas')->where('codigo', $data['codigo'])->count() == "0") 
			{
				ClassificacaoFuncionalProgramatica::create([
					'codigo' => $data['codigo'],
					'especificacao' => $data['especificacao'],
			
				]);
				
					$mensagem='Classificação Funcional Programática Cadastrada Com Sucesso!';
			}
			else
			{
				$classificacaoFuncionalProgramáticaJaExiste=$classificacaoFuncionalProgramáticaJaExiste.$data['codigo'].'.';
				$mensagem='A Classificação Funcional Programática ' .$classificacaoFuncionalProgramáticaJaExiste. ' já existe!';
			}
			
	
		return view('classificacao-funcional-programatica/index')->with('classificacaoFuncionalProgramáticaJaExiste', $classificacaoFuncionalProgramáticaJaExiste)->with('pesquisaFeita', $pesquisaFeita)->with('mensagem', $mensagem);
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
     * @param  \SEO\Vinculos  $vinculos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $data)
    {
		$mensagem = "";
		$filtro = $data->filtro;
        if ($filtro == 'TODAS'){
			$classificacoesFuncionaisProgramaticas = ClassificacaoFuncionalProgramatica::all();
			
		}
		elseif($filtro == 'CODIGO'){
			$classificacoesFuncionaisProgramaticas = DB::select("select * from classificacao_funcional_programaticas where codigo='$data->valor'");
			$classificacoesFuncionaisProgramaticas =  ClassificacaoFuncionalProgramatica::where('codigo', 'LIKE', '%'.$data->valor.'%')->get();

		}
		elseif($filtro == 'ESPECIFICACAO'){
			//$classificacoesFuncionaisProgramaticas = DB::select("select * from classificacao_funcional_programaticas where especificacao='$data->valor'");
			$filtro = "ESPECIFICAÇÃO";
			$classificacoesFuncionaisProgramaticas =  ClassificacaoFuncionalProgramatica::where('especificacao', 'LIKE', '%'.$data->valor.'%')->get();
			
		}
		
		$pesquisaFeita="ok";
		
		return view('classificacao-funcional-programatica/index', compact('classificacoesFuncionaisProgramaticas'))->with('pesquisaFeita', $pesquisaFeita)->with('filtro', $filtro)->with('mensagem', $mensagem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\Vinculos  $vinculos
     * @return \Illuminate\Http\Response
     */
    public function edit(Vinculos $vinculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\Vinculos  $vinculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vinculos $vinculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\Vinculos  $vinculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vinculos $vinculos)
    {
        //
    }
	 public function cadastrar()
    {
		$pesquisaFeita="";
		$unidadeOrcamentariaJaExiste='';
		$mensagem='';
		$unidade='orcamentaria';
		
		return view('classificacao-funcional-programatica/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidade', $unidade);
			
	//return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem);*/
	}
	
	public function importar(Request $request)
    {
	$classificacaoFuncionalProgramáticaJaExiste='Relação das Classificações Funcionais Programáticas não importadas/cadastradas: ';
	$arquivo = $request->file('arquivo');
	$nome = $arquivo->getClientOriginalName();
	if($arquivo->getClientOriginalExtension() == "xlsx")
	{
		
		$caminho = $arquivo->getRealPath();
		$caminhoDestino = 'C:/xampp/htdocs/seo/public/imported_files/';
		$arquivo->move($caminhoDestino,$arquivo->getClientOriginalName());
		$colecoes = (new FastExcel)->import('imported_files/'.$nome);
		$mensagem = '';
		$pesquisaFeita='';
		
		for($i=0; $i <sizeof($colecoes); $i++)
		{
			/*$oldkey="";
			$colecoes[$i] = array_change_key_case($colecoes[$i], CASE_LOWER);*/
			
			$keys = array_keys($colecoes[$i]);
			$keys[array_search($keys[0], $keys)] = 'codigo';
			$keys[array_search($keys[1], $keys)] = 'especificacao';
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
		return view('classificacao-funcional-programatica/cadastrar', compact('colecoes'))->with('mensagem', $mensagem)->with('nome', $nome)->with('classificacaoFuncionalProgramáticaJaExiste', $classificacaoFuncionalProgramáticaJaExiste)->with('pesquisaFeita', $pesquisaFeita);

	}
	
	
}
