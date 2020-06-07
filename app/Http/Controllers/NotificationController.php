<?php

namespace SEO\Http\Controllers;

use Illuminate\Http\Request;
use SEO\Notification;

use DB;

class NotificationController extends Controller
{

  // Update notification
  public function removeNotification(Request $request){
 
    $user_registro = $request->input('registro_user');
    $id_notificacao = $request->input('id_notificacao');
   
    $notificacoes = Notification::Where('id',$id_notificacao)->first();
    $notificacoes['user_read'] = $user_registro.";".$notificacoes['user_read'];
    $notificacoes = json_decode(json_encode($notificacoes), true);
    //return($teste);
    DB::table('notifications')->where('id', $id_notificacao)->update($notificacoes);
   

    //Notification::removerNotificacao($id_notificacao,  $user_registro);
   


    //$notificacoes['user_read'] = $notificacoes['user_read'].";".$user_registro;
  
    
    //return('oi');
    exit; 
    /*
    if($name !='' && $email != ''){
      $data = array('name'=>$name,"email"=>$email);

      // Call updateData() method of Page Model
      Notification::updateData($id_notificacao, $notificacoes);
      echo 'Update successfully.';
    }else{
      echo 'Fill all fields.';
    }

    exit; */
  }
}
