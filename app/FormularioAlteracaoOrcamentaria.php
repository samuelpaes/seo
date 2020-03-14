<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FormularioAlteracaoOrcamentaria extends Model
{
    use Notifiable;
     protected $fillable = [
        'codigo_formulario', 'tipo_instrumento', 'numero_instrumento', 'tipo_formulario', 'exercicio', 'secretaria','valor', 'usuario', 'path',
    ];

}

