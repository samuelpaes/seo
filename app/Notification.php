<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use Notifiable;
    protected $fillable = [
       'type', 'data', 
   ];

   /* public static function removerNotificacao($notificacao_id,$user_id){
        DB::table('users')->where('id', $id)->update($data);
    }*/
}
