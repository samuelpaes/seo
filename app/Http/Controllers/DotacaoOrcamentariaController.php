<?php

namespace SEO\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use SEO\ClassificacaoFuncionalProgramatica;
use SEO\DotacaoOrcamentaria;
use SEO\UnidadeOrcamentaria;
use SEO\UnidadeExecutora;
use SEO\Vinculos;
use SEO\SaldodeDotacao;
use SEO\NaturezaDeDespesa;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use SEO\Http\Controllers\mysqli;
use Rap2hpoutre\FastExcel\FastExcel;
use Artisan;
use Input;

class DotacaoOrcamentariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$pesquisaFeita = '';
		$unidade_naoLocalizada= '';
		$verificacao = "";
		$indiceA="";
		$mensagem = "";

	//return($natureza_dotacao_total);
	return view ('dotacao-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('mensagem', $mensagem)->with('indiceA', $indiceA)->with('verificacao', $verificacao);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
			$indiceA=0;
			$verificacao="";
			$dotacao_nao_incluida="";
			$unidade_naoLocalizada="";
			$pesquisaFeita="";
			$SaldodeDotacaos = SaldodeDotacao::all();
			$laco = sizeof($data->unidadeExecutora);
			$mensagem = "";
			//return($data);
			for($i=1; $i <= $laco; $i++)
				{
					//$teste = SaldodeDotacaos::whereRaw('codigo_dotacao= "'.$data->codigo_dotacao[$i].'" and vinculo ="'.$data->vinculo[$i].'" and natureza_de_despesa = "'. $data->naturezaDeDespesa[$i].'"')->count();
					$j=0;
					if (SaldodeDotacao::whereRaw('codigo_dotacao= "'.$data->codigo_dotacao[$i].'" and vinculo ="'.$data->vinculo[$i].'" and natureza_de_despesa = "'. $data->naturezaDeDespesa[$i].'"and exercicio = "'. $data->exercicio[$i].'"')->count() == 0)
					{
						
						SaldodeDotacao::create([
							'exercicio' =>$data->exercicio,
							'unidade_orcamentaria' =>$data->unidadeOrcamentaria,
							'unidade_executora' => $data->unidadeExecutora[$i],
							'classificacao_funcional_programatica' => $data->classificacaoFuncional[$i],
							'natureza_de_despesa' => $data->naturezaDeDespesa[$i],
							'codigo_dotacao' => $data->codigo_dotacao[$i],
							'vinculo' => $data->vinculo[$i],
							'dotacao' => str_replace(array(".",","),array("", "."),$data->dotacao[$i]),
							'empenhado' => str_replace(array(".",","),array("", "."),$data->empenhado[$i]),
							'saldo' => str_replace(array(".",","),array("", "."),$data->saldo[$i]),
							'reserva' => str_replace(array(".",","),array("", "."),$data->reserva[$i]),
							
						]);
						
						$mensagem='Dotação incluída com Sucesso!';
						$verificacao='Sucesso';
						
					}
					else
					{
						$j = $j++;
						if($j >0)
						{
							$dotacao_nao_incluida = $data->codigo_dotacao[$i].', '.$dotacao_nao_incluida;
							$mensagem='As Dotações '.$dotacao_nao_incluida.' não foram incluidas!';
						}
						else
						{
							$mensagem='A Dotação '.$data->codigo_dotacao[$i].' não foi incluída!';
						}
						
					}
					
				}
		
		return view ('dotacao-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('pesquisaFeita', $pesquisaFeita)->with('mensagem', $mensagem)->with('SaldodeDotacaos', $SaldodeDotacaos)->with('indiceA', $indiceA)->with('verificacao', $verificacao);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$SaldodeDotacaos = SaldodeDotacao::all();
		return  ($SaldodeDotacaos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SEO\DotacaoOrcamentaria  $dotacaoOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
		$pesquisaFeita = '';
		$unidade_naoLocalizada= '';
		$verificacao = "";
		$mensagem = "";
		$indiceA = 0;
		$unidadesOrcamentarias=array();
		$unidadesExecutoras=array();
		$classificacoesFuncionais=array();
		$naturezas_dotacoes_total=array();
		$vinculos_valores=array();
		
	if ($request->filtro =='TODAS')
	{
		$SaldodeDotacaos = SaldodeDotacao::all();
	}
	else if ($request->filtro =='ORCAMENTARIA')
	{
		$SaldodeDotacaos =  SaldodeDotacaos::where('unidade_orcamentaria', '==', '%'.$request->codigo.'%')->firstOrFail();
	}
	else if ($request->filtro =='EXECUTORA'){
		$SaldodeDotacaos =  SaldodeDotacaos::where('unidade_executora', 'LIKE', '%'.$request->codigo.'%')->firstOrFail();
	}
	else if ($request->filtro =='DOTACAO'){
		$SaldodeDotacaos =  SaldodeDotacaos::whereRaw('codigo_dotacao = '.$request->codigo.'')->get();
	}
	else{
		$SaldodeDotacaos = SaldodeDotacao::all();
	}
	
	if (count($SaldodeDotacaos) > 0)
	{
		$pesquisaFeita = 'ok';
	// filtrando as Unidades Orçamentárias
		$i=0;
		foreach($SaldodeDotacaos as $saldo)
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
		foreach($SaldodeDotacaos as $saldo)
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
		foreach($SaldodeDotacaos as $saldo)
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
		foreach($SaldodeDotacaos as $saldo)
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
		foreach($SaldodeDotacaos as $saldo)
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
	
	//return  ($vinculos_valores);
	return view ('dotacao-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('mensagem', $mensagem)->with('verificacao', $verificacao)->with('SaldodeDotacaos', $SaldodeDotacaos)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionais', $classificacoesFuncionais)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('naturezas_dotacoes_total', $naturezas_dotacoes_total)->with('vinculos_valores',$vinculos_valores)->with('indiceA',$indiceA);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\DotacaoOrcamentaria  $dotacaoOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
       return ($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\DotacaoOrcamentaria  $dotacaoOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
			
		$pesquisaFeita = '';
		$unidade_naoLocalizada= '';
		$verificacao = 'Sucesso';
		$mensagem = "A Dotação foi atualizada com Sucesso!";
		$indiceA="";
		
		$SaldodeDotacaos = SaldodeDotacao::all();
		
		$dotacao = SaldodeDotacaos::where([
			'codigo_dotacao' => $request->codigo_dotacao,
			'vinculo' => $request->codigo_vinculo,
		])->first();
       
	   $request->dotacao = str_replace("R$", " ", $request->dotacao);
	   $request->empenhado = str_replace("R$", " ", $request->empenhado);
	   $request->saldo = str_replace("R$", " ", $request->saldo);
	   $request->reserva = str_replace("R$", " ", $request->reserva);
	   
	   //Set user object attributes
       $request->dotacao = str_replace(array(".",","),array("", "."),$request->dotacao);
       $request->empenhado = str_replace(array(".",","),array("", "."),$request->empenhado);
       $request->saldo = str_replace(array(".",","),array("", "."),$request->saldo);
	   $request->reserva = str_replace(array(".",","),array("", "."),$request->reserva);
	
        // Save/update user. 
        // This will will update your the row in ur db.
       $dotacao->save();
	   
	   
	  return view ('dotacao-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('mensagem', $mensagem)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('indiceA', $indiceA)->with('verificacao', $verificacao);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\DotacaoOrcamentaria  $dotacaoOrcamentaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(DotacaoOrcamentaria $dotacaoOrcamentaria)
    {
        //
    }
	
	public function cadastrarExercicioExistente(Request $request)
    {
        $pesquisaFeita="";
		$dotacaoOrcamentariaJaExiste='';
		$verificacao='';
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
		$unidadesExecutoras= UnidadeExecutora::all();
		$mensagem = "";

		if($request->acao == "implementar")
		{
			$pesquisaFeita="ok";
			$dotacaoOrcamentariaJaExiste='';
			$verificacao='';
			$mensagem='';
			$unidadesOrcamentarias = UnidadeOrcamentaria::all();
			$unidadeOrcamentaria = DB::select("select * from unidade_orcamentarias where codigo='$request->unidade_orcamentaria'");
			$unidadesExecutoras = UnidadeExecutora::all();
			$classificacoesFuncionaisProgramaticas = ClassificacaoFuncionalProgramatica::all();
			$vinculos  = Vinculos::all();
			$naturezasDeDespesas = NaturezaDeDespesa::all();
		
			

				return('oi');
				
				//return view('dotacao-orcamentaria/implementar')->with('pesquisaFeita', $pesquisaFeita)->with('dotacaoOrcamentariaJaExiste', $dotacaoOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidadeOrcamentaria', $unidadeOrcamentaria)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionaisProgramaticas',$classificacoesFuncionaisProgramaticas)->with('vinculos', $vinculos)->with('naturezasDeDespesas', $naturezasDeDespesas)->with('exercicio', $exercicio);
			
		}
		else if ($acao =="importar")
		{

		}

		return view('dotacao-orcamentaria/cadastrarExercicioExistente')->with('pesquisaFeita', $pesquisaFeita)->with('dotacaoOrcamentariaJaExiste', $dotacaoOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidadesOrcamentarias', $unidadesOrcamentarias);
	}
	
	public function cadastrarNovoExercicio(Request $request)
    {
		$mensagem = "";
        $pesquisaFeita="";
		$dotacaoOrcamentariaJaExiste='';
		$verificacao='';
		
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
		$unidadesExecutoras= UnidadeExecutora::all();
		$classificacoesFuncionaisProgramaticas = ClassificacaoFuncionalProgramatica::all();
		$vinculos  = Vinculos::all();
		$naturezasDeDespesas = NaturezaDeDespesa::all();
		
		$unidadeOrcamentaria = DB::select("select * from unidade_orcamentarias where codigo='$request->unidade_orcamentaria'");
		
		
		$acao = $request->acao;
		$exercicio = $request->exercicio;
		
		if($acao == "implementar")
		{
			$pesquisaFeita="ok";
			return view('dotacao-orcamentaria/implementar')->with('unidadeOrcamentaria', $unidadeOrcamentaria)->with('exercicio', $exercicio)->with('pesquisaFeita', $pesquisaFeita)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionaisProgramaticas', $classificacoesFuncionaisProgramaticas)->with('vinculos', $vinculos)->with('naturezasDeDespesas', $naturezasDeDespesas)->with('pesquisaFeita', $pesquisaFeita)->with('dotacaoOrcamentariaJaExiste', $dotacaoOrcamentariaJaExiste)->with('mensagem', $mensagem);
		}
		return view('dotacao-orcamentaria/cadastrarNovoExercicio')->with('pesquisaFeita', $pesquisaFeita)->with('dotacaoOrcamentariaJaExiste', $dotacaoOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidadesOrcamentarias', $unidadesOrcamentarias);
    }
	
	public function implementar(Request $request)
    {
        $pesquisaFeita="ok";
		$dotacaoOrcamentariaJaExiste='';
		$verificacao='';
		$mensagem='';
		$unidadesOrcamentarias = UnidadeOrcamentaria::all();
		$unidadeOrcamentaria = DB::select("select * from unidade_orcamentarias where codigo='$request->unidade_orcamentaria'");
		$unidadesExecutoras = UnidadeExecutora::all();
		$classificacoesFuncionaisProgramaticas = ClassificacaoFuncionalProgramatica::all();
		$vinculos  = Vinculos::all();
		$naturezasDeDespesas = NaturezaDeDespesa::all();
				
		return view('dotacao-orcamentaria/implementar')->with('pesquisaFeita', $pesquisaFeita)->with('dotacaoOrcamentariaJaExiste', $dotacaoOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidadeOrcamentaria', $unidadeOrcamentaria)->with('unidadesOrcamentarias', $unidadesOrcamentarias)->with('unidadesExecutoras', $unidadesExecutoras)->with('classificacoesFuncionaisProgramaticas',$classificacoesFuncionaisProgramaticas)->with('vinculos', $vinculos)->with('naturezasDeDespesas', $naturezasDeDespesas)->with('exercicio', $exercicio);
    }
	
	public function importar(Request $request)
    {
		
	
		$unidade_naoLocalizada= '';
		$verificacao = "";
		$indiceA="";
		$arquivo = $request->file('arquivo');
		$nome = $arquivo->getClientOriginalName();
		$pesquisaFeita='';
		
		if($arquivo->getClientOriginalExtension() == "xlsx")
		{
			$mensagem = '';
			$caminho = $arquivo->getRealPath();
			$caminhoDestino = 'C:/xampp/htdocs/seo/public/imported_files/';
			$arquivo->move($caminhoDestino,$arquivo->getClientOriginalName());
			$colecoes = (new FastExcel)->import('imported_files/'.$nome);
			
			
			
			//verifica se há a quantidade de indices exigida para upload do arquivo
			if(count($colecoes[0]) == 9)
			{
					
				for($i=0; $i <sizeof($colecoes); $i++)
				{
					$oldkey="";
					$colecoes[$i] = array_change_key_case($colecoes[$i], CASE_LOWER);
					
					$keys = array_keys($colecoes[$i]);
					$keys[array_search($keys[0], $keys)] = 'codigo_dotacao';
					$keys[array_search($keys[1], $keys)] = 'unidade_executora';
					$keys[array_search($keys[2], $keys)] = 'classificacao_funcional_programatica';
					$keys[array_search($keys[3], $keys)] = 'natureza_de_despesa';
					$keys[array_search($keys[4], $keys)] = 'vinculo';
					$keys[array_search($keys[5], $keys)] = 'dotacao';
					$keys[array_search($keys[6], $keys)] = 'empenhado';
					$keys[array_search($keys[7], $keys)] = 'saldo';
					$keys[array_search($keys[8], $keys)] = 'reserva';
					$colecoes[$i] = array_combine($keys, $colecoes[$i]);
				}
			
			
			
				// Remove linhas em branco da planilha
				$contador=0;
			
				foreach ($colecoes as $colecao)
				{
					$contador = $contador+1;
					if ($colecao['codigo_dotacao'] == "")
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
		
		
		foreach ($colecoes as $colecao)
		{	
			//Verifica se existe dotacao já cadastrada
			if (DB::table('saldo_de_dotacao2019s')->where('codigo_dotacao', $colecao['codigo_dotacao'])->count() == 0) 
			{
					
			}
			//Caso exista atualiza a dotacao
			else
			{
				
				$colecao['dotacao'] = str_replace("R$", " ", $colecao['dotacao']);
				$colecao['empenhado'] = str_replace("R$", " ", $colecao['empenhado']);
				$colecao['saldo'] = str_replace("R$", " ", $colecao['saldo']);
				$colecao['reserva'] = str_replace("R$", " ", $colecao['reserva']);
				   
				//Set user object attributes
				$colecao['dotacao'] = str_replace(array(".",","),array("", "."),$colecao['dotacao']);
				$colecao['empenhado'] = str_replace(array(".",","),array("", "."),$colecao['empenhado']);
				$colecao['saldo'] = str_replace(array(".",","),array("", "."),$colecao['saldo']);
				$colecao['reserva'] = str_replace(array(".",","),array("", "."),$colecao['reserva']);
				
				$dotacao = SaldodeDotacaos::whereCodigo_dotacao($colecao['codigo_dotacao'])->firstOrFail();
				/*$dotacao = SaldodeDotacaos::where([
					'codigo_dotacao' => $colecao['codigo_dotacao'],
					'vinculo' => $colecao['vinculo'],
				])->first();*/
							 
				
				$dotacao->dotacao = $colecao['dotacao'];
				$dotacao->empenhado = $colecao['empenhado'];
				$dotacao->saldo = $colecao['saldo'];
				$dotacao->reserva = $colecao['reserva'];
				
				// Save/update user. 
				// This will will update your the row in ur db.
				
			   $dotacao->save();
			   
			  }
		}
		//return ($pesquisaFeita);
		return view ('dotacao-orcamentaria/index')->with('pesquisaFeita', $pesquisaFeita)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('mensagem', $mensagem)->with('indiceA', $indiceA)->with('verificacao', $verificacao);
		
	

	}

}
