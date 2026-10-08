<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'marca',
        'modelo',
        'material',
        'tamanho',
        'peso',
        'tensao',
        'estoque',
        'estoque_minimo',
        'usuario_idusuario',
    ];
}