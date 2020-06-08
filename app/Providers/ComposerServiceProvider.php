<?php 
namespace SEO\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use SEO\Notification;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        









        View::composer('*', function($view){
            $notificacoes_naoLidas = array();
            //captura todas as notificações do bd
            $notificacoes = Notification::all();
            
            if (auth()->user() != null) {
                $registro = strval(auth()->user()->registro);
                //verifica quais não foram lidas pelo usuário
                foreach($notificacoes as $notificacao)
                {
                    $notificacao_lida = explode(';', $notificacao['user_read']);    
                    if (in_array($registro, $notificacao_lida)) { 
                        
                    }
                    else{
                        $notificacoes_naoLidas[] = $notificacao;
                    }
                } 
            }
            $view->with('notificacoes_naoLidas', $notificacoes_naoLidas);
        });

    }

    public function register()
    {
        //
    }
}