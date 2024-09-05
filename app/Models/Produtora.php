<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtora extends Model
{
    use HasFactory;

    protected $table = 'produtora';

    protected $fillable = [
        'nome'
    ];
}
