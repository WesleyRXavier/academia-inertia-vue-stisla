<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function series()
    {
        return $this->hasMany(Serie::class,'treino_id','id');
    }

    public function getDataInicioAttribute($valor)
    {
        return date('d/m/Y', strtotime($valor));
    }
}
