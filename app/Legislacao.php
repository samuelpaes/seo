<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class legislacao extends Model
{
    use Notifiable;
    protected $fillable = [
       'instrumento', 'classificacao', 'numero', 'ano', 'esfera', 'observacao', 'link',
   ];
}
