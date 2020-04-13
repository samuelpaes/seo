<?php

namespace SEO\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use SEO\UnidadeOrcamentaria;
use Illuminate\Http\Request;
use SEO\Informacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
	
	public function index()
	{
      
        $secretaria = Auth::user()->secretaria;
       // return('oi');
        $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
       
        $exercicio = date("Y");
      
        $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
        $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
        $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
        $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	

        $informacoes = Informacao::all()->take(10);
        
        //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
		return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes);
	}
	
	public function admin()
	{ return view('admin'); 
	}
	
	public function icon()
	{ return view('icons'); 
	}
	
	public function teste()
	{ return view('teste'); 
	}

}
