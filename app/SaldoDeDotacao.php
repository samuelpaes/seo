<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;

class SaldoDeDotacao extends Model
{
    protected $fillable = [
        'exercicio','unidade_orcamentaria', 'unidade_executora', 'classificacao_funcional_programatica', 'natureza_de_despesa', 'codigo_dotacao', 'vinculo', 'dotacao', 'empenhado', 'saldo', 'reserva','user_update',
    ];
}
