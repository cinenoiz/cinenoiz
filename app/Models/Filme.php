<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filme';

    protected $fillable = [
        'titulo',
        'sinopse',
        'banner_path',
        'personagem_path',
        'cartaz_path',
        'filme1_path',
        'filme2_path',
        'id_produtora'
    ];
}
