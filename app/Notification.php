<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class Notification extends Model
{
    use Notifiable;
    protected $fillable = [
       'type', 'data', 'to_user',
   ];

   /*public static function removerNotificacao($notificacao_id,$user_registro){
        DB::table('notification')->where('id', $notificacao_id)->update($user_registro);
    }*/
}
