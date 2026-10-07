<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'idusuario';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}