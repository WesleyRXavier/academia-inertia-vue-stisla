<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function series(){

        return $this->belongsToMany(Serie::class,'exercicios_series','exercicio_id','serie_id');
    }
}
