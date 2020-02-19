<?php

namespace SEO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UnidadeExecutora extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'unidade', 'unidade_orcamentaria',
    ];

}
