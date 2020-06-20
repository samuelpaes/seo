<?php

namespace SEO\Http\Controllers;

use DB;
use SEO\User;
use Illuminate\Support\Facades\Auth;
use SEO\UnidadeOrcamentaria;
use Illuminate\Http\Request;
use SEO\Informacao;
use SEO\Access;
use SEO\Notification;

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
        
        $notificacoes_naoLidas = array();
        //captura todas as notificações do bd
        $notificacoes = Notification::all();
        

        //verifica quais não foram lidas pelo usuário
        foreach($notificacoes as $notificacao)
        {
            $notificacao_lida = explode(';', $notificacao['user_read']);    
            if (in_array(Auth::user()->registro, $notificacao_lida)) { 
                $notificacoes_naoLidas[] = $notificacao;
            }
        }
           
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


            for($i = 0; $i<sizeof($users); $i++)
			{	
                  
                $users[$i]['mensagensNaoLidas'] =  0;
                
            };

            for($i = 0; $i<sizeof($users); $i++)
			{	
                for($j = 0; $j < count($messages_read); $j++)
                {
                    if($messages_read[$j]['from_user'] == $users[$i]['id'])
                    {    
                        $users[$i]['mensagensNaoLidas'] =  $users[$i]['mensagensNaoLidas'] + 1;
                    }
                   
                    
                }
            }
            
            //return($users[0]);
            
            $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
            $exercicio = date("Y");
            
            $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
            $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
            $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
            $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	

            $informacoes = Informacao::all()->take(10);
            
            //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
            
            return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes)->with('users', $users)->with('secretaria', $secretaria)->with('messages_read', $messages_read)->with('notificacoes_naoLidas', $notificacoes_naoLidas);
        }
        else{
            //return redirect()->action('HomeController@pre_index');
            $id=Auth::user()->id;
            $access = Access::where('user_id', $id)->get()->last();
           
            if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1)
            {
                $secretaria = $access['secretaria'];
                
            }
            else if(Auth::user()->isAdmin == 2 || Auth::user()->isAdmin == 3)
            {
                $secretaria = Auth::user()->secretaria;
                $secretaria = str_replace(";", "", $secretaria);
                $access->secretaria = $secretaria;
                $access->save();
            }
                   

            $users = User::where('id', '!=', Auth::user()->id)->get();

            for($i = 0; $i<sizeof($users); $i++)
			{	
                  
                $users[$i]['mensagensNaoLidas'] =  0;
                
            };

            for($i = 0; $i<sizeof($users); $i++)
			{	
                for($j = 0; $j < count($messages_read); $j++)
                {
                    if($messages_read[$j]['from_user'] == $users[$i]['id'])
                    {    
                        $users[$i]['mensagensNaoLidas'] =  $users[$i]['mensagensNaoLidas'] + 1;
                    }
                   
                    
                }
            }
            
            $unidade_orcamentaria = UnidadeOrcamentaria::where('unidade', '=', $secretaria)->firstOrFail('codigo');		
            $exercicio = date("Y");
        
            $dotacao = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('dotacao');	
            $reserva = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('reserva');
            $saldo = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('saldo');	;
            $empenhado = DB::table("saldo_de_dotacaos")->where('unidade_orcamentaria', '=', $unidade_orcamentaria['codigo'])->where('exercicio', '=', $exercicio)->sum('empenhado');	

            $informacoes = Informacao::all()->take(10);
            
            //$dotacao = 'R$ '.number_format($dotacao, 2, ',', '.');
            return view('home')->with('dotacao', $dotacao)->with('reserva', $reserva)->with('saldo', $saldo)->with('empenhado', $empenhado)->with('informacoes', $informacoes)->with('users', $users)->with('secretaria', $secretaria)->with('messages_read', $messages_read)->with('notificacoes_naoLidas', $notificacoes_naoLidas);
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
