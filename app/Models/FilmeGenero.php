<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmeGenero extends Model
{
    use HasFactory;

    protected $table = 'filme_genero';

    public $timestamps = false;

    protected $fillable = [
        'id_filme',
        'id_genero',
    ];
}
