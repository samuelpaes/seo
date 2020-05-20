<?php

namespace SEO\Http\Controllers;

use DB;
use SEO\User;
use Illuminate\Support\Facades\Auth;
use SEO\UnidadeOrcamentaria;
use Illuminate\Http\Request;
use SEO\Informacao;
use SEO\Access;

use SEO\Lib\PusherFactory;
use SEO\Message;


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
  
	
	public function index(Request $request)
	{
        //verifica as mensagens não lidas
        $messages_read = Message::Where('to_user',Auth::user()->id)->where('message_read','=' , 0)->orderBy('created_at', 'ASC')->get(); 
        //return($messages_read);
        if($request['secretaria'] != null)
        {
            
            $secretaria = $request['secretaria'];
            //return($secretaria);
            //verifica o acesso e captura o id
            $id=Auth::user()->id;
            $access = Access::where('user_id', $id)->get()->last();
            $access->secretaria = $secretaria;
            $access->save();
                  
            $users = User::where('id', '!=', Auth::user()->id)->get();
            $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
            $exercicio = date("Y");
            
            $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
            $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
            $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
            $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	

            $informacoes = Informacao::all()->take(10);
            
            //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
            return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes)->with('users', $users)->with('secretaria', $secretaria)->with('messages_read', $messages_read);
        }
        else{
       
            $id=Auth::user()->id;
            $access = Access::where('user_id', $id)->get()->last();
           
            if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1)
            {
                $secretaria = $access['secretaria'];
            }
            else{
                $secretaria = Auth::user()->secretaria;
                $secretaria = str_replace(";", "", $secretaria);
                $access->secretaria = $secretaria;
                $access->save();
            }
           
            $users = User::where('id', '!=', Auth::user()->id)->get();
            $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
            $exercicio = date("Y");
        
            $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
            $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
            $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
            $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	

            $informacoes = Informacao::all()->take(10);
            
            //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
            return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes)->with('users', $users)->with('secretaria', $secretaria)->with('messages_read', $messages_read);
        }
	}
    
    public function pre_index()
	{ 
        //Verifica o tipo de usuário
       
        $isAdmin = Auth::user()->isAdmin;
        if($isAdmin == 0 || $isAdmin == 1)
        {
            $secretarias = Auth::user()->secretaria;
            $secretarias = explode(';', $secretarias );         
            return view('pre_home')->with('secretarias',$secretarias); 
        }
        else
        {
            $secretaria = Auth::user()->secretaria;
            $users = User::where('id', '!=', Auth::user()->id)->get();
            $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
            $exercicio = date("Y");
            
            $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
            $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
            $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
            $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	
    
            $informacoes = Informacao::all()->take(10);
            
            //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
            return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes)->with('users', $users);

        }

        
       
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
