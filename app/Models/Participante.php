<?php

namespace App\Models;

use App\Models\Atividade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'nome', 
        'email', 
        'cpf',
    ];

    public function atividades()
    {
        return $this->belongsToMany(Atividade::class);
    }

}
