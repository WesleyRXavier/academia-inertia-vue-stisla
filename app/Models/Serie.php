<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function treino()
    {
        return $this->belongsTo(Treino::class, 'treino_id', 'id');
    }
    public function exercicios(){
        
        return $this->belongsToMany(Exercicio::class,'exercicios_series','serie_id','exercicio_id');
 
     }
     
}
