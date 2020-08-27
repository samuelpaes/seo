<?php 
namespace SEO\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use SEO\Notification;
use Illuminate\Support\Facades\Auth;

use SEO\User;
use SEO\Message;

use DB;


use Illuminate\Http\Request;
use SEO\Informacao;
use SEO\Access;

use SEO\Lib\PusherFactory;



class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        
        //código novo

      
     
        View::composer('*', function($view){
            $notificacoes_naoLidas = array();

            if (auth()->user() != null) {
                
                //captura todas as notificações do bd
                $notificacoes = Notification::all();
                
           
                //verifica as mensagens não lidas
                $id = strval(auth()->user()->id);
                $messages_read = Message::Where('to_user',$id)->where('message_read','=' , 0)->orderBy('created_at', 'ASC')->get(); 
                $users = User::where('id', '!=', $id)->get();
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

                $registro = strval(auth()->user()->registro);
                //verifica quais não foram lidas pelo usuário e se são para o usuário logado
                foreach($notificacoes as $notificacao)
                {
                    $notificacao_lida = explode(';', $notificacao['user_read']);   
                    $notificacao_user = explode(';', $notificacao['to_user']);
                    if (in_array($registro, $notificacao_lida)) { 
                        
                    }
                    else if(in_array($registro, $notificacao_user))
                    {
                        $notificacoes_naoLidas[] = $notificacao;
                    }
                    else{
                        
                    }
                } 
                $view->with('notificacoes_naoLidas', $notificacoes_naoLidas)->with('users', $users)->with('messages_read', $messages_read);
            }
            $view->with('notificacoes_naoLidas', $notificacoes_naoLidas);
        });

    }

    public function register()
    {
        //
    }
}