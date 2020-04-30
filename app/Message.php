<?php


namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Message extends Model
{
    protected $table = "messages";

    public function fromUser()
    {
        return $this->belongsTo('SEO\User', 'from_user');
    }

    public function toUser()
    {
        return $this->belongsTo('SEO\User', 'to_user');
    }
}
