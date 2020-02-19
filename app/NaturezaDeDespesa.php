<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NaturezaDeDespesa extends Model
{
	 use Notifiable;
     protected $fillable = [
        'codigo', 'especificacao', 'tipo',
    ];

}
