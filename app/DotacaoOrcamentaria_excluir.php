<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class dotacao extends Model
{
  use Notifiable;
     protected $fillable = [
        'unidade_orcamentaria', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'vinculo', 'valor', 'dotacao', 'reserva', 
    ];

}
