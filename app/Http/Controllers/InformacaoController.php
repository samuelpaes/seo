<?php

namespace SEO\Http\Controllers;

use SEO\Informacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class InformacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisaFeita="";
        $mensagem = '';
        $verificacao = "";
        return view('informacao/index')->with('pesquisaFeita', $pesquisaFeita)->with('mensagem',$mensagem)->with('verificacao',$verificacao);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informacao/cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Informacao::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'usuario' => Auth::user()->registro,
        ]);		

        $pesquisaFeita="";
        $mensagem = 'Informação Cadastrada!';
        $verificacao = 'Sucesso';
        return view('informacao/index')->with('mensagem',$mensagem)->with('verificacao',$verificacao)->with('pesquisaFeita',$pesquisaFeita);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SEO\Informacao  $informacao
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //return($request);
        if ($request->filtro == "TODAS"){
            $informacoes = Informacao::all()->take(10);
        }
        else if ($request->filtro == "TITULO")
        {
            $informacoes = DB::select("select * from informacaos where titulo='$request->valor'")->take(10);
        }
        else if ($request->filtro == "DESCRICAO")
        {
            $informacoes = DB::select("select * from informacaos where descricao='$request->valor'")->take(10);
        }

        $pesquisaFeita="ok";
        $mensagem = '';
        $verificacao = "";
        $filtro = $request->filtro;
        return view('informacao/index')->with('pesquisaFeita', $pesquisaFeita)->with('mensagem',$mensagem)->with('verificacao',$verificacao)->with('filtro',$filtro)->with('informacoes',$informacoes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SEO\Informacao  $informacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Informacao $informacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SEO\Informacao  $informacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informacao $informacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SEO\Informacao  $informacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Informacao::where('id',$request->id)->delete();

        $pesquisaFeita="";
        $mensagem = '';
        $verificacao = "";
        return view('informacao/index')->with('pesquisaFeita', $pesquisaFeita)->with('mensagem',$mensagem)->with('verificacao',$verificacao);
    }
}
