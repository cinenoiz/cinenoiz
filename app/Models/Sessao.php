<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingresso;
use App\Models\Cinema;
use App\Models\Filme;

class Sessao extends Model
{
    use HasFactory;

    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'id_cinema', 'id');
    }

    public function filme()
    {
        return $this->belongsTo(Filme::class, 'id_filme', 'id');
    }

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class, 'id_sessao', 'id');
    }


    protected $table = 'sessao';

    protected $fillable = [
        'dia_e_hora',
        'sala',
        'id_filme',
        'id_cinema',
        'deleted'
    ];
}
