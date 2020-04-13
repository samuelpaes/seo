<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contrato extends Model
{
    use Notifiable;
     protected $fillable = [
        'secretaria', 'numero_processo', 'ano_processo', 'numero_contrato', 'ano_contrato', 'valor', 'objeto', 'observacao', 'usuario',
    ];
}

