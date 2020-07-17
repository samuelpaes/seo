<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DadosAlteracaoOrcamentaria extends Model
{
    use Notifiable;
     protected $fillable = [
        'codigo_formulario', 'acao', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'vinculo','dotacao', 'valor', 'justificativa_recurso',
    ];

}
