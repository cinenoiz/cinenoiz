<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    use HasFactory;


    protected $table = 'ingresso';

    protected $fillable = [
        'nome_usuario',
        'cpf_usuario',
        'id_sessao',
        'validado',
        'deleted'
    ];
}
