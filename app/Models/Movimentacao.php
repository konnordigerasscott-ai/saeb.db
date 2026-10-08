<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'produto_id',
        'usuario_id',
        'tipo',
        'quantidade',
        'data_movimentacao',
    ];
}