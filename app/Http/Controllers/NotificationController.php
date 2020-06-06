<?php

namespace SEO\Http\Controllers;

use Illuminate\Http\Request;
use SEO\Notification;

class NotificationController extends Controller
{
    // Update notification
  public function removeNotification(Request $request){

    return($request);
    $user_registro = $request->input('user_registro');
    $id_notificacao = $request->input('id_notificacao');
    
    $notificacoes = Notification::Where('id',$id_notificacao)->get();

  
    $notificacoes['user_read'] = $notificacoes['user_read'].";".$user_registro;
    
    Notification::updateData($id_notificacao, $notificacoes);

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
