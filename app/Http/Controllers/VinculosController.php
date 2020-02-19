<?php

namespace SEO\Http\Controllers;

use SEO\Vinculos;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use SEO\Http\Controllers\mysqli;
use Rap2hpoutre\FastExcel\FastExcel;


class VinculosController extends Controller
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
		return view('vinculos/index')->with('pesquisaFeita', $pesquisaFeita)->with('mostrar', $mostrar)->with('unidade_naoLocalizada', $unidade_naoLocalizada)->with('mensagem', $mensagem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
       $vinculoJaExiste='';
	   $mensagem='';
	   $encoding = 'UTF-8';
	   $data['descricao'] = mb_convert_case($data['descricao'], MB_CASE_UPPER, $encoding);
	   $pesquisaFeita = "";
	  
		
		if (DB::table('vinculos')->where('codigo', $data['codigo'])->count() == "0") 
		{
			Vinculos::create([
				'codigo' => $data['codigo'],
				'descricao' => $data['descricao'],
			]);
			
			$mensagem='Vínculo Cadastrado Com Sucesso!';
		}
		else
		{
				$vinculoJaExiste=$vinculoJaExiste.$data['codigo'].'.';
				$mensagem='O Vínculo ' .$vinculoJaExiste. ' já existe!';
		}
		
         return view('vinculos/index')->with('mensagem', $mensagem)->with('pesquisaFeita', $pesquisaFeita);
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
		strtoupper($data);
        if ($filtro == 'TODAS'){
			$vinculos = Vinculos::all();
			
		}
		elseif($filtro == 'CODIGO'){
			$vinculos = DB::select("select * from vinculos where codigo='$data->valor'");
			$filtro = "CÓDIGO";
			
		}
		elseif($filtro == 'DESCRICAO'){
			$vinculos = DB::select("select * from vinculos where descricao='$data->valor'");
			$filtro = "DESCRIÇÃO";
			
		}
		
		$pesquisaFeita="ok";
		
		return view('vinculos/index', compact('vinculos'))->with('pesquisaFeita', $pesquisaFeita)->with('filtro', $filtro)->with('mensagem', $mensagem);
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
		
		return view('vinculos/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem)->with('unidade', $unidade);
			
	//return view('unidade-orcamentaria/cadastrar')->with('pesquisaFeita', $pesquisaFeita)->with('naturezaDeDespesasJaExiste', $unidadeOrcamentariaJaExiste)->with('mensagem', $mensagem);*/
	}
}
