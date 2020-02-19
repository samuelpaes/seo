<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClassificacaoFuncionalProgramatica extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'especificacao',
    ];

}
