<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Informacao extends Model
{
    use Notifiable;
     protected $fillable = [
        'titulo', 'descricao', 'usuario',
    ];
}
